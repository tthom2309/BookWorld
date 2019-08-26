/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 5.7.26 : Database - bookworld
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bookworld` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bookworld`;

/*Table structure for table `author` */

DROP TABLE IF EXISTS `author`;

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `author` */

insert  into `author`(`id_author`,`name`) values 
(1,'Isaac Asimov'),
(2,'Machiavel'),
(3,'Drew Karpyshyn'),
(4,'Markus Heitz'),
(5,'Stephen Hawking'),
(6,'Charlie Fletcher');

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `isbn` varchar(17) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `publisher` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `synopsis` text,
  `image` varchar(255) DEFAULT NULL,
  `quantity_available` int(11) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `publisher` (`publisher`),
  KEY `author` (`author`),
  KEY `category` (`category`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`id_publisher`),
  CONSTRAINT `book_ibfk_2` FOREIGN KEY (`author`) REFERENCES `author` (`id_author`),
  CONSTRAINT `book_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `book` */

insert  into `book`(`isbn`,`label`,`publisher`,`author`,`category`,`price`,`synopsis`,`image`,`quantity_available`) values 
('978-2-07-036053-6','Fondation: Le cycle de Fondation, 1',1,1,1,7.25,'En ce début de treizième millénaire, l\'Empire n\'a jamais été aussi puissant, aussi étendu à travers toute la galaxie. C\'est dans sa capitale, Trantor, que l\'éminent savant Hari Seldon invente la psychohistoire, une science nouvelle permettant de prédire l\'avenir. Grâce à elle, Seldon prévoit l\'effondrement de l\'Empire d\'ici trois siècles, suivi d\'une ère de ténèbres de trente mille ans. Réduire cette période à mille ans est peut-être possible, à condition de mener à terme son projet: la Fondation, chargée de rassembler toutes les connaissances humaines. Une entreprise visionnaire qui rencontre de nombreux et puissants détracteurs...','images/978-2-07-036053-6.jpg',26),
('978-2-07-036055-0','Fondation et Empire: Le cycle de Fondation, 2',1,1,1,7.80,'Tandis que les crises qui secouent l\'Empire redoublent de violence et annoncent son effondrement définitif, la Fondation créée par le psychohistorien Hari Seldon pour sauvegarder la civilisation devient de plus en plus puissante, suscitant naturellement convoitise et visées annexionistes. En tout premier lieu, celles de Bel Riose, jeune général qui voit dans les secrets détenus par la Fondation le moyen de montrer sur le trône. C\'est alors qu\'apparait un mystérieux et invincible conquérant, surnommé le Mulet, que le plan de Seldon n\'avait pas prévu...  ','images/978-2-07-036055-0.jpg',19),
('978-2-290-00645-0','Une brève histoire du temps',2,5,5,6.10,'Voici le premier livre que Stephen Hawking a écrit pour le grand public. Il y expose, dans un langage accessible à tous, les plus récentes découvertes des astrophysiciens. Retraçant les grandes théories du cosmos depuis Galilée jusqu\'à Einstein, racontant les ultimes découvertes en cosmologie, expliquant la nature des trous noirs, il propose ensuite de relever le plus grand défi de la science moderne: la recherche d\'une théorie permettant de concilier la relativité générale et la mécanique quantique.','images/978-2-290-00645-0.jpg',36),
('978-2-8112-1713-6','Les Nains: 1 - Le passage de pierre',6,4,3,8.20,'Lorsque s\'effondre le passage de Pierre que les Nains gardaient depuis toujours, Orcs et Ogres déferlent sur le Pays Sûr. C\'est le jeune Nain Tungdil qui donne l\'alerte. Envoyé en mission par son père adoptif, le Mage Lot-Ionan, il découvre l\'armée qui avance sur le pays. A la tête de cette force d\'invasion, les Albes, êtres cruels et maléfiques, ont le pouvoir de ramener les morts à la vie. Tungdil n\'a pas d\'autre choix: s\'il veut sauver Hommes, Elfes, Mages et Nains du péril imminent, il doit devenir un héros .','images/978-2-8112-1713-6.jpg',12),
('978-2-8112-1770-9','Les Nains: 2 - Lame de Feu',6,4,3,8.20,' L\'armée des orcs, menée par les Albes impitoyables, avance à la rencontre de l\'alliance des Humains.\r\nSeuls les nains pourraient les sauver. Mais ceux-ci sont divisés par la sucession au trône... et bien malgré lui, Tungdil fait parti des prétendants.\r\nPour empêcher la guerre contre les elfes dont rêve son rival, le jeune Nain doit réussir une épreuve sans pareil:\r\nForger la Lame de Feu, l\'arme mythique qui pourrait défaire le mage Nôd\'onn et l\'empêcher de livrer le Pays Sûr aux créatures de Tion.\r\nUne fois encore, le sort du monde dépend de Tungdil et de ses compagnons...','images/978-2-8112-1770-9.jpg',20);

/*Table structure for table `bookorder` */

DROP TABLE IF EXISTS `bookorder`;

CREATE TABLE `bookorder` (
  `id_book_order` int(11) NOT NULL AUTO_INCREMENT,
  `num_order` int(11) DEFAULT NULL,
  `book` varchar(17) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_book_order`),
  KEY `num_order` (`num_order`),
  KEY `book` (`book`),
  CONSTRAINT `bookorder_ibfk_1` FOREIGN KEY (`num_order`) REFERENCES `order` (`id_order`),
  CONSTRAINT `bookorder_ibfk_2` FOREIGN KEY (`book`) REFERENCES `book` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `bookorder` */

insert  into `bookorder`(`id_book_order`,`num_order`,`book`,`price`,`quantity`) values 
(1,1,'978-2-07-036053-6',7.25,1),
(2,1,'978-2-07-036055-0',7.80,2),
(3,2,'978-2-290-00645-0',6.20,1),
(4,3,'978-2-290-00645-0',6.20,1),
(5,3,'978-2-8112-1713-6',8.20,1),
(6,4,'978-2-07-036053-6',7.25,2),
(7,9,'978-2-07-036053-6',7.25,1),
(8,11,'978-2-07-036053-6',7.25,2),
(9,11,'978-2-290-00645-0',6.10,1),
(10,12,'978-2-07-036053-6',7.25,1),
(11,13,'978-2-07-036053-6',7.25,1),
(12,14,'978-2-07-036053-6',7.25,1),
(13,15,'978-2-07-036053-6',7.25,1),
(14,16,'978-2-07-036053-6',7.25,1),
(15,17,'978-2-07-036053-6',7.25,1),
(16,18,'978-2-07-036053-6',7.25,1),
(17,19,'978-2-290-00645-0',6.10,1);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id_category`,`name_cat`) values 
(1,'Science-fiction'),
(2,'Fantasy'),
(3,'Médiéval-fantasy'),
(4,'Littérature classique'),
(5,'Sciences'),
(6,'Histoire'),
(7,'BD'),
(8,'Comics'),
(9,'Manga'),
(10,'Policier et thriller'),
(11,'Autobiographie');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `user` (`user`),
  KEY `status` (`status`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `order` */

insert  into `order`(`id_order`,`user`,`status`) values 
(1,2,2),
(2,3,3),
(3,2,2),
(4,3,1),
(9,1,1),
(11,1,1),
(12,1,1),
(13,1,1),
(14,1,1),
(15,1,1),
(16,1,1),
(17,1,1),
(18,1,1),
(19,1,1);

/*Table structure for table `publisher` */

DROP TABLE IF EXISTS `publisher`;

CREATE TABLE `publisher` (
  `id_publisher` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_publisher`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `publisher` */

insert  into `publisher`(`id_publisher`,`name`) values 
(1,'FOLIO SCIENCE-FICTION'),
(2,'J\'AI LU'),
(3,'GF Flammarion'),
(4,'POCKET'),
(5,'Librio'),
(6,'Milady'),
(7,'Bragelonne'),
(8,'Larousse');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id_role`,`name`) values 
(1,'Admin'),
(2,'Worker'),
(3,'Customer');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `status` */

insert  into `status`(`id_status`,`name`) values 
(1,'En cours'),
(2,'Validée'),
(3,'Annulée');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id_user`,`login`,`password`,`name`,`surname`,`adress`,`mail`,`role`) values 
(1,'Admin','$2y$10$5VDpCmr1DfBzsi9dq9VtjuEfA2YFo.EeVE3rKoYnx8HogRgHQ0DoG','Tratskas','Thomas','Rue fictive 12, 3010 VilleFictive','emailTest1@test.com',1),
(2,'EmployeTest','$2y$10$whPG2Gejtk5Hs7y6hPc0pOJ8o7/0UwPrbCOBo1En5qLOSZPeRvqS6','NomEmploye','PrenomEmploye','Rue fictive 22, 3000 VilleFictive','emailTest2@test.com',2),
(3,'ClientTest','$2y$10$1eiB/v5uI9GKb/xmde0eFu6AqgYS/KmoJeM5tFZo5H.qaLjXQPfze','NomCustomer','PrenomCustomer','Rue fictive 32, 3000 VilleFictive','emailTest3@test.com',3),
(4,'Test','$2y$10$hOJo9Vtmnft6t5wtLEXkn.yXtYVMxamQfyJwG6mcHIHJnjOn1m3VK','aaa','aaa','aaaa 7, 77 il','test4@te.com',3),
(5,'TestClientAjout','$2y$10$D8KpmqZbd8iuvjgi6BfL8uUCPdjygTkB.pGVTfjOfcWy9Ze5YstpG','TestClientAjoutNom','TestClientAjoutPrénom','Rue random 11, 7777 VilleRandom','random@test.com',3);

/* Trigger structure for table `user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insertUser` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insertUser` BEFORE INSERT ON `user` FOR EACH ROW 
BEGIN
	DECLARE done INT DEFAULT FALSE;
	DECLARE templogin VARCHAR(255);
	DECLARE tempmail VARCHAR(255);
	DECLARE ids1 INT;
	DECLARE ids2 INT;
	DECLARE curs1 CURSOR FOR SELECT login FROM `user` WHERE login=templogin;
	DECLARE curs2 CURSOR FOR SELECT mail FROM `user` WHERE mail=tempmail;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done=TRUE;
	SET templogin = new.login;
	SET tempmail = new.mail;
	
	OPEN curs1;
		ins_loop: LOOP
			FETCH curs1 INTO ids1;
			IF done THEN
				LEAVE ins_loop;
			ELSE
				signal SQLSTATE '45000' SET message_text='Ce pseudo est déjà pris.', MYSQL_ERRNO='1001';
			END IF;
		END LOOP;
	CLOSE curs1;
	
	OPEN curs2;
		ins_loop: LOOP
			FETCH curs2 INTO ids2;
			IF done THEN
				LEAVE ins_loop;
			ELSE
				signal SQLSTATE '45000' SET message_text='Cette adresse mail est déjà enregistrée.', MYSQL_ERRNO='1001';
			END IF;
		END LOOP;
	CLOSE curs2;			 			 
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
