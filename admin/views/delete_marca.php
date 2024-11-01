<?php
$id = $_GET['id'] ?? false;
$marca = (new Marca())->get_x_id($id);
?>

<div class="row my-5 g-3">
    <h1 class="text-center mb-5 fw-bold">Desea Eliminar Marca?</h1>
    <div class="col-12 col-md-6">
        <h2 class="fs-6">Nombre de la marca:</h2>
        <p><?= $marca->getMarcaCompleta() ?></p>
        <a class="d-block btn btn-sm mt-4" href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>">Eliminar</a>
        <a class="d-block btn btn-sm mt-4" href="index.php?sec=dashboard">Cancelar</a>
    </div>

</div>
