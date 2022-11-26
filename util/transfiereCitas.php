<?php
/*
 Script pata TRANSFERIR una cita a
 otro asesor o consejero
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentUrl = $_SESSION["url"];
$cid = $_POST['cid'];
$id = $_POST['id'];
$asesores = json_decode(file_get_contents($currentUrl . "/ws/asesores.php?cid=" . $cid . ""), true);
if ($asesores == "error") {
    echo "Sin asesores disponibles";
} else {
    echo '
    <div class="col col-around mt20">
        <div>
        <select name="asesor" id="asesor" class="fs08 w200">
        <option value="0">Seleccione el asesor</option>';
        for($x=0;$x<count($asesores);$x++){
            echo '<option value="'.$asesores[$x]["id"].'">'.$asesores[$x]["name"].' '.$asesores[$x]["last"].'</option>';
        }
        echo'</select>
        </div>
        <div class="botonAux_blue h17 fs06 pa8" onclick="hacerTransferencia('.$id.')">
        TRANSFERIR
        </div>
    </div>
    ';
}
exit();

