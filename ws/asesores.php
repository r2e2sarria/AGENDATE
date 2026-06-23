<?php
/* 
// Actualización Junio 2026
Listado de citas de un usuario por email y teléfono
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$email = trim($_GET['email'] ?? '');
$phone = trim($_GET['phone'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (empty($email) || empty($phone)) {
        echo json_encode("error");
        exit();
    }

    $sql = $con->prepare("
        SELECT
            citas.*, 
            consejero.`name`, 
            consejero.last
        FROM
            citas
        INNER JOIN consejero
            ON citas.id_consejero = consejero.id
        WHERE
            citas.email = :email
            AND citas.phone = :phone
        ORDER BY
            citas.date ASC,
            citas.time ASC
    ");

    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->bindValue(':phone', $phone, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (empty($resultado)) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}