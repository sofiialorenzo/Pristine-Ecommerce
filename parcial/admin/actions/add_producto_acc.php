<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";

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

    foreach ($categorias_secundarias as $categoria_id) {
        (new Producto())->add_categorias($categoria_id, $id_producto);
    }


    header("Location: ../index.php?sec=admin_productos");
} catch (\Exception $e) {
    echo $e->getMessage();
    die("No pude cargar el producto :(");
}