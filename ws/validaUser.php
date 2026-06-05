<?php
/* 
// Actualización Junio 2026
Servicio para la validación de Usuario
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$mail = $_GET['mail'] ?? '';
$pass = $_GET['pass'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = $con->prepare("
        SELECT
            consejero.*
        FROM
            consejero
        WHERE
            consejero.mail = :mail
            AND consejero.pass = :pass
        LIMIT 1
    ");

    $sql->bindParam(':mail', $mail, PDO::PARAM_STR);
    $sql->bindParam(':pass', $pass, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}


