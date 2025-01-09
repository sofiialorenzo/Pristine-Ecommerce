<?php
require_once "functions/autoload.php";
// include_once "class/Conexion.php";

$view = isset($_GET["sec"]) ? $_GET["sec"] : "inicio";
$vista = "404";
$secciones = [
    "inicio" => [
        "titulo" => "Bienvenidos"
    ],
    "404" => [
        "titulo" => "Pagina no encontrada"
    ],
    "catalogo" => [
        "titulo" => "Todos los productos"
    ],
    "categorias" => [
        "titulo" => "Productos"
    ],
    "producto" => [
        "titulo" => "Detalle del producto"
    ],
    "newsletter" => [
        "titulo" => "Suscribite"
    ],
    "inicio-sesion" => [
        "titulo" => "Ingresar"
    ],
    "registro" => [
        "titulo" => "Registrarse"
    ],
    "carrito" => [
            "titulo" => "Carrito"
        ],
    "procesar_newsletter" => [
        "titulo" => "Formulario enviado"
    ]
];

if(array_key_exists($view,$secciones)){
    $vista = $view;
    $titulo = $secciones[$view]["titulo"];
}else{
    $vista = "404";
    $titulo = $secciones["404"]["titulo"];
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="bg-slate-50">
    <?php include_once "includes/nav.php" ?>
<main class="container-fluid">
    <?php file_exists("views/$vista.php")
    ? include "views/$vista.php"
    : include "views/404.php" ?>

</main>
<?php include_once "includes/footer.php" ?>

</body>
</html>