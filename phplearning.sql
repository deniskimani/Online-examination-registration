-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 05:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phplearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `password`) VALUES
(1, 'Maths and physics', '123456789'),
(2, 'Communication', '123456'),
(3, 'Maths and physics', '123456'),
(4, 'Tourism', '123456'),
(5, 'Maths and physics', '123456'),
(6, 'Social sciences', '123456'),
(7, 'Humanities', '123456'),
(8, 'Food technology', '123456'),
(9, 'Engineering', '1234567'),
(10, 'Environmental Science', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `s_id` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `type` enum('SPECIAL','SUPP') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`s_id`, `regno`, `name`, `department`, `unit`, `year`, `type`) VALUES
(1, 'BMCS/031J/2015', 'Denis Kimani', 'Maths and physics', 'Real analysis', 4, 'SPECIAL'),
(2, 'BMCS/031J/2015', 'Denis Kimani', 'Maths and physics', 'Physics 1', 3, 'SUPP'),
(3, 'BMCS/031J/2015', 'Denis Kimani', 'Social sciences', 'Communication skills', 1, 'SPECIAL'),
(4, 'BMCS/003J/2015', 'Aisha Ahmed', 'Maths and physics', 'Physics 1', 4, 'SPECIAL'),
(5, 'BMCS/002J/2015', 'Saida Doman', 'Communication', 'Communication skills', 4, 'SUPP'),
(6, 'BMCS/001J/2015', 'Omari Mtumba', 'Tourism', 'pde', 4, 'SPECIAL'),
(7, 'BMCS/005J/2015', 'Tommy Shang', 'accounts and finance', 'accounts', 1, 'SUPP'),
(8, 'BMCS/006J/2017', 'Johnny Lee', 'Tourism', 'hospitality', 3, 'SUPP'),
(9, 'BMCS/007J/2011', 'Idid Ahmed', 'engineering', 'mechanics', 5, 'SPECIAL'),
(10, 'BMCS/019J/2016', 'Mary Nderi', 'information technology', 'web design', 2, 'SUPP'),
(11, 'BTIT/008J/2012', 'Johnny Depp', 'maritime', 'marine technology', 4, 'SPECIAL'),
(12, 'BMCS/031J/2015', 'Denis Kimani', 'Communication', 'Communication skills', 5, 'SUPP'),
(13, 'BMCS/030J/2015', 'Tommy Shang', 'Maths and physics', 'accounts', 4, 'SUPP'),
(16, 'BMCS/003J/2015', 'Aisha Ahmed', 'Maths and physics', 'AMA 4423 Partial Differential Equations II', 4, 'SPECIAL');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `student` varchar(255) NOT NULL,
  `pending_fee` int(11) NOT NULL,
  `extra_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `student`, `pending_fee`, `extra_fee`) VALUES
(1, 'BMCS/031J/2015', 0, 23000),
(2, 'BMCS/003J/2015', 0, 42000),
(3, 'BMCS/002J/2015', 0, 25000),
(4, 'BMCS/001J/2015', 0, 5000),
(5, 'BMCS/005J/2015', 1100, 0),
(6, 'BMCS/006J/2017', 6000, 0),
(7, 'BMCS/007J/2015', 0, 25000),
(8, 'BMCS/019J/2016', 6000, 0),
(9, 'BTIT/008J/2012', 0, 27500),
(10, 'BMCS/030J/2105', 0, 17500),
(11, 'BJMC/190J/2016', 0, 19525);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unitname` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unitname`, `year`, `department`) VALUES
(1, 'BMC 4315 Research methods', 3, 'Communication'),
(2, 'AMA 4412 Numerical Analysis 2', 4, 'Maths and physics'),
(3, 'AMA 4437 Continuum Mechanics', 4, 'Maths and physics'),
(4, 'AMA 4423 Partial Differential Equations II', 4, 'Maths and physics'),
(5, 'EIT 2456 WEB development', 4, 'Maths and physics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` enum('Admin','Finance','Department','Student') DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `type`) VALUES
(7, 'BMCS/003J/2015', 'BMCS/003J/2015', '2019-03-30 05:28:09', 'Student'),
(8, 'BMCS/032J/2015', 'BMCS/032J/2015', '2019-03-30 05:34:32', 'Student'),
(9, 'BMCS/001J/2015', 'BMCS/001J/2015', '2019-03-30 05:36:27', 'Student'),
(10, 'BJMC/190J/2016', 'BJMC/190J/2016', '2019-03-30 06:00:55', 'Student'),
(11, 'BMCS/031J/2015', 'DENIS', '2019-04-27 05:06:21', 'Student'),
(13, 'admin', 'admin', '2019-03-30 22:53:19', 'Admin'),
(19, 'department', 'department', '2019-03-31 10:25:02', 'Department'),
(20, 'finance', 'finance', '2019-03-31 10:25:02', 'Finance'),
(22, 'BMCS/038J/2015', 'BMCS/038J/2015', '2019-03-31 13:18:47', 'Student'),
(23, 'BMCS/048J/2015', 'BMCS/048J/2015', '2019-03-31 13:20:59', 'Student'),
(24, 'BMCS/025J/2015', 'BMCS/025J/2015', '2019-04-02 07:27:21', 'Student'),
(25, 'BMCS/06J/2015', 'BMCS/06J/2015', '2019-04-03 12:10:44', 'Student'),
(26, 'BMCS/07J/2015', 'BMCS/07J/2015', '2019-04-03 12:12:20', 'Student'),
(27, 'BMCS/08J/2015', 'BMCS/08J/2015', '2019-04-03 12:21:37', 'Student'),
(28, 'BMCS/09J/2015', 'BMCS/09J/2015', '2019-04-03 12:22:49', 'Student'),
(29, 'BMCS/10J/2015', 'BMCS/10J/2015', '2019-04-03 12:23:41', 'Student'),
(30, 'BMCS/11J/2015', 'BMCS/11J/2015', '2019-04-03 12:25:08', 'Student'),
(31, 'BMCS/021J/2015', 'BMCS/021J/2015', '2019-04-03 15:33:25', 'Student'),
(32, 'Maths And physics', '2134567', '2019-04-03 15:41:27', 'Department'),
(33, 'Mr Kimonge', 'klfhukflew', '2019-04-03 15:54:15', 'Admin'),
(34, 'Mr Kilimo', 'erfghoifeoreop', '2019-04-03 15:55:36', 'Finance'),
(35, 'khakhuli', '2212', '2019-04-03 15:56:41', 'Admin'),
(36, 'Aziz Abdi', 'rfyuuiiuyfyujhkk', '2019-04-03 16:00:51', 'Finance'),
(37, 'Allan Waiguru', 'allandeaatpioe', '2019-04-03 16:14:57', 'Department'),
(38, 'Alfred Cherpatilol', 'Ijddiajla', '2019-04-03 16:15:33', 'Finance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
