-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2023 at 03:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2030_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(7) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `prepTime` int(11) NOT NULL,
  `cookTime` int(11) NOT NULL,
  `cusine` enum('Vietnamese','Chinese','Japanese','Indian','Western','Korean','Greek','Mexican','Middle Eastern','Other') NOT NULL,
  `meal` set('Breakfast','Brunch','Lunch','Dinner','Dessert','Appetizers','Snack') NOT NULL,
  `restrictions` enum('Vegan','Vegetarian','Halal','Kosher','None') DEFAULT NULL,
  `ingredients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ingredients`)),
  `steps` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`steps`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `image`, `prepTime`, `cookTime`, `cusine`, `meal`, `restrictions`, `ingredients`, `steps`) VALUES
(1, 'Mushroom Soup', 'photos/pexels-1.jpg', 5, 5, 'Western', 'Lunch,Appetizers', 'Vegetarian', NULL, NULL),
(2, 'Prawn Spaghetti', 'photos/pexels-2.jpg', 10, 10, 'Western', 'Dinner', 'None', NULL, NULL),
(3, 'Berry Pancake', 'photos/pexels-3.jpg', 5, 5, 'Western', 'Dessert', 'Halal', NULL, NULL),
(4, 'Kebabs', 'photos/pexels-4.jpg', 20, 15, 'Middle Eastern', 'Lunch', 'None', NULL, NULL),
(5, 'Bibimbap', 'photos/pexels-5.jpg', 15, 10, 'Korean', 'Lunch', 'None', NULL, NULL),
(6, 'Seafood Noodles', 'photos/pexels-6.jpg', 10, 15, 'Vietnamese', 'Dinner', 'None', NULL, NULL),
(7, 'Fruit Salad', 'photos/pexels-7.jpg', 5, 5, 'Greek', 'Breakfast', 'Vegan', NULL, NULL),
(8, 'Caesar Salad', 'photos/pexels-8.jpg', 10, 5, 'Western', 'Lunch', 'Kosher', NULL, NULL),
(9, 'Prawn Tempura', 'photos/pexels-9.jpg', 15, 10, 'Japanese', 'Snack', 'Halal', NULL, NULL),
(10, 'Walnut Banana Bread', 'photos/pexels-10.jpg', 30, 20, 'Greek', 'Brunch', 'Kosher', NULL, NULL),
(11, 'Dumplings', 'photos/pexels-11.jpg', 30, 10, 'Chinese', 'Snack', 'None', NULL, NULL),
(12, 'Churros', 'photos/pexels-12.jpg', 30, 10, 'Mexican', 'Snack', 'None', NULL, NULL),
(13, 'Panipuri', 'photos/pexels-13.jpg', 15, 5, 'Indian', 'Snack', 'Vegetarian', NULL, NULL),
(14, 'Corn Curry', 'photos/pexels-14.jpg', 40, 60, 'Indian', 'Lunch,Dinner', 'Vegetarian', '[\"corn\",\" curry leaves\",\" spices\",\" oil\",\" water\"]', '[\"fry spices with oil\",\"add curry leaves\",\"add corn\",\"boil for 60 mins\"]'),
(17, 'Yam Fries', 'photos/pexels-15.jpg', 10, 5, 'Western', 'Lunch,Appetizers,Snack', 'None', '[\"yam\",\"oil\",\"flour\"]', '[\"slice yam into thick slices\",\"slice slices into strips\",\"lightly coat each strip with flour\",\"deep fry for 5mins\"]'),
(18, 'Greek Yoghurt', 'photos/pexels-7.jpg', 5, 5, 'Greek', 'Brunch', 'Kosher', '[\"strawberries\",\"blueberries\",\"yoghurt\"]', '[\"add yoghurt into bowl\",\"add fruit toppings\"]'),
(19, 'Tom Yum noodles', 'photos/pexels-6.jpg', 30, 15, 'Other', 'Lunch', 'None', '[\"prawn\",\"coconut milk\",\"chilli\",\"noodles\"]', '[\"fry prawn and chilli\",\"boil in coconut milk\",\"blanch noodles\",\"serve\"]'),
(20, 'Cream of Mushroom', 'photos/pexels-1.jpg', 30, 10, 'Other', 'Brunch', 'Halal', '[\"milk\",\"fresh mushrooms\"]', '[\"slice each mushroom\",\"boil in milk for 10 mins\"]'),
(21, 'Vegetable Curry', 'photos/pexels-14.jpg', 5, 10, 'Vietnamese', 'Appetizers', 'None', '[\"item\",\"item\"]', '[\"step 1\",\"step 2\",\"step 3\",\"done\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
