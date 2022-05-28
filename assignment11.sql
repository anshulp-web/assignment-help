-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 03:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `row_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`row_id`, `user_name`, `password`, `time`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', '2022-03-23 05:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `a_section_one`
--

CREATE TABLE `a_section_one` (
  `row_id` int(11) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `status` char(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_section_one`
--

INSERT INTO `a_section_one` (`row_id`, `heading`, `content`, `img_url`, `status`, `time`) VALUES
(3, 'what is Assignmenthelp11? by developer', 'We, The Assignmenthelp11, provide writing services related to preparing model articles and journal papers for our clients..\r\n\r\nIn easy words Assignmenthelp11 can manage your Assignments Essays, Power Point Presentation, Poster Making, Proposal / Dissertation, Business Report, CV Designing, and SOP with as easy as piece of cake.\r\n\r\nWe, at The Writing Tree, are team of academic writers with 12 years’ experience, providing one stop solution to international students (UK, Singapore, India., etc.) in their academic assignments and dissertations.. by anshul\r\n', '4529164.jpg', 'Active', '2022-03-24 11:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_trans`
--

CREATE TABLE `enquiry_trans` (
  `row_id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `mo_number` varchar(12) NOT NULL,
  `wh_number` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `cl_nm` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_trans`
--

INSERT INTO `enquiry_trans` (`row_id`, `name`, `mo_number`, `wh_number`, `email`, `cl_nm`, `country`, `course`, `message`, `img_url`, `time`) VALUES
(13, 'Anshul Pandya', '8269481761', '8269481761', 'anshul.evolve@gmail.com', 'Gujarati Science College', 'india', 'BCA', 'This is final image testing.', 'dummy2.pdf', '2022-03-25 11:09:51'),
(14, 'Developer', '8269481761', '8269481761', 'anshul.evolve@gmail.com', 'Gujarati Science College', 'india', 'BCA', 'This is mail testing by developer', 'dummy3.pdf', '2022-03-26 04:42:27'),
(15, 'Rohit Lodhi', '7898745632', '7898745632', 'anshul.evolve@gmail.com', 'Gujarati Science College', 'india', 'BCA', 'This is email testing', 'slider13.jpg', '2022-03-31 11:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `h_section_one`
--

CREATE TABLE `h_section_one` (
  `row_id` int(11) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `status` char(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_section_one`
--

INSERT INTO `h_section_one` (`row_id`, `heading`, `content`, `img_url`, `status`, `time`) VALUES
(6, 'Get Assignment & Dissertation help12', 'We,At The Writing Tree, are team of academic writers with 12 years’ experience, providing one stop solution to international students (UK, Singapore, India., etc.) in their academic assignments and dissertations. Test by anshul', 'slider3.jpg', 'Active', '2022-03-24 06:36:12'),
(13, 'Get Assignment & Dissertation help12', 'We,At The Writing Tree, are team of academic writers with 12 years’ experience, providing one stop solution to international students (UK, Singapore, India., etc.) in their academic assignments and dissertations. Test by anshul', 'slider11.jpg', 'Deactive', '2022-03-25 12:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `h_section_two`
--

CREATE TABLE `h_section_two` (
  `row_id` int(11) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `status` char(9) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_section_two`
--

INSERT INTO `h_section_two` (`row_id`, `heading`, `content`, `img_url`, `status`, `time`) VALUES
(3, 'Services Offered', 'Assignments,\r\nEssays,\r\nPower Point Presentation,\r\nPoster Making,\r\nProposal Dissertation,\r\nBusiness Report,\r\nCV Designing,\r\nSOP,\r\ntest', 'slider1.jpg', 'Active', '2022-03-24 09:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_opt_trans`
--

CREATE TABLE `job_opt_trans` (
  `row_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `cv_img` varchar(50) NOT NULL,
  `smp_img` varchar(50) NOT NULL,
  `wh_number` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_opt_trans`
--

INSERT INTO `job_opt_trans` (`row_id`, `name`, `email`, `qualification`, `specialization`, `cv_img`, `smp_img`, `wh_number`, `city`) VALUES
(14, 'Anshul Pandit', 'anshul.evolve@gmail.com', 'BCA', 'PHP', 'dummy1.pdf', 'about-converted-compressed_(1).pdf', '8269481761', 'Dewas'),
(15, 'Anshul Pandya', 'anshul.evolve@gmail.com', 'BCA', 'PHP', 'dummy2.pdf', '4529164.jpg', '8269481761', 'Dewas'),
(16, 'Anshul Pandya', 'anshul.evolve@gmail.com', 'BCA', 'PHP', 'dummy3.pdf', '45291641.jpg', '8269481761', 'Dewas'),
(17, 'Rahul choudhary', 'anshul.evolve@gmail.com', 'BCA', 'PHP', 'slider2.jpg', 'slider3.jpg', '7898745632', 'Dewas');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `row_id` int(11) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`row_id`, `img_url`, `time`) VALUES
(21, 'slider21.jpg', '2022-03-23 11:55:07'),
(40, 'slider3.jpg', '2022-03-24 04:37:44'),
(42, 'slider11.jpg', '2022-03-25 09:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `a_section_one`
--
ALTER TABLE `a_section_one`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `enquiry_trans`
--
ALTER TABLE `enquiry_trans`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `h_section_one`
--
ALTER TABLE `h_section_one`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `h_section_two`
--
ALTER TABLE `h_section_two`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `job_opt_trans`
--
ALTER TABLE `job_opt_trans`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_section_one`
--
ALTER TABLE `a_section_one`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiry_trans`
--
ALTER TABLE `enquiry_trans`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `h_section_one`
--
ALTER TABLE `h_section_one`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `h_section_two`
--
ALTER TABLE `h_section_two`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_opt_trans`
--
ALTER TABLE `job_opt_trans`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
