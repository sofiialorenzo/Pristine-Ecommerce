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
        <div class="col-md-6" id="foto_skincare">
            <img src="img/home/mujer_home.jpeg" alt="Mujer aplicando un hidratante" class="img-fluid pr-md-3">
        </div>
        <div class="col-md-6" id="divInfo">
            <p>¿Por qué Pristine?</p>
            <h2 id="tituloContenido1">En Pristine, nos complace ofrecer una variedad excepcional de productos de cuidado de la piel de alta calidad, seleccionados de las marcas más prestigiosas del mundo.</h2>
        </div>
    </div>   
</div>

<div class="container mb-5" id="containerInfo2">
    <div class="row" id="container2">
        <div class="col-md-6 col-xl-3 detalles">
        <span class="material-symbols-outlined detalles-icon">shopping_cart</span>
        <p>Ten el control de tu compra desde que la realizas hasta que la tienes en tus manos.</p>
        </div>

        <div class="col-md-6 col-xl-3 detalles">
        <span class="material-symbols-outlined detalles-icon">done_all</span>
        <p>Estamos contigo desde el momento en que haces tu compra hasta que recibes el producto. Si no cumple con tus expectativas, te devolvemos el dinero.</p>
        </div>

        <div class="col-md-6 col-xl-3 detalles">
        <span class="material-symbols-outlined detalles-icon">shoppingmode</span>
        <p>Encuentra las mejores promociones y novedades especialmente creadas para ti.</p>
        </div>
        
    </div>   
</div>

<div class="container mb-5" id="containerNews">
    <div class="row" id="container3">
        <div id="divNews">
            <h2>¿Quieres estar al día con nuestras últimas novedades? ¡Suscríbete a nuestro Newsletter!</h2>
<form action="views/procesar_newsletter.php" enctype="multipart/form-data" method="POST">
<div class="container containerForm">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="InputNombre" name="nombre" required>
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="InputApellido" name="apellido" required>
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">Correo Electrónico</label>
    <input type="mail" class="form-control" id="InputCorreo"  name="correo" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="check">Acepto los términos y condiciones</label>
  </div>
  <button type="submit" class="btn fw-bold">Enviar</button>
  </div>
</form>

<div class="container" id="containerAlumna">
  <div class="row">
    <div class="col-md-6">
    <picture>
          <source srcset="./img/Sofia_Lorenzo.jpeg" type="image/svg+xml">
          <img src="./img/Sofia_Lorenzo.jpeg" class="img-fluid" alt="Sofía Lorenzo">
        </picture>
    </div>
    <div class="col-md-6">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">Sofía Lorenzo</li>
      <li class="list-group-item">20 años</li>
      <li class="list-group-item">sofia.lorenzo@davinci.edu.ar</li>

    </div>
  </div>
</div>
        </div>
    </div>   
</div>


