<?php
require_once __DIR__ . "/../functions/autoload.php";
$productosMasVendidos = (new Producto())->bestSellers();
?>
<section>
<div class="relative">
    <figure>
        <video class="w-full h-screen object-cover" autoplay muted loop>
            <source src="img/videos/banner-pristine.mp4" type="video/mp4">
        </video>
    </figure>
    <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white">
        <h1 class="text-4xl md:text-5xl font-bold text-white">Calidad en cuidado de la piel</h1>
        <p class="mt-2 text-lg md:text-xl text-white">Explora una amplia variedad de productos diseñados para cada tipo de piel y necesidad. Todo en un solo lugar.</p>
        <a href="index.php?sec=catalogo" class="mt-8 bg-violet-900 hover:bg-violet-950 text-white py-3 px-6 rounded-lg font-semibold">Explorar productos</a>
    </div>
    </div>
</section>

<section>
<div class="py-20 mx-20" id="containerBest">
    <h2 class="text-3xl font-bold mb-6 text-center">Bestseller</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach($productosMasVendidos as $producto) { ?>
            <div class="productoBestDiv">
                <a href="index.php?sec=producto&id=<?=$producto->getId()?>">
                    <img class="w-full h-auto object-cover" src="img/productos/<?= $producto->getImagen() ?>" alt="<?= $producto->getnombreProducto() ?>">
                </a>
                <div class="mt-3">
                    <h3 class="text-lg font-bold text-center"><?= $producto->getnombreProducto() ?></h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>

<section class="flex justify-center items-center gap-8 mx-20 py-20 md:flex-row flex-col" id="containerInfo">
  <figure class="md:w-1/2 w-full">
    <img src="img/home/mujer_home.jpeg" alt="Mujer" class="rounded">
  </figure>
  <article class="w-3/4">
  <h2 class="text-lg font-semibold pb-0">¿Por qué Pristine?</h2>
  <p class="text-3xl font-bold" id="tituloContenido1">En Pristine, nos complace ofrecer una variedad excepcional de productos de cuidado de la piel de alta calidad, seleccionados de las marcas más prestigiosas del mundo.</p>
  </article>
</section>

<section class="py-20">
  <h2 class="text-center font-bold text-3xl">Nuestros servicios</h2>
  <div class="grid md:grid-cols-3 gap-20 mt-10 mx-20 w-full md:w-4/5 grid-cols-1 mx-auto">
    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">shopping_cart</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2">Ten el control de tu compra desde que la realizas hasta que la tienes en tus manos.</p>
    </article>
    </div>

    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">done_all</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2">Estamos contigo desde el momento en que haces tu compra hasta que recibes el producto. Si no cumple con tus expectativas, te devolvemos el dinero.</p>
    </article>
    </div>

    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">shoppingmode</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2">Encuentra las mejores promociones y novedades especialmente creadas para ti.</p>
    </article>
    </div>

  </div>

</section>
<section class="py-20">
<div class="mx-20" id="containerNews">
    <div class="grid" id="container3">
        <div id="divNews">
            <h2 class="text-2xl font-bold mb-6">¿Quieres estar al día con nuestras últimas novedades? ¡Suscríbete a nuestro Newsletter!</h2>
            <form action="views/procesar_newsletter.php" enctype="multipart/form-data" method="POST" class="space-y-6">
                <div>
                    <label for="nombre" class="block text-lg font-medium mb-2">Nombre</label>
                    <input type="text" class="form-input w-full border border-gray-300 rounded-md p-2" id="InputNombre" name="nombre" required>
                </div>
                <div>
                    <label for="apellido" class="block text-lg font-medium mb-2">Apellido</label>
                    <input type="text" class="form-input w-full border border-gray-300 rounded-md p-2" id="InputApellido" name="apellido" required>
                </div>
                <div>
                    <label for="correo" class="block text-lg font-medium mb-2">Correo Electrónico</label>
                    <input type="email" class="form-input w-full border border-gray-300 rounded-md p-2" id="InputCorreo" name="correo" required>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="form-checkbox mr-2" id="exampleCheck1" required>
                    <label class="text-lg" for="check">Acepto los términos y condiciones</label>
                </div>
                <button type="submit" class="btn bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Enviar</button>
            </form>
        </div>
    </div>   
</div>
</section>