<?php
$productos = (new Producto())->catalogo_vegano();
?>

<h2 class="text-center my-5 fs-sm-4"> Productos Veganos </h2>
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
            <li class="list-group-item">Marca: <?= $producto->getMarcaProducto() ?></li>
            <li class="list-group-item">Contenido Neto: <?= $producto->getContenidoNeto() ?></li>
            <li class="list-group-item">Categoria: <?= $producto->getCategoria() ?></li>
            <li class="list-group-item">Categorias secundarias: <?= $producto->getNombresCatSecundarias(); ?></li>
        </ul>
        <div class="card-body">
            <div class="fs-3 mb-3 fw-bold text-center">$<?= $producto->getPrecio() ?></div>
            <a href="index.php?sec=producto&id=<?=$producto->getId()?>" class="btn w-100 fw-bold">COMPRAR</a>
        </div>
    </div>
</div>

<?php } ?>
</div>
</div>