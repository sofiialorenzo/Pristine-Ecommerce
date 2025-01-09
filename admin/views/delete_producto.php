<?php
$id = $_GET['id'] ?? false;
$producto = (new Producto())->catalogo_x_id($id);
?>
<div class="py-20">
    <div class="max-w-lg mx-auto px-6 bg-white rounded-lg shadow-lg pt-10 pb-4" role="dialog" aria-labelledby="confirmar-eliminacion" aria-describedby="descripcion-eliminacion">
        <h1 class="text-center text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900 mb-6" id="confirmar-eliminacion">
            ¿Seguro que deseas eliminar este producto?
        </h1>

        <div class="flex justify-center mb-6">
            <img class="max-w-full h-auto rounded-lg shadow-md" 
                src="../img/productos/<?= $producto->getImagen() ?>" 
                alt="Imagen del producto <?= $producto->getNombre() ?>"
                aria-describedby="descripcion-eliminacion">
        </div>

        <div class="flex justify-between my-12">
            <a href="actions/delete_producto_acc.php?id=<?= $producto->getId() ?>" 
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105"
                aria-label="Eliminar el producto <?= $producto->getNombre() ?>">
                Eliminar
            </a>
            <a href="index.php?sec=dashboard" 
                class="bg-slate-400 hover:bg-slate-500 text-gray-900 font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105"
                aria-label="Cancelar la eliminación y regresar al dashboard">
                Cancelar
            </a>
        </div>
    </div>
</div>
