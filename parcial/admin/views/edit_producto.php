<?php
$categorias = (new Categoria())->catalogo_completo();
$marcas = (new Marca())->catalogo_completo();
$producto = (new Producto())->catalogo_x_id($_GET["id"]);


?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de producto</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_producto_acc.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input class="form-control" type="text" name="nombreProducto" value="<?= $producto->getnombreProducto() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoria principal</label>
                    <select class="form-select" name="categoria_id" id="categoria_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($categorias as $categoria) { ?>
                        <option <?= $categoria->getId() == $producto->getCategoria() ? "selected" : "" ?> value="<?= $categoria->getId() ?>"><?= $categoria->getNombreCategoria() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Marca</label>
                    <select class="form-select" name="marca_id" id="marca_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($marcas as $marca) { ?>
                        <option <?= $marca->getId() == $producto->getMarcaProducto() ? "selected" : "" ?> value="<?= $marca->getId() ?>"><?= $marca->getMarcaCompleta() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contenido Neto</label>
                    <input class="form-control" type="text" name="contenidoNeto" value="<?= $producto->getContenidoNeto() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">precio</label>
                    <input class="form-control" type="text" name="precio" value="<?= $producto->getPrecio() ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen Actual</label>
                    <img class="img-fluid rounded shadow-sm d-block" src="../img/productos/<?= $producto->getImagen() ?>" alt="">
                    <input class="form-control" type="hidden" name="imagen_og" value="<?= $producto->getImagen() ?>">
                </div>     

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Reemplazar Portada</label>
                    <input class="form-control" type="file" name="imagen" >
                </div>
                <div class="col-md-12 mb-3" id="divDescripcion">
                    <label class="form-label mb-5" for="">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="7"><?=$producto->getDescripcion()?></textarea>
                </div>
                <button class="btn" type="submit">Editar</button>
            </form>
        </div>
    </div>
</div>
