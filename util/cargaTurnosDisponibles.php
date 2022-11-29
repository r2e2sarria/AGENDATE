<?php
/*
 Script para cargar , deplegar y escoger los turnos disponibles
 por cada consejero
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentUrl = $_SESSION["url"];
$id= $_POST['id'];

$tipo= array("","Presencial","Virtual");
$turnos = json_decode(file_get_contents($currentUrl . "/ws/cargaTurnosConsejero.php?id=".$id.""), true);
if($turnos=='error'){
    echo "<div class='ml60 mb10'>";
    echo "Sin turnos diponibles";
    echo "</div>";
} else {
    for($x=0;$x<count($turnos);$x++){
        echo "<div class='ml60 mb10'>";
        echo '<span onclick="datosReservaTurno('.$turnos[$x]['id'].')"><i class="fa-regular fa-calendar-plus mr05 pointer cdodgerblue"></i> Fecha: '.$turnos[$x]['date'].'</span>';
        echo "<br>Hora: ".$turnos[$x]['time']." Tipo: ".$tipo[$turnos[$x]['tipo']];
        echo '<br>';
        echo "</div>";
    }

}
exit();
