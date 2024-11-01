<?php
require_once "functions/autoload.php";
// require_once "class/Productos.php";
// include_once "class/Conexion.php";

$view = isset($_GET["sec"]) ? $_GET["sec"] : "home";
$vista = "404";
$secciones = [
    "home" => [
        "titulo" => "Bienvenidos"
    ],
    "404" => [
        "titulo" => "Pagina no encontrada"
    ],
    "catalogo" => [
        "titulo" => "Todos los productos"
    ],
    "productos" => [
        "titulo" => "Productos"
    ],
    "producto" => [
        "titulo" => "Detalle del producto"
    ],
    "vegano" => [
        "titulo" => "Productos veganos"
    ],
    "newsletter" => [
        "titulo" => "Suscribite"
    ],
    "login" => [
        "titulo" => "Ingresar"
    ],
    "registro" => [
        "titulo" => "Registro"
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
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include_once "includes/nav.php" ?>
<main class="container-fluid">
    <?php file_exists("views/$vista.php")
    ? include "views/$vista.php"
    : include "views/404.php" ?>

</main>
<?php include_once "includes/footer.php" ?>

</body>
</html>