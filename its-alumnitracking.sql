-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220522.7701cd71da
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

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
(1, 'Juan Sumulong Campus', 'Legarda', '2022-05-19'),
(2, 'Plaridel Campus', 'Mandaluyong', '2022-05-19');

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
(1, 'Bachelor of Science in Computer Science', 'BSCS', 0, 0, 1),
(2, 'Bachelor of Science in Nursing', 'BSN', 0, 0, 2);

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
(1, 'School of Computer Science', 'SCS', 2147483647, 1),
(2, 'School of Nursing', 'SN', 2147483647, 1);

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
  `AllowPost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exceltest`
--

CREATE TABLE `exceltest` (
  `id` int(11) NOT NULL,
  `alumni_id` varchar(50) DEFAULT NULL,
  `stud_no` varchar(50) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `campus` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `studDate` varchar(50) DEFAULT NULL,
  `studStatus` varchar(50) DEFAULT NULL,
  `studDes` varchar(50) DEFAULT NULL,
  `studOR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exceltest`
--

INSERT INTO `exceltest` (`id`, `alumni_id`, `stud_no`, `f_name`, `m_name`, `l_name`, `email`, `campus`, `course`, `batch`, `phone`, `address`, `studDate`, `studStatus`, `studDes`, `studOR`) VALUES
(9, '22-0009', '22-00009', 'james riel', 'misoles', 'peralta', 'jamesperalta11@gmail.com', '1', '1', '2022', '9626672984', 'Mandaluyong City', '5/21/2019', 'married', 'none', '213846'),
(10, '22-0010', '22-00010', 'carla', 'dimangunahan', 'ramos', 'carlaramos18@gmail.com', '1', '1', '2022', '9438214368', 'San Juan City', '5/27/2019', 'married', 'none', '213479'),
(19, '22-0003', '22-00003', 'Christian', 'Jose', 'Codiila', 'tianmendoza@gmail.com', '1', '1', '2022', '9719421740', 'Manila', '3/25/2019', 'single', 'none', '213486'),
(20, '22-0005', '22-00005', 'Jade', 'Escarilla', 'dominguez', 'Jadedominguez044@gmail.com', '1', '1', '2022', '9197678125', 'Cavite', '3/14/2019', 'married', 'none', '213511'),
(21, '22-0007', '22-00007', 'allyssa mikaella', 'domamtay', 'posadas', 'ellaposadas@gmail.com', '1', '1', '2022', '9770359858', 'Pasig City', '4/25/2019', 'single', 'none', '213576'),
(22, '22-0008', '22-00008', 'michelle', 'estopin', 'domingo', 'chelledomingo16@gmail.com', '1', '1', '2022', '9067203597', 'Quezon City', '5/17/2019', 'married', 'none', '213856'),
(23, '22-0001', '22-00001', 'Samuel', 'Mendoza', 'Espiritu', 'sammendoza26@gmail.com', '1', '1', '2022', '9518625901', 'Quezon City', '3/16/2019', 'single', 'none', '213456'),
(24, '22-0002', '22-00002', 'William', 'Ford', 'Nwabia', 'williamford@gmail.com', '1', '1', '2022', '9860293029', 'Manila', '03/07/2019', 'single', 'none', '213459'),
(25, '22-0004', '22-00004', 'Mark anthony', 'Manzano', 'Medina', 'macanthony21@gmail.com', '1', '1', '2022', '9857273313', 'Manila', '03/04/2019', 'single', 'none', '213468'),
(26, '22-0006', '22-00006', 'christiane nicole', 'Jose', 'Codiila', 'nicscodilla31@gmail.com', '1', '1', '2022', '9310549931', 'Mandaluyong City', '4/25/2019', 'married', 'none', '213527');

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
(177, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 4', '2022-05-01 18:06:11', 'Announcement / Events'),
(178, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 16:48:31', 'Login'),
(179, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-12 16:49:09', 'Admin Account'),
(180, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 16:49:51', 'Login'),
(181, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 16:53:06', 'Login'),
(182, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 56', '2022-05-12 16:53:18', 'Admin Account'),
(183, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 57', '2022-05-12 16:53:20', 'Admin Account'),
(184, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 58', '2022-05-12 16:53:22', 'Admin Account'),
(185, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 59', '2022-05-12 16:53:23', 'Admin Account'),
(186, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 60', '2022-05-12 16:53:25', 'Admin Account'),
(187, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 61', '2022-05-12 16:53:26', 'Admin Account'),
(188, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:41:04', 'Login'),
(189, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:41:08', 'Login'),
(190, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:41:30', 'Admin Account'),
(191, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:41:34', 'Login'),
(192, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 17:41:38', 'Login'),
(193, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 17:43:12', 'Login'),
(194, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:43:16', 'Login'),
(195, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 21', '2022-05-12 17:44:55', 'Admin Account'),
(196, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:45:26', 'Admin Account'),
(197, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 22', '2022-05-12 17:45:33', 'Admin Account'),
(198, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:45:59', 'Login'),
(199, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:46:07', 'Login'),
(200, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:46:20', 'Admin Account'),
(201, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 23', '2022-05-12 17:46:23', 'Admin Account'),
(202, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:47:50', 'Login'),
(203, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:47:59', 'Login'),
(204, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: recamino12@gmail.com', '2022-05-12 17:48:12', 'Admin Account'),
(205, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:48:15', 'Login'),
(206, 'recamino12@gmail.com', 'User Logged In', '2022-05-12 17:48:19', 'Login'),
(207, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:49:38', 'Login'),
(208, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:50:04', 'Admin Account'),
(209, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:50:07', 'Login'),
(210, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 17:50:10', 'Login'),
(211, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:50:54', 'Login'),
(212, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:52:25', 'Login'),
(213, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:52:30', 'Login'),
(214, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:52:43', 'Admin Account'),
(215, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:52:50', 'Login'),
(216, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 17:52:55', 'Login'),
(217, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:53:52', 'Login'),
(218, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 17:54:11', 'Admin Account'),
(219, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:54:16', 'Login'),
(220, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 17:54:21', 'Login'),
(221, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 17:59:01', 'Login'),
(222, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 17:59:11', 'Login'),
(223, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: master@gmail.com', '2022-05-12 17:59:39', 'Employee Account'),
(224, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 17:59:43', 'Login'),
(225, 'master@gmail.com', 'User Logged In', '2022-05-12 17:59:48', 'Login'),
(226, 'master@gmail.com', 'User Logged Out', '2022-05-12 18:01:07', 'Login'),
(227, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 18:02:37', 'Login'),
(228, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 18:02:40', 'Login'),
(229, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 18:03:35', 'Login'),
(230, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 18:03:56', 'Login'),
(231, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 18:04:07', 'Login'),
(232, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 18:04:11', 'Login'),
(233, 'master@gmail.com', 'User Logged In', '2022-05-12 18:04:16', 'Login'),
(234, 'master@gmail.com', 'User Logged Out', '2022-05-12 18:05:01', 'Login'),
(235, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 18:05:04', 'Login'),
(236, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 18:07:00', 'Login'),
(237, 'master@gmail.com', 'User Logged In', '2022-05-12 18:07:04', 'Login'),
(238, 'master@gmail.com', 'User Logged Out', '2022-05-12 18:07:23', 'Login'),
(239, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 18:07:27', 'Login'),
(240, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: rapraplala12@gmail.com', '2022-05-12 18:08:09', 'Admin Account'),
(241, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 18:08:15', 'Login'),
(242, 'master@gmail.com', 'User Logged In', '2022-05-12 18:08:19', 'Login'),
(243, 'master@gmail.com', 'User Logged Out', '2022-05-12 18:09:54', 'Login'),
(244, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 18:10:05', 'Login'),
(245, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 18:39:14', 'Login'),
(246, 'master@gmail.com', 'User Logged In', '2022-05-12 18:39:18', 'Login'),
(247, 'master@gmail.com', 'User Logged Out', '2022-05-12 19:07:55', 'Login'),
(248, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 19:07:59', 'Login'),
(249, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 19:11:45', 'Login'),
(250, 'master@gmail.com', 'User Logged In', '2022-05-12 19:12:00', 'Login'),
(251, 'master@gmail.com', 'User Logged Out', '2022-05-12 19:15:58', 'Login'),
(252, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 19:16:02', 'Login'),
(253, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 19:18:34', 'Login'),
(254, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 19:18:38', 'Login'),
(255, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 19:18:42', 'Login'),
(256, 'master@gmail.com', 'User Logged In', '2022-05-12 19:18:48', 'Login'),
(257, 'master@gmail.com', 'User Logged Out', '2022-05-12 19:19:55', 'Login'),
(258, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 19:46:39', 'Login'),
(259, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 20:33:46', 'Login'),
(260, 'master@gmail.com', 'User Logged In', '2022-05-12 20:33:50', 'Login'),
(261, 'master@gmail.com', 'User Logged Out', '2022-05-12 20:34:24', 'Login'),
(262, 'master@gmail.com', 'User Logged In', '2022-05-12 20:34:48', 'Login'),
(263, 'master@gmail.com', 'User Logged Out', '2022-05-12 20:49:07', 'Login'),
(264, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 20:50:06', 'Login'),
(265, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 20:52:03', 'Login'),
(266, 'masteraffy@gmail.com', 'User Logged In', '2022-05-12 20:56:13', 'Login'),
(267, 'masteraffy@gmail.com', 'User Created an Admin Account: rapraplala12@gmail.com', '2022-05-12 21:00:25', 'Admin Account'),
(268, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-12 21:00:30', 'Login'),
(269, 'rapraplala12@gmail.com', 'User Logged In', '2022-05-12 21:00:37', 'Login'),
(270, 'rapraplala12@gmail.com', 'User Deleted an Admin Account: 27', '2022-05-12 21:00:49', 'Admin Account'),
(271, 'rapraplala12@gmail.com', 'User Logged Out', '2022-05-12 21:01:10', 'Login'),
(272, 'rapraplala12@gmail.com', 'User Logged In', '2022-05-12 21:01:22', 'Login'),
(273, 'rapraplala12@gmail.com', 'User Logged Out', '2022-05-12 21:04:16', 'Login'),
(274, 'rapraplala12@gmail.com', 'User Logged In', '2022-05-12 21:04:29', 'Login'),
(275, 'rapraplala12@gmail.com', 'User Logged Out', '2022-05-12 21:04:54', 'Login'),
(276, 'rapraplala12@gmail.com', 'User Logged In', '2022-05-12 21:05:09', 'Login'),
(277, 'rapraplala12@gmail.com', 'User Created an Admin Account: master@gmail.com', '2022-05-12 21:09:32', 'Admin Account'),
(278, 'rapraplala12@gmail.com', 'User Logged Out', '2022-05-12 21:09:34', 'Login'),
(279, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:15:41', 'Login'),
(280, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-12 21:15:59', 'Admin Account'),
(281, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: rapraplala12@gmail.com', '2022-05-12 21:18:04', 'Admin Account'),
(282, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 1', '2022-05-12 21:22:27', 'Admin Account'),
(283, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: recamino12@gmail.com', '2022-05-12 21:22:35', 'Admin Account'),
(284, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 10', '2022-05-12 21:22:41', 'Admin Account'),
(285, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: dandan@gmail.com', '2022-05-12 21:22:58', 'Admin Account'),
(286, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:23:03', 'Login'),
(287, 'dandan@gmail.com', 'User Logged In', '2022-05-12 21:23:08', 'Login'),
(288, 'dandan@gmail.com', 'User Logged Out', '2022-05-12 21:23:29', 'Login'),
(289, 'dandan@gmail.com', 'User Logged In', '2022-05-12 21:23:34', 'Login'),
(290, 'dandan@gmail.com', 'User Logged Out', '2022-05-12 21:33:14', 'Login'),
(291, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:34:05', 'Login'),
(292, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 8', '2022-05-12 21:34:26', 'Announcement / Events'),
(293, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: alumniasd@gmail.com', '2022-05-12 21:36:23', 'Admin Account'),
(294, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:36:29', 'Login'),
(295, 'alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:36:33', 'Login'),
(296, 'alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:39:30', 'Login'),
(297, 'alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:39:34', 'Login'),
(298, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:44:02', 'Login'),
(299, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:44:52', 'Login'),
(300, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:44:57', 'Login'),
(301, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:52:11', 'Login'),
(302, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:52:22', 'Login'),
(303, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:52:31', 'Login'),
(304, 'alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:52:35', 'Login'),
(305, 'alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:53:13', 'Login'),
(306, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 21:53:45', 'Login'),
(307, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: master@gmail.com', '2022-05-12 21:54:17', 'Employee Account'),
(308, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 21:54:23', 'Login'),
(309, 'master@gmail.com', 'User Logged In', '2022-05-12 21:54:27', 'Login'),
(310, 'master@gmail.com', 'User Logged Out', '2022-05-12 21:58:37', 'Login'),
(311, 'master@gmail.com', 'User Logged In', '2022-05-12 21:58:42', 'Login'),
(312, 'master@gmail.com', 'User Logged Out', '2022-05-12 22:00:25', 'Login'),
(313, 'master@gmail.com', 'User Logged In', '2022-05-12 22:00:31', 'Login'),
(314, 'master@gmail.com', 'User Logged Out', '2022-05-12 22:01:36', 'Login'),
(315, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 22:01:46', 'Login'),
(316, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 22:07:33', 'Login'),
(317, 'master@gmail.com', 'User Logged In', '2022-05-12 22:08:00', 'Login'),
(318, 'master@gmail.com', 'User Logged Out', '2022-05-12 22:33:12', 'Login'),
(319, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 22:33:20', 'Login'),
(320, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 22:34:28', 'Login'),
(321, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 22:34:34', 'Login'),
(322, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 13', '2022-05-12 22:35:23', 'Employee Account'),
(323, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: masterbuffalo@gmail.com', '2022-05-12 22:35:55', 'Employee Account'),
(324, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 22:36:05', 'Login'),
(325, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-12 22:36:16', 'Login'),
(326, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-12 22:40:49', 'Login'),
(327, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 22:40:52', 'Login'),
(328, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-12 23:13:02', 'Branch'),
(329, 'arellano.alumniasd@gmail.com', 'User Deleted Branch', '2022-05-12 23:13:05', 'Branch'),
(330, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-12 23:14:19', 'Branch'),
(331, 'arellano.alumniasd@gmail.com', 'User Deleted Branch', '2022-05-12 23:14:36', 'Branch'),
(332, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-12 23:21:28', 'Branch'),
(333, 'arellano.alumniasd@gmail.com', 'User Deleted Branch', '2022-05-12 23:21:31', 'Branch'),
(334, 'arellano.alumniasd@gmail.com', 'User Created Deparment', '2022-05-12 23:23:51', 'Deparment'),
(335, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-05-12 23:23:54', 'Deparment'),
(336, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-05-12 23:25:53', 'Deparment'),
(337, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-05-12 23:26:11', 'Deparment'),
(338, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-05-12 23:26:19', 'Deparment'),
(339, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-05-12 23:26:22', 'Deparment'),
(340, 'arellano.alumniasd@gmail.com', 'User Created a Course', '2022-05-12 23:26:53', 'Course'),
(341, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-12 23:26:57', 'Course'),
(342, 'arellano.alumniasd@gmail.com', 'User Updated a Course', '2022-05-12 23:27:56', 'Course'),
(343, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: ', '2022-05-12 23:28:18', 'Admin Account'),
(344, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 15', '2022-05-12 23:28:21', 'Admin Account'),
(345, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-12 23:29:38', 'Course'),
(346, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 63', '2022-05-12 23:29:58', 'Admin Account'),
(347, 'arellano.alumniasd@gmail.com', 'User Created an Job Post: 3', '2022-05-12 23:30:42', 'Jobs'),
(348, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 9', '2022-05-12 23:31:31', 'Announcement / Events'),
(349, 'arellano.alumniasd@gmail.com', 'User Created an Job Post: 3', '2022-05-12 23:31:45', 'Jobs'),
(350, 'arellano.alumniasd@gmail.com', 'User Created an Announcement / Events: 3', '2022-05-12 23:32:57', 'Announcement / Events'),
(351, 'arellano.alumniasd@gmail.com', 'User Created an Announcement / Events: 3', '2022-05-12 23:35:28', 'Announcement / Events'),
(352, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 23:37:05', 'Login'),
(353, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-12 23:37:08', 'Login'),
(354, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-12 23:37:25', 'Login'),
(355, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 23:38:02', 'Login'),
(356, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 23:38:41', 'Login'),
(357, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 23:40:24', 'Login'),
(358, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-12 23:40:44', 'Login'),
(359, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-12 23:40:47', 'Login'),
(360, 'arellano.alumniasd@gmail.com', 'User Created an Announcement / Events: 3', '2022-05-13 00:07:30', 'Announcement / Events'),
(361, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-13 00:10:31', 'Login'),
(362, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-13 00:10:37', 'Login'),
(363, 'arellano.alumniasd@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-13 00:10:46', 'Announcement / Events'),
(364, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 8', '2022-05-13 00:11:51', 'Announcement / Events'),
(365, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 11', '2022-05-13 00:11:52', 'Announcement / Events'),
(366, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 12', '2022-05-13 00:11:54', 'Announcement / Events'),
(367, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 13', '2022-05-13 00:11:55', 'Announcement / Events'),
(368, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-13 00:12:35', 'Admin Account'),
(369, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-13 00:12:48', 'Login'),
(370, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-13 00:40:25', 'Login'),
(371, 'arellano.alumniasd@gmail.com', 'User Deleted an Announcement / Events: 15', '2022-05-13 00:42:49', 'Announcement / Events'),
(372, 'arellano.alumniasd@gmail.com', 'User Deleted an Announcement / Events: 16', '2022-05-13 00:43:43', 'Announcement / Events'),
(373, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-13 00:45:31', 'Login'),
(374, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-13 01:51:57', 'Login'),
(375, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 17', '2022-05-13 01:52:07', 'Announcement / Events'),
(376, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 18', '2022-05-13 01:52:10', 'Announcement / Events'),
(377, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 19', '2022-05-13 01:52:13', 'Announcement / Events'),
(378, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 22', '2022-05-13 01:52:14', 'Announcement / Events'),
(379, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-13 02:11:12', 'Login'),
(380, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-13 02:11:16', 'Login'),
(381, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-13 02:12:39', 'Login'),
(382, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-13 11:34:15', 'Login'),
(383, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-13 11:35:39', 'Admin Account'),
(384, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-13 11:35:59', 'Login'),
(385, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-14 00:02:35', 'Login'),
(386, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-14 00:09:20', 'Login'),
(387, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 00:47:37', 'Login'),
(388, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-15 00:48:19', 'Login'),
(389, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 00:58:48', 'Login'),
(390, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-15 00:59:30', 'Login'),
(391, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 01:04:37', 'Login'),
(392, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 68', '2022-05-15 01:04:47', 'Admin Account'),
(393, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-15 01:06:14', 'Login'),
(394, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 01:15:15', 'Login'),
(395, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 23', '2022-05-15 01:15:31', 'Announcement / Events'),
(396, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-15 01:15:51', 'Announcement / Events'),
(397, 'arellano.alumniasd@gmail.com', 'User Deleted an Announcement / Events: 25', '2022-05-15 01:18:30', 'Announcement / Events'),
(398, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 1', '2022-05-15 01:19:08', 'Announcement / Events'),
(399, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 2', '2022-05-15 01:19:50', 'Announcement / Events'),
(400, 'arellano.alumniasd@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-15 01:19:58', 'Announcement / Events'),
(401, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 4', '2022-05-15 01:20:19', 'Announcement / Events'),
(402, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 5', '2022-05-15 01:20:29', 'Announcement / Events'),
(403, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 1', '2022-05-15 01:20:37', 'Announcement / Events'),
(404, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 2', '2022-05-15 01:20:38', 'Announcement / Events'),
(405, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 4', '2022-05-15 01:20:40', 'Announcement / Events'),
(406, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 5', '2022-05-15 01:20:42', 'Announcement / Events'),
(407, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 20:54:42', 'Login'),
(408, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 6', '2022-05-15 20:55:12', 'Announcement / Events'),
(409, 'arellano.alumniasd@gmail.com', 'User Updated an Announcement / Events: 6', '2022-05-15 20:55:39', 'Announcement / Events'),
(410, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 78', '2022-05-15 22:35:05', 'Admin Account'),
(411, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 77', '2022-05-15 22:35:07', 'Admin Account'),
(412, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 76', '2022-05-15 22:35:09', 'Admin Account'),
(413, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 75', '2022-05-15 22:35:11', 'Admin Account'),
(414, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 74', '2022-05-15 22:35:12', 'Admin Account'),
(415, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 73', '2022-05-15 22:35:15', 'Admin Account'),
(416, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 84', '2022-05-15 22:37:18', 'Admin Account'),
(417, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 83', '2022-05-15 22:37:20', 'Admin Account'),
(418, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 82', '2022-05-15 22:37:21', 'Admin Account'),
(419, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 81', '2022-05-15 22:37:23', 'Admin Account'),
(420, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 80', '2022-05-15 22:37:25', 'Admin Account'),
(421, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 79', '2022-05-15 22:37:27', 'Admin Account'),
(422, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 90', '2022-05-15 22:37:56', 'Admin Account'),
(423, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 89', '2022-05-15 22:37:57', 'Admin Account'),
(424, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 88', '2022-05-15 22:37:59', 'Admin Account'),
(425, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 87', '2022-05-15 22:38:00', 'Admin Account'),
(426, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 86', '2022-05-15 22:38:11', 'Admin Account'),
(427, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 85', '2022-05-15 22:38:13', 'Admin Account'),
(428, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-15 22:45:30', 'Login'),
(429, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 22:45:37', 'Login'),
(430, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 96', '2022-05-15 22:59:21', 'Admin Account'),
(431, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 95', '2022-05-15 23:00:24', 'Admin Account'),
(432, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 94', '2022-05-15 23:00:26', 'Admin Account'),
(433, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 93', '2022-05-15 23:00:27', 'Admin Account'),
(434, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 92', '2022-05-15 23:00:29', 'Admin Account'),
(435, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 91', '2022-05-15 23:00:31', 'Admin Account'),
(436, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 72', '2022-05-15 23:00:58', 'Admin Account'),
(437, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 64', '2022-05-15 23:01:00', 'Admin Account'),
(438, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 66', '2022-05-15 23:01:01', 'Admin Account'),
(439, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 102', '2022-05-15 23:02:11', 'Admin Account'),
(440, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 101', '2022-05-15 23:02:12', 'Admin Account'),
(441, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 100', '2022-05-15 23:02:14', 'Admin Account'),
(442, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 99', '2022-05-15 23:02:15', 'Admin Account'),
(443, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 98', '2022-05-15 23:02:16', 'Admin Account'),
(444, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 97', '2022-05-15 23:02:18', 'Admin Account'),
(445, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-15 23:02:55', 'Course'),
(446, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-15 23:02:56', 'Course'),
(447, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-15 23:02:58', 'Course'),
(448, 'arellano.alumniasd@gmail.com', 'User Deleted a Course', '2022-05-15 23:02:59', 'Course'),
(449, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-05-15 23:03:02', 'Deparment'),
(450, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-05-15 23:03:03', 'Deparment'),
(451, 'arellano.alumniasd@gmail.com', 'User Deleted Department', '2022-05-15 23:03:05', 'Deparment'),
(452, 'arellano.alumniasd@gmail.com', 'User Deleted Branch', '2022-05-15 23:03:09', 'Branch'),
(453, 'arellano.alumniasd@gmail.com', 'User Deleted Branch', '2022-05-15 23:03:11', 'Branch'),
(454, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-15 23:03:25', 'Branch'),
(455, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-15 23:03:44', 'Branch'),
(456, 'arellano.alumniasd@gmail.com', 'User Created Branch', '2022-05-15 23:03:55', 'Branch'),
(457, 'arellano.alumniasd@gmail.com', 'User Created Deparment', '2022-05-15 23:04:42', 'Deparment'),
(458, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-05-15 23:04:47', 'Deparment'),
(459, 'arellano.alumniasd@gmail.com', 'User Created Deparment', '2022-05-15 23:05:07', 'Deparment'),
(460, 'arellano.alumniasd@gmail.com', 'User Created Deparment', '2022-05-15 23:05:18', 'Deparment'),
(461, 'arellano.alumniasd@gmail.com', 'User Updated a Deparment', '2022-05-15 23:05:22', 'Deparment'),
(462, 'arellano.alumniasd@gmail.com', 'User Created a Course', '2022-05-15 23:05:54', 'Course'),
(463, 'arellano.alumniasd@gmail.com', 'User Created a Course', '2022-05-15 23:06:18', 'Course'),
(464, 'arellano.alumniasd@gmail.com', 'User Created a Course', '2022-05-15 23:06:36', 'Course'),
(465, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 109', '2022-05-15 23:08:32', 'Admin Account'),
(466, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 108', '2022-05-15 23:08:35', 'Admin Account'),
(467, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 107', '2022-05-15 23:08:37', 'Admin Account'),
(468, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 106', '2022-05-15 23:08:38', 'Admin Account'),
(469, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 105', '2022-05-15 23:08:40', 'Admin Account'),
(470, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 104', '2022-05-15 23:08:42', 'Admin Account'),
(471, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 103', '2022-05-15 23:08:43', 'Admin Account'),
(472, 'arellano.alumniasd@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-15 23:12:58', 'Admin Account'),
(473, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-05-15 23:16:22', 'Employee Account'),
(474, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: masterbuffalo@gmail.com', '2022-05-15 23:16:31', 'Employee Account'),
(475, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-15 23:19:59', 'Employee Account'),
(476, 'arellano.alumniasd@gmail.com', 'User Logged Out', '2022-05-15 23:20:09', 'Login'),
(477, 'recamino12@gmail.com', 'User Logged In', '2022-05-15 23:20:13', 'Login'),
(478, 'recamino12@gmail.com', 'User Logged Out', '2022-05-15 23:20:20', 'Login'),
(479, 'arellano.alumniasd@gmail.com', 'User Logged In', '2022-05-15 23:20:23', 'Login'),
(480, 'arellano.alumniasd@gmail.com', 'User Updated an Employee Account: employee@gmail.com', '2022-05-15 23:23:17', 'Employee Account'),
(481, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: arellano.alumniasd@gmail.com', '2022-05-15 23:26:05', 'Employee Account'),
(482, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 17', '2022-05-15 23:27:12', 'Employee Account'),
(483, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: recamino123@gmail.com', '2022-05-15 23:27:39', 'Employee Account'),
(484, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 18', '2022-05-15 23:28:11', 'Employee Account'),
(485, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: arellano.alumniasd@gmail.com', '2022-05-15 23:28:23', 'Employee Account');
INSERT INTO `logs` (`log_id`, `user`, `movement`, `movement_date`, `log_type`) VALUES
(486, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 19', '2022-05-15 23:30:47', 'Employee Account'),
(487, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: arellano.alumniasd@gmail.com', '2022-05-15 23:30:59', 'Employee Account'),
(488, 'arellano.alumniasd@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-15 23:31:36', 'Employee Account'),
(489, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 21', '2022-05-15 23:32:14', 'Employee Account'),
(490, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 20', '2022-05-15 23:32:16', 'Employee Account'),
(491, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 16', '2022-05-15 23:32:17', 'Employee Account'),
(492, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 12', '2022-05-15 23:36:31', 'Admin Account'),
(493, 'arellano.alumniasd@gmail.com', 'User Updated an Admin Account: arellano.alumniasd@gmail.com', '2022-05-15 23:36:50', 'Admin Account'),
(494, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 11', '2022-05-15 23:39:08', 'Admin Account'),
(495, 'arellano.alumniasd@gmail.com', 'User Deleted an Employee Account Id: 14', '2022-05-15 23:39:16', 'Employee Account'),
(496, 'arellano.alumniasd@gmail.com', 'User Deleted an Alumni Account: 118', '2022-05-15 23:41:03', 'Admin Account'),
(497, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: recamino12@gmail.com', '2022-05-15 23:45:40', 'Admin Account'),
(498, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 22', '2022-05-15 23:45:46', 'Admin Account'),
(499, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-15 23:48:55', 'Admin Account'),
(500, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 23', '2022-05-15 23:51:18', 'Admin Account'),
(501, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-15 23:52:59', 'Admin Account'),
(502, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 24', '2022-05-15 23:53:02', 'Admin Account'),
(503, 'arellano.alumniasd@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-15 23:54:28', 'Admin Account'),
(504, 'arellano.alumniasd@gmail.com', 'User Deleted an Admin Account: 8', '2022-05-15 23:54:30', 'Admin Account'),
(505, 'masteraffy@gmail.com', 'User Logged In', '2022-05-15 23:54:56', 'Login'),
(506, 'masteraffy@gmail.com', 'User Created an Admin Account: recamino12@gmail.com', '2022-05-15 23:55:10', 'Admin Account'),
(507, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 26', '2022-05-15 23:55:23', 'Admin Account'),
(508, 'masteraffy@gmail.com', 'User Created an Admin Account: master@gmail.com', '2022-05-15 23:55:56', 'Admin Account'),
(509, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 27', '2022-05-15 23:56:02', 'Admin Account'),
(510, 'masteraffy@gmail.com', 'User Created an Admin Account: recamino12@gmail.com', '2022-05-15 23:59:49', 'Admin Account'),
(511, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 28', '2022-05-16 00:02:57', 'Admin Account'),
(512, 'masteraffy@gmail.com', 'User Created an Admin Account: arellano.alumniasd@gmail.com', '2022-05-16 00:04:58', 'Admin Account'),
(513, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 29', '2022-05-16 00:05:17', 'Admin Account'),
(514, 'masteraffy@gmail.com', 'User Created an Admin Account: rapraplala12@gmail.com', '2022-05-16 00:09:56', 'Admin Account'),
(515, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 30', '2022-05-16 00:17:45', 'Admin Account'),
(516, 'masteraffy@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-16 00:18:48', 'Admin Account'),
(517, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 31', '2022-05-16 00:18:52', 'Admin Account'),
(518, 'masteraffy@gmail.com', 'User Created an Admin Account: master@gmail.com', '2022-05-16 00:19:51', 'Admin Account'),
(519, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 32', '2022-05-16 00:19:55', 'Admin Account'),
(520, 'masteraffy@gmail.com', 'User Created an Admin Account: recamino123@gmail.com', '2022-05-16 00:20:41', 'Admin Account'),
(521, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 33', '2022-05-16 00:20:46', 'Admin Account'),
(522, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 9', '2022-05-16 00:20:58', 'Employee Account'),
(523, 'masteraffy@gmail.com', 'User Created an Employee Account: arellano.alumniasd@gmail.com', '2022-05-16 00:24:07', 'Employee Account'),
(524, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 34', '2022-05-16 00:24:15', 'Employee Account'),
(525, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-16 00:26:18', 'Employee Account'),
(526, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 35', '2022-05-16 00:26:26', 'Employee Account'),
(527, 'masteraffy@gmail.com', 'User Created an Employee Account: master@gmail.com', '2022-05-16 00:28:11', 'Employee Account'),
(528, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 36', '2022-05-16 00:28:16', 'Employee Account'),
(529, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-16 00:30:14', 'Employee Account'),
(530, 'masteraffy@gmail.com', 'User Created an Employee Account: ', '2022-05-16 00:34:38', 'Employee Account'),
(531, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 38', '2022-05-16 00:34:41', 'Employee Account'),
(532, 'masteraffy@gmail.com', 'User Created an Employee Account: ', '2022-05-16 00:34:43', 'Employee Account'),
(533, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 39', '2022-05-16 00:34:46', 'Employee Account'),
(534, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-16 01:09:17', 'Employee Account'),
(535, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 40', '2022-05-16 01:09:24', 'Employee Account'),
(536, 'masteraffy@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-16 01:09:54', 'Admin Account'),
(537, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 41', '2022-05-16 01:09:57', 'Admin Account'),
(538, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-16 01:13:05', 'Login'),
(539, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 01:13:14', 'Login'),
(540, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 37', '2022-05-16 01:19:53', 'Employee Account'),
(541, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 119', '2022-05-16 02:19:15', 'Admin Account'),
(542, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 110', '2022-05-16 02:19:17', 'Admin Account'),
(543, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 111', '2022-05-16 02:19:19', 'Admin Account'),
(544, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 112', '2022-05-16 02:19:20', 'Admin Account'),
(545, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 113', '2022-05-16 02:19:21', 'Admin Account'),
(546, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 114', '2022-05-16 02:19:23', 'Admin Account'),
(547, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 115', '2022-05-16 02:19:25', 'Admin Account'),
(548, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 116', '2022-05-16 02:19:26', 'Admin Account'),
(549, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 137', '2022-05-16 02:19:28', 'Admin Account'),
(550, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 117', '2022-05-16 02:19:30', 'Admin Account'),
(551, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 120', '2022-05-16 02:19:31', 'Admin Account'),
(552, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 121', '2022-05-16 02:19:33', 'Admin Account'),
(553, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 122', '2022-05-16 02:19:34', 'Admin Account'),
(554, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 123', '2022-05-16 02:19:37', 'Admin Account'),
(555, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 150', '2022-05-16 02:22:20', 'Admin Account'),
(556, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 149', '2022-05-16 02:22:22', 'Admin Account'),
(557, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 148', '2022-05-16 02:22:23', 'Admin Account'),
(558, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 147', '2022-05-16 02:22:24', 'Admin Account'),
(559, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 146', '2022-05-16 02:22:26', 'Admin Account'),
(560, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 145', '2022-05-16 02:22:27', 'Admin Account'),
(561, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 144', '2022-05-16 02:22:29', 'Admin Account'),
(562, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-16 09:36:30', 'Login'),
(563, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 09:36:44', 'Login'),
(564, 'masteraffy@gmail.com', 'User Created an Employee Account: masterbuffalo@gmail.com', '2022-05-16 09:37:08', 'Employee Account'),
(565, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-16 09:37:24', 'Login'),
(566, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-16 09:37:29', 'Login'),
(567, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-16 09:37:56', 'Login'),
(568, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-16 09:38:09', 'Login'),
(569, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-16 09:46:05', 'Login'),
(570, 'masterbuffalo@gmail.com', 'User Logged In', '2022-05-16 09:46:18', 'Login'),
(571, 'masterbuffalo@gmail.com', 'User Logged Out', '2022-05-16 09:46:29', 'Login'),
(572, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 09:47:02', 'Login'),
(573, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 21:26:52', 'Login'),
(574, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-16 21:27:45', 'Admin Account'),
(575, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-16 21:28:05', 'Login'),
(576, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 22:15:26', 'Login'),
(577, 'masteraffy@gmail.com', 'User Logged In', '2022-05-16 23:41:47', 'Login'),
(578, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 7', '2022-05-16 23:44:26', 'Announcement / Events'),
(579, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 8', '2022-05-16 23:45:10', 'Announcement / Events'),
(580, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 9', '2022-05-16 23:45:14', 'Announcement / Events'),
(581, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 00:08:39', 'Announcement / Events'),
(582, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 7', '2022-05-17 01:07:07', 'Announcement / Events'),
(583, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 10', '2022-05-17 01:47:25', 'Announcement / Events'),
(584, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 01:47:31', 'Announcement / Events'),
(585, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 11:38:14', 'Login'),
(586, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:38:29', 'Announcement / Events'),
(587, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:38:45', 'Announcement / Events'),
(588, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:38:54', 'Announcement / Events'),
(589, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:38:59', 'Announcement / Events'),
(590, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:39:02', 'Announcement / Events'),
(591, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:39:09', 'Announcement / Events'),
(592, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-17 11:41:57', 'Login'),
(593, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 11:42:01', 'Login'),
(594, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:42:07', 'Announcement / Events'),
(595, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 11', '2022-05-17 11:42:17', 'Announcement / Events'),
(596, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:42:41', 'Announcement / Events'),
(597, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: ', '2022-05-17 11:45:35', 'Announcement / Events'),
(598, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: ', '2022-05-17 11:48:43', 'Announcement / Events'),
(599, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:51:18', 'Announcement / Events'),
(600, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:51:22', 'Announcement / Events'),
(601, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:51:28', 'Announcement / Events'),
(602, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 3', '2022-05-17 11:51:36', 'Announcement / Events'),
(603, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 171', '2022-05-17 11:52:28', 'Announcement / Events'),
(604, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 171', '2022-05-17 11:52:36', 'Announcement / Events'),
(605, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 16', '2022-05-17 11:52:42', 'Announcement / Events'),
(606, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 12', '2022-05-17 11:52:54', 'Announcement / Events'),
(607, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 170', '2022-05-17 11:54:31', 'Admin Account'),
(608, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 171', '2022-05-17 11:54:35', 'Admin Account'),
(609, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:54:59', 'Announcement / Events'),
(610, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: ', '2022-05-17 11:55:05', 'Announcement / Events'),
(611, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: ', '2022-05-17 11:55:08', 'Announcement / Events'),
(612, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 159', '2022-05-17 11:55:56', 'Admin Account'),
(613, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 151', '2022-05-17 11:55:58', 'Admin Account'),
(614, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 152', '2022-05-17 11:55:59', 'Admin Account'),
(615, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 153', '2022-05-17 11:56:01', 'Admin Account'),
(616, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 154', '2022-05-17 11:56:02', 'Admin Account'),
(617, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 155', '2022-05-17 11:56:04', 'Admin Account'),
(618, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 156', '2022-05-17 11:56:06', 'Admin Account'),
(619, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 157', '2022-05-17 11:56:08', 'Admin Account'),
(620, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 168', '2022-05-17 11:56:10', 'Admin Account'),
(621, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 169', '2022-05-17 11:56:11', 'Admin Account'),
(622, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 158', '2022-05-17 11:56:13', 'Admin Account'),
(623, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 160', '2022-05-17 11:56:15', 'Admin Account'),
(624, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 161', '2022-05-17 11:56:17', 'Admin Account'),
(625, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 162', '2022-05-17 11:56:18', 'Admin Account'),
(626, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 163', '2022-05-17 11:56:20', 'Admin Account'),
(627, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 164', '2022-05-17 11:56:22', 'Admin Account'),
(628, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 165', '2022-05-17 11:56:23', 'Admin Account'),
(629, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 166', '2022-05-17 11:56:25', 'Admin Account'),
(630, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 167', '2022-05-17 11:56:29', 'Admin Account'),
(631, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-17 11:57:21', 'Admin Account'),
(632, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 11', '2022-05-17 11:59:11', 'Announcement / Events'),
(633, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 9', '2022-05-17 11:59:13', 'Announcement / Events'),
(634, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 8', '2022-05-17 11:59:15', 'Announcement / Events'),
(635, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:23', 'Announcement / Events'),
(636, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:24', 'Announcement / Events'),
(637, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:26', 'Announcement / Events'),
(638, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:28', 'Announcement / Events'),
(639, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:30', 'Announcement / Events'),
(640, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:31', 'Announcement / Events'),
(641, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:33', 'Announcement / Events'),
(642, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:35', 'Announcement / Events'),
(643, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:36', 'Announcement / Events'),
(644, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 3', '2022-05-17 11:59:38', 'Announcement / Events'),
(645, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 172', '2022-05-17 12:00:31', 'Announcement / Events'),
(646, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:01:42', 'Announcement / Events'),
(647, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:01:54', 'Announcement / Events'),
(648, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 25', '2022-05-17 12:03:04', 'Announcement / Events'),
(649, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:03:11', 'Announcement / Events'),
(650, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:03:18', 'Announcement / Events'),
(651, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:03:20', 'Announcement / Events'),
(652, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:03:22', 'Announcement / Events'),
(653, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:03:25', 'Announcement / Events'),
(654, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:03:38', 'Announcement / Events'),
(655, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:04:03', 'Announcement / Events'),
(656, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 25', '2022-05-17 12:04:09', 'Announcement / Events'),
(657, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:04:15', 'Announcement / Events'),
(658, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:04:20', 'Announcement / Events'),
(659, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 25', '2022-05-17 12:04:23', 'Announcement / Events'),
(660, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:05:15', 'Announcement / Events'),
(661, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:05:22', 'Announcement / Events'),
(662, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:05:25', 'Announcement / Events'),
(663, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:05:27', 'Announcement / Events'),
(664, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:05:30', 'Announcement / Events'),
(665, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:05:33', 'Announcement / Events'),
(666, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:06:14', 'Announcement / Events'),
(667, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:06:17', 'Announcement / Events'),
(668, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:06:19', 'Announcement / Events'),
(669, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:06:21', 'Announcement / Events'),
(670, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:06:24', 'Announcement / Events'),
(671, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:06:26', 'Announcement / Events'),
(672, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:07:13', 'Announcement / Events'),
(673, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:07:20', 'Announcement / Events'),
(674, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:07:23', 'Announcement / Events'),
(675, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: ', '2022-05-17 12:08:39', 'Announcement / Events'),
(676, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: ', '2022-05-17 12:08:41', 'Announcement / Events'),
(677, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: ', '2022-05-17 12:08:44', 'Announcement / Events'),
(678, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: ', '2022-05-17 12:08:46', 'Announcement / Events'),
(679, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: ', '2022-05-17 12:08:49', 'Announcement / Events'),
(680, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: ', '2022-05-17 12:08:54', 'Announcement / Events'),
(681, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 26', '2022-05-17 12:27:02', 'Announcement / Events'),
(682, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 27', '2022-05-17 12:29:44', 'Announcement / Events'),
(683, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 28', '2022-05-17 12:31:25', 'Announcement / Events'),
(684, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 29', '2022-05-17 12:34:11', 'Announcement / Events'),
(685, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 30', '2022-05-17 12:35:50', 'Announcement / Events'),
(686, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:36:31', 'Announcement / Events'),
(687, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:36:34', 'Announcement / Events'),
(688, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:36:40', 'Announcement / Events'),
(689, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 31', '2022-05-17 12:37:29', 'Announcement / Events'),
(690, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:38:11', 'Announcement / Events'),
(691, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:38:15', 'Announcement / Events'),
(692, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 31', '2022-05-17 12:38:24', 'Announcement / Events'),
(693, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:38:30', 'Announcement / Events'),
(694, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:38:40', 'Announcement / Events'),
(695, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:40:36', 'Announcement / Events'),
(696, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 25', '2022-05-17 12:40:46', 'Announcement / Events'),
(697, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:41:29', 'Announcement / Events'),
(698, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 12:41:38', 'Announcement / Events'),
(699, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 12:42:20', 'Announcement / Events'),
(700, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 12:45:57', 'Login'),
(701, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 13:25:02', 'Login'),
(702, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 13:25:53', 'Announcement / Events'),
(703, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 13:25:57', 'Announcement / Events'),
(704, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 24', '2022-05-17 13:26:02', 'Announcement / Events'),
(705, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 26', '2022-05-17 13:26:09', 'Announcement / Events'),
(706, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 15:09:17', 'Login'),
(707, 'masteraffy@gmail.com', 'User Deleted an Announcement / Events: 32', '2022-05-17 17:04:30', 'Announcement / Events'),
(708, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 24', '2022-05-17 17:04:36', 'Announcement / Events'),
(709, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 25', '2022-05-17 17:05:50', 'Announcement / Events'),
(710, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 183', '2022-05-17 17:49:52', 'Admin Account'),
(711, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 174', '2022-05-17 17:52:53', 'Admin Account'),
(712, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 182', '2022-05-17 17:52:58', 'Admin Account'),
(713, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 20:09:46', 'Login'),
(714, 'masteraffy@gmail.com', 'User Logged In', '2022-05-17 22:48:57', 'Login'),
(715, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 175', '2022-05-18 02:31:31', 'Admin Account'),
(716, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 184', '2022-05-18 02:31:33', 'Admin Account'),
(717, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 185', '2022-05-18 02:31:35', 'Admin Account'),
(718, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 186', '2022-05-18 02:31:36', 'Admin Account'),
(719, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 187', '2022-05-18 02:31:39', 'Admin Account'),
(720, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 188', '2022-05-18 02:31:41', 'Admin Account'),
(721, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 189', '2022-05-18 02:31:43', 'Admin Account'),
(722, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 190', '2022-05-18 02:31:45', 'Admin Account'),
(723, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 191', '2022-05-18 02:41:26', 'Admin Account'),
(724, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 192', '2022-05-18 02:41:28', 'Admin Account'),
(725, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 193', '2022-05-18 02:41:29', 'Admin Account'),
(726, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 194', '2022-05-18 02:41:32', 'Admin Account'),
(727, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 195', '2022-05-18 02:41:34', 'Admin Account'),
(728, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 196', '2022-05-18 02:41:35', 'Admin Account'),
(729, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 197', '2022-05-18 02:41:55', 'Admin Account'),
(730, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 198', '2022-05-18 02:41:56', 'Admin Account'),
(731, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 199', '2022-05-18 02:43:37', 'Admin Account'),
(732, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 200', '2022-05-18 02:43:39', 'Admin Account'),
(733, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 201', '2022-05-18 02:48:20', 'Admin Account'),
(734, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 202', '2022-05-18 02:48:21', 'Admin Account'),
(735, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 203', '2022-05-18 02:49:21', 'Admin Account'),
(736, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 204', '2022-05-18 02:49:24', 'Admin Account'),
(737, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 205', '2022-05-18 03:13:26', 'Admin Account'),
(738, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 206', '2022-05-18 03:13:28', 'Admin Account'),
(739, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 207', '2022-05-18 03:13:29', 'Admin Account'),
(740, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 208', '2022-05-18 03:13:30', 'Admin Account'),
(741, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 209', '2022-05-18 03:13:32', 'Admin Account'),
(742, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 210', '2022-05-18 03:13:34', 'Admin Account'),
(743, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 212', '2022-05-18 03:16:24', 'Admin Account'),
(744, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 213', '2022-05-18 03:16:26', 'Admin Account'),
(745, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 214', '2022-05-18 03:16:27', 'Admin Account'),
(746, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 215', '2022-05-18 03:16:29', 'Admin Account'),
(747, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 216', '2022-05-18 03:16:31', 'Admin Account'),
(748, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 211', '2022-05-18 03:16:33', 'Admin Account'),
(749, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 218', '2022-05-18 03:21:43', 'Admin Account'),
(750, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 219', '2022-05-18 03:21:44', 'Admin Account'),
(751, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 220', '2022-05-18 03:21:46', 'Admin Account'),
(752, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 221', '2022-05-18 03:21:47', 'Admin Account'),
(753, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 222', '2022-05-18 03:21:49', 'Admin Account'),
(754, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 217', '2022-05-18 03:21:52', 'Admin Account'),
(755, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-18 03:29:06', 'Announcement / Events'),
(756, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 33', '2022-05-18 03:33:04', 'Announcement / Events'),
(757, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-18 03:33:15', 'Announcement / Events'),
(758, 'masteraffy@gmail.com', 'User Logged In', '2022-05-18 11:52:57', 'Login'),
(759, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 223', '2022-05-18 12:33:08', 'Admin Account'),
(760, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 228', '2022-05-18 12:33:40', 'Admin Account'),
(761, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 227', '2022-05-18 12:33:40', 'Admin Account'),
(762, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-18 13:31:32', 'Login'),
(763, 'masteraffy@gmail.com', 'User Logged In', '2022-05-18 13:31:42', 'Login'),
(764, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 231', '2022-05-18 13:36:11', 'Announcement / Events'),
(765, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 230', '2022-05-18 13:36:11', 'Announcement / Events'),
(766, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 229', '2022-05-18 13:40:47', 'Announcement / Events'),
(767, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 248', '2022-05-18 13:42:41', 'Announcement / Events'),
(768, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 247', '2022-05-18 13:54:05', 'Announcement / Events'),
(769, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 246', '2022-05-18 13:58:05', 'Announcement / Events'),
(770, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 245', '2022-05-18 13:58:20', 'Announcement / Events'),
(771, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 244', '2022-05-18 13:58:59', 'Announcement / Events'),
(772, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 243', '2022-05-18 13:59:19', 'Announcement / Events'),
(773, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 242', '2022-05-18 13:59:19', 'Announcement / Events'),
(774, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 241', '2022-05-18 13:59:39', 'Announcement / Events'),
(775, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 240', '2022-05-18 13:59:39', 'Announcement / Events'),
(776, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 239', '2022-05-18 13:59:39', 'Announcement / Events'),
(777, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 258', '2022-05-18 14:00:56', 'Announcement / Events'),
(778, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 257', '2022-05-18 14:02:39', 'Announcement / Events'),
(779, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 256', '2022-05-18 14:02:42', 'Announcement / Events'),
(780, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 255', '2022-05-18 14:02:42', 'Announcement / Events'),
(781, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 254', '2022-05-18 14:03:05', 'Announcement / Events'),
(782, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 253', '2022-05-18 14:03:05', 'Announcement / Events'),
(783, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 252', '2022-05-18 14:03:05', 'Announcement / Events'),
(784, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 251', '2022-05-18 14:03:05', 'Announcement / Events'),
(785, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 250', '2022-05-18 14:03:17', 'Announcement / Events'),
(786, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 249', '2022-05-18 14:03:17', 'Announcement / Events'),
(787, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 268', '2022-05-18 14:05:54', 'Announcement / Events'),
(788, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 267', '2022-05-18 14:05:54', 'Announcement / Events'),
(789, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 266', '2022-05-18 14:05:59', 'Announcement / Events'),
(790, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 265', '2022-05-18 14:05:59', 'Announcement / Events'),
(791, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 264', '2022-05-18 14:05:59', 'Announcement / Events'),
(792, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 263', '2022-05-18 14:06:10', 'Announcement / Events'),
(793, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 262', '2022-05-18 14:06:11', 'Announcement / Events'),
(794, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 261', '2022-05-18 14:06:11', 'Announcement / Events'),
(795, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 260', '2022-05-18 14:06:11', 'Announcement / Events'),
(796, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 259', '2022-05-18 14:06:11', 'Announcement / Events'),
(797, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 278', '2022-05-18 14:07:09', 'Announcement / Events'),
(798, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 277', '2022-05-18 14:07:09', 'Announcement / Events'),
(799, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 276', '2022-05-18 14:07:09', 'Announcement / Events'),
(800, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 275', '2022-05-18 14:07:09', 'Announcement / Events'),
(801, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 274', '2022-05-18 14:07:09', 'Announcement / Events'),
(802, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 273', '2022-05-18 14:07:09', 'Announcement / Events'),
(803, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 272', '2022-05-18 14:07:09', 'Announcement / Events'),
(804, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 271', '2022-05-18 14:07:09', 'Announcement / Events'),
(805, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 270', '2022-05-18 14:07:09', 'Announcement / Events'),
(806, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 269', '2022-05-18 14:07:09', 'Announcement / Events'),
(807, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 288', '2022-05-18 14:08:34', 'Announcement / Events'),
(808, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 287', '2022-05-18 14:08:34', 'Announcement / Events'),
(809, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 286', '2022-05-18 14:08:34', 'Announcement / Events'),
(810, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 285', '2022-05-18 14:08:34', 'Announcement / Events'),
(811, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 284', '2022-05-18 14:08:34', 'Announcement / Events'),
(812, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 283', '2022-05-18 14:08:34', 'Announcement / Events'),
(813, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 282', '2022-05-18 14:08:34', 'Announcement / Events'),
(814, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 281', '2022-05-18 14:08:34', 'Announcement / Events'),
(815, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 280', '2022-05-18 14:08:39', 'Announcement / Events'),
(816, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 279', '2022-05-18 14:08:39', 'Announcement / Events'),
(817, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 298', '2022-05-18 14:10:59', 'Announcement / Events'),
(818, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 297', '2022-05-18 14:14:50', 'Announcement / Events'),
(819, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 296', '2022-05-18 14:15:19', 'Announcement / Events'),
(820, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 295', '2022-05-18 14:15:28', 'Announcement / Events'),
(821, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 294', '2022-05-18 14:16:10', 'Announcement / Events'),
(822, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 293', '2022-05-18 14:16:14', 'Announcement / Events'),
(823, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 292', '2022-05-18 14:17:50', 'Announcement / Events'),
(824, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 291', '2022-05-18 14:18:04', 'Announcement / Events'),
(825, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 290', '2022-05-18 14:18:16', 'Announcement / Events'),
(826, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 289', '2022-05-18 14:21:08', 'Announcement / Events'),
(827, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 308', '2022-05-18 14:24:33', 'Announcement / Events'),
(828, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 307', '2022-05-18 14:24:33', 'Announcement / Events'),
(829, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 306', '2022-05-18 14:24:40', 'Announcement / Events'),
(830, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 305', '2022-05-18 14:24:40', 'Announcement / Events'),
(831, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 304', '2022-05-18 14:34:20', 'Announcement / Events'),
(832, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 303', '2022-05-18 14:34:23', 'Announcement / Events'),
(833, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 302', '2022-05-18 14:34:37', 'Announcement / Events'),
(834, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 301', '2022-05-18 14:34:40', 'Announcement / Events'),
(835, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 300', '2022-05-18 14:35:02', 'Announcement / Events'),
(836, 'masteraffy@gmail.com', 'User Logged In', '2022-05-18 14:37:48', 'Login'),
(837, 'masteraffy@gmail.com', 'User Logged In', '2022-05-18 15:18:46', 'Login'),
(838, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 299', '2022-05-18 15:22:26', 'Announcement / Events'),
(839, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 318', '2022-05-18 15:23:19', 'Announcement / Events'),
(840, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 317', '2022-05-18 15:23:19', 'Announcement / Events'),
(841, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 316', '2022-05-18 15:23:19', 'Announcement / Events'),
(842, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 315', '2022-05-18 15:23:19', 'Announcement / Events'),
(843, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 314', '2022-05-18 15:30:29', 'Announcement / Events'),
(844, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 313', '2022-05-18 15:30:29', 'Announcement / Events'),
(845, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 312', '2022-05-18 15:30:29', 'Announcement / Events'),
(846, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 311', '2022-05-18 15:55:52', 'Announcement / Events'),
(847, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 310', '2022-05-18 15:56:10', 'Announcement / Events'),
(848, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 309', '2022-05-18 15:56:10', 'Announcement / Events'),
(849, 'masteraffy@gmail.com', 'User Logged In', '2022-05-18 18:38:23', 'Login'),
(850, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 328', '2022-05-18 18:44:41', 'Announcement / Events'),
(851, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 327', '2022-05-18 18:44:41', 'Announcement / Events'),
(852, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 326', '2022-05-18 18:44:41', 'Announcement / Events'),
(853, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 325', '2022-05-18 18:44:41', 'Announcement / Events'),
(854, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 324', '2022-05-18 18:44:41', 'Announcement / Events'),
(855, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 323', '2022-05-19 00:23:47', 'Announcement / Events'),
(856, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 322', '2022-05-19 00:23:47', 'Announcement / Events'),
(857, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 321', '2022-05-19 00:23:48', 'Announcement / Events'),
(858, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 320', '2022-05-19 00:23:48', 'Announcement / Events'),
(859, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 319', '2022-05-19 00:23:48', 'Announcement / Events'),
(860, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 173', '2022-05-19 00:23:48', 'Announcement / Events'),
(861, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 172', '2022-05-19 00:23:48', 'Announcement / Events'),
(862, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 34', '2022-05-19 00:23:57', 'Announcement / Events'),
(863, 'masteraffy@gmail.com', 'User Created Branch', '2022-05-19 00:26:21', 'Branch'),
(864, 'masteraffy@gmail.com', 'User Deleted Branch', '2022-05-19 00:28:18', 'Branch'),
(865, 'masteraffy@gmail.com', 'User Created Branch', '2022-05-19 00:28:48', 'Branch'),
(866, 'masteraffy@gmail.com', 'User Created Branch', '2022-05-19 00:28:59', 'Branch'),
(867, 'masteraffy@gmail.com', 'User Created Deparment', '2022-05-19 00:30:00', 'Deparment'),
(868, 'masteraffy@gmail.com', 'User Created Deparment', '2022-05-19 00:30:12', 'Deparment'),
(869, 'masteraffy@gmail.com', 'User Created a Course', '2022-05-19 00:55:20', 'Course'),
(870, 'masteraffy@gmail.com', 'User Created a Course', '2022-05-19 00:55:39', 'Course'),
(871, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 10', '2022-05-19 01:06:53', 'Announcement / Events'),
(872, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 9', '2022-05-19 01:06:53', 'Announcement / Events'),
(873, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 8', '2022-05-19 01:06:53', 'Announcement / Events'),
(874, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 7', '2022-05-19 01:06:53', 'Announcement / Events'),
(875, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 6', '2022-05-19 01:06:53', 'Announcement / Events'),
(876, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 5', '2022-05-19 01:06:53', 'Announcement / Events'),
(877, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 4', '2022-05-19 01:06:53', 'Announcement / Events'),
(878, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 3', '2022-05-19 01:06:53', 'Announcement / Events'),
(879, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 2', '2022-05-19 01:06:53', 'Announcement / Events'),
(880, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 1', '2022-05-19 01:06:53', 'Announcement / Events'),
(881, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 13', '2022-05-19 03:05:59', 'Admin Account'),
(882, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 12', '2022-05-19 03:06:30', 'Announcement / Events'),
(883, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 17', '2022-05-19 03:06:30', 'Announcement / Events'),
(884, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 16', '2022-05-19 03:06:30', 'Announcement / Events'),
(885, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 15', '2022-05-19 03:06:30', 'Announcement / Events'),
(886, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 14', '2022-05-19 03:06:30', 'Announcement / Events'),
(887, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 18', '2022-05-19 03:10:20', 'Admin Account'),
(888, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 27', '2022-05-19 03:10:54', 'Announcement / Events'),
(889, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 26', '2022-05-19 03:10:54', 'Announcement / Events'),
(890, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 25', '2022-05-19 03:10:54', 'Announcement / Events'),
(891, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 24', '2022-05-19 03:10:54', 'Announcement / Events'),
(892, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 23', '2022-05-19 03:10:54', 'Announcement / Events'),
(893, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 22', '2022-05-19 03:10:54', 'Announcement / Events'),
(894, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 21', '2022-05-19 03:10:54', 'Announcement / Events'),
(895, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 20', '2022-05-19 03:10:54', 'Announcement / Events'),
(896, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 19', '2022-05-19 03:10:54', 'Announcement / Events'),
(897, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 37', '2022-05-19 03:11:51', 'Announcement / Events'),
(898, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 36', '2022-05-19 03:11:51', 'Announcement / Events'),
(899, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 35', '2022-05-19 03:11:51', 'Announcement / Events'),
(900, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 34', '2022-05-19 03:11:51', 'Announcement / Events'),
(901, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 33', '2022-05-19 03:11:51', 'Announcement / Events'),
(902, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 32', '2022-05-19 03:11:51', 'Announcement / Events'),
(903, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 31', '2022-05-19 03:11:51', 'Announcement / Events'),
(904, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 30', '2022-05-19 03:11:51', 'Announcement / Events'),
(905, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 29', '2022-05-19 03:11:51', 'Announcement / Events'),
(906, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 28', '2022-05-19 03:11:51', 'Announcement / Events'),
(907, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 44', '2022-05-19 03:22:22', 'Announcement / Events'),
(908, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 43', '2022-05-19 03:22:22', 'Announcement / Events'),
(909, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 42', '2022-05-19 03:22:22', 'Announcement / Events'),
(910, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 41', '2022-05-19 03:22:22', 'Announcement / Events'),
(911, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 40', '2022-05-19 03:22:22', 'Announcement / Events'),
(912, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 39', '2022-05-19 03:22:22', 'Announcement / Events'),
(913, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 38', '2022-05-19 03:22:22', 'Announcement / Events'),
(914, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 51', '2022-05-19 03:32:25', 'Announcement / Events'),
(915, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 50', '2022-05-19 03:32:25', 'Announcement / Events'),
(916, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 49', '2022-05-19 03:32:25', 'Announcement / Events'),
(917, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 48', '2022-05-19 03:32:25', 'Announcement / Events'),
(918, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 47', '2022-05-19 03:32:25', 'Announcement / Events'),
(919, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 46', '2022-05-19 03:32:25', 'Announcement / Events'),
(920, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 45', '2022-05-19 03:32:25', 'Announcement / Events'),
(921, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 58', '2022-05-19 03:45:36', 'Announcement / Events'),
(922, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 57', '2022-05-19 03:45:36', 'Announcement / Events');
INSERT INTO `logs` (`log_id`, `user`, `movement`, `movement_date`, `log_type`) VALUES
(923, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 56', '2022-05-19 03:45:36', 'Announcement / Events'),
(924, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 55', '2022-05-19 03:45:36', 'Announcement / Events'),
(925, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 54', '2022-05-19 03:45:36', 'Announcement / Events'),
(926, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 53', '2022-05-19 03:45:36', 'Announcement / Events'),
(927, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 52', '2022-05-19 03:45:36', 'Announcement / Events'),
(928, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 65', '2022-05-19 03:51:38', 'Announcement / Events'),
(929, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 64', '2022-05-19 03:51:38', 'Announcement / Events'),
(930, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 63', '2022-05-19 03:51:38', 'Announcement / Events'),
(931, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 62', '2022-05-19 03:51:38', 'Announcement / Events'),
(932, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 61', '2022-05-19 03:51:38', 'Announcement / Events'),
(933, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 60', '2022-05-19 03:51:38', 'Announcement / Events'),
(934, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 59', '2022-05-19 03:51:38', 'Announcement / Events'),
(935, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 66', '2022-05-19 03:53:39', 'Announcement / Events'),
(936, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 03:56:59', 'Admin Account'),
(937, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 03:59:50', 'Admin Account'),
(938, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 04:02:00', 'Admin Account'),
(939, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 18:57:48', 'Login'),
(940, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 75', '2022-05-19 19:05:45', 'Announcement / Events'),
(941, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 81', '2022-05-19 21:48:54', 'Announcement / Events'),
(942, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 74', '2022-05-19 21:48:54', 'Announcement / Events'),
(943, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 73', '2022-05-19 21:48:54', 'Announcement / Events'),
(944, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 72', '2022-05-19 21:48:54', 'Announcement / Events'),
(945, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 71', '2022-05-19 21:48:54', 'Announcement / Events'),
(946, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 70', '2022-05-19 21:48:54', 'Announcement / Events'),
(947, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 69', '2022-05-19 21:48:54', 'Announcement / Events'),
(948, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 68', '2022-05-19 21:48:54', 'Announcement / Events'),
(949, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 67', '2022-05-19 21:48:54', 'Announcement / Events'),
(950, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 80', '2022-05-19 21:48:54', 'Announcement / Events'),
(951, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 91', '2022-05-19 21:49:57', 'Announcement / Events'),
(952, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 90', '2022-05-19 21:49:57', 'Announcement / Events'),
(953, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 89', '2022-05-19 21:49:57', 'Announcement / Events'),
(954, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 88', '2022-05-19 21:49:57', 'Announcement / Events'),
(955, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 87', '2022-05-19 21:49:57', 'Announcement / Events'),
(956, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 86', '2022-05-19 21:49:57', 'Announcement / Events'),
(957, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 85', '2022-05-19 21:49:57', 'Announcement / Events'),
(958, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 84', '2022-05-19 21:49:57', 'Announcement / Events'),
(959, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 83', '2022-05-19 21:49:57', 'Announcement / Events'),
(960, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 82', '2022-05-19 21:49:57', 'Announcement / Events'),
(961, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 22:22:28', 'Admin Account'),
(962, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 22:28:56', 'Login'),
(963, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-19 22:43:19', 'Login'),
(964, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 22:43:23', 'Login'),
(965, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 22:48:39', 'Login'),
(966, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 1', '2022-05-19 22:53:01', 'Admin Account'),
(967, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 11', '2022-05-19 22:59:36', 'Admin Account'),
(968, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 23:00:15', 'Admin Account'),
(969, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-19 23:01:55', 'Login'),
(970, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 23:23:52', 'Login'),
(971, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 12', '2022-05-19 23:31:43', 'Admin Account'),
(972, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-19 23:32:40', 'Admin Account'),
(973, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-19 23:36:04', 'Login'),
(974, 'masteraffy@gmail.com', 'User Logged In', '2022-05-19 23:38:28', 'Login'),
(975, 'masteraffy@gmail.com', 'User Created an Admin Account: masteraffy@gmail.com', '2022-05-19 23:38:51', 'Admin Account'),
(976, 'masteraffy@gmail.com', 'User Deleted an Admin Account: 43', '2022-05-19 23:38:56', 'Admin Account'),
(977, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-20 00:19:20', 'Employee Account'),
(978, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 9', '2022-05-20 00:31:19', 'Admin Account'),
(979, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 10', '2022-05-20 00:31:21', 'Admin Account'),
(980, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 14', '2022-05-20 00:37:41', 'Admin Account'),
(981, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-20 00:40:34', 'Admin Account'),
(982, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 16', '2022-05-20 00:43:17', 'Admin Account'),
(983, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-20 00:46:23', 'Admin Account'),
(984, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 1', '2022-05-20 00:48:08', 'Admin Account'),
(985, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-20 00:50:58', 'Admin Account'),
(986, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 2', '2022-05-20 00:51:52', 'Admin Account'),
(987, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-20 00:58:49', 'Admin Account'),
(988, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 35', '2022-05-20 01:01:05', 'Announcement / Events'),
(989, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 13', '2022-05-20 01:30:23', 'Admin Account'),
(990, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:40', 'Announcement / Events'),
(991, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:40', 'Announcement / Events'),
(992, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:40', 'Announcement / Events'),
(993, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:51', 'Announcement / Events'),
(994, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:51', 'Announcement / Events'),
(995, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:51', 'Announcement / Events'),
(996, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:51', 'Announcement / Events'),
(997, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:48:51', 'Announcement / Events'),
(998, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:49:49', 'Announcement / Events'),
(999, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:49:49', 'Announcement / Events'),
(1000, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:49:49', 'Announcement / Events'),
(1001, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:49:49', 'Announcement / Events'),
(1002, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:50:48', 'Announcement / Events'),
(1003, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:50:48', 'Announcement / Events'),
(1004, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:50:48', 'Announcement / Events'),
(1005, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:50:48', 'Announcement / Events'),
(1006, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:52:29', 'Announcement / Events'),
(1007, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:52:29', 'Announcement / Events'),
(1008, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:55:10', 'Announcement / Events'),
(1009, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:55:10', 'Announcement / Events'),
(1010, 'masteraffy@gmail.com', 'User Deleted an Alumni Account ', '2022-05-20 01:55:10', 'Announcement / Events'),
(1011, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 12', '2022-05-20 01:58:20', 'Admin Account'),
(1012, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 11', '2022-05-20 01:59:28', 'Admin Account'),
(1013, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 10', '2022-05-20 01:59:38', 'Announcement / Events'),
(1014, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 9', '2022-05-20 01:59:38', 'Announcement / Events'),
(1015, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 8', '2022-05-20 01:59:46', 'Announcement / Events'),
(1016, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 7', '2022-05-20 01:59:46', 'Announcement / Events'),
(1017, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 6', '2022-05-20 01:59:46', 'Announcement / Events'),
(1018, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 5', '2022-05-20 01:59:46', 'Announcement / Events'),
(1019, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 22', '2022-05-20 02:02:59', 'Announcement / Events'),
(1020, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 21', '2022-05-20 02:02:59', 'Announcement / Events'),
(1021, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 3', '2022-05-20 02:03:10', 'Announcement / Events'),
(1022, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 4', '2022-05-20 02:03:10', 'Announcement / Events'),
(1023, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 14', '2022-05-20 02:03:20', 'Announcement / Events'),
(1024, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 15', '2022-05-20 02:03:20', 'Announcement / Events'),
(1025, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 16', '2022-05-20 02:03:20', 'Announcement / Events'),
(1026, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 17', '2022-05-20 02:03:20', 'Announcement / Events'),
(1027, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 18', '2022-05-20 02:03:20', 'Announcement / Events'),
(1028, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 23', '2022-05-20 02:08:55', 'Announcement / Events'),
(1029, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 24', '2022-05-20 02:08:55', 'Announcement / Events'),
(1030, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 25', '2022-05-20 02:08:55', 'Announcement / Events'),
(1031, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 26', '2022-05-20 02:08:55', 'Announcement / Events'),
(1032, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 27', '2022-05-20 02:08:55', 'Announcement / Events'),
(1033, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 28', '2022-05-20 02:08:55', 'Announcement / Events'),
(1034, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 19', '2022-05-20 02:08:55', 'Announcement / Events'),
(1035, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 20', '2022-05-20 02:08:55', 'Announcement / Events'),
(1036, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 29', '2022-05-20 02:08:55', 'Announcement / Events'),
(1037, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 30', '2022-05-20 02:08:55', 'Announcement / Events'),
(1038, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-20 02:22:10', 'Login'),
(1039, 'masteraffy@gmail.com', 'User Logged In', '2022-05-20 02:33:30', 'Login'),
(1040, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 31', '2022-05-20 02:35:11', 'Announcement / Events'),
(1041, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 32', '2022-05-20 02:35:11', 'Announcement / Events'),
(1042, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 33', '2022-05-20 02:35:11', 'Announcement / Events'),
(1043, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 34', '2022-05-20 02:35:11', 'Announcement / Events'),
(1044, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 35', '2022-05-20 02:35:11', 'Announcement / Events'),
(1045, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 36', '2022-05-20 02:35:11', 'Announcement / Events'),
(1046, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 37', '2022-05-20 02:35:11', 'Announcement / Events'),
(1047, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 38', '2022-05-20 02:35:11', 'Announcement / Events'),
(1048, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 39', '2022-05-20 02:35:11', 'Announcement / Events'),
(1049, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 40', '2022-05-20 02:35:11', 'Announcement / Events'),
(1050, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino123@gmail.com', '2022-05-20 02:37:32', 'Employee Account'),
(1051, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 44', '2022-05-20 02:38:36', 'Employee Account'),
(1052, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 45', '2022-05-20 02:38:40', 'Employee Account'),
(1053, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-20 02:39:46', 'Employee Account'),
(1054, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 46', '2022-05-20 02:40:16', 'Employee Account'),
(1055, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-20 02:40:35', 'Employee Account'),
(1056, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 47', '2022-05-20 02:40:44', 'Employee Account'),
(1057, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-20 02:54:44', 'Employee Account'),
(1058, 'recamino12@gmail.com', 'User Logged In', '2022-05-20 02:55:33', 'Login'),
(1059, 'recamino12@gmail.com', 'User Created an Announcement / Events: TANGINAMOPO', '2022-05-20 02:55:50', 'Announcement / Events'),
(1060, 'masteraffy@gmail.com', 'User Created an Announcement / Events: TANGINAKA', '2022-05-20 02:56:44', 'Announcement / Events'),
(1061, 'masteraffy@gmail.com', 'User Logged Out', '2022-05-20 02:57:15', 'Login'),
(1062, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 38', '2022-05-20 02:59:32', 'Announcement / Events'),
(1063, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 42', '2022-05-20 02:59:57', 'Admin Account'),
(1064, 'masteraffy@gmail.com', 'User Logged In', '2022-05-20 12:10:45', 'Login'),
(1065, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-20 12:11:02', 'Announcement / Events'),
(1066, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 2', '2022-05-20 12:19:15', 'Announcement / Events'),
(1067, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 39', '2022-05-20 12:19:52', 'Announcement / Events'),
(1068, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-20 12:23:49', 'Announcement / Events'),
(1069, 'recamino12@gmail.com', 'User Logged In', '2022-05-20 12:24:48', 'Login'),
(1070, 'recamino12@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-20 12:25:01', 'Announcement / Events'),
(1071, 'recamino12@gmail.com', 'User Logged Out', '2022-05-20 12:25:50', 'Login'),
(1072, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 48', '2022-05-20 12:26:09', 'Employee Account'),
(1073, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 43', '2022-05-20 12:37:53', 'Announcement / Events'),
(1074, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 44', '2022-05-20 12:37:53', 'Announcement / Events'),
(1075, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 41', '2022-05-20 12:44:04', 'Announcement / Events'),
(1076, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 45', '2022-05-20 12:44:20', 'Admin Account'),
(1077, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 47', '2022-05-20 12:44:38', 'Admin Account'),
(1078, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 46', '2022-05-20 12:44:45', 'Admin Account'),
(1079, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 48', '2022-05-20 12:45:19', 'Admin Account'),
(1080, 'masteraffy@gmail.com', 'User Created an Employee Account: recamino12@gmail.com', '2022-05-20 12:45:51', 'Employee Account'),
(1081, 'recamino12@gmail.com', 'User Logged In', '2022-05-20 12:45:59', 'Login'),
(1082, 'recamino12@gmail.com', 'User Created an Announcement / Events: sample', '2022-05-20 12:46:12', 'Announcement / Events'),
(1083, 'recamino12@gmail.com', 'User Updated an Announcement / Events: 43', '2022-05-20 12:46:17', 'Announcement / Events'),
(1084, 'masteraffy@gmail.com', 'User Deleted an Employee Account Id: 49', '2022-05-20 12:46:22', 'Employee Account'),
(1085, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 49', '2022-05-20 12:46:35', 'Admin Account'),
(1086, 'masteraffy@gmail.com', 'User Created an Alumni Account: recamino12@gmail.com', '2022-05-20 12:48:56', 'Admin Account'),
(1087, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 52', '2022-05-20 12:51:51', 'Admin Account'),
(1088, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 45', '2022-05-20 12:56:15', 'Announcement / Events'),
(1089, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 53', '2022-05-20 12:56:29', 'Admin Account'),
(1090, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 54', '2022-05-20 12:58:07', 'Admin Account'),
(1091, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 47', '2022-05-20 13:02:36', 'Announcement / Events'),
(1092, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 55', '2022-05-20 13:02:45', 'Admin Account'),
(1093, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 48', '2022-05-20 13:05:18', 'Announcement / Events'),
(1094, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 56', '2022-05-20 13:06:22', 'Admin Account'),
(1095, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 49', '2022-05-20 13:08:03', 'Announcement / Events'),
(1096, 'masteraffy@gmail.com', 'User Deleted an Alumni Account: 57', '2022-05-20 13:08:07', 'Admin Account'),
(1097, 'masteraffy@gmail.com', 'User Logged In', '2022-05-22 22:12:46', 'Login'),
(1098, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 50', '2022-05-22 22:13:05', 'Announcement / Events'),
(1099, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 51', '2022-05-22 22:13:05', 'Announcement / Events'),
(1100, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 41', '2022-05-22 22:13:05', 'Announcement / Events'),
(1101, 'masteraffy@gmail.com', 'User Created an Announcement / Events: 1', '2022-05-22 22:56:06', 'Announcement / Events'),
(1102, 'masteraffy@gmail.com', 'User Updated an Announcement / Events: 50', '2022-05-22 22:56:11', 'Announcement / Events'),
(1103, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 58', '2022-05-22 23:02:54', 'Announcement / Events'),
(1104, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 59', '2022-05-22 23:02:54', 'Announcement / Events'),
(1105, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 60', '2022-05-22 23:02:54', 'Announcement / Events'),
(1106, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 61', '2022-05-22 23:02:54', 'Announcement / Events'),
(1107, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 62', '2022-05-22 23:02:54', 'Announcement / Events'),
(1108, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 63', '2022-05-22 23:02:54', 'Announcement / Events'),
(1109, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 64', '2022-05-22 23:02:54', 'Announcement / Events'),
(1110, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 65', '2022-05-22 23:02:54', 'Announcement / Events'),
(1111, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 66', '2022-05-22 23:02:54', 'Announcement / Events'),
(1112, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 67', '2022-05-22 23:02:54', 'Announcement / Events'),
(1113, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 68', '2022-05-22 23:03:56', 'Announcement / Events'),
(1114, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 69', '2022-05-22 23:03:56', 'Announcement / Events'),
(1115, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 70', '2022-05-22 23:03:56', 'Announcement / Events'),
(1116, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 71', '2022-05-22 23:03:56', 'Announcement / Events'),
(1117, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 72', '2022-05-22 23:03:56', 'Announcement / Events'),
(1118, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 73', '2022-05-22 23:03:56', 'Announcement / Events'),
(1119, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 74', '2022-05-22 23:03:56', 'Announcement / Events'),
(1120, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 75', '2022-05-22 23:03:56', 'Announcement / Events'),
(1121, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 76', '2022-05-22 23:03:56', 'Announcement / Events'),
(1122, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 77', '2022-05-22 23:03:56', 'Announcement / Events'),
(1123, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 78', '2022-05-22 23:07:08', 'Announcement / Events'),
(1124, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 79', '2022-05-22 23:07:08', 'Announcement / Events'),
(1125, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 80', '2022-05-22 23:07:08', 'Announcement / Events'),
(1126, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 81', '2022-05-22 23:07:08', 'Announcement / Events'),
(1127, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 82', '2022-05-22 23:07:08', 'Announcement / Events'),
(1128, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 83', '2022-05-22 23:07:08', 'Announcement / Events'),
(1129, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 84', '2022-05-22 23:07:08', 'Announcement / Events'),
(1130, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 85', '2022-05-22 23:07:08', 'Announcement / Events'),
(1131, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 86', '2022-05-22 23:07:08', 'Announcement / Events'),
(1132, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 87', '2022-05-22 23:07:08', 'Announcement / Events'),
(1133, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 88', '2022-05-22 23:47:20', 'Announcement / Events'),
(1134, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 89', '2022-05-22 23:47:20', 'Announcement / Events'),
(1135, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 90', '2022-05-22 23:47:20', 'Announcement / Events'),
(1136, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 91', '2022-05-22 23:47:20', 'Announcement / Events'),
(1137, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 92', '2022-05-22 23:47:20', 'Announcement / Events'),
(1138, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 93', '2022-05-22 23:47:20', 'Announcement / Events'),
(1139, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 94', '2022-05-22 23:47:20', 'Announcement / Events'),
(1140, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 95', '2022-05-22 23:47:20', 'Announcement / Events'),
(1141, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 96', '2022-05-22 23:47:20', 'Announcement / Events'),
(1142, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 97', '2022-05-22 23:47:20', 'Announcement / Events'),
(1143, 'masteraffy@gmail.com', 'User Logged In', '2022-05-23 13:09:46', 'Login'),
(1144, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 98', '2022-05-23 13:11:32', 'Announcement / Events'),
(1145, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 99', '2022-05-23 13:11:32', 'Announcement / Events'),
(1146, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 100', '2022-05-23 13:11:32', 'Announcement / Events'),
(1147, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 101', '2022-05-23 13:11:32', 'Announcement / Events'),
(1148, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 102', '2022-05-23 13:11:32', 'Announcement / Events'),
(1149, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 103', '2022-05-23 13:11:32', 'Announcement / Events'),
(1150, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 104', '2022-05-23 13:11:32', 'Announcement / Events'),
(1151, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 105', '2022-05-23 13:11:32', 'Announcement / Events'),
(1152, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 106', '2022-05-23 13:11:32', 'Announcement / Events'),
(1153, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 107', '2022-05-23 13:11:32', 'Announcement / Events'),
(1154, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 108', '2022-05-23 13:57:14', 'Announcement / Events'),
(1155, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 109', '2022-05-23 13:57:14', 'Announcement / Events'),
(1156, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 110', '2022-05-23 13:57:14', 'Announcement / Events'),
(1157, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 111', '2022-05-23 13:57:14', 'Announcement / Events'),
(1158, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 112', '2022-05-23 13:57:14', 'Announcement / Events'),
(1159, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 113', '2022-05-23 13:57:14', 'Announcement / Events'),
(1160, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 114', '2022-05-23 13:57:14', 'Announcement / Events'),
(1161, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 115', '2022-05-23 13:57:14', 'Announcement / Events'),
(1162, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 116', '2022-05-23 13:57:14', 'Announcement / Events'),
(1163, 'masteraffy@gmail.com', 'User Deleted an Alumni Account 117', '2022-05-23 13:57:14', 'Announcement / Events');

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
(25, 0, 'masteraffy@gmail.com', '$2y$10$.rtA5gujU8AYWw6kCxWukeQhpFFaOAckG11H4homaS463gZnnpS5G', 'Dan', 'Surname', 'Patrick', 'masteraffy@gmail.com', '12312321321', 12, 13, '2022-05-15', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `studentforms`
--

CREATE TABLE `studentforms` (
  `Id` int(11) NOT NULL,
  `studID` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `AddedDate` date NOT NULL,
  `courseRelated` text NOT NULL,
  `currentlyEmp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `exceltest`
--
ALTER TABLE `exceltest`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `exceltest`
--
ALTER TABLE `exceltest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `studentforms`
--
ALTER TABLE `studentforms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



