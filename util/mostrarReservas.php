<?php
/*
// Actualización Junio 2026
Script para consultar y publicar las citas reservadas
por un usuario.
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_POST['mail'] ?? '';
$phone = $_POST['phone'] ?? '';

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8080') {
    $baseUrl = "http://127.0.0.1";
} elseif ($host == 'localhost') {
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
} else {
    $baseUrl = $protocolo . "://" . $host;
}

$url = $baseUrl . "/ws/miscitas.php?email=" . urlencode($email) . "&phone=" . urlencode($phone);

$miscitas = json_decode(file_get_contents($url), true);

if ($miscitas == 'error' || empty($miscitas) || !is_array($miscitas)) {
    echo "Sin citas reservadas a la fecha";
    exit();
}

echo '<label for="subtit" class="mb20">LISTADO DE CITAS RESERVADAS</label>';

foreach ($miscitas as $cita) {
    $id = (int) $cita['id'];
    $fecha = htmlspecialchars($cita['date']);
    $nombre = htmlspecialchars($cita['name']);
    $apellido = htmlspecialchars($cita['last']);
    $hora = htmlspecialchars($cita['time']);
    $duracion = htmlspecialchars($cita['duracion']);

    echo '
    <div class="ml60 mt10">
        <br><b>FECHA: </b>' . $fecha . '<br>
        <b>CONSEJERO: </b>' . $nombre . ' ' . $apellido . '
        <br><b>HORA: </b>' . $hora . ' <b>tiempo: </b>' . $duracion . ' min.
        <br>
        <textarea id="mensajeAdicional" class="mt10 mb10 w95p fs08 h4 pa5"></textarea>
        <div id="msgServicio' . $id . '" class="block w100p tac fs10"></div>

        <div class="col col-between fs07 mt10 mb10">
            <div class="botonAux_blue" onclick="cancelar(' . $id . ')">CANCELAR</div>
            <div class="botonAux_blue" onclick="mensajeAdicional(' . $id . ',2)">ENVIAR MENSAJE</div>
        </div>
    </div>';
}

exit();