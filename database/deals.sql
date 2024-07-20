-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 11:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u512319048_Deals`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `category` varchar(200) NOT NULL,
  `category_image` varchar(200) NOT NULL,
  `craeted_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `category_image`, `craeted_at`) VALUES
(1, 'T-shirts', '172113017411.jpeg', '2024-07-16'),
(2, 'suits', '17211302031.jpeg', '2024-07-16'),
(3, 'Face Serum', '172113022316.jpeg', '2024-07-16'),
(4, 'Ladies Shoes', '172113023913.jpeg', '2024-07-16'),
(5, 'Hair Oil', '172113026017.jpeg', '2024-07-16'),
(6, 'Watches', '17211302795.jpeg', '2024-07-16'),
(7, 'Lipsticks', '172113068215.jpeg', '2024-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `status` enum('pending','on_the_way','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_price` int(200) NOT NULL,
  `category_id` int(100) NOT NULL,
  `product_description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_price`, `category_id`, `product_description`, `created_at`, `status`) VALUES
(1, 'Hair Food Oil', '172113041417.jpeg', 1124, 5, 'Product Details*:  \r\n📦 *Package Includes*: 1 x Hair Oil  \r\n🌿 *Havelyn’s Hair Food* will help moisturize and seal hair. This oil can help prevent a dry, flaky scalp and dandruff, as well as split ends and hair breakage. Havelyn’s Hair Food will make your hair look shinier, stronger, and longer.  \r\n⚠️ *Disclaimer*: Before using a new cosmetic product, conduct a test on a small area of your skin. If you have a specific allergy or sensitivity, check the ingredients to avoid a reaction. Always read the warning labels and directions on the package for using any cosmetic products.  \r\n💰 *Price*: 1124', '2024-07-16', 1),
(2, 'Rice Raw Pulp Essence Face Serum', '172113048516.jpeg', 556, 3, '✨ Product Description: Revive your natural beauty with the use of organic products.🌸 Product Details:Size: 15 MLType: Bioaqua Hyaluronic Acid Rice Raw Pulp Essence Face SerumBenefit: Revive your natural beauty with the use of organic products.💧 Price: PKR 556', '2024-07-16', 1),
(3, 'Round Toe-Shape', '172113060914.jpeg', 1147, 4, '* *Material*: PU Fabric, PVC Sole 🧵👞  \r\n* *Available Sizes*: 6, 7, 8, 9, 10, 11 📏  \r\n* *Enclosure Type*: Round Toe-Shape 👟  \r\n* *Comfortable* 😊  \r\n* *High Quality* 🌟  \r\n* *Easy To Walk* 🚶  \r\n* *Note*: There might be slight color differences due to different light and monitor effects. 🌈🖥️  \r\n* *1147*.', '2024-07-16', 1),
(4, 'Pack of 4 Lipsticks', '172113072815.jpeg', 762, 7, 'Hey Girl Pack of 4 Lipsticks* 🌟\r\n\r\n💄 *Product Description*: Pack of 4 attractively colored and textured lipsticks for every occasion.\r\n\r\n✨ *Product Details*:\r\n- *Type*: Lipstick\r\n- *Quantity*: Pack of 4\r\n- *Features*: Each lipstick has a rich, fatty base that is firm yet spreads easily upon application.\r\n\r\n🛍️ *Price*: PKR 762', '2024-07-16', 1),
(5, 'Women\'s Velvet Formal Pumps', '172113082813.jpeg', 944, 4, '*Women\'s Velvet Formal Pumps* ✨\r\n\r\n👠 *Upgrade Your Wardrobe With This Latest Pumps Collection* 👠\r\n\r\n*Product Details:*\r\n- *Material:* Velvet\r\n- *Product Type:* Women\'s Pumps\r\n- *Pattern:* Stones\r\n- *Sizes:* 7, 8, 9, 10\r\n- *Features:* Comfortable, Stylish, Breathable\r\n\r\n📦 *Package Includes:* 1 x Pumps Pair\r\n\r\n*Note:* There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.\r\n\r\n*Price:* RS 944\r\n*Deal Offer:* 🎉 *10% Off* 🎉\r\n\r\nUpgrade your style with these chic and comfy pumps today! 💃✨', '2024-07-16', 1),
(6, 'Lawn printed Suit', '17211309051.jpeg', 1374, 2, '*Product Details*:\r\n\r\n- *Fabric*: Lawn 🌿\r\n- *Product Type*: Suit 👗\r\n- *Pattern*: Printed 🎨\r\n- *Neck Type*: Round Neck 🔄\r\n- *Standard Size* 📏\r\n- *Dimensions*: \r\n  - *Shirt*: Chest 21 inches, Length 38-39 inches\r\n  - *Trouser*: One Side Waist 22 inches\r\n- *Package Includes*: 1 x Shirt, 1 x Trouser 📦\r\n\r\n🔍 *Note*: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects. \r\n\r\n💰 *Price*: 1374', '2024-07-16', 1),
(7, 'Men\'s Stitched Jersey Plain T-Shirt', '172113097512.jpeg', 2319, 1, '*✨ Deal of the Day - 40% OFF! ✨*\r\n\r\n*Product Name*: Men\'s Stitched Jersey Plain T-Shirt, Pack Of 5\r\n\r\n*Product Description*:\r\n\r\n*Product Details*:\r\n- *Fabric*: Jersey\r\n- *Product Type*: T-Shirt\r\n- *Pattern*: Plain\r\n- *Available Sizes*: Medium, Large, X-Large (Size Chart Attached)\r\n- *Package Includes*: 5 x T-Shirts\r\n\r\n📏 *Note*: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.\r\n\r\n*🔥 Don\'t miss out on this amazing deal! Upgrade your wardrobe with these versatile and comfortable T-shirts today! 🔥*\r\n\r\n*Special Price*: RS 2319 (40% OFF) 💥🛒😊👕\r\n\r\n🛒🎉💫', '2024-07-16', 1),
(8, 'Men\'s Stitched Jersey Plain T-Shirt,', '172113110411.jpeg', 2319, 1, '*✨ Deal of the Day - 40% OFF! ✨*\r\n\r\n*Product Name*: Men\'s Stitched Jersey Plain T-Shirt, Pack Of 5\r\n\r\n*Product Description*:\r\n\r\n*Product Details*:\r\n- *Fabric*: Jersey\r\n- *Product Type*: T-Shirt\r\n- *Pattern*: Plain\r\n- *Available Sizes*: Medium, Large, X-Large (Size Chart Attached)\r\n- *Package Includes*: 5 x T-Shirts\r\n\r\n📏 *Note*: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.\r\n\r\n*🔥 Don\'t miss out on this amazing deal! Upgrade your wardrobe with these versatile and comfortable T-shirts today! 🔥*\r\n\r\n*Special Price*: RS 2319 (40% OFF) 💥🛒😊👕\r\n\r\n🛒🎉💫', '2024-07-16', 1),
(9, 'Men\'s Stitched Jersey Plain T-Shirt', '172113118210.jpeg', 2319, 1, '*✨ Deal of the Day - 40% OFF! ✨*\r\n\r\n*Product Name*: Men\'s Stitched Jersey Plain T-Shirt, Pack Of 5\r\n\r\n*Product Description*:\r\n\r\n*Product Details*:\r\n- *Fabric*: Jersey\r\n- *Product Type*: T-Shirt\r\n- *Pattern*: Plain\r\n- *Available Sizes*: Medium, Large, X-Large (Size Chart Attached)\r\n- *Package Includes*: 5 x T-Shirts\r\n\r\n📏 *Note*: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.\r\n\r\n*🔥 Don\'t miss out on this amazing deal! Upgrade your wardrobe with these versatile and comfortable T-shirts today! 🔥*\r\n\r\n*Special Price*: RS 2319 (40% OFF) 💥🛒😊👕\r\n\r\n🛒🎉💫', '2024-07-16', 2),
(10, 'Steel Watch', '17211312646.jpeg', 4924, 6, '✨ *Limited Time Offer: 30% Off on Watche!* ✨\r\n\r\n*Material:* Stainless Steel  \r\n*Product Type:* Watch  \r\n*Watch Case Shape:* Round  \r\n*Details:* Stainless Steel Strap  \r\n*Movement:* Quartz, Water Resistant, Watch Box Included  \r\n*Display Format:* 12-Hour Format  \r\n*Package Includes:* 1 x Watch  \r\n\r\n*Note:*  \r\n- There might be an error of 1-3 cm due to manual measurement.  \r\n- Slight color differences may occur due to varying lighting and monitor effects.  \r\n\r\n*Price:* 4924 with delivery 🚚\r\n\r\n*Hurry up and grab this deal before it’s gone!* ⏰', '2024-07-16', 1),
(11, '3 Pcs Women\'s Stitched Organza Embroidered Suit', '17211313312.jpg', 2500, 2, 'Product Name: 3 Pcs Women\'s Stitched Organza Embroidered Suit\r\nProduct Description: \r\nProduct Details:Gender: Women\'s\r\nFabric: Organza\r\nPattern: Embroidered\r\nNeck Type: Round Neck\r\nShirt Pattern: Embroidered\r\nTrouser Pattern: Embroidered\r\nDupatta Pattern: Embroidered\r\nAvailable Sizes: Medium\r\nNumber Of Pieces: 3 Pcs\r\nColor: Black\r\nPackage Includes: 1 x Shirt, 1 x Trouser, 1 x Dupatta\r\nShirt Length: 36 Inches\r\nShirt Chest: 20 Inches\r\nShirt Shoulder: 17 Inches\r\nTrouser Length: 38 Inches\r\nTrouser Waist: 23 Inches\r\nDupatta Dimensions: 2.5 Yards\r\n\r\n\r\nNote: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.\r\n\r\n2500', '2024-07-16', 1),
(12, 'Leather strip watch', '17211314143.jpg', 4774, 6, '30% Off Limited Time Offer! 🔥* ✨\r\n\r\n*Material:* Leather 🧵  \r\n*Product Type:* Watch ⌚  \r\n*Watch Case Shape:* Round 🔵  \r\n*Details:*  \r\n- Strap Material: Leather 🪶  \r\n- Movement: Quartz ⚙️  \r\n- Water Resistant 🌊  \r\n\r\n*Display Format:* 12-Hour Format 🕛  \r\n*Weight:* 200 Gm ⚖️  \r\n*Package Includes:* 1 x Watch 📦  \r\n\r\n*Note:*  \r\n- There might be an error of 1-3 cm due to manual measurement. 📏  \r\n- Slight color differences may occur due to varying lighting and monitor effects. 🌈  \r\n\r\n*Price:* 4774 💸\r\n\r\n*Don\'t miss out on this stylish deal!* ⏰ 🛍️', '2024-07-16', 2),
(13, '3 Pcs Women\'s Stitched Fancy Organza Embroidered Suit', '17211314711.jpg', 3460, 2, 'Product Name: 3 Pcs Women\'s Stitched Fancy Organza Embroidered Suit\r\nProduct Description: Elevate Your Wardrobe With Our Festive Collection\r\nProduct Details:Fabric: Organza\r\nProduct Type: Fancy Stitched Suit\r\nPattern: Embroidered\r\nNeck Type: Boat Neck\r\nSize: Standard\r\nShirt (Chest 20 Inches, Shirt Length 37 Inches, Arm Hole 8 Inches, Sleeve Length 18 Inches, Flare 45 Inches), Trouser (Length 37 Inches), Dupatta (2.25 Gazz)\r\nPackage Includes: 1 x Shirt, 1 x Trouser, 1 x Dupatta\r\nNote: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.', '2024-07-16', 1),
(14, '3 Pcs Women\'s Stitched Organza Embroidered Suit', '17211318224.jpg', 2500, 2, 'Product Name: 3 Pcs Women\'s Stitched Organza Embroidered Suit\r\nProduct Description: \r\nProduct Details:Gender: Women\'s\r\nFabric: Organza\r\nPattern: Embroidered\r\nNeck Type: Round Neck\r\nShirt Pattern: Embroidered\r\nTrouser Pattern: Embroidered\r\nDupatta Pattern: Embroidered\r\nAvailable Sizes: Medium\r\nNumber Of Pieces: 3 Pcs\r\nColor: Black\r\nPackage Includes: 1 x Shirt, 1 x Trouser, 1 x Dupatta\r\nShirt Length: 36 Inches\r\nShirt Chest: 20 Inches\r\nShirt Shoulder: 17 Inches\r\nTrouser Length: 38 Inches\r\nTrouser Waist: 23 Inches\r\nDupatta Dimensions: 2.5 Yards\r\n\r\n\r\nNote: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects.', '2024-07-16', 2),
(15, 'Lawn printed Suit', '17211319593.jpeg', 1374, 2, 'Product Details*:\r\n\r\n- *Fabric*: Lawn 🌿\r\n- *Product Type*: Suit 👗\r\n- *Pattern*: Printed 🎨\r\n- *Neck Type*: Round Neck 🔄\r\n- *Standard Size* 📏\r\n- *Dimensions*: \r\n  - *Shirt*: Chest 21 inches, Length 38-39 inches\r\n  - *Trouser*: One Side Waist 22 inches\r\n- *Package Includes*: 1 x Shirt, 1 x Trouser 📦\r\n\r\n🔍 *Note*: There might be an error of 1-3 cm due to manual measurement, and slight color differences may occur as a result of varying lighting and monitor effects. \r\n\r\n💰 *Price*: 1374', '2024-07-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `status` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `email`, `mobile`, `role`, `status`) VALUES
(6, 'Danish Ali', '$2y$10$yKG2oFDT.xUbjJEsFSAar.1brWZF0bTa230VA5c5.uqTvzAMNR2AK', '1721366280ab67616d00001e021a8c4618eda885a406958dd0 (1).jpg', 'dbalouch50@gmail.com', '03103431884', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_messages`
--

CREATE TABLE `users_messages` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_messages`
--
ALTER TABLE `users_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_messages`
--
ALTER TABLE `users_messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
