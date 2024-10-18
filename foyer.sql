-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 01:02 PM
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
-- Database: `foyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'decor', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(15, 'Table'),
(16, 'chair'),
(17, 'decorations');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(100) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(6, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `images` text DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(100) NOT NULL,
  `material` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `material`) VALUES
(15, 'wood');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `actual_price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `type` varchar(400) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `meta_title`, `meta_description`, `actual_price`, `sale_price`, `details`, `tags`, `image`, `category_id`, `size_id`, `material_id`, `color_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(20, ' 3 Tier Wood With Metal Shelf', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639407_product1.jpg', 15, 11, 15, 6, 'New Arrivals', 1, '2024-01-19 04:43:27', '2024-01-19 04:43:27'),
(21, '68in. Bronze Metal Coat Rack', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita', '', '1705639503_product3.jpg', 16, 11, 15, 6, 'New Arrivals', 1, '2024-01-19 04:45:03', '2024-01-19 04:45:03'),
(23, 'Gold Metal Fox Design Trinket Tray', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639645_product7.jpg', 17, 11, 15, 6, 'Best Sellers', 1, '2024-01-19 04:47:25', '2024-01-19 04:47:25'),
(24, 'Parkview 5 Tier Metal &amp; Wood', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639710_product9.jpg', 17, 11, 15, 6, 'New Arrivals', 1, '2024-01-19 04:48:30', '2024-01-19 04:48:30'),
(25, '63in. White Stucco Floor Lamp', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639835_product2.jpg', 17, 11, 15, 6, 'New Arrivals', 1, '2024-01-19 04:50:35', '2024-01-19 04:50:35'),
(26, 'Emmy Green Floral Wood Leg', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\n', '', '1705639886_product4.jpg', 17, 11, 15, 6, 'Best Collections', 1, '2024-01-19 04:51:26', '2024-01-19 04:51:26'),
(27, 'Gold Metal Clothing Rack With', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639938_product6.jpg', 17, 11, 15, 6, 'Best Sellers', 1, '2024-01-19 04:52:18', '2024-01-19 04:52:18'),
(28, 'Heirloom Gold Metal Folding Shelf', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705639988_product8.jpg', 16, 11, 15, 6, 'Best Sellers', 1, '2024-01-19 04:53:08', '2024-01-19 04:53:08'),
(29, 'Rabbit Grey Faux Fur Pouf', '', '', 800.00, 699.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705640033_product10.jpg', 17, 11, 15, 6, 'New Arrivals', 1, '2024-01-19 04:53:53', '2024-01-19 04:53:53'),
(30, 'Gold Circle Mirrored Shelf Bar Cart', '', '', 800.00, 599.00, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Numquam commodi quas placeat earum fugit esse quae ratione? Provident, quia sapiente minus consequatur placeat eius dolor laudantium, quae nam nesciunt expedita!.', '', '1705641024_product5.jpg', 17, 11, 15, 6, 'Best Collections', 1, '2024-01-19 05:10:24', '2024-01-19 05:10:24'),
(31, 'hbdxkjfuidfjiojwiofnwf', '', '', 999.00, 333.00, 'Ankara Chair with Fabric Cushion 29.75â€³Wx28â€³Dx30.5â€³H\r\n\r\nFrame is benchmade with precision-cut solid ash with grey wash finish, hardwood plywood, and a cane seat\r\nSynthetic webbing suspension system\r\nSoy-based polyfoam cushion with fiber encased in downproof ticking\r\nFrame stained with grey wash finish and clear protective lacquer\r\nSee product label or call customer service for additional details on product content', '', '1705646210_product22.jpg', 16, 11, 15, 6, 'Best Sellers', 1, '2024-01-19 06:36:50', '2024-01-19 06:36:50'),
(33, 'Maple Brass and Fabric Armchairs', '', '', 8000.00, 6999.00, 'Phasellus vitae imperdiet felis. Nam non condimentum erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tortor arcu, consectetur eleifend commodo at, consectetur eu justo.\r\n\r\n', '', '1705647934_07-6-1.jpg', 16, 11, 15, 6, '', 1, '2024-01-19 07:05:34', '2024-01-19 07:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(100) NOT NULL,
  `size` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(11, 'xl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
