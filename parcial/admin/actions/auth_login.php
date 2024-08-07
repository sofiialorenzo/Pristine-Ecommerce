<?php
session_start();
require_once "../../functions/autoload.php";

$email = $_POST["email"];
$pass = $_POST["pass"];

$login = (new Autenticacion())->log_in($email, $pass);

if($login){
    $_SESSION['user_id'] = $login['id']; 
    $_SESSION['roles'] = $login['roles']; 

    if($_SESSION["login"]["roles"] != "usuario" ){
        (new Alerta())->add_alerta("Bienvenido administrador", "success");
        header("Location: ../index.php");
        exit();
    }else{
        header("Location: ../../index.php");
        exit();
    }
}else{
    (new Alerta())->add_alerta("Usuario o Contraseña incorrecto", "danger");
    (new Autenticacion())->log_out();
    header("Location: ../index.php?sec=login");
    exit();
}