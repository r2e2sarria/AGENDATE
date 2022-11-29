<?php
/*

Script para consultar y publicar las citas reservadfas
por un usuario.

*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentUrl = $_SESSION["url"];
$email = $_POST['mail'];
$phone = $_POST['phone'];

$miscitas = json_decode(file_get_contents($currentUrl . "/ws/miscitas.php?email=" . $email  . "&phone=" . $phone . ""), true);
if ($miscitas == 'error') {
    echo "Sin citas reservadas a la fecha";
} else {
    echo '<label for="subtit" class="mb20">LISTADO DE CITAS RESERVADAS</label>';
    for ($x = 0; $x < count($miscitas); $x++) {
        echo '   <div class="ml60 mt10">
            <br><b>FECHA: </b>' . $miscitas[$x]['date'] . '<br>
            <b>CONSEJERO: </b>' . $miscitas[$x]['name'] . ' ' . $miscitas[$x]['last'] . '
            <br><b>HORA: </b>' . $miscitas[$x]['time'] . ' <b>tiempo: </b>' . $miscitas[$x]['duracion'] . ' min.
            <br>
            <textarea id="sendMensaje" class="mt10 mb10 w95p fs08 h4 pa5"></textarea>
            <div class="col col-between fs07 mt10 mb10">
                <div class="botonAux_blue" onclick="cancelar(' . $miscitas[$x]['id'] . ')">CANCELAR</div>
                <div class="botonAux_blue" onclick="mensaje(' . $miscitas[$x]['id'] . ',2)">ENVIAR MENSAJE</div>
            </div> 
            </div>';
    }
}
