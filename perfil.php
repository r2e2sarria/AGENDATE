<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
session_start();
session_unset();
session_destroy();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'templates/head.php';
?>
<div class="mainbox">
    <div class="contenido">
        <br>
        <?php include 'templates/leftHead.php'; ?>
        <label for="subtit">ENTRA A TU PERFIL</label>
        <form id="validacion" action="creaAgenda.php" method="post" class="mt40">
            <div>
                <label for="">E-mail<span id="errmail"></span></label>
                <input type="text" name="mail" id="mail" onkeypress="return soloMail(event)" onkeyup="valmail()" placeholder="Entre su correo de electronico" form="validacion">
            </div>
            <div>
                <label for="">Contraseña</label>
                <input type="password" name="pass" id="pass" placeholder="Entre la clave para acceso" form="validacion">
            </div>
            <div id="showerror" class="w100p tac cdarkred">
            </div>
            <br>
            <div type="submit" class="botonAux_blue fs12 w60p botc" onclick="validaConsejero()">ENTRAR</div>
        </form>
    </div>
    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>