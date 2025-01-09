<?php
session_start();
$categorias_id = ( new Producto())->categorias_validas();
?>
<div class="sticky top-0 z-50 bg-slate-50">
  <nav class="w-full">
    <div class="max-w-screen-xl relative flex flex-row flex-wrap items-center justify-between p-4 mx-auto">
    <a href="index.php?sec=inicio" class="flex items-center space-x-3">
      <img src="img/nav/logo-pristine.svg" class="h-8" alt="PRISTINE logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap hidden">PRISTINE</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center rounded-lg md:hidden text-violet-800 text-sm" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <div class="hidden absolute top-full md:static left-0 w-full md:block md:w-auto md:flex md:space-x-8" id="navbar-default">
      <ul class="flex flex-col md:flex-row p-4 md:p-0 space-y-4 md:space-y-0 md:space-x-8 bg-slate-50">
        <li>
          <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=inicio">Home</a>
        </li>
        <li>
          <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=catalogo">Catalogo</a>
        </li>
        <?php foreach ($categorias_id as $categoria) { ?>
        <li>
          <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=categorias&categoria=<?= $categoria['categoria_id'] ?>">
            <?= $categoria['categoria'] ?>
          </a>
        </li>
        <?php } ?>

        <?php if( isset($_SESSION["login"]) ){ ?>       
        <li>
          <button type="button" data-modal-target="userModal" data-modal-toggle="userModal" class="navLinkLogos block"><i class="material-symbols-outlined block pt-2 pb-px px-3 md:p-0">account_circle</i></button>
        </li>    
        <?php }else{ ?>
        <li>
          <a class="navLinkLogos" href="index.php?sec=inicio-sesion"><i class="material-symbols-outlined block pt-2 pb-px px-3 md:p-0">person</i></a>
        </li>  
        <?php } ?> 
        <li>
          <a class="navLinkLogos" href="index.php?sec=carrito"><i class="material-symbols-outlined block pt-2 pb-px px-3 md:p-0" id="logoCart">shopping_basket</i></a>
        </li>
      </ul>
    </div>
  </div>
  </nav>
</div>



<!-- Modal de Usuario -->
<div class="hidden fixed inset-0 top-0 z-50 flex justify-center items-center bg-black bg-opacity-80" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="relative p-4 w-full max-w-2xl h-auto my-10">
        <div class="relative bg-white rounded-lg shadow max-h-screen overflow-y-auto">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-gray-900" id="userModalLabel">Bienvenido <?= $_SESSION["login"]['username']; ?>!</h3>
                <button type="button" class="text-violet-950 bg-transparent hover:border-2 hover:border-violet-950 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="userModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500"><span class="text-gray-800 font-medium">Nombre completo:</span> <?= $_SESSION['login']['nombre_completo']; ?></p>
                <p class="text-base leading-relaxed text-gray-500"><span class="text-gray-800 font-medium">Nombre de usuario:</span> <?= $_SESSION["login"]['username']; ?></p>
                <p class="text-base leading-relaxed text-gray-500"><span class="text-gray-800 font-medium">Email:</span> <?= $_SESSION["login"]['email']; ?></p>

                <?php
                $usuario_id = $_SESSION['login']['id'];
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(['usuario_id' => $usuario_id]);
                $compras = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php if (!empty($compras)): ?>
                    <h5 class="mt-3 font-medium text-gray-900">Compras realizadas:</h5>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-violet-100">
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-violet-800">Nombre del Producto</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-violet-800">Cantidad</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-violet-800">Total</th>
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
                <a href="admin/actions/auth_logout.php" class="px-4 py-2 bg-violet-900 hover:bg-transparent hover:border-2 hover:border-violet-950 hover:text-violet-950 text-white font-semibold rounded-lg">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>



 