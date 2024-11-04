<?php
$categorias_id = ( new Producto())->categorias_validas();
?>

<footer class="bg-gray-900 text-white">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="#" class="flex items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h3 class="mb-6 text-sm font-semibold uppercase text-gray-300">Productos</h3>
                    <ul class="text-white font-medium">
                        <?php foreach ($categorias_id as $categoria) { ?>
                            <li class="mb-4">
                                <a class="hover:underline" href="index.php?sec=productos&categoria=<?= $categoria['categoria_id'] ?>">
                                    <?= $categoria['categoria'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-6 text-sm font-semibold uppercase text-gray-300">Sobre nosotros</h3>
                    <ul class="text-white font-medium">
                        <li class="mb-4 hover:underline">Sobre nosotros</li>
                        <li class="mb-4 hover:underline">FAQ</li>
                        <li class="mb-4 hover:underline">Términos y condiciones</li>
                    </ul>
                </div>

                <div>
                    <h3 class="mb-6 text-sm font-semibold uppercase text-gray-300">Contacto</h3>
                    <ul class="text-white font-medium">
                        <li class="mb-4">info.pristine@mail.com</li>
                        <li class="mb-4">54999111</li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-6 border-gray-700 sm:mx-auto lg:my-8" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-white">© 2023 
                <a href="#" class="hover:underline">Pristine™</a>. Todos los derechos reservados.
            </span>
        </div>
    </div>
</footer>
