<?php
/*
 // Actualización Junio 2026
 Script para la carga de la reserva y validación de los datos
*/

require_once __DIR__ . "/../config.php";

$data = $_POST;

$nombre   = trim($data['nombre'] ?? '');
$apellido = trim($data['apellido'] ?? '');
$dob      = $data['dob'] ?? '';
$phone    = trim($data['phone'] ?? '');
$id       = $data['id'] ?? '';
$estado   = $data['estado'] ?? 1;
$email    = trim($data['email'] ?? '');
$motivo   = trim($data['motivo'] ?? '');

if (strlen($nombre) < 2 || strlen($apellido) < 2 || strlen($phone) < 10 || empty($id)) {
    echo "0";
    exit();
}

$sql = $con->prepare("
    UPDATE citas
    SET
        nombre = :nombre,
        apellido = :apellido,
        email = :email,
        dob = :dob,
        phone = :phone,
        estado = :estado
    WHERE
        id = :id
");

$sql->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$sql->bindParam(':apellido', $apellido, PDO::PARAM_STR);
$sql->bindParam(':email', $email, PDO::PARAM_STR);
$sql->bindParam(':dob', $dob, PDO::PARAM_STR);
$sql->bindParam(':phone', $phone, PDO::PARAM_STR);
$sql->bindParam(':estado', $estado, PDO::PARAM_INT);
$sql->bindParam(':id', $id, PDO::PARAM_INT);

$sql->execute();

if (strlen($motivo) > 2) {
    $sql = $con->prepare("
        INSERT INTO memos
            (id_cita, memo, tipo_nota)
        VALUES
            (:id_cita, :memo, 1)
    ");

    $sql->bindParam(':id_cita', $id, PDO::PARAM_INT);
    $sql->bindParam(':memo', $motivo, PDO::PARAM_STR);

    $sql->execute();
}

echo "1";
exit();