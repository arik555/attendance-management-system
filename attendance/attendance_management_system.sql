-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2019 at 11:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `role` varchar(300) NOT NULL,
  `fk_teach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`role`, `fk_teach`) VALUES
('PRINCIPAL', 6),
('HOD CSE', 7);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `fk_stud` int(11) NOT NULL,
  `fk_sub` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0',
  `time_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Attendance Table';

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `fk_stud`, `fk_sub`, `fk_ins`, `time_stamp`) VALUES
(1, 1, 1, 0, '2019-03-23 12:48:09'),
(2, 2, 1, 0, '2019-03-23 12:48:09'),
(3, 3, 2, 0, '2019-04-08 21:39:35'),
(4, 4, 2, 0, '2019-04-08 21:39:35'),
(5, 1, 1, 0, '2019-04-08 21:39:59'),
(6, 2, 1, 0, '2019-04-08 21:39:59'),
(7, 4, 2, 0, '2019-04-22 07:18:08'),
(8, 1, 1, 0, '2019-04-27 21:08:46'),
(9, 1, 1, 0, '2019-05-12 12:33:23'),
(10, 2, 1, 0, '2019-05-12 12:33:23'),
(11, 2, 1, 0, '2019-05-12 12:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(200) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0'
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
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `body` varchar(5000) NOT NULL,
  `role` varchar(300) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_teach` int(11) NOT NULL,
  `fk_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `body`, `role`, `timestamp`, `fk_teach`, `fk_dept`) VALUES
(1, 'Admissions Open', 'This is Admission Notice', '', '2019-04-23 09:10:53', 1, 1),
(2, 'Internal Exam', '1st internal exams to be held', '', '2019-04-23 09:10:53', 2, 2),
(3, 'Notice Title 123', 'This is a simple notice body', '', '2019-05-14 08:24:48', 6, 1),
(4, 'ssss', 'dfffffk', 'PRINCIPAL', '2019-05-14 08:32:06', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(20) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0'
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
  `roll` varchar(20) NOT NULL,
  `stud_name` varchar(200) NOT NULL,
  `stud_contact` varchar(100) NOT NULL,
  `fk_dept` int(11) NOT NULL,
  `fk_sem` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Student Table';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `roll`, `stud_name`, `stud_contact`, `fk_dept`, `fk_sem`, `fk_ins`) VALUES
(1, '26100115001', 'Abhisake Jain', '9222111100', 1, 1, 0),
(2, '26100115002', 'Akash Dhar', '9222222210', 1, 1, 0),
(3, '26100115005', 'Arik Sarkar', '9122222220', 1, 2, 0),
(4, '26100115009', 'Bhawesh Joshi', '9622222220', 1, 2, 0),
(5, '26100115022', 'Anirban Bakshi', '8222222220', 2, 1, 0),
(6, '26100115010', 'Amardeep Saha', '8792222220', 2, 1, 0),
(7, '26100115050', 'Abhay Sindey', '7891112220', 2, 2, 0),
(8, '26100115011', 'Ashish Rahman', '8555555520', 2, 2, 0),
(9, '1234567890', 'Dilip Thakur', '986543321', 1, 1, 0),
(10, '26100116601', 'Falcon Markup', '9807654322', 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `full_name` varchar(300) NOT NULL DEFAULT 'Subject FullName Here',
  `fk_dept` int(11) NOT NULL,
  `fk_sem` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Subjects Table';

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `full_name`, `fk_dept`, `fk_sem`, `fk_ins`) VALUES
(1, 'CS-101', 'Subject FullName Here', 1, 1, 0),
(2, 'CS-201', 'Subject FullName Here', 1, 2, 0),
(3, 'EE-101', 'Subject FullName Here', 2, 1, 0),
(4, 'EE-201', 'Subject FullName Here', 2, 2, 0),
(5, 'MCS-101', 'Subject FullName Here', 1, 1, 0),
(6, 'CS-402', 'Computer Architecture', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teach_id` int(11) NOT NULL,
  `uname` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `teach_name` varchar(200) NOT NULL,
  `fk_dept` int(11) NOT NULL,
  `fk_ins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teach_id`, `uname`, `pass`, `teach_name`, `fk_dept`, `fk_ins`) VALUES
(1, 'sharmasantosh', 'pass', 'Santosh Sharma', 1, 0),
(2, 'kumaranil', 'pass', 'Anil Kumar', 1, 0),
(3, 'tagoresubimal', 'pass', 'Subimal Tagore', 2, 0),
(4, 'pradhanmonali', 'pass', 'Monali Pradhan', 2, 0),
(5, 'singhheavy', 'oooi', 'Heavy Singh', 1, 0),
(6, 'principal', 'pass', 'Principal Singh', 1, 0),
(7, 'headod', 'pass', 'Sumanto Halder', 1, 0);

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `fk_teach` (`fk_teach`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `fk_stud` (`fk_stud`),
  ADD KEY `fk_sub` (`fk_sub`),
  ADD KEY `fk_ins` (`fk_ins`);

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
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `fk_dept` (`fk_dept`),
  ADD KEY `fk_teach` (`fk_teach`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`fk_teach`) REFERENCES `teacher` (`teach_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`fk_stud`) REFERENCES `student` (`stud_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`fk_sub`) REFERENCES `subject` (`sub_id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`fk_ins`) REFERENCES `institute` (`ins_id`);

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`fk_dept`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `notice_ibfk_3` FOREIGN KEY (`fk_teach`) REFERENCES `teacher` (`teach_id`);

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
