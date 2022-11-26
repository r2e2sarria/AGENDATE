<?php
/*
 Script para marca la USENCIA a una cita 
 desde el id de la misma.
*/
include "../config.php";

$id=$_POST['id'];
$sql = "UPDATE citas SET 	
        estado='2'
        WHERE 
        id='$id'";
$query = $con->prepare($sql);
$query->execute();
    // $arr = $query->errorInfo();
    // print_r($arr);
exit();
