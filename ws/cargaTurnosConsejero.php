<?php
/* 
// Actualización Junio 2026
Encuentra las citas activas de un consejero
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = $con->prepare("
        SELECT
            citas.*
        FROM
            citas
        WHERE
            citas.id_consejero = :id
            AND citas.estado = 0
    ");

    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}


