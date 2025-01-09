<?php

$usuarios = (new Usuario())->catalogo_completo();

?>
<div class="container mx-auto px-4 py-28">
    <?= (new Alerta())->get_alertas() ?>
    <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900" id="adminUsuariosTitle">Administración de Usuarios</h1>

    <div class="hidden lg:block overflow-x-auto shadow-lg rounded-lg bg-white" aria-labelledby="adminUsuariosTitle">
        <table class="min-w-full table-auto" aria-describedby="tablaUsuariosDescription">
            <thead class="bg-violet-200">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-800">ID</th>
                    <th class="px-4 py-2 text-left text-gray-800">Email</th>
                    <th class="px-4 py-2 text-left text-gray-800">Nombre de Usuario</th>
                    <th class="px-4 py-2 text-left text-gray-800">Nombre Completo</th>
                    <th class="px-4 py-2 text-left text-gray-800">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr class="border-b hover:bg-violet-50">
                        <td class="px-4 py-3"><?= $usuario->getId() ?></td>
                        <td class="px-4 py-3"><?= $usuario->getEmail() ?></td>
                        <td class="px-4 py-3"><?= $usuario->getNombreUsuario() ?></td>
                        <td class="px-4 py-3"><?= $usuario->getNombre_completo() ?></td>
                        <td class="px-4 py-3 space-y-2">
                            <a href="index.php?sec=compras_usuarios&usuario_id=<?= $usuario->getId() ?>"
                               class="block bg-violet-800 text-white font-semibold py-3 px-6 rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-900 hover:text-violet-900 text-center"
                               aria-label="Ver compras de <?= $usuario->getNombreUsuario() ?>">
                                Ver Compras
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- mobile -->
    <div class="grid gap-6 mt-6 lg:hidden">
        <?php foreach ($usuarios as $usuario) { ?>
            <div class="p-4 shadow-lg rounded-lg bg-white flex flex-col space-y-4" aria-labelledby="usuario<?= $usuario->getId() ?>Title">
                <h5 class="text-xl font-semibold text-gray-800" id="usuario<?= $usuario->getId() ?>Title"><?= $usuario->getNombreUsuario() ?></h5>
                <p class="text-sm text-gray-500"><?= $usuario->getEmail() ?></p>
                <p class="text-sm text-gray-600"><strong>Nombre Completo:</strong> <?= $usuario->getNombre_completo() ?></p>
                <div class="flex space-x-4">
                    <a href="index.php?sec=compras_usuarios&usuario_id=<?= $usuario->getId() ?>" 
                       class="px-4 py-2 text-white bg-violet-600 hover:bg-violet-700 rounded w-full text-center"
                       aria-label="Ver compras de <?= $usuario->getNombreUsuario() ?>">
                        Ver Compras
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
