<?php

class Categoria{
    protected $id;
    protected $nombre_categoria;

    

    
    

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
     * Get the value of nombre_categoria
     */ 
    public function getNombreCategoria()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre_categoria
     *
     * @return  self
     */ 
    public function setNombreCategoria($nombre_categoria)
    {
        $this->nombre_categoria = $nombre_categoria;

        return $this;
    }

    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function catalogo_x_id( int $id)
    {
        $categorias = $this->catalogo_completo();

        foreach ($categorias as $categoria) {
            if ($categoria->id == $id) {
                return $categoria;
            }
        }

        return [];
    }

    public function insert($nombre_categoria): void
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO categorias VALUES (null, :nombre)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "nombre" => $nombre_categoria,
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(["id" => htmlspecialchars($this->id)]);
    }

    
}

