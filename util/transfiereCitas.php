<?php
/*
 // Actualización Junio 2026
 Script para transferir una cita a otro asesor o consejero
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cid = $_POST['cid'] ?? '';
$id  = $_POST['id'] ?? '';

$cid = (int) $cid;
$id  = (int) $id;

if ($id <= 0) {
    echo "Cita inválida";
    exit();
}

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8080') {
    $baseUrl = "http://127.0.0.1";
} elseif ($host == 'localhost') {
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
} else {
    $baseUrl = $protocolo . "://" . $host;
}

$url = $baseUrl . "/ws/asesores.php?cid=" . urlencode($cid);

$asesores = json_decode(file_get_contents($url), true);

if ($asesores == "error" || empty($asesores) || !is_array($asesores)) {
    echo "Sin asesores disponibles";
    exit();
}

echo '
<div class="col col-around mt20">
    <div>
        <select name="asesor" id="asesor" class="fs08 w200">
            <option value="0">Seleccione el asesor</option>';

foreach ($asesores as $asesor) {
    $asesorId = (int) $asesor["id"];
    $nombre = htmlspecialchars($asesor["name"]);
    $apellido = htmlspecialchars($asesor["last"]);

    echo '<option value="' . $asesorId . '">' . $nombre . ' ' . $apellido . '</option>';
}

echo '
        </select>
    </div>

    <div class="botonAux_blue h17 fs06 pa8" onclick="hacerTransferencia(' . $id . ')">
        TRANSFERIR
    </div>
</div>
';

exit();