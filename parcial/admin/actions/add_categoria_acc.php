<?php
    require_once "../../functions/autoload.php";
    try {
        $categoria = ( new Categoria() )->insert(
            $_POST["categoria"]
        );
        header("Location: ../index.php?sec=admin_categorias");
    } catch (\Exception $e) {
        echo $e->getMessage();
        die("No pude cargar la categoria :(");
    }

