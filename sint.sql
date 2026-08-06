-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Gegenereerd op: 27 aug 2020 om 11:58
-- Serverversie: 8.0.18
-- PHP-versie: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sint`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `brands`
--

INSERT INTO `brands` (`id`, `title`) VALUES
(1, 'Samsung'),
(4, 'Apple'),
(5, 'Huawei'),
(6, 'Honor'),
(7, 'Xiaomi'),
(12, 'Oculus'),
(13, 'HP'),
(14, 'Surface '),
(15, 'Microsoft'),
(16, 'Sony'),
(17, 'Nintendo'),
(18, 'Amazon'),
(19, 'LG'),
(20, 'Phillips'),
(21, 'Bose'),
(22, 'Nokia');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `title`, `sort_order`, `status`, `foto`, `type`, `size`) VALUES
(1, 'Apple Fun', 0, 0, 'category-apple-fun.png', 'image/png', 0),
(2, 'Smart Home', 0, 0, 'category-smart-home.png', 'image/png', 0),
(3, 'Game Zone', 0, 0, 'category-game-zone.png', 'image/png', 0),
(5, 'Device', 0, 0, 'category-device.png', 'image/png', 0),
(6, 'Smartphone', 0, 0, 'category-smartphone.png', 'image/png', 0),
(7, 'Laptop', 0, 0, 'category-laptop.png', 'image/png', 0),
(8, 'Game Controller', 0, 0, 'category-game-controller.png', 'image/png', 0),
(19, 'Tablet', 0, 0, 'category-tablet.png', 'image/png', 0),
(20, 'iPad', 0, 0, 'category-ipad.png', 'image/png', 0),
(22, 'Camera', 0, 0, 'category-camera.png', 'image/png', 0),
(23, 'Koptelefoon', 0, 0, 'category-headphones.png', 'image/png', 0),
(24, 'Robot ', 0, 0, 'category-robot.png', 'image/png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `author`, `body`) VALUES
(2, 1, 'ja', 'tessssttttttttttttttttttt'),
(3, 1, 'on', 'ooooooonnnnnnnnnnnnn'),
(4, 3, 'Barsic', 'barsik love this'),
(9, 4, 'Iana', 'mmmm'),
(10, 4, 'Iana', 'mmmm'),
(12, 3, 'ik', 'kkk'),
(13, 3, 'lll', 'mmm'),
(22, 3, 'hgfhd', 'bfnhf,v'),
(23, 1, 'fgfj', 'dtktk'),
(24, 35, 'jcgtjdt', 'tdtk'),
(25, 29, 'Porosenok', 'perfect!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `diensten`
--

DROP TABLE IF EXISTS `diensten`;
CREATE TABLE IF NOT EXISTS `diensten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `diensten`
--

INSERT INTO `diensten` (`id`, `title`, `foto`, `type`, `size`) VALUES
(1, 'Telecom', 'telecom-evva.png', 'image/png', 0),
(2, 'Internet', 'internet-evva.png', 'image/png', 0),
(3, 'Energie', 'energy-evva.png', 'image/png', 0),
(4, 'Zonnenpanelen', 'solar-evva.png', 'image/png', 0),
(5, 'Smart Home', 'smart-home-evva.png', 'image/png', 0),
(6, 'Smart Shop', 'smart-shop-evva.png', 'image/png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL DEFAULT '',
  `payer_id` varchar(255) NOT NULL DEFAULT '',
  `payment_total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_belongs_to_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `payer_id`, `payment_total`) VALUES
(20, 1, 'PAYID-L5DIG2Q7BX53217NR713251F', 'ZJHRBMM5JAM4A', 666666),
(21, 1, 'PAYID-L5DIJGI6E1857141D0445748', 'ZJHRBMM5JAM4A', 978),
(22, 1, 'PAYID-L5DIOTY3CF13824UB4406626', 'ZJHRBMM5JAM4A', 812),
(23, 1, 'PAYID-L5DNUUQ8FJ4080113838211L', 'ZJHRBMM5JAM4A', 130),
(24, 1, 'PAYID-L5DY6KI13J03792BW997642J', 'ZJHRBMM5JAM4A', 899);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_belongs_to_order` (`order_id`),
  KEY `item_belongs_product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `created_at`) VALUES
(9, 1, 20, '2020-08-26 15:45:09'),
(10, 11, 21, '2020-08-26 15:50:09'),
(11, 18, 22, '2020-08-26 16:01:38'),
(12, 14, 23, '2020-08-26 21:55:57'),
(13, 52, 24, '2020-08-27 10:47:27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `categorie_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `availability` int(11) NOT NULL,
  `brand_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_recommended` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prijs` decimal(8,0) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie_id`),
  KEY `code` (`code`),
  KEY `brand` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `code`, `categorie_id`, `title`, `availability`, `brand_id`, `is_new`, `is_recommended`, `description`, `prijs`, `foto`, `type`, `size`) VALUES
(1, '1', '5', 'AMVR VR Stand -Virtual Reality 3D Glass Headset', 0, '8', 0, 0, '', '159', '6fe68a4f78bb0e313b32f886b022b720.jpg', 'image/jpeg', 112843),
(11, '1885588', '6', 'APPLE iPhone SE 64 GB ', 0, '4', 0, 0, '<p>Zwart (MX9R2ZD/A)</p>', '489', 'apple_iphone_se_2020.jpg', 'image/jpeg', 13720),
(12, '1885589', '6', 'APPLE iPhone XR 256 GB ', 0, '4', 0, 0, '<p>(PRODUCT) RED (MRYM2ZD/A)</p>', '799', 'apple_iphone_xr.jpg', 'image/jpeg', 8819),
(13, '1885590', '6', 'APPLE iPhone 11 Pro Max 256 GB', 0, '4', 0, 0, '<p>&nbsp;Midnight Green (MWHM2ZD/A)</p>', '1409', 'apple_iphone11_pro_max.jpg', 'image/jpeg', 14841),
(14, '1885591', '6', 'Honor 9 C', 0, '6', 0, 0, '', '130', 'honor_9s.jpg', 'image/jpeg', 8064),
(15, '1885592', '6', 'Honor 30 ', 0, '6', 0, 0, '<p>8/128GB&nbsp;</p>', '387', 'honor_30.jpg', 'image/jpeg', 10982),
(16, '1885593', '6', 'Huawei P40 Lite ', 0, '5', 0, 0, '<p>6/128GB</p>', '224', 'huawei_p40.jpg', 'image/jpeg', 13879),
(17, '1885594', '6', ' Huawei nova 5T ', 0, '5', 0, 0, '', '325', 'huawei_nova5t.jpg', 'image/jpeg', 18478),
(18, '1885595', '6', 'Huawei P40 Pro 8/256GB', 0, '5', 0, 0, '', '812', 'huawei_p40_pro.jpg', 'image/jpeg', 10074),
(19, '1885569', '6', 'Huawei Y8p ', 0, '5', 0, 0, '', '162', 'huawei_y8p.jpg', 'image/jpeg', 11632),
(20, '1885597', '6', 'Samsung Galaxy A51 ', 0, '1', 0, 0, '<p>4/64GB&nbsp;</p>', '212', 'samsung_gal_a51.jpg', 'image/jpeg', 12908),
(21, '1885598', '6', 'Samsung Galaxy A71', 0, '1', 0, 0, '<p>&nbsp;6/128GB&nbsp;</p>', '375', 'samsung_gal_a71.jpg', 'image/jpeg', 11966),
(22, '1885598', '6', 'Samsung Galaxy M21', 0, '1', 0, 0, '', '200', 'samsung_gal_m21.jpg', 'image/jpeg', 12417),
(23, '1885570', '6', 'Samsung Galaxy M31 ', 0, '1', 0, 0, '', '250', 'samsung_gal_m31.jpg', 'image/jpeg', 13388),
(24, '1885571', '6', 'Samsung Galaxy S10 ', 0, '1', 0, 0, '', '650', 'samsung_gal_s10.jpg', 'image/jpeg', 9266),
(25, '1885599', '6', 'Samsung Galaxy S20 ', 0, '1', 0, 0, '', '875', 'samsung_gal_s20.jpg', 'image/jpeg', 11292),
(26, '1885572', '6', 'Xiaomi Redmi 9 ', 0, '7', 0, 0, '<p>3/32GB</p>', '125', 'xiaomi_redmi_9.jpg', 'image/jpeg', 10999),
(27, '120', '7', 'HP 250 G7 Notebook', 0, '13', 0, 0, '<p><span style=\"color: #1d252d; font-family: stc-regular; font-size: 13px;\">Display: 15.6 &rdquo; inch Full HD resolution (1,920 x 1,080), Matte display, WLED backlight, SVA</span></p>', '349', 'hp_250_g7.png', 'image/png', 89811),
(28, '122', '7', 'HUAWEI Matebook D 14', 0, '5', 0, 0, '<p><span style=\"color: #1d252d; font-family: stc-regular; font-size: 13px;\">Display: Display : 14&rdquo; 1920*1080 resolution Finger ID, Face ID</span></p>', '599', 'HUAWEI_Matebook_d14.png', 'image/png', 102288),
(29, '123', '7', 'Surface Pro 7 i5 ', 0, '14', 0, 0, '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Intel Core i3 r, 4GB of RAM, 128GB</span></p>', '749', 'Surface_Pro_7_i5.png', 'image/png', 59104),
(30, '124', '6', 'iPhone XS Max 256GB', 0, '4', 0, 0, '<p>Gold</p>', '729', 'iPhone_XS_Max.jpg', 'image/jpeg', 74628),
(31, '128', '3', 'XBox One X', 0, '15', 0, 0, '', '450', 'xbox_one_x.png', 'image/png', 63092),
(33, '127', '3', 'PlayStation 4 Slim 1TB Console', 0, '16', 0, 0, '', '349', 'ps4.png', 'image/png', 116383),
(34, '128', '3', 'Nintendo SWITCH +2Games+Kit Bro', 0, '17', 0, 0, '', '480', 'Nintendo.png', 'image/png', 127119),
(35, '35', '2', 'Smart Premium Luidspreker Echo Plus', 0, '18', 0, 0, '<p><span style=\"color: #222222; font-family: arial, sans-serif;\">Bluetooth, Wifi, AUX</span></p>', '90', 'Echo-Plus-Bundle.jpg', 'image/jpeg', 233180),
(36, '36', '2', 'LG Smart Wi-Fi Enabled Front Load Washer', 0, '19', 0, 0, '', '849', 'Smart-Wifi-Washer.jpg', 'image/jpeg', 121017),
(37, '37', '2', 'Ecobee4 thermostat', 0, '18', 0, 0, '', '210', 'Ecobee-Smart-Thermostat.jpg', 'image/jpeg', 92586),
(38, '39', '2', 'Echo Show', 0, '18', 0, 0, '', '149', 'Echo-Show-Bundle.jpg', 'image/jpeg', 128355),
(39, '41', '2', 'Flo water detection system', 0, '18', 0, 0, '', '199', 'Flo-Smart-Home-Water-Monitoring-and-Shutoff-System.jpg', 'image/jpeg', 124727),
(40, '42', '2', 'Furbo Dog Camera', 0, '18', 0, 0, '', '139', 'Furbo-Dog-Camera.jpg', 'image/jpeg', 110729),
(41, '44', '2', 'Phillips Hue Light Bulbs', 0, '20', 0, 0, '', '82', 'Philips-Hue-White-Smart-Bulb.jpg', 'image/jpeg', 104459),
(42, '43', '2', 'iRobot Roomba e5', 0, '18', 0, 0, '', '299', 'iRobot-Roomba-1.jpg', 'image/jpeg', 157056),
(43, '46', '2', 'Smart security camera', 0, '18', 0, 0, '', '129', 'Nest-Security-Camera.jpg', 'image/jpeg', 76969),
(44, '51', '8', 'COOBILE Mobile Game Controller', 0, '18', 0, 0, '', '39', '11.jpg', 'image/jpeg', 10517),
(45, '54', '8', 'Generic Pubg Game Gamepad', 0, '18', 0, 0, '', '35', '12.jpg', 'image/jpeg', 9647),
(46, '57', '7', 'MacBook Neo 13-inch', 1, '4', 1, 1, 'De nieuwe lichte MacBook Neo met stille werking, helder Liquid Retina-display en lange batterijduur voor werk, studie en onderweg.', '599', 'macbook-neo.png', 'image/png', 0),
(47, '258', '6', 'iPhone 17 256 GB', 1, '4', 1, 1, 'De nieuwste iPhone met A19-chip, 6,3-inch ProMotion-display, 48MP-camera en sterke batterij voor elke dag.', '799', 'iphone-17.png', 'image/png', 0),
(48, '194', '23', 'AirPods Pro 3 met USB-C', 1, '4', 1, 1, 'De nieuwste AirPods Pro met actieve ruisonderdrukking, transparantiemodus en comfortabele pasvorm voor onderweg.', '249', 'airpods-pro-3.png', 'image/png', 0),
(49, '182', '1', 'Apple Watch Series 11 GPS', 1, '4', 1, 1, 'Slim horloge met gezondheidsfuncties, sporttracking, helder display en handige meldingen voor elke dag.', '449', 'apple-watch-series-11.png', 'image/png', 0),
(50, '395', '1', 'Apple TV 4K Wi-Fi', 1, '4', 1, 1, 'Kijk naar films, series en apps in 4K HDR met vloeiende streaming en eenvoudige bediening via Siri Remote.', '159', 'apple-tv-4k.png', 'image/png', 0),
(51, '425', '1', 'Apple Magic Mouse USB-C', 1, '4', 1, 1, 'Dunne draadloze muis met Multi-Touch-oppervlak en nauwkeurige bediening voor Mac en iPad.', '70', 'apple-magic-mouse-usbc.png', 'image/png', 0),
(52, '453', '1', 'iPad Pro 11-inch met M5-chip', 1, '4', 1, 1, 'Krachtige tablet met Ultra Retina XDR-display, M5-prestaties en ondersteuning voor creatief werk en multitasking.', '899', 'ipad-pro-m5.png', 'image/png', 0),
(54, '527', '1', 'iMac 24-inch met M4-chip', 1, '4', 1, 1, 'Moderne all-in-one desktop met M4-chip, scherp Retina-display en complete werkplek voor thuis of kantoor.', '2099', 'imac-m4.png', 'image/png', 0),
(55, '548', '1', 'HomePod 2 slimme luidspreker', 1, '4', 1, 1, 'Slimme luidspreker met kamervullend geluid, Siri en eenvoudige bediening van muziek en smart-homeapparaten.', '349', 'homepod-2.png', 'image/png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(3, 'klant'),
(2, 'kassa'),
(1, 'admin'),
(4, 'somnambula');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teamleaders`
--

DROP TABLE IF EXISTS `teamleaders`;
CREATE TABLE IF NOT EXISTS `teamleaders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `positie` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `teamleaders`
--

INSERT INTO `teamleaders` (`id`, `naam`, `achternaam`, `positie`, `foto`, `type`, `size`) VALUES
(5, 'Denis', 'Gergel', 'marketing', 'evva-team-photo.png', 'image/png', 0),
(2, 'Pavel', 'Gergel', 'marketing', 'evva-team-photo.png', 'image/png', 0),
(3, 'Marina', 'Gergel', 'marketing', 'evva-team-photo.png', 'image/png', 0),
(4, 'Yulia', 'Gergel', 'marketing', 'evva-team-photo.png', 'image/png', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `user_image`, `role`) VALUES
(1, 'admin', 'email@gmail.com', '2222', 'Evgeniia', 'Proskuriakova', 'cool-wallpaper-3.jpg', 0),
(2, 'evva', '', '1111', 'Evgeniia', 'Proskuriakova', 'logo_evva.png', 1),
(3, 'luna', '', '2222', 'Valerie', 'Luna', '4.png', 0),
(4, 'Leo', '', '1111', 'Leopold', 'I', 'cool-wallpaper-3.jpg', 2),
(5, 'iana', '', '1111', '', '', 'avatar.png', 0);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
