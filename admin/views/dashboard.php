<div class="flex h-screen bg-slate-50 py-28">
    <div class="flex-1 flex flex-col">
        <h1 class="text-center font-bold text-2xl md:text-3xl lg:text-4xl mb-16 text-gray-900" id="titulo-principal"><?= $titulo ?></h1>
        <main class="flex-1 p-6" aria-labelledby="titulo-principal">
            <?= (new Alerta())->get_alertas() ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" role="region" aria-label="Panel de administración">
                <div class="p-6 bg-white rounded-lg shadow" role="group" aria-labelledby="productos-section">
                    <h2 class="text-lg font-semibold text-gray-800" id="productos-section" aria-label="Sección de productos">Productos</h2>
                    <p class="mt-2 text-gray-700" aria-label="Descripción de la sección de productos">Administra tus productos, agrega nuevos o edita los existentes.</p>
                    <a href="index.php?sec=admin_productos" class="inline-block mt-4 text-violet-900 font-semibold hover:underline" aria-label="Ir a la página de administración de productos">Ir a Productos</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow" role="group" aria-labelledby="usuarios-section">
                    <h2 class="text-lg font-semibold text-gray-800" id="usuarios-section" aria-label="Sección de usuarios">Usuarios</h2>
                    <p class="mt-2 text-gray-700" aria-label="Descripción de la sección de usuarios">Administra y consulta usuarios registrados.</p>
                    <a href="index.php?sec=listar_usuarios" class="inline-block mt-4 text-violet-900 font-semibold hover:underline" aria-label="Ir a la página de usuarios">Ver Usuarios</a>
                </div>
                <div class="p-6 bg-white rounded-lg shadow" role="group" aria-labelledby="marcas-section">
                    <h2 class="text-lg font-semibold text-gray-800" id="marcas-section" aria-label="Sección de marcas">Marcas</h2>
                    <p class="mt-2 text-gray-700" aria-label="Descripción de la sección de marcas">Gestiona las marcas disponibles en tu catálogo.</p>
                    <a href="index.php?sec=admin_marcas" class="inline-block mt-4 text-violet-900 font-semibold hover:underline" aria-label="Ir a la página de administración de marcas">Ir a Marcas</a>
                </div>
            </div>
        </main>
    </div>
</div>
