<?php
/* 
// Actualización Junio 2026
Torta de acuerdo al tipo de usuarios
*/

include "../config.php";

$id=$_GET['id'];
$hoy=date("Y-m-d");
$id=1;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	citas.*
FROM
	citas
WHERE
	citas.estado = 0 
    and
    citas.date >= '$hoy'
    and
    citas.id_consejero = '$id' ");
    $sql->execute();
    $libres=$sql->rowCount();
    // ***************
    $sql = $con->prepare("SELECT
	citas.*
FROM
	citas
WHERE
	citas.estado = 1
    and
    citas.date >= '$hoy'
    and
    citas.id_consejero = '$id' ");
    $sql->execute();
    $ocupados=$sql->rowCount();
    $arreglo = array($libres,$ocupados);
    echo json_encode($arreglo);
    header("HTTP/1.1 200 OK");
    exit();
}
