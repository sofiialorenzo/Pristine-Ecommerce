<?php

require_once "../functions/autoload.php";

if (!isset($_GET['usuario_id'])) {
    (new Alerta())->add_alerta("ID de usuario no proporcionado", "danger");
    header("Location: index.php"); // Redirige al panel de control
    exit();
}

$usuario_id = intval($_GET['usuario_id']);

$conexion = Conexion::getConexion();
$query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
$PDOStatement = $conexion->prepare($query);
$PDOStatement->execute(['usuario_id' => $usuario_id]);
$compras = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">COMPRAS DEL USUARIO</h1>
        <div class="row mb-5 d-flex align-items-center d-none d-lg-block">
            <?php if (!empty($compras)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID de compra</th>
                            <th scope="col">ID del producto</th>
                            <th scope="col">Nombre del producto</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compras as $compra) { ?>
                        <tr>
                            <td><?= $compra['id']; ?> </td>
                            <td><?= $compra['producto_id']; ?></td>
                            <td><?= $compra['nombreProducto']; ?></td>
                            <td><img src="<?= '../img/productos/' . $compra['imagen']; ?>" alt="Imagen del producto" width="100"></td>
                            <td> <?= $compra['cantidad']; ?> </td>
                            <td><?= $compra['total']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center">No se encontraron compras para este usuario.</p>
            <?php endif; ?>
        </div>
    </div>
</div>