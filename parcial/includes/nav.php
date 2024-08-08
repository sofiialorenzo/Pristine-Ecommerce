<?php
session_start();
$categorias_id = ( new Producto())->categorias_validas();
?>
    <div class="sticky-top">
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid" id="containerNav">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#contenidoNav" aria-controls="contenidoNav" aria-expanded="false" aria-label="navegacion">
    <span class="navbar-toggler-icon">Abrir menú</span>
    </button>
    <div>
    <h1 class="navbar-brand" href="index.php?sec=home">Pristine</h1>
    </div>
    <div class="navbar-collapse" id="contenidoNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="navLink" aria-current="page" href="index.php?sec=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="navLink" href="index.php?sec=catalogo">Catalogo</a>
        </li>
        <?php foreach ($categorias_id as $categoria) { ?>
                        <li class="nav-item">
                            <a class="navLink" href="index.php?sec=productos&categoria=<?= $categoria['categoria_id'] ?>">
                                <?= $categoria['categoria'] ?>
                            </a>
                        </li>
                    <?php } ?>
      </ul>
    </div>
    <div id="logos">
    <ul class="navbar-nav ms-auto">

    <?php if( isset($_SESSION["login"]) ){ ?>       
                        <li class="nav-item">
                            <a class="navLinkLogos" href="#" data-bs-toggle="modal" data-bs-target="#userModal" id="perfil"><i class="material-symbols-outlined">account_circle</i>
                            </a>
                        </li>    
                    <?php }else{ ?>
                      <li class="nav-item">
                      <a class="navLinkLogos" href="index.php?sec=login" id="login"><i class="material-symbols-outlined">person</i></a>
                      </li>  
                    <?php } ?> 
                
        <li class="nav-item">
          <a class="navLinkLogos" href="index.php?sec=carrito"><i class="material-symbols-outlined" id="logoCart">shopping_basket</i></a>
        </li>
        </ul>
    </div>
  </div>
</nav>
</div>


<!-- Modal de Usuario -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Bienvenido <?= $_SESSION["login"]['username']; ?> !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre completo:</strong> <?= $_SESSION['login']['nombre_completo']; ?></p>
                <p><strong>Nombre de usuario:</strong> <?= $_SESSION["login"]['username']; ?></p>
                <p><strong>Email:</strong> <?= $_SESSION["login"]['email']; ?></p>
                
                <?php
                // Cargar las compras del usuario
                $usuario_id = $_SESSION['login']['id'];
                $conexion = Conexion::getConexion();
                $query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id";
                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute(['usuario_id' => $usuario_id]);
                $compras = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php if (!empty($compras)): ?>
                    <h5 class="mt-3">Compras realizadas:</h5>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($compras as $compra): ?>
                            <tr>
                                <td><?= htmlspecialchars($compra['nombreProducto']); ?></td>
                                <td><?= htmlspecialchars($compra['cantidad']); ?></td>
                                <td><?= htmlspecialchars($compra['total']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="mt-3">No se encontraron compras para este usuario.</p>
                <?php endif; ?>

            </div>
            <div class="modal-footer">
                <a href="admin/actions/auth_logout.php" class="btn">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</div>


 