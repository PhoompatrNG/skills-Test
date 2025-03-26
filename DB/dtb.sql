-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2025 at 01:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE `tbcustomer` (
  `CustomerID` char(36) NOT NULL,
  `ParentCustomerID` char(36) DEFAULT NULL,
  `IDCard` varchar(20) NOT NULL,
  `Prefix` varchar(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Address` text DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL CHECK (`Gender` in ('M','F')),
  `BirthDate` date DEFAULT NULL,
  `CustomerSize` enum('S','M','B') NOT NULL,
  `CustomerGrade` enum('A','B','C','D') NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateBy` varchar(50) NOT NULL,
  `UpdateDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `ParentCustomerID`, `IDCard`, `Prefix`, `FName`, `LName`, `Address`, `Gender`, `BirthDate`, `CustomerSize`, `CustomerGrade`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
('7b239637-b718-41fe-9de0-94526a316eb3', NULL, '0001', 'Mrs.', '0001', '001', '001', 'M', '2025-03-12', 'S', 'A', 'AD', '2025-03-26 18:45:06', 'AD', '2025-03-26 18:45:41'),
('ed629dbc-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678903', 'Mr.', 'James', 'Johnson', '789 Oak St', 'M', '1990-03-20', 'M', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629e04-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678904', 'Mr.', 'David', 'Williams', '321 Pine St', 'M', '1975-04-10', 'M', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629e36-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678905', 'Mr.', 'Robert', 'Brown', '654 Cedar St', 'M', '1992-05-05', 'M', 'B', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629e72-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678906', 'Mr.', 'Daniel', 'Davis', '987 Birch St', 'M', '1982-06-25', 'M', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629ea3-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678907', 'Mr.', 'Joseph', 'Miller', '123 Maple St', 'M', '1987-07-30', 'M', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629f03-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678908', 'Mr.', 'Charles', 'Garcia', '456 Spruce St', 'M', '1995-08-12', 'M', 'B', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629f3c-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678909', 'Mr.', 'Thomas', 'Martinez', '789 Redwood St', 'M', '1980-09-01', 'M', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed629f75-0a18-11f0-bcd8-00d8619d83b3', NULL, '12345678910', 'Mr.', 'Christopher', 'Hernandez', '321 Fir St', 'M', '1993-10-14', 'M', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed680950-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678901', 'Ms.', 'Mary', 'Johnson', '123 Oak St', 'F', '1985-01-01', 'S', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed68164e-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678902', 'Ms.', 'Patricia', 'Williams', '456 Pine St', 'F', '1990-02-15', 'S', 'B', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed68172d-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678903', 'Ms.', 'Jennifer', 'Brown', '789 Maple St', 'F', '1982-03-20', 'S', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed681780-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678904', 'Ms.', 'Linda', 'Jones', '321 Cedar St', 'F', '1995-04-10', 'S', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed6817ac-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678905', 'Ms.', 'Elizabeth', 'Davis', '654 Birch St', 'F', '1987-05-05', 'S', 'B', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed6817e0-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678906', 'Ms.', 'Barbara', 'Miller', '987 Spruce St', 'F', '1990-06-25', 'S', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed681811-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678907', 'Ms.', 'Susan', 'Garcia', '123 Redwood St', 'F', '1992-07-30', 'S', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed68184a-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678908', 'Ms.', 'Jessica', 'Martinez', '456 Fir St', 'F', '1980-08-12', 'S', 'B', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed681891-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678909', 'Ms.', 'Sarah', 'Hernandez', '789 Maple St', 'F', '1988-09-01', 'S', 'A', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('ed6818cd-0a18-11f0-bcd8-00d8619d83b3', NULL, '22345678910', 'Ms.', 'Karen', 'Lopez', '321 Oak St', 'F', '1993-10-14', 'S', 'C', 'Admin', '2025-03-26 15:04:22', 'Admin', '2025-03-26 15:04:22'),
('f00854fc-85e9-4a8a-9d85-e434ea73457f', NULL, '222222', 'Mr.', 'phoom', 'patr', '100/1', 'M', '2016-03-05', 'B', 'C', 'AD', '2025-03-26 18:32:28', 'AD', '2025-03-26 18:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `idcard` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthdate`, `idcard`, `address`, `phone`, `age`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'q', 'q', '2024-07-02', 'q', '1', 'q', 1, 'admin', '$2y$10$LWWMeZgSBTwinTnUpyotvO5frrGm.eB.AdmfAn.4dT.zAdscU5gPW', '2024-07-12 21:32:56', '2024-07-12 21:32:56'),
(4, 'phoompat', 'sawangkaew', '2024-07-11', '123', '321', '312', 12, 'admin0', '$2y$10$4nB80PZMU.eB.5TN1sdiJuYuYxNwAFTinfFh12.th44r7zLaDLEJO', '2024-07-12 21:37:59', '2024-07-12 21:37:59'),
(5, 'phoompat', 'sawangkaew', '2024-07-02', '1', '1', '1', 1, 'Bas0', '$2y$10$XaX6xuVYC4SZ1v1QB3f.Sut.CgEuDLiYFcgc6fCzBEwF1TnkkRlie', '2024-07-12 22:13:21', '2024-07-12 22:13:21'),
(6, 'Bas', '123', '2002-10-02', '123213', '32133', '21321', 21, 'Bas1', '$2y$10$.knWqfNRZ.j4QIccUkUY2O0LSG/RkmJmL/ITzevi4jTKwiFWfsBu2', '2024-07-13 01:46:57', '2024-07-13 01:46:57'),
(7, 'BAd', 'BAS', '2019-07-02', '312', '2133', '0611111', 5, 'BAs2', '$2y$10$tSRujtV3Yu2HZXQzseF2gOrQSJ6OQU/n3HH9r53GdWPqunh8SeKEm', '2024-07-13 01:54:29', '2024-07-13 01:54:29'),
(8, '12', '12', '2025-03-12', '21', '21', '21', 0, '12', '$2y$10$452yKaGdZkMD/HwTv/HG8O3hwhaN5b.tl62aUjsWQfaHNjOyA9Xt6', '2025-03-26 00:54:25', '2025-03-26 00:54:25'),
(10, 'ภูมิภัทร', 'สว่างแก้ว', '2002-10-02', '11111111111', '111222', '000444455', 22, 'ิbas', '$2y$10$IXgiovyYPk9z8gI3PdYMEO9/AlFNSJYNvqU8FiqUnhKxgH1AwWGdq', '2025-03-26 04:25:44', '2025-03-26 04:25:44'),
(11, '11', '11', '0011-11-11', '11', '11', '1', 2013, '22', '$2y$10$SFrDHLIdgCykG0V2dOr/3OMYKvjMcO4/ShkDVD2GWkPuFWOnNBu3a', '2025-03-26 04:26:23', '2025-03-26 04:26:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcustomer`
--
ALTER TABLE `tbcustomer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idcard` (`idcard`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
