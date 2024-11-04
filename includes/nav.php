<?php
session_start();
$categorias_id = ( new Producto())->categorias_validas();
?>
<div class="sticky top-0 bg-white">
  <nav class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

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

        <?php if( isset($_SESSION["login"]) ){ ?>       
        <li>
          <button type="button" data-modal-target="userModal" data-modal-toggle="userModal" class="navLinkLogos block"><i class="material-symbols-outlined block py-2 px-3 md:p-0">account_circle</i></button>
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



<!-- Modal de Usuario -->
<div class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="userModalLabel">Bienvenido <?= $_SESSION["login"]['username']; ?>!</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="userModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500"><strong>Nombre completo:</strong> <?= $_SESSION['login']['nombre_completo']; ?></p>
                <p class="text-base leading-relaxed text-gray-500"><strong>Nombre de usuario:</strong> <?= $_SESSION["login"]['username']; ?></p>
                <p class="text-base leading-relaxed text-gray-500"><strong>Email:</strong> <?= $_SESSION["login"]['email']; ?></p>

                <?php
                $usuario_id = $_SESSION['login']['id'];
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(['usuario_id' => $usuario_id]);
                $compras = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php if (!empty($compras)): ?>
                    <h5 class="mt-3 font-semibold">Compras realizadas:</h5>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nombre del Producto</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Cantidad</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($compras as $compra): ?>
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-gray-700"><?= htmlspecialchars($compra['nombreProducto']); ?></td>
                                    <td class="px-4 py-2 text-gray-700"><?= htmlspecialchars($compra['cantidad']); ?></td>
                                    <td class="px-4 py-2 text-gray-700"><?= htmlspecialchars($compra['total']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="mt-3 text-gray-500">No se encontraron compras para este usuario.</p>
                <?php endif; ?>
            </div>
            <div class="flex justify-end p-4 border-t">
                <a href="admin/actions/auth_logout.php" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>



 