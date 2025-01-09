<?php
require_once "../functions/autoload.php";

if (!isset($_GET['usuario_id'])) {
    (new Alerta())->add_alerta("ID de usuario no proporcionado", "danger");
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
    <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900">Compras del Usuario</h1>

    <?php if (!empty($compras)) : ?>
        <div class="hidden lg:block overflow-x-auto shadow-lg rounded-lg bg-white mb-6">
            <table class="min-w-full table-auto">
                <thead class="bg-violet-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-800">ID de Compra</th>
                        <th class="px-4 py-2 text-left text-gray-800">ID del Producto</th>
                        <th class="px-4 py-2 text-left text-gray-800">Producto</th>
                        <th class="px-4 py-2 text-left text-gray-800">Cantidad</th>
                        <th class="px-4 py-2 text-left text-gray-800">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra) : ?>
                        <tr class="border-b hover:bg-violet-50">
                            <td class="px-4 py-3"><?= $compra['id'] ?></td>
                            <td class="px-4 py-3"><?= $compra['producto_id'] ?></td>
                            <td class="px-4 py-3"><?= $compra['nombreProducto'] ?></td>
                            <td class="px-4 py-3"><?= $compra['cantidad'] ?></td>
                            <td class="px-4 py-3">$<?= $compra['total'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- mobile -->
        <div class="lg:hidden grid gap-6 mt-6">
            <?php foreach ($compras as $compra) { ?>
                <div class="p-4 shadow-lg rounded-lg bg-white">
                    <div class="flex flex-col space-y-4">
                        <h5 class="text-xl font-semibold text-gray-800">Compra ID: <?= $compra['id'] ?></h5>
                        <p class="text-sm text-gray-500"><strong>ID Producto:</strong> <?= $compra['producto_id'] ?></p>
                        <p class="text-sm text-gray-600"><strong>Producto:</strong> <?= $compra['nombreProducto'] ?></p>
                        <p class="text-sm text-gray-600"><strong>Cantidad:</strong> <?= $compra['cantidad'] ?></p>
                        <p class="text-sm text-gray-600"><strong>Total:</strong> $<?= $compra['total'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php else : ?>
        <p class="text-center text-gray-600 text-xl">No se encontraron compras para este usuario.</p>
    <?php endif; ?>
</div>
