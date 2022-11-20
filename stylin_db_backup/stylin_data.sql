-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 12:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stylin_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `stylin_cart`
--

CREATE TABLE `stylin_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id_ref` int(11) NOT NULL,
  `user_id_ref` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_cart`
--

INSERT INTO `stylin_cart` (`cart_id`, `product_id_ref`, `user_id_ref`) VALUES
(84, 15, 'him@gmail.com'),
(85, 8, 'him@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_orders`
--

CREATE TABLE `stylin_orders` (
  `order_id` int(11) NOT NULL,
  `product_id_ref` int(11) NOT NULL,
  `user_id_ref` varchar(100) NOT NULL,
  `product` varchar(50) NOT NULL,
  `deliver_to` varchar(100) NOT NULL,
  `delivery_add` varchar(500) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `price` mediumint(4) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Order Placed',
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_orders`
--

INSERT INTO `stylin_orders` (`order_id`, `product_id_ref`, `user_id_ref`, `product`, `deliver_to`, `delivery_add`, `state`, `zip_code`, `price`, `status`, `timestamp`) VALUES
(16, 15, 'himanshu', 'Nike Sneakers', 'Himanshu ', 'Bathinda', 'Punjab', '151005', 1310, 'Completed', '2021-09-27 14:37:40'),
(17, 10, 'himanshu', 'Backpack Grey 38L', 'Himanshu ', 'Bathinda', 'Punjab', '151005', 1845, 'Completed', '2021-09-27 14:37:40'),
(18, 5, 'himanshu', 'Smart Watch 5i', 'Himanshu ', 'Bathinda', 'Punjab', '151005', 2727, 'Completed', '2021-10-03 15:10:17'),
(19, 3, 'himanshu', 'Blue Denim Jeans', 'Himanshu ', 'Bathinda', 'Punjab', '151005', 3590, 'Order Placed', '2021-10-03 15:20:25'),
(20, 1, 'himanshu', 'Nike Running Shoes', 'Himanshu ', 'Bathinda', 'Punjab', '151005', 3590, 'Order Placed', '2021-10-03 15:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_popular_products`
--

CREATE TABLE `stylin_popular_products` (
  `p_popular_id` int(11) NOT NULL,
  `p_popular_ref` int(11) NOT NULL,
  `p_popularity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_popular_products`
--

INSERT INTO `stylin_popular_products` (`p_popular_id`, `p_popular_ref`, `p_popularity`) VALUES
(1, 1, 32),
(2, 3, 23),
(3, 7, 19),
(4, 5, 34),
(5, 8, 25),
(7, 4, 24),
(8, 2, 26),
(9, 9, 13),
(10, 10, 26),
(11, 11, 83),
(12, 12, 6),
(13, 13, 36),
(14, 14, 23),
(15, 15, 256);

-- --------------------------------------------------------

--
-- Table structure for table `stylin_products`
--

CREATE TABLE `stylin_products` (
  `p_id` int(4) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_subcategory` varchar(50) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_brand` varchar(50) NOT NULL,
  `p_information` text NOT NULL,
  `p_description` text NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_color` varchar(50) NOT NULL,
  `p_size` varchar(4) NOT NULL,
  `p_material` varchar(50) NOT NULL,
  `p_quantity` tinyint(4) NOT NULL,
  `p_price` mediumint(4) NOT NULL,
  `p_discount` tinyint(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_products`
--

INSERT INTO `stylin_products` (`p_id`, `p_category`, `p_subcategory`, `p_name`, `p_brand`, `p_information`, `p_description`, `p_type`, `p_color`, `p_size`, `p_material`, `p_quantity`, `p_price`, `p_discount`, `timestamp`) VALUES
(1, 'mens', 'shoes', 'Nike Running Shoes', 'Nike', 'Premium quality shoes by Nike. Best for running, fully comfortable for running and walking.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Sports Shoes', 'White-Orange', 'UK-7', 'Polyester', 100, 2000, 5, '2021-09-27 14:37:21'),
(2, 'womens', 'shoes', 'Nike Sports Shoes', 'Nike', 'Premium quality shoes by Nike. Best for running, fully comfortable for running and walking.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Sports Shoes', 'Light Green', 'UK-6', 'Polyester', 100, 2500, 15, '2021-09-27 14:37:21'),
(3, 'mens', 'jeans', 'Blue Denim Jeans', 'Spykar', 'Blue jeans, regular fit mid-rise jeans for men.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Regular', 'Blue', '32\'', 'Denim', 127, 1499, 5, '2021-09-27 14:37:21'),
(4, 'womens', 'jeans', 'Blue Ripped Jeans', 'Pepe Jeans', 'Blue ripped jeans, slim fit for women.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Slim Fit', 'Blue', '28\'', 'Denim', 127, 1299, 5, '2021-09-27 14:37:21'),
(5, 'accessories', 'watches', 'Smart Watch 5i', 'Watches&Time', 'Latest smart watch from watches&time with body sensors that will keep track of your healt. The watch has a battery backup upto 4 days.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Smart Watch', 'Black', '44 m', 'Silicone', 127, 3399, 25, '2021-09-27 14:37:21'),
(7, 'womens', 'sweater', 'Yellow Sweater', 'H&M', 'Woolen sweater for women by H&M. Quality made by H&M', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Full Sleeve', 'Yellow', 'L', 'Woolen', 127, 1499, 5, '2021-09-27 14:37:21'),
(8, 'bags', 'laptopbag', 'Black Laptop Bag 34L', 'Lap Care', 'Black laptop bag with capacity of 34 litres, it can carry your laptop and other things also.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Laptop Bag', 'Black', '34L', 'Synthetic fibres', 127, 999, 15, '2021-09-27 14:37:21'),
(9, 'mens', 'tshirts', 'Blue T-Shirt for Men', 'Nike', 'Nike blue printed shirt. Premium quality cotton.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Regular Fit', 'Blue', 'XL', 'Cotton 80%', 127, 700, 5, '2021-09-27 14:37:21'),
(10, 'bags', 'laptopbag', 'Backpack Grey 38L', 'Lap Care', 'Laptop bag with 38L capacity and waterproof cover.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Laptop Bag', 'Grey', '38L', 'Polyester', 127, 1899, 10, '2021-09-27 14:37:21'),
(11, 'womens', 'shoes', 'Addidas Sneakers', 'Addidas', 'Addidas sneaker white for women. Best for casual wear.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Sneakers', 'White', 'UK-6', 'Polyester', 127, 1299, 50, '2021-09-27 14:37:21'),
(12, 'womens', 'top', 'Full Sleeve Top', 'fashtop', 'Full sleeve black top pure cotton premium quality.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Full Sleeve', 'Black', 'M', 'Cotton', 127, 799, 5, '2021-09-27 14:37:21'),
(13, 'mens', 'jeans', 'Black Mid-Rise Jeans', 'Spykar', 'Premium quality jeans from spykar.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Regular Fit', 'Black', '34\'', 'Denim', 127, 2300, 15, '2021-09-27 14:37:21'),
(14, 'womens', 'jeans', 'H&M Light Jeans', 'H&M', 'Premium quality jeans by h&m for womens.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Slim Fit', 'Light Blue', '28\'', 'Denim', 127, 1999, 35, '2021-09-27 14:37:21'),
(15, 'mens', 'shoes', 'Nike Sneakers', 'Nike', 'Nike sneakers red coloured, for causual wearing.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga modi quae, suscipit sint doloremque repellendus natus soluta atque doloribus quidem, mollitia blanditiis. Aliquid molestias distinctio accusantium, consequatur rerum deleniti onsectetur voluptatem excepturi laboriosam doloribus qui officia non aut odio. Deserunt acere dolore officia et non soluta nihil sit provident quia!', 'Sneakers', 'Red', 'UK-7', 'Polyester', 127, 2000, 40, '2021-09-27 14:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_product_images`
--

CREATE TABLE `stylin_product_images` (
  `p_image_id` int(11) NOT NULL,
  `p_image_ref` int(11) NOT NULL,
  `p_image_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_product_images`
--

INSERT INTO `stylin_product_images` (`p_image_id`, `p_image_ref`, `p_image_name`) VALUES
(1, 1, '../assets/product images/nike shoes orange-white3.jpg'),
(2, 1, '../assets/product images/nike shoes orange-white1.jpg'),
(3, 1, '../assets/product images/nike shoes orange-white2.jpg'),
(4, 2, '../assets/product images/nike shoes light-green - 2.jpg'),
(5, 2, '../assets/product images/nike shoes light-green - 3.jpg'),
(6, 2, '../assets/product images/nike shoes light-green - 1.jpg'),
(7, 3, '../assets/product images/jeansformen1.jpg'),
(8, 4, '../assets/product images/jeansforwomen1.jpg'),
(9, 5, '../assets/product images/smartwatchinbox1.jpg'),
(11, 15, '../assets/product images/nike shoes red1.jpg'),
(12, 8, '../assets/product images/backpack black1.jpg'),
(13, 9, '../assets/product images/blue shirt1.jpg'),
(14, 10, '../assets/product images/backpack1.jpg'),
(15, 11, '../assets/product images/shoes1.jpg'),
(16, 12, '../assets/product images/blacktop1.png'),
(17, 12, '../assets/product images/blacktop2.png'),
(18, 12, '../assets/product images/blacktop3.png'),
(19, 13, '../assets/product images/denimjean1.png'),
(20, 13, '../assets/product images/denimjean2.png'),
(21, 13, '../assets/product images/denimjean3.png'),
(22, 14, '../assets/product images/skybluejeans1.png'),
(23, 14, '../assets/product images/skybluejeans2.png'),
(24, 14, '../assets/product images/skybluejeans3.png'),
(25, 7, '../assets/product images/yellowsweater1.png'),
(26, 7, '../assets/product images/yellowsweater2.png'),
(27, 7, '../assets/product images/yellowsweater3.png'),
(28, 11, '../assets/product images/shoes2.jpg'),
(29, 11, '../assets/product images/shoes3.jpg'),
(30, 5, '../assets/product images/smartwatchinbox2.jpg'),
(31, 5, '../assets/product images/smartwatchinbox3.jpg'),
(32, 15, '../assets/product images/nike shoes red2.jpg'),
(33, 15, '../assets/product images/nike shoes red3.jpg'),
(34, 8, '../assets/product images/backpack black2.jpg'),
(35, 8, '../assets/product images/backpack black3.jpg'),
(36, 10, '../assets/product images/backpack2.jpg'),
(37, 10, '../assets/product images/backpack3.jpg'),
(38, 9, '../assets/product images/blue shirt2.jpg'),
(39, 9, '../assets/product images/blue shirt3.jpg'),
(40, 3, '../assets/product images/jeansformen2.jpg'),
(41, 3, '../assets/product images/jeansformen3.jpg'),
(42, 4, '../assets/product images/jeansforwomen2.jpg'),
(43, 4, '../assets/product images/jeansforwomen3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_slider_offers`
--

CREATE TABLE `stylin_slider_offers` (
  `offer_id` int(11) NOT NULL,
  `offer_category` varchar(50) NOT NULL,
  `offer_title` varchar(50) NOT NULL,
  `offer_desc` varchar(100) NOT NULL,
  `offer_info` varchar(100) NOT NULL,
  `offer_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_slider_offers`
--

INSERT INTO `stylin_slider_offers` (`offer_id`, `offer_category`, `offer_title`, `offer_desc`, `offer_info`, `offer_image`) VALUES
(1, 'womens', 'Newly Arrived', 'upto 30% Discount', 'Hurry up! Check out our new collection.', '../assets/slider images/womensfashion.jpg'),
(2, 'footwear', 'Nike Discount Days', 'Starting at Rs.999', 'Get premium quality shoes from Nike.', '../assets/slider images/shoecollection.jpg'),
(3, 'mens', 'Summer Collection', 'upto 50% Discount', 'On brands like Nike, Puma, Addidas etc.', '../assets/slider images/mensfashion.jpg'),
(6, 'accessories', 'Watches from Timex', 'Buy 1 Get 1 free', 'Chronograph, round stainless steel watches form Timex.', '../assets/slider images/watch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_user`
--

CREATE TABLE `stylin_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL DEFAULT 'user',
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_user`
--

INSERT INTO `stylin_user` (`user_id`, `username`, `email`, `password`, `type`, `timestamp`) VALUES
(10, 'himanshu', 'him@gmail.com', '$2y$10$KKEXne6PVqTMK7sLBlpmtOtny9qB8qufqn7kfBb3CHNdu55Wycbf.', 'user', '2021-09-27 14:36:10'),
(13, 'madtitan', 'thanos@gmail.com', '$2y$10$x3LO21P6uKN1rDAqqS/VS.D9WaRNfwAVwAPIl21wws6gSAxUOcfom', 'admin', '2021-09-27 14:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `stylin_user_reviews`
--

CREATE TABLE `stylin_user_reviews` (
  `review_id` int(11) NOT NULL,
  `product_id_ref` int(11) NOT NULL,
  `user_id_ref` varchar(50) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `user_rating` tinyint(4) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stylin_user_reviews`
--

INSERT INTO `stylin_user_reviews` (`review_id`, `product_id_ref`, `user_id_ref`, `user_review`, `user_rating`, `timestamp`) VALUES
(6, 15, 'himanshu', 'Nice product, superfast delivery🙌🙌', 5, '2021-09-27 14:36:52'),
(9, 15, 'himanshu', 'very good product 😃😃 must buy! quality wise very good 👌👌..', 4, '2021-09-27 14:36:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stylin_cart`
--
ALTER TABLE `stylin_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `stylin_orders`
--
ALTER TABLE `stylin_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `stylin_popular_products`
--
ALTER TABLE `stylin_popular_products`
  ADD PRIMARY KEY (`p_popular_id`);

--
-- Indexes for table `stylin_products`
--
ALTER TABLE `stylin_products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stylin_product_images`
--
ALTER TABLE `stylin_product_images`
  ADD PRIMARY KEY (`p_image_id`);

--
-- Indexes for table `stylin_slider_offers`
--
ALTER TABLE `stylin_slider_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `stylin_user`
--
ALTER TABLE `stylin_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `stylin_user_reviews`
--
ALTER TABLE `stylin_user_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stylin_cart`
--
ALTER TABLE `stylin_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `stylin_orders`
--
ALTER TABLE `stylin_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stylin_popular_products`
--
ALTER TABLE `stylin_popular_products`
  MODIFY `p_popular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stylin_products`
--
ALTER TABLE `stylin_products`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stylin_product_images`
--
ALTER TABLE `stylin_product_images`
  MODIFY `p_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `stylin_slider_offers`
--
ALTER TABLE `stylin_slider_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stylin_user`
--
ALTER TABLE `stylin_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stylin_user_reviews`
--
ALTER TABLE `stylin_user_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
