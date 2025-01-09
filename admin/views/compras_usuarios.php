<?php
require_once "../functions/autoload.php";

if (!isset($_GET['usuario_id'])) {
    (new Alerta())->add_alerta("ID de usuario no proporcionado", "error");
    header("Location: index.php");
    exit();
}

$usuario_id = intval($_GET['usuario_id']);

$conexion = Conexion::getConexion();
$query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
$PDOStatement = $conexion->prepare($query);
$PDOStatement->execute(['usuario_id' => $usuario_id]);
$compras = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto px-4 py-28">
    <?= (new Alerta())->get_alertas() ?>
    <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900" id="compras-usuario">Compras del Usuario</h1>

    <?php if (!empty($compras)) : ?>
        <div class="hidden lg:block overflow-x-auto shadow-lg rounded-lg bg-white mb-6" aria-labelledby="compras-usuario">
            <table class="min-w-full table-auto" aria-describedby="compras-usuario">
                <thead class="bg-violet-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-800" scope="col" aria-label="ID de la compra">ID de Compra</th>
                        <th class="px-4 py-2 text-left text-gray-800" scope="col" aria-label="ID del producto">ID del Producto</th>
                        <th class="px-4 py-2 text-left text-gray-800" scope="col" aria-label="Nombre del producto">Producto</th>
                        <th class="px-4 py-2 text-left text-gray-800" scope="col" aria-label="Cantidad comprada">Cantidad</th>
                        <th class="px-4 py-2 text-left text-gray-800" scope="col" aria-label="Total de la compra">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra) : ?>
                        <tr class="border-b hover:bg-violet-50">
                            <td class="px-4 py-3" aria-label="ID de la compra"><?= $compra['id'] ?></td>
                            <td class="px-4 py-3" aria-label="ID del producto"><?= $compra['producto_id'] ?></td>
                            <td class="px-4 py-3" aria-label="Nombre del producto"><?= $compra['nombreProducto'] ?></td>
                            <td class="px-4 py-3" aria-label="Cantidad comprada"><?= $compra['cantidad'] ?></td>
                            <td class="px-4 py-3" aria-label="Total de la compra">$<?= $compra['total'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- mobile -->
        <div class="lg:hidden grid gap-6 mt-6" aria-labelledby="compras-usuario">
            <?php foreach ($compras as $compra) { ?>
                <div class="p-4 shadow-lg rounded-lg bg-white" aria-labelledby="compra-<?= $compra['id'] ?>">
                    <div class="flex flex-col space-y-4">
                        <h5 class="text-xl font-semibold text-gray-800" id="compra-<?= $compra['id'] ?>" aria-label="Compra ID: <?= $compra['id'] ?>">Compra ID: <?= $compra['id'] ?></h5>
                        <p class="text-sm text-gray-500" aria-label="ID Producto"><strong>ID Producto:</strong> <?= $compra['producto_id'] ?></p>
                        <p class="text-sm text-gray-600" aria-label="Nombre del Producto"><strong>Producto:</strong> <?= $compra['nombreProducto'] ?></p>
                        <p class="text-sm text-gray-600" aria-label="Cantidad comprada"><strong>Cantidad:</strong> <?= $compra['cantidad'] ?></p>
                        <p class="text-sm text-gray-600" aria-label="Total de la compra"><strong>Total:</strong> $<?= $compra['total'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php else : ?>
        <p class="text-center text-gray-600 text-xl" aria-live="polite">No se encontraron compras para este usuario.</p>
    <?php endif; ?>
</div>
