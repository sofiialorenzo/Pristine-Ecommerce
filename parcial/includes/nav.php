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
        <li class="nav-item">
          <a class="navLink" href="index.php?sec=newsletter">Newsletter</a>
        </li>
      </ul>
    </div>
    <div id="logos">
    <ul class="navbar-nav ms-auto">

    <?php if( isset($_SESSION["login"]) ){ ?>       
                    <li class="nav-item">
                        <a class="nav-link" href="admin/actions/auth_logout.php">Salir</a>
                    </li>    
                    <?php }else{ ?>
                      <li class="nav-item">
                      <a class="navLinkLogos" href="index.php?sec=login"><i class="material-symbols-outlined outlined">person</i>
                      </a>
                      </li>  
                    <?php } ?> 
                
        <li class="nav-item">
          <a class="navLinkLogos" href="index.php?sec=carrito"><i class="material-symbols-outlined" id="logoCart">shopping_basket</i></a>
        </li>
    </div>
  </div>
</nav>
</div>

 