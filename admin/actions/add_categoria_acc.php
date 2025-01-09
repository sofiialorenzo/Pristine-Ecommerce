<?php
    require_once "../../functions/autoload.php";
    try {
        ( new CategoriaSecundaria() )->insert(
            $_POST["nombre"]
        );
        (new Alerta())->add_alerta("Categoria cargada con éxito", "success");
        header("Location: ../index.php?sec=admin_categorias");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar categoria", "error");
        die("No pude cargar la categoria :(");
    }

