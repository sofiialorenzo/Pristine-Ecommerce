<?php

require_once "../../functions/autoload.php";
$nombre_completo = $_POST["nombre"];
$email = $_POST["email"];
$username = $_POST["username"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

try {
    $usuarioAnterior = (new Usuario())->usuario_x_email($email);
    if($usuarioAnterior){
        //mensaje al usuario
    }else{
        (new Usuario())->insert($username, $email, $nombre_completo, $pass);        
    }
    header("Location: ../../index.php?sec=login");
} catch (Exeption $e) {
    echo $e->getMessage();
}