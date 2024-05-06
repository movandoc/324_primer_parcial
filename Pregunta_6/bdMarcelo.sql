-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2024 a las 11:39:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmarcelo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancaria`
--

CREATE TABLE `cuenta_bancaria` (
  `id_cliente` int(11) DEFAULT NULL,
  `n_cuenta` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta_bancaria`
--

INSERT INTO `cuenta_bancaria` (`id_cliente`, `n_cuenta`, `tipo`, `saldo`) VALUES
(234567, 10000, 'ahorros', 5000.50),
(234567, 10001, 'corriente', 2020.20),
(234567, 10002, 'jubilacion', 60000.43),
(234568, 10003, 'ahorros', 7044.56),
(234568, 10004, 'corriente', 300.30),
(234569, 10005, 'ahorros', 200.56),
(234569, 10006, 'ahorros', 1200.56),
(234570, 10007, 'ahorros', 10439.80),
(234570, 10008, 'Plazo Fijo', 20000.00),
(234571, 10009, 'ahorros', 3000.00),
(234571, 10010, 'negocio', 14000.30),
(234571, 10011, 'estudiante', 2000.00),
(234571, 10012, 'estudiante', 2000.00),
(234569, 10013, 'Plazo Fijo', 14000.00),
(234568, 10014, 'jubilacion', 2100.00),
(234569, 10015, 'jubilacion', 12344.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ap_pat` varchar(50) DEFAULT NULL,
  `ap_mat` varchar(50) DEFAULT NULL,
  `fe_nac` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `ap_pat`, `ap_mat`, `fe_nac`, `tipo`, `email`, `departamento`, `contrasenia`) VALUES
(1, 'MARCELO', 'OVANDO', 'COLQUE', '1998-05-10', 'ADMIN', 'ovando@gmail.com', 'LA PAZ', '123456'),
(7, 'ITATI', 'TORREZ', 'MENDEZ', '1999-05-18', 'DIRECTOR', 'torrezitati@gmail.com', 'LA PAZ', '123456'),
(123789, 'MARCELO', 'PEREZ', 'PLATA', '1998-12-31', 'USUARIO', 'mperezp@gmail.com', 'LA PAZ', '123'),
(232323, 'ALBERTO JOSE', 'SALAS', 'MAMANI', '1990-10-10', 'USUARIO', 'albert@gmail.com', 'LA PAZ', '123'),
(234567, 'PEDRO', 'VASQUEZ', 'MORALES', '1960-05-15', 'USUARIO', 'pedro@pedro.com', 'COCHABAMBA', '123'),
(234568, 'CAMILA', 'MOREJON', 'AGUILAR', '1980-07-30', 'USUARIO', 'cmorejona@gmail.com', 'SANTA CRUZ', '123'),
(234569, 'LUIS', 'ALVAREZ', 'PORTUGAL', '1990-09-17', 'USUARIO', 'lalvarezp@gmail.com', 'SANTA CRUZ', '123'),
(234570, 'MARIA', 'ASPIAZU', 'SANCHEZ', '1960-10-20', 'USUARIO', 'maspiazus@gmail.com', 'COCHABAMBA', '123'),
(234571, 'CESAR', 'CALLE', 'SOTO', '1993-01-10', 'USUARIO', 'ccalles@gmail.com', 'LA PAZ', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_bancaria`
--

CREATE TABLE `transaccion_bancaria` (
  `id_transaccion` int(11) NOT NULL,
  `cuenta_src` int(11) DEFAULT NULL,
  `cuenta_dst` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD PRIMARY KEY (`n_cuenta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `transaccion_bancaria`
--
ALTER TABLE `transaccion_bancaria`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `cuenta_src` (`cuenta_src`),
  ADD KEY `cuenta_dst` (`cuenta_dst`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  MODIFY `n_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10020;

--
-- AUTO_INCREMENT de la tabla `transaccion_bancaria`
--
ALTER TABLE `transaccion_bancaria`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD CONSTRAINT `cuenta_bancaria_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `transaccion_bancaria`
--
ALTER TABLE `transaccion_bancaria`
  ADD CONSTRAINT `transaccion_bancaria_ibfk_1` FOREIGN KEY (`cuenta_src`) REFERENCES `cuenta_bancaria` (`n_cuenta`),
  ADD CONSTRAINT `transaccion_bancaria_ibfk_2` FOREIGN KEY (`cuenta_dst`) REFERENCES `cuenta_bancaria` (`n_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
