<?php
$categorias_id = ( new Producto())->categorias_validas();
?>

<footer>
<div class="container" id="containerFooter">
        <div class="row d-flex justify-content-around">
                <div class="col-sm-12 col-lg-3">
                        <h3>Productos</h3>
                        <ul>
                        <?php foreach ($categorias_id as $categoria) { ?>
                        <li class="nav-item">
                            <a class="navLink" href="index.php?sec=productos&categoria=<?= $categoria['categoria_id'] ?>">
                                <?= $categoria['categoria'] ?>
                            </a>
                        </li>
                    <?php } ?>
                        </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <h3>Sobre nosotros</h3>
                        <ul>
                                <li>Sobre nosotros</li>
                                <li>FAQ</li>
                                <li>Terminos y condiciones</li>
                        </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <h3>Contacto</h3>
                        <ul>
                                <li>info.pristine@mail.com</li>
                                <li>54999111</li>
                        </ul>
                </div>
        </div>
</div>
</footer>