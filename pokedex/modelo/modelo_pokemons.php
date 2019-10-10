<?php
include_once("helpers/conexion.php");

function getPokemons()
{
    $conn = getConexion();
    $query = "SELECT * FROM pokemon ORDER BY numero";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['numero'] = $row['numero'];
            $element['nombre'] = $row['nombre'];
            $element['tipo'] = $row['tipo'];
            $element['imagen'] = $row['imagen'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function searchPokemon($nombre)
{
    $conn = getConexion();
    $query = "SELECT * FROM pokemon WHERE nombre LIKE '%$nombre%' ORDER BY numero;";
    $result = execute_query($conn, $query);
    $resultArray = Array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $element = Array();
            $element['id'] = $row['id'];
            $element['numero'] = $row['numero'];
            $element['nombre'] = $row['nombre'];
            $element['tipo'] = $row['tipo'];
            $element['imagen'] = $row['imagen'];
            $resultArray[] = $element;
        }
    }
    return $resultArray;
}

function postPokemon($numero, $nombre, $tipo, $imagen)
{
    $conn = getConexion();
    $query = "INSERT INTO pokemon (numero, nombre, tipo, imagen) VALUES ($numero, '$nombre', $tipo, '$imagen');";
    execute_query($conn, $query);
}

function deletePokemon($id)
{
    $conn = getConexion();
    $query = "DELETE FROM pokemon WHERE numero = $id;";
    execute_query($conn, $query);
}

function updatePokemon($id, $numero, $nombre, $tipo, $imagen = null)
{
    $conn = getConexion();
    if (!is_null($imagen)) {
        $query = "UPDATE pokemon SET numero=$numero, nombre='$nombre', tipo=$tipo, imagen='$imagen' WHERE numero=id;";
    } else {
        $query = "UPDATE pokemon SET numero=$numero, nombre='$nombre', tipo=$tipo WHERE numero=$id;";
    }
    execute_query($conn, $query);
}

?>