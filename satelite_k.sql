-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2022 a las 21:24:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Volcado de datos para la tabla `artistes`
--

INSERT INTO `artistes` (`id`, `nom`, `foto`, `biografia_cat`, `biografia_esp`, `link_web`, `generes_id`) VALUES
(7, 'Prova', 'backend/artistes/6ox1IdVEAcShrZ0a87l1yWejMyyIbnLQHatNz5MW.png', '<div>Prova</div>', '<div>Prova</div>', NULL, 1),
(8, 'Prova 2', 'backend/artistes/tu1MLUWP1mWDZwsa0dEU2yqN04wvo2ROUpXX656N.png', '<div>Prova 2</div>', '<div>Prova 2</div>', 'dasda', 1);

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
  `artistes_id` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discs`
--

CREATE TABLE `discs` (
  `id` int(11) NOT NULL,
  `titol` varchar(255) NOT NULL,
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

--
-- Volcado de datos para la tabla `discs`
--

INSERT INTO `discs` (`id`, `titol`, `foto`, `data_publicacio`, `embed_spotify`, `descripcio_cat`, `descripcio_esp`, `link_spotify`, `link_apple_music`, `link_venda_fisica`, `generes_id`, `artistes_id`, `tipus_id`) VALUES
(2, 'Prova', 'backend/discs/5d6s4sz9MgkAHFqunsyzkz1MrmeaqSPt5d1cvKZH.png', '2022-02-09', NULL, '<div>dasdas</div>', '<div>dasda</div>', NULL, NULL, NULL, 1, 7, 1),
(3, 'ddsad', 'backend/discs/ouMvEM9XlkLf0dk2dDVb0r0jzKLcdq9cr1xCVg97.png', '2022-02-23', NULL, '<div>sdsa</div>', '<div>dasdas</div>', NULL, NULL, NULL, 1, 7, 1),
(4, 'dsada', 'backend/discs/aVZAV0NDFQVBBlwO4dxl6DOMYPy4yoZjCgPLZKAR.jpg', '2022-02-09', NULL, '<div>dasdasd</div>', '<div>sdasda</div>', NULL, NULL, NULL, 1, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generes`
--

CREATE TABLE `generes` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL,
  `nom_esp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generes`
--

INSERT INTO `generes` (`id`, `nom_cat`, `nom_esp`) VALUES
(1, 'pop', 'pop'),
(2, 'metal', 'metal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llibres`
--

CREATE TABLE `llibres` (
  `id` int(11) NOT NULL,
  `titol_cat` varchar(255) NOT NULL,
  `titol_esp` varchar(255) NOT NULL,
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

--
-- Volcado de datos para la tabla `llibres`
--

INSERT INTO `llibres` (`id`, `titol_cat`, `titol_esp`, `autor`, `ilustrador`, `descripcio_cat`, `descripcio_esp`, `foto`, `editorial`, `data_publicacio`, `link_compra_fisica`, `artistes_id`) VALUES
(1, 'Prova', 'Prova', 'Prova', 'Prova', '<div>Prova</div>', '<div>Prova</div>', 'backend/llibres/RTEB2xwX6ZhN3jSQ1y5cCB24TwrcdRiiDJt6BbtN.png', 'Prova', '2022-02-12', NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Volcado de datos para la tabla `tipus`
--

INSERT INTO `tipus` (`id`, `nom_cat`, `nom_esp`) VALUES
(1, 'Single', 'Single'),
(2, 'EP', 'EP'),
(3, 'Àlbum', 'Álbum'),
(4, 'Pack', 'Pack');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sergi', 'sergi@sergi.com', NULL, '$2y$10$xGTaqiOIuFGwPsNZM.x31.6SQHILcE06qsYlWnsyqMAuy90Q/SMiq', NULL, '2022-01-25 18:45:05', '2022-01-25 18:45:05');

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
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistes`
--
ALTER TABLE `artistes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `discs`
--
ALTER TABLE `discs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generes`
--
ALTER TABLE `generes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `llibres`
--
ALTER TABLE `llibres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
