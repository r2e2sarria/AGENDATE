<?php
/* 
  
*/
include 'templates/head.php';
?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>

    <label for="subtit">SELECCIONE LA CITA</label>
    <form action="crearTurno.php" method="post" class="mt40">
        <div>
            <label for="">Seleccione la Fecha</label>
            <input type="date" name="fecha" id="fecha">
        </div>
        <div class="col col-between ml40" style="width:275px;">
        <div class="w40p">
            <label for="timer">Hora</label>
            <input type="time" name="hora" id="hora">
        </div>
        <div class="w40p">
            <label for="timer">Duracón</label>
            <input type="number" name="min" id="min" min="20" max="60" required>
        </div>
        </div>
        <div>
        <label for="">Tipo de cita</label>
        <select name="tipo" id="tipo">
            <option value="0">Seleccione el tipo de cita</option>
            <option value="1">Presencial</option>
            <option value="2">VideoConferencia Meet</option>
            <option value="2">Teléfonica</option>
        </select>
        </div>
        <div>
            <input type="text" name="meet" id="meet" placeholder="Actualiza tu Meet [url code]">
        </div>
        <br>
        <input type="submit" class="botonAux_blue fs12 w70p botc" value="CREAR">
    </form>
    <br>

    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>