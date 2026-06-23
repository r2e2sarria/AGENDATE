<?php
/* 
// Actualización Junio 2026
Listado de citas de un consejero
a partir de la fecha actual
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = (int)($_GET['id'] ?? 0);
$hoy = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($id <= 0) {
        echo json_encode("error");
        exit();
    }

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

    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->bindValue(':hoy', $hoy, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}