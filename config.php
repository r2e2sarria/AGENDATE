<?php

 /*
  Script para la apertura de la base de datos de acuerdo al
  servidor en donde se encuentre alojada la aplicación.
 */

if (gethostname() == "uscentral43.myserverhosts.com") {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'doo1_arturo');
    define('DB_PASS', 'Jasarria2017');
    define('DB_NAME', 'doo1_UGPP-CITAS');
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
