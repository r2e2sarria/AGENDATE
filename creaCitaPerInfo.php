<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
include 'templates/head.php';
?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>
    <label for="subtit">INFORMACIÓN PERSONAL</label>
    <form action="reservar.php" method="post" class="mt40">
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Entre sus nombres">
        </div>
        <div>
            <label for="">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Entre su apellido">
        </div>
        <div>
            <label for="">E-mail</label>
            <input type="text" name="email" id="email" placeholder="Entre su correo electronico">
        </div>
        <div>
            <label for="">Fecha de nacimiento</label>
            <input type="date" name="dob" id="dob" placeholder="Entre la fecha de nacimiento">
        </div>
        <div>
            <label for="">Teléfono</label>
            <input type="text" name="phone" id="phone" placeholder="Entre un número de teléfono válido">
        </div>
        <div>
            <div class="block w100p tac fs12 mb10">MOTIVO DE LA RESERVA</label>
                <textarea name="motivo" id="motivo"></textarea>
            </div>
            <br>
            <input type="submit" class="botonAux_blue fs12 w70p botc" value="RESERVAR">
    </form>
    <br>
    <?php include 'templates/menu.php'; ?>
</div>
</body>

</html>