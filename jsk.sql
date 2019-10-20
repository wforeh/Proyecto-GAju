-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2019 a las 18:20:13
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jsk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `fechacuota` date NOT NULL,
  `tipodia` varchar(500) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `valorproducto` double NOT NULL,
  `cuota` varchar(255) NOT NULL,
  `credito` double NOT NULL,
  `valorcuota` double NOT NULL,
  `abono` double NOT NULL,
  `estado` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `user_id`, `folder_id`, `vendedor_id`, `code`, `fechacuota`, `tipodia`, `producto`, `valorproducto`, `cuota`, `credito`, `valorcuota`, `abono`, `estado`, `description`, `created_at`) VALUES
(45, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-11', 'Viernes', 'ddd', 45000, 'Cuota 1/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:40'),
(46, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-12', 'Sabado', 'ddd', 45000, 'Cuota 2/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:40'),
(47, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-15', 'Martes', 'ddd', 45000, 'Cuota 3/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:40'),
(48, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-16', 'Miercoles', 'ddd', 45000, 'Cuota 4/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:40'),
(49, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-17', 'Jueves', 'ddd', 45000, 'Cuota 5/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:41'),
(50, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-18', 'Viernes', 'ddd', 45000, 'Cuota 6/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:41'),
(51, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-19', 'Sabado', 'ddd', 45000, 'Cuota 7/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:41'),
(52, 10, 1, 1, 'HpnbiZsG5Yik', '2019-10-19', 'Sabado', 'ddd', 45000, 'Cuota 7/7', 40000, 5714.2857142857, 0, 'Por Pagar', '', '2019-10-12 13:59:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `cumple` date NOT NULL,
  `diralmacen` varchar(255) NOT NULL,
  `horarioentrada` time NOT NULL,
  `horariosalida` time NOT NULL,
  `dircasa` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `download` int(11) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_folder` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `code`, `filename`, `telefono`, `idvendedor`, `cumple`, `diralmacen`, `horarioentrada`, `horariosalida`, `dircasa`, `description`, `download`, `is_public`, `is_folder`, `user_id`, `folder_id`, `created_at`) VALUES
(9, 'w0HhiJYwMyTU', 'claboral.pdf', '', 2, '0000-00-00', '', '00:00:00', '00:00:00', '', 'fghj', 0, 0, 0, 1, 10, '2019-10-10 08:28:08'),
(10, 'Cnuiq85Rolyd', 'juan camilo ate', '2785', 1, '2019-05-07', 'dg ca', '08:00:00', '18:00:00', 'calle ', 'prueba', 0, 0, 1, 1, NULL, '2019-10-10 11:57:53'),
(29, 'trYo14TR9TDW', 'Helena Atencia', '2785157', 1, '2019-07-24', 'Dg 182 20 71 ', '08:00:00', '18:00:00', 'Calle 6i 28A 36', 'TESTE', 0, 0, 1, 1, NULL, '2019-10-13 07:19:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permision`
--

CREATE TABLE `permision` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permision`
--

INSERT INTO `permision` (`id`, `p_id`, `user_id`, `file_id`, `created_at`) VALUES
(2, 1, 2, 2, '2019-10-09 11:28:43'),
(3, 1, 2, 3, '2019-10-09 11:31:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `perfil`, `fullname`, `email`, `password`, `image`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 1, 'Juan camilo Atencia Amin', 'jcamilo.atencia@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'carro.JPG', 1, 1, '2019-10-09 10:06:38'),
(2, 2, 'Abelardo Camargo', 'admendoza@indracompany.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-09 11:16:53'),
(5, 0, 'sds', 'jcamilo.atenciass@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-13 06:22:21'),
(6, 2, 'florac lga', 'jsk@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-13 07:16:45'),
(7, 1, 'andrea diasz', 'andrea@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-13 08:23:04'),
(8, 2, 'orlando', '278@585.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-13 08:27:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendedor_id` (`id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `permision`
--
ALTER TABLE `permision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `permision`
--
ALTER TABLE `permision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
