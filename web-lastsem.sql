-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 07:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-lastsem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` varchar(32) NOT NULL,
  `userId` varchar(32) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE IF NOT EXISTS `comment_reply` (
  `commentReplyId` varchar(32) NOT NULL,
  `commentId` varchar(32) NOT NULL,
  `replyCommentId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

UPDATE IGNORE `users` SET `userId` = '1067903176',`email` = 'minhky.book@gmailfgdfgdfg.com',`password` = '$2y$10$KHaiXYN4mDD0R81czWr.0uqvvftUbHB1TQaJAJl2W/4izOV6GCFky' WHERE `users`.`userId` = '1067903176';
UPDATE IGNORE `users` SET `userId` = '1996292138',`email` = 'minhky.book123@gmail.com',`password` = '$2y$10$5q6.lNv7uArV/Rkh1OM68ODSnhvHWVes9Kp39J853IQEe4KOmdlXG' WHERE `users`.`userId` = '1996292138';
UPDATE IGNORE `users` SET `userId` = '384053704',`email` = 'minhky.book@gmail.com',`password` = '$2y$10$6DmiFd4QYLN.Yy2FkxaLVO7vbgnVZiMwuiFZHRVPoeVmawCXVwp/6' WHERE `users`.`userId` = '384053704';
UPDATE IGNORE `users` SET `userId` = '4168852681',`email` = 'minhk3123123y.book@gmail.com',`password` = '$2y$10$.BM..hR6ne9PVQGqD1KWIOP3TVzetDD74R9sqz.ZXd9/w3w8o5hb.' WHERE `users`.`userId` = '4168852681';
UPDATE IGNORE `users` SET `userId` = '469900228',`email` = 'minh12313235345ky.book@gmail.com',`password` = '$2y$10$sflLhrLkQKRKKnZlW9XjhOC6txujcZe4glkVWXCyyUBmO8JsQQPEC' WHERE `users`.`userId` = '469900228';
UPDATE IGNORE `users` SET `userId` = '537518991',`email` = 'minhky.b34234ook@gmail.com',`password` = '$2y$10$gA4r1nHKJEj7ipO/rI86MuPLWbq54EjrzTjIgEC.K.iOaKd6Whviy' WHERE `users`.`userId` = '537518991';

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE IF NOT EXISTS `users_account` (
  `userId` varchar(32) NOT NULL,
  `channelName` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `dateCreated` date NOT NULL,
  `avatarPath` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_account`
--

UPDATE IGNORE `users_account` SET `userId` = '1067903176',`channelName` = 'Minh Kỳ',`bio` = '',`dateCreated` = '2023-04-17',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'verify' WHERE `users_account`.`userId` = '1067903176';
UPDATE IGNORE `users_account` SET `userId` = '1996292138',`channelName` = 'Minh Kỳ',`bio` = '',`dateCreated` = '2023-04-17',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'verify' WHERE `users_account`.`userId` = '1996292138';
UPDATE IGNORE `users_account` SET `userId` = '384053704',`channelName` = 'Minh Kỳ',`bio` = 'Đời là bể khổ',`dateCreated` = '2023-04-15',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'active' WHERE `users_account`.`userId` = '384053704';
UPDATE IGNORE `users_account` SET `userId` = '4168852681',`channelName` = 'Minh Kỳ',`bio` = '',`dateCreated` = '2023-04-17',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'verify' WHERE `users_account`.`userId` = '4168852681';
UPDATE IGNORE `users_account` SET `userId` = '469900228',`channelName` = 'Minh Kỳ',`bio` = '',`dateCreated` = '2023-04-17',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'verify' WHERE `users_account`.`userId` = '469900228';
UPDATE IGNORE `users_account` SET `userId` = '537518991',`channelName` = 'Châu Hạo Mã Lai',`bio` = '',`dateCreated` = '2023-04-17',`avatarPath` = '/assets/default/avatar.jpg',`role` = 'user',`status` = 'verify' WHERE `users_account`.`userId` = '537518991';

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
  `userId` varchar(32) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phoneNumber` varchar(32) NOT NULL,
  `dateOfBirth` date NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

UPDATE IGNORE `users_info` SET `userId` = '1067903176',`fullName` = 'Minh Kỳ',`username` = 'minhky.book',`phoneNumber` = '079824452342',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '1067903176';
UPDATE IGNORE `users_info` SET `userId` = '1996292138',`fullName` = 'Minh Kỳ',`username` = 'minhky.jav',`phoneNumber` = '645645642',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '1996292138';
UPDATE IGNORE `users_info` SET `userId` = '384053704',`fullName` = 'Minh Kỳ',`username` = 'admin',`phoneNumber` = '0798245682',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '384053704';
UPDATE IGNORE `users_info` SET `userId` = '4168852681',`fullName` = 'Minh Kỳ',`username` = '23123123123',`phoneNumber` = '079345356456',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '4168852681';
UPDATE IGNORE `users_info` SET `userId` = '469900228',`fullName` = 'Minh Kỳ',`username` = 'asdasdasd2341234',`phoneNumber` = '079826567867',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '469900228';
UPDATE IGNORE `users_info` SET `userId` = '537518991',`fullName` = 'Châu Hạo Mã Lai',`username` = 'chaulai.1113',`phoneNumber` = '07982423423',`dateOfBirth` = '2023-01-01' WHERE `users_info`.`userId` = '537518991';

-- --------------------------------------------------------

--
-- Table structure for table `users_token`
--

CREATE TABLE IF NOT EXISTS `users_token` (
  `userToken` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userToken`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_token`
--

UPDATE IGNORE `users_token` SET `userToken` = '036e4b2aae653602af383a61bbb6efc2',`userId` = '537518991',`role` = 1,`createdAt` = '2023-04-17 17:14:15' WHERE `users_token`.`userToken` = '036e4b2aae653602af383a61bbb6efc2';
UPDATE IGNORE `users_token` SET `userToken` = '12ca9c72f57760f15e3a4ed87e97a76d',`userId` = '469900228',`role` = 1,`createdAt` = '2023-04-17 17:04:37' WHERE `users_token`.`userToken` = '12ca9c72f57760f15e3a4ed87e97a76d';
UPDATE IGNORE `users_token` SET `userToken` = '141509fdb9cf946999427307346b18a7',`userId` = '4168852681',`role` = 1,`createdAt` = '2023-04-17 17:03:20' WHERE `users_token`.`userToken` = '141509fdb9cf946999427307346b18a7';
UPDATE IGNORE `users_token` SET `userToken` = '22bc4aa30d1deb7733a2bc9fbfa93583',`userId` = '1067903176',`role` = 1,`createdAt` = '2023-04-17 04:12:05' WHERE `users_token`.`userToken` = '22bc4aa30d1deb7733a2bc9fbfa93583';
UPDATE IGNORE `users_token` SET `userToken` = '2cf250018069348c9adadad5b9ae086b',`userId` = '1996292138',`role` = 1,`createdAt` = '2023-04-17 16:22:15' WHERE `users_token`.`userToken` = '2cf250018069348c9adadad5b9ae086b';

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `videoId` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `views` int(11) NOT NULL,
  `thumbnailPath` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dislikeCount` int(11) NOT NULL,
  `uploadTime` datetime NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_channel`
--

CREATE TABLE IF NOT EXISTS `video_channel` (
  `channelVideoId` varchar(32) NOT NULL,
  `userId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE IF NOT EXISTS `video_comment` (
  `videoCommentId` varchar(32) NOT NULL,
  `videoId` varchar(32) NOT NULL,
  `commentId` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
