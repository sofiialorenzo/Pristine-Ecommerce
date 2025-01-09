<?php

$productos = (new Producto())->catalogo_completo();

?>
<div class="container mx-auto px-4 py-28">
    <?= (new Alerta())->get_alertas() ?>
    <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900" aria-label="Administración de productos">Administración de Productos</h1>
    <div class="hidden lg:block overflow-x-auto shadow-lg rounded-lg bg-white">
        <table class="min-w-full table-auto" aria-label="Lista de productos">
            <thead class="bg-violet-200">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Imagen</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Nombre del producto</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Descripción</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Marca</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Contenido Neto</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Categoría</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Precio</th>
                    <th class="px-4 py-2 text-left text-gray-800" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) { ?>
                    <tr class="border-b hover:bg-violet-50">
                        <td class="px-4 py-3">
                            <img src="../img/productos/<?= $producto->getImagen() ?>" alt="Imagen de <?= $producto->getnombreProducto() ?>" class="h-16 w-16 rounded shadow-sm object-cover">
                        </td>
                        <td class="px-4 py-3"><?= $producto->getnombreProducto() ?></td>
                        <td class="px-4 py-3"><?= $producto->descripcionCorta() ?></td>
                        <td class="px-4 py-3"><?= $producto->getMarcaProducto() ?></td>
                        <td class="px-4 py-3"><?= $producto->getContenidoNeto() ?></td>
                        <td class="px-4 py-3"><?= $producto->getCategoria() ?></td>
                        <td class="px-4 py-3 font-semibold text-violet-900">$<?= $producto->getPrecio() ?></td>
                        <td class="px-4 py-3 space-y-2">
                            <a href="index.php?sec=edit_producto&id=<?= $producto->getId() ?>" 
                               class="block bg-violet-500 text-white font-semibold py-3 px-6 rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-700 hover:text-violet-700 text-center" 
                               aria-label="Editar producto: <?= $producto->getnombreProducto() ?>">
                                Editar
                            </a>
                            <a href="index.php?sec=delete_producto&id=<?= $producto->getId() ?>" 
                               class="block bg-violet-800 text-white font-semibold py-3 px-6 rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-900 hover:text-violet-900 text-center" 
                               aria-label="Eliminar producto: <?= $producto->getnombreProducto() ?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- mobile -->
    <div class="grid gap-6 mt-6 lg:hidden">
        <?php foreach ($productos as $producto) { ?>
            <div class="p-4 shadow-lg rounded-lg bg-white flex flex-col space-y-4" aria-label="Producto: <?= $producto->getnombreProducto() ?>">
                <div class="flex items-center space-x-4">
                    <img src="../img/productos/<?= $producto->getImagen() ?>" class="h-20 w-20 rounded shadow-sm object-cover" alt="Imagen de <?= $producto->getnombreProducto() ?>">
                    <div>
                        <h5 class="text-xl font-semibold text-gray-800"><?= $producto->getnombreProducto() ?></h5>
                        <p class="text-sm text-gray-500"><?= $producto->descripcionCorta() ?></p>
                    </div>
                </div>
                <p class="text-sm text-gray-600"><strong>Marca:</strong> <?= $producto->getMarcaProducto() ?></p>
                <p class="text-sm text-gray-600"><strong>Contenido Neto:</strong> <?= $producto->getContenidoNeto() ?></p>
                <p class="text-sm text-gray-600"><strong>Categorías:</strong> <?= $producto->getCategoria() ?></p>
                <p class="text-lg font-bold text-violet-900">$<?= $producto->getPrecio() ?></p>
                <div class="flex space-x-4">
                    <a href="index.php?sec=edit_producto&id=<?= $producto->getId() ?>" class="px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-700 hover:text-violet-700 w-full text-center" 
                       aria-label="Editar producto: <?= $producto->getnombreProducto() ?>">
                        Editar
                    </a>
                    <a href="index.php?sec=delete_producto&id=<?= $producto->getId() ?>" class="px-4 py-2 bg-violet-800 text-white font-semibold rounded-lg transition hover:bg-transparent hover:outline hover:outline-2 hover:outline-violet-800 hover:text-violet-800 w-full text-center" 
                       aria-label="Eliminar producto: <?= $producto->getnombreProducto() ?>">
                        Eliminar
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="mt-8 text-center">
        <a href="index.php?sec=add_producto" class="inline-block mt-6 bg-violet-900 hover:bg-violet-950 text-white font-semibold py-3 px-6 rounded-lg transition" 
           aria-label="Agregar nuevo producto">
            Agregar Producto
        </a>
    </div>
</div>
