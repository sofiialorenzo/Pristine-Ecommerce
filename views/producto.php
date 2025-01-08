<?php
$id = $_GET['id'];
$producto = (new Producto())->catalogo_x_id($id);
$categorias = (new CategoriaSecundaria())->catalogo_completo();

$categorias_secundarias_nombres = [];
$categorias_secundarias_ids = explode(',', $producto->getCategoriasSecundarias());

foreach ($categorias as $categoria) {
    if (in_array($categoria->getId(), $categorias_secundarias_ids)) {
        $categorias_secundarias_nombres[] = $categoria->getNombre();
    }
}

$categorias_secundarias_texto = implode(', ', $categorias_secundarias_nombres);
?>

<section class="max-w-screen-xl mx-auto p-4 py-28">
    <h1 class="text-center text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-10"><?= $producto->getnombreProducto() ?></h1>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="flex justify-center">
            <img 
                src="img/productos/<?= $producto->getImagen() ?>" 
                alt="<?= $producto->getnombreProducto() ?>" 
                class="rounded-lg shadow-lg max-w-full lg:max-w-lg object-contain bg-white"
            >
        </div>
        <div>
            <div class="mb-6">
                <p class="text-gray-800 leading-relaxed"><?= $producto->getDescripcion() ?></p>
            </div>
            <ul class="divide-y divide-gray-200 mb-6">
                <li class="py-2"><b>Marca:</b> <?= $producto->getMarcaProducto() ?></li>
                <li class="py-2"><b>Contenido Neto:</b> <?= $producto->getContenidoNeto() ?></li>
                <li class="py-2"><b>Categoría:</b> <?= $producto->getCategoria() ?></li>
                <li class="py-2"><b>Propiedades:</b> <?= $categorias_secundarias_texto ?></li>
            </ul>
            <div class="text-2xl font-bold text-gray-900 mb-4">$<?= $producto->getPrecio() ?></div>

            <form action="admin/actions/add_item_acc.php" method="get">
                <div class="mb-4">
                    <label for="c" class="block text-gray-800 font-medium mb-2">Cantidad:</label>
                    <input 
                        type="number" 
                        name="c" 
                        id="c" 
                        value="1" 
                        class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-violet-500 focus:outline-none"
                    >
                </div>
                <div>
                    <?php if (isset($_SESSION["login"])) { ?>
                        <button 
                            type="submit" 
                            class="w-full bg-violet-900 text-white font-semibold py-3 px-6 rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-900 hover:text-violet-900 transition">
                            Agregar al carrito
                        </button>
                    <?php } else { ?>
                        <a 
                            href="index.php?sec=login" 
                            class="w-full block text-center bg-violet-900 text-white font-semibold py-3 px-6 rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-900 hover:text-violet-900 transition">
                            Agregar al carrito
                        </a>
                    <?php } ?>
                    <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                </div>
            </form>
        </div>
    </div>
</section>
