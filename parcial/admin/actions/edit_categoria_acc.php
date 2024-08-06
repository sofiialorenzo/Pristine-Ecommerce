<?php
require_once "../../functions/autoload.php";

try {
    $categorias = new CategoriaSecundaria();
    $categorias->edit($_POST["nombre"], $_POST["id"]);
    header("Location: ../index.php?sec=admin_categorias");
} catch (Exception $e) {
    echo $e->getMessage();
    die("Error al editar categoria");
}