-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 06:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `okaeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productTitle` varchar(50) NOT NULL,
  `productAuthor` varchar(20) NOT NULL,
  `productPublisher` varchar(30) NOT NULL,
  `productType` varchar(10) NOT NULL,
  `productLanguage` varchar(20) NOT NULL,
  `productDateReceived` date NOT NULL,
  `productDatePublished` date NOT NULL,
  `productGenre` varchar(100) DEFAULT NULL,
  `productImage` varchar(50) NOT NULL,
  `productStock` int(3) NOT NULL,
  `productPrice` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productAuthor`, `productPublisher`, `productType`, `productLanguage`, `productDateReceived`, `productDatePublished`, `productGenre`, `productImage`, `productStock`, `productPrice`) VALUES
(1, 'Komi Can\'t Communicate', 'Tomohito Oda', 'Viz Media', 'Manga', 'English', '0000-00-00', '0000-00-00', 'School Life, Romance, Comdey', 'product_image/Komi-san.jpg', 10, 100.00),
(2, 'Saint Young Men', 'Hikaru Nakamura', 'Kodansha', 'Manga', 'English', '0000-00-00', '0000-00-00', 'Comedy', 'product_image/saintyoungmen.jpg', 20, 100.00),
(16, 'Kono Subarashii Sekai ni Shukufuku wo! Volume 10', 'Natsume Akatsuki', 'Yen Press', '2', '2', '2019-11-07', '2019-11-01', NULL, 'product_image/v10cover.jpg', 50, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `userID` int(11) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`userID`, `userEmail`, `userPassword`, `userType`) VALUES
(1, 'Admin', 'Admin', 'Admin'),
(2, 'carloangeles342@gmail.com', 'asdfjklh', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `email` varchar(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`email`, `fName`, `lName`, `address`, `contactNo`, `birthdate`, `sex`) VALUES
('carloangeles342@gmail.com', 'Carlo', 'Angeles', 'Alfonso, Cavite', 2147483647, '1996-11-01', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
