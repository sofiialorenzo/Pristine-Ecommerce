<?php

$miCarrito = new Carrito();
$items = ($miCarrito)->getCarrito_Usuario();

?>
<section class="container mx-auto py-20 px-4">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Carrito de Compras</h1>
    
    <?= (new Alerta())->get_alertas() ?>

    <?php if (count($items)) { ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de productos -->
            <div class="lg:col-span-2 space-y-6">
                <?php foreach ($items as $item) { ?>
                    <div class="flex items-center bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                        <img 
                            src="img/productos/<?= $item['imagen']; ?>" 
                            alt="<?= $item['nombreProducto']; ?>" 
                            class="w-24 h-24 object-cover rounded-md mr-4"
                        >
                        <div class="flex-1">
                            <h2 class="text-lg font-bold text-gray-800"><?= $item['nombreProducto']; ?></h2>
                            <p class="text-sm text-gray-500">Precio Unitario: $<?= $item['precio']; ?></p>
                            <p class="text-sm text-gray-500">Subtotal: $<?= $item['precio'] * $item['cantidad']; ?></p>
                        </div>
                        <div class="flex flex-col items-center">
                            <input 
                                type="number" 
                                value="<?= $item['cantidad']; ?>" 
                                name="c[<?= $item['producto_id'] ?>]" 
                                class="w-16 text-center py-1 px-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"
                            >
                            <a 
                                href="admin/actions/remove_item_acc.php?id=<?= $item['producto_id'] ?>" 
                                class="mt-2 text-red-500 text-sm hover:underline"
                            >
                                Eliminar
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Resumen del carrito -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Resumen</h2>
                <div class="flex justify-between items-center mb-4">
                    <p class="text-gray-600">Total:</p>
                    <p class="text-lg font-bold text-gray-900">$<?= $miCarrito->getTotal_Usuario(); ?></p>
                </div>
                <div class="space-y-4">
                    <a 
                        href="admin/actions/update_carrito_acc.php"
                        class="w-full inline-block text-center px-6 py-2 bg-violet-500 text-white font-medium rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-600 hover:text-violet-600 transition"
                    >
                        Actualizar Cantidades
                    </a>
                    <a 
                        href="index.php?sec=catalogo"
                        class="w-full inline-block text-center px-6 py-2 bg-violet-600 text-white font-medium rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-700 hover:text-violet-700 transition"
                    >
                        Seguir Comprando
                    </a>
                    <a 
                        href="admin/actions/vaciar_carrito_acc.php"
                        class="w-full inline-block text-center px-6 py-2 bg-violet-700 text-white font-medium rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-800 hover:text-violet-800 transition"
                    >
                        Vaciar Carrito
                    </a>
                    <a 
                        href="admin/actions/finalizar_compra_acc.php"
                        class="w-full inline-block text-center px-6 py-2 bg-violet-900 text-white font-medium rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 transition"
                    >
                        Finalizar Compra
                    </a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="text-center">
            <p class="text-lg text-gray-700">No hay productos en el carrito</p>
            <a 
                href="index.php?sec=catalogo" 
                class="mt-6 inline-block px-6 py-2 bg-violet-900 text-white font-medium rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 transition"
            >
                Seguir Comprando
            </a>
        </div>
    <?php } ?>
</section>


