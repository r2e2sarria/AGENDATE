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
        <label for="subtit">ENTRA A TU PERFIL</label>
        <form action="creaAgenda.php" method="post" class="mt40">
            <div>
                <label for="">E-mail</label>
                <input type="text" name="mail" id="mail" placeholder="Entre su correo de electronico">
            </div>
            <div>
                <label for="">Contraseña</label>
                <input type="text" name="clave" id="clave" placeholder="Entre la clave para acceso">
            </div>
            <br>
            <input type="submit" class="botonAux_blue fs12 w70p botc" value="ENTRAR">
        </form>
    </div>
    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>