<?php
require_once '../../functions/autoload.php';

$id = $_GET["id"] ?? false;
$producto = (new Producto())->catalogo_x_id($id);
try {
    (new Producto())->clear_categorias($_POST["id"]);

    if( $producto->getImagen() != "" ){
        (new Imagen())->borrarImagen("../../img/productos/".$producto->getImagen());
    }
    $producto->delete();
} catch (Exception $e) {
    echo $e->getMessage();
    die("No se pudo eliminar :(");
}

header("Location: ../index.php?sec=admin_productos");