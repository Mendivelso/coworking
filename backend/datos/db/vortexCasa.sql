
AndreaM@2020


LizethM@2020





-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2020 a las 22:09:23
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vortex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `Id` int(11) NOT NULL COMMENT 'Id',
  `Nombre` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `Status` int(2) NOT NULL,
  `Created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`Id`, `Nombre`, `Telefono`, `Email`, `Mensaje`, `Status`, `Created_at`) VALUES
(1, 'Cristian test', '5726542', 'cr1@gmail.com', 'loremp', 1, '2020-01-31 11:56:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id` int(11) NOT NULL COMMENT 'Identificador del registro',
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del estado',
  `Status` int(1) NOT NULL COMMENT 'activo o desactivo',
  `Tipo` int(10) NOT NULL COMMENT 'Tipo de estado',
  `Created_date` datetime NOT NULL COMMENT 'Fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`Id`, `Nombre`, `Status`, `Tipo`, `Created_date`) VALUES
(1, 'Registrado', 1, 0, '2018-06-28 15:31:51'),
(2, 'Asignado', 1, 0, '2019-06-18 14:20:16'),
(3, 'Cargado', 1, 0, '2019-06-18 14:20:18'),
(4, 'Inactivo', 1, 0, '0000-00-00 00:00:00'),
(5, 'se envia Email', 1, 2, '2019-07-04 10:18:19'),
(7, 'Se realiza llamada a su celular', 1, 1, '2019-07-04 10:08:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `Id` int(11) NOT NULL COMMENT 'Identificar del registro',
  `Titulo` varchar(45) NOT NULL COMMENT 'titulo del servicio',
  `Descripcion` varchar(900) NOT NULL COMMENT 'Descripcion del servicio',
  `Enlace` varchar(60) DEFAULT NULL COMMENT 'Tiene enlace en internet',
  `Imagen_principal` varchar(300) NOT NULL COMMENT 'Imagen principal del servicio',
  `Fecha` date NOT NULL COMMENT 'Fecha creacion del evento',
  `Status` int(1) NOT NULL COMMENT 'Estado del registro',
  `Created_by` varchar(45) NOT NULL COMMENT 'Usuario que crea el registro',
  `Created_date` date NOT NULL COMMENT 'Fecha creacion del registro',
  `Updated_by` varchar(45) DEFAULT NULL COMMENT 'Usuario que actualiza el registro',
  `Updated_date` date DEFAULT NULL COMMENT 'Fecha de actualizacion del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`Id`, `Titulo`, `Descripcion`, `Enlace`, `Imagen_principal`, `Fecha`, `Status`, `Created_by`, `Created_date`, `Updated_by`, `Updated_date`) VALUES
(16, 'Noche de velitas 07 DIC', 'Se llevara acabo una gran fiestas para todas las familias de los arquitectos que asistan este 7 de diciembre coordial emnte invitados todos.', '', 'public/eventos/16/download.jpg', '2018-12-07', 1, '1', '2018-12-04', NULL, NULL),
(17, 'Navidad 2018', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'public/eventos/17/navidad.jpg', '2018-12-24', 1, '1', '2018-12-05', NULL, NULL),
(18, 'Junta de Arquitectos 2018', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'public/eventos/18/junta.jpg', '2018-12-20', 1, '1', '2018-12-05', NULL, NULL),
(20, 'test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'public/eventos/20/fot5.png', '2020-01-30', 1, '5', '2020-02-07', NULL, NULL),
(21, 'FERIA DE MOTORES VORTEX', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'public/eventos/21/4.jpg', '2020-02-04', 1, '5', '2020-02-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeriaprincipal`
--

CREATE TABLE `galeriaprincipal` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Url` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `Posicion` int(11) NOT NULL,
  `Status` int(4) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Created_by` int(11) NOT NULL,
  `Updated_at` datetime DEFAULT NULL,
  `Updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeriaprincipal`
--

INSERT INTO `galeriaprincipal` (`Id`, `Nombre`, `Url`, `Posicion`, `Status`, `Created_at`, `Created_by`, `Updated_at`, `Updated_by`) VALUES
(1, 'Panamericano de karts 2020', 'public/galeria/1/panamericano.JPG', 1, 1, '2020-02-09 17:06:29', 5, NULL, NULL),
(2, 'Carreras de pilotos 2020', 'public/galeria/2/fot3.png', 1, 1, '2020-02-09 17:52:29', 5, NULL, NULL),
(3, 'carrera de pilotos junior', 'public/galeria/3/fot2.png', 1, 1, '2020-02-09 18:17:56', 5, NULL, NULL),
(4, 'Reunion de pilotos', 'public/galeria/4/foto2.png', 2, 1, '2020-02-09 19:00:51', 5, NULL, NULL),
(5, 'pilotos fishet', 'public/galeria/5/foto3.png', 2, 1, '2020-02-09 19:04:58', 5, NULL, NULL),
(6, 'Carros karts ', 'public/galeria/6/foto1.png', 2, 1, '2020-02-09 19:47:17', 5, NULL, NULL),
(7, 'Master Rok', 'public/galeria/7/masterrok.JPG', 2, 1, '2020-02-09 19:49:44', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `Id` int(11) NOT NULL COMMENT 'Id',
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre regsitro',
  `Email` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email registro',
  `FechaNacimiento` date NOT NULL COMMENT 'Documento del registro',
  `Edad` int(11) NOT NULL COMMENT 'Celular Registro',
  `TipoDoc` varchar(90) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Programa que decea',
  `Documento` bigint(60) NOT NULL COMMENT 'Mensaje del registro',
  `TipoSangre` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Identificador campñas en medios',
  `Equipo` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Origen del registro',
  `Club` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Estado 2 del registro',
  `Status` int(11) NOT NULL COMMENT 'Estado del registro',
  `Created_at` datetime NOT NULL COMMENT 'Fecha Creacion',
  `Updated_by` int(11) DEFAULT NULL COMMENT 'Usuario que actualiza',
  `Updated_at` datetime DEFAULT NULL COMMENT 'Fecha que actualiza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`Id`, `Nombre`, `Email`, `FechaNacimiento`, `Edad`, `TipoDoc`, `Documento`, `TipoSangre`, `Equipo`, `Club`, `Status`, `Created_at`, `Updated_by`, `Updated_at`) VALUES
(1, 'Cristian Mendivelso', 'cr@gmail.com', '0000-00-00', 20, 'CC', 1022422710, 'postivo', 'EQuipo', 'dfsdfsdfsdf', 1, '2020-02-03 12:30:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `Id` int(11) NOT NULL COMMENT 'Id del registro',
  `Posicion` int(11) NOT NULL COMMENT 'Posicion del registtro',
  `NumeroPiloto` int(11) NOT NULL COMMENT 'Numero del piloto',
  `NombrePiloto` varchar(90) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del piloto',
  `v1` int(11) DEFAULT NULL COMMENT 'Resultado valida 1',
  `v2` int(11) DEFAULT NULL COMMENT 'Resultado valida 2',
  `v3` int(11) DEFAULT NULL COMMENT 'Resultado valida 3',
  `v4` int(11) DEFAULT NULL COMMENT 'Resultado valida 4',
  `v5` int(11) DEFAULT NULL COMMENT 'Resultado valida 5',
  `v6` int(11) DEFAULT NULL COMMENT 'Resultado valida 6',
  `v7` int(11) DEFAULT NULL COMMENT 'Resultado valida 7',
  `v8` int(11) DEFAULT NULL COMMENT 'Resultado valida 8',
  `v9` int(11) DEFAULT NULL COMMENT 'Resultado valida 9',
  `v10` int(11) DEFAULT NULL COMMENT 'Resultado valida 10',
  `v11` int(11) DEFAULT NULL COMMENT 'Valida 11',
  `v12` int(11) DEFAULT NULL COMMENT 'Valida 12',
  `Total` int(11) DEFAULT NULL COMMENT 'Resultado Final',
  `Categoria` int(11) NOT NULL COMMENT 'Cateogia a la que pertenece',
  `Status` int(2) NOT NULL COMMENT 'EStado del registro',
  `Created_at` datetime NOT NULL COMMENT 'Fecha registro',
  `Created_by` int(11) NOT NULL COMMENT 'Creado Por',
  `Updated_at` datetime DEFAULT NULL COMMENT 'Cuando actualiza',
  `Updated_by` int(11) DEFAULT NULL COMMENT 'Quien actualiza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`Id`, `Posicion`, `NumeroPiloto`, `NombrePiloto`, `v1`, `v2`, `v3`, `v4`, `v5`, `v6`, `v7`, `v8`, `v9`, `v10`, `v11`, `v12`, `Total`, `Categoria`, `Status`, `Created_at`, `Created_by`, `Updated_at`, `Updated_by`) VALUES
(1, 1, 24, 'SAMUEL PERANQUIVE', 31, 32, 26, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 114, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(2, 2, 2, 'THIAGO ESLAVA', 37, 35, 22, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(3, 3, 7, 'IAN PABLO CORREA', 22, 29, 19, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 90, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(4, 4, 4, 'ANDRES MARTINEZ', 29, 23, 17, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 84, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(5, 5, 13, 'LUIS SANCHEZ', NULL, 25, 23, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 72, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(6, 6, 50, 'JUAN CASALLAS', NULL, NULL, 13, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(7, 7, 14, 'DOMENIC VERA', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL),
(8, 8, 27, 'MATHIAS CONTECHA', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1, 1, '2020-02-07 15:27:45', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL COMMENT 'Id',
  `Nombre` varchar(90) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre',
  `Cedula` bigint(20) NOT NULL COMMENT 'Cedula',
  `Telefono` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono',
  `Direccion` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion',
  `Email` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email',
  `Perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Perfil',
  `Usuario` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de usuario',
  `Password` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'COntraena',
  `Foto` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Foto',
  `Status` int(5) NOT NULL COMMENT 'Estado',
  `Created_at` datetime NOT NULL COMMENT 'Fecha',
  `Created_by` int(11) NOT NULL COMMENT 'QUien regsitra',
  `Updated_at` datetime DEFAULT NULL COMMENT 'fecha actuializa',
  `Updated_by` int(11) DEFAULT NULL COMMENT 'Quien actualiza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Cedula`, `Telefono`, `Direccion`, `Email`, `Perfil`, `Usuario`, `Password`, `Foto`, `Status`, `Created_at`, `Created_by`, `Updated_at`, `Updated_by`) VALUES
(5, 'Ronaldo mendivel', 1022422712, '5726542 ext 120', 'Kra 100 # 41 - 35', 'cr@gmail.com', '1', 'ronaldo', '202cb962ac59075b964b07152d234b70', 'public/usuarios/5/perfilact.png', 1, '2019-07-30 10:43:35', 0, '2020-01-16 11:34:57', 0),
(6, 'Cristian Mendivelso', 1022422720, '5726542 ext 166', 'Kra 100 # 41-50', 'cr7@gmail.com', '2', 'cc', 'd41d8cd98f00b204e9800998ecf8427e', 'public/usuarios/6/perfil2.png', 1, '2019-07-31 15:45:57', 0, NULL, NULL),
(7, 'Carlos Gomez', 1022422730, '5726542 ext 166', 'Kra 100 # 41-50', 'cr7@gmail.com', '2', 'carlos', 'd41d8cd98f00b204e9800998ecf8427e', 'public/usuarios/7/perfil2.png', 1, '2019-07-31 16:04:08', 0, NULL, NULL),
(8, 'maria ma', 4255742, '5726986', 'kra 7', 'cr@gmail.com', '2', 'maria', '202cb962ac59075b964b07152d234b70', 'public/usuarios/8/foto.png', 1, '2020-01-16 11:43:17', 0, '2020-01-16 11:45:51', 0),
(9, 'test', 10223448967, '5234123412', 'test', 'cr@gmail.com', '2', 'test', 'd41d8cd98f00b204e9800998ecf8427e', 'public/usuarios/9/karting.png', 1, '2020-02-09 16:23:04', 0, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `galeriaprincipal`
--
ALTER TABLE `galeriaprincipal`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_status` (`Status`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`Id`,`NumeroPiloto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificar del registro', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `galeriaprincipal`
--
ALTER TABLE `galeriaprincipal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`Status`) REFERENCES `estados` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
