-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 04:07 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `actives`
--

CREATE TABLE `actives` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actives`
--

INSERT INTO `actives` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Transferred');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `class_teacher`) VALUES
(1, 'Class One', NULL),
(2, 'Class Two', NULL),
(3, 'Class Three', NULL),
(4, 'Class Four', NULL),
(5, 'Class Five', NULL),
(6, 'Class Six', NULL),
(7, 'Class Seven', NULL),
(8, 'Class Eight', NULL),
(9, 'Class Nine', NULL),
(10, 'Class Ten', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`) VALUES
(1, 'Class Five'),
(2, 'Class Eight'),
(3, 'SSC'),
(4, 'HSC'),
(5, 'Hon\'s'),
(6, 'Master\'s');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `local_guardians`
--

CREATE TABLE `local_guardians` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `birth_reg_no` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `mobile2` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `local_guardians`
--

INSERT INTO `local_guardians` (`id`, `name`, `nid`, `birth_reg_no`, `address`, `mobile`, `mobile2`, `email`, `relation`) VALUES
(1, 'Joy Da', '921783912739721', '', 'Chittagong', '01831586368', '01572697889', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`) VALUES
(1, 'Govt. Service Holder'),
(2, 'Private Job'),
(3, 'Businessman'),
(4, 'Free-Lancer'),
(5, 'Other'),
(6, 'Housewife');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`id`, `name`) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Brother'),
(4, 'Sister'),
(5, 'Uncle'),
(6, 'Aunt');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`) VALUES
(1, 'Morning'),
(2, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `birth_reg_no` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `f_mobile` varchar(50) DEFAULT NULL,
  `m_mobile` varchar(50) DEFAULT NULL,
  `f_profession` int(11) DEFAULT NULL,
  `m_profession` int(11) DEFAULT NULL,
  `f_est_income` varchar(50) DEFAULT NULL,
  `m_est_income` varchar(50) DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `last_school` varchar(255) DEFAULT NULL,
  `in_class` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `shift` int(11) DEFAULT NULL,
  `local_g_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `birth_date`, `birth_reg_no`, `f_name`, `m_name`, `f_mobile`, `m_mobile`, `f_profession`, `m_profession`, `f_est_income`, `m_est_income`, `permanent_address`, `present_address`, `last_school`, `in_class`, `section`, `shift`, `local_g_id`, `is_active`, `add_by`, `date`, `modified_by`) VALUES
(1, 'Prothom Acharjya', 1, '2002-02-02', '1920298830128', 'Xaved Ach', 'Faruk Ach', '111', '111', 1, 6, '1000', '1000', 'Borisal', 'Noakhali', 'Noakhali School', 8, 1, 2, 1, 1, 1, '2020-01-04 21:21:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'developer', 'developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actives`
--
ALTER TABLE `actives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_guardians`
--
ALTER TABLE `local_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actives`
--
ALTER TABLE `actives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `local_guardians`
--
ALTER TABLE `local_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
