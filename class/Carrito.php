<?php

class Carrito{

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    // public function add_item(int $producto_id, int $cantidad){
    //     $itemData = (new Producto())->catalogo_x_id($producto_id);
    //     if($itemData){
    //         $_SESSION["carrito"][$producto_id] = [
    //             "producto" => $itemData->getnombreProducto(),
    //             "imagen" => $itemData->getImagen(),
    //             "precio" => $itemData->getPrecio(),
    //             "cantidad" => $cantidad
    //         ];
    //     }
    // }

    public function insert_item(int $producto_id, int $cantidad){
        $itemData = (new Producto())->catalogo_x_id($producto_id);
        if($itemData){
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO carritos_x_usuarios (usuario_id, producto_id, nombreProducto, imagen, cantidad, precio) VALUES (:usuario_id, :producto_id, :nombreProducto, :imagen, :cantidad, :precio)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'usuario_id' => $_SESSION['login']['id'],
                'producto_id' => $producto_id,
                'nombreProducto' => $itemData->getnombreProducto(),
                'imagen' => $itemData->getImagen(),
                'cantidad' => $cantidad,
                'precio' => $itemData->getPrecio()
            ]);
        }
    }

    // public function getCarrito(){
    //     if(!empty($_SESSION["carrito"])){
    //         return $_SESSION["carrito"];
    //     }
    //     return [];
    // }

    public function getCarrito_Usuario(){
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM carritos_x_usuarios WHERE usuario_id = :usuario_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['usuario_id' => $_SESSION['login']['id']]);
        return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getTotal(){
    //     $total = 0;
    //     if(!empty($_SESSION["carrito"])){
    //         foreach($_SESSION["carrito"] as $item){
    //             $total += $item["precio"] * $item["cantidad"];
    //         }
    //     }
    //     return $total;
    // }

    public function getTotal_Usuario(){
        $conexion = Conexion::getConexion();
        $query = "SELECT SUM(precio * cantidad) AS total FROM carritos_x_usuarios WHERE usuario_id = :usuario_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['usuario_id' => $_SESSION['login']['id']]);
        $result = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }



    // public function vaciarCarrito(){
    //     $_SESSION["carrito"] = [];
    // }

    public function vaciarCarrito_Usuario(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM carritos_x_usuarios WHERE usuario_id = :usuario_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['usuario_id' => $_SESSION['login']['id']]);
    }



    // public function actualizarCantidades(array $cantidades){
    //     if (!empty($cantidades)){
    //         foreach($cantidades as $id => $cantidad){
    //             if (isset($_SESSION["carrito"][$id])){
    //                 $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
    //             }
    //         }
    //     }
    // }


    public function actualizarCantidades_Usuario(array $cantidades){
        $conexion = Conexion::getConexion();
        foreach ($cantidades as $id => $cantidad) {
            $query = "UPDATE carritos_x_usuarios SET cantidad = :cantidad WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'cantidad' => $cantidad,
                'producto_id' => $id,
                'usuario_id' => $_SESSION['login']['id']
            ]);
        }
    }

    // public function removeItem(int $id){
    //     if (isset($_SESSION["carrito"][$id])){

    //         unset($_SESSION["carrito"][$id]);
    //         (new Alerta())->add_alerta("Producto eliminado", "success");

    //     }else{
    //         (new Alerta())->add_alerta("No se ha eliminado el producto", "danger");
    //     }
    // }

    public function borrar_Item(int $id){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM carritos_x_usuarios WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'usuario_id' => $_SESSION['login']['id'],
            'producto_id' => $id
        ]);
    }

    public function guardarCompra(int $usuario_id) {
        $conexion = Conexion::getConexion();
        $carrito = $this->getCarrito_Usuario();

        if (!empty($carrito)) {
            try {
                $query = "INSERT INTO carrito (usuario_id, producto_id, nombreProducto, imagen, cantidad, total) VALUES (:usuario_id, :producto_id, :nombreProducto, :imagen, :cantidad, :total)";
                $PDOStatement = $conexion->prepare($query);
    
                foreach ($carrito as $item) {
                    $total = $item["precio"] * $item["cantidad"]; // Asegúrate de calcular el total correctamente
    
                    $PDOStatement->execute([
                        'usuario_id' => $usuario_id,
                        'producto_id' => $item["producto_id"], // Usa el producto_id del item
                        'nombreProducto' => $item["nombreProducto"],
                        'imagen' => $item["imagen"],
                        'cantidad' => $item["cantidad"],
                        'total' => $total
                    ]);
                }
    
                $this->vaciarCarrito_Usuario();
                return true;
    
            } catch (Exception $e) {
                echo "Error al guardar la compra: " . $e->getMessage();
                return false;
            }
        }
    
        return false;

    //     if (!empty($carrito)) {
    //         try {
    //             // Guardar cada producto en la tabla `carrito`
    //             $query = "INSERT INTO carrito (usuario_id, producto_id, nombreProducto, imagen, cantidad, total)VALUES (:usuario_id, :producto_id, :nombreProducto, :imagen, :cantidad, :total)";
    //             $PDOStatement = $conexion->prepare($query);

    //             foreach ($carrito as $producto_id => $item) {
    //                 $PDOStatement->execute([
    //                     'usuario_id' => $usuario_id,
    //                     'producto_id' => $producto_id,
    //                     'nombreProducto' => $item["nombreProducto"],
    //                     'imagen' => $item["imagen"],
    //                     'cantidad' => $item["cantidad"],
    //                     'total' => $item["precio"]
    //                 ]);
    //             }

    //             $this->vaciarCarrito_Usuario();
    //             return true;

    //         } catch (Exception $e) {
    //             echo "Error al guardar la compra: " . $e->getMessage();
    //             return false;
    //         }
    //     }

    //     return false;
    // }
}
}