<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';

$currentUrl = $_SESSION["url"];
?>
<div class="mainbox">
    <div class="contenido">
        <br>
        <?php include 'templates/leftHead.php'; ?>
        <div id="showCitasReservadas">
        <label for="subtit">CONSULTA TUS CITAS</label>
        <form id="consultar" method="post" class="mt40">
            <div>
                <label for="">E-mail</label>
                <input type="text" name="mail" id="mail" placeholder="Entra el correo con que reservaste" form="consultar">
            </div>
            <div>
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="phone" placeholder="Entra el teléfono con que reservaste" form="consultar">
            </div>
            <br>
            <div class="botonAux_blue fs12 w60p botc" onclick="mostrarReservas()" >CONSULTAR</div>
        </form>
        </div>
    </div>
    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>