-- MySQL dump 10.11
--
-- Host: 127.0.0.1    Database: mydatabase
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `CNum` int(10) unsigned NOT NULL auto_increment,
  `Cname` varchar(40) NOT NULL,
  PRIMARY KEY  (`CNum`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'哈尔滨'),(2,'北京'),(3,'天津'),(4,'上海'),(5,'香港'),(6,'芝加哥'),(7,'东京'),(8,'Harbin'),(9,'Beijing');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL default '0',
  `name` varchar(50) default NULL,
  `num` int(11) default NULL,
  `price` float default NULL,
  `logging_date` date default NULL,
  `updating_date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (0,'0',0,0,'2016-02-06','2016-02-06'),(1,'111',71,1,'2016-02-06','2016-02-06'),(5,'5',1,5,'2016-02-06','2016-02-06'),(6,'6',12,6,'2016-02-06','2016-02-06'),(7,'7',49,7,'2016-02-06','2016-02-06'),(8,'8',24,8,'2016-02-06','2016-02-06'),(11,'11',11,11,'2016-02-06','2016-02-06'),(21,'21',21,21,'2016-02-06','2016-02-06'),(31,'31',62,31,'2016-02-06','2016-02-06'),(111,'111',777,333,'2016-02-06','2016-02-06'),(123,'123',123,123,'2016-02-06','2016-02-06'),(222,'222',222,222,'2016-02-06','2016-02-06'),(333,'333',333,333,'2016-02-06','2016-02-06'),(3333,'3333',3333,3333,'2016-02-06','2016-02-06'),(123321,'123321',123321,123321,'2016-02-06','2016-02-06');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_in_out_log`
--

DROP TABLE IF EXISTS `goods_in_out_log`;
CREATE TABLE `goods_in_out_log` (
  `id` int(11) NOT NULL auto_increment,
  `goods_id` int(11) default NULL,
  `goods_num` int(11) default NULL,
  `handler_id` int(11) default NULL,
  `date` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods_in_out_log`
--

LOCK TABLES `goods_in_out_log` WRITE;
/*!40000 ALTER TABLE `goods_in_out_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `goods_in_out_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `name` varchar(40) NOT NULL,
  `num1` int(10) unsigned NOT NULL,
  `num2` int(10) unsigned NOT NULL,
  `num3` int(10) unsigned NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES ('赵鑫鑫',10,10,20,1,'2012-05-05 02:00:00',1),('任震宇',20,10,10,2,'2012-06-01 00:00:00',2),('徐琴',10,50,10,3,'2012-06-02 00:00:00',3),('赵鑫鑫',4,5,2,1,'2013-01-04 14:38:46',4),('赵鑫鑫',2,2,3,3,'2013-01-16 15:13:42',5),('赵鑫鑫',2,1,3,6,'2013-02-04 15:16:24',6),('赵鑫鑫',8,10,15,1,'2013-03-19 09:59:39',8),('任震宇',8,10,15,1,'2013-01-06 09:59:40',9),('任震宇',12,10,9,5,'2013-02-06 10:18:27',10),('任震宇',0,1,1,1,'2013-03-06 16:49:20',11),('任震宇',2,4,71,3,'2013-04-06 16:49:20',12),('任震宇',3,4,1,4,'2013-05-06 16:49:20',13),('任震宇',5,1,31,2,'2013-06-06 16:49:20',14),('任震宇',9,18,2,4,'2013-06-08 12:04:58',15),('赵鑫鑫',11,21,5,2,'2013-04-18 12:04:58',16),('赵鑫鑫',23,22,2,3,'2013-02-08 12:04:58',17),('赵鑫鑫',11,11,6,4,'2013-04-28 12:04:58',18),('赵鑫鑫',1,2,11,1,'2012-11-08 12:04:58',19),('赵鑫鑫',5,4,55,4,'2012-12-08 12:04:58',20),('赵鑫鑫',2,6,22,5,'2013-04-08 12:04:58',21),('赵鑫鑫',6,1,12,6,'2013-01-08 12:04:58',22),('赵鑫鑫',44,2,2,2,'2013-05-08 12:04:58',23),('赵鑫鑫',2,6,5,4,'2013-05-18 12:04:58',24),('赵鑫鑫',1,1,1,5,'2013-03-08 12:04:58',25),('任震宇',12,19,22,6,'2013-01-28 12:04:58',26),('任震宇',22,19,22,1,'2013-02-08 12:04:58',27),('任震宇',11,11,21,2,'2013-03-18 12:04:58',28),('任震宇',5,9,11,3,'2013-05-14 12:04:58',29),('任震宇',6,8,15,4,'2013-06-01 12:04:58',30),('任震宇',7,8,44,6,'2013-05-01 12:04:58',31),('Emaster',11,11,11,0,'0000-00-00 00:00:00',32),('Emaster',11,11,11,0,'2013-06-08 20:55:05',33),('Emaster',1,1,1,0,'2013-06-08 12:56:31',34),('EmasterMama',5,5,7,0,'2013-06-08 12:56:47',35);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `kind` varchar(10) NOT NULL default 'saler',
  `num1` int(10) unsigned NOT NULL,
  `num2` int(10) unsigned NOT NULL,
  `num3` int(10) unsigned NOT NULL,
  `end` datetime NOT NULL,
  `createdate` datetime NOT NULL,
  `state` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-08 15:56:53
