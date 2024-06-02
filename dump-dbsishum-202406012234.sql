-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsishum
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Cod_administrador` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Usuario` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Administrador_usuario_FK` (`Id_Usuario`),
  CONSTRAINT `Administrador_usuario_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anio_lectivo`
--

DROP TABLE IF EXISTS `anio_lectivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anio_lectivo` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `anio` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anio_lectivo`
--

LOCK TABLES `anio_lectivo` WRITE;
/*!40000 ALTER TABLE `anio_lectivo` DISABLE KEYS */;
INSERT INTO `anio_lectivo` VALUES (1,2023),(2,2024);
/*!40000 ALTER TABLE `anio_lectivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'Matemáticas'),(2,'Ciencias Naturales'),(3,'Historia'),(4,'Geografía'),(5,'Arte'),(6,'Música'),(7,'Educación Física'),(8,'Inglés'),(9,'Ciudadanía'),(10,'Tecnología'),(11,'Informática'),(12,'Literatura'),(13,'Filosofía'),(14,'Psicología'),(15,'Sociología'),(16,'Biología'),(17,'Química'),(18,'Física'),(19,'Astronomía'),(20,'Geología');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_personales`
--

DROP TABLE IF EXISTS `datos_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_personales` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Telefono` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_sexo` int NOT NULL,
  `Id_Usuario` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `datos_personales_usuario_FK` (`Id_Usuario`),
  KEY `datos_personales_sexo_FK` (`Id_sexo`),
  CONSTRAINT `datos_personales_sexo_FK` FOREIGN KEY (`Id_sexo`) REFERENCES `sexo` (`Id`),
  CONSTRAINT `datos_personales_usuario_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_personales`
--

LOCK TABLES `datos_personales` WRITE;
/*!40000 ALTER TABLE `datos_personales` DISABLE KEYS */;
INSERT INTO `datos_personales` VALUES (1,'Juan','Perez','22222222','por mi casa',1,2),(2,'pedro pedro','pedrito','22222','2222',1,3),(3,'pedro pancho','mocho','22222','2222',1,4),(4,'pedrito panchito','mochito','22222','2222',1,5),(5,'pedrito2 panchito2','mochito2','22222','2222',1,6),(6,'estu 4','4','22222','2222',2,7),(7,'profe 1','1','22222','2222',1,8),(8,'profe 2','2','22222','2222',1,9);
/*!40000 ALTER TABLE `datos_personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `IdDepartamento` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Boaco'),(2,'Carazo'),(3,'Chinandega'),(4,'Chontales'),(5,'RACCN'),(6,'RACCS'),(7,'Estelí'),(8,'Granada'),(9,'Jinotega'),(10,'León'),(11,'Madriz'),(12,'Managua'),(13,'Masaya'),(14,'Matagalpa'),(15,'Nueva Segovia'),(16,'Río San Juan'),(17,'Rivas');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_aniolectivo_grado`
--

DROP TABLE IF EXISTS `detalle_aniolectivo_grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_aniolectivo_grado` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_anio_lectivo` int NOT NULL,
  `id_grado` int NOT NULL,
  `id_turno` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Detalle_aniolectivo_grado_grado_FK` (`id_grado`),
  KEY `Detalle_aniolectivo_grado_anio_lectivo_FK` (`Id_anio_lectivo`),
  KEY `detalle_aniolectivo_grado_turno_FK` (`id_turno`),
  CONSTRAINT `Detalle_aniolectivo_grado_anio_lectivo_FK` FOREIGN KEY (`Id_anio_lectivo`) REFERENCES `anio_lectivo` (`Id`),
  CONSTRAINT `Detalle_aniolectivo_grado_grado_FK` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`Id`),
  CONSTRAINT `detalle_aniolectivo_grado_turno_FK` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_aniolectivo_grado`
--

LOCK TABLES `detalle_aniolectivo_grado` WRITE;
/*!40000 ALTER TABLE `detalle_aniolectivo_grado` DISABLE KEYS */;
INSERT INTO `detalle_aniolectivo_grado` VALUES (1,1,1,1),(2,1,1,2);
/*!40000 ALTER TABLE `detalle_aniolectivo_grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_grado_asignaturas`
--

DROP TABLE IF EXISTS `detalle_grado_asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_grado_asignaturas` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_detalle_aniolectivo_grado` int NOT NULL,
  `Id_asignatura` int NOT NULL,
  `Id_docente` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `detalle_grado_asignaturas_docente_FK` (`Id_docente`),
  KEY `detalle_grado_asignaturas_asignatura_FK` (`Id_asignatura`),
  KEY `detalle_grado_asignaturas_detalle_aniolectivo_grado_FK` (`Id_detalle_aniolectivo_grado`),
  CONSTRAINT `detalle_grado_asignaturas_asignatura_FK` FOREIGN KEY (`Id_asignatura`) REFERENCES `asignatura` (`Id`),
  CONSTRAINT `detalle_grado_asignaturas_detalle_aniolectivo_grado_FK` FOREIGN KEY (`Id_detalle_aniolectivo_grado`) REFERENCES `detalle_aniolectivo_grado` (`Id`),
  CONSTRAINT `detalle_grado_asignaturas_docente_FK` FOREIGN KEY (`Id_docente`) REFERENCES `docente` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_grado_asignaturas`
--

LOCK TABLES `detalle_grado_asignaturas` WRITE;
/*!40000 ALTER TABLE `detalle_grado_asignaturas` DISABLE KEYS */;
INSERT INTO `detalle_grado_asignaturas` VALUES (1,1,1,1),(2,2,1,2);
/*!40000 ALTER TABLE `detalle_grado_asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_nota_asignatura`
--

DROP TABLE IF EXISTS `detalle_nota_asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_nota_asignatura` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `id_detalle_grado_asignatura` int NOT NULL,
  `id_matricula` int NOT NULL,
  `Nota` int DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `detalle_nota_asignatura_detalle_grado_asignaturas_FK` (`id_detalle_grado_asignatura`),
  KEY `detalle_nota_asignatura_matricula_FK` (`id_matricula`),
  CONSTRAINT `detalle_nota_asignatura_detalle_grado_asignaturas_FK` FOREIGN KEY (`id_detalle_grado_asignatura`) REFERENCES `detalle_grado_asignaturas` (`Id`),
  CONSTRAINT `detalle_nota_asignatura_matricula_FK` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_nota_asignatura`
--

LOCK TABLES `detalle_nota_asignatura` WRITE;
/*!40000 ALTER TABLE `detalle_nota_asignatura` DISABLE KEYS */;
INSERT INTO `detalle_nota_asignatura` VALUES (1,1,1,90),(2,2,2,90);
/*!40000 ALTER TABLE `detalle_nota_asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_tutor_estudiante`
--

DROP TABLE IF EXISTS `detalle_tutor_estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_tutor_estudiante` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int NOT NULL,
  `Id_Estudiante` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Detalle_Tutor_Estudiante_tutor_FK` (`Id_Tutor`),
  KEY `Detalle_Tutor_Estudiante_estudiante_FK` (`Id_Estudiante`),
  CONSTRAINT `Detalle_Tutor_Estudiante_estudiante_FK` FOREIGN KEY (`Id_Estudiante`) REFERENCES `estudiante` (`Id`),
  CONSTRAINT `Detalle_Tutor_Estudiante_tutor_FK` FOREIGN KEY (`Id_Tutor`) REFERENCES `tutor` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_tutor_estudiante`
--

LOCK TABLES `detalle_tutor_estudiante` WRITE;
/*!40000 ALTER TABLE `detalle_tutor_estudiante` DISABLE KEYS */;
INSERT INTO `detalle_tutor_estudiante` VALUES (1,1,1),(2,2,2),(3,2,3),(4,1,4);
/*!40000 ALTER TABLE `detalle_tutor_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docente` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Cod_docente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Usuario` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `docente_usuario_FK` (`Id_Usuario`),
  CONSTRAINT `docente_usuario_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (1,'191919191',8),(2,'191919191',9);
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Cod_estudiante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Usuario` int NOT NULL,
  `IdMunicipio` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Estudiante_usuario_FK` (`Id_Usuario`),
  KEY `estudiante_municipio_FK` (`IdMunicipio`),
  CONSTRAINT `estudiante_municipio_FK` FOREIGN KEY (`IdMunicipio`) REFERENCES `municipio` (`IdMunicipio`),
  CONSTRAINT `Estudiante_usuario_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,'0090091',3,3),(2,'10101010',5,3),(3,'111212222',6,3),(4,'99899889',7,3);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grado` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'1ro'),(2,'2do'),(3,'3ro'),(4,'4to'),(5,'5to');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricula` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Id_estudiante` int NOT NULL,
  `Id_tutor` int NOT NULL,
  `id_grado` int NOT NULL,
  `id_turno` int NOT NULL,
  `id_anio_lectivo` int NOT NULL,
  `Estado` int DEFAULT '1',
  PRIMARY KEY (`Id`),
  KEY `Matricula_estudiante_FK` (`Id_estudiante`),
  KEY `Matricula_tutor_FK` (`Id_tutor`),
  KEY `Matricula_grado_FK` (`id_grado`),
  KEY `Matricula_turno_FK` (`id_turno`),
  KEY `Matricula_anio_lectivo_FK` (`id_anio_lectivo`),
  CONSTRAINT `Matricula_anio_lectivo_FK` FOREIGN KEY (`id_anio_lectivo`) REFERENCES `anio_lectivo` (`Id`),
  CONSTRAINT `Matricula_estudiante_FK` FOREIGN KEY (`Id_estudiante`) REFERENCES `estudiante` (`Id`),
  CONSTRAINT `Matricula_grado_FK` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`Id`),
  CONSTRAINT `Matricula_turno_FK` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`Id`),
  CONSTRAINT `Matricula_tutor_FK` FOREIGN KEY (`Id_tutor`) REFERENCES `tutor` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` VALUES (1,1,1,1,1,1,1),(2,2,2,3,2,2,0),(3,3,2,3,2,1,1);
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `IdMunicipio` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `IdDepartamento` int NOT NULL,
  PRIMARY KEY (`IdMunicipio`),
  KEY `Municipio_Departamento_FK` (`IdDepartamento`),
  CONSTRAINT `Municipio_Departamento_FK` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Larreynaga',10),(2,'Boaco',1),(3,'Camoapa',1),(4,'San José de los Remates',1),(5,'San Lorenzo',1),(6,'Santa Lucía',1),(7,'Teustepe',1),(8,'Diriamba',2),(9,'Dolores',2),(10,'El Rosario',2),(11,'Jinotepe',2),(12,'La Conquista',2),(13,'La Paz de Oriente',2),(14,'San Marcos',2),(15,'Santa Teresa',2),(16,'Chichigalpa',3),(17,'Chinandega',3),(18,'Cinco Pinos',3),(19,'Corinto',3),(20,'El Realejo',3),(21,'El Viejo',3),(22,'Posoltega',3),(23,'Puerto Morazán',3),(24,'San Francisco del Norte',3),(25,'San Pedro del Norte',3),(26,'Santo Tomás del Norte',3),(27,'Somotillo',3),(28,'Villanueva',3),(29,'Acoyapa',4),(30,'Comalapa',4),(31,'Cuapa',4),(32,'El Coral',4),(33,'Juigalpa',4),(34,'La Libertad',4),(35,'San Pedro de Lóvago',4),(36,'Santo Domingo',4),(37,'Santo Tomás',4),(38,'Villa Sandino',4),(39,'Bonanza',5),(40,'Mulukukú',5),(41,'Prinzapolka',5),(42,'Bilwi - Puerto Cabezas',5),(43,'Rosita',5),(44,'Siuna',5),(45,'Waslala',5),(46,'Waspán',5),(47,'Bluefields',6),(48,'Corn Island',6),(49,'Desembocadura de Río Grande',6),(50,'El Ayote',6),(51,'El Rama',6),(52,'El Tortuguero',6),(53,'Kukra Hill',6),(54,'La Cruz de Río Grande',6),(55,'Laguna de Perlas',6),(56,'Muelle de los Bueyes',6),(57,'Nueva Guinea',6),(58,'Paiwas',6),(59,'Condega',7),(60,'Estelí',7),(61,'La Trinidad',7),(62,'Pueblo Nuevo',7),(63,'San Juan de Limay',7),(64,'San Nicolás',7),(65,'Diriá',8),(66,'Diriomo',8),(67,'Granada',8),(68,'Nandaime',8),(69,'El Cuá',9),(70,'Jinotega',9),(71,'La Concordia',9),(72,'San José de Bocay',9),(73,'San Rafael del Norte',9),(74,'San Sebastián de Yalí',9),(75,'Santa María de Pantasma',9),(76,'Wiwilí de Jinotega',9),(77,'Achuapa',10),(78,'El Jicaral',10),(79,'El Sauce',10),(80,'La Paz Centro',10),(81,'León',10),(82,'Nagarote',10),(83,'Quezalguaque',10),(84,'Santa Rosa del Peñón',10),(85,'Telica',10),(86,'Las Sabanas',11),(87,'Palacagüina',11),(88,'San José de Cusmapa',11),(89,'San Juan de Río Coco',11),(90,'Somoto',11),(91,'Telpaneca',11),(92,'Totogalpa',11),(93,'Yalagüina',11),(94,'Ciudad Sandino',12),(95,'El Crucero',12),(96,'Managua',12),(97,'Mateare',12),(98,'San Francisco Libre',12),(99,'Ticuantepe',12),(100,'Tipitapa',12),(101,'Villa El Carmen',12),(102,'Catarina',13),(103,'La Concepción',13),(104,'Masatepe',13),(105,'Masaya',13),(106,'Nandasmo',13),(107,'Nindirí',13),(108,'San Juan de Oriente',13),(109,'Tisma',13),(110,'Ciudad Darío',14),(111,'El Tuma - La Dalia',14),(112,'Esquipulas',14),(113,'Matagalpa',14),(114,'Matiguás',14),(115,'Muy Muy',14),(116,'Rancho Grande',14),(117,'San Dionisio',14),(118,'San Isidro',14),(119,'San Ramón',14),(120,'Sébaco',14),(121,'Terrabona',14),(122,'Ciudad Antigua',15),(123,'Dipilto',15),(124,'El Jícaro',15),(125,'Jalapa',15),(126,'Macuelizo',15),(127,'Mozonte',15),(128,'Murra',15),(129,'Ocotal',15),(130,'Quilalí',15),(131,'San Fernando',15),(132,'Santa María',15),(133,'Wiwilí de Nueva Segovia',15),(134,'El Almendro',16),(135,'El Castillo',16),(136,'San Carlos',16),(137,'San Juan del Norte',16),(138,'San Miguelito',16),(139,'Altagracia',17),(140,'Belén',17),(141,'Buenos Aires',17),(142,'Cárdenas',17),(143,'Moyogalpa',17),(144,'Potosí',17),(145,'San Jorge',17),(146,'San Juan del Sur',17),(147,'Tola',17);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexo` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'Masculino'),(2,'Femenino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Docente'),(3,'Tutor'),(4,'Alumno');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turno` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (1,'Matutino'),(2,'Vespertino');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutor` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Cedula` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Ocupacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Usuario` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Tutor_usuario_FK` (`Id_Usuario`),
  CONSTRAINT `Tutor_usuario_FK` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor`
--

LOCK TABLES `tutor` WRITE;
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` VALUES (1,'0010010001010N','lic',2),(2,'00000000000001','maistro',4);
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `usser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Tipo_Usuario` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `usuario_tipo_usuario_FK` (`Id_Tipo_Usuario`),
  CONSTRAINT `usuario_tipo_usuario_FK` FOREIGN KEY (`Id_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'sa','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',1),(2,'jun1','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',3),(3,'estu1','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',4),(4,'tutor2','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',3),(5,'estu2','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',4),(6,'estu3','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',4),(7,'est4','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',4),(8,'doce1','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',2),(9,'doce2','$2y$10$ik5JTYeN1OQlfsn8ZvajJOwFWFmYxJPlLjq/nTxBpiSMLPyNP.V0K',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dbsishum'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_asignaturas_grado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_asignaturas_grado`()
begin
	
	select 
	dga.Id,
	dga.Id_detalle_aniolectivo_grado,
	dga.Id_asignatura ,
	asg.Nombre as Asignatura_Nombre,
	dga.Id_docente,
	dp.Nombres as Docente_Nombres,
	dag.id_grado ,
	grd.Nombre as Grado_Nombre,
	dag.id_turno ,
	turn.Nombre as Turno_Nombre
	from
	detalle_grado_asignaturas as dga 
	inner join
	detalle_aniolectivo_grado  as dag on dag.Id  = dga.Id_detalle_aniolectivo_grado 
	inner join 
	asignatura as asg on asg.Id = dga.Id_asignatura 
	inner join 
	turno as turn on turn.Id = dag.id_turno 
	inner join 
	grado as grd on grd.Id = dag.id_grado 
	inner join 
	docente as doc on doc.Id = dga.Id_docente 
	inner join 
	datos_personales as dp on dp.Id_Usuario = doc.Id_Usuario 
;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Detalle_aniolectivo_grado_turno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Detalle_aniolectivo_grado_turno`()
begin
	
	select 
	dagt.Id as Id,
	dagt.id_anio_lectivo as id_anio_lectivo,
	anl.anio as id_anio_lectivo_nombre,
	dagt.id_grado as id_grado,
	gr.Nombre as id_grado_nombre,
	dagt.id_turno as id_turno,
	turn.Nombre as id_turno_nombre
	
	from
	detalle_aniolectivo_grado as dagt
	inner join
	grado as gr on gr.Id = dagt.id_grado
	inner join
	turno as turn on turn.Id = dagt.id_turno
	inner join
	anio_lectivo as anl on anl.Id = dagt.id_anio_lectivo
;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Detalle_grado_asignatura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Detalle_grado_asignatura`( grad int, turn int)
begin
	
	select 
	dga.Id as Id,
	dga.Id_detalle_aniolectivo_grado as Id_detalle_aniolectivo_grado,
	dga.Id_asignatura as Id_asignatura,
	dga.Id_docente as Id_docente,
	doc.Cod_docente as Cod_docente,
	asg.Nombre as Asignatura_nombre,
	dp.Nombres as Nombres,
	dp.Apellidos as Apellidos,
	doc.Id_Usuario as Id_Usuario, 
	dag.id_grado as id_grado,
	dag.id_turno as id_turno
	from 
	detalle_grado_asignaturas as dga
	inner join
	docente as doc on doc.Id = dga.Id_docente
	inner join 
	asignatura as asg on asg.Id = dga.Id_asignatura  
	inner join 
	datos_personales as dp on dp.Id_Usuario = doc.Id_Usuario 
	inner join
	detalle_aniolectivo_grado as dag on dag.Id = dga.Id_detalle_aniolectivo_grado 
	where dag.id_grado = grad and dag.id_turno = turn
	;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_detalle_nota_asignatura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_detalle_nota_asignatura`( idDGA int)
begin
	
	select 
	dna.Id as Id,
	dna.id_detalle_grado_asignatura ,
	dna.id_matricula,
	dna.Nota ,
	asig.Nombre as Nombre_asignatura,
	dp.Nombres as Nombres,
	mat.Id_estudiante as Id_estudiante,
	est.Id_Usuario as Id_Usuario_estudiante
	from
	detalle_nota_asignatura as dna
	inner join
	detalle_grado_asignaturas  as dga on dga.Id = dna.id_detalle_grado_asignatura 
	inner join
	asignatura as asig on asig.Id = dga.Id_asignatura
	inner join 
	matricula as mat on mat.Id = dna.id_matricula 
	inner join 
	estudiante as est on est.Id = mat.Id_estudiante 
	inner join 
	datos_personales as dp on dp.Id_Usuario = est.Id_Usuario
	where  dna.id_detalle_grado_asignatura = idDGA
	;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Docentes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Docentes`()
begin
	select 
	doc.Id,
	doc.Cod_docente,
	dp.Nombres,
	dp.Apellidos
	from docente as doc
	inner join
	datos_personales as dp on dp.Id_Usuario = doc.Id_Usuario 
	;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Estudiantes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Estudiantes`()
begin
	
select
	est.Id as Id,
	est.Cod_estudiante as Cod_estudiante,
	est.Id_Usuario as Id_Usuario,
	est.IdMunicipio as Id_Municipio,
	dp_estu.Nombres as Nombres,
	dp_estu.Apellidos as Apellidos,
	dp_estu.Id_sexo as Id_sexo,
	sex.Nombre as Id_sexo_nombre,
	mat.id_grado as Id_grado,
	grd.Nombre as Id_grado_nombre,
	dt_tutor.Id_Tutor as Id_tutor,
	dp_tutor.Nombres as Tutor_Nombres,
	dp_tutor.Apellidos as Tutor_Apellidos
		
from 
	estudiante as est
inner join 
	datos_personales as dp_estu on dp_estu.Id_Usuario = est.Id_Usuario
inner join 
	detalle_tutor_estudiante  as dt_tutor on dt_tutor.Id_Estudiante  = est.Id
inner join 
	tutor  as tut on tut.Id  = dt_tutor.Id_Tutor 
inner join 
	datos_personales  as dp_tutor on dp_tutor.Id_Usuario  = tut.Id_Usuario  
inner join 
	matricula as mat on mat.Id_estudiante  = est.Id
inner join 
	grado as grd on grd.Id  = mat.id_grado 
inner join 
	sexo as sex on sex.Id = dp_estu.Id_sexo;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Matriculas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Matriculas`()
begin
	
	select 
	mat.Id,
	mat.Id_estudiante,
	mat.Id_tutor,
	mat.id_grado,
	grd.Nombre as Id_grado_nombre,
	mat.id_turno,
	tur.Nombre as Id_turno_nombre,
	mat.id_anio_lectivo,
	an.anio as Id_anio_lectivo_anio,
	est.Cod_estudiante, 
	tut.Cedula,
	dp_estu.Nombres as Nombres_estudiante,
	dp_estu.Apellidos as Apellidos_estudiante,
	dp_tut.Nombres as Nombres_tutor,
	dp_tut.Apellidos as Apellidos_tutor,
	mat.Estado
		
	from 
	matricula  as mat 
	inner join
	estudiante  as est on est.Id  = mat.Id_estudiante
	inner join
	datos_personales  as dp_estu on dp_estu.Id_Usuario  = est.Id_Usuario 
	inner join
	tutor  as tut on tut.Id  = mat.Id_tutor
	inner join
	datos_personales  as dp_tut on dp_tut.Id_Usuario  = est.Id_Usuario
	inner join
	grado  as grd on grd.Id  = mat.id_grado 
	inner join
	turno  as tur on tur.Id  = mat.id_turno 
	inner join
	anio_lectivo  as an on an.Id  = mat.id_anio_lectivo

; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Tutores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Tutores`()
begin
	    
SELECT 
    t.Id AS Id,
    t.Cedula AS Cedula, 
    t.Ocupacion AS Ocupacion,
    t.Id_Usuario AS Id_Usuario,
    dp_tutor.Id AS Id_datos_personales,
    dp_tutor.Nombres AS Nombres,
    dp_tutor.Apellidos AS Apellidos,
    dp_tutor.Direccion AS Direccion, 
    dp_tutor.Id_sexo AS Id_sexo_Tutor,
    s_tutor.Nombre AS Id_sexo_Nombre,
    e.Id_Estudiante AS Id_Estudiante,
    dp_estudiante.Nombres AS Nombre_Estudiante,
    dp_estudiante.Apellidos AS Apellidos_Estudiante,
    dp_estudiante.Id_sexo AS Id_sexo_Estudiante,
    s_estudiante.Nombre AS Id_sexo_Nombre_Estudiante
FROM 
    tutor t
INNER JOIN 
    datos_personales dp_tutor ON dp_tutor.Id_Usuario = t.Id_Usuario 
INNER JOIN 
    sexo s_tutor ON s_tutor.Id = dp_tutor.Id_sexo
INNER JOIN 
    (SELECT Id_Tutor, MIN(Id_Estudiante) AS Id_Estudiante
     FROM detalle_tutor_estudiante
     GROUP BY Id_Tutor) e ON e.Id_Tutor = t.Id
INNER JOIN 
    estudiante est ON est.Id = e.Id_Estudiante
INNER JOIN 
    datos_personales dp_estudiante ON dp_estudiante.Id_Usuario = est.Id_Usuario
INNER JOIN 
    sexo s_estudiante ON s_estudiante.Id = dp_estudiante.Id_sexo;  
   
   
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_Get_Usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Get_Usuarios`()
BEGIN
    SELECT u.Id as Id, u.usser as usser, u.Id_Tipo_Usuario, t.Nombre as Nombre
    FROM usuario AS u
    INNER JOIN tipo_usuario AS t ON u.Id_Tipo_Usuario = t.Id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-01 22:34:27
