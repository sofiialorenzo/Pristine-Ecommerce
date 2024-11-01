<?php
require_once __DIR__ . "/../functions/autoload.php";
$categoriasSecundarias = (new CategoriaSecundaria())->catalogo_completo();
$productos = ( new Producto() )->catalogo_completo();


$categorias_seleccionadas = $_GET['categorias'] ?? [];

if ($categorias_seleccionadas) {
    $productos = array_filter($productos, function ($producto) use ($categorias_seleccionadas) {
        $productoCategorias = explode(',', $producto->getCategoriasSecundarias());
        return in_array($categorias_seleccionadas, $productoCategorias);
    }); }
?>

<h2 class="text-center my-5 fs-sm-4">Cuidado de la piel</h2>

<div class="container" id="containerCard">
    <div class="row">
<?php  foreach($productos as $producto) { ?>

    <div class="col-sm-12 col-md-6 col-xl-3 mt-5">
    <div class="card mb-3">
        <img class="card-img-top" src="img/productos/<?= $producto->getImagen() ?>">
        <div class="card-body">
            <h3 class="card-title fw-bold"><?= $producto->getnombreProducto() ?></h3>
            <p class="card-text"><?= $producto->descripcionCorta() ?></p>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Marca:</b> <?= $producto->getMarcaProducto() ?></li>
        <li class="list-group-item"><b>Categoria:</b> <?= $producto->getCategoria() ?></li>
        <li class="list-group-item"><b>Contenido Neto:</b> <?= $producto->getContenidoNeto() ?></li>
        <li class="list-group-item"><b>Propiedades:</b> <?= implode(', ', array_map(function ($categoria) {
                                return $categoria->getNombre();
                            }, $producto->getCategorias_id())) ?></li>
        </ul>
        <div class="card-body">
            <div class="fs-3 mb-3 text-center">$<?= $producto->getPrecio() ?></div>
            <a href="index.php?sec=producto&id=<?=$producto->getId()?>" class="btn">VER MÁS</a>
        </div>
    </div>
</div>

<?php } ?>
</div>
</div>