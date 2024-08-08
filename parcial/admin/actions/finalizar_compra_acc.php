<?php

session_start();
require_once "../../functions/autoload.php";

if (!isset($_SESSION['login']['id']) || $_SESSION['login']['roles'] !== 'usuario') {
    (new Alerta())->add_alerta("Debes iniciar sesión para finalizar la compra", "danger");
    header("Location: ../../index.php?sec=login");
    exit();
}


$usuario_id = $_SESSION['login']['id'];


$carrito = new Carrito();
$compraGuardada = $carrito->guardarCompra($usuario_id);

if ($compraGuardada) {
    (new Alerta())->add_alerta("Compra realizada con éxito", "success");
    header("Location: ../../index.php?sec=carrito");
    exit();
} else {
    (new Alerta())->add_alerta("Error al realizar la compra", "danger");
    header("Location: ../../index.php?sec=carrito");
    exit();
}