# ************************************************************
# Sequel Ace SQL dump
# Version 3034
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.25)
# Database: hms
# Generation Time: 2021-07-18 15:06:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Aid` int NOT NULL AUTO_INCREMENT,
  `Aname` varchar(255) NOT NULL,
  `Aemail` varchar(255) NOT NULL,
  `Apass` varchar(255) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apass`)
VALUES
	(9,'ADMIN','Admin@admin.com','admin');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table feedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `msg_name` varchar(255) NOT NULL,
  `msg_mail` varchar(255) NOT NULL,
  `msg_sub` varchar(255) NOT NULL,
  `msg_body` varchar(500) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;

INSERT INTO `feedback` (`msg_id`, `msg_name`, `msg_mail`, `msg_sub`, `msg_body`)
VALUES
	(10,'sdasd','asdasd','asdasd','asdasd');

/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reservation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `Rev_id` int NOT NULL AUTO_INCREMENT,
  `Acid` int NOT NULL,
  `uid` int DEFAULT NULL,
  `Rev_name` varchar(255) NOT NULL,
  `Rev_email` varchar(255) NOT NULL,
  `Rev_phone` varchar(255) NOT NULL,
  `Rev_IdnPan` varchar(11) NOT NULL,
  `Rev_Add` varchar(255) NOT NULL,
  `Rev_Sdate` date NOT NULL,
  `Rev_Edate` date NOT NULL,
  `rev_adults` int NOT NULL,
  `rev_child` int NOT NULL DEFAULT '0',
  `rev_totalguest` int NOT NULL,
  `Rev_roomno` int NOT NULL,
  `Rev_roomtype` varchar(255) NOT NULL,
  `Room_total` int NOT NULL,
  `acnf` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Rev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `Roomid` int unsigned NOT NULL AUTO_INCREMENT,
  `RoomNo` mediumint DEFAULT NULL,
  `RoomType` text,
  `RoomPrice` text,
  `Room_status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Roomid`)
) ENGINE=InnoDB AUTO_INCREMENT=351 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;

INSERT INTO `rooms` (`Roomid`, `RoomNo`, `RoomType`, `RoomPrice`, `Room_status`)
VALUES
	(331,103,'Single Bed','500',0),
	(332,104,'Single Bed','500',0),
	(333,105,'Single Bed','500',0),
	(334,101,'Single Bed','500',1),
	(335,102,'Single Bed','500',0),
	(336,201,'Double Bed','1000',0),
	(337,202,'Double Bed','1000',0),
	(338,203,'Double Bed','1000',0),
	(339,301,'King Size Bed','2000',0),
	(340,302,'King Size Bed','2000',0),
	(341,303,'King Size Bed','2000',0),
	(342,204,'Double Bed','1000',0),
	(343,205,'Double Bed','1000',0),
	(344,206,'Double Bed','1000',0),
	(346,106,'Single Bed','500',0),
	(347,304,'King Size Bed','2000',0),
	(348,305,'King Size Bed','2000',0),
	(349,306,'King Size Bed','2000',0),
	(350,505,'Single Bed','100',0);

/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) NOT NULL,
  `s_position` varchar(255) NOT NULL,
  `s_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;

INSERT INTO `staff` (`id`, `s_name`, `s_position`, `s_contact`)
VALUES
	(6,'test','Housekeeping Manager','123'),
	(7,'Rabina','Room Service','987');

/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uphone` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`uid`, `uname`, `uemail`, `uphone`, `upassword`)
VALUES
	(18,'pranay kalita','pranaykalita2@gmail.com','7638033416','pranay123');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
