<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';
?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>
    <label for="subtit">LISTA DE RESERVAS ACTIVAS</label>
    <div class="laCita">
        <div class="detalle">
            <b>CONSEJERO</b>:
            <br><b>FECHA:</b>
            <br><b>HORA:</b>
            <br><b>DETALLE:</b>
        </div>
        <div class="col">
            <div class="borrar">
                <i class="fa-solid fa-calendar-xmark"></i>
            </div>
            <div class="botonAux_blue fs08 w60p botr h2" style="padding-top: 12px;">
                ENVIAR MENSAJE
            </div>
        </div>
    </div>

    </form>

    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>