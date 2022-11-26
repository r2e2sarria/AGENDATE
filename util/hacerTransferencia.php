<?php
/*
 Script para hacer la transferencia a otro asesor o consejero
*/
include "../config.php";

$id=$_POST['id'];
$asesor=$_POST['asesor'];

$sql = "UPDATE citas SET 	
        id_consejero='$asesor'
        WHERE 
        id='$id'";
$query = $con->prepare($sql);
$query->execute();
    // $arr = $query->errorInfo();
    // print_r($arr);
exit();
