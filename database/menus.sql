-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2024 at 02:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `category`, `price`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'Fruits', 80.00, 'Apple_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(2, 'Avocado', 'Fruits', 90.00, 'Avocado_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(3, 'Bell Pepper', 'Vegetables', 70.00, 'Bell pepper_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(4, 'Blueberry', 'Fruits', 100.00, 'Blueberry_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(5, 'Burger', 'Snacks', 150.00, 'Burger_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(6, 'Cheese', 'Dairy', 120.00, 'Cheese_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(7, 'Chocolate', 'Desserts', 200.00, 'Chocolate_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(8, 'Coffee Cup', 'Beverages', 110.00, 'Coffee cup_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(9, 'Coffee', 'Beverages', 90.00, 'Coffee_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(10, 'Corn', 'Vegetables', 80.00, 'Corn_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(11, 'Eggplant', 'Vegetables', 100.00, 'Eggplant_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(12, 'Fried Sausage', 'Snacks', 130.00, 'Fried sausage_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(13, 'Fried Sausage 2', 'Snacks', 140.00, 'Fried sausage2_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(14, 'Fries', 'Snacks', 120.00, 'Fries_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(15, 'Fruit Juice', 'Beverages', 130.00, 'Fruit juice_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(16, 'Gummi Candy', 'Desserts', 150.00, 'Gummi candy_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(17, 'Hot Dog', 'Snacks', 140.00, 'Hot dog_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(18, 'Ice Pack', 'Desserts', 100.00, 'Ice Pack_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(19, 'Ice Cream', 'Desserts', 180.00, 'Ice cream_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(20, 'Icecream', 'Desserts', 170.00, 'Icecream_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(21, 'Lemon', 'Fruits', 90.00, 'Lemon_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(22, 'Mexican Corn', 'Vegetables', 110.00, 'Mexican corn_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(23, 'Milk', 'Dairy', 80.00, 'Milk_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(24, 'Orange Juice', 'Beverages', 140.00, 'Orange juice_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(25, 'Orange', 'Fruits', 100.00, 'Orange_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(26, 'Peach', 'Fruits', 120.00, 'Peach_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(27, 'Pizza', 'Main Course', 250.00, 'Pizza_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(28, 'Pumpkin', 'Vegetables', 90.00, 'Pumpkin_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(29, 'Roasted Chicken', 'Main Course', 300.00, 'Roasted chicken_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(30, 'Soft Drinks', 'Beverages', 100.00, 'Soft drinks_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(31, 'Spaghetti', 'Main Course', 220.00, 'Spoghetti_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(32, 'Taco', 'Snacks', 160.00, 'Taco_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(33, 'Toast and Eggs', 'Breakfast', 180.00, 'Toast and eggs_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(34, 'Banana', 'Fruits', 70.00, 'banana_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(35, 'Beer Glass', 'Beverages', 150.00, 'beer glass_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(36, 'Cat Cupcakes', 'Desserts', 190.00, 'cat cupcakes_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(37, 'Chick Cupcakes', 'Desserts', 200.00, 'chick cupcakes_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(38, 'Cookie', 'Desserts', 120.00, 'cookie_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(39, 'Croissant', 'Desserts', 150.00, 'croissant_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(40, 'Carrots', 'Snacks', 110.00, 'cute.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(41, 'Doughnut', 'Desserts', 130.00, 'doughnut_3D.png', '2024-08-23 19:50:33', '2024-08-23 19:50:33'),
(42, 'Grape', 'Fruits', 90.00, 'grape_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(43, 'Honey', 'Desserts', 160.00, 'honey_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(44, 'Ice Cream Stick', 'Desserts', 150.00, 'ice cream stick_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(45, 'Jelly', 'Desserts', 130.00, 'jelly_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(46, 'Pancake', 'Breakfast', 200.00, 'pancake_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(47, 'Pear', 'Fruits', 80.00, 'pear_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(48, 'Piece of Cake', 'Desserts', 220.00, 'piece of cake_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(49, 'Pineapple Juice', 'Beverages', 130.00, 'pineapple juice _3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(50, 'Ramen', 'Main Course', 250.00, 'ramen_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(51, 'Sushi 2', 'Main Course', 270.00, 'sushi2_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(52, 'Sushi', 'Main Course', 260.00, 'sushi_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(53, 'Toast Sandwich', 'Breakfast', 190.00, 'toast Sandwich_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(54, 'Waffle', 'Desserts', 180.00, 'waffle_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34'),
(55, 'Watermelon', 'Fruits', 120.00, 'watermelon_3D.png', '2024-08-23 19:50:34', '2024-08-23 19:50:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
