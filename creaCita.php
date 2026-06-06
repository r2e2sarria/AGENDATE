<?php
/*
 // Actualización Junio 2026
 Pantalla de entrada al proceso de creación de cita
*/

include 'templates/head.php';

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

$consejeros = [];

if (!empty($serviceUrl)) {
    $jsonConsejeros = @file_get_contents($serviceUrl . "/ws/listaConsejeros.php");
    $data = json_decode($jsonConsejeros, true);

    if (is_array($data)) {
        $consejeros = $data;
    }
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
                <option value="<?php echo (int)($consejero['id'] ?? 0); ?>">
                    <?php
                    echo htmlspecialchars(
                        ($consejero['name'] ?? '') . ' ' . ($consejero['last'] ?? ''),
                        ENT_QUOTES,
                        'UTF-8'
                    );
                    ?>
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