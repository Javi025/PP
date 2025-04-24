<?php
/* Configuración global */
/* Constantes de conexión a la base de datos */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'miapp');

/* Zona horaria por defecto */
date_default_timezone_set('America/Mexico_City');
//Evitas incoherencias cuando el servidor corre en otra zona (muchos hosts están en UTC o en EE. UU.).
//Debe llamarse antes de usar cualquier función de fecha/hora.

/* Arranque de sesión */
session_start();
//Crea o reanuda la sesión PHP (envía/lee la cookie PHPSESSID).
//Después de esto puedes usar $_SESSION para guardar estado (ID de usuario, CSRF token, carrito, etc.).
//Colócalo antes de enviar cualquier salida al navegador, porque session_start() modifica encabezados HTTP.

/* Configuración de reporte de errores */
/* Muestra errores en desarrollo */
error_reporting(E_ALL);//Indica a PHP que capture todos los niveles de error: E_NOTICE, E_WARNING, E_DEPRECATED, ….
ini_set('display_errors', '1');//	Le dice al motor que los imprima en pantalla.

/* Ideal en desarrollo para ver fallos rápidamente.
   Nunca lo actives en producción: muestra rutas internas, consultas SQL o claves que un atacante podría aprovechar. 
   En servidores live usa display_errors = 0 y registra errores en un log (log_errors = 1 y error_log = /ruta/a/php-error.log). */
