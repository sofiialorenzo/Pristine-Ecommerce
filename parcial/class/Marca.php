<?php

class Marca{
    protected $id;
    protected $marca_completa;

    

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
     * Get the value of marca_completa
     */ 
    public function getMarcaCompleta()
    {
        return $this->marca_completa;
    }

    /**
     * Set the value of marca_completa
     *
     * @return  self
     */ 
    public function setMarcaCompleta($marca_completa)
    {
        $this->marca_completa = $marca_completa;

        return $this;
    }

    public function get_x_id(int $id) :? self {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();
        $resultado = $PDOStatement->fetch();

        return $resultado ? $resultado : null;
    }

    public function catalogo_completo(): array {
        $catalogo = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marcas";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }

    public function insert($marca_completa): void
    {
        try {
            $conexion = Conexion::getConexion();
            $query = "INSERT INTO marcas (marca_completa) VALUES (:marca_completa)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "marca_completa" => $marca_completa,
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM marcas WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(["id" => htmlspecialchars($this->id)]);
    }
}