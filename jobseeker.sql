-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 06:59 AM
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
-- Database: `jobseeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `picture` blob DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `skills` text NOT NULL,
  `educational_attainment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `picture` blob DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `established_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_feedback` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `sender_email`, `sender_feedback`, `status`, `date_sent`) VALUES
(1, 'gray@email.com', 'panget so much', 'Unread', '2024-06-12 22:42:09'),
(2, 'red@hotmail.com', 'ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ganda ', 'Unread', '2024-06-12 22:42:09'),
(3, 'dum@email.com', 'Lmao', 'Unread', '2024-06-12 23:12:02'),
(4, 'ivan@gmail.com', 'Great platform! It helped me find a job quickly.', 'Unread', '2024-06-06 23:20:12'),
(5, 'alex@example.com', 'The UI could be improved, but overall a good experience.', 'Unread', '2024-05-28 23:20:12'),
(6, 'emma@example.com', 'I found the perfect job thanks to Jobseeker!', 'Unread', '2024-05-16 23:20:12'),
(7, 'lucas@example.com', 'Customer service was very helpful.', 'Unread', '2024-06-10 23:20:12'),
(8, 'olivia@example.com', 'The job recommendations were spot on!', 'Unread', '2024-05-26 23:20:12'),
(9, 'michael@example.com', 'Easy to use and navigate.', 'Unread', '2024-05-21 23:20:12'),
(10, 'sophia@example.com', 'I encountered some bugs while using the site.', '', '2024-05-15 23:20:12'),
(11, 'noah@example.com', 'A friend recommended this site to me.', '', '2024-05-29 23:20:12'),
(12, 'mia@example.com', 'Jobseeker exceeded my expectations!', '', '2024-05-24 23:20:12'),
(13, 'william@example.com', 'More job categories would be great.', '', '2024-05-21 23:20:12'),
(14, 'john.doe@example.com', 'This is a great service!', '', '2024-06-10 10:00:00'),
(15, 'jane.smith@example.com', 'Could use some improvements in the login process.', '', '2024-06-09 15:30:00'),
(16, 'michael.brown@example.com', 'I\'m very satisfied with the support team!', '', '2024-06-08 18:45:00'),
(17, 'emily.johnson@example.com', 'The app crashes occasionally.', '', '2024-06-07 12:20:00'),
(18, 'david.wilson@example.com', 'Would love to see more features added.', '', '2024-06-06 09:10:00'),
(19, 'sarah.carter@example.com', 'The interface is user-friendly.', '', '2024-06-05 14:00:00'),
(20, 'michael.adams@example.com', 'Fast response time from the support team.', '', '2024-06-04 11:30:00'),
(21, 'laura.miller@example.com', 'Needs better documentation.', '', '2024-06-03 16:45:00'),
(22, 'matthew.moore@example.com', 'Great job on the new update!', '', '2024-06-02 08:15:00'),
(23, 'john.doe@example.com', 'This is a great service!', '', '2024-06-10 10:00:00'),
(24, 'jane.smith@example.com', 'Could use some improvements in the login process.', '', '2024-06-09 15:30:00'),
(25, 'michael.brown@example.com', 'I\'m very satisfied with the support team!', '', '2024-06-08 18:45:00'),
(26, 'emily.johnson@example.com', 'The app crashes occasionally.', '', '2024-06-07 12:20:00'),
(27, 'david.wilson@example.com', 'Would love to see more features added.', '', '2024-06-06 09:10:00'),
(28, 'sarah.carter@example.com', 'The interface is user-friendly.', '', '2024-06-05 14:00:00'),
(29, 'michael.adams@example.com', 'Fast response time from the support team.', '', '2024-06-04 11:30:00'),
(30, 'laura.miller@example.com', 'Needs better documentation.', '', '2024-06-03 16:45:00'),
(31, 'matthew.moore@example.com', 'Great job on the new update!', '', '2024-06-02 08:15:00'),
(32, 'olivia.thomas@example.com', 'Very happy with the customer service.', '', '2024-06-01 19:20:00'),
(33, 'ethan.hernandez@example.com', 'The registration process is a bit confusing.', '', '2024-05-31 22:00:00'),
(34, 'ava.robinson@example.com', 'Appreciate the quick bug fixes.', '', '2024-05-30 14:30:00'),
(35, 'william.garcia@example.com', 'The app layout needs improvement.', '', '2024-05-29 17:45:00'),
(36, 'madison.martinez@example.com', 'Overall, satisfied with the service.', '', '2024-05-28 11:10:00'),
(37, 'james.perez@example.com', 'Could be more responsive on mobile devices.', '', '2024-05-27 09:25:00'),
(38, 'elizabeth.gonzalez@example.com', 'Great features but occasional login issues.', '', '2024-05-26 13:40:00'),
(39, 'alexander.wilson@example.com', 'Needs better integration with third-party apps.', '', '2024-05-25 15:55:00'),
(40, 'oliver.lopez@example.com', 'The UI design is clean and modern.', '', '2024-05-24 18:20:00'),
(41, 'mia.hernandez@example.com', 'Customer support is excellent.', '', '2024-05-23 20:30:00'),
(42, 'charlotte.young@example.com', 'Navigation could be more intuitive.', '', '2024-05-22 10:45:00'),
(43, 'daniel.scott@example.com', 'Frequent updates keep things fresh.', '', '2024-05-21 14:00:00'),
(44, 'amelia.king@example.com', 'The app is easy to use.', '', '2024-05-20 16:15:00'),
(45, 'mason.wright@example.com', 'Would like more customization options.', '', '2024-05-19 12:30:00'),
(46, 'mia.green@example.com', 'Performance could be improved.', '', '2024-05-18 09:45:00'),
(47, 'jacob.baker@example.com', 'Great tool for job seekers.', '', '2024-05-17 11:55:00'),
(48, 'ava.hill@example.com', 'Good resource for job hunting.', '', '2024-05-16 14:10:00'),
(49, 'william.cook@example.com', 'Would recommend to others.', '', '2024-05-15 17:25:00'),
(50, 'abigail.bailey@example.com', 'Helpful tips for job interviews.', '', '2024-05-14 19:30:00'),
(51, 'harper.gomez@example.com', 'Useful career advice.', '', '2024-05-13 21:45:00'),
(52, 'logan.hughes@example.com', 'Interface needs some tweaks.', '', '2024-05-12 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `admin_name` varchar(10) NOT NULL,
  `action` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `admin_name`, `action`, `user_id`, `time`) VALUES
(6, '', 'Deleted Account', '61', '2024-06-16 22:02:22'),
(7, '', 'Deleted Account', '60', '2024-06-16 22:02:26'),
(8, '', 'Deleted Account', '58', '2024-06-16 22:10:46'),
(9, '', 'Deleted Account', '55', '2024-06-16 22:11:26'),
(10, '', 'Deleted Account', '49', '2024-06-16 22:16:37'),
(11, '', 'Deleted Account', '50', '2024-06-16 22:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `job_application_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('applied','hired','rejected') DEFAULT 'applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE `passwords` (
  `user_id` int(11) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`user_id`, `password_hash`) VALUES
(3, '$2y$10$9uEuUm8N3ifeN8e.MmaMfuTLGyELY9tweCw6iPjKssXWiG19FIc2m'),
(7, '$2y$10$TPyiiDXFcFVO2nInOYg6Ze8cZWaU9yZKJAXkxnt3Mq2yCB4aXWr/i');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` enum('applicant','company','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_type`) VALUES
(3, 'admin', '$2y$10$QcOzpUBO9dcSVafDvGues.CP6SJCrM5bhL24XBt/Sa2XaskCXhiOS', 'admin@jseeker.com', 'admin'),
(7, 'johndoe', '$2y$10$e/mov6qkR6ODokO1DrUAs.F/SPhi5uc5o7pgT5W.A6fDm18lXmZZe', 'johndoe@example.com', 'applicant'),
(8, 'janedoe', '', 'janedoe@example.com', 'applicant'),
(9, 'techcorp', '', 'contact@techcorp.com', 'company'),
(10, 'admin01', '', 'admin01@example.com', 'admin'),
(11, 'hrmanager', '', 'hr@bigcompany.com', 'company'),
(12, 'charles.smith', '', 'charles.smith@example.com', 'applicant'),
(13, 'emily.jones', '', 'emily.jones@example.com', 'applicant'),
(14, 'startup123', '', 'info@startup123.com', 'company'),
(15, 'admin02', '', 'admin02@example.com', 'admin'),
(16, 'maryjohnson', '', 'maryjohnson@example.com', 'applicant'),
(17, 'dave.williams', '', 'dave.williams@example.com', 'applicant'),
(18, 'itservices', '', 'support@itservices.com', 'company'),
(19, 'alice.brown', '', 'alice.brown@example.com', 'applicant'),
(20, 'jason.miller', '', 'jason.miller@example.com', 'applicant'),
(21, 'globalinc', '', 'contact@globalinc.com', 'company'),
(22, 'sarah.connor', '', 'sarah.connor@example.com', 'applicant'),
(23, 'peter.parker', '', 'peter.parker@example.com', 'applicant'),
(24, 'futuretech', '', 'info@futuretech.com', 'company'),
(25, 'admin03', '', 'admin03@example.com', 'admin'),
(26, 'marketingguru', '', 'marketing@agencypro.com', 'company'),
(27, 'steve.baker', '', 'steve.baker@example.com', 'applicant'),
(28, 'elizabeth.taylor', '', 'elizabeth.taylor@example.com', 'applicant'),
(30, 'admin04', '', 'admin04@example.com', 'admin'),
(31, 'michael.jordan', '', 'michael.jordan@example.com', 'applicant'),
(32, 'jennifer.lee', '', 'jennifer.lee@example.com', 'applicant'),
(33, 'techinnovators', '', 'support@techinnovators.com', 'company'),
(34, 'tom.clark', '', 'tom.clark@example.com', 'applicant'),
(35, 'sophia.davis', '', 'sophia.davis@example.com', 'applicant'),
(36, 'globexcorp', '', 'info@globexcorp.com', 'company'),
(37, 'ivan', '', 'ivan@gmail.com', 'applicant'),
(57, 'tita', '$2y$10$r6QMRMMfXWZm1ho7agzvTOOtuD6YaQVRKwVe0QMP709rARZv9t2IW', 'tiuta@email.com', 'company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`job_application_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `job_application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD CONSTRAINT `job_applicants_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `job_applicants_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Constraints for table `passwords`
--
ALTER TABLE `passwords`
  ADD CONSTRAINT `passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
