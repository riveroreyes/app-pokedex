<?php
    include_once("modelo/modelo_pokemons.php");
    include_once("modelo/modelo_tipos.php");

    function pokemons_index(){
        $pokemons = getPokemons();
        include("vista/vista_pokemons.php");
    }

    function pokemons_buscar(){
        if ( !empty(searchPokemon($_GET['nombre'])) ) {
            $pokemons = searchPokemon($_GET['nombre']);
        }
        else {
            $pokemons = getPokemons();
            $message = "Pokemon \"" . $_GET['nombre'] . "\" no encontrado.";
        }

        include("vista/vista_pokemons.php");
    }

    function pokemons_editar(){
        $tipos = getTipos();
        include("vista/vista_modificar_pokemons.php");
    }

    function pokemons_alta(){
        $tipos = getTipos();
        include("vista/vista_alta_pokemons.php");
    }
?>