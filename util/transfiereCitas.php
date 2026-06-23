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

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

if (empty($serviceUrl)) {
    echo "No se pudo detectar la URL del servicio.";
    exit();
}

$url = $serviceUrl . "/ws/asesores.php?cid=" . urlencode($cid);

$jsonAsesores = @file_get_contents($url);

if ($jsonAsesores === false) {
    echo "No se pudo consultar el servicio de asesores.";
    exit();
}

$asesores = json_decode($jsonAsesores, true);

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
    $asesorId = (int)($asesor["id"] ?? 0);
    $nombre = htmlspecialchars($asesor["name"] ?? '', ENT_QUOTES, 'UTF-8');
    $apellido = htmlspecialchars($asesor["last"] ?? '', ENT_QUOTES, 'UTF-8');

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