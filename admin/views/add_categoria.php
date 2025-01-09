<div class="min-h-screen py-20 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-10">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-violet-900 text-center pb-10" id="titulo-formulario" role="heading" aria-level="1">Agregar Categoría Secundaria</h1>
        <form action="actions/add_categoria_acc.php" method="post" enctype="multipart/form-data" class="space-y-8" aria-labelledby="titulo-formulario">
            <div class="grid grid-cols-1 gap-8">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-800" id="label-nombre" aria-label="Nombre de la categoría">Nombre de la categoría</label>
                    <input type="text" name="nombre" id="nombre" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                        placeholder="Ej. Categoría X"
                        aria-required="true" aria-describedby="descripcion-nombre" />
                    <p id="descripcion-nombre" class="text-sm text-gray-500 mt-2">Por favor, ingresa el nombre de la nueva categoría secundaria.</p>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" 
                    class="w-full md:w-auto px-6 py-3 bg-violet-900 text-white font-semibold rounded-lg shadow-md hover:bg-violet-950 transition"
                    aria-label="Agregar la nueva categoría secundaria">Agregar Categoría</button>
            </div>
        </form>
    </div>
</div>
