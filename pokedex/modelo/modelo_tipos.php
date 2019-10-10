<?php
include_once("helpers/conexion.php");

function getTipos()
{
    $conn = getConexion();
    $query = "SELECT * FROM tipo ORDER BY descripcion";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['descripcion'] = $row['descripcion'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function getTipoId($descripcion)
{
    $conn = getConexion();
    $query = "SELECT * FROM tipo WHERE descripcion LIKE '$descripcion';";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['id'];
}

function getTipoDescripcion($id)
{
    $conn = getConexion();
    $query = "SELECT * FROM tipo WHERE id = $id;";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['descripcion'];
}

function postTipo($descripcion)
{
    $conn = getConexion();
    $query = "INSERT INTO tipo (descripcion) VALUES ('$descripcion');";
    execute_query($conn, $query);
}

?>
