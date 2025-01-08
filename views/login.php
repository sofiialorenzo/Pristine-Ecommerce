<div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm sm:max-w-md bg-white rounded-lg shadow-lg p-6 sm:p-8">
        <h1 class="text-xl sm:text-2xl font-bold text-center text-gray-900 mb-4 sm:mb-6">Iniciar Sesión</h1>
        <?= (new Alerta())->get_alertas() ?>
        <form class="space-y-4" action="admin/actions/auth_login.php" method="post">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-800">Correo Electrónico</label>
                <input 
                    id="email" 
                    type="text" 
                    name="email" 
                    class="mt-1 block w-full px-3 py-2 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa tu email"
                    required
                >
            </div>

            <div>
                <label for="pass" class="block text-sm font-medium text-gray-800">Contraseña</label>
                <input 
                    id="pass" 
                    type="password" 
                    name="pass" 
                    class="mt-1 block w-full px-3 py-2 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa tu contraseña"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full px-4 py-2 bg-violet-900 text-white font-semibold rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-900 hover:text-violet-900 transition focus:ring-4 focus:ring-violet-500"
            >
                Iniciar Sesión
            </button>

            <div class="text-center">
                <a 
                    href="index.php?sec=registro" 
                    class="text-sm text-violet-900 hover:underline"
                >
                    ¿No tienes una cuenta? Regístrate
                </a>
            </div>
        </form>
    </div>
</div>
