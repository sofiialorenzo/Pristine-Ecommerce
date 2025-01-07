<?php
$miCarrito = new Carrito();
$items = $miCarrito->getCarrito_Usuario();
?>
<section class="container mx-auto py-20 px-4">
    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Carrito de Compras</h1>
    <?= (new Alerta())->get_alertas() ?>
    <?php if (count($items)) { ?>
        <form action="admin/actions/update_carrito_acc.php" method="get" class="space-y-6">
            <div class="space-y-4">
                <?php foreach ($items as $item) { ?>
                    <div class="flex flex-col sm:flex-row items-center gap-4 bg-white shadow-lg p-4 rounded-lg">
                        <img src="img/productos/<?= $item["imagen"]; ?>" alt="<?= $item["nombreProducto"]; ?>" class="h-24 w-24 object-cover rounded-md">
                        <div class="flex-1">
                            <p class="text-lg font-bold text-gray-800"><?= $item["nombreProducto"]; ?></p>
                            <p class="text-sm text-gray-600">Precio Unitario: $<?= number_format($item["precio"], 2); ?></p>
                            <p class="text-sm text-gray-600">Subtotal: $<?= number_format($item["precio"] * $item["cantidad"], 2); ?></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <label for="cantidad_<?= $item['producto_id'] ?>" class="text-sm font-medium text-gray-700">Cantidad:</label>
                            <input 
                                type="number" 
                                name="c[<?= $item['producto_id'] ?>]" 
                                id="cantidad_<?= $item['producto_id'] ?>" 
                                value="<?= $item["cantidad"]; ?>" 
                                min="1"
                                class="w-20 p-1 text-center border border-violet-300 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-500">
                        </div>
                        <a href="admin/actions/remove_item_acc.php?id=<?= $item['producto_id'] ?>" class="text-red-600 hover:text-red-700 text-sm">
                            Eliminar
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="flex justify-between items-center bg-violet-50 p-4 rounded-lg shadow-lg mt-6">
                <p class="text-lg font-bold text-violet-900">Total: $<?= number_format($miCarrito->getTotal_Usuario(), 2); ?></p>
            </div>
            <div class="flex flex-col sm:flex-row sm:justify-end gap-4 mt-4">
                <button type="submit" class="bg-violet-600 hover:bg-transparent hover:border-2 hover:border-violet-700 hover:text-violet-700 text-white font-semibold py-3 px-6 rounded-lg">
                    Actualizar Cantidades
                </button>
                <a href="index.php?sec=catalogo" class="bg-violet-700 hover:bg-transparent hover:border-2 hover:border-violet-800 hover:text-violet-800 text-white font-semibold py-3 px-6 rounded-lg">
                    Seguir Comprando
                </a>
                <a href="admin/actions/vaciar_carrito_acc.php" class="bg-violet-800 hover:bg-transparent hover:border-2 hover:border-violet-900 hover:text-violet-900 text-white font-semibold py-3 px-6 rounded-lg">
                    Vaciar Carrito
                </a>
                <a href="admin/actions/finalizar_compra_acc.php" class="bg-violet-900 hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 text-white font-semibold py-3 px-6 rounded-lg">
                    Finalizar Compra
                </a>
            </div>
        </form>
    <?php } else { ?>
        <div class="text-center py-20">
            <p class="text-gray-800 text-xl font-semibold mb-4">Tu carrito está vacío</p>
            <p class="text-gray-700 mb-8">¡Descubre productos increíbles en nuestro catálogo!</p>
            <a href="index.php?sec=catalogo" class="bg-violet-900 hover:bg-violet-950 text-white font-semibold py-3 px-6 rounded-lg shadow-md transform hover:scale-105 transition duration-200 ease-in-out">
                Explorar Productos
            </a>
        </div>
    <?php } ?>
</section>
