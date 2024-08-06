<?php

include_once "class/Conexion.php";
include_once "class/Productos.php";
$conexion = ( new Conexion() )->getConexion();

$query = "SELECT * FROM productos";

$PDOStatement = $conexion->prepare($query);
$PDOStatement->setFetchMode(PDO::FETCH_CLASS, Producto::class);
$PDOStatement->execute();
$productos = [];
while($producto = $PDOStatement->fetch()){
    $productos []= $producto;
}
echo "<pre>";
print_r($productos);
echo "</pre>";




// INSERT INTO `marcas`(`id`, `marca_completa`) VALUES 
// (1, 'Garnier'),
// (2, 'Cerave'),
// (3, 'Coony'),
// (4, 'Sri Sri'),
// (5, 'La Roche Posay'),
// (6, 'Caviahue'),
// (7, 'Tortulan'),
// (8, 'Puro'),
// (9, 'Dermaglos'),
// (10, 'ACF By Dadatina'),
// (11, 'Nivea'),
// (12, 'Eucerin'),
// (13, 'Bio Oil'),
// (14, 'Cetaphil')

// INSERT INTO `productos`(`id`, `producto`, `imagen`, `descripcion`, `marca_id`, `contenidoNeto`, `categoria_id`, `propiedades`, `precio`) VALUES 
// (1,'Agua micelar','Agua_Micelar_Garnier.jpg','Las micelas actuan como imanes que captan y remueven suciedad, restos de maquillaje y sebo, acumulados en el rostro. Los resultados son una limpieza profunda, sin sensación grasosa.',1,'140 ml',1,'',6900),
// (2,'Limpiador facial','Limpiador_Facial_Cerave.jpg','El limpiador hidratante, ayuda a equilibrar la barrera natural de la piel sin resecarla. Su fórmula con 3 ceramidas esenciales, sin espuma, remueve gentilmente la suciedad, la oleosidad y el maquillaje. Limpia de manera eficaz la piel aumentando el nivel de hidratación desde su primer uso.',2,'236 ml',1,'',17980),
// (3,'Toner pads','Toner_Pads_Coony.jpg','Son son 60 almohadillas enriquecidas con 89% de extracto de Centella Asiática. El ingrediente estrella de origen botánico de reconocida efectividad en las mejores formulaciones cosméticas de Corea. Sumado a la Niacinamida y a sus ingredientes naturales, estas almohadillas completan la limpieza removiendo las células muertas de la piel, ayudan a equilibrar el pH, y a combatir el acné. Además de suavizar las marcas y reducir las líneas finas y las arrugas, hidratan el rostro dejándolo suave, flexible y preparado para absorber de manera eficaz y homogénea los siguientes activos de su rutina, aprovechándolos al máximo.',3,'130 ml',1,'',27000),
// (4,'Agua de rosas','Agua_De_Rosas.jpg','Con tan solo una aplicacion, el agua de rosas te dara hidratacion y tonicidad, ademas de un efecto refrescante. Inspirada en el poder y en la suavidad que caracteriza a las rosas, esta agradable fragancia revitaliza la piel cansada y opaca.La combinacion unica de extracto de rosas y otros componentes esenciales, garantiza cuatro principales beneficios: Limpieza: limpia suavemente la piel y brinda luminosidad. Hidratacion: remueve la sequedad, hidrata y suaviza la piel.Tonificacion: la funcion tonica de agua de rosas brinda un efecto reafirmante.Revitalizacion: las bondades de la rosa ayudan a calmar la piel cansada, aportandole frescura.',4,'100 ml',1,'',6700),
// (5,'Crema con vitamina C','Crema_Hidratante_VitC.jpg','Probá la nueva crema hidratante textura ligera de Garnier. Esta crema hidrata, protege y unifica el tono de la piel en 7 días. Formulada con vitamina Cg, niacinamida y vitamina E.',1,'50 ml',1,'',7600),
// (6,'Serum facial','Serum_Facial.jpg','Rellena las arrugas y promueve la producción de colágeno gracias al ácido hialurónico, y además contiene Vitamina B para disminuir la inflamación, madecassoide para reparar la barrera de la piel, y agua termal. Rellena, repara las arrugas y regenera la piel sensible. Para las pieles más sensibles y sensibilizadas. Su uso es apto post tratamientos quirúrgicos a partir del cuarto día. Su textura es Aquagel hidratante rellenadora.',5,'30 ml',1,'',70000),
// (7,'Crema antiage de noche','Crema_Antiage_Noche.jpg','Su fórmula con ácido hialurónico y agua termal volcánica revitaliza y nutre la piel del rostro durante las horas de sueño. Revitaliza y nutre la piel del rostro, sus componentes favorecen la renovación de la piel durante las horas de descanso nocturno, reduce la profundidad de las líneas de expresión y previene la aparición de nuevas arrugas.',6,'50 ml',1,'',19100),
// (8,'Tónico refrescante','Tonico_Refrescante.jpg','Por su fórmula exclusiva, esta loción sin alcohol, refresca la piel al tiempo que la suaviza y tonifica, cerrando los poros. Ha sido desarrollada por nuestro laboratorio, para todo tipo de piel. Es un verdadero baño humectante y relajante que completa una buena limpieza de piel. Mantiene el equilibrio ácido de la piel e impide que se seque, o se dilaten los poros. Prepara la piel para una mejor penetración de una Crema Humectante o Nutritiva. Por la mañana y la noche, inmediatamente despues de la limpiaza, aplicar con algodon y extender por el rotro y cuello.',7,'200 ml',1,'',3700),
// (9,'Mascarilla facial','Mascarilla_Facial.jpg','Contiene 1 máscarilla premium. Sistema intensivo que actua mediante una máscara de alta densidad, logrando una penetración efectiva de los principios activos. Practicidad y eficacia comprobada. La característica principal del ácido hialurónico es su gran capacidad para atraer y retener el agua, por lo que en cosmética se ha convertido en uno de los ingredientes premium para cremas y tratamientos antiedad.',3,'-',1,'',3700),
// (10,'RollOn de rosa mosqueta','Rollon_Rosa_Mosqueta.jpg','Ayuda a prevenir y corregir el fotoenvejecimiento. Antioxidante y epitelizante. Rico en ácidos grasos poliinsaturados (oleico, cis-linoleico, alfa linolénico), ácido transretinoico, ácido palmítico, flavonoides, vitaminas C, y betacarotenos.',8,'10 ml',1,'',13400),
// (11,'Crema gel hidratante','Crema_Gel_Dermaglos.jpg','Brinda máxima hidratación y efecto refrescante. Con textura liviana y de rápida absorción, aporta firmeza y elasticidad a la piel dejándola suave y saludable. Ácido Hialurónico: hidratante de la piel, que ayuda a mantener la flexibilidad y elasticidad. Vitamina A: estimula la renovación celular de la piel aumentando su elasticidad y mejorando su apariencia. Normaliza y suaviza la piel seca y deshidratada, manteniendo equilibrada su hidratación natural y reforzando su función barrera. Vitamina E: antioxidante de origen natural que previene el envejecimiento prematuro de la piel. Glicerina: humectante que ayuda a conservar y absorber la humedad de la piel, brindando una hidratación prolongada.',9,'300 gr',2,'',10900),
// (12,'Exfoliante corporal','Exfoliante_Corporal_Dadatina.jpg','Remueve células muertas revelando el brillo natural de la piel. Con ácido salicílico, aceite de palta, extracto de caléndula, bamboo y pepino. Este tratamiento corporal, contiene ingredientes y activos hidratantes de primera calidad que actúan cuidando el microbioma, dejando la piel suave e hidratada, con una delicada fragancia.',10,'200 ml',2,'',11000),
// (13,'Manteca corporal','Manteca_Corporal.jpg','Enriquecida con las bondades de la manteca de karite, la manteca de cacao, la proteina de soja y el aceite de almendra, esta Crema desprende las celulas muertas para revelar una piel de aspecto mas fresco y luminosoa. Un masaje antes de ducharte con Body Butter mantendra tu piel uniforme, hidratada y suave al tacto.',4,'150 ml',2,'',21800),
// (14,'Crema corporal de cereza','Crema_Corporal_Nivea.jpg','La Loción corporal Nivea Cereza y Aceite de Jojoba ofrece un excelente cuidado y está enriquecida con delicadas fragancias. Después de dos semanas de uso regular, la crema corporal de cereza con Aceite de Jojoba proporciona una hidratación profunda por 24 horas. Además, no deja una sensación grasosa y es de rápida absorción. Es adecuada para pieles normales a secas.',11,'400 ml',2,'',7000),
// (15,'Aceite de ducha','Aceite_De_Ducha.jpg','El Aceite de ducha pH5 Eucerin de uso diario preserva las defensas naturales de la piel y previene su sequedad, incluso después de la ducha. Su fórmula contiene una formulación única de buffer citrato pH5 y surfactantes extra suaves que protegen las enzimas propias de la piel. La reposición intensiva de los lípidos deja la piel con una sensación nutrida y sedosa. Está probado en pieles secas y sensibles. Ideal para utilizarse en zonas afectadas por alergias.',12,'400 ml',2,'',26900),
// (16,'Crema de manos','Crema_De_Manos.jpg','Cicaplast Manos de La Roche Posay es un tratamiento hidratante y regenerador para pieles sensibles, dañadas, resecas, agrietadas, eczemas o dermatitis irritativas.',5,'50 ml',2,'',32100),
// (17,'Aceite reparador','Aceite_Reparador.jpg','Ayuda a mejorar el aspecto de las cicatrices nuevas y antiguas. Mejora el aspecto de las estrías. También ayuda a aumentar la elasticidad de la piel, lo que reduce la posibilidad de que se formen nuevas. Ayuda a igualar el tono de la piel. Mejora el aspecto de la piel envejecida del rostro y del cuerpo y reduce la pérdida de humedad y a mejorar el aspecto de la piel deshidratada.',13,'60 ml',2,'',7300),
// (18,'Serum corporal en spray','Serum_Corporal_Spray.jpg','Formulado para pieles secas. Profundiza la hidratación ayudando a calmar la piel y mejorando su calidad. Además contiene ácido hialurónico, aceite de semilla de girasol,provitamina B5 y vitamina E para rehidratar y restaurar la apariencia de la piel.Esta exclusiva loción corporal en aerosol se absorbe rápidamente y se seca al instante para que la piel nunca se vea ni se sienta grasosa. Sin fragancia.',14,'207 ml',2,'',20600),
// (19,'Gel micro-exfoliante','Gel_Micro_Exfoliante.jpg','Ideal para pieles con acné moderado a severo persistente, con eficacia comprobada en cuerpo. Este producto corrige imperfecciones, exfolia para desobstruir poros, reduce y remueve sebo y purifica la piel. Contiene [LHA + 2% Ácido Salicílico][Zinc].',5,'400 ml',2,'',55200),
// (20,'Loción corporal hidratante','Locion_Corporal.jpg','La Loción corporal Eucerin UreaRepair PLUS 10% proporciona un alivio inmediato y más de 48 horas sin signos de piel extremadamente seca, pruriginosa y escamosa. Además, se absorbe rápidamente, no genera residuos grasos y le otorga a la piel una sensación tersa y flexible. Su fórmula contiene Urea, Ceramida como así también otros Factores Naturales de Hidratación (NMFs) que fijan la humectación y reparan la barrera cutánea protectora natural para evitar mayores pérdidas. Está probada en pieles secas y es adecuada para personas con Xerosis, Diabetes, Psoriasis y Queratosis pilaris.',12,'250 ml',2,'',34000),

