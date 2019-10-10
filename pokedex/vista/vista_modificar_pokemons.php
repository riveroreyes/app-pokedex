<?php
if (isset($_POST['edit'])) {
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['numero']) && ($_FILES['imagen']['size'] > 0)) {
        $id = $_POST['id'];
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
                updatePokemon($id, $numero, $nombre, getTipoId($tipo), "/" . $dest_path);
                header("Location: /");
            } else {
                $message = 'Ocurrió un error al querer subir el archivo.';
            }
        } else {
            $message = 'El formato de imagen que desea subir no es válido.';
        }
    } elseif (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['numero'])) {
        $id = $_POST['id'];
        $numero = $_POST['numero'];
        $nombre = $_POST['nombre'];
        $tipo = getTipoId($_POST['tipo']);
        updatePokemon($id, $numero, $nombre, $tipo);
        header("Location: /");
    }
} elseif ((isset($_POST['cancel']))) {
    header("Location: /");
} elseif (isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['numero']) && isset($_POST['imagen'])) {
    $numero = $_POST['numero'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $imagen = $_POST['imagen'];
    echo "
<form action='' method='POST' enctype='multipart/form-data'>
    <div class='form-row'>
        <div class='form-group col-md-2'>
            <label for='inputNumero'>Número</label>
            <input type='text' class='form-control' id='inputNumero' name='numero' value='" . $numero . "' required>
            <input type='hidden' name='id' value='" . $numero . "'>
        </div>
        <div class='form-group col-md-4'>
            <label for='inputNombre'>Nombre</label>
            <input type='text' class='form-control' id='inputNombre' name='nombre' value='" . $nombre . "' required>
        </div>
        <div class='form-group col-md-2'>
            <label for='inputTipo'>Tipo</label>
            <select id='inputTipo' class='form-control' name='tipo' required>
                <option selected>" . getTipoDescripcion($tipo) . "</option>
                ";
    foreach ($tipos as $t) {
        if ($t['id'] != $tipo) {
            echo '<option>' . $t['descripcion'] . '</option>';
        }
    };
    echo "
            </select>
        </div>
        <div class='form-group col-md-4'>
            <label for='imagen'>Imagen</label>
            <input type='file' class='form-control-file' id='imagen' name='imagen'>
            ";
    if (isset($message)) {
        echo "<label class='text-danger'>" . $message . "</label>";
    }
} else {
    header("Location: /");
}
?>
</div>
</div>
<button type="submit" class="btn btn-primary" name="edit">Modificar</button>
<button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar</button>
</form>