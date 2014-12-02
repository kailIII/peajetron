-- MySQL dump 10.15  Distrib 10.0.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: peajetron
-- ------------------------------------------------------
-- Server version	10.0.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditor`
--

DROP TABLE IF EXISTS `auditor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditor` (
  `id_auditor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_auditor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditor`
--

LOCK TABLES `auditor` WRITE;
/*!40000 ALTER TABLE `auditor` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'I','Automóviles, camperos y camionetas'),(2,'II','Buses'),(3,'III','Camiones pequeños de 2 eje'),(6,'IV','Camiones grandes de 2 ejes'),(7,'V','Camiones de 3 y 4 ejes'),(8,'VI','Camiones de 5 ejes'),(9,'VII','Camiones de 6 ejes o más');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobro`
--

DROP TABLE IF EXISTS `cobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobro` (
  `id_cobro` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(11) NOT NULL,
  `id_usuario_propietario` int(11) NOT NULL,
  `id_usuario_registra` int(11) NOT NULL,
  `id_peaje` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_cobro`),
  KEY `id_vehiculo` (`id_vehiculo`),
  KEY `id_usuario_propietario` (`id_usuario_propietario`),
  KEY `id_usuario_registra` (`id_usuario_registra`),
  KEY `id_peaje` (`id_peaje`),
  CONSTRAINT `cobro_ibfk_4` FOREIGN KEY (`id_peaje`) REFERENCES `peaje` (`id_peaje`),
  CONSTRAINT `cobro_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  CONSTRAINT `cobro_ibfk_2` FOREIGN KEY (`id_usuario_propietario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `cobro_ibfk_3` FOREIGN KEY (`id_usuario_registra`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobro`
--

LOCK TABLES `cobro` WRITE;
/*!40000 ALTER TABLE `cobro` DISABLE KEYS */;
INSERT INTO `cobro` VALUES (17,1,3,7,2,7000,'2014-11-11 01:24:44','2014-12-02 14:32:49'),(18,1,3,7,2,7000,'2014-11-11 01:26:18','2014-12-02 14:32:49'),(19,1,3,7,3,9000,'2014-11-11 01:32:47','2014-12-02 14:32:49'),(20,1,3,7,2,7000,'2014-11-11 01:37:10','2014-12-02 14:32:49'),(21,1,3,1,1,5000,'2014-11-28 19:56:53','2014-12-02 14:32:49');
/*!40000 ALTER TABLE `cobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `codigofactura` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCorte` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaPagado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valor` int(11) NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigofactura`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_vehiculo` (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'2014-10-12 05:00:00','2014-05-12 05:00:00',20000,5,10),(2,'2014-10-12 05:00:00','2014-04-12 05:00:00',15000,7,10),(3,'2014-10-12 05:00:00','2014-12-02 14:35:16',30000,6,10),(4,'2014-10-12 05:00:00','2014-12-02 14:35:16',25000,5,10);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historialvehiculo`
--

DROP TABLE IF EXISTS `historialvehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historialvehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `idPeaje` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historialvehiculo`
--

LOCK TABLES `historialvehiculo` WRITE;
/*!40000 ALTER TABLE `historialvehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `historialvehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_padre` int(11) DEFAULT NULL,
  `menu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_menu_padre` (`id_menu_padre`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_menu_padre`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,NULL,'Inicio','a','inicio.png',1),(2,NULL,'Crear','a','crear.png',2),(3,NULL,'Administrar','a','administrar.png',3),(4,NULL,'Consultar','a','consultar.png',4),(5,NULL,'Auditor','a','auditor.png',5),(6,1,'Mi perfil','index.php/usuario/index','perfil.png',1),(7,1,'Mis vehículos','index.php/vehiculo','vehiculos.png',2),(8,4,'Mis PQRS','index.php/pqr/gestorpqr/obtenerQueja','pqrs.png',3),(9,2,'Propietario','index.php/usuario/crear','perfil.png',1),(10,2,'Vehículo','index.php/vehiculo/crear','vehiculo.png',2),(11,2,'Cruze','index.php/cobro','cruze.png',3),(12,3,'Usuarios','index.php/usuario/listar','perfil.png',1),(13,3,'Vehículos','index.php/vehiculo/listar','vehiculos.png',2),(14,3,'Pagos','index.php/cobro/listar','pagos.png',3),(15,3,'Panel de Control','b','panel.png',4),(16,4,'Facturas','a','factura.png',2),(17,4,'PQRS','index.php/pqr/gestorpqr/obtenerQuejaInv','pqrs.png',3),(18,4,'Vehículo','index.php/vehiculo/index','vehiculo.png',1),(19,15,'Categorias','index.php/categoria','categorias.png',0),(20,15,'Menu','index.php/menus','menus.png',1),(21,15,'Peajes','index.php/peaje','peajes.png',2),(22,15,'Perfiles','index.php/perfil','perfiles.png',3),(23,15,'Permisos','index.php/permisos/index','permisos.png',4),(24,15,'Rutas','index.php/ruta','rutas.png',5),(25,15,'Tarifas','gg','tarifas.png',6),(26,15,'Tipo Documento','index.php/documento','documentos.png',7),(27,15,'Ubicaciones','index.php/ubicacion','ubicaciones.png',8),(28,15,'Estados Vehiculo','index.php/estado','estados.png',9),(29,NULL,'Consultas Web','a','inicio.png',1),(30,29,'Historial de peajes cruzados','index.php/consultasWeb/historialPeajes','',1),(31,29,'Historial de peajes cruzados por fecha','index.php/consultasWeb/historialPeajesFecha','',2),(32,29,'Historial de pagos','index.php/consultasWeb/historialPagos','',3),(33,29,'Último peaje cruzado','index.php/consultasWeb/ultimoPeaje','',4),(34,29,'Valor último mes','/index.php/consultasWeb/valorUltimoMes','',5),(35,4,'Historial Vehiculo','index.php/mapas','historialmapa.png',9),(37,2,'Registrar PQR','index.php/pqr/gestorpqr/registrarDatos','',10);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peaje`
--

DROP TABLE IF EXISTS `peaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peaje` (
  `id_peaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(11) NOT NULL,
  `peaje` varchar(255) NOT NULL,
  `latitud` decimal(10,0) NOT NULL,
  `longitud` decimal(10,0) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_peaje`),
  KEY `id_ruta` (`id_ruta`),
  CONSTRAINT `peaje_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peaje`
--

LOCK TABLES `peaje` WRITE;
/*!40000 ALTER TABLE `peaje` DISABLE KEYS */;
INSERT INTO `peaje` VALUES (1,1,'Andes',5,-74,NULL),(2,1,'Chinauta',4,-75,NULL),(3,1,'Chusacá',5,-74,NULL);
/*!40000 ALTER TABLE `peaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) DEFAULT NULL,
  `controlador` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador',NULL),(2,'Operario','cobro'),(3,'Propietario',NULL),(4,'Policia','');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_menu`
--

DROP TABLE IF EXISTS `perfil_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_menu` (
  `id_perfil` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  KEY `id_perfil` (`id_perfil`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `perfil_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  CONSTRAINT `perfil_menu_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_menu`
--

LOCK TABLES `perfil_menu` WRITE;
/*!40000 ALTER TABLE `perfil_menu` DISABLE KEYS */;
INSERT INTO `perfil_menu` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,37);
/*!40000 ALTER TABLE `perfil_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqr`
--

DROP TABLE IF EXISTS `pqr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqr` (
  `id_pqr` int(11) NOT NULL AUTO_INCREMENT,
  `id_pqr_tipo` int(11) NOT NULL,
  `id_pqr_estado` int(11) NOT NULL,
  `id_usuario_radica` int(11) NOT NULL,
  `id_usuario_responde` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_respuesta` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_pqr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqr`
--

LOCK TABLES `pqr` WRITE;
/*!40000 ALTER TABLE `pqr` DISABLE KEYS */;
/*!40000 ALTER TABLE `pqr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqr_estado`
--

DROP TABLE IF EXISTS `pqr_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqr_estado` (
  `id_pqr_estado` int(11) NOT NULL AUTO_INCREMENT,
  `pqr_estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pqr_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqr_estado`
--

LOCK TABLES `pqr_estado` WRITE;
/*!40000 ALTER TABLE `pqr_estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `pqr_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqr_tipo`
--

DROP TABLE IF EXISTS `pqr_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqr_tipo` (
  `id_pqr_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `pqr_tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pqr_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqr_tipo`
--

LOCK TABLES `pqr_tipo` WRITE;
/*!40000 ALTER TABLE `pqr_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `pqr_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pqrs`
--

DROP TABLE IF EXISTS `pqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pqrs` (
  `identificador` varchar(20) NOT NULL,
  `usuarioingresa` varchar(10) DEFAULT NULL,
  `usuarioresponde` varchar(10) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechalectura` date DEFAULT NULL,
  `fecharespuesta` date DEFAULT NULL,
  `tiposolicitud` varchar(10) DEFAULT NULL,
  `tematerminado` bit(1) DEFAULT NULL,
  `ciudadsolicitud` varchar(30) DEFAULT NULL,
  `mensajepeticion` varchar(100) DEFAULT NULL,
  `mensajerespuesta` varchar(100) DEFAULT NULL,
  `usuarioencargado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`identificador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pqrs`
--

LOCK TABLES `pqrs` WRITE;
/*!40000 ALTER TABLE `pqrs` DISABLE KEYS */;
INSERT INTO `pqrs` VALUES ('1231231231231','11','116','2014-11-10','2014-11-10','2014-11-10','queja','','bogota','Mensaje de prueba de queja para code igniter en la aplicación de integración','Mensaje de respuesta a la primera queja de code igniter','116'),('1231231231232','11','116','2014-11-10','2014-11-10','1900-01-01','pregunta','\0','bogota','Pregunta para code igniter del desarrollador','','13'),('1231231231233','11','14','2014-11-10','2014-11-10','2014-11-10','solicitud','','bogota','prueba prueba rpeuab','Respuesta a la solicitud','14'),('1231231231234','11','13','2014-11-10','2014-11-10','2014-11-10','queja','','bogota','Mensaje de prueba solicitud','Mensaje de respuesta a la primera queja de code igniter','13'),('1231231231235','11','13','2014-11-10','2014-11-10','2014-11-10','queja','','bogota','Me robaron el carro ayer','De malas como la priañana mueca','13');
/*!40000 ALTER TABLE `pqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (1,'Ruta 1');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa`
--

DROP TABLE IF EXISTS `tarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifa` (
  `id_peaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `tarifa` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_peaje`),
  KEY `id_peaje` (`id_peaje`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `tarifa_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `tarifa_ibfk_1` FOREIGN KEY (`id_peaje`) REFERENCES `peaje` (`id_peaje`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa`
--

LOCK TABLES `tarifa` WRITE;
/*!40000 ALTER TABLE `tarifa` DISABLE KEYS */;
INSERT INTO `tarifa` VALUES (1,1,5000),(2,1,7000),(3,1,9000);
/*!40000 ALTER TABLE `tarifa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'Cédula de ciudadania');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_ubicacion_padre` int(11) DEFAULT NULL,
  `ubicacion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `id_ubicacion_padre` (`id_ubicacion_padre`),
  CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`id_ubicacion_padre`) REFERENCES `ubicacion` (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,NULL,'Bogotá D.C.'),(2,1,'Bogotá');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(33) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_ubicacion` (`id_ubicacion`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,2,'1234','root','a@peajetron.com','202cb962ac59075b964b07152d234b70 ','123','Cra 1 2-3',1,'2014-10-03 19:24:18','2014-10-26 23:57:57'),(2,2,1,2,'123','Operario 1','o@peajetron.com','202cb962ac59075b964b07152d234b70 ','123','Cra 1 2 3',1,'2014-10-07 02:13:23','2014-10-26 23:58:21'),(3,3,1,2,'123','Propietario 1','peajetron@peajetron.com','202cb962ac59075b964b07152d234b70 ','3115216023','Cra 1 2-3',1,'2014-10-08 03:38:16','2014-10-26 23:58:11'),(5,1,1,1,'123','prueba 1','temp2010@msn.com','a9fbe5dbdea40ebc6d6999d1a6bf2cc3 ','123','cra 123',1,'2014-11-02 14:24:11','2014-12-02 14:32:47'),(6,3,1,1,'1073168673','Cristian Chaparro','cristianchaparroa@gmail.com','202cb962ac59075b964b07152d234b70 ','3124388460','Calle #108',1,'2014-11-05 04:35:22','2014-12-02 14:32:47'),(7,2,1,1,'123456','Camilo Ospina','camilo.ospinaa@gmail.com','202cb962ac59075b964b07152d234b70 ','123123456','cll 2234',1,'2014-11-05 04:38:58','2014-12-02 14:32:47'),(8,1,1,1,'1026564980','FabianDC','fayan8@hotmail.com','202cb962ac59075b964b07152d234b70 ','3123856235','calle falsa 123',1,'2014-11-05 05:03:43','2014-12-02 14:32:47'),(9,3,1,1,'1026564988','Fayandc','fayandcm@hotmail.com','202cb962ac59075b964b07152d234b70 ','3123890098','cra falsa 321',1,'2014-11-05 05:08:10','2014-12-02 14:32:47'),(10,3,1,1,'1014239597','cesar Hernandez','ceimox19@gmail.co','202cb962ac59075b964b07152d234b70 ','3115216022','av cra 91 n131',1,'2014-11-05 09:35:03','2014-12-02 14:32:47'),(11,3,1,1,'92120968922','Diego Sierra Proper','sierralean38@hotmail.com','202cb962ac59075b964b07152d234b70 ','4287105','cra557 nun4 ',1,'2014-11-10 22:56:27','2014-11-10 22:56:27'),(12,4,1,1,'95586623','José David Moreno','josdavidmo@gmail.com','202cb962ac59075b964b07152d234b70 ','4285659','sdfsdfsdfsdfsd',1,'2014-11-10 23:39:26','2014-11-10 23:39:26'),(13,1,1,1,'1018456105','Diego Sierra Sistemas','sierralean38@yahoo.com','202cb962ac59075b964b07152d234b70 ','42871000','sefgwefwe',1,'2014-11-10 23:42:41','2014-11-10 23:42:41'),(14,1,1,1,'456029145','Diego Sierra Gerencia','sierralean38@outlook.com','202cb962ac59075b964b07152d234b70 ','14234569','dfjkwndfuiwneui',1,'2014-11-10 23:45:56','2014-11-10 23:45:56'),(116,1,1,1,'1018456029','Diego Sierra','sierralean38@gmail.com','202cb962ac59075b964b07152d234b70 ','4287105','carrera 74 a numero 56a 39',1,'2014-11-10 22:38:42','2014-11-10 22:38:42');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioencargado`
--

DROP TABLE IF EXISTS `usuarioencargado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarioencargado` (
  `identificador` varchar(20) NOT NULL,
  `descripciondepartamento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`identificador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioencargado`
--

LOCK TABLES `usuarioencargado` WRITE;
/*!40000 ALTER TABLE `usuarioencargado` DISABLE KEYS */;
INSERT INTO `usuarioencargado` VALUES ('116','ingreso'),('13','SISTEMAS'),('14','GERENCIA');
/*!40000 ALTER TABLE `usuarioencargado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_estado_vehiculo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_estado_vehiculo` (`id_estado_vehiculo`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`id_estado_vehiculo`) REFERENCES `vehiculo_estado` (`id_vehiculo_estado`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,3,3,1,'AAA111','Marca ','Color',0,'2014-10-08 03:40:52','2014-12-02 14:32:48'),(2,2,1,1,'AAA112','a','a',0,'2014-11-02 17:24:01','2014-12-02 14:32:48'),(3,5,1,1,'AAA113',NULL,NULL,NULL,'2014-11-02 17:27:36','2014-12-02 14:32:48'),(4,9,1,1,'BZZ561','Reanult','gris pluton',2008,'2014-11-05 05:21:30','2014-12-02 14:32:48'),(5,10,1,1,'ABC123','BMW','negro',2011,'2014-11-05 09:36:33','2014-12-02 14:32:48'),(6,10,1,1,'XXY234','BMW','blanco',1992,'2014-11-05 11:20:21','2014-12-02 14:32:48'),(7,10,1,1,'PAR232','AUDI','negro',1999,'2014-11-05 11:21:29','2014-12-02 14:32:48'),(8,6,1,1,'RSQ912','AUDI','GRIS',2014,'2014-11-10 08:31:18','2014-12-02 14:32:48'),(9,6,1,1,'TML456','MASERATI','BLANCO',2014,'2014-11-10 08:35:43','2014-12-02 14:32:48');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo_estado`
--

DROP TABLE IF EXISTS `vehiculo_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo_estado` (
  `id_vehiculo_estado` int(11) NOT NULL,
  `vehiculo_estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vehiculo_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo_estado`
--

LOCK TABLES `vehiculo_estado` WRITE;
/*!40000 ALTER TABLE `vehiculo_estado` DISABLE KEYS */;
INSERT INTO `vehiculo_estado` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Robado'),(4,'Chatarrizado');
/*!40000 ALTER TABLE `vehiculo_estado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-02  9:49:04
