<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
session_start();
require_once "../../functions/autoload.php";
if (empty($_POST["nombreProducto"]) || empty($_POST["descripcion"]) || empty($_POST["marca_id"]) || empty($_POST["contNeto"]) || empty($_POST["categoria_id"]) || empty($_POST["precio"]) || empty($_FILES["imagen"])) {

    (new Alerta())->add_alerta("Debe completar todos los campos", "error");
    header("Location: ../index.php?sec=add_producto");
}

$categorias_secundarias = $_POST["categorias_secundarias"];

try{
    $imagen = (new Imagen())->subirImagen("../../img/productos", $_FILES["imagen"]);
    $id_producto = (new Producto())->insert(
        $_POST["nombreProducto"],
        $imagen,
        $_POST["descripcion"],
        $_POST["marca_id"],
        $_POST["contNeto"],
        $_POST["categoria_id"],
        $_POST["precio"],
    );
    if(!empty($_POST["categorias_secundarias"])){    foreach ($categorias_secundarias as $categoria_id) {
        (new Producto())->add_categorias($categoria_id, $id_producto);
    }
    }

    (new Alerta())->add_alerta("Producto agregado exitosamente.", "success");
    header("Location: ../index.php?sec=admin_productos");
} catch (\Exception $e) {
    echo $e->getMessage();
    die("No pude cargar el producto :(");
}