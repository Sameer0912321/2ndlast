-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 03:23 PM
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
-- Database: `service_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `addinote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `name`, `position`, `date`, `time`, `location`, `addinote`) VALUES
(4, 'Sameer', 'Chef', '2024-12-24', '00:21:00', 'karchi', 'Bring Your Own Knife And Plates'),
(5, 'Sameer', 'Chef', '2024-12-24', '00:12:00', 'karchi', 'sdasda'),
(6, 'Sameer', 'Barber', '2023-12-25', '12:12:00', 'karchi', 'Bring Your own scissors'),
(7, 'Sameer', 'Barber', '2122-12-12', '12:31:00', 'karchi', 'asdasd'),
(8, 'Sameer', 'Barber', '2222-02-04', '00:12:00', 'karchi', 'sadsasdas'),
(9, 'Sameer', 'Barber', '2024-12-22', '00:12:00', 'karchi', 'sdsdc'),
(10, 'Sameer', 'Chef', '3333-03-31', '03:23:00', 'karchi', 'Bring Your Own Knife And Scissors'),
(11, 'Sameer  ', 'Barber', '2024-08-13', '00:12:00', 'sasdsdasdaa', 'asdasd'),
(12, 'Umer ', 'Chef', '1212-12-22', '00:12:00', 'karachi', 'Bring Your Own Knife');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'FEROZ IMTIAZ', 'feroz22may@gmail.com', 'Good start, but remember to handle file uploads using $_FILES to prevent errors.'),
(2, 'Sameer Feroz', 'ferozsameer07@gmail.com', 'Consider using prepared statements to protect against SQL injection vulnerabilities.'),
(3, 'Zain', 'zain@gmail.com', 'File upload handling needs to be corrected. $_POST should not be used for file data.'),
(4, 'FEROZ IMTIAZ', 'feroz22may@gmail.com', ';asdasidhhasofidfsodifjsdofisjdfsdfjaspdfoijeedpsdj'),
(5, 'Sameer Feroz', 'feroz22may@gmail.com', 'smthing meow'),
(6, 'Student', 's@gmail.com', 'sdasda'),
(7, 'abd', 'abd@gmail.com', 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `hiring`
--

CREATE TABLE `hiring` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `profile` varchar(255) NOT NULL,
  `coverletter` varchar(255) NOT NULL,
  `edu` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `reference` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hiring`
--

INSERT INTO `hiring` (`id`, `fullname`, `email`, `phone`, `address`, `position`, `price`, `resume`, `profile`, `coverletter`, `edu`, `experience`, `startdate`, `reference`) VALUES
(108, 'zaigham', 'z@gmail.com', 2147483647, 'islamabad', 'electrician', 20000, 'upload/Chapter 3  Connective Tissue Lecture 2 (7) (1) (1).pptx', 'upload/cleaner.jpg', 'My name is zaighma and i can do household electronic chores ', 'bachelor-degree', 24, '2024-08-31', 'Sameer Feroz , Abdullah Khan '),
(111, 'Sameer', 'ferozsameer07@gmail.com', 2147483647, 'Karachi', 'Photographer', 10000, 'upload/Chapter 3  Connective Tissue Lecture 2 (7) (1) (1).pptx', 'upload/cleaner.jpg', 'Sameer, I can be your photographer for the whole month', 'high-school', 1, '2024-08-29', 'Feroz Imtiaz');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `cpass` varchar(255) NOT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `pho` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `profilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `pass`, `cpass`, `nic`, `pho`, `dates`, `age`, `gender`, `role`, `profilePicture`) VALUES
(6, 'Sameer  Feroz', 'ferozsameer07@gmail.com', '$2y$10$R/GYA47mOvtoQBwDx0Ti9OzgACcxYdib2yDuh/DblraD2KwRtkWau', '$2y$10$G29N3LfpopdDmIVuCJ04f.LFbMSE81C3LPtfu3p7N1JqkRN8rn2Zm', '12345-1234567-2', 2147483647, '2024-08-12', 28, 'Male', 'Job Seeking', 'upload/Chef.jpg'),
(7, 'Abdullah ', 'a@gmail.com', '$2y$10$QPwUkVTpLRORD4KC9M.g5e.jOY4.TfiGVPVEKZDn/dnns6X5tz0tS', '$2y$10$ANwXJMCfTglEHkXey1G07u5fwX2g/t8FvtrHbhnTUYhz5gdjLd1Bi', '12345678888', 2147483647, '2024-08-20', 90, 'Male', 'Hiring', NULL),
(8, 'zaigham ', 'z@gmail.com', '$2y$10$NyEyDHx8t38K1V6ZBYQBqe/uV0eTW5aElZTrcIODvADCLc53PQrUi', '$2y$10$PqpDX3sETmxFJZXTDcVhdeoByzzKcKzpt3.QKPP88E/BSidubOoPi', '12345-1234567-2', 2147483647, '2024-08-11', 22, 'Male', 'Job Seeking', NULL),
(9, 'abdulla ', 'khan@gmail.com', '$2y$10$uCCGRhE.jRtWLCn8DpJeSuuipgfnMr0pmMlk7.cvsZjIjarJITmPS', '$2y$10$kmP2Nhm4zhZ5VlrpSHD7ruCnYbY9QGQcI29w/xmHqSmrQz38uGYjW', '34554454545454', 2147483647, '2024-12-30', 7, 'Male', 'Hiring', NULL),
(10, 'irtiza ', 'i@gmail.com', '$2y$10$O8MdCq41ptmkQdMwNGvsMOnJttXah1/0dcIcRO8HBwah2qIxCgFi2', '$2y$10$v5qOl9GLl1oAKqaF1PRJ8.xRMtqQmJfU9NSrGya5EdwrNYbweVNHi', '12345-1234567-2', 21323123, '2024-08-20', 2, 'Male', 'Hiring', NULL),
(11, 'Umer ', 'U@gmail.com', '$2y$10$TemDpOwUBLgbZagxOF9/DOfjXn3wCg3.16d4B5gk6L5ADzc3sHcEe', '$2y$10$gmwxDdtiXEeMNjpSWocjwe.9YoXt1wvMPvm4S1mdJMNxLYgkJ8B4q', '12345-1234567-2', 232323323, '2024-08-04', 22, 'Male', 'Hiring', NULL),
(12, 'Faizan  ', 'faizan@gmail.com', '$2y$10$ukJYnB8.ZqPikBJVgPtczO78ih5Yno2PIu88LzZwXuC6rU1/EsD.y', '$2y$10$ERxGIIs0rUk7IQxT1z2.N.khHFQGrlQnJ0fU17NuEgoxe2/CItqGi', '12345678888', 2147483647, '2024-08-07', 35, 'Male', 'Hiring', 'upload/Barber.jpg'),
(13, 'saad ', 'saad@gmail.com', '$2y$10$Q0WmqlMpKAG8a4KEAcqYA.Xw5UE2lN.fP35bU.Iabam/TO0c4cJvC', '$2y$10$xJac0f02Krg0aPjR/S81ve3ru8VwdidH6FR7FiXMBijXBEuDMiVDy', '12345678888', 2147483647, '2024-08-04', 28, 'Male', 'Job Seeking', 'driver.jpg'),
(14, 'ariz ', 'ariz@gmail.com', '$2y$10$fPvYMiQfsfmFDryZkuaZNu8ZSNEp1ovePOmeLAW3fOi20LrDKj3hG', '$2y$10$tb4n5IeSWQJ9OBVdaVapouBLVd5rdeT7mT5X5pOFqwiDLJX/DsAJ2', '12345678888', 2147483647, '2024-07-31', 25, 'Male', 'Hiring', 'WhatsApp Image 2024-08-18 at 12.01.58 PM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring`
--
ALTER TABLE `hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hiring`
--
ALTER TABLE `hiring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
