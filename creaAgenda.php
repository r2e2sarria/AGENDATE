<?php
/* 
  Formulario para la creación de un cita por parte del asesor o consejero
*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['log']) or $_SESSION['log'] != 'on') {
    header("Location: perfil.php");
}
$hoy=date("Y-m-d");
$currentUrl = $_SESSION["url"];
$id = $_SESSION['id'];
$err = 0;
include 'templates/head.php';
?>
<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>

    <label for="subtit">FORMA PARA CREAR CITAS</label>
    <div id="newcitablock">
    <form id="newcita" method="post" class="mt40">
        <div>
            <label for="">Seleccione la Fecha</label>
            <input type="date" name="fecha" id="fecha" min="<?php echo $hoy;?>" form="newcita" >
        </div>
        <div class="col col-between ml40" style="width:275px;">
        <div class="w40p">
            <label for="timer">Hora</label>
            <input type="time" name="hora" id="hora"  form="newcita">
        </div>
        <div class="w40p">
            <label for="timer">Duración</label>
            <input type="number" name="min" id="min" min="20" max="60" value="20" required  form="newcita">
        </div>
        </div>
        <div>
        <label for="">Tipo de cita</label>
        <select name="tipo" id="tipo"  form="newcita">
            <option value="0">Seleccione el tipo de cita</option>
            <option value="1">Presencial</option>
            <option value="2">VideoConferencia Meet</option>
            <option value="2">Teléfonica</option>
        </select>
        </div>
        <div>
            <input type="text" name="meet" id="meet" placeholder="Actualiza tu Meet [url code]"  form="newcita">
        </div>
        <div id="showerr">

        </div>
        <br>
        <div type="submit" class="botonAux_blue fs12 w70p botc" onclick="crearCitas(<?php echo $id;?>)">CREAR</div>
    </form>
    </div>
    <br>
    <div id="info">

    </div>

    <?php include 'templates/menuadm.php'; ?>
</div>
</body>

</html>