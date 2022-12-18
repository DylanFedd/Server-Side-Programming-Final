-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 05:28 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int UNSIGNED NOT NULL,
  `UserID` int UNSIGNED NOT NULL,
  `ProductID` int UNSIGNED NOT NULL,
  `ShippingAddress` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PaymentMethod` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ShippingMethod` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DateOrdered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `ProductID`, `ShippingAddress`, `PaymentMethod`, `ShippingMethod`, `DateOrdered`) VALUES
(4, 2, 1, 'test', 'Paypal', 'fast shipping', '2022-12-18'),
(5, 2, 2, 'test2', 'Visa', 'safe shipping', '2022-12-18'),
(6, 2, 4, 'test2', 'Visa', 'safe shipping', '2022-12-18'),
(7, 12, 2, 'clear water rd', 'Paypal', 'safe shipping', '2022-12-18'),
(8, 12, 1, 'cozy ave', 'Visa', 'normal Shipping', '2022-12-18'),
(9, 12, 3, 'cozy ave', 'Visa', 'normal Shipping', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int UNSIGNED NOT NULL,
  `ProductName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ProductPrice` decimal(5,2) UNSIGNED NOT NULL,
  `ProductDescription` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `InventoryQty` int UNSIGNED NOT NULL,
  `ImgFileName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductPrice`, `ProductDescription`, `InventoryQty`, `ImgFileName`) VALUES
(1, 'Spyro Figure', '11.99', 'You loved him in Spyro and The Dawn of Dragons. Now enjoy him in with the other Skylander team.', 46, 'SpyroProduct.jpg'),
(2, 'Zap Figure', '11.99', 'A water lizard with a electric temper. Don\'t mess with this static reptile.', 42, 'ZapProduct.jpg'),
(3, 'Hot Dog Figure', '11.99', 'Mans best friend. Even this burning little pup', 14, 'HotDogProduct.jpg'),
(4, 'Bouncer Figure', '14.99', 'Need for speed! Try and keep up with this one wheel speed machine.', 23, 'BouncerProduct.jpg'),
(5, ' Crusher Figure', '14.99', 'A stone giant. Who is cold to the touch, but with a warm heart.', 18, 'CrusherProduct.jpg'),
(6, 'Dr Krankcase Playset', '54.99', 'A play set for your skylanders to beat the evil Dr.Krankcase in his own domain.', 14, 'PlaySetProduct.jpeg'),
(14, 'Zook Figure', '11.99', 'Hes a tree man', 12, 'ZookProduct.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int UNSIGNED NOT NULL,
  `UserFirstName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `UserLastName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `AccountUserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `UserType` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserFirstName`, `UserLastName`, `AccountUserName`, `Password`, `UserType`) VALUES
(2, 'Troy', 'Anderson', 'TroyA@yahoo.com', '$2y$10$fP5IeQwo4qa8rRmIOFZTj.amS8WTJK/wsstqfhTWRXKAtc.NFk8.i', 'Admin'),
(3, 'John', 'Blue', 'JohnB@yahoo.com', '$2y$10$CwHmWZCTKd60ihubHEF4E.q0XkDfl2CU/jiZpsRu5nFINC4rkFC06', 'User'),
(5, 'Cole', 'Train', 'ColeT@yahoo.com', '$2y$10$ySvCrLlHzEZZUU.Nisv.teffzUWE8qOJbydT3cCIOOrm.HFkMZIBe', 'User'),
(10, 'Katie', 'Orange', 'KatieO@yahoo.com', '$2y$10$ljrflfzaJgomx7Zd6menFOmwJjQpbXTFm5G84m9GFCuaPP4G1aHBK', 'User'),
(11, 'Hero', 'Class', 'HeroC@yahoo.com', '$2y$10$DkJ1zr8bQntltzMHDOaSuuiFj9vIEVitUdcMJqjrv3rmSS41o7PJi', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `WarehouseID` int UNSIGNED NOT NULL,
  `WarehouseAddress` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`WarehouseID`, `WarehouseAddress`) VALUES
(1, 'Clear Lake Rd'),
(2, 'Saint Cloud Ave'),
(3, 'Dark Wood Ave'),
(4, 'Willow Streat'),
(5, 'Cold Heart Ave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`WarehouseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `WarehouseID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
