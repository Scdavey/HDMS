-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 01:44 AM
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
(1, 'Doe', 'John', 'john.doe@example.com', '555-1234', '2023-08-20', 'Regular checkup'),
(2, 'Smith', 'Jane', 'jane.smith@example.com', '555-5678', '2023-08-21', 'Fever'),
(3, 'Johnson', 'Robert', 'robert.johnson@example.com', '555-9876', '2023-08-22', 'Injury'),
(4, 'Williams', 'Emily', 'emily.williams@example.com', '555-4321', '2023-08-23', 'Pregnancy check'),
(5, 'Brown', 'Michael', 'michael.brown@example.com', '555-8765', '2023-08-24', 'Chest pain'),
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
(30, 'Hayes', 'Olivia', 'olivia.hayes@example.com', '555-9012', '2023-09-19', 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Lastname`, `Firstname`, `Email`, `Username`, `Password`) VALUES
(124, 'Doe', 'John', 'JohnDoe@gmail.com', 'JohnD123', '$2y$10$rG71KpGhJSaFs8CPeY0jDOG5nCesgcRDg7VaDmUricoI1FjAnM.su');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
