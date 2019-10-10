-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2019 a las 04:49:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemons-caporusso-isaias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `numero` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `numero`, `nombre`, `tipo`, `imagen`) VALUES
(43, 2, 'Ivysaur', 2, '/public/img/uploaded/ivysaur.png'),
(46, 6, 'Charizard', 1, '/public/img/uploaded/charizard.png'),
(48, 3, 'Venusaur', 2, '/public/img/uploaded/venusaur.png'),
(49, 4, 'Charmander', 1, '/public/img/uploaded/charmander.png'),
(50, 5, 'Charmeleon', 1, '/public/img/uploaded/charmeleon.png'),
(51, 7, 'Squirtle', 3, '/public/img/uploaded/squirtle.png'),
(52, 8, 'Wartortle', 3, '/public/img/uploaded/wartortle.png'),
(53, 9, 'Blastoise', 3, '/public/img/uploaded/blastoise.png'),
(60, 25, 'Pikachu', 7, '/public/img/uploaded/pikachu.png'),
(61, 131, 'Lapras', 4, '/public/img/uploaded/lapras.png'),
(62, 150, 'Mewtwo', 8, '/public/img/uploaded/mewtwo.png'),
(63, 93, 'Haunter', 9, '/public/img/uploaded/haunter.png'),
(64, 59, 'Arcanine', 1, '/public/img/uploaded/arcanine.png'),
(67, 133, 'Eevee', 10, '/public/img/uploaded/eevee.png'),
(69, 143, 'Snorlax', 10, '/public/img/uploaded/snorlax.png'),
(70, 1, 'Bulbasaur', 2, '/public/img/uploaded/bulbasaur.png'),
(71, 0, 'Lacqua', 11, '/public/img/uploaded/4f5a20ae-e758-4c64-944b-4d744293c3b6.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`) VALUES
(1, 'Fuego'),
(2, 'Planta'),
(3, 'Agua'),
(4, 'Hielo'),
(5, 'Tierra'),
(6, 'Roca'),
(7, 'ElÃ©ctrico'),
(8, 'PsÃ­quico'),
(9, 'Fantasma'),
(10, 'Normal'),
(11, 'Lacqua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`) VALUES
(6, 'root', '*81F5E21E35407D884A6CD4A731AEBFB6AF209E1B');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pokemon_ibfk_1` (`tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
