-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 06:04:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `idcondicion` int(10) UNSIGNED NOT NULL,
  `R_laboratorio_id` int(11) NOT NULL,
  `Condicion` varchar(50) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `Fecha_inicio` varchar(30) DEFAULT NULL,
  `Observaciones` varchar(100) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`idcondicion`, `R_laboratorio_id`, `Condicion`, `Tipo`, `Fecha_inicio`, `Observaciones`, `usuario_id`) VALUES
(1, 1, 'super', 'hueso', '2022-03-25', 'niguna', 1),
(5, 1, 'mal', 'sangre', '2022-03-25', 'hacer examen', 2),
(7, 1, 'mal o bueno', 'sangre', '2022-03-25', 'hacer examen', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

CREATE TABLE `controles` (
  `idcontroles` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `Nombre_profecional` varchar(50) DEFAULT NULL,
  `Especialidad` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Observaciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `controles`
--

INSERT INTO `controles` (`idcontroles`, `usuarios_id`, `Nombre_profecional`, `Especialidad`, `Fecha`, `Observaciones`) VALUES
(1, 2, 'Caterine', 'Cardiologia', '2022-03-26', 'pronto recuperacion'),
(3, 2, 'emiliano', 'Pediatra', '2022-03-02', 'ninguna'),
(4, 1, 'nia', 'mente', '2021-01-31', 'feliz cumpleaños'),
(8, 1, 'julian', 'corazon', '2022-03-31', 'pronto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores_salud`
--

CREATE TABLE `indicadores_salud` (
  `id_salud` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Frecuencia_cardiaca` int(11) DEFAULT NULL,
  `Tencion_arterial` int(11) DEFAULT NULL,
  `Saturacion_oxigeno` int(11) DEFAULT NULL,
  `Vacunas` varchar(50) DEFAULT NULL,
  `Entrenamiento` int(11) DEFAULT NULL,
  `Distancia_recorridas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `indicadores_salud`
--

INSERT INTO `indicadores_salud` (`id_salud`, `usuarios_id`, `Fecha`, `Frecuencia_cardiaca`, `Tencion_arterial`, `Saturacion_oxigeno`, `Vacunas`, `Entrenamiento`, `Distancia_recorridas`) VALUES
(1, 1, '2022-03-31', 10, 20, 50, 'todas', 2, 20),
(3, 2, '2022-03-29', 10, 20, 50, 'todas', 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_laboratorio`
--

CREATE TABLE `r_laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `Descriccion` varchar(500) DEFAULT NULL,
  `Imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `r_laboratorio`
--

INSERT INTO `r_laboratorio` (`id_laboratorio`, `usuarios_id`, `Descriccion`, `Imagen`) VALUES
(1, 1, 'excelente ', ''),
(2, 1, 'Mejorar', ''),
(3, 1, 'Mejorar', ''),
(4, 2, 'aumentar masa', ''),
(5, 2, 'aumentar masa', ''),
(6, 2, 'aumentar masa', ''),
(7, 1, 'aumentar masa', ''),
(8, 1, 'aumentar masa', ''),
(9, 1, 'aumentar masa', ''),
(10, 1, 'aumentar masa', 'masa.png'),
(11, 1, 'aumentar masa', 'masa.png'),
(12, 2, '1', 'ir proxi cita'),
(13, 2, '1', 'ir proxi cita'),
(14, 2, '1', 'ir proxi cita'),
(15, 1, 'nada', 'cardiograma.png'),
(16, 2, 'nada', 'cardiograma.png'),
(17, 2, '1', 'cambiar'),
(18, 2, '1', 'cambiar'),
(19, 1, 'Mejorar', ''),
(20, 1, 'no mejorar', ''),
(21, 1, 'no mejorar', ''),
(23, 1, 'estado optimo ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Nombre_completo` varchar(50) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo_electronico` varchar(11) DEFAULT NULL,
  `Genero` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombre_completo`, `Edad`, `Correo_electronico`, `Genero`) VALUES
(1, 'Estefa', 19, '154651', 'F'),
(2, 'David', 22, 'sdasdas', 'M');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`idcondicion`),
  ADD KEY `Condicion_FKIndex2` (`R_laboratorio_id`);

--
-- Indices de la tabla `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`idcontroles`),
  ADD KEY `Controles_FKIndex1` (`usuarios_id`);

--
-- Indices de la tabla `indicadores_salud`
--
ALTER TABLE `indicadores_salud`
  ADD PRIMARY KEY (`id_salud`),
  ADD KEY `Indicadores_Salud_FKIndex1` (`usuarios_id`);

--
-- Indices de la tabla `r_laboratorio`
--
ALTER TABLE `r_laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`),
  ADD KEY `R_laboratorio_FKIndex1` (`usuarios_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `idcondicion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `controles`
--
ALTER TABLE `controles`
  MODIFY `idcontroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `indicadores_salud`
--
ALTER TABLE `indicadores_salud`
  MODIFY `id_salud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `r_laboratorio`
--
ALTER TABLE `r_laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
