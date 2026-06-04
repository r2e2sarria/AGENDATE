<?php
include 'templates/head.php';

$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8080') {
    $baseUrl = "http://127.0.0.1";
} elseif ($host == 'localhost') {
    $baseUrl = $protocolo . "://" . $host . "/AGENDATE";
} else {
    $baseUrl = $protocolo . "://" . $host;
}

$jsonConsejeros = file_get_contents($baseUrl . "/ws/listaConsejeros.php");
$consejeros = json_decode($jsonConsejeros, true);

if (!is_array($consejeros)) {
    $consejeros = [];
}
?>

<div class="mainbox">
    <br>
    <?php include 'templates/leftHead.php'; ?>

    <div id="showDatosReserva">
        <label for="subtit">RESERVAR UNA CITA CON:</label>
        <br>

        <select name="idConsejero" id="idConsejero" onchange="cargaTurnosDisponibles()">
            <option value="0">Seleccione el consejero</option>

            <?php foreach ($consejeros as $consejero): ?>
                <option value="<?= $consejero['id'] ?>">
                    <?= $consejero['name'] . ' ' . $consejero['last'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div id="mostrarTurnosDisponibles"></div>
    </div>

    <br>

    <?php include 'templates/menu.php'; ?>
</div>

</body>
</html>