<div class="flex h-screen bg-slate-50 py-28">
    <div class="flex-1 flex flex-col">
            <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900"><?= $titulo ?></h1>
        <main class="flex-1 p-6">
            <?= (new Alerta())->get_alertas() ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Productos</h2>
                    <p class="mt-2 text-gray-700">Administra tus productos, agrega nuevos o edita los existentes.</p>
                    <a href="index.php?sec=admin_productos" class="inline-block mt-4 text-violet-900 font-semibold hover:underline">Ir a Productos</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Usuarios</h2>
                    <p class="mt-2 text-gray-700">Administra y consulta usuarios registrados.</p>
                    <a href="index.php?sec=listar_usuarios" class="inline-block mt-4 text-violet-900 font-semibold hover:underline">Ver Usuarios</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow">
                    <h2 class="text-lg font-semibold text-gray-800">Marcas</h2>
                    <p class="mt-2 text-gray-700">Gestiona las marcas disponibles en tu catálogo.</p>
                    <a href="index.php?sec=admin_marcas" class="inline-block mt-4 text-violet-900 font-semibold hover:underline">Ir a Marcas</a>
                </div>
            </div>
        </main>
    </div>
</div>
