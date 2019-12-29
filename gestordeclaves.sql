-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2019 a las 01:19:40
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestordeclaves`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `idCuentaUser` int(11) NOT NULL,
  `Plataforma` varchar(200) NOT NULL,
  `URL` varchar(500) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`idCuentaUser`, `Plataforma`, `URL`, `Password`, `Comentario`, `idUser`) VALUES
(36, 'Facebook', 'www.facebook.com', 'RMCLm82-YL', 'Red social', 45),
(78, 'wqrqeerq', 'qerqerq', '12345', 'qerqerqe', 45),
(80, 'juanito10', 'elitemagician01@gmail.com', '1231343', 'qwrqwrqe', 46),
(81, 'juanito10', 'elitemagician01@gmail.com', '13113', '121221', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logsistema`
--

CREATE TABLE `logsistema` (
  `idLog` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Descripcion` text NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logsistema`
--

INSERT INTO `logsistema` (`idLog`, `Fecha`, `Hora`, `Descripcion`, `idUser`) VALUES
(65, '2019-11-28', '13:55:45', 'ENTRADA', 45),
(66, '2019-11-28', '13:59:59', 'NUEVA CUENTA', 45),
(67, '2019-11-28', '14:00:07', 'CONSULTA', 45),
(68, '2019-11-28', '14:01:51', 'NUEVA CUENTA', 45),
(69, '2019-11-28', '14:08:06', 'ENTRADA', 46),
(70, '2019-11-28', '14:13:20', 'ENTRADA', 46),
(71, '2019-11-28', '14:15:16', 'NUEVA CUENTA', 46),
(72, '2019-11-28', '14:15:30', 'CONSULTA', 46),
(73, '2019-11-28', '14:16:26', 'CONSULTA', 46),
(74, '2019-12-01', '18:43:55', 'CONSULTA', 46),
(75, '2019-12-03', '19:16:30', 'ENTRADA', 45),
(76, '2019-12-03', '19:17:45', 'NUEVA CUENTA', 45),
(77, '2019-12-03', '19:17:51', 'CONSULTA', 45),
(78, '2019-12-04', '12:11:45', 'CONSULTA', 45),
(79, '2019-12-04', '12:12:56', 'ENTRADA', 45),
(80, '2019-12-04', '12:13:09', 'CONSULTA', 45),
(81, '2019-12-04', '20:42:08', 'NUEVA CUENTA', 46),
(82, '2019-12-04', '20:42:33', 'NUEVA CUENTA', 46),
(83, '2019-12-04', '20:58:58', 'NUEVA CUENTA', 46),
(84, '2019-12-04', '21:35:24', 'NUEVA CUENTA', 46),
(85, '2019-12-04', '21:35:44', 'NUEVA CUENTA', 46),
(86, '2019-12-05', '09:22:13', 'NUEVA CUENTA', 46),
(87, '2019-12-05', '09:22:36', 'NUEVA CUENTA', 46),
(88, '2019-12-05', '09:41:32', 'NUEVA CUENTA', 46),
(89, '2019-12-05', '09:45:43', 'NUEVA CUENTA', 46),
(90, '2019-12-05', '09:47:35', 'NUEVA CUENTA', 46),
(91, '2019-12-05', '09:47:37', 'NUEVA CUENTA', 46),
(92, '2019-12-05', '09:50:08', 'NUEVA CUENTA', 46),
(93, '2019-12-05', '09:50:29', 'NUEVA CUENTA', 46),
(94, '2019-12-05', '09:54:24', 'NUEVA CUENTA', 46),
(95, '2019-12-05', '09:54:52', 'NUEVA CUENTA', 46),
(96, '2019-12-05', '10:19:14', 'NUEVA CUENTA', 46),
(97, '2019-12-05', '10:19:41', 'NUEVA CUENTA', 46),
(98, '2019-12-05', '10:20:04', 'NUEVA CUENTA', 46),
(99, '2019-12-05', '10:26:18', 'NUEVA CUENTA', 46),
(100, '2019-12-05', '10:26:39', 'NUEVA CUENTA', 46),
(101, '2019-12-05', '10:36:33', 'NUEVA CUENTA', 46),
(102, '2019-12-05', '10:54:21', 'NUEVA CUENTA', 46),
(103, '2019-12-05', '10:55:11', 'NUEVA CUENTA', 46),
(104, '2019-12-05', '11:52:21', 'NUEVA CUENTA', 46),
(105, '2019-12-05', '11:52:36', 'NUEVA CUENTA', 46),
(106, '2019-12-05', '12:32:01', 'NUEVA CUENTA', 46),
(107, '2019-12-05', '12:32:54', 'NUEVA CUENTA', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Telefono` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `Correo`, `Password`, `Username`, `Telefono`) VALUES
(45, 'oscar@gmail.com', '$2y$10$EdWcmo3hCxzAD.2yWx2I9.AzKgWU/CInL8fgGQCowJMU6I4XWcc5y', 'OscarJ ', '2281329157'),
(46, 'elizabeth@hotmail.com', '$2y$10$hlx2ZWLUYiir48TeM5Q7k.0G6VZEG6IFedlSX/giK3XKaXnA5.LqO', 'elizabeth', '2281329157');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`idCuentaUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `logsistema`
--
ALTER TABLE `logsistema`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `idCuentaUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `logsistema`
--
ALTER TABLE `logsistema`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logsistema`
--
ALTER TABLE `logsistema`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
