<?php
require_once __DIR__ . "/../functions/autoload.php";
$categoriaSeleccionada = $_GET['categoria'];
$productos = (new Producto())->catalogo_x_categoria($categoriaSeleccionada);
?>

<section class="py-28 sm:mx-8 lg:mx-24">
    <div class="text-center mb-12">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900"><?= $productos[0]->modificacionTitulo() ?></h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mx-10">
        <?php if (empty($productos)) { ?>
            <p class="text-center col-span-full text-gray-800">No hay productos disponibles en esta categoría.</p>
        <?php } else { ?>
            <?php foreach ($productos as $producto) { ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img 
                            class="w-full h-48 object-contain mx-auto" 
                            src="img/productos/<?= $producto->getImagen() ?>" 
                            alt="<?= $producto->getnombreProducto() ?>">
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800"><?= $producto->getnombreProducto() ?></h2>
                        <p class="text-sm text-gray-600 mt-2"><?= $producto->descripcionCorta() ?></p>
                    </div>
                    <div class="border-t border-gray-200">
                        <div class="px-6 py-4 text-lg font-medium text-gray-800">$<?= $producto->getPrecio() ?></div>
                        <div class="px-6 pb-6">
                            <a 
                                href="index.php?sec=producto&id=<?= $producto->getId() ?>" 
                                class="block text-center text-sm font-semibold text-violet-900 hover:text-violet-600 mt-2">
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
