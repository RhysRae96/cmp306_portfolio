-- phpMyAdmin SQL Dump
-- version 5.2.1-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2023 at 10:38 AM
-- Server version: 10.5.22-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql2303314`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'TREK\r\nMarlin 5 Mountain Bike', 'bike_1.jpg', 'Marlin 5 is a trail-worthy daily rider that\'s perfectly suited for everyday adventures, on and off the trail. A suspension fork, 2x8 drivetrain, and mounts for a rack and kickstand make it an ideal choice for new trail riders or anyone looking for a comfortable, stable commuter with the ruggedness of a real mountain bike.', 499),
(2, 'Mountain Bikem Aluminium Frame 21 Speeds SHIMANO', 'bike_2.jpg', '21-speed gears with shimano EF500 Brake/Shift handlebar-mounted control levers, Front Derailleur Shimano FD-TY300 Tourney, Rear Derailleur Shimano FD-TY21-B, Tourney. Freewheel Shimano MF-TZ500-7. KMC chain. Prowheel crank set, chainwheel, and chainguard.', 229),
(3, 'Dave SRAM GX Mountain Bike', 'bike_3.webp', '21-speed gears with shimano EF500 Brake/Shift handlebar-mounted control levers, Front Derailleur Shimano FD-TY300 Tourney, Rear Derailleur Shimano FD-TY21-B, Tourney. Freewheel Shimano MF-TZ500-7. KMC chain. Prowheel crank set, chainwheel, and chainguard.', 2099),
(4, 'TREK PROCALIBER 9.6 2022 MOUNTAIN BIKE', 'bike_4.avif', 'The 2022 Trek Procaliber 9.6 is a race-ready cross country hardtail. Its fast carbon frame boasts a trail-taming IsoSpeed decoupler, fast 29er wheels and a RockShox Recon Gold RL suspension fork to keep you fast and smooth over roots and rocks during your most demanding mountain bike rides.', 1695),
(5, 'Norco\r\nFluid FS 2', 'bike_5.webp', 'The Fluid FS is the ultimate, no-compromise singletrack rig.\r\nIt\'s as at home hitting the perfect trail and rolling a mossy slab as it is navigating a technical, rooty section of trail. With its confidence-inspiring progressive design, playful handling, and unmatched fun factor, the Fluid FS will take your trail riding experience to the next level.', 2160),
(6, 'Cross FXT30 26 inch Wheel Size Mens Mountain Bike', 'bike_6.jfif', 'With front suspension forks you can take the pressure of your regular cycle route - literally - with the Cross FXT300. The suspension softens the bumps in the road and lets you get on with your journey in comfort. The lightweight alloy brakes and frame make it easy for you to zip through the city or along a country road and with 21 speed Shimano gears you can choose the power you put into it.', 176);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
