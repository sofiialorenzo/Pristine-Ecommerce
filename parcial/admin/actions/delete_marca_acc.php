<?php
require_once "../../functions/autoload.php";

$id = $_GET["id"] ?? false;
$marca = (new Marca())->get_x_id($id);
try {
    $marca->delete();
} catch (Exception $e) {
    echo $e->getMessage();
    die("No se pudo eliminar :(");
}


header("Location: ../index.php?sec=admin_marcas");

