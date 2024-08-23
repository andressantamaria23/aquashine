-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: aquaShine
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(45) NOT NULL,
  `FK_producto` int(11) NOT NULL,
  `FK_venta` int(11) NOT NULL,
  `Fk_proveedores` int(11) NOT NULL,
  PRIMARY KEY (`idInventario`),
  KEY `FK_producto` (`FK_producto`),
  KEY `FK_venta` (`FK_venta`),
  KEY `Fk_proveedores` (`Fk_proveedores`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`FK_producto`) REFERENCES `productos` (`idProductos`),
  CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`FK_venta`) REFERENCES `ventas` (`idVentas`),
  CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`Fk_proveedores`) REFERENCES `proveedores` (`idProveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_prod_idcat` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `FK_proveedores` int(11) NOT NULL,
  `nom_producto` varchar(45) NOT NULL,
  `prod_descrip` varchar(45) NOT NULL,
  `img_producto` blob NOT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `FK_proveedores` (`FK_proveedores`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`FK_proveedores`) REFERENCES `proveedores` (`idProveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `idProveedores` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  PRIMARY KEY (`idProveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Admin','Administrador del sistema'),(2,'User','Usuario estándar'),(3,'Servicio',''),(4,'Vendedor','');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `idServicios` int(11) NOT NULL AUTO_INCREMENT,
  `nom_servicio` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `FK_vehiculo` int(11) NOT NULL,
  `tipo_servicio` varchar(45) NOT NULL,
  `estado_servicio` varchar(45) NOT NULL,
  `fecha_servicio` varchar(45) NOT NULL,
  `tiempo_servicio` blob NOT NULL,
  PRIMARY KEY (`idServicios`),
  KEY `FK_vehiculo` (`FK_vehiculo`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`FK_vehiculo`) REFERENCES `vehiculo` (`idVehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usuario` varchar(45) NOT NULL,
  `apel_usuario` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `FK_rol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_rol` (`FK_rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FK_rol`) REFERENCES `rol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Juan','Perez','1980-01-01','juan.perez@example.com','password123',1),(2,'Maria','Gomez','1990-02-02','maria.gomez@example.com','password456',2),(4,'andres','santamaria','2024-07-29','felipe@gmail.com','123456',1),(5,'andres','santamaria','2024-07-29','juandi.474loaiza@gmail.com','1234',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` int(11) NOT NULL,
  `tipo_vehiculo` varchar(45) NOT NULL,
  `color_vehiculo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `FK_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idVehiculo`),
  KEY `FK_usuario` (`FK_usuario`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`FK_usuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,123456,'Carro','Rojo','Toyota',1),(2,789012,'Moto','Negro','Honda',2);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `total_venta` int(11) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL,
  `FK_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idVentas`),
  KEY `FK_usuario` (`FK_usuario`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`FK_usuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_productos`
--

DROP TABLE IF EXISTS `ventas_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_productos` (
  `FK_ventas` int(11) NOT NULL,
  `FK_productos` int(11) NOT NULL,
  PRIMARY KEY (`FK_ventas`,`FK_productos`),
  KEY `FK_productos` (`FK_productos`),
  CONSTRAINT `ventas_productos_ibfk_1` FOREIGN KEY (`FK_ventas`) REFERENCES `ventas` (`idVentas`),
  CONSTRAINT `ventas_productos_ibfk_2` FOREIGN KEY (`FK_productos`) REFERENCES `productos` (`idProductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_productos`
--

LOCK TABLES `ventas_productos` WRITE;
/*!40000 ALTER TABLE `ventas_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_servicios`
--

DROP TABLE IF EXISTS `ventas_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas_servicios` (
  `FK_ventas` int(11) NOT NULL,
  `FK_servicios` int(11) NOT NULL,
  PRIMARY KEY (`FK_ventas`,`FK_servicios`),
  KEY `FK_servicios` (`FK_servicios`),
  CONSTRAINT `ventas_servicios_ibfk_1` FOREIGN KEY (`FK_ventas`) REFERENCES `ventas` (`idVentas`),
  CONSTRAINT `ventas_servicios_ibfk_2` FOREIGN KEY (`FK_servicios`) REFERENCES `servicios` (`idServicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_servicios`
--

LOCK TABLES `ventas_servicios` WRITE;
/*!40000 ALTER TABLE `ventas_servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_servicios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-12 19:01:05
