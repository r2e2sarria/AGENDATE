<?php
/* 
// Actualización Junio 2026
Carga los turnos disponibles de un consejero
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = $_GET['id'] ?? '';
$id = (int)$id;

$hoy = date('Y-m-d');

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
            AND citas.estado = 0
            AND citas.date >= :hoy
        ORDER BY
            citas.date ASC,
            citas.time ASC
    ");

    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->bindValue(':hoy', $hoy, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultado) < 1) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}