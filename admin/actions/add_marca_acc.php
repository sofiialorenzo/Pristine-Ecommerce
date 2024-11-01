
<?php
    require_once "../../functions/autoload.php";
    try {


        $marca_completa = $_POST["marca_completa"];
    
        $marca = new Marca();
        $marca->insert($marca_completa);

        (new Alerta())->add_alerta("Se pudo agregar la marca", "success");
        header("Location: ../index.php?sec=admin_marcas");
    } catch (\Exception $e) {
        echo $e->getMessage();
        (new Alerta())->add_alerta("No se pudo agregar la marca", "danger");
        die("No pude cargar la marca :(");
    }

