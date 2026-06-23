<?php
/* 
// Actualización Junio 2026
Listado de consejeros
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = $con->prepare("
        SELECT
            id,
            name,
            last,
            mail,
            gmail,
            meet,
            addr,
            dpto,
            city,
            phone
        FROM
            consejero
        ORDER BY
            name ASC,
            last ASC
    ");

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}