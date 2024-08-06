<?php
    $categorias = (new Categoria())->catalogo_completo();
    $marcas = (new Marca())->catalogo_completo();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de producto</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/add_producto_acc.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input class="form-control" type="text" name="nombreProducto">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoria principal</label>
                    <select class="form-select" name="categoria_id" id="categoria_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombreCategoria() ?></option>
                        <?php } ?>
                    </select>
                </div>    
                <div class="col-md-6 mb-3">
                    <label class="form-label">Marca</label>
                    <select class="form-select" name="marca_id" id="marca_id">
                        <option value="" selected disabled>Elija una opcion</option>
                        <?php foreach ($marcas as $marca) { ?>
                            <option value="<?= $marca->getId() ?>"><?= $marca->getMarcaCompleta() ?></option>
                        <?php } ?>
                    </select>
                </div>       
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contenido Neto</label>
                    <input class="form-control" type="text" name="contNeto">
                </div>   

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Imagen del producto</label>
                    <input class="form-control" type="file" name="imagen">
                </div>     
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="">Precio</label>
                    <input class="form-control" type="number" name="precio">
                </div>                                                    
                <div class="col-md-12 mb-3">
                    <label class="form-label mb-5" for="">Descripción del producto</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="7"></textarea>
                </div>                   
                <button class="btn" type="submit">Cargar</button>
            </form>
        </div>
    </div>
</div>
