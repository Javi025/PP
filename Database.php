<?php
final class Database//Declara una clase final; no puede heredarse.
{
    private static ?mysqli $db = null;//Propiedad estática que guarda la única instancia de mysqli. El tipo ?mysqli permite mysqli o null.
    private function __construct() {}//Constructor privado → impide new Database().

    /* Método get() */
    public static function get(): mysqli
    {   /* Chequeo inicial 
           Si aún no existe conexión, se crea; de lo contrario se reutiliza.
           Evita abrir múltiples sockets al servidor MySQL durante la misma petición. */
        if (self::$db === null) {
            /* Creación
               Usa las constantes definidas del archivo de configuración.
               mysqli abre el canal TCP/IP o UNIX socket con el servidor. */
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (self::$db->connect_error) {
                throw new RuntimeException('Error DB: '.self::$db->connect_error);
            }
            self::$db->set_charset('utf8mb4');
        }
        return self::$db;
    }

    public static function disconnect(): void
    {
        if (self::$db) {
            self::$db->close();
            self::$db = null;
        }
    }
}
