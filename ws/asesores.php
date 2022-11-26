<?php
/* 
Listado de citas de un consejero
a partir de la fecha de hoy

*/

include "../config.php";

$cid = $_GET['cid'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	consejero.*
FROM
	consejero
WHERE
	consejero.id <> '$cid'");
    $sql->execute();
    if ($sql->rowCount() < 1) {
        echo json_encode("error");
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    exit();
}



