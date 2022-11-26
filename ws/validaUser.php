<?php
/* 
Servicio para la validación de Usuario
*/

include "../config.php";

$mail=$_GET['mail'];
$pass=$_GET['pass'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	consejero.*
FROM
	consejero
WHERE
	consejero.mail = '$mail' AND
	consejero.pass = '$pass'");
    $sql->execute();
    if ($sql->rowCount() < 1) {
        echo json_encode("error");
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    exit();
}



