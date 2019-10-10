<?php
include_once("helpers/conexion.php");

function login($user, $password)
{
    $conn = getConexion();
    $query = "SELECT * FROM usuario WHERE user='$user' AND password=PASSWORD('$password');";
    $result = execute_query($conn, $query);
    return mysqli_fetch_assoc($result)['user'];
}

?>