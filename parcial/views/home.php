<?php
require_once __DIR__ . "/../functions/autoload.php";
$productosMasVendidos = (new Producto())->bestSellers();
?>
<div class="container" id="containerBanner">
    <img src="img/home/banner_home.jpg" alt="Banner aplicacion Pristine" class="img-fluid">
</div>

<div class="container" id="containerBest">
    <h2 class="fs-sm-4">Bestseller</h2>
    <div class="row">
<?php foreach($productosMasVendidos as $producto) { ?>
    <div class="col-md-6 col-xl-3 mt-5">
    <div class="mb-3 productoBestDiv">
    <a href="index.php?sec=producto&id=<?=$producto->getId()?>"><img class="card-img-top productoBest" src="img/productos/<?= $producto->getImagen() ?>"></a>
        <div>
            <h3 class="fw-bold text-center"><?= $producto->getnombreProducto() ?></h3>
        </div>
    </div>
</div>

<?php } ?>
    </div>
</div>

<div class="container mb-5" id="containerInfo">
    <div class="row" id="container1">
        <div class="col-md-6">
            <img src="img/home/mujer_home.jpeg" alt="Mujer aplicando un hidratante" class="img-fluid pr-md-3">
        </div>
        <div class="col-md-6" id="divInfo">
            <p>¿Por qué Pristine?</p>
            <h2 id="tituloContenido1">En Pristine, nos complace ofrecer una variedad excepcional de productos de cuidado de la piel de alta calidad, seleccionados de las marcas más prestigiosas del mundo.</h2>
        </div>
    </div>   
</div>


