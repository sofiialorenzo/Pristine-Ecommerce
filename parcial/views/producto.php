<?php
$id = $_GET['id'];
$producto = (new Producto())->catalogo_x_id($id);
$categorias = (new CategoriaSecundaria())->catalogo_completo();

// Variable para almacenar los nombres de las categorías secundarias seleccionadas
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
    <div class="row">
        <div class="col">
        <img class="card-img-top" src="img/productos/<?= $producto->getImagen() ?>">
        </div>
        <div class="col" id="contProducto">
            <h2><?= $producto->getnombreProducto() ?></h2>
            <div id="descripcion">
                <p><?= $producto->getDescripcion() ?></p>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Marca: <?= $producto->getMarcaProducto() ?></li>
                <li class="list-group-item">Contenido Neto: <?= $producto->getContenidoNeto() ?></li>
                <li class="list-group-item">Categoria: <?= $producto->getCategoria() ?></li>
                <li class="list-group-item">Categorías Secundarias: <?= $categorias_secundarias_texto ?></li>
               
                </ul>
            </div>
            <div>
            <div class="fs-3 mb-3 fw-bold" id="precio">$<?= $producto->getPrecio() ?></div>
            <form action="admin/actions/add_item_acc.php" method="get">
                                <label for="" class="form-label">Cantidad:</label>
                                <input type="number" name="c" id="c" value="1" class="form-control">
                                <input type="submit" value="Comprar" class="btn fw-bold">
                                <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                            </form>
        </div>
        </div>
    </div>
</div>