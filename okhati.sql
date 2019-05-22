/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.5.5-10.1.35-MariaDB : Database - okhati_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`category_name`,`slug`,`details`,`deleted_at`,`created_at`,`updated_at`,`status`) values (1,'Antipyretics','antipyretics','reducing fever (pyrexia/pyresis)',NULL,'2019-02-27 09:20:19','2019-02-27 09:20:19','available'),(2,'Prescription','pres','Prescription',NULL,'2019-03-25 12:08:31','2019-03-25 12:08:31','available'),(3,'Non  Prescription','nonpres','non Prescription',NULL,'2019-03-25 12:08:55','2019-03-25 12:08:55','available');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_02_26_102448_products',1),(4,'2019_02_26_102901_create_categories_table',1),(5,'2019_02_26_114933_create_orders_table',1),(6,'2019_02_26_115428_create_shipping_table',1),(7,'2019_02_26_120200_create_payment_table',1),(8,'2019_02_27_062005_create_permission_tables',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'\\App\\User',1),(2,'App\\User',3);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'edit-product','web','2019-02-27 07:00:03','2019-02-27 07:00:03'),(2,'delete-product','web','2019-02-27 07:00:03','2019-02-27 07:00:03'),(3,'list-product','web','2019-02-27 07:00:03','2019-02-27 07:00:03'),(4,'create-product','web','2019-02-27 07:00:03','2019-02-27 07:00:03');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfd` date NOT NULL,
  `exp_date` date NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) unsigned NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`product_name`,`mfd`,`exp_date`,`company`,`currency`,`price`,`details`,`status`,`deleted_at`,`created_at`,`updated_at`,`image`,`type`) values (1,1,'Acetaminophen','2019-02-01','2019-02-28','Acetaminophen',NULL,250,'reducing fever (pyrexia/pyresis)','available',NULL,'2019-02-27 09:20:54','2019-03-25 09:09:57','59227ca9e63b565bcdade8d2a688d35d.jpg',NULL),(2,1,'Ativan','2019-02-01','2019-02-28','Ativan',NULL,250,'reducing pain (painkillers)','available',NULL,'2019-02-27 09:21:21','2019-03-25 09:10:04','a9e31fa1c9d2d12c8eae7e78a3d7a494.jpg',NULL),(3,2,'Flomax','2019-02-28','2019-03-30','Acetaminophen',NULL,15,'Common side effects of Flomax include: dizziness, nasal congestion, paranasal sinus congestion, rhinitis, rhinorrhea, and seasonal allergic rhinitis. Other side effects include: drowsiness. See below for a comprehensive list of adverse effects.','available',NULL,'2019-03-25 09:16:06','2019-03-25 12:12:14','e7e834c647a08b3218d435a36f3586ac.jpg',NULL),(4,3,'mainforce condom','2019-02-23','2020-05-06','mainforce',NULL,50,'this is condom','available',NULL,'2019-03-25 12:07:28','2019-03-25 12:09:48','98bacd7f5cf2e5582e20cec61474bf41.jpg',NULL);

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'admin','auth','2019-02-27 06:56:24','2019-02-27 06:56:24'),(2,'customer','web','2019-02-27 07:00:39','2019-02-27 07:00:39');

/*Table structure for table `shipping` */

DROP TABLE IF EXISTS `shipping`;

CREATE TABLE `shipping` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shipping` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin@gmail.com',NULL,'$2y$10$QfRvt9HVcy82CsO/LaMIOut2AHN.8C3dB2qcaiyW5Y6gI3qh.bOEu','WBeZELk9q9AU4B9zTlXZ91FzSBL1GYyEqEa6djCAucOcxUCPK7Kaj56wrSN4','2019-02-27 06:55:57','2019-02-27 06:55:57'),(2,'sanjok','sanjoksir@gmail.com',NULL,'$2y$10$6z8uOOg2MkHgzxO9SwRpw.NNm/u2JW6362jGNStCj8cD6qdTCjvgG','VE2GJ7RBCqVaFyoMTEPgS7iTcxRyv3Rc9qjv7HDahKJ5vO9JLMTsnMumjtg4','2019-02-27 11:10:54','2019-02-27 11:10:54'),(3,'tulasi','tulasi@gmail.com',NULL,'$2y$10$8tyJ2wGkySYu9gBJ5gLR/.p5FJarLYMl5wohdMVWZzCGcwlbsiR32','jJvyYKbi6DrSgArC7n8KeCrMnaJZKBgXN1qu1R3hXBLSui2BkNKUa7gzAvnq','2019-02-27 11:14:04','2019-02-27 11:14:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;