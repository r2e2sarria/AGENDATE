<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';

$currentUrl = $_SESSION["url"];

$consejeros = json_decode(file_get_contents($currentUrl . "/ws/listaConsejeros.php"), true);

?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>
    <div id="showDatosReserva">
    <label for="subtit">RESERVAR UNA CITA CON:</label>
    <br>
    <select name="idConsejero" id="idConsejero" onchange="cargaTurnosDisponibles()">
        <option value="0">Seleccione el consejero</option>
        <?php
        for ($x = 0; $x < count($consejeros); $x++) {
            echo '<option value="' . $consejeros[$x]['id'] . '">' . $consejeros[$x]['name'] . ' ' . $consejeros[$x]['last'] . '</option>';
        }
        ?>
    </select>
    <div id="mostrarTurnosDisponibles">

    </div>
    </div>
    <br>

    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>