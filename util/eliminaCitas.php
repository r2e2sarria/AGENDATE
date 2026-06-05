<?php
/*
 // Actualización Junio 2026
 Script para la eliminación de una cita
*/

require_once __DIR__ . "/../config.php";

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo "0";
    exit();
}

$sql = $con->prepare("
    DELETE FROM citas
    WHERE id = :id
");

$sql->bindParam(':id', $id, PDO::PARAM_INT);

$resultado = $sql->execute();

echo $resultado ? "1" : "0";

exit();