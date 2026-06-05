<?php
/*
 // Actualización Junio 2026
 Script para marcar la AUSENCIA de una cita
 desde el id de la misma.
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo json_encode([
        'success' => false,
        'message' => 'Id de cita no recibido'
    ]);
    exit();
}

$sql = $con->prepare("
    UPDATE citas
    SET estado = 2
    WHERE id = :id
");

$sql->bindParam(':id', $id, PDO::PARAM_INT);

$resultado = $sql->execute();

echo json_encode([
    'success' => $resultado,
    'id' => $id
]);

exit();
