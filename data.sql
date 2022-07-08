-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sprint8
DROP DATABASE IF EXISTS `sprint8`;
CREATE DATABASE IF NOT EXISTS `sprint8` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sprint8`;

-- Dumping structure for table sprint8.emloyees
DROP TABLE IF EXISTS `emloyees`;
CREATE TABLE IF NOT EXISTS `emloyees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3C748C15E237E06` (`name`),
  KEY `IDX_3C748C1166D1F9C` (`project_id`),
  CONSTRAINT `FK_3C748C1166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sprint8.emloyees: ~9 rows (approximately)
REPLACE INTO `emloyees` (`id`, `project_id`, `name`) VALUES
	(3, 5, 'Jonas'),
	(4, 4, 'Petras'),
	(5, 6, 'Antanas'),
	(6, 8, 'Kazimieras'),
	(7, 7, 'Maryte'),
	(8, NULL, 'Laimonas'),
	(9, 9, 'Gintarė'),
	(10, 3, 'Petriukas'),
	(11, 4, 'Bronė');

-- Dumping structure for table sprint8.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A5E5D1F221011221` (`projectName`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sprint8.projects: ~7 rows (approximately)
REPLACE INTO `projects` (`id`, `projectName`) VALUES
	(5, 'Go'),
	(8, 'Java'),
	(7, 'Javascript'),
	(3, 'PHP'),
	(9, 'Python'),
	(6, 'React'),
	(4, 'Solidity');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
