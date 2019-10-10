<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['tipo'])) {
        $descripcion = $_POST['tipo'];

        postTipo($descripcion);
        header("Location: /");
    };
}
?>

<form action="alta" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputTipo">Tipo</label>
            <input type="text" class="form-control" id="inputTipo" name="tipo" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Crear</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.replace('/')" name="cancel">Cancelar
    </button>
</form>