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
<section class="py-28 sm:mx-8 lg:mx-24">
  <div class="text-center mb-12">
    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">Cuidado de la piel</h1>
    <p class="text-base text-gray-500 mt-2">Explora nuestra exclusiva selección de productos.</p>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mx-10">
    <?php if (empty($productos)) { ?>
      <p class="text-center col-span-full text-gray-800">No hay productos disponibles en este momento.</p>
    <?php } else { ?>
      <?php foreach ($productos as $producto) { ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="relative">
            <a href="index.php?sec=producto&id=<?= $producto->getId() ?>">
            <img 
              class="w-full h-48 object-contain z-10 relative" 
              src="img/productos/<?= $producto->getImagen() ?>" 
              alt="<?= $producto->getnombreProducto() ?>">
              </a>
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

