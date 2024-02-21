-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2022 at 06:48 AM
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
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_final_approve_reject`
--

CREATE TABLE `department_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_record`
--

CREATE TABLE `department_record` (
  `property_id` varchar(200) NOT NULL,
  `property_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_rejected_requests`
--

CREATE TABLE `department_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dormitory_final_approve_reject`
--

CREATE TABLE `dormitory_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dormitory_rejected_requests`
--

CREATE TABLE `dormitory_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dorm_record`
--

CREATE TABLE `dorm_record` (
  `property_id` varchar(100) NOT NULL,
  `property_name` varchar(200) NOT NULL,
  `date_given` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_final_approve_reject`
--

CREATE TABLE `lab_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_record`
--

CREATE TABLE `lab_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_rejected_requests`
--

CREATE TABLE `lab_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_request`
--

CREATE TABLE `lab_request` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_request`
--

INSERT INTO `lab_request` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 0x75706c6f6164732f494d475f31393730303131325f3039333331362e6a7067, '2022-10-31'),
('Ramit/115/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31'),
('Ramit/135/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `library_final_approve_reject`
--

CREATE TABLE `library_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_record`
--

CREATE TABLE `library_record` (
  `book_id` varchar(254) NOT NULL,
  `book_title` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `library_rejected_requests`
--

CREATE TABLE `library_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
('AST/32', '81dc9bdb52d04dc20036dbd8313ed055', 'Lab assistant'),
('DEP/12dt', '81dc9bdb52d04dc20036dbd8313ed055', 'Department head'),
('DEPT/123', '81dc9bdb52d04dc20036dbd8313ed055', 'Department head'),
('DEPT/324', '81dc9bdb52d04dc20036dbd8313ed055', 'Department head'),
('LB/112', '81dc9bdb52d04dc20036dbd8313ed055', 'Librarian'),
('Ramit/111/11', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('Ramit/115/11', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('Ramit/135/11', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('Ramit/1630/11', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('Ramit/2035/11', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
('Ramit/408/11', 'a58337d1b8c98bf3225186673be3407b', 'student'),
('Ramit/532/11', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('Ramit/776/11', '81dc9bdb52d04dc20036dbd8313ed055', 'student'),
('SPT/123', 'e10adc3949ba59abbe56e057f20f883e', 'Sport head'),
('STF43/12', 'e10adc3949ba59abbe56e057f20f883e', 'Dormitory');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_final_approve`
--

CREATE TABLE `registrar_final_approve` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrar_final_rejected`
--

CREATE TABLE `registrar_final_rejected` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `image` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 'uploads/IMG_19700112_093316.jpg', '2022-10-31'),
('Ramit/115/11', 'Graduation', 'uploads/', '2022-10-31'),
('Ramit/135/11', 'Graduation', 'uploads/', '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `request_department`
--

CREATE TABLE `request_department` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_department`
--

INSERT INTO `request_department` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 0x75706c6f6164732f494d475f31393730303131325f3039333331362e6a7067, '2022-10-31'),
('Ramit/115/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31'),
('Ramit/135/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `request_dormitory`
--

CREATE TABLE `request_dormitory` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_dormitory`
--

INSERT INTO `request_dormitory` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 0x75706c6f6164732f494d475f31393730303131325f3039333331362e6a7067, '2022-10-31'),
('Ramit/115/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31'),
('Ramit/135/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `request_library`
--

CREATE TABLE `request_library` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_library`
--

INSERT INTO `request_library` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 0x75706c6f6164732f494d475f31393730303131325f3039333331362e6a7067, '2022-10-31'),
('Ramit/115/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31'),
('Ramit/135/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `request_sport`
--

CREATE TABLE `request_sport` (
  `id` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_sport`
--

INSERT INTO `request_sport` (`id`, `reason`, `image`, `date`) VALUES
('Ramit/111/11', 'Health problem', 0x75706c6f6164732f494d475f31393730303131325f3039333331362e6a7067, '2022-10-31'),
('Ramit/115/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31'),
('Ramit/135/11', 'Graduation', 0x75706c6f6164732f, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `sport_final_approve_reject`
--

CREATE TABLE `sport_final_approve_reject` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `signature` blob NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sport_record`
--

CREATE TABLE `sport_record` (
  `material_id` varchar(50) NOT NULL,
  `material_name` varchar(200) NOT NULL,
  `date_taken` date NOT NULL,
  `taken_by` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `given_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sport_rejected_requests`
--

CREATE TABLE `sport_rejected_requests` (
  `student_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `staff_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `fullName` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `qualification` varchar(500) NOT NULL,
  `position` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass_word` varchar(200) NOT NULL,
  `im_age` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fullName`, `age`, `sex`, `qualification`, `position`, `username`, `pass_word`, `im_age`) VALUES
('Markos Balcha', 34, 'male', 'BSC in Buildings control', 'Dormitory', 'STF43/12', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/contact2.jpg'),
('Asnake Kurabachewu', 32, 'male', 'BSC in sport science', 'Sport head', 'SPT/123', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/IMG_20211216_104125_9.jpg'),
('Abel Ashenaffi', 30, 'male', 'phD in software engineering', 'Department head', 'DEPT/123', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/-5924985051181856910_121.jpg'),
('Abriham Kebede', 34, 'male', 'BSC Library management', 'Librarian', 'LB/112', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/IMG_20210715_180657~2.jpg'),
('Amarech mikael', 24, 'female', 'Bachelor degree in computer science', 'Lab assistant', 'AST/32', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/-5897946797534460244_121.jpg'),
('Shiferawu Melese', 38, 'male', 'MSC in Computer science', 'Department head', 'DEP/12dt', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/-5837158665105291345_121.jpg'),
('Jira Gemechis', 34, 'male', 'MSC in Computer science', 'Department head', 'DEPT/324', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/-5897946797534460245_121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fullName` varchar(200) NOT NULL,
  `id` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `class_year` year(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `last_date` varchar(100) NOT NULL,
  `pass_word` varchar(200) NOT NULL,
  `st_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fullName`, `id`, `age`, `sex`, `department`, `class_year`, `semester`, `last_date`, `pass_word`, `st_image`) VALUES
('Chebalawu Tamiru', 'Ramit/111/11', 23, 'Male', 'Civil engineering', 2015, 'II', '2022-10-11', '81dc9bdb52d04dc20036dbd8313ed055', 0x75706c6f6164732f2d353839333034363338313538333634343631315f3132312e6a7067),
('Betelihem Yegagure', 'Ramit/115/11', 18, 'Female', 'Computer science', 2015, 'II', '2022-10-19', '81dc9bdb52d04dc20036dbd8313ed055', 0x75706c6f6164732f46425f494d475f31353639373138393634313634313939312e6a7067),
('Bereket Yosef', 'Ramit/135/11', 255, 'Male', 'Software', 2015, 'I', '2022-10-26', '81dc9bdb52d04dc20036dbd8313ed055', 0x75706c6f6164732f494d475f32303231313131315f3133343730395f372e6a7067),
('Solomon Chebeso', 'Ramit/1630/11', 24, 'Male', 'Software', 2015, 'I', '2022-10-11', 'e10adc3949ba59abbe56e057f20f883e', 0x75706c6f6164732f2d353932343938353035313138313835363935375f3132302e6a7067),
('Zekarias Kobota', 'Ramit/2035/11', 23, 'Male', 'Software', 2015, 'I', '2022-10-13', 'a58337d1b8c98bf3225186673be3407b', 0x75706c6f6164732f494d475f32303231303731315f3131313335335f382e6a7067),
('Beteley Melese', 'Ramit/408/11', 23, 'Male', 'Software', 2015, 'I', '2022-10-13', 'a58337d1b8c98bf3225186673be3407b', 0x75706c6f6164732f426573744d655f32303231303531373138343931352e6a7067),
('Dagim Yosef', 'Ramit/532/11', 23, 'Male', 'Software', 2015, 'I', '2022-10-13', '81dc9bdb52d04dc20036dbd8313ed055', 0x75706c6f6164732f2d353836383230383930373833333432333434395f3132312e6a7067),
('Biniam Yohannnes', 'Ramit/776/11', 23, 'Male', 'Software', 2015, 'I', '2022-10-18', '81dc9bdb52d04dc20036dbd8313ed055', 0x75706c6f6164732f2d353836383230383930373833333432333434395f3132312e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_final_approve_reject`
--
ALTER TABLE `department_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `department_record`
--
ALTER TABLE `department_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `dormitory_final_approve_reject`
--
ALTER TABLE `dormitory_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `dormitory_rejected_requests`
--
ALTER TABLE `dormitory_rejected_requests`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `dorm_record`
--
ALTER TABLE `dorm_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `lab_final_approve_reject`
--
ALTER TABLE `lab_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `lab_record`
--
ALTER TABLE `lab_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `lab_request`
--
ALTER TABLE `lab_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_final_approve_reject`
--
ALTER TABLE `library_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `library_record`
--
ALTER TABLE `library_record`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `registrar_final_approve`
--
ALTER TABLE `registrar_final_approve`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `registrar_final_rejected`
--
ALTER TABLE `registrar_final_rejected`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_department`
--
ALTER TABLE `request_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_dormitory`
--
ALTER TABLE `request_dormitory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_library`
--
ALTER TABLE `request_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_sport`
--
ALTER TABLE `request_sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport_final_approve_reject`
--
ALTER TABLE `sport_final_approve_reject`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `sport_rejected_requests`
--
ALTER TABLE `sport_rejected_requests`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
