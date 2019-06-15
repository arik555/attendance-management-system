-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 03:34 AM
-- Server version: 5.5.25a
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
-- Database: `id6698824_mysiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Science and Tech');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  `fk_ins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Department Table';

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `fk_ins`) VALUES
(1, 'CSE', 0),
(2, 'EE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `ins_id` int(11) NOT NULL,
  `ins_name` varchar(500) NOT NULL,
  `ins_address` varchar(800) NOT NULL,
  `ins_email` varchar(256) NOT NULL,
  `ins_mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Institute Master';

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`ins_id`, `ins_name`, `ins_address`, `ins_email`, `ins_mobile`) VALUES
(0, 'SIEM', 'Siliguri', 'admin@siemsiliguri.org', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(20) NOT NULL,
  `fk_ins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Semester Table';

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`, `fk_ins`) VALUES
(1, 'SEM_1', 0),
(2, 'SEM_2', 0),
(3, 'SEM_3', 0),
(4, 'SEM_4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_name` varchar(200) NOT NULL,
  `stud_contact` varchar(100) NOT NULL,
  `fk_dept` int(11) NOT NULL,
  `fk_sem` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Student Table';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_name`, `stud_contact`, `fk_dept`, `fk_sem`, `fk_ins`) VALUES
(1, 'Abhisake Jain', '9222111100', 1, 1, 0),
(2, 'Akash Dhar', '9222222210', 1, 1, 0),
(3, 'Arik Sarkar', '9122222220', 1, 2, 0),
(4, 'Bhawesh Joshi', '9622222220', 1, 2, 0),
(5, 'Anirban Bakshi', '8222222220', 2, 1, 0),
(6, 'Amardeep Saha', '8792222220', 2, 1, 0),
(7, 'Abhay Sindey', '7891112220', 2, 2, 0),
(8, 'Ashish Rahman', '8555555520', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `fk_dept` int(11) NOT NULL,
  `fk_sem` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Subjects Table';

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `fk_dept`, `fk_sem`, `fk_ins`) VALUES
(1, 'CS-101', 1, 1, 0),
(2, 'CS-201', 1, 2, 0),
(3, 'EE-101', 2, 1, 0),
(4, 'EE-201', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teach_id` int(11) NOT NULL,
  `uname` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `teach_name` varchar(200) NOT NULL,
  `teach_rank` int(11) NOT NULL,
  `fk_dept` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teach_id`, `uname`, `pass`, `teach_name`, `teach_rank`, `fk_dept`, `fk_ins`) VALUES
(1, 'sharmasantosh', 'pass', 'Santosh Sharma', 2, 1, 0),
(2, 'kumaranil', 'pass', 'Anil Kumar', 2, 1, 0),
(3, 'tagoresubimal', 'pass', 'Subimal Tagore', 2, 2, 0),
(4, 'pradhanmonali', 'pass', 'Monali Pradhan', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `fk_teach` int(11) NOT NULL,
  `fk_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Teacher - Subject Relation Table';

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`fk_teach`, `fk_sub`) VALUES
(1, 1),
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `fk_ins` (`fk_ins`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `fk_ins` (`fk_ins`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `fk_dept` (`fk_dept`),
  ADD KEY `fk_sem` (`fk_sem`),
  ADD KEY `fk_ins` (`fk_ins`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_dept` (`fk_dept`),
  ADD KEY `fk_sem` (`fk_sem`),
  ADD KEY `fk_ins` (`fk_ins`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teach_id`),
  ADD KEY `fk_dept` (`fk_dept`),
  ADD KEY `fk_ins` (`fk_ins`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD KEY `fk_teach` (`fk_teach`),
  ADD KEY `fk_sub` (`fk_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`fk_dept`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`fk_sem`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`fk_dept`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`fk_sem`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `subject_ibfk_3` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`fk_dept`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `teacher_subject_ibfk_1` FOREIGN KEY (`fk_teach`) REFERENCES `teacher` (`teach_id`),
  ADD CONSTRAINT `teacher_subject_ibfk_2` FOREIGN KEY (`fk_sub`) REFERENCES `subject` (`sub_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
