# Host: localhost  (Version 5.5.5-10.1.26-MariaDB)
# Date: 2019-11-19 18:17:55
# Generator: MySQL-Front 6.1  (Build 1.16)


#
# Structure for table "primary_foci"
#

DROP TABLE IF EXISTS `primary_foci`;
CREATE TABLE `primary_foci` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) DEFAULT NULL,
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

INSERT INTO `primary_foci` VALUES (1,2018,1,'Increase number of tourist visit','Tourism has become one of the fastest growing and most important economic sectors\r\nin the world, benefiting destinations and communities worldwide, driving inclusive\r\neconomic growth and soci',200000,'2020-10-24','2019-10-24 04:36:14','2019-10-24 04:36:14'),(3,2018,5,'Final Draft NEAF','dsdf',200000,'2019-10-24','2019-10-24 07:54:12','2019-10-24 07:54:12'),(4,2019,1,'LAUNCH OF BHUTAN PISA-D NATIONAL REPORT','asdsda',312123,'2019-11-19','2019-11-19 11:54:22','2019-11-19 11:54:22');
