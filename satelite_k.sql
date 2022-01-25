-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2022 a las 11:06:07
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `satelite_k`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistes`
--

CREATE TABLE `artistes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `biografia_cat` text NOT NULL,
  `biografia_esp` text NOT NULL,
  `link_web` text DEFAULT NULL,
  `generes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titol_cat` varchar(255) NOT NULL,
  `titol_esp` varchar(255) NOT NULL,
  `descripcio_cat` text NOT NULL,
  `descripcio_esp` text NOT NULL,
  `artistes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discs`
--

CREATE TABLE `discs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `data_publicacio` date NOT NULL,
  `embed_spotify` text DEFAULT NULL,
  `descripcio_cat` text NOT NULL,
  `descripcio_esp` text NOT NULL,
  `link_spotify` text DEFAULT NULL,
  `link_apple_music` text DEFAULT NULL,
  `link_venda_fisica` text DEFAULT NULL,
  `generes_id` int(11) NOT NULL,
  `artistes_id` int(11) NOT NULL,
  `tipus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generes`
--

CREATE TABLE `generes` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL,
  `nom_esp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llibres`
--

CREATE TABLE `llibres` (
  `id` int(11) NOT NULL,
  `titol` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `ilustrador` varchar(255) NOT NULL,
  `descripcio_cat` text NOT NULL,
  `descripcio_esp` text NOT NULL,
  `foto` text NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `data_publicacio` date NOT NULL,
  `link_compra_fisica` text DEFAULT NULL,
  `artistes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus`
--

CREATE TABLE `tipus` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL,
  `nom_esp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistes`
--
ALTER TABLE `artistes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_artiste_genere_idx` (`generes_id`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_blog_artiste1_idx` (`artistes_id`);

--
-- Indices de la tabla `discs`
--
ALTER TABLE `discs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_disc_genere1_idx` (`generes_id`),
  ADD KEY `fk_disc_artiste1_idx` (`artistes_id`),
  ADD KEY `fk_disc_tipus1_idx` (`tipus_id`);

--
-- Indices de la tabla `generes`
--
ALTER TABLE `generes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `llibres`
--
ALTER TABLE `llibres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_llibre_artiste1_idx` (`artistes_id`);

--
-- Indices de la tabla `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistes`
--
ALTER TABLE `artistes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discs`
--
ALTER TABLE `discs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generes`
--
ALTER TABLE `generes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llibres`
--
ALTER TABLE `llibres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artistes`
--
ALTER TABLE `artistes`
  ADD CONSTRAINT `fk_artiste_genere` FOREIGN KEY (`generes_id`) REFERENCES `generes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `fk_blog_artiste1` FOREIGN KEY (`artistes_id`) REFERENCES `artistes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discs`
--
ALTER TABLE `discs`
  ADD CONSTRAINT `fk_disc_artiste1` FOREIGN KEY (`artistes_id`) REFERENCES `artistes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disc_genere1` FOREIGN KEY (`generes_id`) REFERENCES `generes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disc_tipus1` FOREIGN KEY (`tipus_id`) REFERENCES `tipus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `llibres`
--
ALTER TABLE `llibres`
  ADD CONSTRAINT `fk_llibre_artiste1` FOREIGN KEY (`artistes_id`) REFERENCES `artistes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
