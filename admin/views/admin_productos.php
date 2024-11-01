<?php

$productos = (new Producto())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de productos</h1>
        <div class="row mb-5 d-flex align-items-center d-none d-lg-block"">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" >Marca</th>
                        <th scope="col">Contenido Neto</th>
                        <th scope="col">Categorías</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) {   
                    ?>
                    <tr>
                        <td> <img src="../img/productos/<?= $producto->getImagen() ?>" alt="Imagen del producto" class="img-fluid rounded shadow-sm"> </td>
                        <td><?= $producto->getnombreProducto() ?> </td>
                        <td><?= $producto->descripcionCorta() ?></td>
                        <td> <?= $producto->getMarcaProducto() ?> </td>
                        <td><?= $producto->getContenidoNeto() ?></td>
                        <td><?= $producto->getCategoria() ?></td>
                        <td><?= $producto->getPrecio() ?></td>
                        <td>
                            <a href="index.php?sec=edit_producto&id=<?= $producto->getId() ?>" class="d-block btn btn-sm  botonesEditar">Editar</a>
                            <a href="index.php?sec=delete_producto&id=<?= $producto->getId() ?>" class="d-block btn btn-sm  botonesEliminar">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>

            <div class="d-block d-lg-none">
            <?php foreach ($productos as $producto) { ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="../img/productos/<?= $producto->getImagen() ?>" class="img-fluid rounded-start" alt="Imagen del producto">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $producto->getnombreProducto() ?></h5>
                            <p class="card-text"><?= $producto->descripcionCorta() ?></p>
                            <p class="card-text"><small class="text-muted">Marca: <?= $producto->getMarcaProducto() ?></small></p>
                            <p class="card-text"><small class="text-muted">Contenido Neto: <?= $producto->getContenidoNeto() ?></small></p>
                            <p class="card-text"><small class="text-muted">Categorías: <?= $producto->getCategoria() ?></small></p>
                            <p class="card-text"><small class="text-muted">Precio: <?= $producto->getPrecio() ?></small></p>
                            <a href="index.php?sec=edit_producto&id=<?= $producto->getId() ?>" class="btn btn-sm botonesEditar">Editar</a>
                            <a href="index.php?sec=delete_producto&id=<?= $producto->getId() ?>" class="btn btn-sm botonesEliminar">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <a href="index.php?sec=add_producto" class="btn mt-5">Agregar producto</a>
    </div>
</div>