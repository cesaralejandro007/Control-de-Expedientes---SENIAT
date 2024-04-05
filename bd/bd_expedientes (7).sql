-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2024 a las 20:48:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_expedientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombrearea` varchar(40) NOT NULL,
  `id_division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombrearea`, `id_division`) VALUES
(1, 'Informatica', 1),
(2, 'Área de Recursos Humanos', 1),
(3, 'Área de Bienes Nacionales', 1),
(4, 'Despacho de la División de Administració', 1),
(5, 'Área de Compras', 1),
(6, 'Área de Almacén ', 1),
(7, 'Área de Presupuesto', 1),
(8, 'Área de Contabilidad', 1),
(9, 'Área de Tesorería ', 1),
(10, 'Coordinación de Infraestructura y Servic', 1),
(11, 'Área de Viáticos ', 1),
(12, 'Despacho de Gerencia', 2),
(13, 'Resguardo', 2),
(14, 'Seguridad', 2),
(15, 'Despacho Asistencia al Contribuyente', 3),
(16, 'Área de Prensa', 3),
(17, 'Área De Cobranzas', 4),
(18, 'Modulo de Inserción', 4),
(19, 'Modulo Exoneración', 4),
(20, 'Modulo de Remisión', 4),
(21, 'Registro de Cta./Corriente', 4),
(22, 'Despacho División  de Recaudación ', 4),
(23, 'Modulo de Retenciones', 4),
(24, 'Entes Públicos ', 4),
(25, 'Área de Sucesiones', 4),
(26, 'Modulo Investigación Patrimonial', 4),
(27, 'Área de Rif', 4),
(28, 'Área de Licores', 4),
(29, 'Liquidación ', 4),
(30, 'Reintegro y Devoluciones', 4),
(31, 'Timbres Fiscales', 4),
(32, 'Despacho Fiscalización', 5),
(33, 'Fiscalización General', 5),
(34, 'Avaluo', 5),
(35, 'Selección Previa', 5),
(36, 'Deberes Formales', 5),
(37, 'Beneficios Fiscales', 5),
(38, 'Fondo y Semi Fondo', 5),
(39, 'Planificación y Control de Gestión ', 5),
(40, 'Despacho División de Sumario', 6),
(41, 'Área de Sustanciación de Sumario', 6),
(42, 'Área Cobro Judicial', 7),
(43, 'Recursos Administrativo y Jurídico ', 7),
(44, 'Despacho de la División', 7),
(45, 'Contencioso Tributario', 7),
(46, 'Sustanciación', 7),
(47, 'Área de Notificación', 8),
(48, 'Área de Vivienda Principal', 8),
(49, 'Área de Archivo General', 8),
(50, 'Área de Correspondencia', 8),
(51, 'Despacho de la División', 8),
(52, 'Área Control de Obligación', 9),
(53, 'Cobranza', 9),
(54, 'Área Control Bancario', 9),
(55, 'Asistencia al Contribuyente', 9),
(56, 'Despacho de la División', 9),
(57, 'Modulo de Correcciones y Análisis de Cue', 9),
(58, 'Contribuyentes Especiales Punto Fijo', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_expediente`
--

CREATE TABLE `area_expediente` (
  `id` int(11) NOT NULL,
  `nombre_area` varchar(40) NOT NULL,
  `id_division_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area_expediente`
--

INSERT INTO `area_expediente` (`id`, `nombre_area`, `id_division_expediente`) VALUES
(1, 'Informatica', 1),
(2, 'Área de Recursos Humanos', 1),
(3, 'Área de Bienes Nacionales', 1),
(4, 'Despacho División de Administración', 1),
(5, 'Área de Compras', 1),
(6, 'Área de Almacén ', 1),
(7, 'Área de Presupuesto', 1),
(8, 'Área de Contabilidad', 1),
(9, 'Área de Tesorería ', 1),
(10, 'Coordinación de Infraestructura y Servic', 1),
(11, 'Área de Viáticos ', 1),
(12, 'Despacho de Gerencia', 2),
(13, 'Resguardo', 2),
(14, 'Seguridad', 2),
(15, 'Despacho Asistencia al Contribuyente', 3),
(16, 'Área de Prensa', 3),
(17, 'Área De Cobranzas', 4),
(18, 'Modulo de Inserción', 4),
(19, 'Modulo Exoneración', 4),
(20, 'Modulo de Remisión', 4),
(21, 'Registro de Cta./Corriente', 4),
(22, 'Despacho División  de Recaudación ', 4),
(23, 'Modulo de Retenciones', 4),
(24, 'Entes Públicos ', 4),
(25, 'Área de Sucesiones', 4),
(26, 'Modulo Investigación Patrimonial', 4),
(27, 'Área de Rif', 4),
(28, 'Área de Licores', 4),
(29, 'Liquidación ', 4),
(30, 'Reintegro y Devoluciones', 4),
(31, 'Timbres Fiscales', 4),
(32, 'Despacho Fiscalización', 5),
(33, 'Fiscalización General', 5),
(34, 'Avaluo', 5),
(35, 'Selección Previa', 5),
(36, 'Deberes Formales', 5),
(37, 'Beneficios Fiscales', 5),
(38, 'Fondo y Semi Fondo', 5),
(39, 'Planificación y Control de Gestión ', 5),
(40, 'Despacho División de Sumario', 6),
(41, 'Área de Sustanciación de Sumario', 6),
(42, 'Área Cobro Judicial', 7),
(43, 'Recursos Administrativo y Jurídico ', 7),
(44, 'Despacho de la División', 7),
(45, 'Contencioso Tributario', 7),
(46, 'Sustanciación', 7),
(47, 'Área de Notificación', 8),
(48, 'Área de Vivienda Principal', 8),
(49, 'Área de Archivo General', 8),
(50, 'Área de Correspondencia', 8),
(51, 'Despacho de la División', 8),
(52, 'Área Control de Obligación', 9),
(53, 'Cobranza', 9),
(54, 'Área Control Bancario', 9),
(55, 'Asistencia al Contribuyente', 9),
(56, 'Despacho de la División', 9),
(57, 'Modulo de Correcciones y Análisis de Cue', 9),
(58, 'Contribuyentes Especiales Punto Fijo', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_expediente`
--

CREATE TABLE `bitacora_expediente` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `movimiento_de_expediante` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nro_expediente` varchar(50) NOT NULL,
  `destino_expediendte` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `nombrediv` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id`, `nombrediv`) VALUES
(1, 'Administracion'),
(2, 'Gerencia Regional de Tributos Internos'),
(3, 'División Asistencia al Contribuyente'),
(4, 'División de Recaudación'),
(5, 'División de Fiscalizacíon'),
(6, 'División de Sumario Administrativo'),
(7, 'División de Jurídico Tributario '),
(8, 'División de Tramitaciones'),
(9, 'División de Contribuyentes Especiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division_expediente`
--

CREATE TABLE `division_expediente` (
  `id` int(11) NOT NULL,
  `nombre_division` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `division_expediente`
--

INSERT INTO `division_expediente` (`id`, `nombre_division`) VALUES
(1, 'Administracion'),
(2, 'Gerencia Regional de Tributos Internos'),
(3, 'División Asistencia al Contribuyente'),
(4, 'División de Recaudación'),
(5, 'División de Fiscalizacíon'),
(6, 'División de Sumario Administrativo'),
(7, 'División de Jurídico Tributario '),
(8, 'División de Tramitaciones'),
(9, 'División de Contribuyentes Especiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entorno_sistema`
--

CREATE TABLE `entorno_sistema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_expediente`
--

CREATE TABLE `estado_expediente` (
  `id` int(11) NOT NULL,
  `estado_exp` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_expediente`
--

INSERT INTO `estado_expediente` (`id`, `estado_exp`) VALUES
(1, 'En Revisión'),
(2, 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `id` int(11) NOT NULL,
  `NroProvi` varchar(40) DEFAULT NULL,
  `sujetoP` varchar(40) NOT NULL,
  `RifSP` varchar(12) NOT NULL,
  `DomicilioFiscal` varchar(100) NOT NULL,
  `id_area_expediente` int(11) DEFAULT NULL,
  `id_estado_expedientes` int(11) DEFAULT NULL,
  `status_exp` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `añadir` varchar(40) NOT NULL,
  `solicitar` varchar(40) NOT NULL,
  `ver` varchar(40) NOT NULL,
  `editar` varchar(40) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_entorno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombrerol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `cedula_user` int(11) NOT NULL,
  `nombre_user` varchar(40) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  `nombre_rol` varchar(40) NOT NULL,
  `id_expedientes` int(11) DEFAULT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `cedula_user`, `nombre_user`, `id_area`, `nombre_rol`, `id_expedientes`, `password`) VALUES
(2, 28055655, 'CESAR ALEJANDRO VIDES G', 1, 'Super Usuario', 1, 'Usuariov.37*'),
(12, 8104259, 'ALBRANYER ZAMBRANO', 40, 'Supervisor', NULL, 'Seniat**'),
(14, 9612363, 'LUIS CAMACARO', 41, 'Ponente', NULL, 'Seniat**'),
(15, 11071854, 'ELEBANO MORILLO ', 41, 'Ponente', NULL, 'Seniat**'),
(16, 13603473, 'OSCAR PEREZ', 41, 'Ponente', NULL, 'Seniat**'),
(17, 15264075, 'MAIRA RODRIGUEZ', 40, 'Supervisor', NULL, 'Seniat**'),
(18, 16328810, 'JULIO MONSALVE', 41, 'Ponente', NULL, 'Seniat**'),
(19, 19264302, 'ISAMAR CRESPO', 41, 'Ponente', NULL, 'Seniat**'),
(20, 19571886, 'YETLENIA GUEDEZ', 41, 'Ponente', NULL, 'Seniat**'),
(21, 25136991, 'ANDREA TONA', 41, 'Ponente', NULL, 'Seniat**'),
(22, 26385537, 'ANDRES HERNANDEZ', 41, 'Ponente', NULL, 'Seniat**'),
(24, 16648278, 'HECTOR MEDINA', 41, 'Ponente', NULL, 'Seniat**'),
(28, 18137918, 'WHITNEY ESCALONA', 49, 'Supervisor', NULL, 'Seniat**'),
(29, 15229628, 'YENNIFER CARUCI', 49, 'Archivista', NULL, 'Seniat**'),
(30, 17728034, 'MIGDALIA SALAZAR', 29, 'Supervisor', NULL, 'Seniat**'),
(31, 9557997, 'FREDDY ALVARADO', 29, 'Revisor', NULL, 'Seniat**'),
(32, 16748633, 'MAGBIS MONSALVE', 29, 'Revisor', NULL, 'Seniat**'),
(33, 7391293, 'EDUARDO JOSE MARTINEZ SALAS', 12, 'Administrador', NULL, 'Seniat**'),
(34, 6149986, 'TARCISIO NATERA', 33, 'Fiscal', NULL, 'Seniat**'),
(35, 7389451, 'BELKIS VILLEGAS ', 34, 'Fiscal', NULL, 'Seniat**'),
(36, 7399532, 'IVAN SOTELDO ', 33, 'Fiscal', NULL, 'Seniat**'),
(37, 7417713, 'JARIYURY NIETO', 33, 'Fiscal', NULL, 'Seniat**'),
(38, 7425340, 'AIDA MENDEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(39, 7432985, 'EDWIN MELENDEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(40, 7434963, 'YOLIMAR MEDINA', 33, 'Fiscal', NULL, 'Seniat**'),
(41, 9066044, 'MARIA BRICEñO', 33, 'Fiscal', NULL, 'Seniat**'),
(42, 9325747, 'ROGELIO DURAN', 33, 'Fiscal', NULL, 'Seniat**'),
(43, 9672631, 'YURISMA GIMENEZ ', 33, 'Fiscal', NULL, 'Seniat**'),
(44, 10771366, 'MAYIBE AGUERO', 33, 'Fiscal', NULL, 'Seniat**'),
(45, 11077542, 'MARIANO COLINA ', 33, 'Fiscal', NULL, 'Seniat**'),
(46, 11269892, 'YURIBETH SILVA', 33, 'Fiscal', NULL, 'Seniat**'),
(47, 11595634, 'WILLIAMS PIANTADOSI', 33, 'Fiscal', NULL, 'Seniat**'),
(48, 11694037, 'MARILECT ZORAIDA MONTES CARRAS', 33, 'Fiscal', NULL, 'Seniat**'),
(49, 12434150, 'EDUARDO ARANGUREN', 33, 'Fiscal', NULL, 'Seniat**'),
(50, 13189462, 'BEATRIZ CAMACARO', 33, 'Fiscal', NULL, 'Seniat**'),
(51, 13239724, 'WILFREDO RAMOS', 34, 'Supervisor', NULL, 'Seniat**'),
(52, 13651822, 'CARENYS MARIA LUCENA NAVERA ', 33, 'Fiscal', NULL, 'Seniat**'),
(53, 14335049, 'EDICSON LOPEZ', 36, 'Supervisor', NULL, 'Seniat**'),
(54, 14513719, 'MARYHUSKA ALONSO', 33, 'Fiscal', NULL, 'Seniat**'),
(55, 14879756, 'KATHERINE LUZARDO', 33, 'Fiscal', NULL, 'Seniat**'),
(56, 15003180, 'LORENA MEDINA', 33, 'Fiscal', NULL, 'Seniat**'),
(57, 15886950, 'YETSENIA ACOSTA', 33, 'Fiscal', NULL, 'Seniat**'),
(58, 16089926, 'MARIANGELA CASTRO ', 33, 'Fiscal', NULL, 'Seniat**'),
(59, 16386453, 'MALBIA ALVAREZ', 33, 'Fiscal', NULL, 'Seniat**'),
(60, 16583955, 'MARIANNY VERONICA CASTILLO MAS', 33, 'Fiscal', NULL, 'Seniat**'),
(61, 16595231, 'OSLEIDY CAROLINA ARIAS R', 32, 'Supervisor', NULL, 'Seniat**'),
(62, 16641201, 'YOLIMAR PEREZ', 33, 'Fiscal', NULL, 'Seniat**'),
(63, 16643555, 'EDIXON PARRA', 33, 'Fiscal', NULL, 'Seniat**'),
(64, 16795814, 'JESUS CRESPO', 33, 'Fiscal', NULL, 'Seniat**'),
(65, 16867100, 'VERONICA DEL CARMEN', 33, 'Fiscal', NULL, 'Seniat**'),
(66, 17572711, 'FERNANDO RODRIGUEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(67, 17573427, 'JENNY ANDAZOL', 33, 'Fiscal', NULL, 'Seniat**'),
(68, 17782209, 'TAHELIS YONELA COLMENAREZ LAND', 33, 'Fiscal', NULL, 'Seniat**'),
(69, 17782872, 'ALI MARTINEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(70, 18261937, 'SERGIO SALVADOR BRAVO PORTA', 33, 'Fiscal', NULL, 'Seniat**'),
(71, 18296030, 'JESUS BERMUDEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(72, 18333815, 'MARIA GALOFRE', 33, 'Fiscal', NULL, 'Seniat**'),
(73, 18423785, 'JANNY ROAS', 33, 'Fiscal', NULL, 'Seniat**'),
(74, 19887037, 'FRAIRY YEPEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(75, 20350004, 'MARYELIS RODRIGUEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(76, 20667267, 'DORIALBERTH PIñA', 33, 'Fiscal', NULL, 'Seniat**'),
(77, 20921963, 'ANDREA CAMARGO', 33, 'Fiscal', NULL, 'Seniat**'),
(78, 21725553, 'ROSELVYS DESIREE GUEVARA CORON', 33, 'Fiscal', NULL, 'Seniat**'),
(79, 22182676, 'HILDA ANDRADE', 33, 'Fiscal', NULL, 'Seniat**'),
(80, 23814752, 'MARIA OLIVAR', 33, 'Fiscal', NULL, 'Seniat**'),
(81, 24162125, 'KARLIET DE LOS ANGELES', 33, 'Fiscal', NULL, 'Seniat**'),
(82, 24363187, 'NAUDYMAR RODRIGUEZ ', 33, 'Fiscal', NULL, 'Seniat**'),
(83, 24614872, 'LOURDES VENEGAS ', 33, 'Fiscal', NULL, 'Seniat**'),
(84, 25570453, 'EMIZON MENDOZA', 33, 'Fiscal', NULL, 'Seniat**'),
(85, 25856296, 'LEIDY LINARES', 33, 'Fiscal', NULL, 'Seniat**'),
(86, 27452291, 'JOSE PAEZ', 33, 'Fiscal', NULL, 'Seniat**'),
(87, 7400542, 'OMAIRA ELENA PEREZ ROSALES', 51, 'Supervisor', NULL, 'Seniat**'),
(88, 13189812, 'SOIRET MARINA MEDINA GOLLO', 22, 'Supervisor', NULL, 'Seniat**');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userxexpediente`
--

CREATE TABLE `userxexpediente` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL,
  `supervisor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_division` (`id_division`);

--
-- Indices de la tabla `area_expediente`
--
ALTER TABLE `area_expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_division_expedientes` (`id_division_expediente`);

--
-- Indices de la tabla `bitacora_expediente`
--
ALTER TABLE `bitacora_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `division_expediente`
--
ALTER TABLE `division_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entorno_sistema`
--
ALTER TABLE `entorno_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_expediente`
--
ALTER TABLE `estado_expediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estado_expedientes` (`id_estado_expedientes`),
  ADD KEY `id_area_expedientes` (`id_area_expediente`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_entorno` (`id_entorno`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_expedientes` (`id_expedientes`);

--
-- Indices de la tabla `userxexpediente`
--
ALTER TABLE `userxexpediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_expediente` (`id_expediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `area_expediente`
--
ALTER TABLE `area_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `bitacora_expediente`
--
ALTER TABLE `bitacora_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `division_expediente`
--
ALTER TABLE `division_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `entorno_sistema`
--
ALTER TABLE `entorno_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_expediente`
--
ALTER TABLE `estado_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `userxexpediente`
--
ALTER TABLE `userxexpediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`id_division`) REFERENCES `division` (`id`);

--
-- Filtros para la tabla `area_expediente`
--
ALTER TABLE `area_expediente`
  ADD CONSTRAINT `area_expediente_ibfk_1` FOREIGN KEY (`id_division_expediente`) REFERENCES `division_expediente` (`id`);

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_ibfk_1` FOREIGN KEY (`id_area_expediente`) REFERENCES `area_expediente` (`id`),
  ADD CONSTRAINT `fk_permisosEXP` FOREIGN KEY (`id_estado_expedientes`) REFERENCES `estado_expediente` (`id`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`id_entorno`) REFERENCES `entorno_sistema` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`);

--
-- Filtros para la tabla `userxexpediente`
--
ALTER TABLE `userxexpediente`
  ADD CONSTRAINT `fk_exp` FOREIGN KEY (`id_expediente`) REFERENCES `expedientes` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
