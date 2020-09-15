-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 05:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `skills_required` char(50) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `description`, `skills_required`, `post_date`, `user_id`) VALUES
(1, 'I think I made it', '', '2020-09-10 21:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `testimonial` char(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonial`, `user_id`, `profile_pic`) VALUES
(3, 'It was all a dream', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` tinytext NOT NULL,
  `username` varchar(100) NOT NULL,
  `about` text DEFAULT NULL,
  `position` tinytext NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `skills` char(150) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `gender`, `username`, `about`, `position`, `rate`, `skills`, `password`, `profile_pic`, `date_created`) VALUES
(1, 'Coulston', 'thatcoul@gmail.com', 'male', 'coul', NULL, 'candidate', 0, '', '$2y$10$2fVjYqWTNsKdzmbadlZSn.vTmwYWMdnArFDdmf7aydE.oS8u0kB52', NULL, '2020-09-03 12:53:35'),
(2, 'Luteya', 'luteya@gmail.com', 'female', 'luteya', NULL, 'candidate', 4, '', '$2y$10$Q577ttiNaiLYQY2VIMGV9.Skqjq0dAeE3Rp2i5WxTJoHcMOmqY0Lu', NULL, '2020-09-03 12:54:39'),
(3, 'Jim', 'carrey@jim.com', 'other', 'carrey', NULL, 'candidate', 0, '', '$2y$10$Kf3.ererIvpbWfG7a9RSGOC2Et1XhC6.WgUvRJbJtnmtlmH3iWn8O', NULL, '2020-09-03 12:55:52'),
(4, 'Steiner', 'steiner@gmail.com', 'male', 'msasia', NULL, 'employer', 0, '', '$2y$10$DHOpdUQejhhFRXWq2CmyEOsDIa1dT/SwroyQIdoujGAHTvnjJZg0a', NULL, '2020-09-03 12:57:01'),
(5, 'Fedelis', 'mukami@fedelis.com', 'female', 'fedelis', NULL, 'employer', 0, '', '$2y$10$XQ2L8ccA2VIVqmhHOnxcbewDlV7FXWAzl2Gkg9/GbxOJ8mHa/5PaS', NULL, '2020-09-03 12:58:17'),
(6, 'Linet', 'linet@gmail.com', 'female', 'linet', NULL, 'employer', 0, '', '$2y$10$9M74W6dWiQrUcT6vNJME/.92j2NqH8u2D0CQ8iZACgld4L.W9/mM.', NULL, '2020-09-03 12:59:24'),
(7, 'Notorious', 'biggie@smalls.com', 'male', 'biggie', NULL, 'candidate', NULL, '', '$2y$10$GDz4y.IWr.f1Ay/Om9YfL.xcy3YfYyQFP1hR/9/qRwvpQBl7D1TXK', NULL, '2020-09-05 12:13:06'),
(8, 'Cole', 'cole@world.com', 'male', 'coleworld', NULL, 'candidate', NULL, '', '$2y$10$D7ASIKL5UCTV/zov7MRKMeN8qWgaXloxj3.iMV6gwxuX.3HUWMpUe', NULL, '2020-09-05 12:14:22'),
(9, 'Rhapsody', 'rhapsody@dreamville.com', 'female', 'rhapsody', NULL, 'candidate', NULL, '', '$2y$10$PYTkYEaBrgBHnBw0lyq5XeD.j5dSBqzu4obZ1PSevFMNjYP8JfQyu', NULL, '2020-09-05 12:15:07'),
(10, 'Nas', 'nas@nasislike.com', 'male', 'nas', NULL, 'candidate', NULL, '', '$2y$10$2bclYXR4qyOuvkIudnR1ouXoFZRymLsVLRT/N0kB5Bb53BncxIBgO', NULL, '2020-09-05 12:16:44'),
(12, 'Cozz', 'cozz@zendaya.com', 'male', 'cozz', NULL, 'candidate', NULL, '', '$2y$10$LMv.jBbfLOEst3zTRODH6.gVMZNPO1nWymeKllrEGU92wC.9knKkK', NULL, '2020-09-05 12:18:41'),
(15, 'Poppa', 'pops@smalls.com', 'male', 'pops', 'A freelance programmer', 'candidate', 2, 'Php', '$2y$10$Eng6y6Vkp8t1UN3gpuN7UuBVeAto4Surig05ULOgye9EiS1S4ywLy', NULL, '2020-09-11 07:29:50'),
(17, 'Lingo', 'Let me know', 'm', 'mastingo', 'Hii Nairobi is my lingo', 'Artist', NULL, 'fgh', 'a', 'a', '2020-09-11 08:37:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_ibfk_1` (`user_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
