<?php
/*
 // Actualización Junio 2026
 Display de todas las citas por consejero desde la fecha actual
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['log']) || $_SESSION['log'] != 'on') {
    header("Location: perfil.php");
    exit();
}

include 'templates/head.php';

$id = $_SESSION['id'] ?? 0;
$id = (int) $id;

$serviceUrl = $_SESSION["serviceUrl"] ?? $_SESSION["baseUrl"] ?? $_SESSION["url"] ?? '';

$citas = [];
$err = 0;

if (empty($serviceUrl) || $id <= 0) {
    $err = 1;
} else {
    $jsonCitas = @file_get_contents($serviceUrl . "/ws/citasXconsejero.php?id=" . urlencode($id));
    $dataCitas = json_decode($jsonCitas, true);

    if ($jsonCitas === false || $dataCitas == "error" || empty($dataCitas) || !is_array($dataCitas)) {
        $err = 1;
    } else {
        $citas = $dataCitas;
    }
}
?>

<div class="mainbox">
    <div class="contenido">
        <br>

        <?php include 'templates/leftHead.php'; ?>

        <label for="subtit">LISTADO DE TURNOS LIBRES Y RESERVADOS</label>

        <?php if ($err == 1): ?>

            <div class="tac mt20">
                <?php echo htmlspecialchars($_SESSION['name'] ?? 'El consejero', ENT_QUOTES, 'UTF-8'); ?> no tiene citas programadas.
            </div>

        <?php else: ?>

            <div class="bloqueturnos">

                <?php foreach ($citas as $cita): ?>

                    <?php
                    $citaId = (int)($cita['id'] ?? 0);
                    $estado = (int)($cita['estado'] ?? 0);

                    $ctrl1 = 0;
                    $ctrl2 = 0;
                    ?>

                    <div class="col">

                        <?php if ($estado == 1): ?>

                            <div class="turno" onclick="showDetalleCita(<?php echo $citaId; ?>)">
                                <i class="fa-solid fa-calendar-check cdarkorange pointer"></i>
                            </div>

                            <?php $ctrl1 = 1; ?>

                        <?php elseif ($estado == 2): ?>

                            <div class="turno" onclick="showDetalleCita(<?php echo $citaId; ?>)">
                                <i class="fa-solid fa-user-slash cdimgray pointer"></i>
                            </div>

                            <?php
                            $ctrl1 = 1;
                            $ctrl2 = 1;
                            ?>

                        <?php else: ?>

                            <div class="turno">
                                <i class="fa-solid fa-calendar"></i>
                            </div>

                        <?php endif; ?>

                        <div><?php echo htmlspecialchars($cita['date'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                        <div><?php echo htmlspecialchars($cita['time'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>

                        <?php if ($ctrl1 != 1): ?>
                            <div class="delturno pointer" onclick="eliminar(<?php echo $citaId; ?>)">
                                <i class="fa-solid fa-calendar-xmark"></i>
                            </div>
                        <?php else: ?>
                            <div class="delturnoget"></div>
                        <?php endif; ?>

                    </div>

                    <?php if ($ctrl1 == 1): ?>

                        <?php
                        $memo = "Cita sin nota anexa.";

                        $jsonDetalle = @file_get_contents($serviceUrl . "/ws/detalleCita.php?id=" . urlencode($citaId));
                        $detalle = json_decode($jsonDetalle, true);

                        if ($jsonDetalle !== false && $detalle != 'error' && !empty($detalle) && is_array($detalle)) {
                            $memo = $detalle[0]['memo'] ?? "Cita sin nota anexa.";
                        }
                        ?>

                        <div class="reservado" id="reservado<?php echo $citaId; ?>">
                            <div class="col col-around mt10">
                                <div><?php echo htmlspecialchars($cita['date'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                <div><?php echo htmlspecialchars($cita['time'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                            </div>

                            <div class="pa10">
                                <span>
                                    <b>
                                        <?php
                                        echo htmlspecialchars(
                                            ($cita['nombre'] ?? '') . ' ' . ($cita['apellido'] ?? ''),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                        ?>
                                    </b>
                                </span>
                                <br>

                                <span class="block fs08 mt10">
                                    <?php echo htmlspecialchars($memo, ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </div>

                            <div id="botonesTurno">
                                <div class="col col-around fs07 mb10">

                                    <?php if ($ctrl2 == 0): ?>
                                        <div class="botonAux_blue" onclick="transferir(<?php echo $citaId; ?>,<?php echo $id; ?>)">TRANSFERIR</div>
                                        <div class="botonAux_blue" onclick="cancelar(<?php echo $citaId; ?>)">CANCELAR</div>
                                    <?php endif; ?>

                                    <div class="botonAux_blue" onclick="mensaje(<?php echo $citaId; ?>,2)">MENSAJE</div>
                                </div>

                                <div class="col col-around fs07 mb10">
                                    <?php if ($ctrl2 == 0): ?>
                                        <div class="botonAux_blue" onclick="ausente(<?php echo $citaId; ?>)">AUSENTE</div>
                                    <?php endif; ?>
                                </div>

                                <div id="ventanaAux<?php echo $citaId; ?>"></div>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

            <?php
            $libre = 0;
            $ocupado = 0;

            $jsonTorta = @file_get_contents($serviceUrl . "/ws/torta.php?id=" . urlencode($id));
            $torta = json_decode($jsonTorta, true);

            if ($jsonTorta !== false && is_array($torta)) {
                $libre = (int)($torta[0] ?? 0);
                $ocupado = (int)($torta[1] ?? 0);
            }
            ?>

            <div id="piechart" style="width: 400px; height: 200px;"></div>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    packages: ['corechart']
                });

                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Citas futuras'],
                        ['Disponibles', <?php echo (int) $libre; ?>],
                        ['Ocupados', <?php echo (int) $ocupado; ?>]
                    ]);

                    var options = {
                        title: 'Estados de las citas por porcentaje'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>

        <?php endif; ?>

    </div>

    <?php include 'templates/menuadm.php'; ?>
</div>

</body>
</html>