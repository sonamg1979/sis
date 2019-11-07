# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2019-11-07 11:25:46
# Generator: MySQL-Front 6.1  (Build 1.16)


#
# Structure for table "activities"
#

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `f_year` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` int(11) NOT NULL,
  `subsector` int(11) NOT NULL,
  `budget` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_line` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `allotted_budget` double(11,3) NOT NULL DEFAULT '0.000',
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `site_engineer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "activities"
#

INSERT INTO `activities` VALUES (1,'2018-2019',1,5,'01','Dzong Renovation','Current',3.500,'2019-07-01','2020-09-07','200107136','C','','2019-09-07 07:05:19','2019-09-19 05:44:09'),(32,'2018-2019',6,28,'01','Specialization courses for doctors nurses and technologists','Current',10.000,'2019-07-01','2019-07-15','200107136','A','',NULL,NULL),(33,'2018-2019',6,28,'01','Continuation of long term HRD programs for doctors, nurses and technologists','Current',64.760,'2019-07-02','2019-07-16','200107136','N','',NULL,NULL),(34,'2018-2019',6,28,'04','Implementation of Health Human Resource Masterplan','Capital',14.280,'2019-07-03','2019-07-17',NULL,'N','',NULL,NULL),(35,'2018-2019',6,28,'01','Construction of traditional medicine units','Current',13.951,'2019-07-04','2019-07-18',NULL,'N','',NULL,NULL),(36,'2018-2019',6,28,'01','Procurement of ambulances','Current',9.000,'2019-07-05','2019-07-19',NULL,'N','',NULL,NULL),(37,'2018-2019',6,28,'06','HIV/AIDS control activities','Capital',15.576,'2019-07-06','2019-07-20',NULL,'N','',NULL,NULL),(38,'2018-2019',6,28,'01','Procurement of spare parts/ accessories of medical equipment','Current',10.000,'2019-07-07','2019-07-21',NULL,'N','',NULL,NULL),(39,'2018-2019',6,28,'01','Procurement of medical equipment','Current',60.000,'2019-07-08','2019-07-22',NULL,'N','',NULL,NULL),(40,'2018-2019',6,28,'02','Construction of Dangdung BHU I','Current',20.600,'2019-07-09','2019-07-23',NULL,'N','',NULL,NULL),(41,'2018-2019',5,25,'03','Construction and development of infrastructures for Central Schools','Current',7.500,'2019-07-10','2019-07-24',NULL,'N','',NULL,NULL),(42,'2018-2019',5,25,'05','Establishment of 23 new community ECCD centres with water sanitation and hygiene facilities','Capital',29.900,'2019-07-11','2019-07-25','200107136','N','',NULL,NULL),(43,'2018-2019',5,25,'01','Professional development of teachers','Capital',116.848,'2019-07-12','2019-07-26','200107136','N','',NULL,NULL),(44,'2018-2019',5,25,'01','Setting up of computer labs for schools','Current',30.000,'2019-07-13','2019-07-27','200107136','N','',NULL,NULL),(45,'2018-2019',5,25,'01','Winter Youth Engagement Programme for girls','Current',5.730,'2019-07-14','2019-07-28','200107136','N','',NULL,NULL),(46,'2018-2019',5,25,'02','Expansion of school infrastructure initiated at all LSS','Capital',20.000,'2019-07-15','2019-07-29','200107136','N','',NULL,NULL),(47,'2018-2019',1,1,'01','Nimshong Lhakhang Renovation','Current',3.500,'2019-10-23','2019-10-31','200107136','O','','2019-10-23 05:30:33','2019-10-23 05:30:33');

#
# Structure for table "admins"
#

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` int(11) DEFAULT NULL,
  `subsector` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admins"
#

INSERT INTO `admins` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$vnd.OeY/SzUev2gCTi8bz.910AcGDOEDLo5rSm6q1yyLycZznaARC',1,5,NULL,NULL,NULL,'200107136'),(2,'Testimonial','sgyeltshen@bcsea.bt',NULL,'$2y$10$Vw0iGLW2R/qPMr.z1W3fCOKK9jEyHll0iL.2KlsPjYyRjSTM3Lj2m',1,1,NULL,'2019-09-04 06:41:20','2019-09-04 06:41:20',''),(3,'hooo','abc@abc.com',NULL,'ssss',1,2,NULL,'2019-11-05 14:20:30','2019-11-05 14:20:30','');

#
# Structure for table "age_groups"
#

DROP TABLE IF EXISTS `age_groups`;
CREATE TABLE `age_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `age_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "age_groups"
#

INSERT INTO `age_groups` VALUES (1,'0-4',NULL,NULL),(2,'5-9',NULL,NULL),(3,'10-14',NULL,NULL),(4,'15-19',NULL,NULL),(5,'20-24',NULL,NULL),(6,'25-29',NULL,NULL),(7,'30-34',NULL,NULL),(8,'35-39',NULL,NULL),(9,'40-44',NULL,NULL),(10,'45-49',NULL,NULL),(11,'50-54',NULL,NULL),(12,'55-59',NULL,NULL),(13,'60-64',NULL,NULL),(14,'65-69',NULL,NULL),(15,'70-74',NULL,NULL),(16,'75+',NULL,NULL);

#
# Structure for table "agri_facilities"
#

DROP TABLE IF EXISTS `agri_facilities`;
CREATE TABLE `agri_facilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `wet` double(15,2) NOT NULL,
  `c_wet` double(15,2) NOT NULL,
  `dry` double(15,2) NOT NULL,
  `c_dry` double(15,2) NOT NULL,
  `orchard` double(15,2) NOT NULL,
  `c_orchard` double(15,2) NOT NULL,
  `food_processing` int(11) NOT NULL,
  `mills` int(11) NOT NULL,
  `tradition_mills` int(11) NOT NULL,
  `oil_expeller` int(11) NOT NULL,
  `corn_flake` int(11) NOT NULL,
  `electric_dryer` int(11) NOT NULL,
  `potatoe_fryer` int(11) NOT NULL,
  `power_tiller` int(11) NOT NULL,
  `tractor` int(11) NOT NULL DEFAULT '0',
  `transplanter` int(11) NOT NULL DEFAULT '0',
  `grass_cutter` int(11) NOT NULL,
  `green_house` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "agri_facilities"
#

INSERT INTO `agri_facilities` VALUES (1,5,256.00,250.00,250.00,250.00,200.00,230.00,1,1,1,0,0,1,1,1,2,2,1,5,'2019-11-05 11:37:58','2019-11-05 11:37:58');

#
# Structure for table "agricategories"
#

DROP TABLE IF EXISTS `agricategories`;
CREATE TABLE `agricategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "agricategories"
#

INSERT INTO `agricategories` VALUES (1,'Cereal Crops',NULL,NULL),(2,'Major Fruits/Nuts  & mushroom production',NULL,NULL),(3,'Major Vegetables, Spices & Oilseeds production',NULL,NULL);

#
# Structure for table "agrigenerals"
#

DROP TABLE IF EXISTS `agrigenerals`;
CREATE TABLE `agrigenerals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL DEFAULT '0',
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `length` double(15,2) DEFAULT NULL,
  `benefeciaries` int(11) DEFAULT NULL,
  `area` double(15,2) DEFAULT NULL,
  `construct_mode` int(11) NOT NULL DEFAULT '0',
  `construct_type` int(11) NOT NULL DEFAULT '0',
  `chennel_type` int(11) DEFAULT NULL,
  `associations` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `male` int(11) NOT NULL DEFAULT '0',
  `female` int(11) NOT NULL DEFAULT '0',
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "agrigenerals"
#

INSERT INTO `agrigenerals` VALUES (1,2018,30,'2008.70',7001.60,236,250.00,1,1,2,'Y',2559,335,'F',NULL,'2019-09-26 07:48:35','2019-09-26 08:05:58'),(2,2018,5,'sadasd',12.00,2000,500.00,1,1,1,'Y',234,655,'F','dsfsdfdsfdsassad\r\nasdasd','2019-11-03 12:31:23','2019-11-03 13:26:44');

#
# Structure for table "agriproductions"
#

DROP TABLE IF EXISTS `agriproductions`;
CREATE TABLE `agriproductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `area_number` double(11,2) NOT NULL,
  `productions` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "agriproductions"
#

INSERT INTO `agriproductions` VALUES (1,30,2018,1,32,473.00,288.00,'2019-09-28 08:45:19','2019-09-28 09:14:56'),(2,30,2018,1,33,300.00,500.00,NULL,NULL),(3,5,2018,1,63,250.00,1255.00,'2019-11-05 11:36:48','2019-11-05 11:36:48');

#
# Structure for table "agriproducts"
#

DROP TABLE IF EXISTS `agriproducts`;
CREATE TABLE `agriproducts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "agriproducts"
#

INSERT INTO `agriproducts` VALUES (63,1,'Paddy',NULL,NULL),(64,1,'Maize',NULL,NULL),(65,1,'Wheat',NULL,NULL),(66,1,'Barley',NULL,NULL),(67,1,'Buckwheat',NULL,NULL),(68,1,'Millet',NULL,NULL),(69,1,'Mustard',NULL,NULL),(70,3,'Chilli',NULL,NULL),(71,3,'Potato',NULL,NULL),(72,3,'Cabbage',NULL,NULL),(73,3,'Caulifliwer',NULL,NULL),(74,3,'broccoli',NULL,NULL),(75,3,'beans',NULL,NULL),(76,3,'soyanean',NULL,NULL),(77,3,'Green Leaves',NULL,NULL),(78,3,'gourd ',NULL,NULL),(79,3,'asparagus',NULL,NULL),(80,3,'Brinjal',NULL,NULL),(81,3,'Radish',NULL,NULL),(82,3,'carrot',NULL,NULL),(83,3,'turnip',NULL,NULL),(84,3,'ginger',NULL,NULL),(85,3,'garlic',NULL,NULL),(86,3,'bulb onion ',NULL,NULL),(87,3,'cucumber',NULL,NULL),(88,3,'pumkin',NULL,NULL),(89,3,'tree tomato',NULL,NULL),(90,3,'zanthoxylum',NULL,NULL),(91,3,'Cardamom',NULL,NULL),(92,3,'Green tea',NULL,NULL),(93,2,'Mandarin',NULL,NULL),(94,2,'Mango',NULL,NULL),(95,2,'Pear',NULL,NULL),(96,2,'peach',NULL,NULL),(97,2,'plum',NULL,NULL),(98,2,'apple',NULL,NULL),(99,2,'walnut',NULL,NULL),(100,2,'banana',NULL,NULL),(101,2,'persimmom',NULL,NULL),(102,2,'Pomegranate',NULL,NULL),(103,2,'Log Mushroom',NULL,NULL);

#
# Structure for table "animal_types"
#

DROP TABLE IF EXISTS `animal_types`;
CREATE TABLE `animal_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "animal_types"
#

INSERT INTO `animal_types` VALUES (1,'Cattle',NULL,NULL),(2,'Yak',NULL,NULL),(3,'Buffalo',NULL,NULL),(4,'Zo/Zom',NULL,NULL),(5,'Equine',NULL,NULL),(6,'Pig',NULL,NULL),(7,'Poultry',NULL,NULL),(8,'Sheep',NULL,NULL),(9,'Goat',NULL,NULL),(10,'Cat',NULL,NULL),(11,'Dog',NULL,NULL);

#
# Structure for table "budgets"
#

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE `budgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `budget_code` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "budgets"
#

INSERT INTO `budgets` VALUES (1,'01','RGOB',NULL,NULL),(2,'02','GOI',NULL,NULL),(3,'03','RGOB/GOI',NULL,NULL),(4,'04','WHO',NULL,NULL),(5,'05','UNICEF',NULL,NULL),(6,'06','GFATM',NULL,NULL);

#
# Structure for table "chennel_types"
#

DROP TABLE IF EXISTS `chennel_types`;
CREATE TABLE `chennel_types` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `chennel_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "chennel_types"
#

INSERT INTO `chennel_types` VALUES (1,'RCC',NULL,NULL),(2,'Earthen',NULL,NULL),(3,'Pipe',NULL,NULL);

#
# Structure for table "class"
#

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

#
# Data for table "class"
#

INSERT INTO `class` VALUES (1,'PP',NULL,NULL),(2,'I',NULL,NULL),(3,'II',NULL,NULL),(4,'III',NULL,NULL),(5,'IV',NULL,NULL),(6,'V',NULL,NULL),(7,'VI',NULL,NULL),(8,'VII',NULL,NULL),(9,'VIII',NULL,NULL),(10,'IX',NULL,NULL),(11,'X',NULL,NULL),(12,'XI',NULL,NULL),(13,'XII',NULL,NULL);

#
# Structure for table "construct_modes"
#

DROP TABLE IF EXISTS `construct_modes`;
CREATE TABLE `construct_modes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `construct_mode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "construct_modes"
#

INSERT INTO `construct_modes` VALUES (1,'CMU',NULL,NULL),(2,'Contract',NULL,NULL);

#
# Structure for table "construct_types"
#

DROP TABLE IF EXISTS `construct_types`;
CREATE TABLE `construct_types` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `construct_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "construct_types"
#

INSERT INTO `construct_types` VALUES (1,'New Construction',NULL,NULL),(2,'Maintenance',NULL,NULL);

#
# Structure for table "cultures"
#

DROP TABLE IF EXISTS `cultures`;
CREATE TABLE `cultures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) DEFAULT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heritage_type` int(11) NOT NULL,
  `estdyear` char(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "cultures"
#

INSERT INTO `cultures` VALUES (1,1,'Trongsa Chhoetse-Dzong','Trongsa',2,'1617','Trongsa Dzong, the largest dzong at a striking location, is an important administrative building, providing the headquarters of the government of Trongsa District. Trongsa provides a strategic central location to control Bhutan and for centuries it was the seat of the Wangchuck dynasty of penlops (governors) who effectively ruled over much of eastern and central Bhutan, and from 1907 have been Kings of Bhutan. It is also a major monastic complex, with around 200 monks. During the summer months, the monastic community often relocates to Kurje Monastery in the Bumthang Valley. It contains a notable printing house, responsible for the printing of many religious texts in Bhutan.).[1][4][5] It is listed as a tentative site in Bhutan\'s Tentative List for UNESCO inclusion.','Trongsa-Dzong-Fortress-in-Bhutan_1571838936.jpg','2019-10-23 13:55:36','2019-10-23 14:35:28');

#
# Structure for table "designations"
#

DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "designations"
#

INSERT INTO `designations` VALUES (1,'Dzongda',1,NULL,NULL),(2,'Dzongrab',2,NULL,NULL),(3,'Executive Engineer',3,NULL,'2019-11-06 10:15:53'),(4,'Dzongkhag Education Officer',3,NULL,NULL);

#
# Structure for table "electric_fencings"
#

DROP TABLE IF EXISTS `electric_fencings`;
CREATE TABLE `electric_fencings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double(15,2) NOT NULL,
  `beneficiaries` int(11) NOT NULL,
  `dry` double(15,2) NOT NULL,
  `wet` double(15,2) NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "electric_fencings"
#

INSERT INTO `electric_fencings` VALUES (2,2018,5,'Trongsa',15.00,200,5.00,2.00,'C','1','ug','2019-11-05 11:40:01','2019-11-05 11:40:01');

#
# Structure for table "engineers"
#

DROP TABLE IF EXISTS `engineers`;
CREATE TABLE `engineers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `engineer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` date NOT NULL,
  `observation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "engineers"
#

INSERT INTO `engineers` VALUES (2,5,1,'200107136','2019-10-25','The purpose of the site visit evaluation is to obtain in-depth information concerning all administrative and educational aspects of the program. In addition, the site visit permits a team of Commission-appointed peers to assess a program\'s compliance with the Accreditation Standards and with its own stated goals and objectives. The site visit verifies and supplements the information contained in the comprehensive self-study document completed by the institution. Information provided in the self-study is confirmed, documentation is reviewed, interviews are conducted and the program is observed by the visiting committee. Information related to the site visit is viewed as confidential.\n','C','2019-10-24 07:09:16','2019-10-24 08:05:56'),(3,5,32,'200107136','2019-09-19','The purpose of the site visit evaluation is to obtain in-depth information concerning all administrative and educational aspects of the program. In addition, the site visit permits a team of Commission-appointed peers to assess a program\'s compliance with the Accreditation Standards and with its own stated goals and objectives. The site visit verifies and supplements the information contained in the comprehensive self-study document completed by the institution. Information provided in the self-study is confirmed, documentation is reviewed, interviews are conducted and the program is observed by the visiting committee. Information related to the site visit is viewed as confidential.','A','2019-10-24 08:06:42','2019-10-24 08:06:42');

#
# Structure for table "events"
#

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `events` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "events"
#

INSERT INTO `events` VALUES (1,5,2019,'LAUNCH OF BHUTAN PISA-D NATIONAL REPORT','2019-10-25','2019-10-25','2019-10-25 02:53:58','2019-10-25 02:53:58'),(2,5,2019,'Tshechu','2019-10-26','2019-10-26','2019-10-25 05:09:30','2019-10-25 05:09:30'),(3,5,2019,'LAUNCH OF BHUTAN PISA-D NATIONAL REPORT','2019-11-05','2019-11-05','2019-11-05 04:58:30','2019-11-05 04:58:30'),(4,5,2019,'Minimum number of candidates required to register for a subject','2019-11-15','2019-11-15','2019-11-05 04:58:57','2019-11-05 04:58:57'),(5,6,2019,'September 11, 2001. In this Sept.','2019-11-01','0000-00-00',NULL,NULL),(6,7,2019,'President Barack Obama\'s election. ...','2019-11-02','0000-00-00',NULL,NULL),(7,8,2019,'The tech revolution. ...','2019-11-03','0000-00-00',NULL,NULL),(8,9,2019,'JFK\'s assassination. ...','2019-11-04','0000-00-00',NULL,NULL),(9,10,2019,'The Vietnam War. ...','2019-11-05','0000-00-00',NULL,NULL),(10,1,2019,'The Iraq/Afghanistan Wars. ...','2019-11-06','0000-00-00',NULL,NULL),(11,2,2019,'The moon landing. ...','2019-11-07','0000-00-00',NULL,NULL),(12,3,2019,'The fall of the Berlin Wall/end of the Cold War. ...','2019-11-08','0000-00-00',NULL,NULL);

#
# Structure for table "farm_groups"
#

DROP TABLE IF EXISTS `farm_groups`;
CREATE TABLE `farm_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "farm_groups"
#

INSERT INTO `farm_groups` VALUES (1,2018,5,'Gomdar Phenden Tshokpa',456,'sdf-543-324432-xxx','2019-11-05 11:37:06','2019-11-05 11:37:06');

#
# Structure for table "farm_roads"
#

DROP TABLE IF EXISTS `farm_roads`;
CREATE TABLE `farm_roads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `road_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiwog` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double(15,2) NOT NULL,
  `benefeciaries` int(11) NOT NULL,
  `construct_mode` int(11) NOT NULL,
  `construct_type` int(11) NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "farm_roads"
#

INSERT INTO `farm_roads` VALUES (2,2018,5,'werwer','dsadsa',12.00,1000,1,1,'N',0,0,'C','jvjhh','2019-11-05 11:38:57','2019-11-05 11:38:57');

#
# Structure for table "fencing_type"
#

DROP TABLE IF EXISTS `fencing_type`;
CREATE TABLE `fencing_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "fencing_type"
#

INSERT INTO `fencing_type` VALUES (1,'Individual',NULL,NULL),(2,'Community',NULL,NULL);

#
# Structure for table "financial_year"
#

DROP TABLE IF EXISTS `financial_year`;
CREATE TABLE `financial_year` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` char(9) DEFAULT NULL,
  `year` char(9) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "financial_year"
#

INSERT INTO `financial_year` VALUES (1,'2018-2019','2018-2019'),(2,'2019-2020','2019-2020');

#
# Structure for table "general_infos"
#

DROP TABLE IF EXISTS `general_infos`;
CREATE TABLE `general_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `type` int(11) NOT NULL,
  `ambulance` int(11) NOT NULL DEFAULT '0',
  `doctor` int(11) NOT NULL DEFAULT '0',
  `dungtsho` int(11) NOT NULL DEFAULT '0',
  `clinicofficer` int(11) NOT NULL DEFAULT '0',
  `asstclinicofficer` int(11) NOT NULL DEFAULT '0',
  `ha` int(11) NOT NULL DEFAULT '0',
  `bhw` int(11) NOT NULL DEFAULT '0',
  `physiotherapists` int(11) NOT NULL DEFAULT '0',
  `nurses` int(11) NOT NULL DEFAULT '0',
  `sowamenpa` int(11) NOT NULL DEFAULT '0',
  `pharmacists` int(11) NOT NULL DEFAULT '0',
  `technicians` int(11) NOT NULL DEFAULT '0',
  `labtechonologist` int(11) NOT NULL DEFAULT '0',
  `vhw` int(11) NOT NULL DEFAULT '0',
  `supportstaff` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "general_infos"
#

INSERT INTO `general_infos` VALUES (1,31,2018,1,1,2,1,2,1,0,3,1,20,1,5,2,0,0,22,'2019-09-25 05:48:47','2019-09-25 06:17:34'),(2,27,2018,2,0,0,0,0,0,1,1,0,5,1,0,0,0,0,5,NULL,NULL),(3,5,2018,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2019-10-25 05:26:43','2019-10-25 05:26:43');

#
# Structure for table "health_types"
#

DROP TABLE IF EXISTS `health_types`;
CREATE TABLE `health_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "health_types"
#

INSERT INTO `health_types` VALUES (1,'Hospital',NULL,NULL),(2,'BHU grade I',NULL,NULL),(3,'BHU grade II',NULL,NULL),(4,'ORC with shed',NULL,NULL),(5,'ORC without shed',NULL,NULL),(6,'Indigenous Unit',NULL,NULL);

#
# Structure for table "heritage_type"
#

DROP TABLE IF EXISTS `heritage_type`;
CREATE TABLE `heritage_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heritage_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "heritage_type"
#

INSERT INTO `heritage_type` VALUES (1,'Palace',NULL,NULL),(2,'Dzong',NULL,NULL),(3,'Ney',NULL,NULL),(4,'Lhakhang',NULL,NULL),(5,'Monastery',NULL,NULL),(6,'Chorten',NULL,NULL),(7,'Mani Dungkhor',NULL,NULL);

#
# Structure for table "histories"
#

DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "histories"
#

INSERT INTO `histories` VALUES (1,545454,'Drukgyel High School','Teacher','2019-09-05','2019-09-05','2019-09-05 09:34:14','2019-09-06 05:05:01'),(2,545454,'Ranjung High School','Principal','2019-09-05','2019-09-05','2019-09-05 09:35:40','2019-09-05 09:35:40'),(3,545454,'Office of Gyelpo Zimpon','---','2019-09-20','2019-09-05','2019-09-05 09:59:01','2019-09-05 09:59:01'),(4,545454,'Bhutan Council for School Examinations and Assessment','Secretary','2019-09-05','2019-09-05','2019-09-05 10:02:46','2019-09-05 10:02:46');

#
# Structure for table "land_developments"
#

DROP TABLE IF EXISTS `land_developments`;
CREATE TABLE `land_developments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dry` int(11) NOT NULL,
  `wet` int(11) NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "land_developments"
#

INSERT INTO `land_developments` VALUES (2,2018,5,'Trongsamnmnbmn',152,152,'ijhj','2019-11-05 11:40:39','2019-11-05 11:40:39');

#
# Structure for table "levels"
#

DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "levels"
#

INSERT INTO `levels` VALUES (1,'NA',NULL,NULL),(2,'ECCD',NULL,NULL),(3,'Primary',NULL,NULL),(4,'Lower Secondary',NULL,NULL),(5,'Middle Secondary',NULL,NULL),(6,'Higher Secondary',NULL,NULL);

#
# Structure for table "livestock_groups"
#

DROP TABLE IF EXISTS `livestock_groups`;
CREATE TABLE `livestock_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `male` int(11) NOT NULL,
  `female` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "livestock_groups"
#

INSERT INTO `livestock_groups` VALUES (1,5,2018,'sadsadsda','asdsadadsasd',123,'231','2019-11-04 10:39:15','2019-11-04 10:47:54'),(2,5,2018,'LAUNCH OF BHUTAN PISA-D NATIONAL REPORT','sdf-543-324432-xxx',200,'350','2019-11-05 11:41:25','2019-11-05 11:41:25');

#
# Structure for table "livestock_infras"
#

DROP TABLE IF EXISTS `livestock_infras`;
CREATE TABLE `livestock_infras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `ais` int(11) NOT NULL,
  `biogas` int(11) NOT NULL,
  `poultry_micro` int(11) NOT NULL,
  `poultry_commercial` int(11) NOT NULL,
  `poultry_broiler` int(11) NOT NULL,
  `diary_micro` int(11) NOT NULL,
  `diary_commercial` int(11) NOT NULL,
  `milk_processing` int(11) NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "livestock_infras"
#

INSERT INTO `livestock_infras` VALUES (2,5,1,50,5,2,1,10,20,2,'','2019-11-05 11:42:00','2019-11-05 11:42:00');

#
# Structure for table "livestockgenerals"
#

DROP TABLE IF EXISTS `livestockgenerals`;
CREATE TABLE `livestockgenerals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `animal_types` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "livestockgenerals"
#

INSERT INTO `livestockgenerals` VALUES (3,2018,29,1,11583,NULL,NULL),(4,2018,29,2,226,NULL,NULL),(5,2018,29,5,216,NULL,NULL),(6,2018,29,6,38,NULL,NULL),(7,2018,29,7,7222,NULL,NULL),(8,2018,29,8,132,NULL,NULL),(9,2018,29,9,92,NULL,NULL),(10,2018,29,10,874,NULL,NULL),(11,2018,29,11,544,NULL,NULL);

#
# Structure for table "livestockproductions"
#

DROP TABLE IF EXISTS `livestockproductions`;
CREATE TABLE `livestockproductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "livestockproductions"
#

INSERT INTO `livestockproductions` VALUES (2,2018,29,2,500,'2019-09-28 11:52:25','2019-09-28 11:52:25'),(3,2018,29,3,400,NULL,NULL),(4,2018,29,4,200,NULL,NULL),(5,2018,5,1,2500,'2019-11-05 11:42:18','2019-11-05 11:42:18'),(6,2018,5,2,1500,'2019-11-05 11:42:37','2019-11-05 11:42:37');

#
# Structure for table "ls_product_types"
#

DROP TABLE IF EXISTS `ls_product_types`;
CREATE TABLE `ls_product_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "ls_product_types"
#

INSERT INTO `ls_product_types` VALUES (1,'Fresh Milk',NULL,NULL),(2,'Butter',NULL,NULL),(3,'Cheese',NULL,NULL),(4,'Dried Cheese (Chugu)',NULL,NULL),(5,'Eggs',NULL,NULL),(6,'Fish',NULL,NULL),(7,'Beef',NULL,NULL),(8,'Pork',NULL,NULL),(9,'Yak Meat',NULL,NULL),(10,'Mutton',NULL,NULL),(11,'Chicken',NULL,NULL),(12,'Honey',NULL,NULL),(13,'Wool',NULL,NULL);

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_25_044641_create_profiles_table',1),(4,'2019_08_28_085316_create_sector_table',1),(5,'2019_08_28_090738_create_subsector_table',1),(6,'2019_08_30_083107_create_designation_table',1),(8,'2019_09_04_072542_create_qualifications_table',2),(9,'2019_09_05_052945_create_histories_table',3),(10,'2019_09_06_111346_create_activities_table',4),(11,'2019_09_19_154332_create_population_table',5),(12,'2019_09_21_055909_create_schoolstaffinfos_table',6),(13,'2019_09_21_062054_levels',7),(14,'2019_09_21_091343_create_school_student_infos_table',8),(15,'2019_09_25_040957_create_general_infos_table',9),(16,'2019_09_26_042611_create_morbidities_table',10),(17,'2019_09_26_055456_create_agrigenerals_table',11),(18,'2019_09_26_081226_create_agriproductions_table',12),(19,'2019_09_28_103356_create_livestockgenerals_table',13),(20,'2019_09_28_113432_create_livestockproductions_table',14),(21,'2019_10_04_050854_create_years_table',15),(22,'2019_10_23_101204_create_school_infras_table',16),(23,'2019_10_23_130317_create_cultures_table',17),(24,'2019_10_24_033856_create_primary_foci_table',18),(25,'2019_10_24_054058_create_engineers_table',19),(26,'2019_10_25_022900_create_events_table',20),(27,'2019_11_03_134922_create_farm_groups_table',21),(28,'2019_11_03_143722_create_agri_facilities_table',22),(29,'2019_11_04_054025_create_land_developments_table',23),(30,'2019_11_04_061841_create_electric_fencings_table',24),(31,'2019_11_04_083838_create_farm_roads_table',25),(32,'2019_11_04_101937_create_livestock_groups_table',26),(33,'2019_11_04_112305_create_livestock_infras_table',27);

#
# Structure for table "morbidities"
#

DROP TABLE IF EXISTS `morbidities`;
CREATE TABLE `morbidities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) DEFAULT NULL,
  `subsector` int(11) NOT NULL,
  `morbidity` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "morbidities"
#

INSERT INTO `morbidities` VALUES (1,2018,31,1,2300,4030,6330,'2019-09-26 05:04:34','2019-09-26 05:31:32'),(2,2018,31,2,1200,1643,2843,'2019-09-26 05:32:39','2019-09-26 05:32:39');

#
# Structure for table "morbidity_type"
#

DROP TABLE IF EXISTS `morbidity_type`;
CREATE TABLE `morbidity_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `morbidity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "morbidity_type"
#

INSERT INTO `morbidity_type` VALUES (1,'Common cold',NULL,NULL),(2,'Other muscular-skeletal disorder',NULL,NULL),(3,'Skin infections',NULL,NULL),(4,'Peptic Ulcer Syndrome',NULL,NULL),(5,'Other disease of digestive system',NULL,NULL),(6,'Other nervous including periphery disorder',NULL,NULL),(7,'Acute Pharyngitis/Tonsillitis',NULL,NULL),(8,'Other Nervous including Peripheral Disorders',NULL,NULL),(9,'Diarrhoea',NULL,NULL),(10,'Other Respiratory  & Nose Diseases',NULL,NULL);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#

INSERT INTO `password_resets` VALUES ('super@gmail.com','$2y$10$nnsSPHQQprDa3NKiL8eSle1OGXY/WVpdIWaFxAc5z8Xjgh.iwClNu','2019-09-01 16:22:02');

#
# Structure for table "populations"
#

DROP TABLE IF EXISTS `populations`;
CREATE TABLE `populations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  `mtot` int(11) NOT NULL,
  `ftot` int(11) NOT NULL,
  `tot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "populations"
#

INSERT INTO `populations` VALUES (66,2018,16,1,177,170,347,NULL,'2019-09-20 04:24:07'),(67,2018,16,2,175,169,344,NULL,NULL),(68,2018,16,3,172,168,340,NULL,NULL),(69,2018,16,4,210,219,429,NULL,NULL),(70,2018,16,5,483,283,766,NULL,NULL),(71,2018,16,6,456,207,663,NULL,NULL),(72,2018,16,7,322,155,477,NULL,NULL),(73,2018,16,8,248,135,383,NULL,NULL),(74,2018,16,9,199,99,298,NULL,NULL),(75,2018,16,10,151,85,236,NULL,NULL),(76,2018,16,11,107,73,180,NULL,NULL),(77,2018,16,12,74,59,133,NULL,NULL),(78,2018,16,13,62,61,123,NULL,NULL),(79,2018,16,14,38,45,83,NULL,NULL),(80,2018,16,15,34,35,69,NULL,NULL),(81,2018,16,16,63,60,123,NULL,NULL),(82,2018,20,1,235,227,462,NULL,NULL),(83,2018,20,2,234,225,459,NULL,NULL),(84,2018,20,3,229,224,453,NULL,NULL),(85,2018,20,4,280,292,572,NULL,NULL),(86,2018,20,5,643,377,1020,NULL,NULL),(87,2018,20,6,608,276,884,NULL,NULL),(88,2018,20,7,430,206,636,NULL,NULL),(89,2018,20,8,331,179,510,NULL,NULL),(90,2018,20,9,265,131,396,NULL,NULL),(91,2018,20,10,201,113,314,NULL,NULL),(92,2018,20,11,143,98,241,NULL,NULL),(93,2018,20,12,98,78,176,NULL,NULL),(94,2018,20,13,82,81,163,NULL,NULL),(95,2018,20,14,51,60,111,NULL,NULL),(96,2018,20,15,45,47,92,NULL,NULL),(97,2018,20,16,84,80,164,NULL,NULL);

#
# Structure for table "primary_foci"
#

DROP TABLE IF EXISTS `primary_foci`;
CREATE TABLE `primary_foci` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` double NOT NULL,
  `complete_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "primary_foci"
#

INSERT INTO `primary_foci` VALUES (1,1,'Increase number of tourist visit','Tourism has become one of the fastest growing and most important economic sectors\r\nin the world, benefiting destinations and communities worldwide, driving inclusive\r\neconomic growth and soci',200000,'2020-10-24','2019-10-24 04:36:14','2019-10-24 04:36:14'),(3,5,'Final Draft NEAF','dsdf',200000,'2019-10-24','2019-10-24 07:54:12','2019-10-24 07:54:12');

#
# Structure for table "profiles"
#

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sector` int(11) NOT NULL,
  `subsector` int(11) NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizen` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profiles_employee_id_unique` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "profiles"
#

INSERT INTO `profiles` VALUES (1,1,1,'11111','Dorji Dema','2019-09-05','F','11803001289','B','R','pema1111111@gmail.com',1,2,'Screenshot (1)_1567655025.png','2019-09-05 03:43:45','2019-09-05 03:43:45'),(2,1,1,'545454','Tenzin Dorji','2019-09-06','M','11803001289','B','R','pema1111111@gmail.com',1,1,'Dzongda_1567751177.jpg','2019-09-06 06:26:18','2019-09-06 10:25:14'),(3,1,1,'123','dfd','2019-10-23','M','as','B','R','sonamg010@gmail.com',4,2,'9_1571838507.jpg','2019-10-23 13:48:27','2019-10-23 13:48:27'),(4,1,5,'200107136','Dorji Penjor','1979-04-01','m','11102003403','B','R','sonamg010@gmail.com',3,3,'9_1571838507.jpg',NULL,NULL);

#
# Structure for table "qualifications"
#

DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE `qualifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "qualifications"
#

INSERT INTO `qualifications` VALUES (1,'Doctorate',NULL,NULL),(2,'Masters',NULL,NULL),(3,'Bachelor',NULL,NULL),(4,'Diploma',NULL,NULL),(5,'Certificate',NULL,NULL),(6,'General-Class X or XII passed',NULL,'2019-11-06 15:38:24');

#
# Structure for table "school_infras"
#

DROP TABLE IF EXISTS `school_infras`;
CREATE TABLE `school_infras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` int(11) NOT NULL,
  `schoolname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` double NOT NULL,
  `schoollevel` int(11) NOT NULL,
  `estdyear` year(4) NOT NULL,
  `classroom` int(11) NOT NULL,
  `hall` int(11) NOT NULL,
  `football` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volleyball` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basketball` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indoor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "school_infras"
#

INSERT INTO `school_infras` VALUES (1,1,'sdsasad','sadasd',10,3,2016,10,1,'Y','Y','Y','Chess\r\nCayrom\r\nTable Tenni','2019-10-23 12:18:33','2019-10-23 12:55:10');

#
# Structure for table "school_level"
#

DROP TABLE IF EXISTS `school_level`;
CREATE TABLE `school_level` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schoollevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "school_level"
#

INSERT INTO `school_level` VALUES (1,'Primary(PP-III)',NULL,NULL),(2,'Primary(PP-VI)',NULL,NULL),(3,'Lower Secondary(PP-VIII)',NULL,NULL),(4,'Lower Secondary(VII-VIII)',NULL,NULL),(5,'Middle Secondary(PP-X)',NULL,NULL),(6,'Middle Secondary(VII-X)',NULL,NULL),(7,'Middle Secondary(IX-X)',NULL,NULL),(8,'Higher Secondary(PP-XII)',NULL,NULL),(9,'Higher Secondary(VII-XII)',NULL,NULL),(10,'Higher Secondary(IX-XII)',NULL,NULL),(11,'Higher Secondary(XI-XII)',NULL,NULL);

#
# Structure for table "school_student_infos"
#

DROP TABLE IF EXISTS `school_student_infos`;
CREATE TABLE `school_student_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `subsector` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `agerange` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "school_student_infos"
#

INSERT INTO `school_student_infos` VALUES (28,2018,32,1,121,169,154,NULL,NULL),(29,2018,32,2,124,156,153,NULL,NULL),(30,2018,32,3,127,142,139,NULL,NULL),(31,2018,32,4,130,124,106,NULL,NULL),(32,2018,32,5,133,129,140,NULL,NULL),(33,2018,32,6,136,152,160,NULL,NULL),(34,2018,32,7,139,151,147,NULL,NULL),(35,2018,32,8,142,138,148,NULL,NULL),(36,2018,32,9,145,137,137,NULL,NULL),(37,2018,32,10,148,123,154,NULL,NULL),(38,2018,32,11,151,112,126,NULL,NULL),(39,2018,32,12,154,147,174,NULL,NULL),(40,2018,32,13,157,137,156,NULL,NULL);

#
# Structure for table "schoolstaffinfos"
#

DROP TABLE IF EXISTS `schoolstaffinfos`;
CREATE TABLE `schoolstaffinfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `subsector` int(11) NOT NULL,
  `tmale` int(11) NOT NULL,
  `tfemale` int(11) NOT NULL,
  `cmale` int(11) NOT NULL,
  `cfemale` int(11) NOT NULL,
  `smale` int(11) NOT NULL,
  `sfemale` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "schoolstaffinfos"
#

INSERT INTO `schoolstaffinfos` VALUES (1,2018,32,23,23,5,1,13,30,'2019-09-21 08:23:32','2019-09-21 08:41:43');

#
# Structure for table "sector"
#

DROP TABLE IF EXISTS `sector`;
CREATE TABLE `sector` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "sector"
#

INSERT INTO `sector` VALUES (1,'Office of Dzongda','2019-08-28 00:00:00',NULL),(2,'Gup Office','2019-08-28 00:00:00',NULL),(3,'RNR Agriculture','2019-08-28 00:00:00',NULL),(4,'RNR Livestock','2019-08-28 00:00:00',NULL),(5,'Education-School','2019-08-28 00:00:00',NULL),(6,'Health- Hospital & BHU','2019-08-28 00:00:00',NULL);

#
# Structure for table "status"
#

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "status"
#

INSERT INTO `status` VALUES ('A','At Risk',NULL,NULL),('C','Completed',NULL,NULL),('H','On Hold',NULL,NULL),('N','N/A',NULL,NULL),('O','On Track',NULL,NULL);

#
# Structure for table "student_ages"
#

DROP TABLE IF EXISTS `student_ages`;
CREATE TABLE `student_ages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class` int(11) NOT NULL,
  `age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "student_ages"
#

INSERT INTO `student_ages` VALUES (120,1,'Less than 6',NULL,NULL),(121,1,'6-12',NULL,NULL),(122,1,'13 & above',NULL,NULL),(123,2,'Less than 6',NULL,NULL),(124,2,'6-12',NULL,NULL),(125,2,'13 & above',NULL,NULL),(126,3,'Less than 6',NULL,NULL),(127,3,'6-12',NULL,NULL),(128,3,'13 & above',NULL,NULL),(129,4,'Less than 6',NULL,NULL),(130,4,'6-12',NULL,NULL),(131,4,'13 & above',NULL,NULL),(132,5,'Less than 6',NULL,NULL),(133,5,'6-12',NULL,NULL),(134,5,'13 & above',NULL,NULL),(135,6,'Less than 6',NULL,NULL),(136,6,'6-12',NULL,NULL),(137,6,'13 & above',NULL,NULL),(138,7,'Less than 6',NULL,NULL),(139,7,'6-12',NULL,NULL),(140,7,'13 & above',NULL,NULL),(141,8,'Less than 13',NULL,NULL),(142,8,'13-14',NULL,NULL),(143,8,'15 & above',NULL,NULL),(144,9,'Less than 13',NULL,NULL),(145,9,'13-14',NULL,NULL),(146,9,'15 & above',NULL,NULL),(147,10,'Less than 15',NULL,NULL),(148,10,'15-16',NULL,NULL),(149,10,'17 & above',NULL,NULL),(150,11,'Less than 15',NULL,NULL),(151,11,'15-16',NULL,NULL),(152,11,'17 & above',NULL,NULL),(153,12,'Less than 17',NULL,NULL),(154,12,'17-18',NULL,NULL),(155,12,'19 & above',NULL,NULL),(156,13,'Less than 17',NULL,NULL),(157,13,'17-18',NULL,NULL),(158,13,'19 & above',NULL,NULL);

#
# Structure for table "subsector"
#

DROP TABLE IF EXISTS `subsector`;
CREATE TABLE `subsector` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subsector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "subsector"
#

INSERT INTO `subsector` VALUES (1,'Secretariat',1,'2019-08-28 00:00:00',NULL),(2,'Legal Unit',1,'2019-08-28 00:00:00',NULL),(3,'Land Sector',1,'2019-08-28 00:00:00',NULL),(4,'Statistics',1,'2019-08-28 00:00:00',NULL),(5,'Engineering',1,'2019-08-28 00:00:00',NULL),(6,'Environment',1,'2019-08-28 00:00:00',NULL),(7,'HR',1,'2019-08-28 00:00:00',NULL),(8,'Procurement',1,'2019-08-28 00:00:00',NULL),(9,'Internal Audit',1,'2019-08-28 00:00:00',NULL),(10,'Planning',1,'2019-08-28 00:00:00',NULL),(11,'Accounts',1,'2019-08-28 00:00:00',NULL),(12,'ICT',1,'2019-08-28 00:00:00',NULL),(13,'Election',1,'2019-08-28 00:00:00',NULL),(14,'Culture',1,'2019-08-28 00:00:00',NULL),(15,'DYT Secretary',1,'2019-08-28 00:00:00',NULL),(16,'Dzongkhag Agriculture Office',1,'2019-08-28 00:00:00',NULL),(17,'Dzongkhag livestock Office',1,'2019-08-28 00:00:00',NULL),(18,'Dzongkhag Education Office',1,'2019-08-28 00:00:00',NULL),(19,'Dzongkhag Health Office',1,'2019-08-28 00:00:00',NULL),(20,'Darkteng Gewog',2,NULL,NULL),(21,'Korphu Gewog',2,NULL,NULL),(22,'Nubi Geowg',2,NULL,NULL),(23,'Langthel Gewog',2,NULL,NULL),(24,'Tangsibji Gewog',2,NULL,NULL),(34,'Darkteng Agriculture Office',3,NULL,NULL),(35,'Korphu Agriculture Office',3,NULL,NULL),(36,'Nubi Agriculture Office',3,NULL,NULL),(37,'Langthel Agriculture Office',3,NULL,NULL),(38,'Tangsibji Agriculture Office',3,NULL,NULL),(39,'Darkteng livestock Office',4,NULL,NULL),(40,'Korphu livestock Office',4,NULL,NULL),(41,'Nubi livestock Office',4,NULL,NULL),(42,'Langthel livestock Office',4,NULL,NULL),(43,'Tangsibji livestock Office',4,NULL,NULL),(44,'Baleng Primary School',5,NULL,NULL),(45,'Jangbi Community School',5,NULL,NULL),(46,'Samcholing Middle Secondary School',5,NULL,NULL),(47,'Sherubling Central School',5,NULL,NULL),(48,' Kingarepten Lower Secondary School',5,NULL,NULL),(49,'Samcholing Community School',5,NULL,NULL),(50,'Langthel Lower Secondary School',5,NULL,NULL),(51,'Bjeezam Primary School',5,NULL,NULL),(52,'Taktse Righung Higher Secondary School',5,NULL,NULL),(53,'Tshangkha Lower Secondary School',5,NULL,NULL),(54,'Nimshong Primary School',5,NULL,NULL),(55,'Nabji Community Primary School',5,NULL,NULL),(56,'Korphu Primary School',5,NULL,NULL);

#
# Structure for table "supers"
#

DROP TABLE IF EXISTS `supers`;
CREATE TABLE `supers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `superadmin_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "supers"
#

INSERT INTO `supers` VALUES (1,'Super Administrator','super@gmail.com',NULL,'$2y$10$vnd.OeY/SzUev2gCTi8bz.910AcGDOEDLo5rSm6q1yyLycZznaARC',NULL,NULL,NULL);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Sonam Gyeltshen','sgyeltshen@bcsea.bt',NULL,'$2y$10$vnd.OeY/SzUev2gCTi8bz.910AcGDOEDLo5rSm6q1yyLycZznaARC',NULL,'2019-09-01 07:38:26','2019-09-01 07:38:26');

#
# Structure for table "years"
#

DROP TABLE IF EXISTS `years`;
CREATE TABLE `years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `f_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "years"
#

INSERT INTO `years` VALUES (1,2018,'2018-2019',NULL,NULL),(2,2019,'2019-2020',NULL,NULL);
