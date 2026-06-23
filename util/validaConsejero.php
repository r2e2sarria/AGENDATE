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

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';
$baseUrl    = $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

if (empty($serviceUrl)) {
    echo "0";
    exit();
}

$url = $serviceUrl . "/ws/validaUser.php?mail=" .
       urlencode($mail) .
       "&pass=" .
       urlencode($pass);

$jsonUser = @file_get_contents($url);

if ($jsonUser === false) {
    echo "0";
    exit();
}

$user = json_decode($jsonUser, true);

if ($user == "error" || empty($user) || !is_array($user)) {
    echo "0";
    exit();
}

session_regenerate_id(true);

$baseUrlAnterior = $baseUrl;
$serviceUrlAnterior = $serviceUrl;

$_SESSION = $user[0];

$_SESSION['log'] = 'on';
$_SESSION['url'] = $baseUrlAnterior;
$_SESSION['baseUrl'] = $baseUrlAnterior;
$_SESSION['serviceUrl'] = $serviceUrlAnterior;

echo "1";
exit();