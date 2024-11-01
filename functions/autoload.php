<?php 
// function autoloadClass($nombreClase){
//     $archivoClase = __DIR__ . "/../class/$nombreClase.php";
    
//     if(file_exists($archivoClase)){
//         require_once $archivoClase;
//     }
// }

// spl_autoload_register("autoloadClass");



spl_autoload_register(function($nombreClase){
    $file = __DIR__ . '/../class/' .$nombreClase.'.php';
    if(file_exists($file)){
        require_once $file;
    }
});
?>