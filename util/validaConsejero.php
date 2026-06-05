<?php
/*
 // Actualización Junio 2026
 Validación del consejero
 ejecutado por la función /js/script.js/validaConsejero()
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$mail = trim($_POST['mail'] ?? '');
$pass = trim($_POST['pass'] ?? '');

if (empty($mail) || empty($pass)) {
    echo "0";
    exit();
}

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8080') {
    $baseUrl = "http://127.0.0.1";
} elseif ($host == 'localhost') {
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
} else {
    $baseUrl = $protocolo . "://" . $host;
}

$url = $baseUrl . "/ws/validaUser.php?mail=" .
       urlencode($mail) .
       "&pass=" .
       urlencode($pass);

$user = json_decode(file_get_contents($url), true);

if ($user == "error" || empty($user)) {

    echo "0";

} else {

    session_regenerate_id(true);

    $_SESSION = $user[0];

    $_SESSION['log'] = 'on';
    $_SESSION['baseUrl'] = $baseUrl;

    echo "1";
}

exit();