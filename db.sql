/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.7.36 : Database - midate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`midate` /*!40100 DEFAULT CHARACTER SET utf16 */;

USE `midate`;

/*Table structure for table `tblchats` */

DROP TABLE IF EXISTS `tblchats`;

CREATE TABLE `tblchats` (
  `chat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `to` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `message` text CHARACTER SET latin1 NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` int(10) unsigned NOT NULL DEFAULT '0',
  `time_read` datetime DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8;

/*Data for the table `tblchats` */

insert  into `tblchats`(`chat_id`,`from`,`to`,`message`,`sent`,`read`,`time_read`) values 
(113,'administrator','tessadt2aa',':)','2015-05-04 17:54:13',1,NULL),
(114,'tessadt2aa','administrator','not get it :(','2015-05-04 17:54:40',1,NULL),
(115,'tessadt2aa','administrator','not get it again :(','2015-05-04 17:55:27',1,NULL),
(116,'administrator','tessadt2aa',':)','2015-05-04 17:59:43',1,NULL),
(117,'tessadt2aa','administrator','again :)','2015-05-04 17:59:49',1,NULL),
(118,'tessadt2aa','administrator','again 2 :)','2015-05-04 18:00:03',1,NULL),
(119,'administrator','tessadt2aa','hi :)','2015-05-05 09:16:13',1,NULL),
(120,'tessadt2aa','administrator','ok :)','2015-05-05 09:16:48',1,NULL),
(121,'administrator','tessadt2aa','ok :)','2015-05-05 09:23:22',1,NULL),
(122,'tessadt2aa','administrator','k','2015-05-05 09:23:47',1,NULL),
(123,'tessadt2aa','administrator','h :D','2015-05-05 09:24:08',1,NULL),
(124,'tessadt2aa','administrator','ok :)','2015-05-05 09:26:54',1,NULL),
(125,'tessadt2aa','administrator','h :)','2015-05-05 09:27:03',1,NULL),
(126,'tessadt2aa','administrator','h:)','2015-05-05 09:29:54',1,NULL),
(127,'tessadt2aa','administrator','hahaha','2015-05-05 09:30:39',1,NULL),
(128,'tessadt2aa','administrator','hahaha2 :)','2015-05-05 09:30:42',1,NULL),
(129,'tessadt2aa','administrator',':)','2015-05-05 09:31:23',1,NULL),
(130,'administrator','tessadt2aa','h:)','2015-05-05 09:31:28',1,NULL),
(131,'tessadt2aa','administrator','h:)','2015-05-05 09:32:28',1,NULL),
(132,'tessadt2aa','administrator','ok','2015-05-05 09:32:57',1,NULL),
(133,'administrator','tessadt2aa','h','2015-05-05 09:33:13',1,NULL),
(134,'tessadt2aa','administrator','a','2015-05-05 09:34:16',1,NULL),
(135,'tessadt2aa','administrator',':)','2015-05-05 09:34:25',1,NULL),
(136,'administrator','tessadt2aa',':)','2015-05-05 09:34:42',1,NULL),
(137,'tessadt2aa','administrator','d:)','2015-05-05 09:34:47',1,NULL),
(138,'tessadt2aa','administrator',':D','2015-05-05 09:35:46',1,NULL),
(139,'tessadt2aa','administrator',':)','2015-05-05 09:35:52',1,NULL),
(140,'administrator','tessadt2aa',':)','2015-05-05 09:36:04',1,NULL),
(141,'tessadt2aa','administrator',':)','2015-05-05 09:36:53',1,NULL),
(142,'tessadt2aa','administrator',':)','2015-05-05 09:37:19',1,NULL),
(143,'tessadt2aa','administrator',':)','2015-05-05 09:37:38',1,NULL),
(144,'tessadt2aa','administrator',':)','2015-05-05 09:38:09',1,NULL),
(145,'tessadt2aa','administrator','hi :)','2015-05-05 09:39:41',1,NULL),
(146,'administrator','tessadt2aa',':)','2015-05-05 09:48:54',1,NULL),
(147,'tessadt2aa','administrator',':)','2015-05-05 09:49:06',1,NULL),
(148,'tessadt2aa','administrator',':)','2015-05-05 09:49:13',1,NULL),
(149,'administrator','tessadt2aa',':)','2015-05-05 09:52:02',1,NULL),
(150,'administrator','tessadt2aa',':D','2015-05-05 09:52:06',1,NULL),
(151,'administrator','tessadt2aa',':)','2015-05-05 09:52:15',1,NULL),
(152,'administrator','tessadt2aa',':)','2015-05-05 10:02:23',1,NULL),
(153,'administrator','tessadt2aa',')','2015-05-05 10:02:40',1,NULL),
(154,'administrator','tessadt2aa',':)','2015-05-05 10:03:25',1,NULL),
(155,'tessadt2aa','administrator',':)','2015-05-05 10:03:46',1,NULL),
(156,'administrator','tessadt2aa','ss','2015-05-05 10:04:17',1,NULL),
(157,'administrator','tessadt2aa',':)','2015-05-05 10:04:23',1,NULL),
(158,'administrator','tessadt2aa','a','2015-05-05 10:06:03',1,NULL),
(159,'administrator','tessadt2aa',':)','2015-05-05 10:06:09',1,NULL),
(160,'administrator','tessadt2aa','a','2015-05-05 10:06:48',1,NULL),
(161,'administrator','tessadt2aa','aaa','2015-05-05 10:06:52',1,NULL),
(162,'administrator','tessadt2aa','a','2015-05-05 10:07:11',1,NULL),
(163,'administrator','tessadt2aa','log','2015-05-05 10:07:24',1,NULL),
(164,'administrator','tessadt2aa','a','2015-05-05 10:08:19',1,NULL),
(165,'administrator','tessadt2aa','log','2015-05-05 10:08:29',1,NULL),
(166,'administrator','tessadt2aa',':)','2015-05-05 10:08:32',1,NULL),
(167,'administrator','tessadt2aa','aa','2015-05-05 10:09:16',1,NULL),
(168,'administrator','tessadt2aa','aa','2015-05-05 10:09:40',1,NULL),
(169,'administrator','tessadt2aa','a','2015-05-05 10:11:09',1,NULL),
(170,'administrator','tessadt2aa','hh','2015-05-05 10:12:06',1,NULL),
(171,'administrator','tessadt2aa','gg','2015-05-05 10:12:35',1,NULL),
(172,'administrator','tessadt2aa','aa','2015-05-05 10:12:57',1,NULL),
(173,'administrator','tessadt2aa','gg','2015-05-05 10:13:06',1,NULL),
(174,'administrator','tessadt2aa','aa','2015-05-05 10:13:22',1,NULL),
(175,'administrator','tessadt2aa','aa','2015-05-05 10:13:52',1,NULL),
(176,'administrator','tessadt2aa','aa','2015-05-05 10:16:59',1,NULL),
(177,'administrator','tessadt2aa','aa','2015-05-05 10:17:03',1,NULL),
(178,'administrator','tessadt2aa','aa','2015-05-05 10:24:35',1,NULL),
(179,'administrator','tessadt2aa','aa','2015-05-05 10:24:41',1,NULL),
(180,'administrator','tessadt2aa','bb','2015-05-05 10:24:57',1,NULL),
(181,'administrator','tessadt2aa','ss','2015-05-05 10:25:27',1,NULL),
(182,'administrator','tessadt2aa','ff','2015-05-05 10:25:42',1,NULL),
(183,'administrator','tessadt2aa','yy','2015-05-05 10:25:45',1,NULL),
(184,'tessadt2aa','administrator','ok','2015-05-05 10:27:05',1,NULL),
(185,'tessadt2aa','administrator','hi :)','2015-05-05 10:27:13',1,NULL),
(186,'administrator','tessadt2aa','hi :)','2015-05-05 10:27:19',1,NULL),
(187,'administrator','tessadt2aa','hi','2015-05-05 10:27:45',1,NULL),
(188,'administrator','tessadt2aa','hi','2015-05-05 10:28:13',1,NULL),
(189,'administrator','tessadt2aa','hi :)','2015-05-05 10:28:35',1,NULL),
(190,'administrator','tessadt2aa','ok','2015-05-05 10:29:18',1,NULL),
(191,'administrator','tessadt2aa','okdd','2015-05-05 10:29:22',1,NULL),
(192,'administrator','tessadt2aa','hh','2015-05-05 10:29:54',1,NULL),
(193,'administrator','tessadt2aa','yy','2015-05-05 10:29:56',1,NULL),
(194,'administrator','tessadt2aa','gg','2015-05-05 10:30:48',1,NULL),
(195,'administrator','tessadt2aa','yy','2015-05-05 10:30:53',1,NULL),
(196,'administrator','tessadt2aa','f','2015-05-05 10:31:35',1,NULL),
(197,'administrator','tessadt2aa','gg','2015-05-05 10:31:37',1,NULL),
(198,'administrator','tessadt2aa','ff','2015-05-05 10:32:14',1,NULL),
(199,'administrator','tessadt2aa','yy','2015-05-05 10:32:17',1,NULL),
(200,'administrator','tessadt2aa','tt','2015-05-05 10:32:19',1,NULL),
(201,'administrator','tessadt2aa','tt','2015-05-05 10:32:43',1,NULL),
(202,'administrator','tessadt2aa','tt','2015-05-05 10:32:46',1,NULL),
(203,'administrator','tessadt2aa','aa','2015-05-05 10:33:44',1,NULL),
(204,'administrator','tessadt2aa','f','2015-05-05 10:33:49',1,NULL),
(205,'administrator','tessadt2aa','tt','2015-05-05 10:34:36',1,NULL),
(206,'administrator','tessadt2aa','aa','2015-05-05 10:34:55',1,NULL),
(207,'administrator','tessadt2aa','aa','2015-05-05 10:35:09',1,NULL),
(208,'administrator','tessadt2aa','aa','2015-05-05 10:35:23',1,NULL),
(209,'administrator','tessadt2aa','99aa','2015-05-05 10:35:30',1,NULL),
(210,'administrator','tessadt2aa','9897','2015-05-05 10:35:36',1,NULL),
(211,'administrator','tessadt2aa','9897','2015-05-05 10:35:51',1,NULL),
(212,'administrator','tessadt2aa',':)','2015-05-06 14:15:54',1,NULL),
(213,'administrator','tessadt2aa',':)','2015-05-06 14:15:58',1,NULL),
(214,'administrator','tessadt2aa','s:','2015-05-06 14:15:59',1,NULL),
(215,'administrator','tessadt2aa','s','2015-05-06 14:16:15',1,NULL),
(216,'administrator','tessadt2aa',':)','2015-05-06 14:16:17',1,NULL),
(217,'administrator','tessadt2aa',':D','2015-05-06 14:16:19',1,NULL),
(218,'administrator','tessadt2aa',':)','2015-05-06 14:16:21',1,NULL),
(219,'tessadt2aa','administrator',':)','2015-05-06 14:16:42',1,NULL),
(220,'tessadt2aa','administrator',':D','2015-05-06 14:16:44',1,NULL),
(221,'tessadt2aa','administrator','-:D','2015-05-06 14:16:51',1,NULL),
(222,'1','2','testing','2023-01-23 03:09:01',0,NULL),
(223,'1','2','kkkkkkkkkkk','2023-01-23 03:07:01',0,NULL);

/*Table structure for table `tblemotions` */

DROP TABLE IF EXISTS `tblemotions`;

CREATE TABLE `tblemotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `tblemotions` */

insert  into `tblemotions`(`id`,`word`,`img`) values 
(1,'0:-)','angel.gif'),
(2,':)','smile.gif'),
(3,':(','sad.gif'),
(4,';)','wink.gif'),
(5,':P','blum3.gif'),
(6,'8)','dirol.gif'),
(7,'@=','bomb.gif'),
(8,':diablo:','diablo.gif'),
(9,':music:','music2.gif'),
(10,'*KISSED*','air_kiss.gif'),
(11,'*TIRED*','boredom.gif'),
(12,'*STOP*','stop.gif'),
(13,'*KISSING*','kiss_3.gif'),
(14,'*GOOD*','good.gif'),
(15,'*DRINK*','drinks.gif'),
(16,'*IN_LOVE*','man_in_love.gif'),
(17,':WACKO:','wacko.gif'),
(18,'*WASSUP*','mamba.gif'),
(19,'*BRAVO*','clapping.gif'),
(20,'*ROFL*','rofl.gif'),
(21,'*PARDON*','pardon.gif'),
(22,'*NO*','nea.gif'),
(23,'*LOL*','lol.gif'),
(24,'*CRAZY*','crazy.gif'),
(25,'*DONT_KNOW*','dntknw.gif'),
(26,'*SORRY*','sorry2.gif'),
(27,'*YAHOO*','yahoo.gif'),
(28,'*DANCE*','dance4.gif'),
(29,'*db*','pleasantry.gif'),
(30,'*HAPPY*','i-m_so_happy.gif'),
(31,'*HELP*','help.gif'),
(32,'/m/','new_russian.gif'),
(33,'*OK*','ok.gif'),
(34,'*ACUTE*','acute.gif'),
(35,'*BB*','bb.gif'),
(36,'*BYE*','bye.gif'),
(37,'*HI*','hi.gif'),
(38,'*SCRATCH*','scratch_one-s_head.gif'),
(39,'*YES!*','yes2.gif'),
(40,'*SMOKE*','smoke.gif'),
(41,'*BOSS*','big_boss.gif'),
(42,'*SARCASTIC*','sarcastic.gif'),
(43,'*BOAST*','boast.gif'),
(44,'*HOHO*','prankster2.gif'),
(45,'*SHOUT*','shout.gif'),
(46,'*VAVA*','black_eye.gif'),
(47,'*SEARCH*','search.gif'),
(48,'*BEACH*','beach.gif'),
(49,'*FOCUS*','focus.gif'),
(50,'*HUNTER*','hunter.gif'),
(51,'*GIRL_CRY*','girl_cray2.gif'),
(52,'*GIRL_CRAZY*','girl_crazy.gif'),
(53,'*HOSPITAL*','girl_hospital.gif'),
(54,'*GIRL_IN_LOVE*','girl_in_love.gif'),
(55,'*PINKGLASSES*','girl_pinkglassesf.gif'),
(56,'*HYSTERIC*','hysteric.gif'),
(57,'*TENDER*','tender.gif'),
(58,'*SPRUSE_UP*','spruce_up.gif'),
(59,'*FLIRT*','flirt.gif'),
(60,'*GIVE_HEART*','give_heart.gif'),
(61,'*CURTSEY*','curtsey.gif'),
(62,'*GIRL_DRINK*','girl_drink1.gif'),
(63,'*HAHA*','girl_haha.gif'),
(64,'*IMPOSSIBLE*','girl_impossible.gif'),
(65,'*SIGH*','girl_sigh.gif'),
(66,'*MOIL*','moil.gif'),
(67,'*YES*','yes3.gif'),
(68,'*MEGA_SHOK*','swoon2.gif'),
(69,'*THANK*','thank_you.gif'),
(70,'*KING*','king.gif'),
(71,'*LAZY*','lazy.gif'),
(72,'*FRIEND*','friends.gif'),
(73,'*PUNISH*','punish.gif'),
(74,'*WIZARD*','wizard.gif'),
(75,'*V*','victory.gif'),
(76,'*SPITEFUL*','spiteful.gif'),
(77,'*TEASE*','tease.gif'),
(78,'*SCARE*','scare.gif'),
(79,'*THIS*','this.gif'),
(80,'*PAINT*','paint2.gif'),
(81,'*TRAINING*','training1.gif'),
(82,'*PARTY*','party2.gif'),
(83,'*HELLO*','preved.gif'),
(84,'*MAIL*','mail1.gif'),
(85,'*WALL*','dash1.gif'),
(86,'*VAMPIRE*','vampire.gif'),
(87,'*GAMER*','gamer4.gif'),
(88,'*POPCORN*','popcorm1.gif'),
(89,'*IREFUL*','ireful1.gif'),
(90,':-)','smile.gif'),
(91,':-(','sad.gif'),
(92,';-)','wink.gif'),
(93,':p','blum3.gif'),
(94,':-P','blum3.gif'),
(95,'8-)','dirol.gif'),
(96,':-D','biggrin.gif'),
(97,':-[','blush2.gif'),
(98,'o_o','shok.gif'),
(99,':-*','kiss2.gif'),
(100,';-(','cray2.gif'),
(101,':-X','secret.gif'),
(102,':x','secret.gif'),
(103,':-@','aggressive.gif'),
(104,':-|','fool.gif'),
(105,':-/','beee.gif'),
(106,'8P','mosking.gif'),
(107,':-!','bad.gif'),
(108,'(F)','give_rose.gif');

/*Table structure for table `tbllikes` */

DROP TABLE IF EXISTS `tbllikes`;

CREATE TABLE `tbllikes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `liker` int(11) NOT NULL,
  `liked` int(11) NOT NULL,
  `operation` enum('like','pass') CHARACTER SET latin1 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `tbllikes` */

insert  into `tbllikes`(`like_id`,`liker`,`liked`,`operation`,`time`) values 
(1,3,1,'like','2014-09-22 19:48:24'),
(2,1,3,'like','2014-09-23 18:53:39'),
(3,1,4,'pass','2014-09-24 09:41:52'),
(4,1,7,'like','2014-09-24 09:41:55'),
(5,1,57,'like','2014-09-24 11:10:41'),
(6,1,58,'pass','2014-09-24 11:10:53'),
(7,1,61,'like','2014-09-25 04:38:15'),
(8,1,63,'pass','2014-09-25 04:38:17'),
(9,184,144,'pass','2014-10-14 15:24:12'),
(10,184,145,'like','2014-10-14 15:24:19'),
(11,184,146,'pass','2014-10-14 15:24:22'),
(12,184,147,'pass','2014-10-14 15:24:54'),
(13,184,148,'like','2014-10-14 15:25:06'),
(14,184,149,'like','2014-10-14 15:25:14'),
(15,184,150,'like','2014-10-14 15:25:20'),
(16,186,144,'pass','2014-11-08 23:18:35'),
(17,186,145,'like','2014-11-08 23:18:38'),
(18,186,146,'like','2014-11-08 23:18:41'),
(19,186,147,'like','2014-11-08 23:18:55'),
(20,186,148,'like','2014-11-08 23:20:21'),
(21,1,66,'like','2015-01-24 13:38:13'),
(22,1,68,'like','2015-02-04 22:17:17'),
(23,1,69,'pass','2015-02-04 22:17:20'),
(24,1,73,'pass','2015-02-04 22:17:25'),
(25,1,83,'pass','2015-02-04 22:17:27'),
(26,1,84,'pass','2015-02-04 22:18:49'),
(27,1,85,'pass','2015-02-04 22:18:51'),
(28,1,86,'like','2015-02-04 22:18:52'),
(29,1,88,'like','2015-02-04 22:18:54'),
(30,1,91,'pass','2015-02-04 22:18:56');

/*Table structure for table `tblphotos` */

DROP TABLE IF EXISTS `tblphotos`;

CREATE TABLE `tblphotos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8;

/*Data for the table `tblphotos` */

insert  into `tblphotos`(`photo_id`,`user_id`,`photo`) values 
(172,1,'My house!'),
(173,1,'Some flowers'),
(176,1,'My garden!ff'),
(188,1,''),
(190,9,''),
(191,1,''),
(192,1,''),
(195,1,'WIN_20220723_16_52_47_Pro.jpg_W36cKxtd'),
(196,1,'xmX3pHtR_WIN_20220723_16_52_52_Pro.jpg');

/*Table structure for table `tblplans` */

DROP TABLE IF EXISTS `tblplans`;

CREATE TABLE `tblplans` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `title` text,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

/*Data for the table `tblplans` */

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `deleted` int(1) unsigned DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `looking_for` varchar(100) DEFAULT NULL,
  `age_from` int(11) DEFAULT NULL,
  `age_to` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '1-Users ,0 = Admin',
  `register_date` datetime DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblusers` */

insert  into `tblusers`(`user_id`,`password`,`email`,`photo`,`location`,`gender`,`activation_code`,`deleted`,`name`,`phone`,`looking_for`,`age_from`,`age_to`,`dob`,`role`,`register_date`,`about`) values 
(1,'admin','briannkhata@gmail.com',NULL,'Blantyre','Male','',NULL,'Brian Nkhata','0888015904',NULL,18,24,'1991-09-20',1,'2023-01-16 11:01:30','Am cool'),
(2,'d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,'Lilongwe','Male','',NULL,'Joe Doe','0999999999999','Man',18,30,'2001-10-30',1,'2023-01-16 11:01:10',NULL);

/*Table structure for table `tblviews` */

DROP TABLE IF EXISTS `tblviews`;

CREATE TABLE `tblviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

/*Data for the table `tblviews` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
