<?php

class Carrito{

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function add_item(int $producto_id, int $cantidad){
        $itemData = (new Producto())->catalogo_x_id($producto_id);
        if($itemData){
            $_SESSION["carrito"][$producto_id] = [
                "producto" => $itemData->getnombreProducto(),
                "imagen" => $itemData->getImagen(),
                "precio" => $itemData->getPrecio(),
                "cantidad" => $cantidad
            ];
        }
    }

    public function getCarrito(){
        if(!empty($_SESSION["carrito"])){
            return $_SESSION["carrito"];
        }
        return [];
    }

    public function getTotal(){
        $total = 0;
        if(!empty($_SESSION["carrito"])){
            foreach($_SESSION["carrito"] as $item){
                $total += $item["precio"] * $item["cantidad"];
            }
        }
        return $total;
    }

    public function vaciarCarrito(){
        $_SESSION["carrito"] = [];
    }

    public function actualizarCantidades(array $cantidades){
        if (!empty($cantidades)){
            foreach($cantidades as $id => $cantidad){
                if (isset($_SESSION["carrito"][$id])){
                    $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
                }
            }
        }
    }

    public function removeItem(int $id){
        if (isset($_SESSION["carrito"][$id])){

            unset($_SESSION["carrito"][$id]);
            (new Alerta())->add_alerta("Producto eliminado", "success");

        }else{
            (new Alerta())->add_alerta("No se ha eliminado el producto", "danger");
        }
    }
}