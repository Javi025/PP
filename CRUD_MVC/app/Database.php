<?php

/* Configuración de la Conexión a la Base de Datos */

//Crea la clase Database para manejar la conexión
//__construct(): Se conecta automáticamente a la base de datos.
//query($sql, $params): Ejecuta consultas SQL con parámetros.
//fetchAll(): Obtiene múltiples registros.
//fetch(): Obtiene un solo registro.
//close(): Cierra la conexión.

require_once __DIR__ . '/config.php';

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $pdo;
    private $stmt;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute($params);
    }

    public function fetchAll() {
        return $this->stmt->fetchAll();
    }

    public function fetch() {
        return $this->stmt->fetch();
    }

    public function close() {
        $this->pdo = null;
    }
}
?>
