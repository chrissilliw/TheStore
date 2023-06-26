-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 18, 2023 at 07:59 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriftshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(32) NOT NULL,
  `prod_description` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `prod_submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_sales_date` datetime DEFAULT NULL,
  `prod_price` int(11) NOT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_description`, `type_id`, `brand_id`, `quality_id`, `size_id`, `color_id`, `seller_id`, `prod_submission_date`, `prod_sales_date`, `prod_price`, `is_sold`) VALUES
(1, 'Nike', 'Vithuvtröja med dragkedja', 1, 1, 1, 2, 6, 5, '2023-06-01 15:24:15', NULL, 300, 1),
(2, 'Adidas', 'Svarta träningsshorts', 3, 2, 3, 5, 5, 2, '2023-06-04 08:03:28', NULL, 150, 0),
(3, 'Zara', 'Blommig klänning i sommarfärger', 7, 10, 2, 1, 8, 5, '2023-06-05 14:09:27', NULL, 250, 1),
(4, 'H&M', 'Mörkblå kavaj med rutigt mönster', 9, 3, 4, 2, 2, 3, '2023-06-05 14:24:00', NULL, 700, 0),
(5, 'Gucci', 'Grön t-shirt med logotyptryck', 4, 4, 1, 5, 4, 6, '2023-06-05 14:24:00', NULL, 450, 1),
(6, 'Levis', 'Svarta jeans med hög midja', 2, 5, 1, 4, 5, 4, '2023-06-05 14:24:00', NULL, 580, 0),
(7, 'Calvin Klein', 'Vit skjorta med spetsdetaljer', 5, 6, 3, 2, 6, 1, '2023-06-05 14:24:00', NULL, 300, 1),
(8, 'Tommy Hilfiger', 'Röd-vit-randig polotröja', 1, 7, 2, 2, 1, 2, '2023-06-05 14:24:00', NULL, 500, 1),
(9, 'Ralph Lauren', 'Marinblå kjol I A-linje', 8, 8, 4, 4, 2, 6, '2023-06-05 14:24:00', NULL, 200, 0),
(10, 'Balenciaga', 'Svart läderjacka med nitar', 6, 9, 3, 3, 5, 7, '2023-06-05 14:24:00', NULL, 600, 0),
(11, 'Zara', 'Grå kostymbyxor med pressveck', 2, 10, 1, 1, 6, 2, '2023-06-05 14:24:00', NULL, 360, 0),
(21, 'Nike', 'Blå löparshorts med inbyggd tights', 3, 1, 3, 3, 2, 8, '2023-06-05 14:25:22', NULL, 440, 0),
(22, 'Adidas', 'Vit t-shirt med tryck fram', 4, 2, 1, 2, 6, 2, '2023-06-05 14:40:20', NULL, 400, 0),
(23, 'Gucci', 'Svart skinnjacka med logotyp', 6, 4, 4, 1, 5, 9, '2023-06-05 14:40:20', NULL, 700, 0),
(30, 'Tommy Hilfiger', 'Rutig bomullskjol med knappar', 8, 7, 1, 3, 8, 4, '2023-06-05 14:41:32', NULL, 450, 0),
(31, 'Ralph Lauren', 'Beige trenchcoat med bälte', 6, 8, 3, 5, 10, 6, '2023-06-05 14:41:32', NULL, 500, 0),
(32, 'Balenciaga', 'Svart klänning med volanger', 7, 9, 1, 3, 5, 9, '2023-06-05 14:41:32', NULL, 800, 0),
(33, 'Levis', 'Mörkblå jeansjacka med slitningar', 6, 10, 3, 2, 2, 8, '2023-06-05 14:41:32', NULL, 450, 0),
(34, 'Nike', 'Gröna golfbyxor', 2, 1, 3, 4, 4, 2, '2023-06-08 15:37:30', NULL, 360, 1),
(35, 'Samsung', 'lite tect            ', 2, 2, 1, 2, 2, 7, '2023-06-13 19:57:13', NULL, 480, 0),
(36, 'Nike', '            stora sycklar', 10, 9, 2, 3, 1, 2, '2023-06-13 20:00:16', NULL, 599, 0),
(39, 'Air Jordan tröja', 'sdfsdf', 6, 4, 1, 2, 10, 22, '2023-06-14 12:02:34', NULL, 700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `product_brand_id` int(11) NOT NULL,
  `product_brand_name` varchar(32) NOT NULL,
  `product_brand_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_brand_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`product_brand_id`, `product_brand_name`, `product_brand_created_date`, `product_brand_updated_date`) VALUES
(1, 'Nike', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(2, 'Adidas', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(3, 'H&M', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(4, 'Gucci', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(5, 'Levis', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(6, 'Calvin Klein', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(7, 'Tommy Hilfiger', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(8, 'Ralph Lauren', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(9, 'Balenciaga', '2023-05-31 10:09:51', '2023-05-31 10:09:51'),
(10, 'Zara', '2023-05-31 10:09:51', '2023-05-31 10:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `product_color_id` int(11) NOT NULL,
  `product_color_name` varchar(32) NOT NULL,
  `product_color_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_color_date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`product_color_id`, `product_color_name`, `product_color_date_created`, `product_color_date_modified`) VALUES
(1, 'Röd', '2023-05-31 10:06:02', '2023-05-31 10:06:02'),
(2, 'Blå', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(3, 'Gul', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(4, 'Grön', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(5, 'Svart', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(6, 'Vit', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(7, 'Rosa', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(8, 'Lila', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(9, 'Orange', '2023-05-31 10:06:40', '2023-05-31 10:06:40'),
(10, 'Brun', '2023-05-31 10:06:40', '2023-05-31 10:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_quality`
--

CREATE TABLE `product_quality` (
  `product_quality_id` int(11) NOT NULL,
  `product_quality_name` varchar(32) NOT NULL,
  `product_quality_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_quality_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_quality`
--

INSERT INTO `product_quality` (`product_quality_id`, `product_quality_name`, `product_quality_created_date`, `product_quality_updated_date`) VALUES
(1, 'Nytt', '2023-05-29 16:39:42', '2023-05-29 16:39:42'),
(2, 'Mycket bra', '2023-05-29 16:39:42', '2023-05-29 16:39:42'),
(3, 'Bra', '2023-05-29 16:39:42', '2023-05-29 16:39:42'),
(4, 'Acceptabelt', '2023-05-29 16:39:42', '2023-05-29 16:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `product_size_id` int(11) NOT NULL,
  `product_size_name` varchar(32) NOT NULL,
  `product_size_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_size_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`product_size_id`, `product_size_name`, `product_size_created_date`, `product_size_updated_date`) VALUES
(1, 'x-large', '2023-05-29 16:59:10', '2023-05-29 16:59:10'),
(2, 'large', '2023-05-29 16:59:10', '2023-05-29 16:59:10'),
(3, 'medium', '2023-05-29 16:59:10', '2023-05-29 16:59:10'),
(4, 'small', '2023-05-29 16:59:10', '2023-05-29 16:59:10'),
(5, 'x-small', '2023-05-29 16:59:10', '2023-05-29 16:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(32) NOT NULL,
  `product_type_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_type_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`product_type_id`, `product_type_name`, `product_type_created_date`, `product_type_updated_date`) VALUES
(1, 'Tröja', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(2, 'Byxa', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(3, 'Shorts', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(4, 'T-shirt', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(5, 'Skjorta', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(6, 'Jacka', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(7, 'Klänning', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(8, 'Kjol', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(9, 'Kavaj', '2023-05-29 17:16:03', '2023-05-29 17:16:03'),
(10, 'Kostym', '2023-05-29 17:16:03', '2023-05-29 17:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `sellers_firstname` varchar(32) NOT NULL,
  `sellers_lastname` varchar(32) NOT NULL,
  `sellers_email_adress` varchar(75) NOT NULL,
  `sellers_image_id` int(11) DEFAULT '1',
  `sellers_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sellers_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `sellers_firstname`, `sellers_lastname`, `sellers_email_adress`, `sellers_image_id`, `sellers_created_date`, `sellers_updated_date`) VALUES
(1, 'Luke', 'Skywalker', 'luke.skywalker@starwars.se', 1, '2023-06-01 10:48:34', '2023-06-01 10:48:34'),
(2, 'Leia', 'Skywalker', 'leia.skywalker@starwars.se', 1, '2023-06-01 10:48:34', '2023-06-01 10:48:34'),
(3, 'Obi Wan', 'Kenobi', 'obiwan.kenobi@starwars.se', 1, '2023-06-01 10:48:34', '2023-06-01 10:48:34'),
(4, 'Han', 'Solo', 'han.solo@starwars.se', 1, '2023-06-01 10:48:34', '2023-06-01 10:48:34'),
(5, 'Darth', 'Vader', 'darth.vader@starwars.com', 1, '2023-06-01 14:59:56', '2023-06-01 14:59:56'),
(6, 'R2', 'D2', 'r2.d2@starwars.com', 1, '2023-06-01 14:59:56', '2023-06-01 14:59:56'),
(7, 'Boba', 'Fett', 'boba.fett@starwars.com', 1, '2023-06-01 14:59:56', '2023-06-01 14:59:56'),
(8, 'Lando', 'Calrissian', 'lando.calrissian@starwars.com', 1, '2023-06-01 14:59:56', '2023-06-01 14:59:56'),
(9, 'Kylo ', 'Ren', 'kylo.ren@starwars.com', 1, '2023-06-04 10:47:28', '2023-06-04 10:47:28'),
(11, 'Jabba', 'TheHutt', 'jabba.thehutt@starwars.com', 1, '2023-06-04 10:50:28', '2023-06-04 10:50:28'),
(12, 'The', 'Mandalorian', 'a@b.se', 1, '2023-06-05 15:24:47', '2023-06-05 15:24:47'),
(22, 'Lord', 'Vader', 'asdas@asdasd.se', 1, '2023-06-14 11:53:33', '2023-06-14 11:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_image`
--

CREATE TABLE `sellers_image` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellers_image`
--

INSERT INTO `sellers_image` (`id`, `name`, `img`) VALUES
(1, 'Darth Vader', '<svg xmlns=\"http://www.w3.org/2000/svg\"  viewBox=\"0 0 48 48\" width=\"96px\" height=\"96px\"><path fill=\"#263238\" d=\"M13,16h11h11l8,20v2c0,0-4.813,4-8,4c-3.438,2-11,2.017-11,2.017S16.062,43.75,13,42c-1.438,0-8-2.563-8-4s0-2,0-2L13,16z\"/><path fill=\"#455a64\" d=\"M44,37c0-2.825-2.049-7.746-4.029-12.504c-0.453-1.089-0.907-2.182-1.323-3.222c-0.02-0.067-0.039-0.128-0.06-0.2c-0.003-0.01-0.006-0.022-0.009-0.032c-0.04-0.135-0.082-0.28-0.126-0.43c-0.014-0.047-0.028-0.096-0.042-0.145c-0.039-0.135-0.079-0.275-0.119-0.418c-0.011-0.039-0.022-0.077-0.033-0.117c-0.051-0.181-0.102-0.368-0.154-0.56c-0.011-0.042-0.023-0.085-0.034-0.127c-0.042-0.155-0.084-0.313-0.126-0.473c-0.015-0.057-0.03-0.113-0.044-0.17c-0.053-0.203-0.105-0.408-0.156-0.615c-0.003-0.013-0.006-0.026-0.009-0.039c-0.048-0.193-0.094-0.387-0.14-0.581c-0.014-0.06-0.028-0.119-0.041-0.179C37.292,16.05,37.076,14.913,37,14c-0.009-0.107-0.039-0.177-0.062-0.262c-0.036-0.345-0.089-0.646-0.156-0.906C35.768,7.811,31.308,4,26,4h-4c-5.308,0-9.768,3.811-10.782,8.832c-0.068,0.261-0.12,0.561-0.156,0.906C11.039,13.823,11.009,13.893,11,14c-0.076,0.913-0.292,2.05-0.554,3.189c-0.014,0.06-0.027,0.119-0.041,0.179c-0.046,0.194-0.092,0.388-0.14,0.581c-0.003,0.013-0.006,0.026-0.009,0.039c-0.051,0.207-0.104,0.413-0.156,0.615c-0.015,0.057-0.03,0.113-0.044,0.17c-0.042,0.16-0.084,0.318-0.126,0.473c-0.011,0.042-0.023,0.085-0.034,0.127c-0.052,0.192-0.104,0.379-0.154,0.56c-0.011,0.04-0.022,0.078-0.033,0.117c-0.041,0.144-0.08,0.284-0.119,0.418c-0.014,0.049-0.028,0.097-0.042,0.145c-0.043,0.15-0.086,0.294-0.126,0.43c-0.003,0.01-0.006,0.022-0.009,0.032c-0.044,0.149-0.085,0.286-0.124,0.414c-0.01,0.032-0.019,0.063-0.028,0.093c-0.031,0.102-0.06,0.197-0.086,0.282c-0.005,0.016-0.01,0.033-0.015,0.048c-0.03,0.096-0.056,0.179-0.078,0.25c-0.006,0.021-0.011,0.036-0.017,0.054c-0.016,0.052-0.032,0.1-0.042,0.131c-0.002,0.006-0.005,0.014-0.006,0.02C9.007,22.393,9,22.417,9,22.417l2.219-0.385c0.21-0.639,0.451-1.182,0.691-1.675c1.466-3.023,3.434-3.272,4.448-3.356H17c2.417,0,5,1,5,1h4c0,0,2.667-1,5-1h0.642c1.014,0.084,2.858,0.25,4.448,3.356c0.104,0.202,0.202,0.423,0.299,0.648c0.06,0.155,0.127,0.32,0.189,0.479c0.068,0.18,0.138,0.353,0.203,0.549l0.016,0.003c0.408,1.019,0.856,2.099,1.327,3.231c1.816,4.363,3.876,9.31,3.879,11.679c-0.005,0.033-0.717,4.041-10.169,5.518C29.726,42.578,26.878,42.509,24,42c-2.91-0.514-5.781-2.536-8-5c0,0-1,3.063-3,5c0,2.209,4.925,3,11,3c5.853,0,10.625-0.7,10.967-2.764c4.615-0.783,6.887-2.043,7.993-3.168C43.966,38.046,44.003,37.152,44,37z\"/><path fill=\"#546e7a\" d=\"M29,19c-3.625,0-5,3-5,3l1,3c1.031,1.031,5,1,5,1s4,0.125,4-2S32.625,19,29,19z M19,18.999c-3.625,0-5,2.875-5,5s4,2,4,2s3.969,0.031,5-1l1-3C24,21.998,22.625,18.999,19,18.999z M29.978,27.999l-0.016,0c-1.126,0-2.324-0.089-3.482-0.34c0.902,1.35,2.019,3.03,3.147,4.728c0.297,0.447,0.593,0.894,0.886,1.335c0.589-1.479,1.575-3.981,2.349-6.094C32.074,27.866,31.16,28,30.124,28C30.059,28,30.01,27.999,29.978,27.999z M20,33.552V35h1v-2.953c-0.317,0.477-0.637,0.959-0.961,1.446L20,33.552z M28,35h0.961c-0.324-0.488-0.644-0.971-0.961-1.448V35z M29,35.059V35h-0.039C28.974,35.02,28.987,35.039,29,35.059z M22,35h1v-4h-1V35z M26,31v4h1v-2.954c-0.24-0.361-0.467-0.703-0.696-1.046H26z M24,35h1v-4h-1V35z\"/><path fill=\"#455a64\" d=\"M19 18.999c-.507 0-.965.061-1.387.164 3.448.756 5.258 3.989 5.387 4.839.159-.125.302-.236.449-.351L24 21.999C24 21.998 22.625 18.999 19 18.999zM29 19c-.307 0-.591.028-.866.067 2.86 1.276 3.691 5.761 3.838 6.735C32.981 25.571 34 25.072 34 24 34 21.875 32.625 19 29 19z\"/><path fill=\"#78909c\" d=\"M26,29h-4v-9.188l0.636,0.489c1.011,0.496,1.699,0.534,2.702,0.022L26,19.813V29z\"/><path fill=\"#37474f\" d=\"M38.984,22.366c-0.002-0.005-0.004-0.013-0.006-0.02c-0.01-0.031-0.025-0.08-0.042-0.131c-0.006-0.018-0.011-0.034-0.017-0.054c-0.022-0.07-0.048-0.154-0.078-0.25c-0.005-0.015-0.01-0.033-0.015-0.048c-0.026-0.085-0.055-0.181-0.086-0.282c-0.009-0.031-0.019-0.061-0.028-0.093c-0.039-0.128-0.08-0.265-0.124-0.414c-0.003-0.01-0.006-0.022-0.009-0.032c-0.04-0.135-0.082-0.28-0.126-0.43c-0.014-0.047-0.028-0.096-0.042-0.145c-0.039-0.135-0.079-0.275-0.119-0.418c-0.011-0.039-0.022-0.077-0.033-0.117c-0.051-0.181-0.102-0.368-0.154-0.56c-0.011-0.042-0.023-0.085-0.034-0.127c-0.042-0.155-0.084-0.313-0.126-0.473c-0.015-0.057-0.03-0.113-0.044-0.17c-0.053-0.203-0.105-0.408-0.156-0.615c-0.003-0.013-0.006-0.026-0.009-0.039c-0.048-0.193-0.094-0.387-0.14-0.581c-0.014-0.06-0.028-0.119-0.041-0.179C37.292,16.05,37.076,14.913,37,14c-0.009-0.107-0.039-0.177-0.062-0.262c-0.036-0.345-0.089-0.646-0.156-0.906C35.768,7.811,31.308,4,26,4c3.463,1.079,6.733,3.241,7.707,6.189c0.296,0.897-0.436,1.811-1.38,1.805C28.838,11.975,29.132,11.956,26,13v5c0,0,2.667-1,5-1c0.204,0,0.421,0,0.642,0c1.014,0.084,2.941,0.333,4.448,3.356c0.245,0.491,0.481,1.036,0.691,1.675L39,22.417C39,22.417,38.993,22.393,38.984,22.366z\"/><path fill=\"#455a64\" d=\"M23,22v1h2v-1H23z M23,25h2v-1h-2V25z\"/><path fill=\"#c5cae9\" d=\"M18,34c-0.552,0-1,0.448-1,1c0,0.552,0.448,1,1,1s1-0.448,1-1C19,34.448,18.552,34,18,34z M24,26c-1.1,0-2,0.9-2,2v2h4v-2C26,26.9,25.1,26,24,26z M30,34c-0.552,0-1,0.448-1,1c0,0.552,0.448,1,1,1s1-0.448,1-1C31,34.448,30.552,34,30,34z\"/><path fill=\"#607d8b\" d=\"M25,3h-2c-0.552,0-1,0.448-1,1v14h4V4C26,3.448,25.552,3,25,3z M15.677,11.994c1.657-0.009,2.461-0.017,3.185,0.088C19.464,12.171,20,11.705,20,11.098V6.102c0-0.622-0.671-1.022-1.214-0.719c-2.075,1.159-3.769,2.748-4.455,4.695C14.001,11.014,14.684,12,15.677,11.994z M18.022,27.999C17.99,27.999,17.941,28,17.876,28c-1.037,0-1.95-0.134-2.739-0.372c0.775,2.113,1.76,4.615,2.349,6.094c0.292-0.441,0.589-0.888,0.886-1.335c1.128-1.699,2.245-3.379,3.147-4.728c-1.158,0.251-2.356,0.34-3.482,0.34L18.022,27.999z M11.203,22.034l0.016-0.003c0.092-0.276,0.191-0.523,0.29-0.77c0.035-0.09,0.073-0.185,0.108-0.274C13.605,16.383,16.913,16.988,17,17c1.043,0,2.116,0.186,3,0.398v-2.266c0-0.506-0.38-0.937-0.883-0.994C17.89,14.001,17,14,17,14c-5,0-6.268,1.924-6.51,3c-0.361,1.6-0.824,3.225-1.137,4.273c-0.416,1.041-0.87,2.134-1.323,3.223C6.049,29.254,4,34.175,4,37c-0.003,0.152,0.034,1.046,1.04,2.068c1.107,1.125,3.378,2.385,7.994,3.168C13.02,42.158,13,42.082,13,42c0.053-0.051,0.103-0.107,0.154-0.16c-6.602-1.75-7.153-4.868-7.157-4.897C6,34.574,8.06,29.628,9.876,25.265C10.347,24.133,10.795,23.053,11.203,22.034z\"/><path fill=\"#455a64\" d=\"M37.51,17C37.268,15.924,36,14,31,14c0,0-2.568,0-5,0.677V18c0,0,2.583-1,5-1c0.093-0.013,3.75-0.75,5.781,5.031L39,22.417C39,22.417,38.111,19.666,37.51,17z\"/></svg>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `quality_id` (`quality_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `colour_id` (`color_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`product_brand_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`product_color_id`);

--
-- Indexes for table `product_quality`
--
ALTER TABLE `product_quality`
  ADD PRIMARY KEY (`product_quality_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`product_size_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellers_image_id` (`sellers_image_id`);

--
-- Indexes for table `sellers_image`
--
ALTER TABLE `sellers_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `product_brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `product_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_quality`
--
ALTER TABLE `product_quality`
  MODIFY `product_quality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `product_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sellers_image`
--
ALTER TABLE `sellers_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `product_types` (`product_type_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `product_brands` (`product_brand_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`quality_id`) REFERENCES `product_quality` (`product_quality_id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`product_size_id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`product_color_id`),
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`sellers_image_id`) REFERENCES `sellers_image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
