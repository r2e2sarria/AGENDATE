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
        <label for="subtit">LISTADO DE TURNOS LIBRES Y RESERVADOS</label>
        <div class="bloqueturnos">
            <div>
                <div class="turno"><i class="fa-solid fa-calendar"></i></div>
                <div>2022-10-01</div>
                <div>02:30:00</div>
                <div class="delturno"  onclick="eliminar()"><i class="fa-solid fa-calendar-xmark"></i></div>
            </div>
            <div>
                <div class="turno"><i class="fa-solid fa-calendar"></i></div>
                <div>2022-10-01</div>
                <div>02:30:00</div>
                <div class="delturno"  onclick="eliminar()"><i class="fa-solid fa-calendar-xmark"></i></div>
            </div>
            <div>
                <div class="turno"><i class="fa-solid fa-calendar"></i></div>
                <div>2022-10-01</div>
                <div>02:30:00</div>
                <div class="delturno" onclick="eliminar()"><i class="fa-solid fa-calendar-xmark"></i></div>
            </div>
        </div>
        <div class="reservado">
            <div class="col col-around mt10">
                <div>2022-10-01</div>
                <div>05:00:00</div>
            </div>
            <div class="pa10">
                <span><b>Juan Antonio Lopez Jimenez</b></span><br>
                <span class="block fs08 mt10    ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,</span>
            </div>
            <div id="botonesTurno">
            <div class="col col-around fs07 mb10">
                <div class="botonAux_blue" onclick="transferir()">TRANSFERIR</div>
                <div class="botonAux_blue" onclick="cancelar()">CANCELAR</div>
                <div class="botonAux_blue" onclick="mensaje()">MENSAJE</div>
            </div>
            <div class="col col-around fs07 mb10">
                <div class="botonAux_blue" onclick="ausente()">AUSENTE</div>
            </div>
            </div>
        </div>

    </div>

    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>