<?php

$marcas = (new Marca())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de marcas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre de la marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $marca) { ?>
                    <tr>
                        <td><?= $marca->getMarcaCompleta() ?> </td>
                        <td>
                            <a href="index.php?sec=delete_marca&id=<?= $marca->getId() ?>" class="d-block btn btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_marca" class="btn mt-5">Agregar marca</a>

        </div>
    </div>
</div>
