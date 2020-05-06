-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_times` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `login_times`, `status`) VALUES
(1, 'user1@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 17, 'U'),
(2, 'user2@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 7, 'U'),
(3, 'user3@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 3, 'U'),
(4, 'user4@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 1, 'U'),
(5, 'user5@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 1, 'U'),
(6, 'user6@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(7, 'user7@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(8, 'user8@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(9, 'user9@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(10, 'user10@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(11, 'user11@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 4, 'U'),
(12, 'user12@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 2, 'U'),
(13, 'user13@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(14, 'user14@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(15, 'user15@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(16, 'user16@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(17, 'user17@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(18, 'user18@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(19, 'user19@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(20, 'user20@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 0, 'U'),
(22, 'admin1@gmail.com', '2b3676eb41ed539ee7da61f514885d6f', 3, 'A');

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reported_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`contact_id`, `category`, `user_id`, `title`, `content`, `reported_id`) VALUES
(1, 'feedback', 1, 'it&#039;s fun', 'I like this website', NULL),
(2, 'recruitment', 1, 'looking for a job', 'I&#039;m looking for a job', 0),
(3, 'feedback', 1, 'thanks', 'thanks!!', 0),
(4, 'feedback', 1, 'i don&#039;t like this website', 'i cant match', 0),
(5, 'report', 4, 'he sent me something bad', 'he sent me something bad', 20);

-- --------------------------------------------------------

--
-- テーブルの構造 `dislikes`
--

CREATE TABLE `dislikes` (
  `dislike_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `received_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `dislikes`
--

INSERT INTO `dislikes` (`dislike_id`, `user_id`, `received_user_id`) VALUES
(1, 3, 18),
(2, 1, 19);

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `received_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `received_user_id`, `created_at`) VALUES
(1, 1, 11, '2020-04-24 11:15:40'),
(2, 1, 12, '2020-04-24 11:15:40'),
(3, 1, 13, '2020-04-24 11:15:40'),
(4, 1, 14, '2020-04-24 11:15:40'),
(5, 1, 15, '2020-04-24 11:15:40'),
(7, 1, 17, '2020-04-24 11:15:40'),
(8, 1, 18, '2020-04-24 11:15:40'),
(10, 1, 20, '2020-04-24 11:15:40'),
(11, 11, 1, '2020-04-24 11:16:32'),
(12, 12, 1, '2020-04-24 11:16:32'),
(13, 13, 1, '2020-04-24 11:16:32'),
(14, 14, 1, '2020-04-24 11:16:32'),
(15, 15, 1, '2020-04-24 11:16:32'),
(17, 17, 1, '2020-04-24 11:16:32'),
(18, 18, 1, '2020-04-24 11:16:32'),
(20, 20, 1, '2020-04-24 11:16:33'),
(21, 3, 15, '2020-04-24 12:09:10'),
(22, 2, 12, '2020-04-24 12:23:23'),
(23, 12, 2, '2020-04-24 12:23:45'),
(24, 2, 11, '2020-04-24 12:26:54'),
(25, 11, 2, '2020-04-24 12:27:05'),
(26, 2, 19, '2020-04-24 16:17:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `matches`
--

INSERT INTO `matches` (`match_id`, `user_id1`, `user_id2`) VALUES
(2, 1, 11),
(3, 1, 12),
(4, 1, 13),
(5, 1, 14),
(6, 1, 15),
(8, 1, 17),
(9, 1, 18),
(11, 1, 20),
(12, 12, 2),
(13, 11, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `received_user_id` int(11) NOT NULL,
  `textmessage` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `received_user_id`, `textmessage`, `created_at`) VALUES
(1, 1, 12, 'hi', '2020-04-24 11:32:32'),
(2, 1, 11, 'Helloooooooooooooo', '2020-04-24 11:34:20'),
(3, 1, 11, 'Hi!!!', '2020-04-24 12:06:44'),
(4, 1, 12, 'the latest message', '2020-04-24 12:07:05'),
(5, 2, 12, 'Hi!', '2020-04-24 12:25:01'),
(6, 2, 11, 'the latest message', '2020-04-24 12:43:45'),
(7, 1, 12, 'hi', '2020-04-24 15:52:47'),
(8, 1, 12, 'hi', '2020-04-24 15:52:49'),
(9, 1, 12, 'hi', '2020-04-24 15:52:51'),
(10, 1, 12, 'hi', '2020-04-24 15:52:54'),
(11, 1, 12, 'the maximum number of the message in a page is 5', '2020-04-24 16:13:56'),
(12, 1, 12, 'So if you want to see the old messages you need to click &quot;next&quot;', '2020-04-24 16:14:39'),
(13, 1, 11, 'latest message', '2020-04-24 17:34:28');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `like_gender` varchar(10) NOT NULL,
  `job` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `profile_comment` varchar(200) NOT NULL,
  `user_image1` varchar(255) DEFAULT NULL,
  `user_image2` varchar(255) DEFAULT NULL,
  `user_image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `username`, `address`, `age`, `gender`, `like_gender`, `job`, `school`, `hobby`, `profile_comment`, `user_image1`, `user_image2`, `user_image3`) VALUES
(1, 'user1', ' ??? hokkaido', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'GettyImages-960033624.jpg', NULL, NULL),
(2, 'user2', ' ??? aomori', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'b25c8166f2fec4668f60c1824f955dbc.jpg', NULL, NULL),
(3, 'user3', ' ??? iwate', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'myrtle-sarrosa-filipina-celebrity-cosplayer-cum-laude-1.jpg', NULL, NULL),
(4, 'user4', ' 宮城県 miyagi', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(5, 'user5', ' ??? akita', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', '077a9916f1d5a458dbc0ed9aba735092--daniel-padilla-picture-collection.jpg', NULL, NULL),
(6, 'user6', ' 山形県 yamagata', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(7, 'user7', ' 福島県 fukushima', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(8, 'user8', ' 茨城県 ibaraki', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(9, 'user9', ' 栃木県 tochigi', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(10, 'user10', ' 群馬県 gunma', '20', 'Male', 'Female', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(11, 'user11', ' ??? saitama', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'myrtle-sarrosa-filipina-celebrity-cosplayer-cum-laude-1.jpg', NULL, NULL),
(12, 'user12', ' ??? chiba', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', '077a9916f1d5a458dbc0ed9aba735092--daniel-padilla-picture-collection.jpg', NULL, NULL),
(13, 'user13', ' 東京都 tokyo', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'myrtle-sarrosa-filipina-celebrity-cosplayer-cum-laude-1.jpg', NULL, NULL),
(14, 'user14', ' 神奈川県 kanagawa', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', 'myrtle-sarrosa-filipina-celebrity-cosplayer-cum-laude-1.jpg', NULL, NULL),
(15, 'user15', ' 新潟県 niigata', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', '077a9916f1d5a458dbc0ed9aba735092--daniel-padilla-picture-collection.jpg', NULL, NULL),
(16, 'user16', ' 富山県 toyama', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', '077a9916f1d5a458dbc0ed9aba735092--daniel-padilla-picture-collection.jpg', NULL, NULL),
(17, 'user17', ' 石川県 ishikawa', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', '077a9916f1d5a458dbc0ed9aba735092--daniel-padilla-picture-collection.jpg', NULL, NULL),
(18, 'user18', ' 福井県 fukui', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(19, 'user19', ' 山梨県 yamanashi', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(20, 'user20', ' 長野県 nagano', '20', 'Female', 'Male', 'enjineer', 'kredo', 'soccer', 'Nice to meet you!!! Nice to meet you!!!Nice to meet you!!!Nice to meet you!!!', NULL, NULL, NULL),
(22, 'admin1', '', '', 'Male', 'Female', '', '', '', '', 'A-0012.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`dislike_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
