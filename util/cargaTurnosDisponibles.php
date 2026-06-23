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
$id = (int)$id;

if ($id <= 0) {
    echo "<div class='ml60 mb10'>No se recibió el consejero</div>";
    exit();
}

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

if (empty($serviceUrl)) {
    echo "<div class='ml60 mb10'>No se pudo detectar la URL del servicio</div>";
    exit();
}

$tipo = [
    1 => "Presencial",
    2 => "Virtual",
    3 => "Telefónica"
];

$url = $serviceUrl . "/ws/cargaTurnosConsejero.php?id=" . urlencode($id);

$jsonTurnos = @file_get_contents($url);

if ($jsonTurnos === false) {
    echo "<div class='ml60 mb10'>No se pudo consultar el servicio de turnos</div>";
    exit();
}

$turnos = json_decode($jsonTurnos, true);

if ($turnos == 'error' || empty($turnos) || !is_array($turnos)) {
    echo "<div class='ml60 mb10'>Sin turnos disponibles</div>";
    exit();
}

foreach ($turnos as $turno) {
    $idTurno = (int)($turno['id'] ?? 0);
    $fecha = htmlspecialchars($turno['date'] ?? '', ENT_QUOTES, 'UTF-8');
    $hora = htmlspecialchars($turno['time'] ?? '', ENT_QUOTES, 'UTF-8');
    $tipoId = (int)($turno['tipo'] ?? 0);
    $tipoTurno = $tipo[$tipoId] ?? 'Sin tipo';

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