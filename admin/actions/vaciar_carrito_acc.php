<?php
require_once "../../functions/autoload.php";

(new Carrito())->vaciarCarrito_Usuario();

header("Location: ../../index.php?sec=carrito");