<?php
require_once "../../functions/autoload.php";

if (!empty($_GET["c"])){
    (new Carrito())->actualizarCantidades_Usuario($_GET["c"]);
    (new Alerta())->add_alerta("Carrito Actualizado", "success");
    print_r($_GET["c"]);
}else{
    (new Alerta())->add_alerta("No se ha actualizado el carrito", "danger");
}


header("Location: ../../index.php?sec=carrito");
