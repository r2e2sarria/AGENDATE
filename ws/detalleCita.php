<?php
/* 
// Actualización Junio 2026
Encuentra los memos asociados a una cita
a partir del ID de la cita
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = (int)($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($id <= 0) {
        echo json_encode("error");
        exit();
    }

    $sql = $con->prepare("
        SELECT
            memos.*
        FROM
            memos
        WHERE
            memos.id_cita = :id
        ORDER BY
            memos.id ASC
    ");

    $sql->bindValue(':id', $id, PDO::PARAM_INT);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}