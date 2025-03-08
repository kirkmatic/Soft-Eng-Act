-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs3a`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_background_table`
--

CREATE TABLE `students_background_table` (
  `id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `year_graduated` int(4) NOT NULL,
  `batch_name` varchar(225) NOT NULL,
  `department` varchar(20) NOT NULL,
  `program` varchar(225) NOT NULL,
  `section` varchar(225) NOT NULL,
  `work_status` enum('Employed','Unemployed','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_background_table`
--

INSERT INTO `students_background_table` (`id`, `alumni_id`, `year_graduated`, `batch_name`, `department`, `program`, `section`, `work_status`) VALUES
(1, 22145442, 2026, 'Batch-A', 'CITCS', 'BSCS', 'BSCS-4A', 'Employed'),
(2, 22143212, 2026, 'Batch-A', 'CITCS', 'BSCS', 'BSCS-4A', 'Employed'),
(3, 22142854, 2026, 'Batch-A', 'CITCS', 'BSCS', 'BSCS-4A', 'Employed'),
(4, 22142740, 2026, 'Batch-A', 'CITCS', 'BSCS', 'BSCS-4A', 'Employed'),
(5, 22132152, 2023, 'Batch-B', 'CITCS', 'ACT', 'ACT-2A', 'Unemployed'),
(6, 22132331, 2023, 'Batch-B', 'CITCS', 'BSIT', 'BSIT-4A', 'Employed'),
(7, 22123441, 2022, 'Batch-B', 'CITCS', 'BSIT', 'BSIT-4D', 'Employed'),
(8, 1942740, 2023, 'Batch-C', 'CITCS', 'BSIT', 'BSIT-4Y', 'Employed'),
(9, 18143354, 2021, 'Batch-C', 'CITCS', 'ACT', 'ACT-2D', 'Employed'),
(10, 21149940, 2025, 'Batch-C', 'CITCS', 'BSIT', 'BSIT-4F', 'Employed'),
(11, 18652854, 2021, 'Batch-D', 'CITCS', 'BSCS', 'BSCS-4C', 'Employed');

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE `students_table` (
  `id` int(11) NOT NULL,
  `alumni_id` int(8) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `middlename` varchar(225) NOT NULL,
  `gender` enum('Male','Female','Others','') NOT NULL,
  `address` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`id`, `alumni_id`, `lastname`, `firstname`, `middlename`, `gender`, `address`, `email`, `contact`) VALUES
(1, 22145442, 'Daragay', 'Cristian', 'Vergara', 'Male', 'Poblacion,Muntinlupa City', 'daragay@gmail.com', 2147483647),
(2, 22143212, 'Galla', 'Carl Rhonbie', 'Poldo', 'Male', 'Bayanan,Muntinlupa City', 'galla@gmail.com', 2147483647),
(3, 22142854, 'Tabucol', 'Christian Joshua Miguel', 'Bautista', 'Male', 'Project III, Quezon City', 'tabucol@gmail.com', 2147483647),
(4, 22142740, 'Matic', 'Kirk J-Son', 'Rosaura', 'Male', 'Cupang,Muntinlupa City', 'matic@gmail.com', 2147483647),
(5, 22132152, 'Akagi', 'Takenori', 'Sendo', 'Male', 'Cupang,Muntinlupa City', 'akagi@gmail.com', 2147483647),
(6, 22132331, 'Rukawa', 'Kaede', 'Moto', 'Male', 'Bayanan,Muntinlupa City', 'kaede@gmail.com', 2147483647),
(7, 22123441, 'Hisashi', 'Mitsui', 'Gar', 'Male', 'Poblacion,Muntinlupa City', 'hisashi@gmail.com', 2147483647),
(8, 1942740, 'Miyagi', 'Ryota', 'Alams', 'Male', 'Bayanan,Muntinlupa City', 'miyagi@gmail.com', 2147483647),
(9, 18143354, 'Akagi', 'Haruko', 'Yea', 'Female', 'Cupang,Muntinlupa City', 'haruko@gmail.com', 2147483647),
(10, 21149940, 'Ayako', 'Edith', 'Santa', 'Female', 'Project III, Quezon City', 'ayako@gmail.com', 2147483647),
(11, 18652854, 'Maki', 'Shinichi', 'Kudo', 'Male', 'Tunasan, Muntinlupa City', 'maki@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(225) NOT NULL,
  `access` enum('CITCS','CCJ','CTE','Registrar') NOT NULL,
  `uname` enum('Registrar','Dean','ACT','IT','CS') NOT NULL,
  `ucode` enum('000','001','002','003','004') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `user_id`, `password`, `access`, `uname`, `ucode`) VALUES
(4, 1, '$2y$10$1.Kd3HGUPIQ8a9ciSwPFYOXMR9Krdab.voGwQacoBcgSZ/Z87tQhS', 'Registrar', 'Registrar', '000'),
(5, 12, '$2y$10$QHPX9.a0AeWBRn4Gp9i5h..TJqNBLVXQuPb.iFfnrUxZ25pZpbqsq', 'CITCS', 'Dean', '001'),
(7, 13, '$2y$10$dySmNKFwlPj5qM0ZUPgm5.u2Q9t1v6WelFQSbwQARODunHF1RgIeO', 'CITCS', 'ACT', '002'),
(8, 14, '$2y$10$ucikVe.GJBmJgvTw3vTYE.PWH1Nid9TTRiMIbsc3izroHDmUSLZ2W', 'CITCS', 'CS', '004'),
(9, 15, '$2y$10$QadrjseGbdNhrAYphW595u.mcj73jMRuMWuzYaUMhaKuZcVb10Fz6', 'CITCS', 'IT', '003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_background_table`
--
ALTER TABLE `students_background_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_background_table`
--
ALTER TABLE `students_background_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students_table`
--
ALTER TABLE `students_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
