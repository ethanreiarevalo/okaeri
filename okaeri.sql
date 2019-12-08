-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 09:28 AM
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
-- Table structure for table `2cart`
--

CREATE TABLE `2cart` (
  `productID` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `2purchases`
--

CREATE TABLE `2purchases` (
  `productID` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `datePurchase` date DEFAULT NULL,
  `salesID` int(10) DEFAULT NULL,
  `paymentMethod` varchar(16) DEFAULT NULL,
  `orderStatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `2purchases`
--

INSERT INTO `2purchases` (`productID`, `amount`, `datePurchase`, `salesID`, `paymentMethod`, `orderStatus`) VALUES
(0, 1, '2019-12-08', 1, 'Cash On Delivery', 'Undelivered'),
(10, 1, '2019-12-08', 1, 'Cash On Delivery', 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `2vouchers`
--

CREATE TABLE `2vouchers` (
  `voucherID` int(10) DEFAULT NULL,
  `voucherName` varchar(100) DEFAULT NULL,
  `voucherDiscount` float(6,2) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
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
(0, 'Delivery Charge', 'admin', 'null', 'null', 'null', '0000-00-00', '0000-00-00', 'null', 'null', 0, 50.00, 'null'),
(6, 'DragonBall Vol.1', 'Akira Toriyama', 'Viz Media', 'Manga', 'English', '2019-12-01', '2019-11-30', 'adventure, action, fantasy', 'product_image/DBallv1.png', 5, 150.00, 'Before there was Dragon Ball Z, there was Akira Toriyama\'s action epic Dragon Ball, starring the younger version of Son Goku and all the other Dragon Ball Z heroes! Meet a naive young monkey-tailed boy named Goku, whose quiet life changes when he meets Bulma, a girl who is on a quest to collect seven \"Dragon Balls.\" If she gathers them all, an incredibly powerful dragon will appear and grant her one wish. But the precious orbs are scattered all over the world, and Bulma needs Goku\'s help (and his super-strength)! With a magic staff for a weapon and a flying cloud for a ride, Goku sets out on the adventure of a lifetime...'),
(7, 'Bleach Vol.25', 'Tite Kubo', 'Shounen Jump', 'Manga', 'Japanese', '2019-12-01', '2019-11-30', 'adventure, action, fantasy', 'product_image/bleachvol25.jpg', 10, 100.00, 'Ichigo\'s recent battles with the Arrancars have proven that if he wants to protect his friends he must get stronger, and the only way to do that is to control his inner Hollow. Ichigo turns to the Visoreds, ex-Soul Reapers who have been Hollowfied, to teach him. But before his training begins, Ichigo must do battle against his Hollow self--winner takes his soul!'),
(8, 'Saint Young Men Vol.1', 'Hikaru Nakamura', 'Kodansha', 'Manga', 'English', '2019-12-01', '2019-11-30', 'slice of life', 'product_image/saintyoungmen.jpg', 26, 150.00, 'Saint Young Men is a Japanese slice of life comedy manga series written and illustrated by Hikaru Nakamura. Its plot involves Jesus Christ and Gautama Buddha, who are living as roommates in an apartment in Tokyo.'),
(9, 'The Way of House Husband Vol.1', 'Kouske Oono', 'Viz Media', 'Manga', 'English', '2019-12-01', '2019-11-30', 'slice of life', 'product_image/WayHouseHusband.jpg', 20, 150.00, 'He was the fiercest member of the yakuza, a man who left countless underworld legends in his wake. They called him â€œthe Immortal Dragon.â€ But one day he walked away from it all to travel another pathâ€”the path of the househusband! The curtain rises on this cozy yakuza comedy!'),
(10, 'Naruto Vol.1', 'Masashi Kishimoto', 'Shounen Jump', 'Manga', 'Japanese', '2019-12-01', '2019-11-30', 'adventure, action, fantasy', 'product_image/naruto-vol1.png', 9, 150.00, '\"The legend. Twelve years ago, the peaceful village of Konohagakure was terroized by a nine-tailed fox demon. The town\'s ninja fought bravely against the ferocious spirit. After a long battle, the fox demon was captured by the Hokage, the village leader and most powerful ninja...'),
(11, 'No Game No Life', 'Yuu Kamiya', 'Yen Press', 'Light Novel', 'English', '2019-12-01', '2019-11-30', 'adventure, fantasy', 'product_image/ngnl-vol1.png', 5, 120.00, 'In this fantasy world, everything\'s a game--and these gamer siblings play to win!\r\n\r\nMeet Sora and Shiro, a brother and sister who are loser shut-ins by normal standards. But these siblings don\'t play by the rules of the \"crappy game\" that is average society. In the world of gaming, this genius pair reigns supreme, their invincible avatar so famous that it\'s the stuff of urban legend. So when a young boy calling himself God summons the siblings to a fantastic alternate world where war is forbidden and all conflicts--even those involving national borders--are decided by the outcome of games, Sora and Shiro have pretty much hit the jackpot. But they soon learn that in this world, humanity, cornered and outnumbered by other species, survives within the confines of one city. Will Sora and Shiro, two failures at life, turn out to be the saviors of mankind? Let the games begin...!'),
(12, 'Shield Hero Vol.8', 'Aneko Yusagi', 'Kadokawa', 'Light Novel', 'Japanese', '2019-12-01', '2019-11-30', 'adventure, action, fantasy', 'product_image/shieldherovol8.jpg', 5, 110.00, 'At a critical moment, Naofumi and the others are saved by a young girl. Ostâ€™s sacrifice is enough to save them from their battle to the death with Kyo, but Kyo\'s able to escape to another world. Naofumi attempts to follow him, but he awakens to find himself in prison! His friends are scattered and he finds himself back at level one. How will Naofumi survive the new challenges that await him?'),
(13, 'Kono Subarashii Sekai Ni Shuufuku Wo!', 'Natsume Akatsuki', 'Kadokawa', 'Light Novel', 'Japanese', '2019-12-01', '2019-11-30', 'adventure, action, fantasy', 'product_image/v10cover.jpg', 15, 120.00, 'After Belzerg\'s financial support is cut off, Iris is forced into an arranged marriage with Elroad\'s crown prince in an attempt to regain the funding Belzerg so desperately needs to continue repelling the Demon King\'s invasion. With even this maneuver not guaranteed to succeed, Iris calls for help from the one person which common sense never seems to apply to.'),
(14, 'Is It Wrong to Try to Pick Up Girls in a Dungeon?', 'Fujino Omori', 'Yen Press', 'Light Novel', 'English', '2019-12-01', '2019-11-30', 'adventure, romance, action, fantasy', 'product_image/DanMachi_Light_Novel_Volume_8_Cover.png', 14, 160.00, '30 kilometers east of Orario, Ares and his men marched to the city to start another war, but despite this the citizens of the city weren\'t concerned at all as there was nothing to worry about. As Orario had a dungeon, their adventurers were far stronger, and therefore they were used to easily clear out the enemy. Taking advantage of this, merchants, including Gods like Dian Cecht, swarmed the enemy camp, eager to sell them what they could manage to forcefully sell them. This included prostitutes like Aisha and Samira who scoured the battlefield for good men that they could enjoy. '),
(15, 'My Youth Romantic Comedy Is Wrong, As I Expected', 'Wataru Watari', 'Yen Press', 'Light Novel', 'English', '2019-12-01', '2019-11-30', 'romance, slice of life', 'product_image/oregairu-vol1--eng.png', 5, 180.00, 'Hachiman Hikigaya is an apathetic high school student with narcissistic and semi-nihilistic tendencies. He firmly believes that joyful youth is nothing but a farce, and everyone who says otherwise is just lying to themselves.\r\n\r\nIn a novel punishment for writing an essay mocking modern social relationships, Hachiman\'s teacher forces him to join the Volunteer Service Club, a club that aims to extend a helping hand to any student who seeks their support in achieving their goals. With the only other club member being the beautiful ice queen Yukino Yukinoshita, Hachiman finds himself on the front line of other people\'s problemsâ€”a place he never dreamed he would be. As Hachiman and Yukino use their wits to solve many students\' problems, will Hachiman\'s rotten view of society prove to be a hindrance or a tool he can use to his advantage?');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int(20) NOT NULL,
  `amount` int(7) NOT NULL,
  `salesDate` date NOT NULL,
  `invoice` int(7) NOT NULL,
  `paymentMethod` varchar(16) NOT NULL,
  `deliveryStatus` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `amount`, `salesDate`, `invoice`, `paymentMethod`, `deliveryStatus`) VALUES
(1, 200, '2019-12-08', 2, 'Cash On Delivery', 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `userID` int(11) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`userID`, `userEmail`, `userPassword`, `userType`, `status`) VALUES
(1, 'Admin', 'Admin', 'Admin', ''),
(2, 'ethanreiarevalo@gmail.com', 'hanirokyu', 'user', 'Active');

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
('ethanreiarevalo@gmail.com', 'Ma Angelica', 'Arevalo', 'Regina Ville 2000 Trece Martires City', '09952445097', '1996-08-09', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucherID` int(4) NOT NULL,
  `voucherName` varchar(50) NOT NULL,
  `voucherAmount` int(5) NOT NULL,
  `voucherDiscount` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

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
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
