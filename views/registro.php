<div class="flex items-center justify-center min-h-screen bg-gray-100 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-sm sm:max-w-md bg-white rounded-lg shadow-lg p-6 sm:p-8">
        <h1 class="text-xl sm:text-2xl font-bold text-center text-gray-900 mb-4 sm:mb-6">Registrar Usuario</h1>
        <?= (new Alerta())->get_alertas() ?>
        <form class="space-y-4" action="admin/actions/registrar_usuario.php" method="post">

            <div>
                <label for="username" class="block text-sm font-medium text-gray-800">Nombre de Usuario</label>
                <input 
                    id="username" 
                    type="text" 
                    name="username" 
                    class="mt-1 block w-full px-3 py-2 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa un nombre de usuario"
                    required
                >
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    class="mt-1 block w-full px-3 py-2 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa tu correo electrónico"
                    required
                >
            </div>

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-800">Nombre Completo</label>
                <input 
                    id="nombre" 
                    type="text" 
                    name="nombre" 
                    class="mt-1 block w-full px-3 py-2 text-gray-800 bg-gray-50 border border-gray-300 rounded-lg focus:ring-violet-500 focus:border-violet-500"
                    placeholder="Ingresa tu nombre completo"
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
                    placeholder="Crea una contraseña"
                    required
                >
            </div>

            <button 
                type="submit" 
                class="w-full px-4 py-2 bg-violet-900 text-white font-semibold rounded-lg hover:bg-transparent hover:border-2 hover:border-violet-900 hover:text-violet-900 transition focus:ring-4 focus:ring-violet-500"
            >
                Registrar
            </button>

            <div class="text-center">
                <a 
                    href="index.php?sec=inicio-sesion" 
                    class="text-sm text-violet-900 hover:underline"
                >
                    ¿Ya tienes una cuenta? Inicia Sesión
                </a>
            </div>
        </form>
    </div>
</div>
