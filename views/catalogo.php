<?php
require_once __DIR__ . "/../functions/autoload.php";
$categoriasSecundarias = (new CategoriaSecundaria())->catalogo_completo();
$productos = (new Producto())->catalogo_completo();

$categorias_seleccionadas = $_GET['categorias'] ?? [];

if ($categorias_seleccionadas) {
    $productos = array_filter($productos, function ($producto) use ($categorias_seleccionadas) {
        $productoCategorias = explode(',', $producto->getCategoriasSecundarias());
        return in_array($categorias_seleccionadas, $productoCategorias);
    });
}
?>
<section class="py-20 mx-24">
<h2 class="text-center mt-5 mb-16 text-3xl font-bold text-gray-900">Cuidado de la piel</h2>

<div class="container mx-auto px-4" id="containerCard">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($productos as $producto) { ?>
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <div class="w-full aspect-w-16 aspect-h-9">
                    <img 
                        class="w-full h-full object-contain" 
                        src="img/productos/<?= $producto->getImagen() ?>" 
                        alt="<?= $producto->getnombreProducto() ?>"
                    >
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-900"><?= $producto->getnombreProducto() ?></h3>
                    <p class="text-sm text-gray-700 mt-2"><?= $producto->descripcionCorta() ?></p>
                </div>
                <ul class="divide-y divide-gray-200">
                    <li class="px-4 py-2"><b>Marca:</b> <?= $producto->getMarcaProducto() ?></li>
                    <li class="px-4 py-2"><b>Categoría:</b> <?= $producto->getCategoria() ?></li>
                    <li class="px-4 py-2"><b>Contenido Neto:</b> <?= $producto->getContenidoNeto() ?></li>
                    <li class="px-4 py-2"><b>Propiedades:</b> <?= implode(', ', array_map(function ($categoria) {
                        return $categoria->getNombre();
                    }, $producto->getCategorias_id())) ?></li>
                </ul>
                <div class="p-8 text-center">
                    <div class="text-2xl font-bold text-gray-900 mb-6">$<?= $producto->getPrecio() ?></div>
                    <a href="index.php?sec=producto&id=<?= $producto->getId() ?>" class="w-full text-center mt-6 bg-violet-900 hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 text-white font-semibold py-3 px-6 rounded-lg"> Ver más
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>