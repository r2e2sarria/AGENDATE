<?php
/*
 Script pata TRANSFERIR una cita a
 otro asesor o consejero
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentUrl = $_SESSION["url"];
$id = $_POST['id'];
$type = $_POST['type'];
echo '
        <div class="textarea1">
        <textarea name="memo" id="memo"></textarea>
        </div>
        <div class="botonAux_blue h17 fs06 pa8 w50p centro mt10" onclick="enviarMensaje(' . $id . ','.$type.')">
        <span id="labelexito">ENVIAR MENSAJE</span>
        </div>
    </div>
    <br>
    ';

exit();
?>
