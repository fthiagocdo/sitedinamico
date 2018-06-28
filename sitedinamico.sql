-- MySQL dump 10.16  Distrib 10.1.33-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sitedinamico
-- ------------------------------------------------------
-- Server version	10.1.33-MariaDB

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
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla_estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galerias`
--

DROP TABLE IF EXISTS `galerias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galerias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imovel_id` int(10) unsigned NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galerias_imovel_id_foreign` (`imovel_id`),
  CONSTRAINT `galerias_imovel_id_foreign` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galerias`
--

LOCK TABLES `galerias` WRITE;
/*!40000 ALTER TABLE `galerias` DISABLE KEYS */;
/*!40000 ALTER TABLE `galerias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imoveis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` int(10) unsigned NOT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('vende','aluga') COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `dormitorios` int(11) NOT NULL,
  `detalhes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapa` text COLLATE utf8mb4_unicode_ci,
  `visualizacoes` bigint(20) NOT NULL DEFAULT '0',
  `publicar` enum('sim','nao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nao',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imoveis_tipo_id_foreign` (`tipo_id`),
  KEY `imoveis_cidade_id_foreign` (`cidade_id`),
  CONSTRAINT `imoveis_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`),
  CONSTRAINT `imoveis_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imoveis`
--

LOCK TABLES `imoveis` WRITE;
/*!40000 ALTER TABLE `imoveis` DISABLE KEYS */;
/*!40000 ALTER TABLE `imoveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (9,'2018_06_26_005411_create_permissaos_table',1),(10,'2018_06_26_005325_create_papels_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapa` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (3,'A Empresa','Descrição breve sobre a empresa.','Texto sobre a empresa.','img/modelo_img_home.jpg',NULL,NULL,'sobre','2018-06-28 02:00:53','2018-06-28 02:00:53'),(4,'Entre em contato','Preencha o formulário.',NULL,'img/modelo_img_home.jpg',NULL,'fthiagocdo@gmail.com','contato','2018-06-28 02:00:53','2018-06-28 02:00:53');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `papel_permissao`
--

DROP TABLE IF EXISTS `papel_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papel_permissao` (
  `permissao_id` int(10) unsigned NOT NULL,
  `papel_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permissao_id`,`papel_id`),
  KEY `papel_permissao_papel_id_foreign` (`papel_id`),
  CONSTRAINT `papel_permissao_papel_id_foreign` FOREIGN KEY (`papel_id`) REFERENCES `papels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `papel_permissao_permissao_id_foreign` FOREIGN KEY (`permissao_id`) REFERENCES `permissaos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papel_permissao`
--

LOCK TABLES `papel_permissao` WRITE;
/*!40000 ALTER TABLE `papel_permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `papel_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `papel_user`
--

DROP TABLE IF EXISTS `papel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papel_user` (
  `user_id` int(10) unsigned NOT NULL,
  `papel_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`papel_id`),
  KEY `papel_user_papel_id_foreign` (`papel_id`),
  CONSTRAINT `papel_user_papel_id_foreign` FOREIGN KEY (`papel_id`) REFERENCES `papels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `papel_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papel_user`
--

LOCK TABLES `papel_user` WRITE;
/*!40000 ALTER TABLE `papel_user` DISABLE KEYS */;
INSERT INTO `papel_user` VALUES (5,4);
/*!40000 ALTER TABLE `papel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `papels`
--

DROP TABLE IF EXISTS `papels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papels`
--

LOCK TABLES `papels` WRITE;
/*!40000 ALTER TABLE `papels` DISABLE KEYS */;
INSERT INTO `papels` VALUES (4,'admin','Admininstrador do sistema','2018-06-28 02:00:53','2018-06-28 02:00:53'),(5,'gerente','Gerente do sistema','2018-06-28 02:00:53','2018-06-28 02:00:53'),(6,'vendedor','Equipe de vendas','2018-06-28 02:00:53','2018-06-28 02:00:53');
/*!40000 ALTER TABLE `papels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissaos`
--

DROP TABLE IF EXISTS `permissaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissaos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissaos`
--

LOCK TABLES `permissaos` WRITE;
/*!40000 ALTER TABLE `permissaos` DISABLE KEYS */;
INSERT INTO `permissaos` VALUES (38,'usuario_listar','Listar Usuários','2018-06-28 02:00:53','2018-06-28 02:00:53'),(39,'usuario_adicionar','Adicionar Usuários','2018-06-28 02:00:54','2018-06-28 02:00:54'),(40,'usuario_editar','Editar Usuários','2018-06-28 02:00:54','2018-06-28 02:00:54'),(41,'usuario_deletar','Deletar Usuários','2018-06-28 02:00:54','2018-06-28 02:00:54'),(42,'papel_listar','Listar Papéis','2018-06-28 02:00:54','2018-06-28 02:00:54'),(43,'papel_adicionar','Adicionar Papéis','2018-06-28 02:00:54','2018-06-28 02:00:54'),(44,'papel_editar','Editar Papéis','2018-06-28 02:00:54','2018-06-28 02:00:54'),(45,'papel_deletar','Deletar Papéis','2018-06-28 02:00:54','2018-06-28 02:00:54'),(46,'pagina_listar','Listar Páginas','2018-06-28 02:00:54','2018-06-28 02:00:54'),(47,'pagina_adicionar','Adicionar Páginas','2018-06-28 02:00:54','2018-06-28 02:00:54'),(48,'pagina_editar','Editar Páginas','2018-06-28 02:00:54','2018-06-28 02:00:54'),(49,'pagina_deletar','Deletar Páginas','2018-06-28 02:00:54','2018-06-28 02:00:54'),(50,'tipo_listar','Listar Tipos','2018-06-28 02:00:54','2018-06-28 02:00:54'),(51,'tipo_adicionar','Adicionar Tipos','2018-06-28 02:00:54','2018-06-28 02:00:54'),(52,'tipo_editar','Editar Tipos','2018-06-28 02:00:54','2018-06-28 02:00:54'),(53,'tipo_deletar','Deletar Tipos','2018-06-28 02:00:54','2018-06-28 02:00:54'),(54,'cidade_listar','Listar Cidades','2018-06-28 02:00:54','2018-06-28 02:00:54'),(55,'cidade_adicionar','Adicionar Cidades','2018-06-28 02:00:54','2018-06-28 02:00:54'),(56,'cidade_editar','Editar Cidades','2018-06-28 02:00:54','2018-06-28 02:00:54'),(57,'cidade_deletar','Deletar Cidades','2018-06-28 02:00:54','2018-06-28 02:00:54'),(58,'imovel_listar','Listar Imóveis','2018-06-28 02:00:55','2018-06-28 02:00:55'),(59,'imovel_adicionar','Adicionar Imóveis','2018-06-28 02:00:55','2018-06-28 02:00:55'),(60,'imovel_editar','Editar Imóveis','2018-06-28 02:00:55','2018-06-28 02:00:55'),(61,'imovel_deletar','Deletar Imóveis','2018-06-28 02:00:55','2018-06-28 02:00:55'),(62,'slide_listar','Listar Slides','2018-06-28 02:00:55','2018-06-28 02:00:55'),(63,'slide_adicionar','Adicionar Slides','2018-06-28 02:00:55','2018-06-28 02:00:55'),(64,'slide_editar','Editar Slides','2018-06-28 02:00:55','2018-06-28 02:00:55'),(65,'slide_deletar','Deletar Slides','2018-06-28 02:00:55','2018-06-28 02:00:55'),(66,'permissao_listar','Listar Permissão','2018-06-28 02:00:55','2018-06-28 02:00:55'),(67,'permissao_adicionar','Adicionar Permissão','2018-06-28 02:00:55','2018-06-28 02:00:55'),(68,'permissao_editar','Editar Permissão','2018-06-28 02:00:55','2018-06-28 02:00:55'),(69,'papel_deletar','Deletar Permissão','2018-06-28 02:00:55','2018-06-28 02:02:50'),(70,'galeria_listar','Listar Galeria','2018-06-28 02:00:55','2018-06-28 02:00:55'),(71,'galeria_adicionar','Adicionar Galeria','2018-06-28 02:00:55','2018-06-28 02:00:55'),(72,'galeria_editar','Editar Galeria','2018-06-28 02:00:55','2018-06-28 02:00:55'),(73,'galeria_deletar','Deletar Galeria','2018-06-28 02:00:55','2018-06-28 02:00:55'),(74,'permissao_deletar','Deletar Permissão','2018-06-28 02:05:38','2018-06-28 02:05:38');
/*!40000 ALTER TABLE `permissaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `publicado` enum('sim','nao') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nao',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Administrador','admin@mail.com','$2y$10$LpHW9.idND60g5SSyeEbzuXkq1MrBjfAfYEzQvOoZkx8mY1pajVEG',NULL,'2018-06-28 02:05:37','2018-06-28 02:05:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-27 20:10:23
