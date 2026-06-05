<?php
/* 
// Actualización Junio 2026
Torta de acuerdo al estado de las citas del consejero
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id  = $_GET['id'] ?? '';
$hoy = date("Y-m-d");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = $con->prepare("
        SELECT COUNT(*) AS total
        FROM citas
        WHERE estado = 0
          AND date >= :hoy
          AND id_consejero = :id
    ");

    $sql->bindParam(':hoy', $hoy, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $libres = (int) $sql->fetch(PDO::FETCH_ASSOC)['total'];

    $sql = $con->prepare("
        SELECT COUNT(*) AS total
        FROM citas
        WHERE estado = 1
          AND date >= :hoy
          AND id_consejero = :id
    ");

    $sql->bindParam(':hoy', $hoy, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $ocupados = (int) $sql->fetch(PDO::FETCH_ASSOC)['total'];

    echo json_encode([$libres, $ocupados]);
    exit();
}