-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2024 a las 02:07:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `mail`, `password`) VALUES
(1, 'webadmin', 'carolinan98@hotmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre_autor` varchar(200) NOT NULL,
  `nacimiento_autor` date NOT NULL,
  `nacionalidad_autor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre_autor`, `nacimiento_autor`, `nacionalidad_autor`) VALUES
(1, 'Gabriel Rolon', '1961-11-01', 'Argentino'),
(2, 'Gabriel Garcia Marquez', '1927-03-06', 'Colombiano'),
(3, 'Julio Cortazar', '1914-08-26', 'Argentino'),
(4, 'Rhonda Byrne', '1951-03-12', 'Australiana'),
(5, 'Miguel Ruiz', '1952-08-27', 'Mexicano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(300) NOT NULL,
  `tipo` varchar(300) NOT NULL,
  `sinopsis` text NOT NULL,
  `anio` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `tipo`, `sinopsis`, `anio`, `id_autor`) VALUES
(1, 'La voz ausente', 'Novela: Policial y suspenso psicológico', 'El renombrado psicoanalista Pablo Rouviot se embarca en la investigación del aparente suicidio de su hermano, motivado por sospechas de que existen circunstancias más complejas detrás de la tragedia. Armado con su vasta formación profesional académica, se encuentra inesperadamente inmerso en un intrigante complot, enfrentándose a un enemigo igualmente astuto y complejo que él.\r\n\r\nLa investigación policial se centra en torno a José «El Gitano» Heredia, otro psicoanalista que es encontrado muerto en su consultorio, aparentemente por suicidio. Sin embargo, lo que inicialmente parece ser un acto de muerte intencionada se convierte en un misterioso crimen que Rouviot, su amigo más cercano, se ve comprometido a resolver. Obsesionado con descifrar el enigma y en su búsqueda de respuestas, Rouviot recibe el respaldo de un aliado fundamental: el subcomisario Bermúdez, un policía dispuesto a colaborar en la resolución del caso.', 2018, 1),
(2, 'Historias de diván', 'Psicología ', '«Historias del Diván. Ocho relatos de vida» es un libro basado en casos reales en los que se nos presentan diálogos entre analista y paciente. Este libro con más de 13 ediciones se convirtió rápidamente en un superventas. \"Este no es un libro escrito exclusivamente para psicólogos, sino para todo aquel que se interese en el dolor y en la posibilidad de superarlo. Sus protagonistas no han sido el fruto de un capricho literario, sino que los he visto desgarrarse, reír, llorar, frustrarse y enojarse en mi consultorio semana tras semana\", escribe el licenciado Rolón en el prólogo de libro.', 2007, 1),
(3, 'Cien años de soledad', 'Novela: realismo mágico. ', 'Cien años de soledad’ se centra en la familia Buendía de Riohacha y la maldición que llevan con ellos, por involucrarse entre parientes. Tal es el caso de José Arcadio Buendía y Úrsula Iguarán, quienes son primos y viven con el temor de engendrar un hijo con cola de cerdo.\r\n\r\nEste hecho parece no ser más que una metáfora, pero a lo largo de la novela recorremos un total de 7 generaciones hasta ver que ese miedo se vuelve realidad, producto un ciclo de errores e historias que no dejan de repetirse entre los descendientes del primer José Arcadio y Úrsula, quienes están condenados a trágicos finales.', 1967, 2),
(4, 'Crónica de una muerta anunciada', 'Crónica: suspenso y misterio.', 'En un pequeño y aislado pueblo en la costa del Caribe, se casan Bayardo San Román, un rico recién llegado, y Ángela Vicario. Se van a su nueva casa, y allí Bayardo descubre que su esposa no es virgen. Bayardo devuelve a Ángela a la casa de sus padres, donde es golpeada por su madre e interrogada por sus hermanos, Ángela culpará a Santiago Nasar.\r\n\r\nLos hermanos Vicario –Pedro y Pablo–, obligados por la defensa del honor familiar, anuncian a la mayoría del pueblo que matarían a Nasar. Este no se entera, sino minutos antes de morir. Los hermanos matan a cuchillazos a Santiago, después de pensarlo en varias ocasiones, en la puerta de su casa, a la vista de la gente que no hizo o no pudo hacer nada para evitarlo. Pasados 27 años, el amigo de Santiago (el narrador) reconstruye los hechos, de los que fue testigo, en forma de crónica, combinando narración y testimonios.\r\n\r\nAños después, Ángela estaría escribiendo cada día a Bayardo, primero en tono formal, después con cartas de joven enamorada y, al final, fingiendo enfermedades. Así, Bayardo vuelve 17 años después, muy desmejorado y con las cartas sin abrir.', 1981, 2),
(5, 'Rayuela', 'Novela: antinovela', 'Narra la historia de Horacio Oliveira, su protagonista, y su relación con «la Maga». La historia pone en juego la subjetividad del lector y tiene múltiples finales. A esta obra suele llamársela «antinovela», aunque el mismo Cortázar prefería denominarla «contranovela». Significó un salto al vacío que lo distanció de la seguridad controlada de los cuentos fantásticos de su primera época como escritor para adentrarse en una búsqueda sin hallazgos a través de preguntas sin respuesta.', 1963, 3),
(6, 'El secreto', 'Autoayuda', 'El Gran Secreto siempre ha estado presente de forma fragmentada en las tradiciones orales, en la literatura, en las religiones y en las distintas filosofías de todos los tiempos. Por primera vez, todos esos componentes se ha reunido en una increíble revelación que transformará la vida de todo aquel que la experimente.\r\n\r\nEn este libro aprenderás a utilizar El Secreto en todos los aspectos de tu vida: dinero, salud, relaciones, felicidad y en todas tus interacciones con el mundo. Empezarás a entender el poder oculto y sin explotar que hay en tu interior. Esta revelación te aportará felicidad en todas las áreas de tu vida.\r\n\r\nEl Secreto encierra la sabiduría de los grandes maestros actuales, hombres y mujeres que lo han utilizado para conseguir salud, fortuna y felicidad. Han aplicado el conocimiento de El Secreto y nos revelan increíbles historias de curaciones, de generación de grandes riquezas, de superación de obstáculos y de conseguir lo que muchos calificarían de imposible.', 2007, 4),
(7, 'La magia', 'Autoayuda', '¿Recuerdas cuando eras pequeño y creías que la vida era mágica? Pues bien, la magia de la vida es real, y es mucho más impresionante, imponente y apasionante de lo que jamás imaginaste de niño. Puedes vivir tus sueños, puedes tener todo lo que deseas, ¡y tu vida puede tocar el cielo! Te invito a que me acompañes en un inolvidable viaje de 28 días, mientras descubrimos lo deslumbrantes que realmente pueden ser nuestras vidas.', 2012, 4),
(8, 'Los cuatro acuerdos', 'Autoayuda', 'Una guía práctica para la libertad personal\r\n\r\nEl conocimiento tolteca surge de la misma unidad esencial de la verdad de la que parten todas las tradiciones esotéricas sagradas del mundo. Aunque no es una religión, respeta a todos los maestros espirituales que han enseñado en la tierra, y si bien abraza el espíritu, resulta más preciso describirlo como una manera de vivir que se distingue por su fácil acceso a la felicidad y el amor.\r\n\r\nEl doctor Miguel Ruiz nos propone en este libro un sencillo procedimiento para eliminar todas aquellas creencias heredadas que nos limitan y substituirlas por otras que responden a nuestra realidad interior y nos conducen a la libertad.\r\n\r\nHace miles de años los toltecas eran conocidos en todo el sur de México como «mujeres y hombres de conocimiento». Los antropólogos han definido a los toltecas como una nación o una raza, pero de hecho, eran científicos y artistas que formaron una sociedad para estudiar y conservar el conocimiento espiritual y las prácticas de sus antepasados.\r\n\r\nLa conquista europea, unida a un agresivo abuso del poder personal por parte de algunos aprendices, hizo que los naguales se vieran forzados a esconder su sabiduría ancestral y a mantener su existencia en la oscuridad. Por fortuna, el conocimiento esotérico tolteca fue conservado y transmitido de una generación a otra por distintos linajes de naguales. Ahora, el doctor Miguel Ruiz, un nagual del linaje de los Guerreros del Águila, comparte con nosotros las profundas enseñanzas de los toltecas.\r\n\r\n\"No hay razón para sufrir. La única razón por la que sufres es porque tú así lo eliges. Si observas tu vida encontrarás muchas excusas para sufrir, pero ninguna razón válida. Lo mismo es aplicable a la felicidad. La única razón por la que eres feliz es por que tú decides ser feliz. La felicidad es una elección, como también lo es el sufrimiento.\"', 1998, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
