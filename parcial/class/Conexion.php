<?php

class Conexion{
    protected const DB_SERVER = "localhost";              
    protected const DB_USER = "root";
    protected const DB_PASS = "";
    protected const DB_NAME = "pristine";
    protected const DB_DSN = 'mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    protected static ?PDO $db = null;
    private static $conexiones = 0;

    // public function __construct(){
    //     try {
    //         $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
    //     } catch (Exception $e) {
    //         die('Error al conectar con MySQL.');
    //     }        
    // }
    protected static function conectar(){
        try {
            self::$db = new PDO(
                self::DB_DSN, 
                self::DB_USER, 
                self::DB_PASS,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (Exception $e) {
            die('Error al conectar con MySQL.');
        }        
    }

    // public function getConexion(){
    //     return $this->db;
    // }

    public static function getConexion(){
        if( self::$db === null ){
            self::conectar();
        }
        return self::$db;
    }
}