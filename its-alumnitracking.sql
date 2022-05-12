-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 12:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `its-alumnitracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` text NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `photo`, `created_on`, `author`) VALUES
(6, 'admin@gmail.com', '$2y$10$ekCbxby8.4WID0VVcymureWKn4KTKpF70eQJigsaS/9jAT1kkxEni', 'FIRST ', 'Mid', 'AUTHOR', '163934404_907750563395825_8575706052885231783_n.png', '2021-10-30', '1'),
(13, 'zs@gmail.com', '$2y$10$CQNvz7M8tcWAXnJFuLfB7eN9lvm/z.b2cmxnZovl1mf4OCJml1wMq', 'z', 'z', '123456', '', '2022-03-27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `AddedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`Id`, `Name`, `Description`, `AddedDate`) VALUES
(1, '1', '2014', '2022-03-31'),
(2, '2', '2014', '2022-03-31'),
(3, '3', '2014', '2022-03-31'),
(4, '4', '2014', '2022-03-31'),
(5, '5', '2014', '2022-03-31'),
(6, '6', '2014', '2022-03-31'),
(8, '8', '2013', '2022-04-02'),
(9, '9', '2011', '2022-04-02'),
(10, '10', '2014', '2022-04-02'),
(11, '11', '2014', '2022-04-02'),
(12, '12', '2014', '2022-04-02'),
(13, '13', '2014', '2022-04-02'),
(14, '14', '2014', '2022-04-02'),
(15, '15', '2014', '2022-04-02'),
(16, '16', '2014', '2022-04-02'),
(17, '17', '2014', '2022-04-02'),
(18, '18', '2014', '2022-04-02'),
(19, '19', '2014', '2022-04-02'),
(20, '20', '2012', '2022-04-02'),
(21, '21', '2012', '2022-04-02'),
(22, '22', '2012', '2022-04-02'),
(23, '23', '2012', '2022-04-02'),
(24, '24', '2012', '2022-04-02'),
(25, '25', '2012', '2022-04-02'),
(26, '26', '2012', '2022-04-02'),
(27, '27', '2012', '2022-04-02'),
(28, '28', '2012', '2022-04-02'),
(29, '29', '2012', '2022-04-02'),
(30, '30', '2012', '2022-04-02'),
(31, '31', '2012', '2022-04-02'),
(32, '32', '2014', '2022-04-02'),
(33, '33', '2014', '2022-04-02'),
(34, '34', '2014', '2022-04-02'),
(36, '36', '2014', '2022-04-02'),
(37, '37', '2014', '2022-04-02'),
(38, '42', '2021', '2022-04-10'),
(39, '41', '2015', '2022-04-10'),
(41, '43', '2011', '2022-04-10'),
(42, '44', '2010', '2022-04-10'),
(43, '50', '2014', '2022-04-10'),
(44, '51', '2014', '2022-04-10'),
(45, '52', '2014', '2022-04-10'),
(46, '53', '2014', '2022-04-10'),
(47, '54', '2014', '2022-04-10'),
(49, '56', '2014', '2022-04-10'),
(50, '57', '2014', '2022-04-10'),
(51, '58', '2014', '2022-04-10'),
(52, '59', '2014', '2022-04-10'),
(53, '60', '2014', '2022-04-10'),
(54, '61', '2014', '2022-04-10'),
(55, '62', '2015', '2022-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `file` text NOT NULL,
  `publisher` varchar(150) NOT NULL,
  `publish_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `pendingPost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `AddedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Id`, `Name`, `Address`, `AddedDate`) VALUES
(6, 'Arrellano University', 'Plaridell', '2022-03-17'),
(8, 'Arellano University', 'Legarda', '2022-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Engineering'),
(2, 'Mathematics'),
(3, 'Science and Technology'),
(4, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `comments` text NOT NULL,
  `seen` text NOT NULL,
  `comment_create` text NOT NULL,
  `replyTo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comments`, `seen`, `comment_create`, `replyTo`) VALUES
(1, '24', 'Student Surname', 'Nice Article!', '0', '2021-11-09 14:16:29', 'FIRST'),
(2, '24', 'Student Surname', 'Joseph', '0', '2021-11-24 17:01:19', 'Student Surname');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `code` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `BatchId` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`, `branch_id`, `BatchId`, `dep_id`) VALUES
(2, 'Bachelor of Science in Computer Science', 'BSCS', 2, 0, 6),
(6, 'BSED- MAJOR IN SCIENCE', 'BSTED-SC', 0, 0, 1),
(7, 'human resources', 'hr', 0, 0, 7),
(8, 'BSED- MAJOR IN MATH', 'BSED-MT', 0, 0, 2),
(9, 'Bachelor of Science in Information Systems', 'BSIT', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `AddedDate` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `Name`, `Description`, `AddedDate`, `branch_id`) VALUES
(1, 'Science Department', 'Test Descripiton\r\n', 0, 6),
(2, 'Math Department', 'Test Descripiton\r\n', 0, 8),
(6, 'IT Department', 'IT Department Description', 2147483647, 8),
(7, 'HR Department', 'HR Department', 2147483647, 6);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Subtitle` text NOT NULL,
  `Description` text NOT NULL,
  `Image` text NOT NULL,
  `CreatedDate` text NOT NULL,
  `CreatedUser` text NOT NULL,
  `UserType` text NOT NULL,
  `TypeOfContent` text NOT NULL,
  `location` text NOT NULL,
  `specialization` text NOT NULL,
  `course` int(6) NOT NULL,
  `AllowPost` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `Title`, `Subtitle`, `Description`, `Image`, `CreatedDate`, `CreatedUser`, `UserType`, `TypeOfContent`, `location`, `specialization`, `course`, `AllowPost`) VALUES
(4, 'Test', 'test', 'test', 'contents/20220410-empty', '2022-04-10 23:45:17', '62_student', 'Alumni', 'Announcements', '', '', 0, 1),
(5, 'Test', 'test', 'test', 'contents/20220410-loginbg.png', '2022-04-11 01:31:46', '62_student', 'Alumni', 'Announcements', '', '', 0, 0),
(6, 'Concert', 'asdasd', 'tasdasdasd', 'contents/20220410-empty', '2022-04-11 02:01:35', '20', 'Administrator', 'Announcements', '', '', 0, 0),
(7, 'File Move to Proof', 'test', '1', 'contents/20220501-empty', '2022-05-01 17:53:30', '62_student', 'Alumni', 'Announcements', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user` text NOT NULL,
  `movement` text NOT NULL,
  `movement_date` datetime NOT NULL,
  `log_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user`, `movement`, `movement_date`, `log_type`) VALUES
(1, 'admin1@gmail.com', '0', '2022-03-27 10:56:08', 'Login'),
(2, 'admin1@gmail.com', 'User Logged In', '2022-03-27 10:56:48', 'Login'),
(3, '', 'User Logged Out', '2022-03-27 10:58:39', 'Login'),
(4, 'admin1@gmail.com', 'User Logged In', '2022-03-27 10:59:35', 'Login'),
(5, '', 'User Logged Out', '2022-03-27 10:59:37', 'Login'),
(6, 'admin1@gmail.com', 'User Logged In', '2022-03-27 11:00:08', 'Login'),
(7, '', 'User Logged Out', '2022-03-27 11:00:14', 'Login'),
(8, 'admin1@gmail.com', 'User Logged In', '2022-03-27 11:01:22', 'Login'),
(9, '', 'User Logged Out', '2022-03-27 11:01:27', 'Login'),
(10, 'admin1@gmail.com', 'User Logged Out', '2022-03-27 11:02:42', 'Login'),
(11, 'admin1@gmail.com', 'User Logged In', '2022-03-27 11:02:44', 'Login'),
(12, 'admin1@gmail.com', 'User Logged Out', '2022-03-27 11:02:48', 'Login'),
(13, 'admin1@gmail.com', 'User Logged In', '2022-03-27 21:31:28', 'Login'),
(14, 'admin1@gmail.com', 'User Created an Alumni Account: z@gmail.com', '2022-03-27 21:47:09', 'Alumni Account'),
(15, 'admin1@gmail.com', 'User Created an Alumni Account: z@gmail.com', '2022-03-27 21:48:18', 'Alumni Account'),
(16, 'admin1@gmail.com', 'User Updated an Alumni Account: z@gmail.com', '2022-03-27 21:49:12', 'Alumni Account'),
(17, 'admin1@gmail.com', 'User Logged In', '2022-03-28 20:25:37', 'Login'),
(18, 'admin1@gmail.com', 'User Deleted an Alumni Account: ', '2022-03-28 20:59:22', 'Alumni Account'),
(19, 'admin1@gmail.com', 'User Created an Alumni Account: joseph@gmail.com2', '2022-03-28 21:01:14', 'Alumni Account'),
(20, 'admin1@gmail.com', 'User Updated an Alumni Account: joseph@gmail.com23', '2022-03-28 21:01:53', 'Alumni Account'),
(21, 'admin1@gmail.com', 'User Deleted an Employee Account: ', '2022-03-28 21:03:00', 'Employee Account'),
(22, 'admin1@gmail.com', 'User Deleted an Alumni Account: 14', '2022-03-28 21:04:52', 'Alumni Account'),
(23, 'admin1@gmail.com', 'User Updated an Admin Account: admin1@gmail.com', '2022-03-28 21:05:12', 'Admin Account'),
(24, 'admin1@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-03-28 21:05:38', 'Employee Account'),
(25, 'admin1@gmail.com', 'User Created an Alumni Account: student@gmail.com', '2022-03-28 21:15:25', 'Admin Account'),
(26, 'admin1@gmail.com', 'User Updated an Alumni Account: studentA@gmail.com', '2022-03-28 21:17:27', 'Admin Account'),
(27, 'admin1@gmail.com', 'User Updated an Alumni Account: studentA@gmail.com', '2022-03-28 21:17:54', 'Admin Account'),
(28, 'admin1@gmail.com', 'User Deleted an Alumni Account: 2', '2022-03-28 21:19:11', 'Admin Account'),
(29, 'admin1@gmail.com', 'User Created an Announcement / Events: Title Events', '2022-03-28 21:26:33', 'Jobs'),
(30, 'admin1@gmail.com', 'User Created an Job Post: Test Job', '2022-03-28 21:27:29', 'Jobs'),
(31, 'admin1@gmail.com', 'User Updated an Announcement / Events: 1', '2022-03-28 21:36:04', 'Announcement / Events'),
(32, 'admin1@gmail.com', 'User Updated a Job Post: Software Developers', '2022-03-28 21:36:23', 'Jobs'),
(33, 'admin1@gmail.com', 'User Updated an Announcement / Events: 1', '2022-03-28 21:37:07', 'Announcement / Events'),
(34, 'admin1@gmail.com', 'User Updated an Announcement / Events: 29', '2022-03-28 21:37:37', 'Announcement / Events'),
(35, 'admin1@gmail.com', 'User Updated Branch', '2022-03-28 21:52:32', 'Branch'),
(36, 'admin1@gmail.com', 'User Deleted Branch', '2022-03-28 21:53:04', 'Branch'),
(37, 'admin1@gmail.com', 'User Created Deparment', '2022-03-28 21:55:24', 'Deparment'),
(38, 'admin1@gmail.com', 'User Updated a Deparment', '2022-03-28 21:55:34', 'Deparment'),
(39, 'admin1@gmail.com', 'User Deleted Department', '2022-03-28 21:55:40', 'Deparment'),
(40, 'admin1@gmail.com', 'User Updated a Course', '2022-03-28 21:59:17', 'Course'),
(41, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-03-29 20:54:03', 'Login'),
(42, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: email@admin.com', '2022-03-29 21:30:00', 'Admin Account'),
(43, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: email@admin.com', '2022-03-29 21:53:55', 'Admin Account'),
(44, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: email@admin.com', '2022-03-29 21:57:13', 'Admin Account'),
(45, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:00', 'Admin Account'),
(46, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:03', 'Admin Account'),
(47, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:06', 'Admin Account'),
(48, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:08', 'Admin Account'),
(49, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:11', 'Admin Account'),
(50, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:15', 'Admin Account'),
(51, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 2', '2022-03-29 21:59:23', 'Admin Account'),
(52, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 21:59:30', 'Admin Account'),
(53, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 22:00:22', 'Admin Account'),
(54, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 22:02:21', 'Admin Account'),
(55, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 22:03:03', 'Admin Account'),
(56, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 9', '2022-03-29 22:03:08', 'Admin Account'),
(57, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 13', '2022-03-29 22:07:50', 'Admin Account'),
(58, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: student@gmail.com', '2022-03-29 22:08:35', 'Admin Account'),
(59, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:09:18', 'Admin Account'),
(60, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:09:46', 'Admin Account'),
(61, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 22:10:34', 'Admin Account'),
(62, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:31:34', 'Admin Account'),
(63, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:33:48', 'Admin Account'),
(64, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:35:04', 'Admin Account'),
(65, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:38:28', 'Admin Account'),
(66, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:38:41', 'Admin Account'),
(67, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:38:52', 'Admin Account'),
(68, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:39:44', 'Admin Account'),
(69, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:40:48', 'Admin Account'),
(70, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:41:41', 'Admin Account'),
(71, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:41:51', 'Admin Account'),
(72, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:42:43', 'Admin Account'),
(73, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:44:10', 'Admin Account'),
(74, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:46:06', 'Admin Account'),
(75, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:46:52', 'Admin Account'),
(76, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:48:21', 'Admin Account'),
(77, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:48:32', 'Admin Account'),
(78, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:49:05', 'Admin Account'),
(79, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:49:44', 'Admin Account'),
(80, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:50:55', 'Admin Account'),
(81, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:51:37', 'Admin Account'),
(82, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:52:22', 'Admin Account'),
(83, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:52:30', 'Admin Account'),
(84, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: joseph.rivera@zagana.com', '2022-03-29 22:52:52', 'Admin Account'),
(85, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 8', '2022-03-29 22:53:37', 'Admin Account'),
(86, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 22:53:59', 'Admin Account'),
(87, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 22:54:28', 'Admin Account'),
(88, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 22:54:58', 'Admin Account'),
(89, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 22:56:30', 'Admin Account'),
(90, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: firstAuthor@gmail.com', '2022-03-29 22:58:11', 'Admin Account'),
(91, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: jadmin@gmail.com', '2022-03-29 23:01:46', 'Admin Account'),
(92, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-03-30 21:43:22', 'Login'),
(93, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-03-31 22:35:24', 'Login'),
(94, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-01 21:58:17', 'Login'),
(95, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-01 21:58:57', 'Login'),
(96, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-01 22:05:04', 'Login'),
(97, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-01 22:47:36', 'Login'),
(98, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-01 23:32:58', 'Login'),
(99, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: sephriverajr@gmail.com', '2022-04-02 18:24:40', 'Admin Account'),
(100, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: sephriverajr@gmail.com', '2022-04-02 18:26:24', 'Admin Account'),
(101, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 7', '2022-04-02 18:26:47', 'Admin Account'),
(102, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-02 18:26:52', 'Login'),
(103, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-02 18:29:16', 'Login'),
(104, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: clairearcerivera@gmail.com', '2022-04-02 18:30:33', 'Admin Account'),
(105, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-02 18:31:27', 'Login'),
(106, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-02 18:33:53', 'Login'),
(107, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-02 19:00:26', 'Login'),
(108, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-02 19:03:15', 'Login'),
(109, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-02 19:03:55', 'Login'),
(110, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-02 19:06:55', 'Login'),
(111, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-02 19:07:38', 'Login'),
(112, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-05 19:25:03', 'Login'),
(113, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-05 19:27:51', 'Login'),
(114, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-07 22:49:44', 'Login'),
(115, 'arellano.alumniasd@gmail.com', 'User Created an Job Post: Job Post', '2022-04-07 22:50:13', 'Jobs'),
(116, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: momorivera8@gmail.com', '2022-04-08 06:51:48', 'Admin Account'),
(117, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 10:42:10', 'Login'),
(118, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 10:46:11', 'Login'),
(119, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 19:01:01', 'Login'),
(120, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: sephriverajr@gmail.com', '2022-04-10 19:17:56', 'Admin Account'),
(121, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: q@gmail1.com', '2022-04-10 19:24:49', 'Admin Account'),
(122, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: q@gmail.com', '2022-04-10 19:36:39', 'Admin Account'),
(123, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: q@gmail.com', '2022-04-10 19:37:07', 'Admin Account'),
(124, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: q@gmail.com', '2022-04-10 19:37:29', 'Admin Account'),
(125, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: s@gmail.com', '2022-04-10 19:41:04', 'Admin Account'),
(126, 'arellano.alumniasd@gmail.com', 'User Updated an Alumni Account: s@gmail.com', '2022-04-10 19:41:14', 'Admin Account'),
(127, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: sephriverajr@gmail.com', '2022-04-10 19:44:06', 'Admin Account'),
(128, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 35', '2022-04-10 19:46:24', 'Admin Account'),
(129, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: crystel.ruiz@deped.gov.ph', '2022-04-10 19:51:18', 'Admin Account'),
(130, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 3', '2022-04-10 19:54:52', 'Announcement / Events'),
(131, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 2', '2022-04-10 19:55:21', 'Announcement / Events'),
(132, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-04-10 19:55:50', 'Employee Account'),
(133, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 19:55:54', 'Login'),
(134, 'employee@gmail.com', 'User Logged In', '2022-04-10 19:55:59', 'Login'),
(135, 'employee@gmail.com', 'User Deleted an Alumni Account: 39', '2022-04-10 22:52:18', 'Admin Account'),
(136, 'employee@gmail.com', 'User Logged Out', '2022-04-10 22:53:05', 'Login'),
(137, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 22:53:11', 'Login'),
(138, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-04-10 22:53:28', 'Branch'),
(139, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-04-10 22:53:38', 'Deparment'),
(140, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-04-10 22:53:47', 'Deparment'),
(141, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-04-10 22:53:55', 'Deparment'),
(142, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-04-10 22:54:01', 'Deparment'),
(143, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-04-10 22:54:07', 'Deparment'),
(144, 'arellano.alumniasd@gmail.com', 'User Updated a Course', '2022-04-10 22:54:37', 'Course'),
(145, 'arellano.alumniasd@gmail.com', 'User Updated a Course', '2022-04-10 22:55:03', 'Course'),
(146, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-04-10 22:56:29', 'Employee Account'),
(147, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 55', '2022-04-10 22:58:47', 'Admin Account'),
(148, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 23:00:17', 'Login'),
(149, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 23:01:54', 'Login'),
(150, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 23:02:22', 'Login'),
(151, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 23:02:30', 'Login'),
(152, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-04-10 23:02:46', 'Employee Account'),
(153, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 23:02:51', 'Login'),
(154, 'employee@gmail.com', 'User Logged In', '2022-04-10 23:02:56', 'Login'),
(155, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 23:25:10', 'Login'),
(156, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: rtan@racami.com', '2022-04-10 23:26:08', 'Employee Account'),
(157, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 23:26:13', 'Login'),
(158, 'rtan@racami.com', 'User Logged In', '2022-04-10 23:26:19', 'Login'),
(159, 'rtan@racami.com', 'User Logged Out', '2022-04-10 23:26:34', 'Login'),
(160, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-10 23:29:07', 'Login'),
(161, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-10 23:29:41', 'Login'),
(162, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-04-11 01:19:58', 'Login'),
(163, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: tanjohn023@gmail.com', '2022-04-11 01:20:49', 'Admin Account'),
(164, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: tanjohn023@gmail.com', '2022-04-11 01:23:30', 'Admin Account'),
(165, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 18', '2022-04-11 01:23:44', 'Admin Account'),
(166, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: tanjohn023@gmail.com', '2022-04-11 01:23:51', 'Admin Account'),
(167, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 19', '2022-04-11 01:24:02', 'Admin Account'),
(168, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: tanjohn023@gmail.com', '2022-04-11 01:29:08', 'Admin Account'),
(169, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-04-11 01:29:20', 'Login'),
(170, 'tanjohn023@gmail.com', 'User Logged In', '2022-04-11 01:29:24', 'Login'),
(171, 'tanjohn023@gmail.com', 'User Logged Out', '2022-04-11 01:30:37', 'Login'),
(172, 'tanjohn023@gmail.com', 'User Logged In', '2022-04-11 02:01:24', 'Login'),
(173, 'tanjohn023@gmail.com', 'User Created an Announcement / Events: Concert', '2022-04-11 02:01:35', 'Announcement / Events'),
(174, 'tanjohn023@gmail.com', 'User Logged Out', '2022-04-11 02:01:40', 'Login'),
(175, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-01 17:44:00', 'Login'),
(176, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-01 17:44:31', 'Login'),
(177, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 4', '2022-05-01 18:06:11', 'Announcement / Events');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `id` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `user_id` text NOT NULL,
  `seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`id`, `post_id`, `user_id`, `seen`) VALUES
(4, '25', '20001', '0'),
(6, '26', '20001', '0'),
(9, '22', '20001', '0'),
(14, '24', '20002', '0'),
(15, '24', '20003', '0'),
(16, '29', '20003', '0');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `request_approval` text NOT NULL,
  `request_created` text NOT NULL,
  `request_approved` text NOT NULL,
  `notif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `student_id`, `post_id`, `request_approval`, `request_created`, `request_approved`, `notif`) VALUES
(1, 20001, 31, 'pending', '2021-11-09 14:20:28', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleId` int(11) NOT NULL,
  `ObjectId` int(11) NOT NULL,
  `AllowCreate` tinyint(1) NOT NULL,
  `AllowUpdate` tinyint(1) NOT NULL,
  `AllowDelete` tinyint(1) NOT NULL,
  `AllowPost` tinyint(1) NOT NULL,
  `AddedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Id` int(11) NOT NULL,
  `IdNumber` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `MiddleName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `ContactNumber` varchar(200) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `AddedDate` date NOT NULL,
  `userData` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Id`, `IdNumber`, `Username`, `Password`, `FirstName`, `LastName`, `MiddleName`, `Email`, `ContactNumber`, `BranchId`, `DepartmentId`, `AddedDate`, `userData`) VALUES
(8, 2015, 'arellano.alumniasd@gmail.com', '$2y$10$74eSQNv0I9ARLSQArLDHGO69zHfNqYSMWT3bot7/YD9/5OoWxkDc.', 'Testme', 'Surname', 'Testme', 'arellano.alumniasd@gmail.com', '09676554411', 1, 1, '2022-03-12', 'Administrator'),
(9, 201562, 'employee@gmail.com', '$2y$10$RlXnkPG1aiSDOaCp3.4aaOJ1.GWoenpZuz4c5gT1V3qrLumdiGpgy', 'Joseph', 'Surname', 'Testme', 'employee@gmail.com', '09067655441', 6, 1, '2022-03-17', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `studentforms`
--

CREATE TABLE `studentforms` (
  `Id` int(11) NOT NULL,
  `studID` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `AddedDate` date NOT NULL,
  `courseRelated` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentforms`
--

INSERT INTO `studentforms` (`Id`, `studID`, `Description`, `AddedDate`, `courseRelated`) VALUES
(10, '56', '{\"id\":\"56\",\"pursueStudy\":\"Yes\",\"training\":\"\",\"creditsEarned\":\"\",\"trainingIns\":\"\",\"pursueFurther\":\"For Promotion\",\"pursueOthers\":\"\",\"skills\":\"\",\"trainingIn\":\"\",\"otherTraining\":\"\",\"skillsandtraining\":\"Very useful\",\"overalAll\":\"Very effective\",\"personalExp\":\"Very satisfied\",\"compare\":\"Better prepared\",\"prepareOthers\":\"\",\"Award\":\"\",\"GrantingInstitution\":\"\",\"year\":\"\",\"address\":\"\",\"getJob\":\"Less than a month\",\"acquired\":\"Personal applied for the job\",\"acquiredOthers\":\"\",\"employementStat\":\"optLocalion1\",\"currentlyEmp\":\"Yes\",\"unEmployed\":\"\",\"typeOrg\":\"Private\",\"otherOrg\":\"\",\"presentStatus\":\"Regular/Permanent\",\"presentEmployer\":\"\",\"position\":\"\",\"when\":\"\",\"occupationClass\":\"Corporate Executive or Manager\",\"otherClass\":\"\",\"compYears\":\"11-15\",\"incomeRanged\":\"51,000-60,000\",\"statisfied\":\"Dissatisfied\",\"firstJob\":\"\",\"alumnisuggest\":\"\"}', '2022-04-10', 'No'),
(11, '43', '{\"id\":\"43\",\"pursueStudy\":\"Yes\",\"training\":\"\",\"creditsEarned\":\"\",\"trainingIns\":\"\",\"pursueFurther\":\"For Promotion\",\"pursueOthers\":\"\",\"skills\":\"\",\"trainingIn\":\"\",\"otherTraining\":\"\",\"skillsandtraining\":\"Very useful\",\"overalAll\":\"Very effective\",\"personalExp\":\"Very satisfied\",\"compare\":\"Better prepared\",\"prepareOthers\":\"\",\"Award\":\"\",\"GrantingInstitution\":\"\",\"year\":\"\",\"address\":\"\",\"getJob\":\"Less than a month\",\"acquired\":\"Personal applied for the job\",\"acquiredOthers\":\"\",\"employementStat\":\"optLocalion1\",\"currentlyEmp\":\"Yes\",\"unEmployed\":\"\",\"typeOrg\":\"Private\",\"otherOrg\":\"\",\"presentStatus\":\"Regular/Permanent\",\"presentEmployer\":\"\",\"position\":\"\",\"when\":\"\",\"occupationClass\":\"Corporate Executive or Manager\",\"otherClass\":\"\",\"compYears\":\"1-5\",\"incomeRanged\":\"Below 10,000\",\"statisfied\":\"Very satisfied\",\"firstJob\":\"\",\"alumnisuggest\":\"\"}', '2022-04-10', 'Yes'),
(12, '62', '{\"id\":\"62\",\"pursueStudy\":\"Yes\",\"training\":\"\",\"creditsEarned\":\"\",\"trainingIns\":\"\",\"pursueFurther\":\"For Promotion\",\"pursueOthers\":\"\",\"skills\":\"\",\"trainingIn\":\"\",\"otherTraining\":\"\",\"skillsandtraining\":\"Very useful\",\"overalAll\":\"Very effective\",\"personalExp\":\"Very satisfied\",\"compare\":\"Better prepared\",\"prepareOthers\":\"\",\"Award\":\"\",\"GrantingInstitution\":\"\",\"year\":\"\",\"address\":\"\",\"getJob\":\"Less than a month\",\"acquired\":\"Personal applied for the job\",\"acquiredOthers\":\"\",\"employementStat\":\"optLocalion1\",\"currentlyEmp\":\"Yes\",\"unEmployed\":\"\",\"typeOrg\":\"Private\",\"otherOrg\":\"\",\"presentStatus\":\"Regular/Permanent\",\"presentEmployer\":\"\",\"position\":\"\",\"when\":\"\",\"occupationClass\":\"Corporate Executive or Manager\",\"otherClass\":\"\",\"compYears\":\"1-5\",\"incomeRanged\":\"Below 10,000\",\"statisfied\":\"Very satisfied\",\"firstJob\":\"\",\"alumnisuggest\":\"\"}', '2022-04-10', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `gender` text NOT NULL,
  `birthday` date NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `socMed` text NOT NULL,
  `interest` text NOT NULL,
  `schoolAttended` text NOT NULL,
  `CurrentWork` text NOT NULL,
  `courseGraduated` text DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `bio` text NOT NULL,
  `guid` text NOT NULL,
  `studNo` text NOT NULL,
  `studStatus` text NOT NULL,
  `studDes` text NOT NULL,
  `studOR` text NOT NULL,
  `studDate` text NOT NULL,
  `studRemarks` text NOT NULL,
  `employerNo` text NOT NULL,
  `mailingAddress` text NOT NULL,
  `presentAddress` text NOT NULL,
  `provincialAddress` text NOT NULL,
  `fbURL` text NOT NULL,
  `gmailURL` text NOT NULL,
  `linkURL` text NOT NULL,
  `otherURL` text NOT NULL,
  `major` text NOT NULL,
  `awards` text NOT NULL,
  `company` text NOT NULL,
  `position` text NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `employeeYear` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middleName`, `lastname`, `photo`, `gender`, `birthday`, `email`, `contact`, `socMed`, `interest`, `schoolAttended`, `CurrentWork`, `courseGraduated`, `created_on`, `password`, `address`, `bio`, `guid`, `studNo`, `studStatus`, `studDes`, `studOR`, `studDate`, `studRemarks`, `employerNo`, `mailingAddress`, `presentAddress`, `provincialAddress`, `fbURL`, `gmailURL`, `linkURL`, `otherURL`, `major`, `awards`, `company`, `position`, `location`, `description`, `employeeYear`) VALUES
(56, 'John', 'test', ' Doe', '', 'male', '0000-00-00', 'sephriverajr@gmail.com', '123-456-7890', '', '', 'Arrellano University - Plaridell', 'Encoder', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address1', '', '', '', '', '', '', ' ', '2022-04-10 22:59:12', '', '', 'address1', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'Gary', 'test', ' Riley', '', '', '0000-00-00', 'gary@hotmail.com', '434-506-6483', '', '', 'Arrellano University - Plaridell', '', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address2', '', '', '', '', '', '', ' ', '2022-04-10 22:59:17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'Edward', 'test', ' Siu', '', '', '0000-00-00', 'siu.edward@gmail.com', '986-438-0040', '', '', 'Arrellano University - Plaridell', '', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address3', '', '', '', '', '', '', ' ', '2022-04-10 22:59:23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'Betty ', ' ', ' Simons', '', '', '0000-00-00', 'simons@example.com', '439-405-2345', '', '', 'Arrellano University - Plaridell', '', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address4', '', '', '', '', '', '', ' ', '2022-04-10 22:59:28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'Frances', ' ', ' Lieberman', '', '', '0000-00-00', 'lieberman@gmail.com', '765-980-0543', '', '', 'Arrellano University - Plaridell', '', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address5', '', '', '', '', '', '', ' ', '2022-04-10 22:59:34', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'Jason', ' ', ' Gregson', '', '', '0000-00-00', 'jason@example.com', '567-859-0485', '', '', 'Arrellano University - Plaridell', '', '2', '0000-00-00 00:00:00', '$2y$10$FO4OG25AQ2ENXpFRF9Xq5.H2prjfeAS929429WNcxtbabF5DcBtB6', 'address6', '', '', '', '', '', '', ' ', '2022-04-10 22:59:40', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `studentforms`
--
ALTER TABLE `studentforms`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `studentforms`
--
ALTER TABLE `studentforms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
