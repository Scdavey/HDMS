-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 02:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Pname` varchar(255) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Room` varchar(2) NOT NULL,
  `Reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Pname`, `Dname`, `Date`, `Room`, `Reason`) VALUES
('Ethan Perez', 'Greg Jones', '2023-10-15 09:00:00', '8B', 'Stubbed Toe'),
('Liam Foster', 'Shane Davey', '2023-11-05 08:30:00', '1A', 'Broken leg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phonenumber` varchar(255) NOT NULL,
  `Admitted` date NOT NULL,
  `Reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `Lastname`, `Firstname`, `Email`, `Phonenumber`, `Admitted`, `Reason`) VALUES
(6, 'Jones', 'Jessica', 'jessica.jones@example.com', '555-2345', '2023-08-25', 'Allergy'),
(7, 'Garcia', 'David', 'david.garcia@example.com', '555-7890', '2023-08-26', 'Flu symptoms'),
(8, 'Miller', 'Sophia', 'sophia.miller@example.com', '555-3456', '2023-08-27', 'Broken arm'),
(9, 'Davis', 'William', 'william.davis@example.com', '555-6789', '2023-08-28', 'Routine checkup'),
(10, 'Rodriguez', 'Olivia', 'olivia.rodriguez@example.com', '555-9012', '2023-08-29', 'Headache'),
(11, 'Martinez', 'Liam', 'liam.martinez@example.com', '555-3456', '2023-08-30', 'Fever'),
(12, 'Hernandez', 'Ava', 'ava.hernandez@example.com', '555-6789', '2023-08-31', 'Sore throat'),
(13, 'Lopez', 'Noah', 'noah.lopez@example.com', '555-9012', '2023-09-01', 'Injury'),
(14, 'Gonzalez', 'Isabella', 'isabella.gonzalez@example.com', '555-1234', '2023-09-02', 'Rash'),
(15, 'Wilson', 'James', 'james.wilson@example.com', '555-5678', '2023-09-03', 'Cough'),
(16, 'Anderson', 'Sophia', 'sophia.anderson@example.com', '555-9876', '2023-09-04', 'Stomachache'),
(17, 'Thomas', 'Alexander', 'alexander.thomas@example.com', '555-4321', '2023-09-05', 'Allergy'),
(18, 'Lee', 'Mia', 'mia.lee@example.com', '555-8765', '2023-09-06', 'Fever'),
(19, 'Perez', 'Ethan', 'ethan.perez@example.com', '555-2345', '2023-09-07', 'Injury'),
(20, 'Hall', 'Amelia', 'amelia.hall@example.com', '555-7890', '2023-09-08', 'Accident'),
(21, 'Adams', 'Elijah', 'elijah.adams@example.com', '555-1234', '2023-09-10', 'Fever'),
(22, 'Allen', 'Charlotte', 'charlotte.allen@example.com', '555-5678', '2023-09-11', 'Fracture'),
(23, 'Baker', 'Daniel', 'daniel.baker@example.com', '555-9876', '2023-09-12', 'Headache'),
(24, 'Brooks', 'Grace', 'grace.brooks@example.com', '555-4321', '2023-09-13', 'Cough'),
(25, 'Clark', 'Ethan', 'ethan.clark@example.com', '555-8765', '2023-09-14', 'Injury'),
(26, 'Cooper', 'Emma', 'emma.cooper@example.com', '555-2345', '2023-09-15', 'Allergic reaction'),
(27, 'Evans', 'Henry', 'henry.evans@example.com', '555-7890', '2023-09-16', 'Sore throat'),
(28, 'Foster', 'Liam', 'liam.foster@example.com', '555-3456', '2023-09-17', 'Flu symptoms'),
(29, 'Gray', 'Ava', 'ava.gray@example.com', '555-6789', '2023-09-18', 'Accident'),
(30, 'Hayes', 'Olivia', 'olivia.hayes@example.com', '555-9012', '2023-09-19', 'Fever'),
(33, 'Flowers', 'Gordan', 'Gordan.Flowers@gmai.com', '8075592603', '2023-09-06', 'Broken leg'),
(34, 'Carl', 'Adam', 'adam02@gmail.com', '8076228249', '2023-09-06', 'Migrain');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Roomnumber` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Roomnumber`) VALUES
('1A'),
('1B'),
('2A'),
('2B'),
('3A'),
('4A'),
('5A'),
('5B'),
('6A'),
('6B'),
('7A'),
('8A'),
('8B'),
('9A'),
('9B');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phonenumber` varchar(15) NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT 'New user',
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Lastname`, `Firstname`, `Email`, `Phonenumber`, `Role`, `Username`, `Password`) VALUES
(143, 'Paul', 'Sean', 'Sean.Paul@gmail.com', '807-592-9556', 'Administrator', 'SPaul123', '$2y$10$ZNTLZiKP4TriqlB3T0tySOkDZstv4FjdFB6fuECNkkTU67STt6ZFO'),
(147, 'Jones', 'Greg ', 'Greg.Jones@gmail.com', '807-662-2431', 'Doctor', 'GJones123', '$2y$10$IEcupdd45sg1Nrmj03gLDuJJMEmrrMyTDMtSuJfg6m8LiO8Gm6O86'),
(148, 'Smith', 'Jessica', 'Jessica.Smith@gmail.com', '807-212-2435', 'Doctor', 'JSmith123', '$2y$10$tgEtvFAHlUELrTR2WUpHA.2LoyT4k4QT17OICuTDoi8WPqW.NDPH6'),
(150, 'Perez', 'Lisa', 'Lisa.Perez@gmail.com', '807-894-2564', 'Nurse', 'LPerez123', '$2y$10$Il2AgVxqulvUsYUArAAdvueSZE7M2rnBad4n9inzzzyvjuE4Eigoe'),
(151, 'Rogers', 'Carl', 'Carl.Rogers@gmail.com', '807-554-2331', 'Nurse', 'CRogers123', '$2y$10$kNvQ3dA45SLwNFurHbsH5ulSE/VH/EEZPLkYE.QC2ce7ppDEMGYT2'),
(152, 'Alverez', 'Dave', 'Dave.Alverez@gmail.com', '807-555-3241', 'New user', 'DAlverez123', '$2y$10$PgPxXYVlT2ewF1VDGCdWlefGZD/PqcMMLI0nK7GHyH.SfCL/ok/UK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `Roomnumber` (`Roomnumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
