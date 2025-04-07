-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 07, 2025 at 02:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `sale_price` double UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `page_number` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `language` varchar(20) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `Author`, `qty`, `price`, `sale_price`, `user_id`, `description`, `page_number`, `code`, `language`, `image`, `created_at`) VALUES
(1, 'book1', 'auth1', 20, 25, 30, 36, 'boooooooooook', 100, '100vcd', 'arabic', '59185caba7e91778bb382c0dc0013882.jpeg', '2025-03-11 22:02:51'),
(2, 'book1', 'auth1', 0, 25, 90, 36, 'boook', 100, '100vcdn', 'arabic', 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-03-11 22:03:07'),
(3, 'book3', 'auth3', 20, 200, 270, 36, 'descccccccccc', 50, '94743E1B84', 'english', '59185caba7e91778bb382c0dc0013882.jpeg', '2025-03-13 00:52:55'),
(4, 'bok4', 'auth3', 10, 50, 60, 36, 'magic books , woow', 70, '59D9665FF5', 'english', '0aa96965c4f099fd02d032325fca042c.jpeg', '2025-03-13 00:53:41'),
(5, 'boook5', 'auth5', 10, 50, 52, 36, 'descccccc', 50, '179B7BF2B6', 'english', 'da95c37212ebaeda6b437d38fd92d9ac.jpeg', '2025-03-13 01:15:06'),
(6, 'boook5', 'auth5', 10, 50, 0, 36, 'descccccc', 50, '2BDCE2C99C', 'english', 'e044ce77f96d61d81ad017ae48342840.jpeg', '2025-03-13 01:15:39'),
(7, 'boook5', 'auth5', 10, 50, 0, 36, 'descccccc', 50, '243A1C9C38', 'english', 'ced3a78f983f00def24fe1e222e97bca.jpeg', '2025-03-13 01:16:42'),
(8, 'boook5', 'auth5', 10, 50, 0, 36, 'descccccc', 50, 'D11DD74E3E', 'english', '553a39cae8ff3c565d2545ce6e5b2732.jpeg', '2025-03-13 01:17:01'),
(9, 'boook5', 'auth5', 10, 50, 0, 36, 'descccccc', 50, '9F453ACD15', 'english', 'e0d4cc369ff2716de12593702e760080.jpeg', '2025-03-13 01:19:07'),
(14, 'book 6', 'auth 6', 10, 200, 250, 36, 'descccccccccc', 20, 'E2AE077E3B', 'english', '79b6b9d9376713ca75ee5d03eae823d7.jpeg', '2025-03-13 04:19:50'),
(15, 'boooo5', 'auth5', 10, 100, 150, 36, 'descccccc', 58, 'A5538690F8', 'arabic', '18dca569796a30fed53f89bc0cf782b4.jpeg', '2025-03-13 04:22:10'),
(16, 'booooooo', 'auth3', 10, 125, 150, 36, 'descccccccccc', 50, '9B8682427F', 'english', 'eb2476c49c0b6cc227727b17c1a4d287.jpeg', '2025-03-13 04:33:47'),
(17, 'Head-First Design Patterns', 'Eric Freeman &amp;amp; Elisabeth Robson', 20, 350, 550, 36, 'A very well written book for people trying to get their head around design patterns. The style of the book makes you understand the problems and solutions', 200, 'D25925C814', 'english', 'bf8b8d6bcf89f0399f94aa3e117e62e0.webp', '2025-03-15 09:10:06'),
(18, 'Flutter Apprentice', 'Mike Katz', 20, 350, 550, 36, 'descrition of programmng book', 100, '05D6F66364', 'english', '4345cb59066739ab087900663ee0c7c4.webp', '2025-03-15 09:34:27'),
(19, 'Modern Full-Stack Development', 'Frank Zammetti', 10, 250, 450, 36, 'great book in Modern Full-Stack Development', 200, '0ECC15CEB1', 'english', 'c1d808e0576ad313b253c8da6005adb8.webp', '2025-03-15 09:43:35'),
(20, 'bool1', 'auth1', 10, 200, 210, 36, 'magic books , woow', 20, '9D2B99F143', 'english', 'b3083f026ef265d20debb72ba0f2cd08.jpeg', '2025-03-22 11:45:15'),
(21, 'book name 1', 'Book Author1', 50, 50, 100, 36, 'descccccccccc', 20, 'CDAA73741A', 'english', '2dcdc72e79ac579ae2f3fd072cfa7985.jpeg', '2025-03-23 17:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `books_categories`
--

CREATE TABLE `books_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `catergory_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_categories`
--

INSERT INTO `books_categories` (`id`, `book_id`, `catergory_id`) VALUES
(6, 14, 1),
(7, 14, 4),
(8, 15, 1),
(11, 17, 1),
(12, 18, 1),
(13, 19, 1),
(14, 20, 1),
(15, 20, 7),
(25, 5, 1),
(26, 5, 7),
(27, 21, 1),
(28, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `street`, `city`, `address`, `created_at`) VALUES
(1, 36, 'ش جمال عبد الناصر -  الاسكندرية.', 'الاسكندرية', 'ش جمال عبد الناصر - تحت كوبرى 45 بجوار كوكى مان والاكاديميه ميامى - الاسكندرية.', '2025-03-16 01:37:38'),
(3, 36, 'ش بطرس - طنطا.', 'طنطا', 'ش بطرس مع سعيد امام المركز الطبى - طنطا.', '2025-03-16 01:39:03'),
(4, 36, 'ش شكري الكواتلي - المحلة.', 'المحلة', 'ش شكري الكواتلي مع ش عبد العزيز امام البنك الاهلي.', '2025-03-16 01:39:40'),
(5, 36, 'bgh', 'nhyg', 'bgtyj', '2025-03-22 11:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `branches_phone`
--

CREATE TABLE `branches_phone` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches_phone`
--

INSERT INTO `branches_phone` (`id`, `user_id`, `phone_number`, `created_at`, `branch_id`) VALUES
(2, 36, '01063888667', '2025-03-16 02:28:44', 1),
(10, 36, '614622', '2025-03-22 11:42:40', 3),
(11, 36, '01063888667', '2025-03-22 11:42:56', 3),
(12, 36, '01063888667', '2025-03-22 11:43:14', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `book_qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `statues` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `user_id`, `book_id`, `book_qty`, `created_at`, `statues`) VALUES
(3, 44, 1, 1, '2025-03-25 20:41:49', 'cart'),
(12, 44, 7, 5, '2025-03-25 21:11:28', 'cart'),
(13, 44, 2, 1, '2025-03-25 21:54:33', 'cart'),
(15, 44, 5, 1, '2025-03-25 22:32:27', 'cart'),
(16, 44, 3, 2, '2025-03-25 22:58:59', 'cart'),
(17, 45, 2, 2, '2025-04-03 14:39:11', 'ordered'),
(18, 45, 2, 1, '2025-04-03 16:23:53', 'ordered'),
(19, 45, 1, 8, '2025-04-05 13:18:12', 'ordered'),
(20, 45, 2, 2, '2025-04-05 13:28:46', 'ordered'),
(21, 45, 15, 3, '2025-04-05 13:29:01', 'ordered'),
(22, 23, 1, 2, '2025-04-05 13:35:33', 'ordered'),
(23, 23, 3, 3, '2025-04-05 13:35:45', 'ordered'),
(24, 23, 4, 3, '2025-04-05 22:20:22', 'ordered'),
(25, 23, 1, 4, '2025-04-05 22:23:52', 'ordered'),
(26, 23, 2, 2, '2025-04-06 23:17:24', 'ordered'),
(27, 23, 15, 5, '2025-04-06 23:17:38', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `catergories`
--

CREATE TABLE `catergories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catergories`
--

INSERT INTO `catergories` (`id`, `name`, `description`, `user_id`, `created_at`) VALUES
(1, 'name cat1', 'desc 1', 36, '2025-03-11 21:44:15'),
(4, 'magic', 'magic books , woow', 36, '2025-03-12 23:09:19'),
(7, 'cat 3', 'dessssss 3', 36, '2025-03-22 10:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reason` enum('question','repalce','recovery','order','others') NOT NULL,
  `meessage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone_number`, `email`, `reason`, `meessage`, `created_at`) VALUES
(1, 'Elham', '01110083360', 'elham.samir.cairo.1996@gmail.com', 'question', 'test message', '2025-03-17 22:08:37'),
(2, 'Eman', '01110083360', 'elham.samir.cairo.1996@gmail.com', 'recovery', 'need  contact soon', '2025-03-22 10:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `day_offers`
--

CREATE TABLE `day_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `percentage` int(10) UNSIGNED NOT NULL,
  `time_offer` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite_products`
--

INSERT INTO `favorite_products` (`id`, `user_id`, `book_id`, `created_at`) VALUES
(1, 23, 1, '2025-03-21 03:39:16'),
(3, 23, 3, '2025-03-21 03:57:54'),
(5, 44, 1, '2025-03-25 20:34:53'),
(6, 44, 5, '2025-03-25 22:32:50'),
(8, 45, 2, '2025-04-03 14:43:04'),
(9, 45, 15, '2025-04-05 13:29:03'),
(10, 23, 2, '2025-04-06 23:17:25'),
(11, 23, 15, '2025-04-06 23:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `statues` varchar(50) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `notes` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `statues`, `user_id`, `total_price`, `address`, `notes`, `phone`, `created_at`, `email`, `first_name`, `last_name`, `city`) VALUES
(4, 'pending', 45, 50, 'cairo', 'need it fast', '2587100', '2025-04-03 15:58:21', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(5, 'pending', 45, 50, 'cairo', 'need it fast', '2587100', '2025-04-03 16:03:49', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(6, 'pending', 45, 50, 'cairo', 'need it fast', '2587100', '2025-04-03 16:05:25', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(7, 'done', 45, 50, 'cairo', 'need it fast', '2587100', '2025-04-03 16:07:46', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(8, 'done', 45, 200, '5 maadi', 'quick please', '2587100', '2025-04-05 13:27:22', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(9, 'pending', 45, 350, 'maadi', '', '01110083336', '2025-04-05 13:32:13', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(10, 'pending', 23, 650, 'maadi', 'fast', '2587100', '2025-04-05 13:36:36', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(11, 'pending', 23, 150, 'harm', 'go fast', '01110083360', '2025-04-05 22:20:57', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة'),
(12, 'pending', 23, 100, 'manial', '', '2587100', '2025-04-05 22:24:15', '', 'elham77', 'samir 77', 'القاهرة'),
(13, 'pending', 23, 550, 'haram', 'oooooooh', '01110083360', '2025-04-06 23:18:25', 'elham.samir.cairo@gmail.com', 'elham77', 'samir 77', 'القاهرة');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_qty` int(10) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_name`, `product_qty`, `image`, `created_at`, `price`, `sale_price`, `product_id`) VALUES
(1, 4, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-03 15:58:21', 25, 90, 2),
(2, 5, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-03 16:03:49', 25, 90, 2),
(3, 6, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-03 16:05:25', 25, 90, 2),
(4, 7, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-03 16:07:46', 25, 90, 2),
(5, 8, 'book1', 8, '59185caba7e91778bb382c0dc0013882.jpeg', '2025-04-05 13:27:22', 25, 30, 1),
(6, 9, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-05 13:32:13', 25, 90, 2),
(7, 9, 'boooo5', 3, '18dca569796a30fed53f89bc0cf782b4.jpeg', '2025-04-05 13:32:14', 100, 150, 15),
(8, 10, 'book1', 2, '59185caba7e91778bb382c0dc0013882.jpeg', '2025-04-05 13:36:37', 25, 30, 1),
(9, 10, 'book3', 3, '59185caba7e91778bb382c0dc0013882.jpeg', '2025-04-05 13:36:37', 200, 270, 3),
(10, 11, 'bok4', 3, '0aa96965c4f099fd02d032325fca042c.jpeg', '2025-04-05 22:20:58', 50, 60, 4),
(11, 12, 'book1', 4, '59185caba7e91778bb382c0dc0013882.jpeg', '2025-04-05 22:24:16', 25, 30, 1),
(12, 13, 'book1', 2, 'cb6f6a653f7bc0c5ef34c729f08b5623.webp', '2025-04-06 23:18:25', 25, 90, 2),
(13, 13, 'boooo5', 5, '18dca569796a30fed53f89bc0cf782b4.jpeg', '2025-04-06 23:18:26', 100, 150, 15);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `count_stars` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `password`, `created_at`) VALUES
(1, 'Elham', 'user', 'elham@gmail.com', '5f2f01603520c31a0cd0e580a469498a103ef898', '2025-03-07 21:47:17'),
(2, 'Aya', 'user', 'Aya@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:23:48'),
(7, 'ahlam', 'user', 'Ahlam@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:29:15'),
(9, 'Elham', 'user', 'elham.samir.cairo.1996@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:31:06'),
(11, 'Eman', 'user', 'eman@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:40:39'),
(13, 'xxx', 'admin', 'xx@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:42:43'),
(15, 'Elham1', 'user', 'elham.samir.cairo.19961@gmail.com', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '2025-03-08 19:45:25'),
(19, 'Elham2', 'user', 'elham2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:49:57'),
(21, 'ahmed', 'admin', 'ahmed@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 19:54:17'),
(23, 'Elham', 'user', 'elham.samir.cairo@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2025-03-08 19:58:05'),
(25, 'Elham6', 'user', 'elham6@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 20:19:45'),
(30, 'Elham7', 'user', 'elham.samir.c4airo.1996@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-08 20:28:01'),
(31, 'elham8', 'user', 'elham8@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2025-03-08 20:39:46'),
(32, 'Elham', 'user', 'eman1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-10 05:10:31'),
(33, 'Asia', 'user', 'Asia@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-10 05:13:59'),
(35, 'xxxxxxxx', 'user', 'x@g.comxxxxxxxxxx', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-10 05:20:22'),
(36, 'Admin', 'admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-10 05:41:29'),
(38, 'Elham', 'user', 'elham.samir.cairo111@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-11 20:39:11'),
(39, 'elham', 'user', 'eeeeeeeee@g.vom', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-15 08:53:09'),
(40, 'Hesham', 'user', 'hesham@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-17 19:28:16'),
(41, 'medhat', 'user', 'medhat@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-17 19:36:10'),
(42, 'gamil', 'user', 'gamil@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2025-03-17 19:43:27'),
(43, 'hazem', 'user', 'hazem@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-23 18:02:59'),
(44, 'Ayman', 'user', 'Ayman@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-03-25 20:33:38'),
(45, 'Elham', 'user', 'elham123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2025-04-03 14:37:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `catergory_id` (`catergory_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `branches_phone`
--
ALTER TABLE `branches_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `catergories`
--
ALTER TABLE `catergories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_offers`
--
ALTER TABLE `day_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `books_categories`
--
ALTER TABLE `books_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branches_phone`
--
ALTER TABLE `branches_phone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `catergories`
--
ALTER TABLE `catergories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `day_offers`
--
ALTER TABLE `day_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `books_categories_ibfk_2` FOREIGN KEY (`catergory_id`) REFERENCES `catergories` (`id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `branches_phone`
--
ALTER TABLE `branches_phone`
  ADD CONSTRAINT `branches_phone_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `branches_phone_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_products_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `catergories`
--
ALTER TABLE `catergories`
  ADD CONSTRAINT `catergories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `day_offers`
--
ALTER TABLE `day_offers`
  ADD CONSTRAINT `day_offers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorite_products_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
