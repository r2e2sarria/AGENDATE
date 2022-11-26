<?php
/* 
Listado de citas de un consejero
a partir de la fecha de hoy

*/

include "../config.php";

$id=$_GET['id'];
$hoy=date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	citas.*
FROM
	citas
WHERE
	citas.id_consejero = '$id' AND
	citas.date >= '$hoy'
ORDER BY
	citas.date ASC, 
	citas.time ASC");
    $sql->execute();
    if ($sql->rowCount() < 1) {
        echo json_encode("error");
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    exit();
}



