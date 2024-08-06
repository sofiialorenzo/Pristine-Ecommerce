<?php
class CategoriaSecundaria {
    protected $id;
    protected $nombre;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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

    /**
     * Get the value of nombre
     */ 
    public function getNombreCategoriaSec()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombreCategoriaSec($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function catalogo_completo(){
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias_secundarias";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        return $PDOStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // public function get_x_id($id){
    //     $conexion = Conexion::getConexion();
    //     $query = "SELECT * FROM categorias_secundarias WHERE id = :id";
    //     $PDOStatement = $conexion->prepare($query);
    //     $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    //     $PDOStatement->execute(['id' => $id]);
    //     $resultado = $PDOStatement->fetch();

    //     return $resultado ? $resultado : null;
    // }

    // public static function getCategoriasSecundarias($producto_id){
    //     $conexion = Conexion::getConexion();
    //     $query = "SELECT GROUP_CONCAT(categorias_secundarias.nombre) AS categorias_secundarias FROM categorias_secundarias
    //     INNER JOIN productos_categorias ON categorias_secundarias.id = productos_categorias.categoria_id WHERE productos_categorias.producto_id = :producto_id";
    //     $PDOStatement = $conexion->prepare($query);
    //     $PDOStatement->execute(['producto_id' => $producto_id]);
    //     $result = $PDOStatement->fetch(PDO::FETCH_ASSOC);

    //     return $result ? $result['categorias_secundarias'] : 'No hay categorías secundarias';
    // }

    public function insert($nombre){
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO categorias_secundarias (nombre) VALUES (:nombre)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre' => $nombre]);
    }
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias_secundarias WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }

    public function catalogo_x_id(int $id){
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias_secundarias WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(['id' => $id]);
        $categoria = $PDOStatement->fetch();
        
        if ($categoria) {
            return $categoria;
        } else {
            // Devuelve null si no se encuentra la categoría
            return null;
        }
        // $categorias = $this->catalogo_completo();

        // foreach ($categorias as $categoria) {
        //     if ($categoria->id == $id) {
        //         return $categoria;
        //     }
        // }

        // return [];
    }
}