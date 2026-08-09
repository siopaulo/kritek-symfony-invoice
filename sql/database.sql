/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20260809003712','2026-08-09 00:37:22',137);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `invoice_number` int NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_line` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `quantity` int NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `vat_amount` decimal(12,2) NOT NULL,
  `total_with_vat` decimal(12,2) NOT NULL,
  `invoice_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D3D1D6932989F1FD` (`invoice_id`),
  CONSTRAINT `FK_D3D1D6932989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
