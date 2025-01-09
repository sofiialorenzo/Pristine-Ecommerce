-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2025 a las 18:50:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pristine2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `producto_id`, `nombreProducto`, `imagen`, `cantidad`, `total`) VALUES
(1, 2, 6, 'Serum facial', 'Serum_Facial.jpg', 1, 70000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos_x_usuarios`
--

CREATE TABLE `carritos_x_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carritos_x_usuarios`
--

INSERT INTO `carritos_x_usuarios` (`id`, `usuario_id`, `producto_id`, `nombreProducto`, `imagen`, `cantidad`, `precio`) VALUES
(2, 2, 2, 'Limpiador facial', 'Limpiador_Facial_Cerave.jpg', 1, 17980.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Facial'),
(2, 'Corporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_secundarias`
--

CREATE TABLE `categorias_secundarias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_secundarias`
--

INSERT INTO `categorias_secundarias` (`id`, `nombre`) VALUES
(2, 'vegano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'Garnier'),
(2, 'Cerave'),
(3, 'Coony'),
(4, 'Sri Sri'),
(5, 'La Roche Posay'),
(6, 'Caviahue'),
(7, 'Tortulan'),
(8, 'Puro'),
(9, 'Dermaglos'),
(10, 'ACF By Dadatina'),
(11, 'Nivea'),
(12, 'Eucerin'),
(13, 'Bio Oil'),
(14, 'Cetaphil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `marca_id` int(10) UNSIGNED DEFAULT NULL,
  `contenidoNeto` varchar(50) DEFAULT NULL,
  `categoria_id` int(10) UNSIGNED DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombreProducto`, `imagen`, `descripcion`, `marca_id`, `contenidoNeto`, `categoria_id`, `precio`) VALUES
(1, 'Agua micelar', 'Agua_Micelar_Garnier.jpg', 'Las micelas actuan como imanes que captan y remueven suciedad, restos de maquillaje y sebo, acumulados en el rostro. Los resultados son una limpieza profunda, sin sensación grasosa.', 1, '140 ml', 1, 6900.00),
(2, 'Limpiador facial', 'Limpiador_Facial_Cerave.jpg', 'El limpiador hidratante, ayuda a equilibrar la barrera natural de la piel sin resecarla. Su fórmula con 3 ceramidas esenciales, sin espuma, remueve gentilmente la suciedad, la oleosidad y el maquillaje. Limpia de manera eficaz la piel aumentando el nivel de hidratación desde su primer uso.', 2, '236 ml', 1, 17980.00),
(3, 'Toner pads', 'Toner_Pads_Coony.jpg', 'Son son 60 almohadillas enriquecidas con 89% de extracto de Centella Asiática. El ingrediente estrella de origen botánico de reconocida efectividad en las mejores formulaciones cosméticas de Corea. Sumado a la Niacinamida y a sus ingredientes naturales, estas almohadillas completan la limpieza removiendo las células muertas de la piel, ayudan a equilibrar el pH, y a combatir el acné. Además de suavizar las marcas y reducir las líneas finas y las arrugas, hidratan el rostro dejándolo suave, flexible y preparado para absorber de manera eficaz y homogénea los siguientes activos de su rutina, aprovechándolos al máximo.', 3, '130 ml', 1, 27000.00),
(4, 'Agua de rosas', 'Agua_De_Rosas.jpg', 'Con tan solo una aplicacion, el agua de rosas te dara hidratacion y tonicidad, ademas de un efecto refrescante. Inspirada en el poder y en la suavidad que caracteriza a las rosas, esta agradable fragancia revitaliza la piel cansada y opaca.La combinacion unica de extracto de rosas y otros componentes esenciales, garantiza cuatro principales beneficios: Limpieza: limpia suavemente la piel y brinda luminosidad. Hidratacion: remueve la sequedad, hidrata y suaviza la piel.Tonificacion: la funcion tonica de agua de rosas brinda un efecto reafirmante.Revitalizacion: las bondades de la rosa ayudan a calmar la piel cansada, aportandole frescura.', 4, '100 ml', 1, 6700.00),
(5, 'Crema con vitamina C', 'Crema_Hidratante_VitC.jpg', 'Probá la nueva crema hidratante textura ligera de Garnier. Esta crema hidrata, protege y unifica el tono de la piel en 7 días. Formulada con vitamina Cg, niacinamida y vitamina E.', 1, '50 ml', 1, 7600.00),
(6, 'Serum facial', 'Serum_Facial.jpg', 'Rellena las arrugas y promueve la producción de colágeno gracias al ácido hialurónico, y además contiene Vitamina B para disminuir la inflamación, madecassoide para reparar la barrera de la piel, y agua termal. Rellena, repara las arrugas y regenera la piel sensible. Para las pieles más sensibles y sensibilizadas. Su uso es apto post tratamientos quirúrgicos a partir del cuarto día. Su textura es Aquagel hidratante rellenadora.', 5, '30 ml', 1, 70000.00),
(7, 'Crema antiage de noche', 'Crema_Antiage_Noche.jpg', 'Su fórmula con ácido hialurónico y agua termal volcánica revitaliza y nutre la piel del rostro durante las horas de sueño. Revitaliza y nutre la piel del rostro, sus componentes favorecen la renovación de la piel durante las horas de descanso nocturno, reduce la profundidad de las líneas de expresión y previene la aparición de nuevas arrugas.', 6, '50 ml', 1, 19100.00),
(8, 'Tónico refrescante', 'Tonico_Refrescante.jpg', 'Por su fórmula exclusiva, esta loción sin alcohol, refresca la piel al tiempo que la suaviza y tonifica, cerrando los poros. Ha sido desarrollada por nuestro laboratorio, para todo tipo de piel. Es un verdadero baño humectante y relajante que completa una buena limpieza de piel. Mantiene el equilibrio ácido de la piel e impide que se seque, o se dilaten los poros. Prepara la piel para una mejor penetración de una Crema Humectante o Nutritiva. Por la mañana y la noche, inmediatamente despues de la limpiaza, aplicar con algodon y extender por el rotro y cuello.', 7, '200 ml', 1, 3700.00),
(9, 'Mascarilla facial', 'Mascarilla_Facial.jpg', 'Contiene 1 máscarilla premium. Sistema intensivo que actua mediante una máscara de alta densidad, logrando una penetración efectiva de los principios activos. Practicidad y eficacia comprobada. La característica principal del ácido hialurónico es su gran capacidad para atraer y retener el agua, por lo que en cosmética se ha convertido en uno de los ingredientes premium para cremas y tratamientos antiedad.', 3, '-', 1, 3700.00),
(10, 'RollOn de rosa mosqueta', 'Rollon_Rosa_Mosqueta.jpg', 'Ayuda a prevenir y corregir el fotoenvejecimiento. Antioxidante y epitelizante. Rico en ácidos grasos poliinsaturados (oleico, cis-linoleico, alfa linolénico), ácido transretinoico, ácido palmítico, flavonoides, vitaminas C, y betacarotenos.', 8, '10 ml', 1, 13400.00),
(11, 'Crema gel hidratante', 'Crema_Gel_Dermaglos.jpg', 'Brinda máxima hidratación y efecto refrescante. Con textura liviana y de rápida absorción, aporta firmeza y elasticidad a la piel dejándola suave y saludable. Ácido Hialurónico: hidratante de la piel, que ayuda a mantener la flexibilidad y elasticidad. Vitamina A: estimula la renovación celular de la piel aumentando su elasticidad y mejorando su apariencia. Normaliza y suaviza la piel seca y deshidratada, manteniendo equilibrada su hidratación natural y reforzando su función barrera. Vitamina E: antioxidante de origen natural que previene el envejecimiento prematuro de la piel. Glicerina: humectante que ayuda a conservar y absorber la humedad de la piel, brindando una hidratación prolongada.', 9, '300 gr', 2, 10900.00),
(12, 'Exfoliante corporal', 'Exfoliante_Corporal_Dadatina.jpg', 'Remueve células muertas revelando el brillo natural de la piel. Con ácido salicílico, aceite de palta, extracto de caléndula, bamboo y pepino. Este tratamiento corporal, contiene ingredientes y activos hidratantes de primera calidad que actúan cuidando el microbioma, dejando la piel suave e hidratada, con una delicada fragancia.', 10, '200 ml', 2, 11000.00),
(13, 'Manteca corporal', 'Manteca_Corporal.jpg', 'Enriquecida con las bondades de la manteca de karite, la manteca de cacao, la proteina de soja y el aceite de almendra, esta Crema desprende las celulas muertas para revelar una piel de aspecto mas fresco y luminosoa. Un masaje antes de ducharte con Body Butter mantendra tu piel uniforme, hidratada y suave al tacto.', 4, '150 ml', 2, 21800.00),
(14, 'Crema corporal de cereza', 'Crema_Corporal_Nivea.jpg', 'La Loción corporal Nivea Cereza y Aceite de Jojoba ofrece un excelente cuidado y está enriquecida con delicadas fragancias. Después de dos semanas de uso regular, la crema corporal de cereza con Aceite de Jojoba proporciona una hidratación profunda por 24 horas. Además, no deja una sensación grasosa y es de rápida absorción. Es adecuada para pieles normales a secas.', 11, '400 ml', 2, 7000.00),
(15, 'Aceite de ducha', 'Aceite_De_Ducha.jpg', 'El Aceite de ducha pH5 Eucerin de uso diario preserva las defensas naturales de la piel y previene su sequedad, incluso después de la ducha. Su fórmula contiene una formulación única de buffer citrato pH5 y surfactantes extra suaves que protegen las enzimas propias de la piel. La reposición intensiva de los lípidos deja la piel con una sensación nutrida y sedosa. Está probado en pieles secas y sensibles. Ideal para utilizarse en zonas afectadas por alergias.', 12, '400 ml', 2, 26900.00),
(16, 'Crema de manos', 'Crema_De_Manos.jpg', 'Cicaplast Manos de La Roche Posay es un tratamiento hidratante y regenerador para pieles sensibles, dañadas, resecas, agrietadas, eczemas o dermatitis irritativas.', 5, '50 ml', 2, 32100.00),
(17, 'Aceite reparador', 'Aceite_Reparador.jpg', 'Ayuda a mejorar el aspecto de las cicatrices nuevas y antiguas. Mejora el aspecto de las estrías. También ayuda a aumentar la elasticidad de la piel, lo que reduce la posibilidad de que se formen nuevas. Ayuda a igualar el tono de la piel. Mejora el aspecto de la piel envejecida del rostro y del cuerpo y reduce la pérdida de humedad y a mejorar el aspecto de la piel deshidratada.', 13, '60 ml', 2, 7300.00),
(18, 'Serum corporal en spray', 'Serum_Corporal_Spray.jpg', 'Formulado para pieles secas. Profundiza la hidratación ayudando a calmar la piel y mejorando su calidad. Además contiene ácido hialurónico, aceite de semilla de girasol,provitamina B5 y vitamina E para rehidratar y restaurar la apariencia de la piel.Esta exclusiva loción corporal en aerosol se absorbe rápidamente y se seca al instante para que la piel nunca se vea ni se sienta grasosa. Sin fragancia.', 14, '207 ml', 2, 20600.00),
(19, 'Gel micro-exfoliante', 'Gel_Micro_Exfoliante.jpg', 'Ideal para pieles con acné moderado a severo persistente, con eficacia comprobada en cuerpo. Este producto corrige imperfecciones, exfolia para desobstruir poros, reduce y remueve sebo y purifica la piel. Contiene [LHA + 2% Ácido Salicílico][Zinc].', 5, '400 ml', 2, 55200.00),
(20, 'Loción corporal hidratante', 'Locion_Corporal.jpg', 'La Loción corporal Eucerin UreaRepair PLUS 10% proporciona un alivio inmediato y más de 48 horas sin signos de piel extremadamente seca, pruriginosa y escamosa. Además, se absorbe rápidamente, no genera residuos grasos y le otorga a la piel una sensación tersa y flexible. Su fórmula contiene Urea, Ceramida como así también otros Factores Naturales de Hidratación (NMFs) que fijan la humectación y reparan la barrera cutánea protectora natural para evitar mayores pérdidas. Está probada en pieles secas y es adecuada para personas con Xerosis, Diabetes, Psoriasis y Queratosis pilaris.', 12, '250 ml', 2, 34000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_categorias`
--

CREATE TABLE `productos_categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED DEFAULT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_completo`, `username`, `password`, `roles`) VALUES
(2, 'sofia@gmail.com', 'sofia lorenzo', 'soffilorenzo', '$2y$10$WNnRliONwPEQ/FbPIKRCzOOYuaMyPl.l8y.ZItSCazZs1u/jYi.Oa', 'usuario'),
(3, 'admin@admin.com', 'admin', 'admin', '$2y$10$jWmzd42W2lvPY76Oa5KcmO/8nPVWBkdzshqOknZiiij4NuRHjbUDm', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `carritos_x_usuarios`
--
ALTER TABLE `carritos_x_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_secundarias`
--
ALTER TABLE `categorias_secundarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carritos_x_usuarios`
--
ALTER TABLE `carritos_x_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias_secundarias`
--
ALTER TABLE `categorias_secundarias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  ADD CONSTRAINT `productos_categorias_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_secundarias` (`id`),
  ADD CONSTRAINT `productos_categorias_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
