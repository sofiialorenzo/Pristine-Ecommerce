<?php

$categorias = (new CategoriaSecundaria())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">ADMINISTRACIÓN DE CATEGORÍAS SECUNDARIAS</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Categorias</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria) { ?>
                    <tr>
                        <td><?= $categoria->getNombre() ?> </td>
                        <td>
                            <a href="index.php?sec=edit_categoria&id=<?= $categoria->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_categoria&id=<?= $categoria->getId() ?>" class="d-block btn btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_categoria" class="btn mt-5">Agregar categoria</a>

        </div>
    </div>
</div>
