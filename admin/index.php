<?php 
session_start();
require_once '../functions/autoload.php';

$secciones_validas = [
    'dashboard' => [
        'titulo' => 'Panel de control',
    ],
    'admin_productos' => [
        'titulo' => 'Administración de Productos',
    ],
    'add_producto' => [
        'titulo' => 'Administración de Productos',
    ],
    'edit_producto' => [
        'titulo' => 'Administración de Productos',
    ],
    'delete_producto' => [
        'titulo' => 'Eliminar Producto',
    ],
    'admin_marcas' => [
        'titulo' => 'Administracion de marcas',
    ],
    'add_marca' => [
        'titulo' => 'Agregar Marca',
    ],
    'delete_marca' => [
        'titulo' => 'Eliminar Marca',
    ],
    'edit_marca' => [
        'titulo' => 'editar marca',
    ],
    'admin_categorias' => [
        'titulo' => 'Administracion de categorias',
    ],
    'add_categoria' => [
        'titulo' => 'Agregar categoria',
    ],
    'edit_categoria' => [
        'titulo' => 'Editar Categoria',
    ],
    'delete_categoria' => [
        'titulo' => 'Eliminar Categoria',
    ],
    'listar_usuarios' => [
        'titulo' => 'Lista de usuarios',
    ],
    'compras_usuarios' => [
        'titulo' => 'Compras del usuario',
    ],
];

$seccion = $_GET['sec'] ?? 'dashboard';
(new Autenticacion())->verify();

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = '404';
    $titulo = '404 - Página no encontrada';
} else {
    $vista = $seccion;
    $titulo = $secciones_validas[$seccion]['titulo'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pristine</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body class="bg-slate-50">
<div class="sticky top-0 z-50 bg-slate-50">
<nav class="w-full">
        <div class="max-w-screen-xl relative flex flex-row flex-wrap items-center justify-between p-4 mx-auto">
            <a class="flex items-center space-x-3">
            <img src="../img/nav/logo-pristine.svg" class="h-8" alt="PRISTINE logo" />
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
                    <?php if( isset($_SESSION["login"]) ) { ?>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=admin_productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=admin_marcas">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=admin_categorias">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="index.php?sec=listar_usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="actions/auth_logout.php">Salir</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="block pt-2 pb-px px-3 text-gray-900 hover:border-b-2 hover:border-violet-900 hover:font-semibold hover:text-violet-900" href="../index.php?sec=inicio-sesion">Inicio de sesión</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
    <main class="container-fluid">
    <?= (new Alerta())->get_alertas() ?>
        <?php require file_exists("views/$vista.php") ? "views/$vista.php" : 'views/404.php'; ?>
    </main>
</body>

</html>
