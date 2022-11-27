<?php
/*
    Script para la validación y carga de un cita.
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['log']) or $_SESSION['log'] != 'on') {
    header("Location: perfil.php");
}
include "../config.php";

$currentUrl = $_SESSION["url"];
$id = $_SESSION['id'];
$errores = array("", "Entre la Fecha Válida", "Entre la Hora", "Entre la Duración", "Seleccione el tipo de cita");
$err = 0;
// print "<pre>";
// print_r($_POST);
if (strlen($_POST['fecha'] < 1)) {
    $err = 1;
} else {
    $fecha = $_POST['fecha'];
}
if (strlen($_POST['hora'] < 1)) {
    $err = 2;
} else {
   $hora= $_POST['hora'];
}
if ($_POST['min'] < 20) {
    $err = 3;
} else {
    $min=$_POST['min'];
}
if ($_POST['tipo'] == 0) {
    $err = 4;
} else {
    $tipo=$_POST['tipo'];
}
switch ($err) {
    case '4':
        echo '<script>$("#showerr").html("' . $errores[4] . '");</script>';
        break;
    case '3':
        echo '<script>$("#showerr").html("' . $errores[3] . '");</script>';
        break;
    case '2':
        echo '<script>$("#showerr").html("' . $errores[2] . '");</script>';
        break;
    case '1':
        echo '<script>$("#showerr").html("' . $errores[1] . '");</script>';
        break;
    case '0':
    $id=$_POST['id'];
    $meet=$_POST['meet'];
    $sql = "INSERT INTO citas (id_consejero,date,time,tipo,duracion,estado) value ('$id','$fecha','$hora','$tipo','$min','0')";
    $query = $con->prepare($sql);
    $query->execute();
    // $arr = $query->errorInfo();
    // print_r($arr);
    if(strlen($meet)>10){
    $sql = "UPDATE consejero SET meet='$meet' WHERE id='$id'";
    $query = $con->prepare($sql);
    $query->execute();
    }
    echo $err;
    break;
}
