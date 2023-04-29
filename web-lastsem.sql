-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 06:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `web-lastsem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentId` varchar(32) NOT NULL,
  `userId` varchar(32) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `commentReplyId` varchar(32) NOT NULL,
  `commentId` varchar(32) NOT NULL,
  `replyCommentId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

REPLACE INTO `users` (`userId`, `email`, `password`) VALUES
('1067903176', 'minhky.book@gmailfgdfgdfg.com', '$2y$10$KHaiXYN4mDD0R81czWr.0uqvvftUbHB1TQaJAJl2W/4izOV6GCFky'),
('1996292138', 'minhky.book123@gmail.com', '$2y$10$5q6.lNv7uArV/Rkh1OM68ODSnhvHWVes9Kp39J853IQEe4KOmdlXG'),
('315051053', 'tranlethaison123@gmail.com', '$2y$10$d8Ln.aAeLVaa7XhoDSddIuTCVokaWiDx0d7ON9am5eL.pXcouncQ2'),
('384053704', 'minhky.book@gmail.com', '$2y$10$6DmiFd4QYLN.Yy2FkxaLVO7vbgnVZiMwuiFZHRVPoeVmawCXVwp/6'),
('4168852681', 'minhk3123123y.book@gmail.com', '$2y$10$.BM..hR6ne9PVQGqD1KWIOP3TVzetDD74R9sqz.ZXd9/w3w8o5hb.'),
('469900228', 'minh12313235345ky.book@gmail.com', '$2y$10$sflLhrLkQKRKKnZlW9XjhOC6txujcZe4glkVWXCyyUBmO8JsQQPEC'),
('537518991', 'minhky.b34234ook@gmail.com', '$2y$10$gA4r1nHKJEj7ipO/rI86MuPLWbq54EjrzTjIgEC.K.iOaKd6Whviy');

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `userId` varchar(32) NOT NULL,
  `channelName` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `dateCreated` date NOT NULL,
  `avatarPath` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `about` text NOT NULL,
  `gender` varchar(32) NOT NULL,
  `location` varchar(255) NOT NULL,
  `followers` int(11) NOT NULL,
  `backgroundPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_account`
--

REPLACE INTO `users_account` (`userId`, `channelName`, `bio`, `dateCreated`, `avatarPath`, `role`, `status`, `about`, `gender`, `location`, `followers`, `backgroundPath`) VALUES
('1067903176', 'Minh Kỳ', '', '2023-04-17', '/assets/default/avatar.jpg', 'user', 'verify', '', '', '', 0, ''),
('1996292138', 'Minh Kỳ', '', '2023-04-17', '/assets/default/avatar.jpg', 'user', 'verify', '', '', '', 0, ''),
('315051053', 'Son Tran', '', '2023-04-26', '/assets/default/avatar.jpg', 'user', 'active', '', '', '', 0, ''),
('384053704', 'Minh Kỳ', 'Đời là bể khổ', '2023-04-15', '/assets/default/avatar.jpg', 'user', 'active', '', '', '', 0, ''),
('4168852681', 'Minh Kỳ', '', '2023-04-17', '/assets/default/avatar.jpg', 'user', 'verify', '', '', '', 0, ''),
('469900228', 'Minh Kỳ', '', '2023-04-17', '/assets/default/avatar.jpg', 'user', 'verify', '', '', '', 0, ''),
('537518991', 'Châu Hạo Mã Lai', '', '2023-04-17', '/assets/default/avatar.jpg', 'user', 'verify', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `userId` varchar(32) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phoneNumber` varchar(32) NOT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

REPLACE INTO `users_info` (`userId`, `fullName`, `username`, `phoneNumber`, `dateOfBirth`) VALUES
('1067903176', 'Minh Kỳ', 'minhky.book', '079824452342', '2023-01-01'),
('1996292138', 'Minh Kỳ', 'minhky.jav', '645645642', '2023-01-01'),
('315051053', 'Son Tran', 'cerberose', '0914811647', '1996-11-24'),
('384053704', 'Minh Kỳ', 'admin', '0798245682', '2023-01-01'),
('4168852681', 'Minh Kỳ', '23123123123', '079345356456', '2023-01-01'),
('469900228', 'Minh Kỳ', 'asdasdasd2341234', '079826567867', '2023-01-01'),
('537518991', 'Châu Hạo Mã Lai', 'chaulai.1113', '07982423423', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE `users_token` (
  `userToken` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_token`
--

REPLACE INTO `users_token` (`userToken`, `userId`, `role`, `createdAt`) VALUES
('036e4b2aae653602af383a61bbb6efc2', '537518991', 1, '2023-04-17 17:14:15'),
('12ca9c72f57760f15e3a4ed87e97a76d', '469900228', 1, '2023-04-17 17:04:37'),
('141509fdb9cf946999427307346b18a7', '4168852681', 1, '2023-04-17 17:03:20'),
('22bc4aa30d1deb7733a2bc9fbfa93583', '1067903176', 1, '2023-04-17 04:12:05'),
('2cf250018069348c9adadad5b9ae086b', '1996292138', 1, '2023-04-17 16:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `userId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `notiId` varchar(32) NOT NULL,
  `userId` varchar(32) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `videoId` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `views` int(11) NOT NULL,
  `thumbnailPath` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dislikeCount` int(11) NOT NULL,
  `uploadTime` datetime NOT NULL,
  `status` varchar(32) NOT NULL,
  `videoPath` varchar(255) NOT NULL,
  `ageRestriction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_channel`
--

CREATE TABLE `video_channel` (
  `channelVideoId` varchar(32) NOT NULL,
  `userId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE `video_comment` (
  `videoCommentId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL,
  `commentId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_playlist`
--

CREATE TABLE `video_playlist` (
  `userId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `users_token`
--
ALTER TABLE `users_token`
  ADD PRIMARY KEY (`userToken`);
COMMIT;
