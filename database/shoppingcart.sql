-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2016 at 05:35 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `allproducts`
--

CREATE TABLE IF NOT EXISTS `allproducts` (
  `productID` varchar(10) DEFAULT NULL,
  `productName` varchar(121) DEFAULT NULL,
  `productCategory` varchar(121) DEFAULT NULL,
  `brand` varchar(121) DEFAULT NULL,
  `productDescription` varchar(500) DEFAULT NULL,
  `costPrice` int(11) DEFAULT NULL,
  `sellingPrice` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allproducts`
--

INSERT INTO `allproducts` (`productID`, `productName`, `productCategory`, `brand`, `productDescription`, `costPrice`, `sellingPrice`, `stock`) VALUES
('SE6662', 'Puma Sneakers Multi Color Casual Shoes', 'Sneakers', 'Puma', 'Puma Sneakers Multi Color Casual Shoes\r\n', 4599, 3999, 15),
('YF0675', 'Mizuno Wave Twister 4 Multi Color Badminton Sports Shoes', 'Sport shoe', 'Mizuno Wave', 'Mizuno Wave Twister 4 Multi Color Badminton Sports Shoes', 2750, 2250, 21),
('XP4047', 'Aadi sneakers blue sneaker shoes', 'Sneakers', 'Aadi', 'Aadi sneakers blue sneaker shoes', 1750, 1550, 30),
('UJ3861', 'Puma G Vilas NBK Speckle Tennis Shoes', 'Tennis shoes', 'Puma', 'Puma G. Vilas NBK Speckle Tennis Shoes', 3579, 2995, 20),
('KB4915', 'Nike Air Force 1 Low Lightweight', 'Casual wear', 'Nike', 'Nike Air Force 1 Low Lightweight', 5450, 5250, 13),
('YJ9898', 'coach leatherware est 1941 shoes', 'Tennis shoes', 'Coach', 'coach leatherware est 1941 shoes', 1999, 1450, 10),
('PA7237', 'Unicorn pastel pop platform sneakers', 'Platform Sneakers', 'Unicorn', 'Unicorn pastel pop platform sneakers', 2499, 1999, 10),
('OF5266', 'Columbus Running Sports Shoes', 'Running shoes', 'Columbus', 'Columbus Running Sports Shoes Columbus Running Sports Shoes', 999, 799, 8),
('FQ9877', 'Fitze Mens Black and Red Sport Shoes', 'Sport shoe', 'Fitze', 'Fitze Mens Black and Red Sport Shoes', 999, 799, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `productID` varchar(11) DEFAULT NULL,
  `productName` varchar(121) DEFAULT NULL,
  `productCategory` varchar(121) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `productDescription` text,
  `brand` varchar(121) DEFAULT NULL,
  `costPrice` int(11) DEFAULT NULL,
  `sellingPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productID`, `productName`, `productCategory`, `quantity`, `productDescription`, `brand`, `costPrice`, `sellingPrice`) VALUES
('OF5266', 'Columbus Running Sports Shoes', 'Running shoes', 2, 'Columbus Running Sports Shoes Columbus Running Sports Shoes', 'Columbus', 999, 799),
('PA7237', 'Unicorn pastel pop platform sneakers', 'Platform Sneakers', 2, 'Unicorn pastel pop platform sneakers', 'Unicorn', 2499, 1999),
('YF0675', 'Mizuno Wave Twister 4 Multi Color Badminton Sports Shoes', 'Sport shoe', 2, 'Mizuno Wave Twister 4 Multi Color Badminton Sports Shoes', 'Mizuno Wave', 2750, 2250);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
