<?php
/*
 Script para hacer la transferencia a otro asesor o consejero
*/
include "../config.php";

$id=$_POST['id'];
$type=$_POST['type'];
$memo=$_POST['memo'];

$sql = "INSERT INTO memos (id_cita,memo,tipo_nota) value ('$id','$memo','$type')";
$query = $con->prepare($sql);
$query->execute();
    // $arr = $query->errorInfo();
    // print_r($arr);
exit();
