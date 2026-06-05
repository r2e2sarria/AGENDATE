<?php
// 
// Actualización Junio 2026
// Pantalla de entrada al proceso de creación de cita
// 

$id = $_POST['id'] ?? '';
$id = (int) $id;
?>

<style>
    input[type="date"],
    input[type="time"],
    input[type="text"],
    input[type="password"],
    input[type="number"],
    select {
        margin: 0px auto 5px auto !important;
    }
</style>

<div class="mainbox">
    <br>

    <label for="subtit">INFORMACIÓN PERSONAL PARA LA RESERVA</label>

    <form id="datosReserva" method="post" class="mt20">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="hidden" name="estado" id="estado" value="1">

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Entre sus nombres">
        </div>

        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Entre su apellido">
        </div>

        <div>
            <label for="mail">E-mail <span id="errmail"></span></label>
            <input type="text" name="email" id="mail" onkeypress="return soloMail(event)" onkeyup="valmail()" placeholder="Entre su correo electrónico">
        </div>

        <div>
            <label for="dob">Fecha de nacimiento</label>
            <input type="date" name="dob" id="dob" placeholder="Entre la fecha de nacimiento">
        </div>

        <div>
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" placeholder="Entre un número de teléfono válido" onkeypress="return numeros(event)" maxlength="10">
        </div>

        <div class="block w100p tac fs12 mt10">
            <label for="motivo">MOTIVO DE LA RESERVA</label>
            <textarea name="motivo" id="motivo"></textarea>
        </div>

        <br>

        <div id="showerror" class="tac mb10 cfirebrick"></div>

        <div class="botonAux_blue fs12 w70p botc" onclick="efectuarReserva()">
            RESERVAR
        </div>
    </form>

    <br>
</div>