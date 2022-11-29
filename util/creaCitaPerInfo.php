<?php
// 
// Pantalla de entrada al proceso de creacion de cita
// 
$id = $_POST['id'];
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
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" form="datosReserva">
        <input type="hidden" name="estado" id="estado" value="1" form="datosReserva">
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Entre sus nombres" form="datosReserva">
        </div>
        <div>
            <label for="">Apellido</label>
            <input type="text" name="apellido" id="apellido" placeholder="Entre su apellido" form="datosReserva">
        </div>
        <div>
            <label for="">E-mail<span id="errmail"></span></label>
            <input type="text" name="email" id="mail" onkeypress="return soloMail(event)" onkeyup="valmail()" placeholder="Entre su correo electronico" form="datosReserva">
        </div>
        <div>
            <label for="">Fecha de nacimiento</label>
            <input type="date" name="dob" id="dob" placeholder="Entre la fecha de nacimiento" form="datosReserva">
        </div>
        <div>
            <label for="">Teléfono</label>
            <input type="text" name="phone" id="phone" placeholder="Entre un número de teléfono válido" onkeypress="return numeros(event)" maxlength="10" form="datosReserva">
        </div>
        <div>
            <div class="block w100p tac fs12 mt10">MOTIVO DE LA RESERVA</label>
                <textarea name="motivo" id="motivo" form="datosReserva"></textarea>
            </div>
            <br>
            <div id="showerror" class="tac mb10 cfirebrick">

            </div>
            <div class="botonAux_blue fs12 w70p botc" onclick="efectuarReserva()">RESERVAR</div>
    </form>
    <br>
</div>
</body>

</html>