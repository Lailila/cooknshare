-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2026 at 07:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooknshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `recipe_id` int(11) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `recipe_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ingredients` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `description`, `file_name`, `image_path`, `created_at`, `ingredients`, `category`) VALUES
(1, 22, 'asdas', 'asxasx', 'cooking_12182361.png', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104151214cooking_12182361.png', '2026-01-04 15:12:14', 'asdasd', 'maindish'),
(2, 22, 'dcadc', 'dcssd', 'frying-pan_10647075.png', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104162437frying-pan_10647075.png', '2026-01-04 16:24:37', 'sdcsd', 'maindish'),
(3, 22, 'Schnitzel', 'anleitung', 'profile.jpg', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104164004profile.jpg', '2026-01-04 16:40:04', 'chicken, tomato, pasta', 'maindish'),
(4, 22, 'Kuchen', 'backen', 'burger.jpg', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104184552burger.jpg', '2026-01-04 18:45:52', 'Mehl, Zucker', 'dessert'),
(5, 22, 'weedaw', 'dvsdva', 'burger.jpg', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104185207burger.jpg', '2026-01-04 18:52:07', 'wefdcdc', 'appetizer'),
(6, 24, 'test3-recipe', 'kochen', 'indian.jpg', '/Applications/XAMPP/xamppfiles/htdocs/cooknshare/pages/../images/20260104185759indian.jpg', '2026-01-04 18:57:59', 'Bananen', 'appetizer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`, `image_path`) VALUES
(7, 'userxxxx', 'userxxxx@x.com', '$2y$10$QdiYiux41HFnXaSKCUi/YOieBA9TyoZYxaamkCgO72j43oUo77rZO', '2025-12-30 15:28:08', NULL, ''),
(18, 'test1', 'test1@com', '$2y$10$YaPSvEMCvKTd7qasmmE.9.kp1o0z23HWLbfR/dsIbmKCf4RYlI2Qm', '2025-12-30 15:28:08', NULL, ''),
(19, 'hinawoll', 'hina@com', '$2y$10$So3zi7udMpsQjDOAG4bOjOXqUTqOp69Nowq7e0vUBBB0TthXU.yAe', '2025-12-30 15:28:08', NULL, ''),
(20, 'abc_cook', 'abc@cook', '$2y$10$2zyRCd.wd1MG/pClA840L.SKzXqzl9mmGWk86Qw7X65h0yxGnunuy', '2026-01-01 19:16:30', NULL, NULL),
(21, 'test_a', 'test_a@com', '$2y$10$a3aDLIT85ZU8gwoBcfS/MOBgMYyuVXocBloYrp2cMaQC34/B0WloW', '2026-01-01 19:23:23', NULL, NULL),
(22, 'test2', 'test2@com', '$2y$10$5vk.11KdmGCcRR.Oba2CgOTYwjKFUWE4PMzIqfJaSSCysNoGNsE02', '2026-01-01 19:37:12', NULL, NULL),
(23, 'test', 'test@com', '$2y$10$3kj40ublirH/ArvbKb6bcus1YMsh4zuABipi6igqqcFP/.Q4g6eVy', '2026-01-01 19:41:05', NULL, NULL),
(24, 'test3', 'test3@com', '$2y$10$o4NQM4VDMgc8qLdkVwU3yeGRSljDZ2Kh.MQbVPqYgAC/.MoMW9kRu', '2026-01-01 20:39:05', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_path` (`image_path`),
  ADD UNIQUE KEY `image_path_2` (`image_path`),
  ADD UNIQUE KEY `image_path_3` (`image_path`),
  ADD UNIQUE KEY `image_path_4` (`image_path`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
