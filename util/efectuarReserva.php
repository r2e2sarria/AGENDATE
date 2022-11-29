<?php 
/*

Script para la carga de la reserva y validacion de los datos

*/

include "../config.php";
$data = $_POST;
print_r($data);
$err=0;
if(strlen($data['nombre'])<2 or strlen($data['apellido'])<2 or strlen($data['dob'])<2 or strlen($data['phone'])<10){
    $err=0;echo $err;
    exit();
} else {
    $nombre=$data['nombre'];
    $apellido=$data['apellido'];
    $dob=$data['dob'];
    $phone=$data['phone'];
    $id=$data['id'];
    $estado=$data['estado'];
    $sql = "UPDATE citas SET 	
        nombre='$nombre',apellido='$apellido',dob='$dob',phone='$phone',estado='$estado'
        WHERE 
        id='$id'";
    $query = $con->prepare($sql);
    $query->execute();
    if(strlen($data['motivo'])>2){
        $memo = $data['motivo'];
        $sql = "INSERT INTO memos (id_cita,memo,tipo_nota) value ('$id','$memo','1')";
        $query = $con->prepare($sql);
        $query->execute();
    }
    $err=1;echo $err;
    exit();
}


