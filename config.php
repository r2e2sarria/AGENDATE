<?php

 /*
 // Actualización Junio 2026

  Script para la apertura de la base de datos de acuerdo al
  servidor en donde se encuentre alojada la aplicación.
 */
if ($_SERVER['SERVER_ADDR'] == "143.95.247.240") {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'doo1_arturo');
    define('DB_PASS', 'Jasarria2017');
    define('DB_NAME', 'doo1_agendate');
} else {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'agendate');
}

try {
    $con = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
