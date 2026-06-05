<?php
/*
 Actualización Junio 2026
 Funciones auxiliares para PDO
*/

/**
 * Genera los parámetros para un UPDATE
 *
 * Ejemplo:
 * nombre=:nombre, email=:email
 */
function getParams(array $input): string
{
    $filterParams = [];

    foreach ($input as $param => $value) {
        $filterParams[] = "{$param}=:{$param}";
    }

    return implode(', ', $filterParams);
}

/**
 * Asocia todos los parámetros a una sentencia PDO
 */
function bindAllValues(PDOStatement $statement, array $params): PDOStatement
{
    foreach ($params as $param => $value) {
        $statement->bindValue(':' . $param, $value);
    }

    return $statement;
}