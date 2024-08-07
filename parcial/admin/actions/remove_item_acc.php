<?php
session_start();
require_once "../../functions/autoload.php";    

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if($id !== null){
    (new Carrito())->borrar_Item($id);
}else {
    (new Alerta())->add_alerta("ID de producto inválido", "danger");
}

header("Location: ../../index.php?sec=carrito");
exit();

