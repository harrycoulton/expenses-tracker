# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: expenses-tracker
# Generation Time: 2019-11-21 12:45:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table expenses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expense-name` varchar(256) NOT NULL DEFAULT '',
  `expense-value` float(8,2) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;

INSERT INTO `expenses` (`id`, `expense-name`, `expense-value`, `date`, `category`)
VALUES
	(43,'Groceries',35.00,'2019-11-17','Food'),
	(44,'Groceries',23.50,'2019-11-09','Food'),
	(45,'Groceries',35.00,'2019-11-12','Food'),
	(46,'Groceries',23.50,'2019-11-03','Food'),
	(47,'Groceries',35.00,'2019-10-29','Food'),
	(48,'Groceries',35.00,'2019-12-15','Food'),
	(49,'Groceries',23.50,'2019-10-21','Food'),
	(50,'Groceries',35.00,'2019-12-05','Food'),
	(51,'Groceries',23.50,'2019-10-14','Food'),
	(52,'Groceries',35.00,'2019-10-12','Food'),
	(53,'Groceries',23.50,'2019-10-07','Food'),
	(54,'Groceries',35.00,'2019-10-01','Food'),
	(55,'Groceries',23.50,'2019-09-26','Food'),
	(56,'Groceries',35.00,'2019-09-19','Food'),
	(57,'Groceries',23.50,'2019-09-13','Food'),
	(58,'Groceries',35.00,'2019-09-06','Food'),
	(59,'Gym December',45.00,'2019-12-01','Exercise'),
	(60,'Gym November',45.00,'2019-11-01','Exercise'),
	(61,'Gym October',45.00,'2019-10-01','Exercise'),
	(62,'Gym September',45.00,'2019-09-01','Exercise'),
	(63,'Rent December',400.00,'2019-12-10','Rent'),
	(65,'Rent October',400.00,'2019-10-10','Rent'),
	(66,'Rent September',400.00,'2019-09-10','Rent'),
	(68,'Leisure Trip',50.00,'2019-12-12','Leisure'),
	(69,'Leisure Trip',50.00,'2019-11-30','Leisure'),
	(70,'Leisure Trip',20.00,'2019-11-24','Leisure'),
	(71,'Leisure Trip',50.00,'2019-11-20','Leisure'),
	(72,'Leisure Trip',20.00,'2019-11-14','Leisure'),
	(73,'Leisure Trip',50.00,'2019-11-09','Leisure'),
	(74,'Leisure Trip',50.00,'2019-11-03','Leisure'),
	(75,'teapot',23.00,'2019-11-17','Leisure'),
	(77,'Crack cocaine',0.12,'2222-02-12','Rent'),
	(78,'Teapot',45.00,'2019-11-20','Exercise'),
	(79,'Teapot',123.45,'2019-11-21','Food'),
	(80,'Rent November',400.00,'2019-11-05','Rent'),
	(81,'teapot',123.00,'2019-11-11','Food');

/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL DEFAULT '',
  `budget` float(8,2) NOT NULL,
  `savingstarget` float(12,2) NOT NULL,
  `savingstotal` float(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `budget`, `savingstarget`, `savingstotal`)
VALUES
	(1,'guest_user',1750.00,7500.00,486.00);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
