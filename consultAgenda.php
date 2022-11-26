<?php
/*
    Diplay de todas las citas por consejero desde
    la fecha actual
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['log']) or $_SESSION['log'] != 'on') {
    header("Location: perfil.php");
}
$currentUrl = $_SESSION["url"];
$id = $_SESSION['id'];
$err = 0;
$citas = json_decode(file_get_contents($currentUrl . "/ws/citasXconsejero.php?id=" . $id . ""), true);

if ($citas == "error") {
    $err = 1;
}
include 'templates/head.php';
?>
<div class="mainbox">
    <div class="contenido">
        <br>
        <?php include 'templates/leftHead.php'; ?>
        <label for="subtit">LISTADO DE TURNOS LIBRES Y RESERVADOS</label>
        <?php
        if ($err == 1) {
            echo "<div class='tac mt20'>";
            echo $_SESSION['name'] . " No tiene citas programadas.";
            echo "</div>";
        } else {
            $ctrl1 = 0;
            echo '<div class="bloqueturnos">';
            for ($x = 0; $x < count($citas); $x++) {
                echo '
                <div class="col">';
                if ($citas[$x]['estado'] != 1) {
                    echo '<div class="turno"><i class="fa-solid fa-calendar"></i></div>';
                    $ctrl1 = 0;
                } else {
                    echo '<div class="turno" onclick="showDetalleCita(' . $citas[$x]['id'] . ')"><i class="fa-solid fa-calendar-check cdarkorange pointer"></i></div>';
                    $ctrl1 = 1;
                }

                echo '<div>' . $citas[$x]['date'] . '</div>
                <div>' . $citas[$x]['time'] . '</div>';
                if ($ctrl1 != 1) {
                echo'<div class="delturno pointer" onclick="eliminar()"><i class="fa-solid fa-calendar-xmark"></i></div>';
                } else {
                echo'<div class="delturnoget"></div>';
                }
                echo '</div>';
                // tarjeta con los datos de la reserva
                if ($ctrl1 == 1) {
                    $detalle = json_decode(file_get_contents($currentUrl . "/ws/detalleCita.php?id=" .  $citas[$x]['id'] . ""), true);
                    if($detalle=='error'){ $memo="Cita sin nota anexa.";} else {$memo=$detalle[0]['memo'];}
                    echo '
                        <div class="reservado" id="reservado' . $citas[$x]['id'] . '">
                        <div class="col col-around mt10">
                            <div>' . $citas[$x]['date'] . '</div>
                            <div>' . $citas[$x]['time'] . '</div>
                        </div>
                        <div class="pa10">
                            <span><b>' . $citas[$x]['nombre'] . ' ' . $citas[$x]['apellido'] . '</b></span><br>
                            <span class="block fs08 mt10    ">' . $memo . '</span>
                        </div>
                        <div id="botonesTurno">
                            <div class="col col-around fs07 mb10">
                                <div class="botonAux_blue" onclick="transferir()">TRANSFERIR</div>
                                <div class="botonAux_blue" onclick="cancelar()">CANCELAR</div>
                                <div class="botonAux_blue" onclick="mensaje()">MENSAJE</div>
                            </div>
                            <div class="col col-around fs07 mb10">
                                <div class="botonAux_blue" onclick="ausente()">AUSENTE</div>
                            </div>
                        </div>
                        </div>';
                }
                echo '
                ';
            }
            echo '</div>';
        }
        ?>

    </div>

    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>