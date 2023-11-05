-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 09:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp306`
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
  `price` float NOT NULL,
  `stock` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `image`, `description`, `price`, `stock`) VALUES
(2, 'Mountain Bikem Aluminium Frame 21 Speeds SHIMANO', 'bike_2.jpg', '21-speed gears with shimano EF500 Brake/Shift handlebar-mounted control levers, Front Derailleur Shimano FD-TY300 Tourney, Rear Derailleur Shimano FD-TY21-B, Tourney. Freewheel Shimano MF-TZ500-7. KMC chain. Prowheel crank set, chainwheel, and chainguard.', 229, 5),
(3, 'Dave SRAM GX Mountain Bike', 'bike_3.webp', '21-speed gears with shimano EF500 Brake/Shift handlebar-mounted control levers, Front Derailleur Shimano FD-TY300 Tourney, Rear Derailleur Shimano FD-TY21-B, Tourney. Freewheel Shimano MF-TZ500-7. KMC chain. Prowheel crank set, chainwheel, and chainguard.', 2099, 5),
(4, 'TREK PROCALIBER 9.6 2022 MOUNTAIN BIKE', 'bike_4.avif', 'The 2022 Trek Procaliber 9.6 is a race-ready cross country hardtail. Its fast carbon frame boasts a trail-taming IsoSpeed decoupler, fast 29er wheels and a RockShox Recon Gold RL suspension fork to keep you fast and smooth over roots and rocks during your most demanding mountain bike rides.', 1695, 5),
(5, 'Norco\r\nFluid FS 2', 'bike_5.webp', 'The Fluid FS is the ultimate, no-compromise singletrack rig.\r\nIt\'s as at home hitting the perfect trail and rolling a mossy slab as it is navigating a technical, rooty section of trail. With its confidence-inspiring progressive design, playful handling, and unmatched fun factor, the Fluid FS will take your trail riding experience to the next level.', 2160, 5),
(6, 'Cross FXT30 26 inch Wheel Size Mens Mountain Bike', 'bike_6.jfif', 'With front suspension forks you can take the pressure of your regular cycle route - literally - with the Cross FXT300. The suspension softens the bumps in the road and lets you get on with your journey in comfort. The lightweight alloy brakes and frame make it easy for you to zip through the city or along a country road and with 21 speed Shimano gears you can choose the power you put into it.', 176, 5),
(8, 'TREK\r\nMarlin 5 Mountain Bike', 'bike_1.jpg', 'Marlin 5 is a trail-worthy daily rider that\'s perfectly suited for everyday adventures, on and off the trail. A suspension fork, 2x8 drivetrain, and mounts for a rack and kickstand make it an ideal choice for new trail riders or anyone looking for a comfortable, stable commuter with the ruggedness of a real mountain bike.', 499, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `surname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mphone` int(20) NOT NULL,
  `password_hash` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `userStatus` smallint(6) NOT NULL DEFAULT 5 COMMENT 'User status level 1=admin, 3=mod, 5=normal	',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `banned` tinyint(1) NOT NULL COMMENT '1 = Banned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `mphone`, `password_hash`, `userStatus`, `reg_date`, `banned`) VALUES
(31, '5656', '6676', 'rhys55675', 771919, '$2y$10$CZtXX.eiSIUHaNuvvYUZKO4r3VffGnhiSJc7ZWOPjMcUYWZuGjQsW', 5, '2023-10-19 09:42:45', 0),
(32, 'register', 'register', 'register', 88182, '$2y$10$a35kSLVcyt9xFoSfj2bGaOwMgvDTUSZ/4mP0nhoowo5yTW8nzaxne', 5, '2023-10-19 09:54:13', 0),
(33, 'Rhys', 'Rae', 'rhysrae@gmail.com', 2147483647, '$2y$10$614xYUYiwTv4pD6l3DkL6O6xyc6c7dN8Lbl1dnkjgBr7hNZFTlen6', 1, '2023-10-19 10:21:34', 0),
(34, 'Lois', 'Mason', 'lm@gmail.com', 2147483647, '$2y$10$SNeQMd63kRnCgmVNjREgvOIZUAmyDExAFovPruJUERzUbeGmGe5A2', 5, '2023-10-19 13:11:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(3, 'Moderator'),
(5, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
