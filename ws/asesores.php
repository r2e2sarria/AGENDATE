<?php
/* 
// Actualización Junio 2026
Listado de citas de un consejero
a partir de la fecha de hoy
*/

require_once __DIR__ . "/../config.php";

header('Content-Type: application/json; charset=utf-8');

$email = $_GET['email'] ?? '';
$phone = $_GET['phone'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

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
    ");

    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':phone', $phone, PDO::PARAM_STR);

    $sql->execute();

    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!$resultado) {
        echo json_encode("error");
        exit();
    }

    echo json_encode($resultado);
    exit();
}


