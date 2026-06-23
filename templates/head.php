<?php
/* 
// Actualización Junio 2026
// TOP INCLUYE HTML5
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    ? "https"
    : "http";

$host = $_SERVER['HTTP_HOST'] ?? '';

if ($host == 'localhost:8080') {

    // Docker
    $baseUrl = $protocolo . "://" . $host;
    $serviceUrl = "http://127.0.0.1";

} elseif ($host == 'localhost') {

    // XAMPP
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
    $serviceUrl = $baseUrl;

} elseif ($host == 'jorgeasarria.com' || $host == 'www.jorgeasarria.com') {

    // Producción
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
    $serviceUrl = $baseUrl;

} else {

    // Otro entorno
    $baseUrl = $protocolo . "://" . $host;
    $serviceUrl = $baseUrl;
}

$_SESSION["url"] = $baseUrl;
$_SESSION["baseUrl"] = $baseUrl;
$_SESSION["serviceUrl"] = $serviceUrl;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <base href="<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Titillium+Web:wght@200;300;400;600;700;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/eacd406bb7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style_dic3.css">

    <script>
        const BASE_URL = "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>";
        const SERVICE_URL = "<?php echo htmlspecialchars($serviceUrl, ENT_QUOTES, 'UTF-8'); ?>";
    </script>

    <script src="js/scripts.js"></script>

    <title>AGENDATE</title>
</head>

<body>