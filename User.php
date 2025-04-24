<?php
class User
{
    public function __construct(
        public int    $id,
        public string $nombre,
        public string $apellido,
        public string $username,
        public string $email
    ) {}

    /*‑‑‑ CRUD mínimo ‑‑‑*/

    /** Guarda un nuevo usuario */
    public static function create(array $data): void
    {
        $sql = 'INSERT INTO usuarios
                (nombre_usuario, lastname_usuario, username_usuario,
                 password_usuario, email_usuario)
                VALUES (?,?,?,?,?)';

        $stmt = Database::get()->prepare($sql);
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bind_param(
            'sssss',
            $data['nombre'], $data['apellido'],
            $data['username'], $hash, $data['email']
        );
        $stmt->execute();
    }

    /** Devuelve User o null por username */
    public static function findByUsername(string $u): ?self
    {
        $sql = 'SELECT id_usuario,nombre_usuario,lastname_usuario,
                       username_usuario,email_usuario
                FROM usuarios WHERE username_usuario=? LIMIT 1';

        $stmt = Database::get()->prepare($sql);
        $stmt->bind_param('s', $u);
        $stmt->execute();
        $stmt->bind_result($id,$n,$a,$un,$em);

        return $stmt->fetch() ? new self($id,$n,$a,$un,$em) : null;
    }

    /** Comprueba credenciales y crea sesión */
    public static function login(string $u,string $p): void
    {
        $sql='SELECT id_usuario,username_usuario,password_usuario
              FROM usuarios WHERE username_usuario=? LIMIT 1';
        $stmt=Database::get()->prepare($sql);
        $stmt->bind_param('s',$u);
        $stmt->execute();
        $stmt->bind_result($id,$user,$hash);
        if(!$stmt->fetch() || !password_verify($p,$hash)){
            throw new RuntimeException('Usuario o contraseña incorrectos');
        }
        $_SESSION['uid']=$id;
        $_SESSION['uname']=$user;
    }

    public static function logout(): void
    {
        session_destroy();
    }

    /** Lista todos los usuarios (para el foreach del dashboard) */
    public static function all(): array
    {
        $res = Database::get()->query(
            'SELECT id_usuario,nombre_usuario,lastname_usuario,username_usuario,email_usuario FROM usuarios'
        );
        $usuarios = [];
        foreach ($res as $row) {
            $usuarios[] = new self(
                $row['id_usuario'],
                $row['nombre_usuario'],
                $row['lastname_usuario'],
                $row['username_usuario'],
                $row['email_usuario']
            );
        }
        return $usuarios;
    }
}
