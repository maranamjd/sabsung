-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2019 at 06:36 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabsung`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_id` varchar(16) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `checkedOut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `transaction_id`, `quantity`, `checkedOut`) VALUES
(15, '20190310577', 4, '201910060002', 1, 1),
(17, '20190310577', 3, '201910060002', 1, 1),
(18, '20190310577', 1, '201910060003', 1, 1),
(19, '30201909624', 2, '201910070001', 1, 1),
(20, '30201909624', 4, '201910070001', 1, 1),
(21, '30201909624', 3, '201910070002', 1, 1),
(22, '30201909812', 1, '201910070003', 2, 1),
(23, '30201909812', 2, '201910070003', 1, 1),
(24, '30201909624', 2, '201910070004', 2, 1),
(25, '30201909624', 3, '201910070005', 1, 1),
(26, '30201909624', 4, '201910080002', 2, 1),
(27, '20190310577', 8, '201910090001', 2, 1),
(28, '20190310577', 1, '201910090002', 2, 1),
(29, '20190310577', 2, '201910090002', 2, 1),
(30, '30201909635', 1, '201910080001', 2, 1),
(31, '30201909635', 2, '201910080001', 1, 1),
(32, '30201909624', 2, '201910080002', 1, 1),
(33, '20190310577', 9, '201910090003', 1, 1),
(34, '20190310577', 1, '201910090003', 2, 1),
(35, '20190310577', 4, '201910090003', 3, 1),
(36, '30201909635', 2, '201910090004', 1, 1),
(37, '30201909635', 1, '201910090004', 1, 1),
(38, '30201909635', 3, '201910090004', 3, 1),
(39, '30201909624', 9, '201910100001', 1, 1),
(40, '30201909624', 2, '201910100001', 1, 1),
(41, '30201909624', 4, '201910100001', 2, 1),
(42, '30201909624', 1, '201910100001', 1, 1),
(43, '30201909635', 1, '201910100002', 1, 1),
(44, '30201909635', 4, '201910100002', 1, 1),
(45, '30201909635', 3, '201910100002', 1, 1),
(46, '20190310577', 8, '201910100003', 2, 1),
(47, '20190310577', 9, '201910100003', 1, 1),
(48, '20191010461', 12, '201910100004', 1, 1),
(49, '20191010461', 11, '201910100004', 1, 1),
(50, '20191010461', 13, '201910100004', 1, 1),
(51, '20191010461', 14, '201910100004', 1, 1),
(52, '20191010461', 19, '201910100004', 3, 1),
(53, '20191010461', 10, '201910100004', 1, 1),
(54, '20190310577', 25, '201910110001', 1, 1),
(55, '20190310577', 10, '201910110001', 1, 1),
(56, '20190310577', 19, '201910110001', 3, 1),
(57, '30201909624', 18, '201910110002', 1, 1),
(58, '30201909624', 14, '201910110002', 1, 1),
(59, '30201909624', 1, '201910110002', 1, 1),
(60, '30201909624', 2, '201910110002', 1, 1),
(61, '30201909624', 19, '201910110002', 1, 1),
(62, '30201909624', 10, '201910110002', 1, 1),
(63, '30201909635', 14, '201910110003', 1, 1),
(64, '30201909635', 11, '201910110003', 1, 1),
(65, '30201909635', 9, '201910110003', 1, 1),
(66, '30201909635', 10, '201910110003', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `description` varchar(64) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `image`, `description`, `trash`) VALUES
(1, 'qled.webp', 'QLED', 0),
(2, 'uhdtv.png', 'UHD TV', 0),
(3, 'fullhd.png', 'FULL HD TV', 0),
(4, 'hd.png', 'HD TV', 0),
(5, 'the frame.webp', 'THE FRAME TV', 0),
(6, 'f17822c9e10a95802f36451e747696f2.jpg', 'CURVED', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `message`, `status`) VALUES
(1, 'Patricia G. Santos', 'santos@gmail.com', 'Hello!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `image`, `name`, `description`, `price`, `quantity`, `trash`) VALUES
(1, 1, 'qled_tv.jpg', 'QLED TV', 'Real 4K: 4x higher than Full HD;Upscale video content up to 4K;True-to-life images w/ HDR 16X;4-sided Bezel-less Screen', 299999, 2, 0),
(2, 1, 'qled_8k_tv.jpg', 'QLED 8K TV', '4x Higher Resolution than UHD;Upscale video content up to 8K;True-to-life images w/ HDR 32X;Adaptive Sound w/ Samsung AI', 3999999, 0, 0),
(3, 1, '4k_smart_qled_tv.jpg', '4K Smart QLED TV Q6F Series 6 (2018)', 'Q Contrast Elite;Q HDR Elite (HDR 10+);Ambient Mode;One Remote Control', 69990, 1, 0),
(4, 1, '4k_qled_curved_smart_tv.jpg', '4K QLED Curved Smart TV Q8C Series 8 (2018)', 'One Invisible Connection;Ambient Mode;Curved Screen;Boundless 360 Design', 57999, 1, 0),
(5, 1, '4k_qled_smart_tv_q7f.jpg', '4K QLED Smart TV Q7F Series 7 (2018)', 'Boundless 360 Design;One Invisible Connection;No Gap Wall-mount;One Remote Control', 229999, 5, 0),
(8, 4, 'qled_8k_tv.jpg', 'HD TV', '64 inches HD TV; Surround Sound; Infrared Remote', 299999, 3, 0),
(9, 2, '8d4a89ca906e7fff8bea34ef77b898f8.jpg', '4K UHD SMART TV', '64 inches Flat Design;Free Remote;IOT enabled smart tv', 499999, 4, 0),
(10, 2, 'fca4afdc823ab1772cda0def53189b91.png', '82 inch Premium UDH TV', '82 inches Premium UHD TV;Real 4K: 4x higher than FullHD;Optimized for Fast ;Gaming;Wide Viewing Angle;One remote control with Bixby', 275498, 3, 0),
(11, 3, '0c55195a4460168b2857b832deb5936e.png', 'FHD Smart TV N5500 Series 5', 'High Definition TV; Full Sreen High Definition;Smart Samsung AI', 23990, 4, 0),
(12, 3, '681a8446b9e5b69eab7de49fe5d4ada3.png', 'FHD TV N5013 Series 5', 'Clean View;Wide Color Enhancer;Full HD picture quality', 31996, 4, 0),
(13, 3, '399e56a1d8f774bed31657da82cd7d96.png', 'FHD Smart TV n5500 Series 5', 'HDR;Ultra Clean View;PurColour', 42190, 2, 0),
(14, 3, 'be8e2541c26df27750cf0c35294e3829.png', 'Full HD TV J5250 Series 5', 'Clean View;Wide Colour Enhancer;Full HD picture quality', 26900, 3, 0),
(15, 3, '0421b5e64f739d3c89b05eb29b650e4a.png', 'Full HD TV N5003 Series 5', 'Clean View;Wide Colour Enhancer;Full HD picture quality;Connect share movie', 15990, 6, 0),
(16, 3, '243c8c0460129d01754a14b0af1720c4.png', 'Full HD Smart TV J5202 Series 5', 'Full HD picture quality;Wide colour enhancer;Connect share movie', 19998, 5, 0),
(17, 4, '94212312ee4a56822a3090ce4334acb0.png', '32 inch HD TV N4013 Series 4', 'Clean view;Wide Colour Enhancer;HD picture quality', 15098, 4, 0),
(18, 4, 'f0fa59492c1cc4b7c6bd8e3fe3796ae5.png', '32 inch HD TV N4003 Series 4', 'Clean View;Wide Colour Enhancer;HD picture quality;Connect share movie', 16365, 4, 0),
(19, 2, 'e51e807e103131bd6142086975449f99.png', 'Curved UHD TV', 'Real 4K: 4x higher than FullHD;Immersive curved panel viewing;Sharper details with HDR;Smart Hub: Unlimited Content', 46095, 5, 0),
(20, 2, '9d2052cae93f1140e1e68bc470521cfd.png', '75 inch UHD TV', 'Real 4K: 4x higher than FullHD;Clean and sleek design;Sharper details with HDR;Smart Hub: Unlimited Content', 45000, 6, 0),
(21, 2, '94a02573167eb28b9f53f9a46f67752f.png', '65 inch UHD 4K Curved Smart TV NU7300 Series 7', 'Real 4K UHD Resolution;Curves inspired by nature;Slim Design;HDR', 57999, 3, 0),
(22, 2, '74c0c0fd139b9b85e4f1133224a80e45.png', '75 inch UHD 4K Smart TV NU7100 Series 7', 'Real 4K UHD Resolution;PurColour;UHD Dimming;Slim Design', 55999, 4, 0),
(23, 2, 'e1e3c662371d86aabbed5bf23a4e7f32.png', '75 inch  UHD 4K Smart TV MU6100 Series 6', '4K UHD TV;UHD Resolution;Slim design;Smart View', 234095, 4, 0),
(24, 2, '37aac6bcc7f5cdec1b46cc8dee3f8dcc.png', '65 inch UHD 4K Curved Smart TV KU6300 Series 6', 'Stunning 4K UHD resolution;Auto Depth Enhancer;UHD Dimming technology', 133499, 8, 0),
(25, 2, '04c031189e396b76472c4cb2ef172453.png', '65 inch UHD 4K Flat Smart TV JU7000 Series 7', 'Enjoy 4x clearer and more detailed images vs Full HD TV;Powered by a Quadcore Processor for speedy performance.', 127499, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review`, `date`, `score`) VALUES
(1, '30201909635', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt u.', '2019-10-01', 4),
(2, '30201909812', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt u.', '2019-10-02', 5),
(3, '20190310577', 3, 'So colorful. I love it!!! It feels like you are inside every show it runs. I definitely recommend it!!!', '2019-10-01', 4.5),
(4, '20190310577', 3, 'It has a wonderful Screen Color. Superb!!!!', '2019-10-06', 4),
(5, '20190310577', 4, 'Colorful screen. Wonderful experience! Definitely recommend it!!! 5 star rating for this.', '2019-10-06', 5),
(6, '20190310577', 1, 'Very beautiful!!', '2019-10-09', 5),
(7, '30201909635', 2, 'Amazing!!', '2019-10-08', 5),
(8, '30201909635', 1, 'Wonderful!!!!', '2019-10-08', 5),
(9, '20190310577', 25, 'Great TV!!', '2019-10-11', 4),
(10, '20190310577', 10, 'Super HD', '2019-10-11', 4),
(11, '20190310577', 19, 'Curved to perfection!!', '2019-10-11', 5),
(12, '20191010461', 12, 'Great product!!', '2019-10-11', 4),
(13, '20191010461', 11, 'Wonderful!!', '2019-10-11', 5),
(14, '20191010461', 13, 'This TV is way smarter than me, I guess!', '2019-10-11', 5),
(15, '20191010461', 14, 'Literally Full of High Definition pictures!!', '2019-10-11', 5),
(16, '20191010461', 19, 'I thought curved TV\'s are not that great. Well, not anymore. I definitely love it!', '2019-10-11', 5),
(17, '20191010461', 10, 'It feels like having your own movie theater at your home!! ITS AWESOME!!!', '2019-10-11', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(16) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `address` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_date` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `address`, `name`, `email`, `contact`, `date`, `status_date`, `status`) VALUES
('201910060002', '20190310577', 'Gil Puyat Avenue', 'Clint Pangilinan', 'esme@gmail.com', '09296322420', '2019-10-06 00:00:00', '2019-10-06', 1),
('201910060003', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-06 00:00:00', '2019-10-09', 1),
('201910070001', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-07 00:00:00', '2019-10-09', 1),
('201910070002', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-07 00:00:00', '2019-10-09', 1),
('201910070003', '30201909812', 'Bulacan', 'Hazel Joy G. Herrera', 'herrerahazel@gmail.com', '02346721', '2019-10-07 09:54:25', '2019-10-07', 1),
('201910070004', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-07 16:57:50', '2019-10-07', 1),
('201910070005', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-07 16:59:33', '2019-10-08', 1),
('201910080001', '30201909635', 'Taguig', 'Franz F. Mercado', 'domingoador1@gmail.com', '02347234234', '2019-10-08 18:58:11', '2019-10-08', 1),
('201910080002', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-08 19:01:05', '2019-10-08', 1),
('201910090001', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-09 15:53:48', '2019-10-09', 2),
('201910090002', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-09 16:05:44', '2019-10-09', 2),
('201910090003', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-09 19:03:34', '2019-10-09', 1),
('201910090004', '30201909635', 'Taguig', 'Franz F. Mercado', 'domingoador1@gmail.com', '02347234234', '2019-10-09 19:06:04', '2019-10-09', 1),
('201910100001', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-10 22:20:08', '2019-10-10', 1),
('201910100002', '30201909635', 'Taguig', 'Franz F. Mercado', 'domingoador1@gmail.com', '02347234234', '2019-10-10 22:21:23', '2019-10-10', 1),
('201910100003', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-10 22:22:27', '2019-10-10', 1),
('201910100004', '20191010461', 'Muntinlupa', 'Mark Colibao', 'mark@gmail.com', '0094762361', '2019-10-10 22:56:55', '2019-10-11', 1),
('201910110001', '20190310577', 'Gil Puyat Avenue', 'Esmeralda Jade T. Pangilinan', 'esme@gmail.com', '03847231223', '2019-10-11 09:04:50', '2019-10-11', 1),
('201910110002', '30201909624', 'Taguig', 'Patricia G. Santos', 'santos@gmail.com', '09324232', '2019-10-11 09:25:55', '2019-10-11', 1),
('201910110003', '30201909635', 'Taguig', 'Franz F. Mercado', 'domingoador1@gmail.com', '02347234234', '2019-10-11 12:22:31', '2019-10-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'unknown.png',
  `user_type` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `image`, `user_type`, `status`) VALUES
('1', 'marana.michaelj@gmail.com', 'lPWZEGBpHaPzemqv5y3yjP0nWIhj7MGwtcDhz4NTuRY=', 'unknown.png', 1, 1),
('20190310577', 'esme@gmail.com', 'AFkkWEaJeYf/qnDGRkmN66meYvxlEvNNWq44cbOcqwU=', 'b2e2722d71dfcc0fa5a2b345e9547fe2.jpg', 0, 1),
('20191010461', 'mark@gmail.com', 'AFkkWEaJeYf/qnDGRkmN66meYvxlEvNNWq44cbOcqwU=', 'unknown.png', 0, 1),
('30201909624', 'santos@gmail.com', 'AFkkWEaJeYf/qnDGRkmN66meYvxlEvNNWq44cbOcqwU=', '6015fde4e671cf46be5c97f7654e38ac.png', 0, 1),
('30201909635', 'domingoador1@gmail.com', 'MV4i65YlZKdvX5X05Qxwu+t86zB3TsHLtkwVyJ+fdXg=', 'unknown.png', 0, 1),
('30201909812', 'herrerahazel@gmail.com', 'OcqDZNN9rnrrcnXtXCG1f/PCfHlAsyAaSpbdd4ask48=', 'unknown.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mname` varchar(64) DEFAULT NULL,
  `lname` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `fname`, `mname`, `lname`, `address`, `contact`) VALUES
(1, '1', 'Michael', 'Duran', 'Marana', 'Sta. Mesa', '09559507192'),
(5, '30201909624', 'Patricia', 'Gueco', 'Santos', 'Taguig', '09324232'),
(6, '30201909812', 'Hazel Joy', 'Garcia', 'Herrera', 'Bulacan', '02346721'),
(7, '30201909635', 'Franz', 'Febrer', 'Mercado', 'Taguig', '02347234234'),
(11, '20190310577', 'Esmeralda Jade', 'Tiglao', 'Pangilinan', 'Gil Puyat Avenue', '03847231223'),
(12, '20191010461', 'Mark', NULL, 'Colibao', 'Muntinlupa', '0094762361');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_ibfk` (`product_id`),
  ADD KEY `transaction_ibfk` (`transaction_id`),
  ADD KEY `user_ibfk2` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_ibfk` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_ibfk4` (`user_id`),
  ADD KEY `product_ibfk3` (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_ibfk3` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `product_ibfk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_ibfk` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_ibfk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `product_ibfk3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `user_ibfk3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_ibfk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
