<div class="min-h-screen py-20 px-4">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-10">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-violet-900 text-center pb-10" id="titulo-agregar-marca" role="heading" aria-level="1">Agregar Marca</h1>
        <form action="actions/add_marca_acc.php" method="post" enctype="multipart/form-data" class="space-y-8" aria-labelledby="titulo-agregar-marca">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-10">
                <div class="col-span-2">
                    <label for="marca_completa" class="block text-sm font-medium text-gray-800" id="label-marca-completa" aria-label="Nombre de la marca que se desea agregar">Nombre de la Marca</label>
                    <input 
                        type="text" 
                        id="marca_completa" 
                        name="marca_completa" 
                        class="mt-2 block w-full border-b border-gray-300 focus:border-b-2 focus:border-violet-900 focus:outline-none shadow-sm" 
                        placeholder="Ej. Eucerin" 
                        required
                        aria-required="true" 
                        aria-describedby="descripcion-marca-completa"
                    >
                    <p id="descripcion-marca-completa" class="text-sm text-gray-500 mt-2">Por favor, ingresa el nombre completo de la marca que deseas agregar.</p>
                </div>
            </div>
            
            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full md:w-auto px-6 py-3 bg-violet-900 text-white font-semibold rounded-lg shadow-md hover:bg-violet-950 transition"
                    aria-label="Enviar formulario para agregar la marca"
                >
                    Cargar Marca
                </button>
            </div>
        </form>
    </div>
</div>
