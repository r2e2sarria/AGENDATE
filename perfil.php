<?php
/*
 // Actualización Junio 2026
 Pantalla de acceso al perfil del consejero
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();
session_destroy();

session_start();

include 'templates/head.php';
?>

<div class="mainbox">

    <div class="contenido">

        <br>

        <?php include 'templates/leftHead.php'; ?>

        <label for="subtit">ENTRA A TU PERFIL</label>

        <form id="validacion" method="post" class="mt40">

            <div>
                <label for="mail">
                    E-mail
                    <span id="errmail"></span>
                </label>

                <input
                    type="text"
                    name="mail"
                    id="mail"
                    onkeypress="return soloMail(event)"
                    onkeyup="valmail()"
                    placeholder="Entre su correo electrónico">
            </div>

            <div>
                <label for="pass">Contraseña</label>

                <input
                    type="password"
                    name="pass"
                    id="pass"
                    placeholder="Entre la clave de acceso">
            </div>

            <div id="showerror" class="w100p tac cdarkred">

            </div>

            <br>

            <div
                class="botonAux_blue fs12 w60p botc"
                onclick="validaConsejero()">
                ENTRAR
            </div>

        </form>

    </div>

    <?php include 'templates/menuadm.php'; ?>

</div>

</body>
</html>