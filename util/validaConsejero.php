<?php
/*
Validación del consejero
ejecutado por la función /js/script.js/validaConsejero() 
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentUrl = $_SESSION["url"];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$user = json_decode(file_get_contents($currentUrl . "/ws/validaUser.php?mail=".$mail."&pass=".$pass.""), true);
if ($user=="error"){
    echo "0";
} else {
    $_SESSION=$user[0];
    $_SESSION['log']='on';
    $_SESSION['url']=$currentUrl;
    echo "1";
}