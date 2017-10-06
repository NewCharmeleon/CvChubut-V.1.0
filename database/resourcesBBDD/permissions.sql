-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-06-2017 a las 21:07:31
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.2
-- Versión de PHP: 7.1.5-1+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CvChubutBBDD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-create', 'Crear Rol.', 'Permiso para Crear Roles.', NULL, NULL),
(2, 'role-read', 'Mostrar listado de Roles', 'Permiso para Lectura de Roles.', NULL, NULL),
(3, 'role-edit', 'Editar un Rol.', 'Permiso para Editar Roles.', NULL, NULL),
(4, 'role-delete', 'Eliminar Rol.', 'Permiso para Eliminar Roles.', NULL, NULL),
(5, 'actividad-create', 'Crear Actividad.', 'Permiso para Crear Actividades.', NULL, NULL),
(6, 'actividad-read', 'Mostrar lista de Actividades.', 'Permiso para Ver Actividades.', NULL, NULL),
(7, 'actividad-edit', 'Editar Actividad.', 'Permiso para Editar Actividades.', NULL, NULL),
(8, 'actividad-delete', 'Eliminar Actividad.', 'Permiso para Eliminar Actividades.', NULL, NULL),
(9, 'user-create', 'Crear Usuario.', 'Permiso para Crear Usuarios.', NULL, NULL),
(10, 'user-read', 'Mostrar lista de Usuarios.', 'Permiso para Ver Usuarios.', NULL, NULL),
(11, 'user-edit', 'Editar Usuario.', 'Permiso para Editar Usuarios.', NULL, NULL),
(12, 'user-delete', 'Eliminar Usuario.', 'Permiso para Eliminar Usuarios.', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
