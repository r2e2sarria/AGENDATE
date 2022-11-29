<?php
/* 
Listado de citas de un consejero
a partir de la fecha de hoy

*/

include "../config.php";

$email = $_GET['email'];
$phone = $_GET['phone'];


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = $con->prepare("SELECT
	citas.*, 
	consejero.`name`, 
	consejero.last
FROM
	citas
	INNER JOIN
	consejero
	ON 
		citas.id_consejero = consejero.id
WHERE
	citas.email = '$email' AND
	citas.phone = '$phone'");
    $sql->execute();
    if ($sql->rowCount() < 1) {
        echo json_encode("error");
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    exit();
}


