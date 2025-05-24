-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 03:02 AM
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
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_ref` varchar(10) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_ref`, `job_title`, `salary`, `description`, `responsibilities`, `skills`) VALUES
('DS456', 'Data Scientist', '$90,000 - $120,000 per year', 'Analyze large datasets to extract insights and develop machine learning models', 'Analyze and interpret complex data sets.\r\nDevelop predictive models and algorithms.\r\nCollaborate with cross-functional teams to meet business goals.\r\nCommunicate findings to stakeholders.\r\nStay up-to-date with the latest data science trends and technologies', 'Proficiency in Python or R.\r\nExperience with machine learning frameworks.\r\nStrong communication and problem-solving skills.\r\nFamiliarity with data visualization tools (e.g., Tableau, Power BI).'),
('FR432', 'Fullstack Web Developer', ' $80,000 - $110,000 per year', 'Responsible for both front-end and back-end development, ensuring seamless integration of web applications.', 'Develop and maintain web applications.\r\nCollaborate with designers and other developers.\r\nOptimize applications for maximum speed and scalability.\r\nLead and mentor junior developers.\r\nEnsure the technical feasibility of UI/UX designs.', 'Proficiency in HTML, CSS, JavaScript, and server-side programming.\r\nExperience with responsive design and cross-browser compatibility.\r\nFamiliarity with version control systems (e.g., Git).\r\nStrong problem-solving and leadership skills.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_ref`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
