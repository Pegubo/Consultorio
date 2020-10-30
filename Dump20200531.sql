-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: myclinic
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dentista`
--

DROP TABLE IF EXISTS `dentista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dentista` (
  `id_Dentista` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Contraseña` varchar(45) DEFAULT NULL,
  `Activo` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_Dentista`),
  UNIQUE KEY `id_Dentista_UNIQUE` (`id_Dentista`),
  UNIQUE KEY `Correo_UNIQUE` (`Correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dentista`
--

LOCK TABLES `dentista` WRITE;
/*!40000 ALTER TABLE `dentista` DISABLE KEYS */;
INSERT INTO `dentista` VALUES (1,'Pedro Guzman Bojorquez','prueba@gmail.com','contraseña',1),(2,'Abudemio McGregor Tercero','registro@gmail.com','contrase►4a',1),(3,'Nicanor Martines 3000','xxnicanorxx@gmail.com','nicagod',1);
/*!40000 ALTER TABLE `dentista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio` (
  `idDomicilio` int NOT NULL AUTO_INCREMENT,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDomicilio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
INSERT INTO `domicilio` VALUES (1,'Guerrero Negro','Baja California Sur','Mexico'),(2,'Ensenada','Baja California','Mexico');
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `dentista_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `F_Dentista_id_idx` (`dentista_id`),
  CONSTRAINT `F_Dentista_id` FOREIGN KEY (`dentista_id`) REFERENCES `dentista` (`id_Dentista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expediente`
--

DROP TABLE IF EXISTS `expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expediente` (
  `id_Expediente` int NOT NULL AUTO_INCREMENT,
  `Paciente_id_Paciente` int NOT NULL,
  `Tratamiento_medico` varchar(45) DEFAULT NULL,
  `Tipo_tratamiento` varchar(45) DEFAULT NULL,
  `Medicamentos` varchar(45) DEFAULT NULL,
  `Motivo_Tratamiento` varchar(45) DEFAULT NULL,
  `Enfermedades` varchar(45) DEFAULT NULL,
  `Higiene_bucal` varchar(45) DEFAULT NULL,
  `Alergias` varchar(45) DEFAULT NULL,
  `Alimentacion` varchar(45) DEFAULT NULL,
  `Color_dientes` varchar(45) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `inicio_tratamiento` date DEFAULT NULL,
  PRIMARY KEY (`id_Expediente`),
  KEY `id_paciente_idx` (`Paciente_id_Paciente`),
  CONSTRAINT `id_paciente` FOREIGN KEY (`Paciente_id_Paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente`
--

LOCK TABLES `expediente` WRITE;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
INSERT INTO `expediente` VALUES (1,1,'No','','','Ninguna','Ninguna','Buena','Ninguna','Buena','Blancos','2020-05-30','2020-05-30');
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos clinicas`
--

DROP TABLE IF EXISTS `fotos clinicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos clinicas` (
  `id_Fotos` int NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `id_pacientes` int DEFAULT NULL,
  PRIMARY KEY (`id_Fotos`),
  KEY `F_ID_paciente_idx` (`id_pacientes`),
  CONSTRAINT `F_ID_paciente` FOREIGN KEY (`id_pacientes`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos clinicas`
--

LOCK TABLES `fotos clinicas` WRITE;
/*!40000 ALTER TABLE `fotos clinicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos clinicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial` (
  `Cita_id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `Tratamiento` varchar(100) DEFAULT NULL,
  `costo` int DEFAULT NULL,
  `cuenta` int DEFAULT NULL,
  `saldo` int DEFAULT NULL,
  `Paciente_id` int DEFAULT NULL,
  PRIMARY KEY (`Cita_id`),
  KEY `F_PACIENTE_ID_idx` (`Paciente_id`),
  CONSTRAINT `F_PACIENTE_ID` FOREIGN KEY (`Paciente_id`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id_paciente` int NOT NULL AUTO_INCREMENT,
  `Doctor_id` int DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `ApellidoP` varchar(60) DEFAULT NULL,
  `ApellidoM` varchar(60) DEFAULT NULL,
  `Sexo` int DEFAULT NULL,
  `id_domicilio` int DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `Ocupacion` varchar(25) DEFAULT NULL,
  `Edad` int DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `Doctor_Foreign_Key_idx` (`Doctor_id`),
  KEY `Domicilio_Foreign_Key_idx` (`id_domicilio`),
  CONSTRAINT `Doctor_Foreign_Key` FOREIGN KEY (`Doctor_id`) REFERENCES `dentista` (`id_Dentista`),
  CONSTRAINT `Domicilio_Foreign_Key` FOREIGN KEY (`id_domicilio`) REFERENCES `domicilio` (`idDomicilio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,1,'Pedro','Araujo','Esa',1,1,'6161084069','Estudiante',21);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-31 19:27:22
