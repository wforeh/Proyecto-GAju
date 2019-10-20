-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-10-2019 a las 02:43:27
-- Versión del servidor: 10.2.23-MariaDB
-- Versión de PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u518946798_gaju`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `diralmacen` varchar(11) NOT NULL,
  `horarioentrada` time NOT NULL,
  `horariosalida` time NOT NULL,
  `dircasa` varchar(11) NOT NULL,
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

INSERT INTO `file` (`id`, `code`, `filename`, `telefono`, `diralmacen`, `horarioentrada`, `horariosalida`, `dircasa`, `description`, `download`, `is_public`, `is_folder`, `user_id`, `folder_id`, `created_at`) VALUES
(1, 'qC8n6Zim0t7k', 'proceso 1 prueba', '', '', '00:00:00', '00:00:00', '', 'liquidación empresa textiles', 0, 0, 1, 1, NULL, '2019-10-09 17:10:06'),
(2, 'aFDPKgvd0mfY', 'dreamy-beach-wallpaper.1440.jpg', '', '', '00:00:00', '00:00:00', '', 'test', 1, 0, 0, 1, 1, '2019-10-09 17:32:02'),
(3, 'SFNjY3ZJ61_o', '57C599B23E875A02E1000000AC16CD04.pdf', '', '', '00:00:00', '00:00:00', '', 'kkks kkks', 0, 0, 0, 1, 1, '2019-10-09 17:42:25'),
(4, 'rBptPB39x4HV', 'Abc', '', '', '00:00:00', '00:00:00', '', 'Abc', 0, 0, 1, 2, NULL, '2019-10-09 23:54:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `file` (`id`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
