<?php

define('DB_HOST', getenv('DB_HOST') ?: 'agendate_db');
define('DB_USER', getenv('DB_USER') ?: 'agendate_user');
define('DB_PASS', getenv('DB_PASS') ?: 'agendate_pass');
define('DB_NAME', getenv('DB_NAME') ?: 'agendate');

try {
    $con = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}