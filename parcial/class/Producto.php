<?php
class Producto{
    protected $id; 
    protected $nombreProducto;
    protected $imagen;
    protected $descripcion;
    protected $marca;
    protected $contenidoNeto;
    protected $categoria;
    protected $categorias_ids;
    protected $categorias_secundarias;

    protected static $valores = ["id", "nombreProducto", "imagen", "descripcion", "contenidoNeto", "precio"];

    public function mapear($productoArrayAsociativo) : self {
        $producto = new self();
        foreach (self::$valores as $valor) {
            $producto->{$valor} = $productoArrayAsociativo[$valor];
        }

       $producto->marca = (new Marca())->get_x_id($productoArrayAsociativo["marca_id"]);
       $producto->categoria = (new Categoria())->catalogo_x_id($productoArrayAsociativo["categoria_id"]);
       if (isset($productoArrayAsociativo["categorias_secundarias"])) {
        $CSids = explode(",", $productoArrayAsociativo["categorias_secundarias"]);
        $categorias_array = [];
        foreach ($CSids as $CSid) {
            $categorias_array[] = (new CategoriaSecundaria())->catalogo_x_id(intval($CSid));
        }
        $producto->categorias_secundarias = $categorias_array;
        $producto->categorias_ids = $productoArrayAsociativo["categorias_secundarias"];
    } else {
        $producto->categorias_secundarias = [];
        $producto->categorias_ids = '';
    }

    return $producto;
}

public function mapearCat($productoArrayAsociativo) : self {
    $producto = new self();
    foreach (self::$valores as $valor) {
        $producto->{$valor} = $productoArrayAsociativo[$valor];
    }
    $producto->categoria = (new Categoria())->get_x_id($productoArrayAsociativo["categoria_id"]);
    return $producto;
}
 

    


    public function catalogo_completo(){

        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.*, GROUP_CONCAT(productos_categorias.categoria_id) AS categorias_secundarias FROM productos 
        LEFT JOIN productos_categorias ON productos.id = productos_categorias.producto_id 
        GROUP BY productos.id";

         $PDOStatement = $conexion->prepare($query);
         $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
         $PDOStatement->execute();
         while($producto = $PDOStatement->fetch()){
            $catalogo [] = $this->mapear($producto);
         }
         return $catalogo;
    }

    public function catalogo_x_id($id){
        $productos = $this-> catalogo_completo();
        foreach ($productos as $producto) {
            if ($producto->id == $id){
                return $producto;
            }
        }
        return [];
    }

    public function catalogo_x_categoria(int $categoria_id) :array {
        $categorias = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();
        while ($producto = $PDOStatement->fetch()){
            $categorias[] = $this->mapear($producto);
        }
        
        return $categorias;
    }

    public function categorias_validas(){
        $categorias = [];

    try {
        $conexion = Conexion::getConexion();
        $query = "SELECT categorias.id AS categoria_id, categorias.nombre AS categoria
                  FROM categorias
                  INNER JOIN productos ON categorias.id = productos.categoria_id
                  GROUP BY categorias.id, categorias.nombre";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $categorias = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Error al obtener categorías válidas: " . $e->getMessage();
    }
    
    return $categorias;
    }



    public function bestSellers() {
        $conexion = Conexion::getConexion(); 
        $query = "SELECT * FROM productos ORDER BY id ASC LIMIT 4";
        $PDOStatement = $conexion->prepare($query); 
        $PDOStatement->execute(); 
        $productosArray = $PDOStatement->fetchAll(PDO::FETCH_ASSOC); 

        $productos = [];
        foreach ($productosArray as $productoArrayAsociativo) {
            $productos[] = $this->mapear($productoArrayAsociativo); 
        }

        return $productos;
    }

    public function modificacionTitulo()
    {
    
        $tituloConEspacio = str_replace('-', ' ', $this->categoria->getNombreCategoria());
        $arrayTitulo = explode(' ', $tituloConEspacio);
        for ($i = 0; $i < count($arrayTitulo); $i++) {
            $arrayTitulo[$i] = ucfirst($arrayTitulo[$i]);
        }
        $tituloCorregido = implode(' ', $arrayTitulo);
        return $tituloCorregido;
    }

    public function descripcionCorta( $cantidad = 12 ){
        $arrayTexto = explode(" ", $this->descripcion); 
        $textoResumido = [];

        foreach ($arrayTexto as $key => $value) {
            if( $key < $cantidad ){
                $textoResumido []= $value;
            }else{
                break;
            }
        }
        return implode(" ", $textoResumido)."...";
    }


    public function insert($nombreProducto, $imagen, $descripcion, $marca_id, $contenidoNeto, $categoria_id, $precio): int
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO `productos` (`id`, `nombreProducto`, `imagen`, `descripcion`, `marca_id`, `contenidoNeto`, `categoria_id`, `precio`) VALUES (NULL, :nombreProducto, :imagen, :descripcion, :marca_id, :contenidoNeto, :categoria_id, :precio)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'nombreProducto' => htmlspecialchars($nombreProducto),
                'imagen' => htmlspecialchars($imagen),
                'descripcion' => htmlspecialchars($descripcion),
                'marca_id' => htmlspecialchars($marca_id),
                'contenidoNeto' => htmlspecialchars($contenidoNeto),
                'categoria_id' => htmlspecialchars($categoria_id),
                'precio' => htmlspecialchars($precio)
            ]);
            
            return $conexion->lastInsertId();
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function reemplazarImagen($imagen, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE productos SET imagen=:imagen WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "imagen" => $imagen,
            "id" => $id
        ]);
    }

    public function edit($nombreProducto, $descripcion, $marca_id, $contenidoNeto, $categoria_id, $precio, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE `productos` SET `nombreProducto` = :nombreProducto,`descripcion` = :descripcion, `marca_id` = :marca_id, `contenidoNeto` = :contenidoNeto, `categoria_id` = :categoria_id, `precio` = :precio WHERE `productos`.`id` = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombreProducto' => htmlspecialchars($nombreProducto),
            'descripcion' => htmlspecialchars($descripcion),
            'marca_id' => htmlspecialchars($marca_id),
            'contenidoNeto' => htmlspecialchars($contenidoNeto),
            'categoria_id' => htmlspecialchars($categoria_id),
            'precio' => htmlspecialchars($precio),
            "id" => htmlspecialchars($id)
        ]);
    }



    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM productos WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }
    public function add_categorias($categoria_id, $producto_id){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO `productos_categorias` (`id`, `categoria_id`, `producto_id`) VALUES (NULL, :categoria_id, :producto_id)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "categoria_id" => $categoria_id,
            "producto_id" => $producto_id
        ]);
      }

      public function clear_categorias($id){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM productos_categorias WHERE producto_id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => $id,
        ]);
      }

    public function getId(){
        return $this->id;
    }
    public function getnombreProducto(){
        return $this->nombreProducto;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getMarcaProducto(){
        return $this->marca->getMarcaCompleta();
    }
    public function getCategoria(){
        return $this->categoria->getNombreCategoria();
    }
    public function getContenidoNeto(){
        return $this->contenidoNeto;
    }
    public function getVegano(){
        return $this->vegano;
    }
    public function getPrecio(){
        return $this->precio;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCategoria_id(){
        return $this->categoria->getId();
    }

    public function getMarca_id(){
        return $this->marca->getId();
    }
    public function getCategoriasSecundarias(){
        return $this->categorias_ids;
}

    public function getCategorias_id(){
        return $this->categorias_secundarias;
    }


}


