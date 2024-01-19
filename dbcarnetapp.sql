-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2024 a las 03:58:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcarnetapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_filedata` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_institution` varchar(255) NOT NULL,
  `correo_institution` varchar(255) NOT NULL,
  `dni_institution` varchar(255) DEFAULT NULL,
  `state_institution` varchar(255) NOT NULL,
  `img_logo` varchar(255) DEFAULT NULL,
  `web_institution` varchar(255) NOT NULL,
  `bgk_institution_m` varchar(255) DEFAULT NULL,
  `bgk_institution_f` varchar(255) DEFAULT NULL,
  `representative_inst` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `nombre_institution`, `correo_institution`, `dni_institution`, `state_institution`, `img_logo`, `web_institution`, `bgk_institution_m`, `bgk_institution_f`, `representative_inst`, `created_at`, `updated_at`) VALUES
(1, 'Alcaldía ciudadana de San Lorenzo', 'gad@municipiosanlorenzo.gob.ec', '08600006700001', 'particulares', 'institute/polk.vernaza12@gmail.com/1703199175_ESCUDO SL-02.png', 'www.municipiosanlorenzo.gob.ec', 'institute/polk.vernaza12@gmail.com/1702765777_fondocarnet8logo.jpg', 'institute/polk.vernaza12@gmail.com/1702765777_fondocarnet9logo.jpg', 'Dr. Gustavo Samaniego', '2023-12-16 21:00:22', '2023-12-30 01:33:42'),
(2, 'Unidad Educativa Fiscomisional, SL', 'tecnicosanlorenzo3@gmail.com', '00000000000', 'Fiscomisionales', 'institute/polk.vernaza12@gmail.com/1702909312_LOGONEW2.png', 'www.unidadsanlorenzo.com', 'institute/polk.vernaza12@gmail.com/1702909312_FONDO_MAS_1.PNG', 'institute/polk.vernaza12@gmail.com/1702909312_FONDO_FEM_1.PNG', 'Pablo Quintero', '2023-12-18 19:21:53', '2024-01-13 19:14:09'),
(3, 'Carnetapp.in', 'orsicen@gmail.com', '000000000000000', 'particulares', 'institute/polk.vernaza12@gmail.com/1705155633_LO6.png', 'www.rpgad.elpeloteotv.com', 'institute/polk.vernaza12@gmail.com/1705155633_f12.png', 'institute/polk.vernaza12@gmail.com/1705155633_fo122.png', 'Polk Brando Vernaza Quiñonez', '2024-01-13 19:20:33', '2024-01-13 19:22:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filedatas`
--

CREATE TABLE `filedatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `detalles` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(42, '2019_08_19_000000_create_failed_jobs_table', 1),
(43, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(44, '2023_06_10_224805_create_usuarios_table', 1),
(45, '2023_09_07_132445_create_filedatas_table', 1),
(46, '2023_09_07_132637_create_events_table', 1),
(47, '2023_09_07_160430_create_rutas_table', 1),
(48, '2023_11_16_164725_crete_shares_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(10) UNSIGNED NOT NULL,
  `rutas` text NOT NULL,
  `id_filedata` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shares`
--

CREATE TABLE `shares` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_filedata` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `imgprofile` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `code_verifi` varchar(255) DEFAULT NULL,
  `st_verifi` varchar(255) DEFAULT NULL,
  `blotype` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `rol` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `typecrd` varchar(255) DEFAULT NULL,
  `id_failed_jobs` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_apellido`, `correo`, `clave`, `dni`, `state`, `imgprofile`, `usuario`, `code_verifi`, `st_verifi`, `blotype`, `level`, `course`, `occupation`, `department`, `rol`, `genero`, `typecrd`, `id_failed_jobs`, `created_at`, `updated_at`) VALUES
(873968294, 'POLK BRANDO VERNAZA QUIÑONEZ', 'polk.vernaza12@gmail.com', '$2y$10$dUieOmSyoU9tM4tWDb4FI.4WaHIAFNTb3aLDBGMtdN08z2NdbZvDm', '0850301110', 'PRIVATE', 'uploads/polk.vernaza12@gmail.com/1702779794_pho.jpeg', 'Polk', '2995449183924', '2', 'A+', NULL, NULL, 'Desarrollador 1', 'Tics', '2', 'MASCULINO', 'ADMINISTRATIVO', 3, '2023-12-16 20:58:40', '2024-01-13 19:22:39'),
(873968300, 'Dr.Gustavo  Samaniego Ochoa', 'gad@municipiosanlorenzo.gob.ec', '$2y$10$dACX6CYH5PHTgA3jb0Ucf.olwmN1kfpxyBDl/byVhkz.j8MIJDuby', '0801629312', 'PUBLIC', 'uploads/gad@municipiosanlorenzo.gob.ec/1703199630_WhatsApp Image 2023-12-21 at 5.33.31 PM.jpeg', 'Dr.Gustavo', '910065545', '2', NULL, NULL, NULL, 'Alcalde', 'Alcaldía', '0', 'MASCULINO', 'ADMINISTRATIVO', 1, '2023-12-22 03:58:51', '2023-12-22 19:24:58'),
(873968302, 'GREY TAMARA ARROYO CHEME', 'gtaache.9618@gmail.com', '$2y$10$2KHnJWQdQ58Ylwz6AIEsqemHu3yywjGx9faCODHOKAu8h9wOtS.Ka', NULL, 'PRIVATE', 'uploads/gtaache.9618@gmail.com/1704039242_IMG_20231231_111344.jpg', 'TAMARA', '-743175488', '2', NULL, NULL, NULL, NULL, 'Comprás Publicas', '0', 'FEMENINO', 'EMPLEADO', 1, '2023-12-31 21:11:58', '2023-12-31 21:14:02'),
(873968306, 'Juan XXXX', 'jose@xxxxxxx', '$2y$10$GawS95toJ/XKZmBLa2jv6.94ZfEfULFrUuxTRTWG9ngiLGeY/RQ96', '0XXXXXXXX', 'PRIVATE', 'uploads/jose@gmail.com/1705328631_3135768.png', 'Juan', '6804584321603', '0', NULL, '10mo', 'A', NULL, NULL, '0', 'MASCULINO', 'ADMINISTRATIVO', 3, '2024-01-15 19:23:51', '2024-01-15 19:34:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id_filedata_foreign` (`id_filedata`),
  ADD KEY `events_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_correo_institution_unique` (`correo_institution`),
  ADD UNIQUE KEY `failed_jobs_dni_institution_unique` (`dni_institution`);

--
-- Indices de la tabla `filedatas`
--
ALTER TABLE `filedatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filedatas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutas_id_filedata_foreign` (`id_filedata`),
  ADD KEY `rutas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_id_filedata_foreign` (`id_filedata`),
  ADD KEY `shares_id_customer_foreign` (`id_customer`),
  ADD KEY `shares_id_supplier_foreign` (`id_supplier`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_correo_unique` (`correo`),
  ADD UNIQUE KEY `usuarios_dni_unique` (`dni`),
  ADD KEY `usuarios_id_failed_jobs_foreign` (`id_failed_jobs`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `filedatas`
--
ALTER TABLE `filedatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=873968307;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_id_filedata_foreign` FOREIGN KEY (`id_filedata`) REFERENCES `filedatas` (`id`),
  ADD CONSTRAINT `events_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `filedatas`
--
ALTER TABLE `filedatas`
  ADD CONSTRAINT `filedatas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_id_filedata_foreign` FOREIGN KEY (`id_filedata`) REFERENCES `filedatas` (`id`),
  ADD CONSTRAINT `rutas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `shares_id_filedata_foreign` FOREIGN KEY (`id_filedata`) REFERENCES `filedatas` (`id`),
  ADD CONSTRAINT `shares_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_id_failed_jobs_foreign` FOREIGN KEY (`id_failed_jobs`) REFERENCES `failed_jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
