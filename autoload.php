<?php
/* Carga automática PSR‑4 (todo en la raíz) */
/* Registra una función anónima como autoloader. 
   PHP la ejecutará automáticamente cada vez que intentes usar una clase que aún no ha sido cargada. */
spl_autoload_register(function ($class) {
    $file = __DIR__ . "/{$class}.php";//Construye la ruta del archivo donde se supone vive la clase pedida.
    if (is_readable($file)) require_once $file;//Si el archivo existe y es legible, lo incluye.
});
