<footer class="bg-slate-50">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="flex flex-col md:flex-row md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <img src="img/nav/logo-pristine.svg" class="h-8" alt="PRISTINE logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-50">PRISTINE</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-6">
                <div>
                    <h3 class="mb-6 text-sm font-bold uppercase text-violet-950">Productos</h3>
                    <ul class="text-white font-medium">
                        <?php foreach ($categorias_id as $categoria) { ?>
                            <li class="mb-4">
                                <a href="index.php?sec=productos&categoria=<?= $categoria['categoria_id'] ?>" class="hover:underline text-gray-800">
                                    <?= $categoria['categoria'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-6 text-sm font-bold uppercase text-violet-950">Sobre nosotros</h3>
                    <ul class="text-white font-medium">
                        <li class="mb-4 hover:underline text-gray-800">Sobre nosotros</li>
                        <li class="mb-4 hover:underline text-gray-800">FAQ</li>
                        <li class="mb-4 hover:underline text-gray-800">Términos y condiciones</li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-6 text-sm font-bold uppercase text-violet-950">Contacto</h3>
                    <ul class="text-white font-medium">
                        <li class="mb-4 text-gray-800">info.pristine@mail.com</li>
                        <li class="mb-4 text-gray-800">54999111</li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-6 border-violet-950 sm:mx-auto lg:my-8" />

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <span class="text-sm text-gray-600 text-center sm:text-left">© 2024 
                <a href="#" class="hover:underline">Pristine™</a>. Sofía Lorenzo - Programación II - DWT3AP. Proyecto realizado con fines educativos
            </span>
        </div>
    </div>
</footer>
