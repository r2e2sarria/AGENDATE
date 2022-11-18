<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';
?>
<div class="mainbox">
    <div class="contenido">
        <br>
        <?php include 'templates/leftHead.php'; ?>
        <label for="subtit">CONSULTA TUS CITAS</label>
        <form action="listaCitas.php" method="post" class="mt40">
            <div>
                <label for="">E-mail</label>
                <input type="text" name="mail" id="mail" placeholder="Entre su correo de electronico">
            </div>
            <div>
                <label for="">Teléfono</label>
                <input type="text" name="phone" id="phone" placeholder="Entre teléfono válido">
            </div>
            <br>
            <input type="submit" class="botonAux_blue fs12 w70p botc" value="CONTINUAR">
        </form>
    </div>
    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>