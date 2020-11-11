/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.10-MariaDB : Database - vortex
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `contactos` */

DROP TABLE IF EXISTS `contactos`;

CREATE TABLE `contactos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `Nombre` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `Status` int(2) NOT NULL,
  `Created_at` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `contactos` */

insert  into `contactos`(`Id`,`Nombre`,`Telefono`,`Email`,`Mensaje`,`Status`,`Created_at`) values 
(1,'Cristian test','5726542','cr1@gmail.com','loremp',1,'2020-01-31 11:56:41');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro',
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del estado',
  `Status` int(1) NOT NULL COMMENT 'activo o desactivo',
  `Tipo` int(10) NOT NULL COMMENT 'Tipo de estado',
  `Created_date` datetime NOT NULL COMMENT 'Fecha de registro',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `estados` */

insert  into `estados`(`Id`,`Nombre`,`Status`,`Tipo`,`Created_date`) values 
(1,'Registrado',1,0,'2018-06-28 15:31:51'),
(2,'Asignado',1,0,'2019-06-18 14:20:16'),
(3,'Cargado',1,0,'2019-06-18 14:20:18'),
(4,'Inactivo',1,0,'0000-00-00 00:00:00'),
(5,'se envia Email',1,2,'2019-07-04 10:18:19'),
(7,'Se realiza llamada a su celular',1,1,'2019-07-04 10:08:31');

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificar del registro',
  `Titulo` varchar(45) NOT NULL COMMENT 'titulo del servicio',
  `Descripcion` varchar(900) NOT NULL COMMENT 'Descripcion del servicio',
  `Enlace` varchar(60) DEFAULT NULL COMMENT 'Tiene enlace en internet',
  `Imagen_principal` varchar(300) NOT NULL COMMENT 'Imagen principal del servicio',
  `Fecha` date NOT NULL COMMENT 'Fecha creacion del evento',
  `Status` int(1) NOT NULL COMMENT 'Estado del registro',
  `Created_by` varchar(45) NOT NULL COMMENT 'Usuario que crea el registro',
  `Created_date` date NOT NULL COMMENT 'Fecha creacion del registro',
  `Updated_by` varchar(45) DEFAULT NULL COMMENT 'Usuario que actualiza el registro',
  `Updated_date` date DEFAULT NULL COMMENT 'Fecha de actualizacion del registro',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `eventos` */

insert  into `eventos`(`Id`,`Titulo`,`Descripcion`,`Enlace`,`Imagen_principal`,`Fecha`,`Status`,`Created_by`,`Created_date`,`Updated_by`,`Updated_date`) values 
(16,'Noche de velitas 07 DIC','Se llevara acabo una gran fiestas para todas las familias de los arquitectos que asistan este 7 de diciembre coordial emnte invitados todos.','','public/eventos/16/download.jpg','2018-12-07',1,'1','2018-12-04',NULL,NULL),
(17,'Navidad 2018','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','','public/eventos/17/navidad.jpg','2018-12-24',1,'1','2018-12-05',NULL,NULL),
(18,'Junta de Arquitectos 2018','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','','public/eventos/18/junta.jpg','2018-12-20',1,'1','2018-12-05',NULL,NULL),
(20,'test','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','','public/eventos/20/fot5.png','2020-01-30',1,'5','2020-02-07',NULL,NULL),
(21,'FERIA DE MOTORES VORTEX','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum','','public/eventos/21/4.jpg','2020-02-04',1,'5','2020-02-04',NULL,NULL);

/*Table structure for table `galeriaprincipal` */

DROP TABLE IF EXISTS `galeriaprincipal`;

CREATE TABLE `galeriaprincipal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Url` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `Posicion` int(11) NOT NULL,
  `Status` int(4) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Created_by` int(11) NOT NULL,
  `Updated_at` datetime DEFAULT NULL,
  `Updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `galeriaprincipal` */

insert  into `galeriaprincipal`(`Id`,`Nombre`,`Url`,`Posicion`,`Status`,`Created_at`,`Created_by`,`Updated_at`,`Updated_by`) values 
(5,'Cristian test','public/galeria/5/foto1.png',1,1,'2020-01-20 10:08:13',5,NULL,NULL),
(6,'testttttt','public/galeria/6/foto1.png',1,1,'2020-01-20 10:10:07',5,NULL,NULL),
(7,'test55','public/galeria/7/foto2.png',2,1,'2020-01-20 10:17:54',5,NULL,NULL),
(8,'test444','public/galeria/8/foto1.png',1,1,'2020-01-20 10:23:20',5,NULL,NULL),
(9,'test444','public/galeria/9/foto1.png',1,1,'2020-01-20 10:26:06',5,NULL,NULL),
(10,'test444','public/galeria/10/foto1.png',1,1,'2020-01-22 11:59:14',5,NULL,NULL),
(11,'test','test1111111111111111111111111111',1,1,'2020-01-22 12:43:13',5,NULL,NULL),
(12,'Mario Karts','<iframe width=\"100%\" height=\"700\" src=\"https://www.youtube.com/embed/MytfhzcSF-Y\" framebor',1,0,'2020-01-22 14:39:25',5,NULL,NULL);

/*Table structure for table `inscripciones` */

DROP TABLE IF EXISTS `inscripciones`;

CREATE TABLE `inscripciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
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
  `Updated_at` datetime DEFAULT NULL COMMENT 'Fecha que actualiza',
  PRIMARY KEY (`Id`),
  KEY `fk_status` (`Status`),
  CONSTRAINT `fk_status` FOREIGN KEY (`Status`) REFERENCES `estados` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `inscripciones` */

insert  into `inscripciones`(`Id`,`Nombre`,`Email`,`FechaNacimiento`,`Edad`,`TipoDoc`,`Documento`,`TipoSangre`,`Equipo`,`Club`,`Status`,`Created_at`,`Updated_by`,`Updated_at`) values 
(1,'Cristian Mendivelso','cr@gmail.com','0000-00-00',20,'CC',1022422710,'postivo','EQuipo','dfsdfsdfsdf',1,'2020-02-03 12:30:31',NULL,NULL);

/*Table structure for table `resultados` */

DROP TABLE IF EXISTS `resultados`;

CREATE TABLE `resultados` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del registro',
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
  `Updated_by` int(11) DEFAULT NULL COMMENT 'Quien actualiza',
  PRIMARY KEY (`Id`,`NumeroPiloto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `resultados` */

insert  into `resultados`(`Id`,`Posicion`,`NumeroPiloto`,`NombrePiloto`,`v1`,`v2`,`v3`,`v4`,`v5`,`v6`,`v7`,`v8`,`v9`,`v10`,`v11`,`v12`,`Total`,`Categoria`,`Status`,`Created_at`,`Created_by`,`Updated_at`,`Updated_by`) values 
(1,1,24,'SAMUEL PERANQUIVE',31,32,26,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,114,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(2,2,2,'THIAGO ESLAVA',37,35,22,16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,110,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(3,3,7,'IAN PABLO CORREA',22,29,19,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,90,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(4,4,4,'ANDRES MARTINEZ',29,23,17,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,84,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(5,5,13,'LUIS SANCHEZ',NULL,25,23,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,72,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(6,6,50,'JUAN CASALLAS',NULL,NULL,13,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(7,7,14,'DOMENIC VERA',20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,1,1,'2020-02-07 15:27:45',5,NULL,NULL),
(8,8,27,'MATHIAS CONTECHA',13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,1,1,'2020-02-07 15:27:45',5,NULL,NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
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
  `Updated_by` int(11) DEFAULT NULL COMMENT 'Quien actualiza',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`Id`,`Nombre`,`Cedula`,`Telefono`,`Direccion`,`Email`,`Perfil`,`Usuario`,`Password`,`Foto`,`Status`,`Created_at`,`Created_by`,`Updated_at`,`Updated_by`) values 
(5,'Ronaldo mendivel',1022422712,'5726542 ext 120','Kra 100 # 41 - 35','cr@gmail.com','1','ronaldo','202cb962ac59075b964b07152d234b70','public/usuarios/5/perfilact.png',1,'2019-07-30 10:43:35',0,'2020-01-16 11:34:57',0),
(6,'Cristian Mendivelso',1022422720,'5726542 ext 166','Kra 100 # 41-50','cr7@gmail.com','2','cc','d41d8cd98f00b204e9800998ecf8427e','public/usuarios/6/perfil2.png',1,'2019-07-31 15:45:57',0,NULL,NULL),
(7,'Carlos Gomez',1022422730,'5726542 ext 166','Kra 100 # 41-50','cr7@gmail.com','2','carlos','d41d8cd98f00b204e9800998ecf8427e','public/usuarios/7/perfil2.png',1,'2019-07-31 16:04:08',0,NULL,NULL),
(8,'maria ma',4255742,'5726986','kra 7','cr@gmail.com','2','maria','202cb962ac59075b964b07152d234b70','public/usuarios/8/foto.png',1,'2020-01-16 11:43:17',0,'2020-01-16 11:45:51',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
