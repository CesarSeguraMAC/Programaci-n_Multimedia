-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 01:15:38
-- Versión del servidor: 11.5.2-MariaDB-log
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monaca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nombre` varchar(200) NOT NULL,
  `consi` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `fragi` varchar(100) NOT NULL,
  `category` varchar(300) NOT NULL,
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombre`, `consi`, `fecha`, `fragi`, `category`, `id`, `producto_id`) VALUES
('Tela Reciclada Verde - Estilo OrgÃ¡nico', 'Tela reciclada en tonos verdes para un estilo natural y orgÃ¡nico. Perfecta para tapicerÃ­a, ropa y accesorios eco-friendly.', '2024-12-12', '0', 'Tela', 39, 52),
('Tela Reciclada Gris - Acabado Moderno', 'TTela de color gris hecha de materiales reciclados, ideal para proyectos modernos y minimalistas. DiseÃ±ada para moda sostenible y decoraciÃ³n.\r\nCaracterÃ­sticas:\r\n', '2024-12-03', 'Media', 'Tela', 39, 53),
('DescripciÃ³n del Producto: PlÃ¡stico PET (Polietileno Tereftalato)\r\nCaracterÃ­sticas:', '\r\nEl plÃ¡stico PET (Polietileno Tereftalato) es un material resistente, ligero y de alta transparencia, utilizado ampliamente en la industria de envases y embalajes. Su estructura quÃ­mica le brinda una excelente barrera contra gases y humedad, y es completamente reciclable.', '2024-12-03', 'Media', 'Plastico', 39, 54),
('PlÃ¡stico PS (Poliestireno)', 'El plÃ¡stico PS (Poliestireno) es un material ligero, econÃ³mico y versÃ¡til, ampliamente utilizado en aplicaciones de embalaje y productos desechables. Su estructura le proporciona rigidez y facilidad para el moldeado en diversas formas y tamaÃ±os.', '2024-12-03', 'Media', 'Plastico', 39, 55),
('PlÃ¡stico HDPE (Polietileno de Alta Densidad)', 'El plÃ¡stico HDPE (Polietileno de Alta Densidad) es un material versÃ¡til y duradero, ideal para una amplia gama de aplicaciones. Su estructura de alta densidad le confiere una excelente resistencia a impactos, productos quÃ­micos y temperaturas extremas.', '2024-12-03', 'Media', 'Plastico', 39, 56),
('DescripciÃ³n del Producto: Papel Testliner', 'El papel Testliner es un material resistente y reciclado, fabricado principalmente con fibra recuperada y, en algunos casos, con un aporte de fibra virgen para mayor durabilidad. Su acabado encolado y su versatilidad lo convierten en una excelente opciÃ³n para el recubrimiento exterior de cartones corrugados, proporcionando protecciÃ³n y estÃ©tica en embalajes.', '2024-12-03', 'Media', 'Papel', 39, 57),
('CartÃ³n Bigris', 'El cartÃ³n Bigris es un material de alta resistencia, ideal para proteger productos y utilizar en mÃºltiples aplicaciones de embalaje. Su estructura rÃ­gida y duradera proporciona protecciÃ³n efectiva durante el transporte y almacenamiento, asegurando la integridad de los productos.', '2024-12-03', 'Media', 'Papel', 39, 58),
('Tela Reciclada Azul', 'Tela fabricada a partir de materiales reciclados con una textura suave y de alta calidad. Ideal para proyectos de moda sostenible, tapicerÃ­a y decoraciÃ³n. ', '2024-12-01', 'Media', 'Tela', 39, 59),
('Tela Reciclada Gris - Acabado Moderno', 'TTela de color gris hecha de materiales reciclados, ideal para proyectos modernos y minimalistas. DiseÃ±ada para moda sostenible y decoraciÃ³n.\r\nCaracterÃ­sticas:\r\n', '2024-12-03', 'Media', 'Tela', 39, 60),
('DescripciÃ³n del Producto: PlÃ¡stico PET (Polietileno Tereftalato)\r\nCaracterÃ­sticas:', '\r\nEl plÃ¡stico PET (Polietileno Tereftalato) es un material resistente, ligero y de alta transparencia, utilizado ampliamente en la industria de envases y embalajes. Su estructura quÃ­mica le brinda una excelente barrera contra gases y humedad, y es completamente reciclable.', '2024-12-03', 'Media', 'Plastico', 39, 61),
('PlÃ¡stico PS (Poliestireno)', 'El plÃ¡stico PS (Poliestireno) es un material ligero, econÃ³mico y versÃ¡til, ampliamente utilizado en aplicaciones de embalaje y productos desechables. Su estructura le proporciona rigidez y facilidad para el moldeado en diversas formas y tamaÃ±os.', '2024-12-03', 'Media', 'Plastico', 39, 62),
('PlÃ¡stico HDPE (Polietileno de Alta Densidad)', 'El plÃ¡stico HDPE (Polietileno de Alta Densidad) es un material versÃ¡til y duradero, ideal para una amplia gama de aplicaciones. Su estructura de alta densidad le confiere una excelente resistencia a impactos, productos quÃ­micos y temperaturas extremas.', '2024-12-03', 'Media', 'Plastico', 39, 63),
('DescripciÃ³n del Producto: Papel Testliner', 'El papel Testliner es un material resistente y reciclado, fabricado principalmente con fibra recuperada y, en algunos casos, con un aporte de fibra virgen para mayor durabilidad. Su acabado encolado y su versatilidad lo convierten en una excelente opciÃ³n para el recubrimiento exterior de cartones corrugados, proporcionando protecciÃ³n y estÃ©tica en embalajes.', '2024-12-03', 'Media', 'Papel', 39, 64),
('CartÃ³n Bigris', 'El cartÃ³n Bigris es un material de alta resistencia, ideal para proteger productos y utilizar en mÃºltiples aplicaciones de embalaje. Su estructura rÃ­gida y duradera proporciona protecciÃ³n efectiva durante el transporte y almacenamiento, asegurando la integridad de los productos.', '2024-12-03', 'Media', 'Papel', 39, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(19, 'juan.perez@example.com', '123'),
(20, 'maria.gomez@example.com', '123'),
(21, 'pedro.sanchez@example.com', '123'),
(22, 'luisa.martinez@example.com', '123'),
(23, 'carla.rodriguez@example.com', '123'),
(24, 'jorge.lopez@example.com', '123'),
(25, 'ana.garcia@example.com', '123'),
(26, 'lucas.morales@example.com', '123'),
(27, 'paula.ferrer@example.com', '123'),
(28, 'luis.palacios@example.com', '123'),
(29, 'elena.nunez@example.com', '123'),
(30, 'roberto.diaz@example.com', '123'),
(31, 'sofia.fernandez@example.com', '123'),
(32, 'marcos.jimenez@example.com', '123'),
(33, 'teresa.silva@example.com', '123'),
(34, 'josep.romero@example.com', '123'),
(35, 'rosa.garcia@example.com', '123'),
(36, 'pedro.moreno@example.com', '123'),
(37, 'vicky.martin@example.com', '123'),
(38, 'david.casas@example.com', '123'),
(39, 'irving@gmail.com', '$2y$10$QYbWXOpwIm4syCs.Tn82i.U4GbqB/zTeteM6XKRZ/8MNl/wpC044K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_producto_users` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
