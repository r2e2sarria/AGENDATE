<?php
/*
 Script para la eliminacion de una cita
*/
include "../config.php";

$id=$_POST['id'];
$sql ="DELETE FROM citas WHERE id = '$id'";
$query = $con->prepare($sql);
$query->execute();
    // $arr = $query->errorInfo();
    // print_r($arr);
exit();
