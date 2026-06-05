<?php
// 
// Actualización Junio 2026
// Pantalla de consulta de citas reservadas
// 

include 'templates/head.php';
?>

<div class="mainbox">
    <div class="contenido">
        <br>

        <?php include 'templates/leftHead.php'; ?>

        <div id="showCitasReservadas">
            <label for="subtit">CONSULTA TUS CITAS</label>

            <form id="consultar" method="post" class="mt40">
                <div>
                    <label for="mail">E-mail</label>
                    <input type="text" name="mail" id="mail" placeholder="Entra el correo con que reservaste">
                </div>

                <div>
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" placeholder="Entra el teléfono con que reservaste">
                </div>

                <br>

                <div class="botonAux_blue fs12 w60p botc" onclick="mostrarReservas()">
                    CONSULTAR
                </div>
            </form>
        </div>
    </div>

    <?php include 'templates/menu.php'; ?>
</div>

</body>
</html>