<?php

$marcas = (new Marca())->catalogo_completo();

?>
<div class="container mx-auto px-4 py-28">
    <?= (new Alerta())->get_alertas() ?>
    <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900">Administración de Marcas</h1>
    <div class="hidden lg:block overflow-x-auto shadow-lg rounded-lg bg-white">
        <table class="min-w-full table-auto">
            <thead class="bg-violet-200">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-800">Nombre de la marca</th>
                    <th class="px-4 py-2 text-left text-gray-800">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $marca) { ?>
                    <tr class="border-b hover:bg-violet-50">
                        <td class="px-4 py-3"><?= $marca->getMarcaCompleta() ?></td>
                        <td class="px-4 py-3 space-y-2">
                            <a href="index.php?sec=delete_marca&id=<?= $marca->getId() ?>" 
                            class="block bg-violet-800 text-white font-semibold py-3 px-2 rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-900 hover:text-violet-900 text-center">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!--mobile -->
    <div class="grid gap-6 mt-6 lg:hidden">
        <?php foreach ($marcas as $marca) { ?>
            <div class="p-4 shadow-lg rounded-lg bg-white flex flex-col space-y-4">
                <div>
                    <h5 class="text-xl font-semibold text-gray-800"><?= $marca->getMarcaCompleta() ?></h5>
                </div>
                <div class="flex space-x-4">
                    <a href="index.php?sec=delete_marca&id=<?= $marca->getId() ?>" 
                    class="px-4 py-2 bg-violet-800 text-white font-semibold rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-900 hover:text-violet-900 w-full text-center">
                        Eliminar
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="mt-8 text-center">
        <a href="index.php?sec=add_marca" class="inline-block mt-6 bg-violet-900 hover:bg-violet-950 text-white font-semibold py-3 px-6 rounded-lg transition">
            Agregar Marca
        </a>
    </div>
</div>
