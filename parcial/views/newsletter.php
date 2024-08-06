<h2 class="text-center my-5 fs-sm-4">Suscribite a nuestro newsletter!</h2>
<form action="views/procesar_newsletter.php" enctype="multipart/form-data" method="POST">
<div class="container containerForm">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="InputNombre" name="nombre" required>
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="InputApellido" name="apellido" required>
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">Correo Electrónico</label>
    <input type="mail" class="form-control" id="InputCorreo"  name="correo" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="check">Acepto los términos y condiciones</label>
  </div>
  <button type="submit" class="btn fw-bold">Enviar</button>
  </div>
</form>

<div class="container" id="containerAlumna">
  <div class="row">
    <div class="col-md-6">
    <picture>
          <source srcset="./img/Sofia_Lorenzo.jpeg" type="image/svg+xml">
          <img src="./img/Sofia_Lorenzo.jpeg" class="img-fluid" alt="Sofía Lorenzo">
        </picture>
    </div>
    <div class="col-md-6">
      <ul class="list-group list-group-flush">
      <li class="list-group-item">Sofía Lorenzo</li>
      <li class="list-group-item">19 años</li>
      <li class="list-group-item">sofia.lorenzo@davinci.edu.ar</li>

    </div>
  </div>
</div>