<?php
require_once "../../functions/autoload.php";
$categorias = $_GET["categorias"] ?? [];
// print_r($categorias);
if (!empty($categorias)) {
    foreach ($categorias as $categoria){
        $productos = (new Producto())->filtrarPorCategoriasSecundarias($categorias);
    }
    header("Location: ../../index.php?sec=catalogo&categorias=$categorias[0]");
}


