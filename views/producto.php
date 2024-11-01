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

<div class="container" id="containerProducto">
<h2 class="text-center"><?= $producto->getnombreProducto() ?></h2>
    <div class="row">
        <div class="col">
        <img class="card-img-top" src="img/productos/<?= $producto->getImagen() ?>">
        </div>
        <div class="col" id="contProducto">
            
            <div id="descripcion">
                <p><?= $producto->getDescripcion() ?></p>
                <ul class="list-group list-group-flush">
                <li class="list-group-item detalle"><b>Marca:</b> <?= $producto->getMarcaProducto() ?></li>
                <li class="list-group-item detalle"><b>Contenido Neto:</b> <?= $producto->getContenidoNeto() ?></li>
                <li class="list-group-item detalle"><b>Categoria:</b> <?= $producto->getCategoria() ?></li>
                <li class="list-group-item detalle"><b>Propiedades:</b> <?= $categorias_secundarias_texto ?></li>
               
                </ul>
            </div>
            <div>
            <div class="fs-3 mt-2 mb-3" id="precio">$<?= $producto->getPrecio() ?></div>
            <form action="admin/actions/add_item_acc.php" method="get">
                <div>
                <label for="" class="form-label">Cantidad:</label>
                <input type="number" name="c" id="c" value="1" class="form-control">
                </div>
                <div>
                    <?php if (isset($_SESSION["login"])) { ?>
                        <input type="submit" value="Agregar al carrito" class="btn" id="btn-detalle">
                    <?php } else{ ?>
                        <a href="index.php?sec=login" class="btn">Agregar al carrito</a>
                    <?php } ?>
                    <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                </div>
                                
                                
                            </form>
        </div>
        </div>
    </div>
</div>