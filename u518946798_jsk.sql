-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-10-2019 a las 15:12:13
-- Versión del servidor: 10.2.27-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u518946798_jsk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
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

INSERT INTO `cuotas` (`id`, `user_id`, `folder_id`, `code`, `fechacuota`, `tipodia`, `producto`, `valorproducto`, `cuota`, `credito`, `valorcuota`, `abono`, `estado`, `description`, `created_at`) VALUES
(74, 33, 1, 'E7AJP8YpGL28', '2019-10-15', 'Martes', 'Ventilador', 155000, 'Cuota 1/5', 150000, 30000, 0, 'Por Pagar', 'Observacion general del ayuda para el vendedor o quien sea que sea', '2019-10-14 20:41:01'),
(75, 33, 1, 'E7AJP8YpGL28', '2019-10-30', 'Miercoles', 'Ventilador', 155000, 'Cuota 2/5', 150000, 30000, 0, 'Por Pagar', 'Observacion general del ayuda para el vendedor o quien sea que sea', '2019-10-14 20:41:06'),
(76, 33, 1, 'E7AJP8YpGL28', '2019-11-14', 'Jueves', 'Ventilador', 155000, 'Cuota 3/5', 150000, 30000, 0, 'Por Pagar', 'Observacion general del ayuda para el vendedor o quien sea que sea', '2019-10-14 20:41:11'),
(77, 33, 1, 'E7AJP8YpGL28', '2019-11-29', 'Viernes', 'Ventilador', 155000, 'Cuota 4/5', 150000, 30000, 0, 'Por Pagar', 'Observacion general del ayuda para el vendedor o quien sea que sea', '2019-10-14 20:41:17'),
(78, 33, 1, 'E7AJP8YpGL28', '2019-12-14', 'Sabado', 'Ventilador', 155000, 'Cuota 5/5', 150000, 30000, 0, 'Por Pagar', 'Observacion general del ayuda para el vendedor o quien sea que sea', '2019-10-14 20:41:21'),
(79, 34, 1, 'ERNdPNwcOH1b', '2019-10-15', 'Martes', 'Reloj yess', 135000, 'Cuota 1/1', 130000, 130000, 0, 'Por Pagar', '', '2019-10-14 22:35:28'),
(80, 34, 1, 'ERNdPNwcOH1b', '2019-10-15', 'Martes', 'Reloj yess', 135000, 'Cuota 1/1', 130000, 130000, 0, 'Por Pagar', '', '2019-10-14 22:35:28');

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
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `is_folder` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `code`, `filename`, `telefono`, `idvendedor`, `cumple`, `diralmacen`, `horarioentrada`, `horariosalida`, `dircasa`, `description`, `download`, `is_public`, `is_folder`, `user_id`, `folder_id`, `created_at`) VALUES
(10, 'Cnuiq85Rolyd', 'juan camilo atencia', '3004620593', 1, '2019-05-08', 'direccion', '13:00:00', '18:26:00', 'calle sd ddd', 'pruebasd', 0, 0, 1, 1, NULL, '2019-10-14 11:57:53'),
(33, 'xjnf_GfPTEWW', 'Helena', '3162700440', 9, '2019-10-14', 'Diagonal 181', '08:00:00', '18:00:00', 'añjd', 'asasd', 0, 0, 1, 1, NULL, '2019-10-14 19:35:07'),
(34, '4HzY7Sn4qKi0', 'test', '425', 1, '2019-12-31', 'xfg', '08:00:00', '18:00:00', 'sdf', 'dff', 0, 0, 1, 1, NULL, '2019-10-14 20:05:03');

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
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `perfil`, `fullname`, `email`, `password`, `image`, `is_active`, `is_admin`, `created_at`) VALUES
(1, 1, 'Juan camilo Atencia Amin', 'jcamilo.atencia@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'carro.JPG', 1, 1, '2019-10-09 10:06:38'),
(9, 1, 'Jessica Andrea ', 'jessicalaguado112@gmail.com', '03abd79d0eb38c0fe36ba1effa21d0a15847333c', 'default.png', 1, 0, '2019-10-14 18:11:47');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `permision`
--
ALTER TABLE `permision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
