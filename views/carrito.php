<?php
$miCarrito = new Carrito();
if ($miCarrito->usuarioAutenticado()) {
    $items = $miCarrito->getCarrito_Usuario();
    $total = $miCarrito->getTotal_Usuario();
} else {
    $items = [];
    $total = 0;
}
?>
<section class="container mx-auto py-28 px-4">
    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-8 text-center">Carrito de Compras</h1>
    <?= (new Alerta())->get_alertas() ?>
    <?php if (!$miCarrito->usuarioAutenticado()) { ?>
        <div class="text-center py-10 text-base sm:text-lg md:text-xl text-gray-800">
            <p>Por favor, <a href="index.php?sec=login" class="text-violet-800 hover:underline">inicie sesión</a> o <a href="index.php?sec=registro" class="text-violet-800 hover:underline">regístrese</a> para empezar a comprar.</p>
        </div>
    <?php } elseif (count($items)) { ?>
        <form action="admin/actions/update_carrito_acc.php" method="get" class="space-y-6">
            <div class="space-y-4">
                <?php foreach ($items as $item) { ?>
                    <div class="flex flex-col lg:flex-row items-center gap-6 bg-white shadow-lg p-4 rounded-lg">
                        <img src="img/productos/<?= $item["imagen"]; ?>" alt="<?= $item["nombreProducto"]; ?>" class="h-24 w-24 lg:h-32 lg:w-32 object-cover rounded-md">
                        <div class="flex-1 text-center lg:text-left">
                            <p class="text-lg font-bold text-gray-800"><?= $item["nombreProducto"]; ?></p>
                            <p class="text-sm text-gray-600">Precio Unitario: $<?= number_format($item["precio"], 2); ?></p>
                            <p class="text-sm text-gray-600">Subtotal: $<?= number_format($item["precio"] * $item["cantidad"], 2); ?></p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-2">
                            <label for="cantidad_<?= $item['producto_id'] ?>" class="text-sm font-medium text-gray-700">Cantidad:</label>
                            <input 
                                type="number" 
                                name="c[<?= $item['producto_id'] ?>]" 
                                id="cantidad_<?= $item['producto_id'] ?>" 
                                value="<?= $item["cantidad"]; ?>" 
                                min="1"
                                class="w-16 p-1 text-center border border-violet-300 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-500">
                        </div>
                        <a href="admin/actions/remove_item_acc.php?id=<?= $item['producto_id'] ?>" class="text-red-600 hover:text-red-700 text-sm lg:text-base">
                            Eliminar
                        </a>
                        <button type="submit" class="text-violet-600 hover:text-violet-700 text-sm lg:text-base">
                    Actualizar Cantidades
                </button>
                    </div>
                <?php } ?>
            </div>
            <div class="flex flex-col sm:flex-row justify-between bg-violet-50 p-4 rounded-lg shadow-lg mt-6">
                <p class="text-lg font-bold text-violet-900">Total: $<?= number_format($total, 2); ?></p>
            </div>
            <div class="flex flex-col sm:flex-row sm:justify-end gap-4 mt-4">
                <a href="admin/actions/vaciar_carrito_acc.php" class="bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 px-6 rounded-lg text-center">
                    Vaciar carrito
                </a>
                <a href="index.php?sec=catalogo" class="bg-violet-800 hover:bg-violet-900 text-white font-semibold py-3 px-6 rounded-lg text-center">
                    Continuar Comprando
                </a>
                <a href="admin/actions/finalizar_compra_acc.php" class="bg-violet-900 hover:bg-violet-950 text-white font-semibold py-3 px-6 rounded-lg text-center">
                    Finalizar compra
                </a>
            </div>
        </form>
    <?php } else { ?>
        <div class="text-center py-4">
            <p class="mb-10">Tu carrito está vacío.</p>
            <a href="index.php?sec=catalogo" class="bg-violet-900 hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 text-white py-3 px-6 rounded-lg font-semibold">Explorar productos</a>
        </div>
    <?php } ?>
</section>

