<?php
$id = $_GET['id'] ?? false;
$categoria = (new CategoriaSecundaria())->catalogo_x_id($id);
?>

<div class="min-h-screen py-20 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-10">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-violet-900 text-center pb-10">Editar Categoría Secundaria</h1>
        <form action="actions/edit_categoria_acc.php" method="post" enctype="multipart/form-data" class="space-y-8">
            <input type="hidden" name="id" value="<?= $categoria->getId() ?>">

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-800">Nombre de la Categoría</label>
                <input type="text" name="nombre" id="nombre" 
                    class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                    value="<?= $categoria->getNombre() ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="w-full md:w-auto px-6 py-3 bg-violet-900 text-white font-semibold rounded-lg shadow-md hover:bg-violet-950 transition">
                    Editar Categoría
                </button>
            </div>
        </form>
    </div>
</div>
