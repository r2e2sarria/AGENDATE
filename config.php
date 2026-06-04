<?php

/*
|--------------------------------------------------------------------------
| DETECCIÓN AUTOMÁTICA DEL ENTORNO
|--------------------------------------------------------------------------
*/

if (getenv('DB_HOST') !== false && getenv('DB_HOST') !== '') {
    
    // ==========================
    // DOCKER
    // ==========================

    define('DB_HOST', getenv('DB_HOST'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASS', getenv('DB_PASS'));
    define('DB_NAME', getenv('DB_NAME'));

} elseif ($_SERVER['SERVER_ADDR'] == '143.95.247.240') {

    // ==========================
    // PRODUCCIÓN
    // ==========================

    define('DB_HOST', 'localhost');
    define('DB_USER', 'doo1_arturo');
    define('DB_PASS', 'Jasarria2017');
    define('DB_NAME', 'doo1_agendate');

} else {

    // ==========================
    // LOCALHOST XAMPP
    // ==========================

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'agendate');

}

try {

    $con = new PDO(
        "mysql:host=" . DB_HOST .
        ";dbname=" . DB_NAME .
        ";charset=utf8mb4",
        DB_USER,
        DB_PASS
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die(
        "<h3>Error de conexión</h3>" .
        "<b>Host:</b> " . DB_HOST . "<br>" .
        "<b>Base:</b> " . DB_NAME . "<br><br>" .
        $e->getMessage()
    );

}