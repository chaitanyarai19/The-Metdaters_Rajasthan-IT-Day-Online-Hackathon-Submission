-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2022 at 09:40 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u489595468_kissania`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2017-01-24 16:21:18', '31-07-2020 10:10:32 PM'),
(2, 'apnakiranas', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-31 04:46:52', '31-08-2020 10:18:08 AM');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'admin', '12345', '2021-05-28 23:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@username', 'admin@password');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_desig` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `admin_desig`) VALUES
(1, 'admin', '12345', 'hospital'),
(3, 'chaitanyarai19@gmail.com', '12345', 'organization'),
(4, 'admin2', '12345', 'organization');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(30, 'product parts', 'This category contains a list of parts that are used in the therm-on products. In any case if a particular part need to be replaced, you can find that part under this category!', '2022-12-25 11:13:31', NULL),
(31, 'service', '', '2022-12-25 11:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `exmne_id`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(4, 6, 'Glenn Duerme', 'Gwapa kay Miss Pam', 'December 05, 2019'),
(5, 6, 'Anonymous', 'Lageh, idol na nako!', 'December 05, 2019'),
(6, 4, 'Rogz Nunezsss', 'Yes', 'December 08, 2019'),
(7, 4, '', '', 'December 08, 2019'),
(8, 4, '', '', 'December 08, 2019'),
(9, 8, 'Anonymous', 'dfsdf', 'January 05, 2020'),
(10, 9, 'warren dalaoyan', 'haah', 'January 12, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sno` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sno`, `username`, `password`) VALUES
(2, 'chaitanyarai19@gmail.com', '1234'),
(3, 'anant hospital', 'hospital1234567890'),
(4, 'chaitanyarai', '1234'),
(6, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `order_code` varchar(100) NOT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `order_code`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 17, '', '1195', 1, '2022-12-24 06:27:50', 'cod', NULL),
(2, 17, '', '1205', 1, '2022-12-27 17:06:51', 'cod', NULL),
(3, 17, '', '1201', 1, '2022-12-27 17:36:26', 'online', NULL),
(4, 17, '', '1205', 1, '2022-12-27 17:36:26', 'online', NULL),
(5, 17, '', '1205', 1, '2022-12-28 09:37:24', 'online', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `sno` int(50) NOT NULL,
  `orderId` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productPrice` varchar(50) NOT NULL,
  `productpricebd` varchar(50) NOT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productquantity` varchar(100) NOT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productDescription`, `productPrice`, `productpricebd`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productquantity`, `productAvailability`, `postingDate`, `updationDate`, `status`) VALUES
(1196, 30, 84, 'Heating sensor', 'therm-on', '', '420', '420', '175_21-0058_UT_6.webp', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:42:08', NULL, ''),
(1197, 30, 84, 'Rechargeable bettery', 'therm-on', '', '195', '195', '3.7v-180mah-(lithium-polymer)-lipo-rechargeable-battery-model-kp-401522-400x400.jpeg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:44:24', NULL, ''),
(1198, 30, 84, 'Resistors(50 Pieces)', 'therm-on', '', '86', '86', '277-400x400.jpg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:46:01', NULL, ''),
(1199, 30, 84, 'White and Black LED', 'Thermol', '', '120', '120', 'white-10-mm-led-big-led-and-ldr-rm0369-by-robomart-430-500x500.jpg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:46:06', NULL, ''),
(1200, 30, 84, 'Suction Pump', 'therm-on', '', '5000', '5000', 'shopping.webp', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:47:11', NULL, ''),
(1201, 30, 84, 'Capacitor', 'Thermol', '', '120', '120', 'electrolytic-capacitor-500x500.jpg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:47:38', NULL, ''),
(1202, 30, 84, 'node mcu esp8266', 'Thermol', '', '250', '250', '61UOyRccN0L._SX342_.jpg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:49:34', NULL, ''),
(1203, 30, 84, 'Suction Pump', 'therm-on', '', '5000', '5000', 'shopping.webp', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:50:25', NULL, ''),
(1204, 30, 84, 'smoke mq2 sensor', 'Thermol', '', '80', '80', 'MQ2-1.png', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:50:55', NULL, ''),
(1205, 31, 85, 'Therm-on', 'therm-on', 'This is manual(without suction pump)', '900', '900', 'Screenshot from 2022-12-26 20-19-09.png', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:51:06', NULL, ''),
(1206, 31, 86, 'Therm-on(auto)', 'therm-on', '', '5000', '5000', 'Screenshot from 2022-12-26 20-19-09.png', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:52:06', NULL, ''),
(1207, 30, 84, 'jumpher wire ', 'Thermol', '', '70', '70', 'A_few_Jumper_Wires.jpg', NULL, NULL, 0, '0', 'In Stock', '2022-12-26 14:52:39', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(84, 30, 'Electronic', '2022-12-26 14:39:19', NULL),
(85, 31, 'manual', '2022-12-26 14:50:11', NULL),
(86, 31, 'auto', '2022-12-26 14:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `username`, `email`, `phone`) VALUES
(18, 'Chaitanya Rai', 'chaitanyarai19@gmail.com', '6261557440'),
(19, 'Chaitanya Rai', 'chaitanyarai19@gmail.com', '8435407793'),
(20, 'Chaitanya Rai', 'chaitanyarai19@gmail.com', '9424789988');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(286, 'chaitanyarai19@gmail.com', 0x3135372e33342e3234392e3139390000, '2022-03-02 16:16:10', '02-03-2022 09:58:59 PM', 1),
(287, 'chaitanyarai19@gmail.com', 0x3135372e33342e3234392e3139390000, '2022-03-02 16:29:16', '02-03-2022 10:00:25 PM', 1),
(288, 'chaitanyarai19@gmail.com', 0x3135372e33342e3234392e3139390000, '2022-03-02 16:30:32', NULL, 1),
(289, 'chaitanyarai19@gmail.com', 0x3135372e33342e3234392e3139390000, '2022-03-02 16:30:32', '02-03-2022 10:02:53 PM', 1),
(290, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a35, '2022-12-24 06:27:37', NULL, 1),
(291, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-27 16:16:45', '27-12-2022 10:37:19 PM', 1),
(292, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-27 17:25:28', '27-12-2022 10:59:54 PM', 1),
(293, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-27 17:30:08', NULL, 0),
(294, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-27 17:30:15', '27-12-2022 11:00:26 PM', 1),
(295, 'chaitanyarai19@gmail.com', 0x323430313a343930303a313664323a63, '2022-12-27 17:35:50', NULL, 1),
(296, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-27 17:37:04', '27-12-2022 11:07:32 PM', 1),
(297, 'chaitanyarai19@gmail.com', 0x323430313a343930303a316330393a38, '2022-12-28 09:37:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `regDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `phone`, `address`, `state`, `city`, `pin`, `email`, `password`, `regDate`, `type`) VALUES
(17, 'Chaitanya Rai', '8435407793', '509, bajrang kuti, Nursingh ward colony\r\nmadan mahal', 'Madhya Pradesh', 'Jabalpur', 482001, 'chaitanyarai19@gmail.com', '12345', '2022-03-01 14:54:51.669933', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `password` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `sno` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1208;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
