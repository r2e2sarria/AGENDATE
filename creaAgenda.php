<?php
/* 
// Actualización Junio 2026
// Formulario para la creación de una cita por parte del asesor o consejero
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['log']) || $_SESSION['log'] != 'on') {
    header("Location: perfil.php");
    exit();
}

$hoy = date("Y-m-d");
$id = $_SESSION['id'] ?? 0;
$id = (int) $id;

include 'templates/head.php';
?>

<div class="mainbox">
    <br>

    <?php include 'templates/leftHead.php'; ?>

    <label for="subtit">FORMA PARA CREAR CITAS</label>

    <div id="newcitablock">
        <form id="newcita" method="post" class="mt40">

            <div>
                <label for="fecha">Seleccione la Fecha</label>
                <input type="date" name="fecha" id="fecha" min="<?php echo $hoy; ?>">
            </div>

            <div class="col col-between ml40" style="width:275px;">
                <div class="w40p">
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" id="hora">
                </div>

                <div class="w40p">
                    <label for="min">Duración</label>
                    <input type="number" name="min" id="min" min="20" max="60" value="20" required>
                </div>
            </div>

            <div>
                <label for="tipo">Tipo de cita</label>
                <select name="tipo" id="tipo">
                    <option value="0">Seleccione el tipo de cita</option>
                    <option value="1">Presencial</option>
                    <option value="2">Videoconferencia Meet</option>
                    <option value="3">Telefónica</option>
                </select>
            </div>

            <div>
                <input type="text" name="meet" id="meet" placeholder="Actualiza tu Meet [url code]">
            </div>

            <div id="showerr"></div>

            <br>

            <div class="botonAux_blue fs12 w70p botc" onclick="crearCitas(<?php echo $id; ?>)">
                CREAR
            </div>

        </form>
    </div>

    <br>

    <div id="info"></div>

    <?php include 'templates/menuadm.php'; ?>
</div>

</body>
</html>