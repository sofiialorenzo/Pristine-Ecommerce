<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";
require_once "../../functions/autoload.php";
$fileData = $_FILES["imagen"] ?? FALSE;
$categorias = $_POST["categorias_secundarias"];
try {
    $producto = new Producto();

    if( !empty($fileData["tmp_name"]) ){
        if( !empty($_POST["imagen_og"]) ){
            (new Imagen())->borrarImagen("../../img/productos/".$_POST["imagen_og"]);
        }
        $imagenNueva = (new Imagen())->subirImagen("../../img/productos", $fileData);
        $producto->reemplazarImagen($imagenNueva, $_POST["id"]);
    }

    $producto->edit(
        $_POST["nombreProducto"],  
        $_POST["categoria_id"], 
        $_POST["marca_id"], 
        $_POST["contenidoNeto"],
        $_POST["precio"],
        $_POST["descripcion"],
        $_POST["id"]
    );

    foreach ($categorias as $categoria_id) {
        (new Producto())->add_categorias($_POST["id"], $categoria_id);
    }

    (new Alerta())->add_alerta("Se pudo editar", "success");
    header("Location: ../index.php?sec=admin_productos");
} catch (Exception $e) {
    echo $e->getMessage();
    (new Alerta())->add_alerta("Se no pudo editar", "danger");
    die("No pude editar el producto");
}

