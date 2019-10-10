<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        deletePokemon($id);
        header("Location: /");
    };
}

?>
<form class="form-inline mb-2" method="get" action="/pokemons/buscar">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="nombre">
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
</form>
<?php
if (isset($message)) {
    echo "<label class='text-danger'>" . $message . "</label>";
}
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tipo</th>
        <?php
        if (isset($_SESSION['logged']))
            echo "<th scope='col'>Acciones</th>";
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($pokemons as $pokemon) {
        echo "    
        <tr>
            <th scope='row'>" . str_pad($pokemon['numero'], 3, '0', STR_PAD_LEFT) . "</th>
            <td><img alt=" . $pokemon['nombre'] . " src=" . $pokemon['imagen'] . " width='30' height='30'></td>
            <td>" . $pokemon['nombre'] . "</td>
            <td>" . getTipoDescripcion($pokemon['tipo']) . "</td>
            ";
        if (isset($_SESSION['logged'])) {
            echo "
            <td>
                <div class='row'>
                <div class='span6 mr-1'>
                    <form class='form-inline mb-2' action='/pokemons/editar' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='numero' value=" . $pokemon['numero'] . ">
                        <input type='hidden' name='nombre' value=" . $pokemon['nombre'] . ">
                        <input type='hidden' name='tipo' value=" . $pokemon['tipo'] . ">
                        <input type='hidden' name='imagen' value=" . $pokemon['imagen'] . ">
                        <button type='submit' class='btn btn-outline-secondary btn-sm name='edit'>Editar</button>                   
                    </form>          
                </div>
                <div class='span6'>
                    <form class='form-inline mb-2' action='' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value=" . $pokemon['numero'] . ">
                        <button type='button' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#confirmationModal" . $pokemon['nombre'] . "'>Eliminar</button>
                        <!-- Modal -->
                        <div class='modal fade' id='confirmationModal" . $pokemon['nombre'] . "' tabindex'-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Eliminar Pokemon</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        Estás seguro que deseas eliminar a " . $pokemon['nombre'] . "?
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                                        <button type='submit' class='btn btn-danger' name='delete'>Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>              
                </div>
                </div>
            </td>
        </tr>";
        }
    };
    ?>
    </tbody>
</table>