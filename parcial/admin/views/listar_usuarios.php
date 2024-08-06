<?php

require_once '../functions/autoload.php';

$usuarios = (new Usuario())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">USUARIOS REGISTRADOS</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nombre de usuario</th>
                        <th>Nombre completo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <td><?= $usuario->getId() ?> </td>
                        <td><?= $usuario->getEmail() ?> </td>
                        <td><?= $usuario->getNombreUsuario() ?> </td>
                        <td><?= $usuario->getNombre_completo() ?> </td>
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
