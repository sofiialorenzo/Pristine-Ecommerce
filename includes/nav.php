<?php
session_start();
$categorias_id = ( new Producto())->categorias_validas();
?>
<div class="sticky top-0 bg-white">
  <nav class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
    <!-- Logo a la izquierda -->
    <a href="#" class="flex items-center space-x-3">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
    </a>

    <!-- Botón de menú para móviles -->
    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <!-- Contenido del navbar a la derecha -->
    <div class="hidden md:flex md:space-x-8" id="navbar-default">
      <ul class="flex flex-col md:flex-row p-4 md:p-0 space-y-4 md:space-y-0 md:space-x-8">
        <li>
          <a class="block py-2 px-3 text-gray-900" href="index.php?sec=home">Home</a>
        </li>
        <li>
          <a class="block py-2 px-3 text-gray-900" href="index.php?sec=catalogo">Catalogo</a>
        </li>
        <?php foreach ($categorias_id as $categoria) { ?>
        <li>
          <a class="block py-2 px-3 text-gray-900" href="index.php?sec=productos&categoria=<?= $categoria['categoria_id'] ?>">
            <?= $categoria['categoria'] ?>
          </a>
        </li>
        <?php } ?>

        <!-- Modal con Flowbite -->
        <?php if( isset($_SESSION["login"]) ){ ?>       
        <li>
          <a href="#" data-modal-target="userModal" data-modal-toggle="userModal" class="navLinkLogos"><i class="material-symbols-outlined block py-2 px-3 md:p-0">account_circle</i></a>
        </li>    
        <?php }else{ ?>
        <li>
          <a class="navLinkLogos" href="index.php?sec=login"><i class="material-symbols-outlined block py-2 px-3 md:p-0">person</i></a>
        </li>  
        <?php } ?> 
        <li>
          <a class="navLinkLogos" href="index.php?sec=carrito"><i class="material-symbols-outlined block py-2 px-3 md:p-0" id="logoCart">shopping_basket</i></a>
        </li>
      </ul>
    </div>
  </nav>
</div>



<!-- Modal del usuario -->
<div id="userModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-modal h-full">
  <div class="relative w-full h-full max-w-md h-auto">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Bienvenido <?= $_SESSION["login"]['username']; ?> !</h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="userModal">
          <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
      <div class="p-6 space-y-6">
        <p><strong>Nombre completo:</strong> <?= $_SESSION['login']['nombre_completo']; ?></p>
        <p><strong>Nombre de usuario:</strong> <?= $_SESSION["login"]['username']; ?></p>
        <p><strong>Email:</strong> <?= $_SESSION["login"]['email']; ?></p>
        <!-- Contenido adicional del modal -->
      </div>
      <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <a href="admin/actions/auth_logout.php" class="btn bg-blue-600 text-white font-bold py-2 px-4 rounded">Cerrar Sesión</a>
      </div>
    </div>
  </div>
</div>



 