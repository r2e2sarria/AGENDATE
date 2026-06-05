<?php
/* 
// Actualización Junio 2026
Listado de citas de un consejero
a partir de la fecha de hoy
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id  = $_GET['id'] ?? '';
$hoy = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = $con->prepare("
        SELECT
            citas.*
        FROM
            citas
        WHERE
            citas.id_consejero = :id
            AND citas.date >= :hoy
        ORDER BY
            citas.date ASC,
            citas.time ASC
    ");

    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':hoy', $hoy, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}


