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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function catalogo_completo(): array
    {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias_secundarias";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();
        return $catalogo;
        
    }

    public function catalogo_x_id(int $id)
    {
        $categorias = $this->catalogo_completo();

        foreach ($categorias as $categoria) {
            if ($categoria->id == $id) {
                return $categoria;
            }
        }

        return [];
    }



    public function insert($nombre): void
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO categorias_secundarias VALUES (null, :nombre )";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute(['nombre' => $nombre]);
        } catch (Exceptiion $e) {
            echo $e->getMessage();
        }
        
    }
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias_secundarias WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id" => htmlspecialchars($this->id)
        ]);
    }
    public function edit($nombre, $id){
        $conexion = Conexion::getConexion();
        $query = "UPDATE categorias_secundarias SET nombre=:nombre WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "nombre" => htmlspecialchars($nombre),
            "id" => htmlspecialchars($id)
        ]);
    }
}