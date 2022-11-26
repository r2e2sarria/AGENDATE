<?php
/* 
 TOP INCLUYE HTMLT5
*/ 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SERVER['SERVER_NAME']=='localhost'){
    $http="http:";
} else {
    $http="https:";
};
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url=explode("/",$actual_link); 
$currentUrl = $url[0].'//'.$url[2].'/'.$url[3];
$_SESSION["url"]=$currentUrl;
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
            rel="stylesheet" />
        <script src="https://kit.fontawesome.com/eacd406bb7.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/scripts.js"></script>

        <title>AGENDATE</title>
    </head>

    <body>