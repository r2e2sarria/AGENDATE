<?php
/*
 // Actualización Junio 2026
 Script para la validación y carga de una cita.
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['log']) || $_SESSION['log'] != 'on') {
    header("Location: ../perfil.php");
    exit();
}

require_once __DIR__ . "/../config.php";

$errores = [
    "",
    "Entre la Fecha Válida",
    "Entre la Hora",
    "Entre la Duración",
    "Seleccione el tipo de cita"
];

$err = 0;

$fecha = $_POST['fecha'] ?? '';
$hora  = $_POST['hora'] ?? '';
$min   = $_POST['min'] ?? 0;
$tipo  = $_POST['tipo'] ?? 0;
$id    = $_POST['id'] ?? '';
$meet  = $_POST['meet'] ?? '';

if (strlen($fecha) < 1) {
    $err = 1;
} elseif (strlen($hora) < 1) {
    $err = 2;
} elseif ((int)$min < 20) {
    $err = 3;
} elseif ((int)$tipo == 0) {
    $err = 4;
}

if ($err > 0) {
    echo '<script>$("#showerr").html("' . $errores[$err] . '");</script>';
    exit();
}

$sql = $con->prepare("
    INSERT INTO citas
        (id_consejero, date, time, tipo, duracion, estado)
    VALUES
        (:id_consejero, :fecha, :hora, :tipo, :duracion, 0)
");

$sql->bindParam(':id_consejero', $id, PDO::PARAM_INT);
$sql->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$sql->bindParam(':hora', $hora, PDO::PARAM_STR);
$sql->bindParam(':tipo', $tipo, PDO::PARAM_INT);
$sql->bindParam(':duracion', $min, PDO::PARAM_INT);

$sql->execute();

if (strlen($meet) > 10) {
    $sql = $con->prepare("
        UPDATE consejero
        SET meet = :meet
        WHERE id = :id
    ");

    $sql->bindParam(':meet', $meet, PDO::PARAM_STR);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    $sql->execute();
}

echo "0";
exit();