-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: ishop
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'Электрочайники','Чайники электрические',1,'2018-03-07 07:59:29','2018-03-07 07:59:29'),(28,NULL,'Утюги','Утюги электрические',1,'2018-03-07 14:03:28','2018-03-07 14:03:28'),(29,NULL,'Обогреватели','Устройства для обогрева',1,'2018-03-07 14:03:28','2018-03-07 14:03:28');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `orders_id` int(10) unsigned NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_details_orders1_idx` (`orders_id`),
  KEY `fk_products_idx` (`products_id`),
  CONSTRAINT `fk_orders` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (4,1,3497.43,6,25),(5,1,5190.00,6,29),(6,1,629.00,6,28),(7,1,1919.51,7,1),(8,1,1919.51,8,1),(9,1,1919.51,9,1),(10,1,1919.51,10,1),(11,1,1919.51,11,1),(12,2,629.00,12,28),(13,1,5190.00,13,29),(14,1,2319.00,14,27),(16,1,5190.00,16,29);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'Новый');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `ord_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_order_status1_idx` (`status_id`),
  KEY `fk_orders_users1_idx` (`users_id`),
  CONSTRAINT `fk_orders_order_status1` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (6,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 18:42:18','2018-03-10 18:42:18',1,16,NULL),(7,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 20:43:20','2018-03-10 20:43:20',1,16,NULL),(8,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 20:52:17','2018-03-10 20:52:17',1,16,NULL),(9,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 21:00:53','2018-03-10 21:00:53',1,16,NULL),(10,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 21:02:40','2018-03-10 21:02:40',1,16,NULL),(11,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 21:04:06','2018-03-10 21:04:06',1,16,NULL),(12,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 21:31:08','2018-03-10 21:31:08',1,16,NULL),(13,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 21:40:51','2018-03-10 21:40:51',1,16,NULL),(14,'Телефон: <b>(050)9993456</b><br>Адрес: <b>Питер</b><br>Комментарий покупателя: <i>Тест</i>','2018-03-10 21:43:50','2018-03-10 21:43:50',1,17,NULL),(16,'Телефон: <b>(926)200-54-33</b><br>Адрес: <b>Москва, ул. Розы Люксембург, 25</b><br>Комментарий покупателя: <i></i>','2018-03-10 22:10:01','2018-03-10 22:10:01',1,16,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('verin@allwebstudio.ru','8169ea0b113d3e9351a79664a16d68ca2152feaa378c8870ff3d556697f4ce23','2018-03-09 10:30:25');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `currency` int(11) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categories_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`categories_id`),
  FULLTEXT KEY `search` (`name`,`description`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Scarlett SC-EK27G14',1,1919.51,1,'Чайник электрический <h3>Scarlett SC-EK27G14</h3> изготовлен из термостойкого стекла. Внутри прибора находится скрытый нагревательный элемент. Наличие подсветки делает его привлекательным во время эксплуатации. Подсветка голубого цвета позволяет определять количество жидкости в чайнике в темноте. Данная модель позволит быстро вскипятить до 1,7 литра воды благодаря мощности 2200 Вт.','Scarlett_1.jpg',1,'2018-03-07 08:04:05','2018-03-07 08:04:05',1),(24,'Redmond RK-G201S',0,743.21,1,'Умный световой чайник <h3>Redmond RK-G201S</h3> больше чем просто чайник! Это ультрамодный высокотехнологичный гаджет с оригинальным свечением и дистанционным управлением со смартфона.\nЧерез приложение Ready for Sky в smart чайнике можно подогреть воду до нужной температуры, настроить любой цвет подсветки и сделать так, чтобы стеклянный корпус и вода в нем переливались всеми цветами радуги.','Redmond_24.jpg',1,'2018-03-07 08:22:44','2018-03-07 08:22:44',1),(25,'Kitfort КТ-616',1,3497.43,1,'Электрический чайник с терморегулятором <h3>Kitfort КТ-616</h3> может не только вскипятить воду, но и нагреть ее до температуры 40, 70 и 90°С. Температура 40 °С пригодится для приготовления детского питания. Чайник также оснащен функцией поддержания температуры. Температура воды контролируется встроенным в дно чайника термодатчиком. Корпус чайника Kitfort КТ-616 выполнен из стекла, а крышка и подставка — из сочетания пластмассы и нержавеющей стали.','Kitfort_25.jpg',1,'2018-03-07 08:26:39','2018-03-07 08:26:39',1),(26,'Bosch TWK 1201N',1,757.78,1,'<h3>Bosch TWK 1201N</h3> отличается надежностью и долговечностью. Гарантией этих качеств является цельнометаллический корпус. Это экологически чистый материал не производит неприятного запаха в процессе кипячения. Прибор автоматически отключается при закипании воды, при случайном включении пустого чайника. Во время работы включается светодиодный индикатор. Чайник может вращаться вокруг своей оси на подставке, при этом крутится только корпус, а подставка устойчиво стоит на поверхности. ','Bosch_26.jpg',1,'2018-03-07 08:29:52','2018-03-07 08:29:52',1),(27,'Polaris PKSH 0508H',1,2319.00,1,'Карбоновый обогреватель <h3>Polaris PKSH 0508H</h3> имеет мощность 800 Вт и поддерживает два режима нагрева: обычный и экономичный (400 Вт). Карбоновый обогреватель был создан с целью экономного энергопотребления и дает 25% экономии электроэнергии в сравнении с другими видами отопления. Управление карбоновым обогревателем очень простое. С помощью регулятора можно, в зависимости от внешних условий, установить полную либо половинную мощность. ','polaris_27.jpg',1,'2018-03-10 14:51:48','2018-03-10 14:51:48',29),(28,'Polaris PCDH 0105',1,629.00,1,'Настольный керамический обогреватель <h3>Polaris PCDH 0105</h3>. Одним из главных преимуществ устройства является то, что оно не сушит воздух, как некоторые приборы аналогичного типа. Polaris PCDH 0105 обладает высокой надежностью и безопасностью использования: при опрокидывании или перегреве устройство автоматически отключается, предотвращая возможное возгорание. ','polaris_28.jpg',1,'2018-03-10 14:57:32','2018-03-10 14:57:32',29),(29,'Braun TexStyle TS545SA',1,5190.00,1,'Благодаря новому паровому утюгу<h3> Braun TexStyle TS545SA</h3>  мечта стала реальностью! Хотите, чтобы гладить одежды было бы возможно ещё эффективнее и быстрее? Чтобы ткань разглаживалась сразу после первого же проведения по ней утюгом? С ним становится не только невероятно легко гладить одежду, но также и можно не волноваться о том, что её можно испортить или перегреть. Процесс глажки одежды становится невероятно безопасным и простым. Благодаря эргономично сделанной, удобной открытой ручке утюга вы меньше устанете. Этот утюг справится даже с капризными тканями, текстура которых не очень-то поддается обычной глажке. ','braun_29.jpg',1,'2018-03-10 15:03:36','2018-03-10 15:03:36',28);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'Администратор'),(1,'Пользователь');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roles_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_roles_idx` (`roles_id`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (16,'Batman','Пtnhj','Москва, ул. Розы Люксембург, 25','(926)200-54-33','v_erin@mail.ru','$2y$10$uJCmCuclT.S5g6J2IwNPiukOrR2f93Hdv9Z5mvhGTEpIkDTX70Ui2','pCKa2QNmGrvcVhKtYpuf1r0RHQi5dlrnaSVOftxKWc9oPI5AMfS5dtWZBsSS',1,'2018-03-09 15:42:23','2018-03-10 21:55:09',1),(17,'Петр','Иванов','Питер','(050)9993456','v.erin@analytikaplus.ru','$2y$10$76sLWHe5NZ9mVY3Z4c9GbO26MJCWVHJlibytq6CraKe/GAWQFs932',NULL,1,'2018-03-10 21:43:50','2018-03-10 21:43:50',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-11  8:12:13
