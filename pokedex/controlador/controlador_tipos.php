<?php
include_once("/modelo/modelo_tipos.php");

function tipos_index()
{
    $tipos = getTipos();
    include("/vista/vista_tipos.php");
}

function tipos_alta()
{
    include("/vista/vista_alta_tipo.php");
}

?>