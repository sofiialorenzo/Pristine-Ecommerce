<?php
    $categorias = (new Categoria())->catalogo_completo();
    $marcas = (new Marca())->catalogo_completo();
    $categorias_secundarias = (new CategoriaSecundaria())->catalogo_completo();
    $producto = (new Producto())->catalogo_x_id($_GET["id"]);
?>

<div class="min-h-screen py-20 px-4">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-10">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-violet-900 text-center pb-10">Editar Producto</h1>
        <form action="actions/edit_producto_acc.php" method="post" enctype="multipart/form-data" class="space-y-8">
            <input type="hidden" name="id" value="<?= $producto->getId() ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-10">
                <div>
                    <label for="nombreProducto" class="block text-sm font-medium text-gray-800">Nombre del producto</label>
                    <input type="text" name="nombreProducto" id="nombreProducto" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                        value="<?= $producto->getnombreProducto() ?>">
                </div>

                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-800">Categoría principal</label>
                    <select name="categoria_id" id="categoria_id" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm">
                        <option value="" selected disabled>Seleccione una categoría</option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option <?= $categoria->getId() == $producto->getCategoria_id() ? "selected" : "" ?> 
                                value="<?= $categoria->getId() ?>">
                                <?= $categoria->getNombreCategoria() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <label for="marca_id" class="block text-sm font-medium text-gray-800">Marca</label>
                    <select name="marca_id" id="marca_id" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm">
                        <option value="" selected disabled>Seleccione una marca</option>
                        <?php foreach ($marcas as $marca) { ?>
                            <option <?= $marca->getId() == $producto->getMarca_id() ? "selected" : "" ?> 
                                value="<?= $marca->getId() ?>">
                                <?= $marca->getMarcaCompleta() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div>
                    <label for="contNeto" class="block text-sm font-medium text-gray-800">Contenido Neto</label>
                    <input type="text" name="contenidoNeto" id="contNeto" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                        value="<?= $producto->getContenidoNeto() ?>">
                </div>

                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-800">Precio</label>
                    <input type="number" name="precio" id="precio" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                        value="<?= $producto->getPrecio() ?>">
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-medium text-gray-800">Imagen Actual</label>
                    <img class="mt-4 max-w-full rounded shadow-md" src="../img/productos/<?= $producto->getImagen() ?>" alt="Imagen actual">
                    <input type="hidden" name="imagen_og" value="<?= $producto->getImagen() ?>">
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-medium text-gray-800">Reemplazar Imagen</label>
                    <input type="file" name="imagen" id="imagen" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800">Categorías secundarias</label>
                <div class="mt-4 flex flex-wrap gap-4">
                    <?php foreach ($categorias_secundarias as $categoria_secundaria) {
                        $categoria_seleccionada = explode(",", $producto->getCategoriasSecundarias());
                    ?>
                        <div class="flex items-center">
                            <input type="checkbox" name="categorias_secundarias[]" id="categoria_secundaria<?= $categoria_secundaria->getId() ?>" 
                                value="<?= $categoria_secundaria->getId() ?>" 
                                <?= in_array($categoria_secundaria->getId(), $categoria_seleccionada) ? "checked" : "" ?> 
                                class="h-4 w-4 text-violet-600">
                            <label for="categoria_secundaria<?= $categoria_secundaria->getId() ?>" 
                                class="ml-2 text-sm text-gray-700">
                                <?= $categoria_secundaria->getNombre() ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-800">Descripción del producto</label>
                <textarea name="descripcion" id="descripcion" rows="1" 
                    class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm">
                    <?= $producto->getDescripcion() ?>
                </textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-violet-900 text-white font-semibold rounded-lg shadow-md hover:bg-violet-950 transition">
                    Editar Producto
                </button>
            </div>
        </form>
    </div>
</div>
