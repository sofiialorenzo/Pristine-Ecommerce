<?php
$id = $_GET['id'] ?? false;
$marca = (new Marca())->get_x_id($id);
?>

<div class="py-20">
    <div class="max-w-lg mx-auto px-6 bg-white rounded-lg shadow-lg pt-10 pb-4">
        <h1 class="text-center text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-900 mb-6">
            ¿Seguro que deseas eliminar esta marca?
        </h1>

        <div class="flex justify-center mb-6">
            <p class="text-lg md:text-xl font-medium text-gray-700 text-center">
                Nombre de la marca: <span class="text-violet-900 font-bold"><?= $marca->getMarcaCompleta() ?></span>
            </p>
        </div>

        <div class="flex justify-between my-12">
            <a href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>" 
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Eliminar
            </a>
            <a href="index.php?sec=dashboard" 
                class="bg-slate-400 hover:bg-slate-500 text-gray-900 font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Cancelar
            </a>
        </div>
    </div>
</div>
