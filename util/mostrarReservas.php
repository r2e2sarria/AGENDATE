<?php
/*
 // Actualización Junio 2026
 Script para consultar y publicar las citas reservadas
 por un usuario.
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = trim($_POST['mail'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if (empty($email) || empty($phone)) {
    echo "Debe ingresar correo y teléfono.";
    exit();
}

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

if (empty($serviceUrl)) {
    echo "No se pudo detectar la URL del servicio.";
    exit();
}

$url = $serviceUrl . "/ws/miscitas.php?email=" . urlencode($email) . "&phone=" . urlencode($phone);

$jsonMiscitas = @file_get_contents($url);

if ($jsonMiscitas === false) {
    echo "No se pudo consultar el servicio de citas.";
    exit();
}

$miscitas = json_decode($jsonMiscitas, true);

if ($miscitas == 'error' || empty($miscitas) || !is_array($miscitas)) {
    echo "Sin citas reservadas a la fecha";
    exit();
}

echo '<label for="subtit" class="mb20">LISTADO DE CITAS RESERVADAS</label>';

foreach ($miscitas as $cita) {
    $id = (int)($cita['id'] ?? 0);
    $fecha = htmlspecialchars($cita['date'] ?? '', ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($cita['name'] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($cita['last'] ?? '', ENT_QUOTES, 'UTF-8');
    $hora = htmlspecialchars($cita['time'] ?? '', ENT_QUOTES, 'UTF-8');
    $duracion = htmlspecialchars($cita['duracion'] ?? '', ENT_QUOTES, 'UTF-8');

    echo '
    <div class="ml60 mt10">
        <br><b>FECHA: </b>' . $fecha . '<br>
        <b>CONSEJERO: </b>' . $nombre . ' ' . $apellido . '
        <br><b>HORA: </b>' . $hora . ' <b>tiempo: </b>' . $duracion . ' min.
        <br>

        <textarea id="mensajeAdicional' . $id . '" class="mt10 mb10 w95p fs08 h4 pa5"></textarea>

        <div id="msgServicio' . $id . '" class="block w100p tac fs10"></div>

        <div class="col col-between fs07 mt10 mb10">
            <div class="botonAux_blue" onclick="cancelar(' . $id . ')">CANCELAR</div>
            <div class="botonAux_blue" onclick="mensajeAdicional(' . $id . ',2)">ENVIAR MENSAJE</div>
        </div>
    </div>';
}

exit();