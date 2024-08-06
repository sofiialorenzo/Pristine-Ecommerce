<?php
session_start();
require_once "../../functions/autoload.php";    

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if($id !== null){
    (new Carrito())->removeItem($id);
}

header("Location: ../../index.php?sec=carrito");
exit();

// if($id){
//     (new Carrito())->removeItem($id);
// }
// header("Location: ../../index.php?sec=carrito");