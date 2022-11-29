<?php
/* 
Encuentra el detalle de una cita por el codigo de la cita
*/

include "../config.php";

$id=$_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	citas.*
FROM
	citas
WHERE
	citas.id_consejero = '$id' AND
	citas.estado = '0'");
    $sql->execute();
    if ($sql->rowCount() < 1) {
        echo json_encode("error");
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    exit();
}



