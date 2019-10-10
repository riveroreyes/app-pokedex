<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['numero']) && isset($_FILES['imagen'])) {
        $numero = $_POST['numero'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];

        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $fileSize = $_FILES['imagen']['size'];
        $fileType = $_FILES['imagen']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = 'public/img/uploaded/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                postPokemon($numero, $nombre, getTipoId($tipo), "/" . $dest_path);
                header("Location: /");
            } else {
                $message = 'Ocurrió un error al querer subir el archivo.';
            }
        } else {
            $message = 'El formato de imagen que desea subir no es válido.';
        }
    }
} elseif ((isset($_POST['cancel']))) {
    header("Location: /");
}
?>

<form action="alta" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputNumero">Número</label>
            <input type="text" class="form-control" id="inputNumero" name="numero" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputNombre">Nombre</label>
            <input type="text" class="form-control" id="inputNombre" name="nombre" required>
        </div>
        <div class="form-group col-md-2">
            <label for="inputTipo">Tipo</label>
            <select id="inputTipo" class="form-control" name="tipo" required>
                <option selected>Elegir...</option>
                <?php
                foreach ($tipos as $tipo) {
                    echo "<option>" . $tipo['descripcion'] . "</option>";
                };
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
            <?php
            if (isset($message)) {
                echo "<label class='text-danger'>" . $message . "</label>";
            }
            ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Crear</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
    </button>
</form>