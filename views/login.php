<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-center text-gray-900 mb-6">Iniciar Sesión</h1>
        <form class="space-y-4" action="admin/actions/auth_login.php" method="post">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                <input 
                    id="username" 
                    type="text" 
                    name="email" 
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa tu email"
                    required
                >
            </div>

            <div>
                <label for="pass" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input 
                    id="pass" 
                    type="password" 
                    name="pass" 
                    class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
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
