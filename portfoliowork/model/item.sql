-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2020 at 09:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sqlg510572`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(36) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'Mac Allister 56cm Cordless Hedge trimmer', 'item1.jpg', 'This Mac Allister MHT36V-Li-E-BARE Cordless Hedge trimmer. Power output - 36V Battery - Battery and charger sold separately Features and benefits 36V Lithium-ion system Optimum tooth spacing Dual action blades Blade tip protector with hole', 63),
(2, 'Bosch AHS 480-16 450W 48cm Corded Hedge trimmer', 'item2.jpg', 'The Bosch AHS 50-16 hedge cutter is lightweight and comfortable to use, complete with soft grip handles. The hedge cutter also has diamond ground blades for a sharp and precise cut. Light weight at just 2.7 kg for minimum muscle strain whilst working. Well-balanced design for easy handling. Diamond ground blades for the perfect cut and finish.', 54),
(3, 'Erbauer EHT18-Li-Bare Cordless Hedge trimmer', 'item3.jpg', 'Great for trimming and shaping low level hedges without the restriction of a cord Features a 55cm dual action laser-cut and diamond ground blades ensures precise, clean cut Features keep cool technology that regulates the heat of the battery to prevent the cells from overheating and delivers up to 25% longer runtime and 100% longer lifetime', 98),
(4, 'Bosch ASB 10.8V 20cm Cordless Hedge trimmer', 'item4.jpg', 'This compact, handy and powerful shrub shear provides ultimate agility. It has “Anti-Blocking System” which ensures extra cutting power This lightweight (900 grams) product offers a long runtime of up to 100 minutes It has a high-quality lithium-ion battery with integrated charge level indicator, offering a charge time of 3.5 hours', 89),
(5, 'Bosch AHS 18V 55cm Cordless Hedge trimmer', 'item5.jpg', 'The Bosch AHS 55-20 LI cordless hedge cutter is powered by an 18 V lithium-ion battery, for cordless freedom. It also boasts the innovative Quick-Cut technology, for the perfect cut with one sweep of your hedge, whilst its \"Anti-Blocking system\" cuts through thick and stubborn branches with ease.', 148),
(6, 'McCulloch Ergolite 22cc 60cm Petrol Hedge trimmer', 'item6.jpg', 'Soft start reduces the resistance in the starter cord by up to 40% Large blade gap cuts thicker branches with ease Dual action blades for excellent cutting performance Ergonomic twistable handle adjusts to multiple positions Effective low noise engine design - without loss of power Blade featured with integrated safety guard Visible fuel tank for monitoring fuel level Auto return stop switch for hassle-free starting', 178);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);