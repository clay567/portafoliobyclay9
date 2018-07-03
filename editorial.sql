-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-07-2018 a las 03:34:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `editorial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--
-- Creación: 08-05-2017 a las 16:12:01
--

CREATE TABLE IF NOT EXISTS `autor` (
  `autorID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  PRIMARY KEY (`autorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`autorID`, `nombre`) VALUES
(6, 'Leon Tolstoi'),
(7, 'Fiodor Dostoyevski'),
(8, 'Anton Chejov'),
(9, 'Mijail Sholojov'),
(10, 'Vladimir Nabokov'),
(11, 'Nikolai Gogol'),
(12, 'Maximo Gorki'),
(13, 'Russel Ross'),
(14, 'Mark Twain'),
(15, 'Gabriel Garcia Marquez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--
-- Creación: 08-05-2017 a las 16:12:02
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciudadID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(30) NOT NULL,
  PRIMARY KEY (`ciudadID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciudadID`, `nombre`) VALUES
(1, 'Puno'),
(2, 'piura'),
(3, 'cajamarca'),
(4, 'Lima'),
(5, 'Arequipa'),
(6, 'Ayacucho'),
(7, 'Tarapoto'),
(10, 'Tacna'),
(11, 'Chachapoyas'),
(13, 'Puerto Maldonado'),
(14, 'Moquegua'),
(15, 'Chiclayo'),
(16, 'huaral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--
-- Creación: 08-05-2017 a las 16:12:02
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clienteID` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` char(40) NOT NULL,
  `direccion` char(80) NOT NULL,
  `ciudadID` int(11) NOT NULL,
  PRIMARY KEY (`clienteID`),
  KEY `ciudadID` (`ciudadID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- RELACIONES PARA LA TABLA `clientes`:
--   `ciudadID`
--       `ciudad` -> `ciudadID`
--

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clienteID`, `nombres`, `direccion`, `ciudadID`) VALUES
(1, 'house of cards', 'new york city', 4),
(2, 'ppkorrupto', 'san borja', 2),
(4, 'diego domingues espinoza', 'calle los portales -rimac', 15),
(6, 'Medina Fonseca Luz Mariella', 'cercado de lima', 4),
(10, 'Joyssi Kylene Huby Mori', 'Los Angeles California 69', 5),
(18, 'Merma Flores Rafael', 'san juan de lurigancho', 11),
(19, ' Brenda Sonia Briones Garcia', 'calle la revolucion -los olivos', 16),
(20, 'Heidy Luanna Castillo Mormontoy', 'calle los proceres de la independencia-pueblo libre', 6),
(22, 'Gaby Glenda Perez Esquivel', 'santiago de morochuco', 2),
(23, 'Gisella Lizeth Lazaro Flores', 'jr las comarcas', 14),
(24, ' leidi barahona de justin', 'los olivos', 11),
(25, 'raiza riquelme duran', 'san juan de miraflores', 4),
(27, 'Roger Waters', 'calle london avenue 123', 5),
(50, 'ricardo darin', 'av. argentina', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--
-- Creación: 08-05-2017 a las 16:12:02
--

CREATE TABLE IF NOT EXISTS `descripcion` (
  `libroID` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`libroID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `descripcion`:
--   `libroID`
--       `libros` -> `libroID`
--

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`libroID`, `descripcion`) VALUES
(6, 'Alekséi Fiódorovich Karamázov, también llamado Alioshka, Aliosha o Lióshechka. Es el más pequeño de los hermanos Karamázov, segundo hijo de Fiódor Pávlovich y Sofía Ivánovna. En el primer capítulo el narrador lo identifica como el héroe de la novela. Aliosha es un novicio en el monasterio local.'),
(7, 'Recoge las vivencias del personaje Alejandro Petróvich Goryánchikov en la cárcel siberiana por matar a su esposa en el primer año de su matrimonio. Cada capítulo de la obra describe las anécdotas, las distintas temáticas y conversaciones o experiencias que viven los presos, sus sentimientos acerca de la navidad, el verano, intentos de fugas y otros detalles de la sociedad, la administración y la cultura rusas. En este libro, que fue publicado por capítulos en una revista que fundó el autor junto con su hermano Mijaíl, se reflejan sus propias experiencias en la cárcel, la falta de libertad, el frío, la soledad, los duros trabajos forzados, el tipo de personas con las que convivió y que a pesar de ser criminales describe con una gran humanidad. En esta obra se hace una profunda reflexión sobre la psicología criminal. Transmite sus conocimientos de la Biblia, libro que el propio autor leía a diario en prisión y del que derivó su idea del uso del sufrimiento como liberación y salvación espiritual.'),
(8, 'hola'),
(9, 'Soy un hombre enfermo... Un hombre malo. No soy agradable. Creo que padezco del hígado. De todos modos, nada entiendo de mi enfermedad y no sé con certeza lo que me duele. No me cuido y jamás me he cuidado, aunque siento respeto por la medicina y los médicos. Además, soy extremadamente supersticioso, cuando menos lo bastante para respetar la medicina. (Tengo suficiente cultura para no ser supersticioso, pero lo soy.) Sí, no quiero curarme por rabia. Esto, seguramente, ustedes no lo pueden entender. Pero yo sí lo entiendo'),
(11, 'Charles Christopher Parker, Jr. (Kansas City, 29 de agosto de 1920 - Nueva York, 12 de marzo de 1955), conocido como Charlie Parker, fue un saxofonista y compositor estadounidense de jazz. Apodado Bird y Yardbird, es considerado uno de los mejores intérpretes de saxofón alto de la historia de ese género musical, siendo una de las figuras claves en su evolución y uno de sus artistas más legendarios y admirados. De igual forma según los críticos del jazz, es uno de los más importantes músicos de la historia junto a Louis Armstrong, Duke Ellington, John Coltrane y Miles Davis.'),
(12, 'En una Rusia fría y lejana una chica se enamora y se arriesga. No es fácil en una sociedad tan estructurada y el dolor se hace parte de su vida. No solo tiene que ver con el amor y las relaciones de pareja, sino con una realidad social diferente, que Tolstoi narra muy detenidamente.'),
(13, 'Otro de Tolstoi, pero no puedes negar que se merece su lugar en esta lista por ser una mezcla de novela con legado filosófico, que narra la historia de la invasión a Rusia. Un poco largo, es verdad, pero si tienes unas vacaciones y tiempo para leerlo te lo recomiendo.'),
(14, 'Huck es un chico que vive en la calle y luego pasa a vivir con una señora rica, aunque eso no le impida meterse en problemas cada vez que puede. Es sin dudas la obra más conocida de Mark Twain.'),
(15, 'se cuenta que una joven de un pueblo de la costa del Caribe colombiano se casó con un forastero rico y éste la devolvió a sus padres por no haber llegado virgen al matrimonio. Los dos hermanos gemelos de la rechazada, después de saber por boca de ésta quién fue el que la sedujo, salen armados de sendos cuchillos a buscar al culpable.Tratan de que todo el pueblo, incluido el cura y el alcalde, sepa lo que van a ha­cer, buscando que alguien impida la venganza y, ante la imposibilidad de eje­cu­tar al culpable, quede lavado el honor de la familia sin necesidad de matar al ofen­sor.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--
-- Creación: 08-05-2017 a las 16:12:02
--

CREATE TABLE IF NOT EXISTS `libros` (
  `libroID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(60) NOT NULL,
  `precio` float NOT NULL,
  `autorID` int(11) NOT NULL,
  PRIMARY KEY (`libroID`),
  KEY `autorID` (`autorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- RELACIONES PARA LA TABLA `libros`:
--   `autorID`
--       `autor` -> `autorID`
--

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libroID`, `titulo`, `precio`, `autorID`) VALUES
(6, 'Los Hermanos Karamazov', 60, 7),
(7, 'Recuerdos de la casa de los muertos', 100, 7),
(8, 'Humillados y Ofendidos', 120, 7),
(9, 'Memorias del Subsuelo', 200, 7),
(11, 'Bird:La Biografia de charlie parker', 91, 13),
(12, 'Anna Karenina', 50, 6),
(13, 'La Guerra y la Paz', 60, 6),
(14, 'Las Aventuras de Huckleberry Finn', 80, 14),
(15, 'cronica de una muerte anunciada', 50, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--
-- Creación: 08-05-2017 a las 16:12:03
--

CREATE TABLE IF NOT EXISTS `orden` (
  `ordenID` int(11) NOT NULL,
  `libroID` int(11) NOT NULL,
  `cantidad` tinyint(11) NOT NULL,
  `item` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`item`),
  KEY `libroID` (`libroID`),
  KEY `ordenID` (`ordenID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- RELACIONES PARA LA TABLA `orden`:
--   `libroID`
--       `libros` -> `libroID`
--   `ordenID`
--       `pedidos` -> `ordenID`
--

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`ordenID`, `libroID`, `cantidad`, `item`) VALUES
(9, 6, 1, 9),
(16, 7, 3, 19),
(7, 12, 2, 26),
(7, 13, 2, 27),
(32, 12, 2, 28),
(33, 15, 3, 29),
(33, 8, 1, 30),
(34, 13, 1, 31),
(34, 14, 1, 32),
(35, 6, 2, 33),
(36, 13, 2, 34),
(37, 15, 1, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--
-- Creación: 08-05-2017 a las 16:12:03
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `clienteID` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `ordenID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ordenID`),
  KEY `clienteID` (`clienteID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- RELACIONES PARA LA TABLA `pedidos`:
--   `clienteID`
--       `clientes` -> `clienteID`
--

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`clienteID`, `monto`, `fecha`, `ordenID`) VALUES
(4, 100, '2016-11-17', 4),
(6, 1300, '2017-06-28', 6),
(6, 300, '2017-06-28', 7),
(10, 60, '2017-09-28', 9),
(6, 1300, '0000-00-00', 16),
(10, 100, '2017-11-23', 32),
(6, 270, '2017-11-24', 33),
(19, 140, '2017-11-24', 34),
(4, 120, '2017-11-24', 35),
(2, 120, '2018-04-27', 36),
(24, 50, '2018-05-01', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 08-05-2017 a las 16:12:03
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `user` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userID`, `user`, `password`, `nivel`) VALUES
(1, 'admin', 'admin', 1),
(2, 'cal', 'cal', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ciudadID`) REFERENCES `ciudad` (`ciudadID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD CONSTRAINT `descripcion_ibfk_1` FOREIGN KEY (`libroID`) REFERENCES `libros` (`libroID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`autorID`) REFERENCES `autor` (`autorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`libroID`) REFERENCES `libros` (`libroID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`ordenID`) REFERENCES `pedidos` (`ordenID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`clienteID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
