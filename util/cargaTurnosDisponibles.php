<?php
/*
 // Actualización Junio 2026
 Script para cargar, desplegar y escoger los turnos disponibles
 por cada consejero
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo "<div class='ml60 mb10'>No se recibió el consejero</div>";
    exit();
}

$tipo = ["", "Presencial", "Virtual"];

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8080') {
    $baseUrl = "http://127.0.0.1";
} elseif ($host == 'localhost') {
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
} else {
    $baseUrl = $protocolo . "://" . $host;
}

$jsonTurnos = file_get_contents($baseUrl . "/ws/cargaTurnosConsejero.php?id=" . urlencode($id));
$turnos = json_decode($jsonTurnos, true);

if ($turnos == 'error' || empty($turnos) || !is_array($turnos)) {
    echo "<div class='ml60 mb10'>";
    echo "Sin turnos disponibles";
    echo "</div>";
    exit();
}

foreach ($turnos as $turno) {
    $idTurno = htmlspecialchars($turno['id']);
    $fecha = htmlspecialchars($turno['date']);
    $hora = htmlspecialchars($turno['time']);
    $tipoTurno = $tipo[$turno['tipo']] ?? 'Sin tipo';

    echo "<div class='ml60 mb10'>";
    echo '<span onclick="datosReservaTurno(' . $idTurno . ')">';
    echo '<i class="fa-regular fa-calendar-plus mr05 pointer cdodgerblue"></i> ';
    echo 'Fecha: ' . $fecha;
    echo '</span>';
    echo "<br>Hora: " . $hora . " Tipo: " . $tipoTurno;
    echo "<br>";
    echo "</div>";
}

exit();