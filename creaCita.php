<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';
?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>

    <label for="subtit">SELECCIONE LA CITA</label>
    <form action="creaCitaPerInfo.php" method="post" class="mt40">
        <select name="idConsejero" id="idConsejero">
            <option value="">Consejero</option>
        </select>
        <div>
            <label for="">Seleccione la Fecha</label>
            <input type="date" name="fecha" id="fecha">
        </div>
        <div>
            <label for="">Seleccione la Hora</label>
            <input type="time" name="hora" id="hora">
        </div>
        <select name="tipo" id="tipo">
            <option value="">Tipo de cita</option>
        </select>
        <br>
        <input type="submit" class="botonAux_blue fs12 w70p botc" value="CONTINUAR">
    </form>
    <br>

    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>