<?php
require_once __DIR__ . "/../functions/autoload.php";
$categoriaSeleccionada = $_GET['categoria'];
$productos = (new Producto())->catalogo_x_categoria($categoriaSeleccionada);
?>

<h2 class="text-center my-5 fs-sm-4"> <?= $productos[0]->modificacionTitulo() ?> </h2>
<div class="container" id="containerCard">    
<div class="row">
<?php foreach($productos as $producto) { ?>

    
    <div class="col-md-6 col-xl-3 mt-5">
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
        </ul>
        <div class="card-body">
            <div class="fs-3 mb-3 text-center">$<?= $producto->getPrecio() ?></div>
            <a href="index.php?sec=producto&id=<?=$producto->getId()?>" class="btn w-100">VER MÁS</a>
        </div>
    </div>
</div>

<?php } ?>
</div>
</div>