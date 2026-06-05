<?php
/* 
// Actualización Junio 2026
Encuentra los memos asociados a una cita por el código de la cita
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = $con->prepare("
        SELECT
            memos.*
        FROM
            memos
        WHERE
            memos.id_cita = :id
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
