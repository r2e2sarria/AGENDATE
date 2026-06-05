<?php
/*
 // Actualización Junio 2026
 Script para mostrar el formulario de envío de mensaje
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id   = $_POST['id'] ?? '';
$type = $_POST['type'] ?? '';

$id   = (int) $id;
$type = (int) $type;

if ($id <= 0 || $type <= 0) {
    echo "Datos inválidos";
    exit();
}

echo '
    <div class="textarea1">
        <textarea name="memo" id="memo"></textarea>
    </div>

    <div class="botonAux_blue h17 fs06 pa8 w50p centro mt10" onclick="enviarMensaje(' . $id . ',' . $type . ')">
        <span id="labelexito">ENVIAR MENSAJE</span>
    </div>

    <br>
';

exit();