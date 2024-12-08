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
        <p class="mt-4 text-lg md:text-xl text-white">Explora una amplia variedad de productos diseñados para cada tipo de piel y necesidad. Todo en un solo lugar.</p>
        <a href="index.php?sec=catalogo" class="mt-8 bg-violet-900 hover:bg-transparent hover:border-4 hover:border-violet-950 text-white py-3 px-6 rounded-lg font-semibold">Explorar productos</a>
    </div>
    </div>
</section>

<section class="py-20" id="containerBest">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-10 text-center text-gray-900">Bestseller</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php foreach ($productosMasVendidos as $producto) { ?>
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <div class="flex items-center justify-center h-48 bg-white rounded-t-lg">
            <img 
              class="max-h-full max-w-full object-contain" 
              src="img/productos/<?= $producto->getImagen() ?>" 
              alt="<?= $producto->getnombreProducto() ?>">
          </div>
          <div class="p-4 text-center">
            <h3 class="text-lg font-bold text-gray-900"><?= $producto->getnombreProducto() ?></h3>
            <a 
              href="index.php?sec=producto&id=<?= $producto->getId() ?>" 
              class="mt-4 inline-block px-4 py-2 bg-violet-900 text-white text-sm font-medium rounded-lg hover:bg-transparent hover:text-violet-950 hover:font-semibold hover:border-2 hover:border-violet-950">
              Ver detalles
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<section class="bg-violet-100 shadow-inner py-20">
<div class="flex justify-center items-center gap-8 md:flex-row flex-col w-full">
  <figure class="md:w-1/3 w-full flex justify-center">
    <img 
      src="img/home/pristine-productos.jpg" 
      alt="Mujer" 
      class="rounded-lg shadow-md max-w-[300px] md:max-w-[400px] object-contain">
  </figure>
  <article class="md:w-1/2 w-full px-4 md:px-0 text-center md:text-left">
    <h2 class="text-xl md:text-2xl font-semibold text-violet-900 pb-4">¿Por qué Pristine?</h2>
    <p class="text-lg md:text-2xl font-bold text-gray-900 leading-relaxed">
      En Pristine, nos complace ofrecer una variedad excepcional de productos de cuidado de la piel de alta calidad, seleccionados de las marcas más prestigiosas del mundo.
    </p>
  </article>
  </div>
</section>


<section class="py-20">
  <h2 class="text-center font-bold text-3xl">Nuestros servicios</h2>
  <div class="grid md:grid-cols-3 gap-20 mt-20 w-full md:w-4/5 grid-cols-1 mx-auto">
    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">shopping_cart</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2 text-gray-900">Ten el control de tu compra desde que la realizas hasta que la tienes en tus manos.</p>
    </article>
    </div>

    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">done_all</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2 text-gray-900">Estamos contigo desde el momento en que haces tu compra hasta que recibes el producto. Si no cumple con tus expectativas, te devolvemos el dinero.</p>
    </article>
    </div>

    <div class="detalles">
    <span class="material-symbols-outlined text-4xl detalles-icon">shoppingmode</span>
    <article class="text-center mt-5">
    <p class="text-sm text-balance mt-2 text-gray-900">Encuentra las mejores promociones y novedades especialmente creadas para ti.</p>
    </article>
    </div>

  </div>

</section>
<section class="py-20 bg-violet-100 shadow-inner">
  <div class="max-w-5xl mx-auto px-6">
    <div class="text-center mb-10">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
        ¿Quieres estar al día con nuestras últimas novedades? ¡Suscríbete a nuestro Newsletter!
      </h2>
    </div>
    <form 
      action="views/procesar_newsletter.php" 
      enctype="multipart/form-data" 
      method="POST" 
      class="space-y-6 bg-white p-8 rounded-lg shadow-md">
      <div>
        <label for="nombre" class="block text-lg font-medium mb-2 text-gray-800">Nombre</label>
        <input 
          type="text" 
          class="form-input w-full border border-gray-300 rounded-md p-3 focus:ring-violet-900 focus:border-violet-900" 
          id="InputNombre" 
          name="nombre" 
          required>
      </div>
      
      <div>
        <label for="apellido" class="block text-lg font-medium mb-2 text-gray-800">Apellido</label>
        <input 
          type="text" 
          class="form-input w-full border border-gray-300 rounded-md p-3 focus:ring-violet-900 focus:border-violet-900" 
          id="InputApellido" 
          name="apellido" 
          required>
      </div>
      
      <div>
        <label for="correo" class="block text-lg font-medium mb-2 text-gray-800">Correo Electrónico</label>
        <input 
          type="email" 
          class="form-input w-full border border-gray-300 rounded-md p-3 focus:ring-violet-900 focus:border-violet-900" 
          id="InputCorreo" 
          name="correo" 
          required>
      </div>
      
      <div class="flex items-center">
        <input 
          type="checkbox" 
          class="form-checkbox mr-2 text-violet-900 focus:ring-violet-900" 
          id="exampleCheck1" 
          required>
        <label for="check" class="text-lg text-gray-800">
          Acepto los términos y condiciones
        </label>
      </div>
      
      <button 
        type="submit" 
        class="mt-6 bg-violet-900 hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 text-white font-semibold py-3 px-6 rounded-lg">
        Enviar
      </button>
    </form>
  </div>
</section>