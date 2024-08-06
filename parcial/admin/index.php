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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pristine :: <?= $titulo ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="../css/estilos.css" rel="stylesheet">
</head>

<body>
<div class="sticky-top">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pristine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <?php if( isset($_SESSION["login"]) ) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_productos">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_marcas">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_categorias">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=listar_usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actions/auth_logout.php">Salir</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?sec=login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
    <?= (new Alerta())->get_alertas() ?>
        <?php require file_exists("views/$vista.php") ? "views/$vista.php" : 'views/404.php'; ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
