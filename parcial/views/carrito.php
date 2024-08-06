<?php

$miCarrito = new Carrito();
$items = ($miCarrito)->getCarrito();
?>
<h1>Carrito de compras</h1>
<div class="table-responsive">
    <?= (new Alerta())->get_alertas() ?>
    <?php if( count($items) ){ ?>
<form action="admin/actions/update_carrito_acc.php" method="get">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="15%">Imagen</th>
                    <th scope="col">Datos del producto</th>
                    <th scope="col" width="15%">Cantidad</th>
                    <th scope="col" width="15%">Precio Unitario</th>
                    <th scope="col" width="15%">Subtotal</th>
                    <th scope="col" width="10%">Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaCarrito">
                <?php foreach( $items as $key => $item ) {?>
                    <tr>
                        <td><img class="img-fluid rounded shadow-sm" src="img/productos/<?= $item["imagen"]; ?>" alt="<?= $item["producto"]; ?>" width="50"></td>
                        <td class="align-middle">
                            <p class="h5"><?= $item["producto"]; ?></p>
                        </td>
                        <td>
                            <input type="number" value="<?= $item["cantidad"]; ?>" name="c[<?= $key ?>]" class="form-control">
                        </td>
                        <td class="align-middle"> <p class="h5 py-3"><?= $item["precio"]; ?></p></td>
                        <td class="align-middle"> <p class="h5 py-3"> <?= $item["precio"] * $item["cantidad"]; ?> </p> </td>
                        <td class="text-end align-middle">
                            <a class="btn" href="admin/actions/remove_item_acc.php?id=<?= $key ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?> 
                <tr>
                    <td class="text-end">
                        <h2 class="h5 py-3">Total: </h2>
                    </td>
                    <td>
                        <p class="h5 py-3"><?= $miCarrito->getTotal() ?></p>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex flex-column flex-md-row justify-content-md-end gap-2" id="botonesCarrito">
            <input type="submit" value="Actualizar cantidades" class="btn">
            <a class="btn" href="index.php?sec=catalogo">Seguir Comprando</a>
            <a class="btn"  href="admin/actions/vaciar_carrito_acc.php">Vaciar Carrito</a>
            <a class="btn"  href="">Finalizar Compra</a>
        </div>
    </form>
    <?php }else{ ?>
        <p>No hay productos en el carrito</p>
        <a class="btn" href="index.php?sec=catalogo" id="botonSeguir">Seguir Comprando</a>

    <?php } ?>
</div>
