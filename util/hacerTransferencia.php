<?php
/*
 // Actualización Junio 2026
 Script para hacer la transferencia a otro asesor o consejero
*/

require_once __DIR__ . "/../config.php";

$id      = $_POST['id'] ?? '';
$asesor  = $_POST['asesor'] ?? '';

if (empty($id) || empty($asesor)) {
    echo "0";
    exit();
}

$sql = $con->prepare("
    UPDATE citas
    SET id_consejero = :asesor
    WHERE id = :id
");

$sql->bindParam(':asesor', $asesor, PDO::PARAM_INT);
$sql->bindParam(':id', $id, PDO::PARAM_INT);

$resultado = $sql->execute();

echo $resultado ? "1" : "0";

exit();