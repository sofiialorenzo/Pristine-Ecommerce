<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pristine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>   
<div>
<div class="container" id="containerDatosForm">
    <div>
        <h2 class="text-center my-5">Envío exitoso!</h2>
        <p class="text-center my-5">En breve nos pondremos en contacto contigo. <b>Muchas gracias por suscribirte!</b></p>
    </div>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> Nombre: <?= $nombre ?> </li>
            <li class="list-group-item"> Apellido: <?= $apellido ?> </li>
            <li class="list-group-item"> Correo: <?= $correo ?> </li>
        </ul>
    </div>
</div>
</div>
</body>
</html>
