<?php
/*
 // Actualización Junio 2026
 Script para enviar un mensaje
*/

require_once __DIR__ . "/../config.php";

$id   = $_POST['id'] ?? '';
$type = $_POST['type'] ?? '';
$memo = trim($_POST['memo'] ?? '');

if (empty($id) || empty($type) || strlen($memo) < 1) {
    echo "0";
    exit();
}

$sql = $con->prepare("
    INSERT INTO memos
        (id_cita, memo, tipo_nota)
    VALUES
        (:id_cita, :memo, :tipo_nota)
");

$sql->bindParam(':id_cita', $id, PDO::PARAM_INT);
$sql->bindParam(':memo', $memo, PDO::PARAM_STR);
$sql->bindParam(':tipo_nota', $type, PDO::PARAM_INT);

$resultado = $sql->execute();

echo $resultado ? "1" : "0";

exit();