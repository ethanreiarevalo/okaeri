-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 05:05 PM
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
-- Table structure for table `10cart`
--

CREATE TABLE `10cart` (
  `productID` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `10cart`
--

INSERT INTO `10cart` (`productID`, `amount`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `10purchases`
--

CREATE TABLE `10purchases` (
  `productID` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `datePurchase` date DEFAULT NULL,
  `salesID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productTitle` varchar(100) NOT NULL,
  `productAuthor` varchar(20) NOT NULL,
  `productPublisher` varchar(30) NOT NULL,
  `productType` varchar(11) NOT NULL,
  `productLanguage` varchar(20) NOT NULL,
  `productDateReceived` date NOT NULL,
  `productDatePublished` date NOT NULL,
  `productGenre` varchar(100) DEFAULT NULL,
  `productImage` varchar(150) NOT NULL,
  `productStock` int(3) NOT NULL,
  `productPrice` double(11,2) NOT NULL,
  `productDescription` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productAuthor`, `productPublisher`, `productType`, `productLanguage`, `productDateReceived`, `productDatePublished`, `productGenre`, `productImage`, `productStock`, `productPrice`, `productDescription`) VALUES
(1, 'Kono Subarashii Sekai ni Shukufuku wo! Volume 10', 'Natsume Akatsuki', 'Yen Press', '2', '2', '2019-11-07', '2016-11-01', 'on, on, on', 'product_image/v10cover.jpg', 50, 300.00, 'After Belzerg\'s financial support is cut off, Iris is forced into an arranged marriage with Elroad\'s crown prince in an attempt to regain the funding Belzerg so desperately needs to continue repelling the Demon King\'s invasion. With even this maneuver not guaranteed to succeed, Iris calls for help from the one person which common sense never seems to apply to.'),
(2, 'Dungeon ni Deai o Motomeru no wa Machigatteiru Darou ka Volume 8', 'Fujino Omori', 'SB Creative', 'Light Novel', 'Japanese', '2019-11-14', '2015-06-15', 'on, on, on, on', 'product_image/DanMachi_Light_Novel_Volume_8_Cover.png', 20, 300.00, 'The royal army led by the War God Ares. The number of the army heading to Orario numbers 30,000. Against the sound of the incoming army, Orario - didn\'t change.\r\nWhile the invaders outside let out cries of despair against the too strong adventurers, Orario spent peaceful days.\r\nThe Pallum\'s marriage proposal, the lovely bodyguard, the town girl\'s secret, the love songs to the Gods - and the love song that a Goddess spins.\r\nA daily life part that Gods and children give!');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int(20) NOT NULL,
  `amount` int(7) NOT NULL,
  `date` date NOT NULL,
  `invoice` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

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
(2, 'carloangeles342@gmail.com', 'asdfjklh', 'user'),
(10, 'ethanreiarevalo@gmail.com', 'hanirokyu', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `email` varchar(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`email`, `fName`, `lName`, `address`, `contactNo`, `birthdate`, `sex`) VALUES
('carloangeles342@gmail.com', 'Carlo', 'Angeles', 'Alfonso, Cavite', '2147483647', '1996-11-01', 'Male'),
('ethanreiarevalo@gmail.com', 'Ethan Rei', 'Arevalo', 'Regina Ville 2000', '2147483647', '1996-08-09', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`);

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
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
