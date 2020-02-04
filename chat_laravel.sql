-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 09 月 01 日 13:39
-- 伺服器版本: 10.1.34-MariaDB
-- PHP 版本： 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `chat_laravel`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'This is demo comments.', 2, 20, '2019-08-27 13:00:00', '0000-00-00 00:00:00'),
(2, 'This is demo two.', 7, 19, '2019-08-27 14:00:00', '0000-00-00 00:00:00'),
(3, 'very good!! Dora', 2, 20, '2019-08-28 06:47:14', '2019-08-28 06:47:14'),
(4, 'good job,Dora', 3, 20, '2019-08-28 06:47:42', '2019-08-28 06:47:42'),
(5, 'test demo', 3, 20, '2019-08-28 07:10:43', '2019-08-28 07:10:43'),
(9, 'Dora this image is so cool ,username said', 2, 37, '2019-08-30 07:20:52', '2019-08-30 07:20:52'),
(10, 'It is beautifuly Image.', 7, 37, '2019-08-30 11:39:51', '2019-08-30 11:39:51'),
(11, 'WOW~~~ The image is so cute.  I think this is the most beautiful picture I have ever seen.', 4, 37, '2019-08-30 11:57:58', '2019-08-30 11:57:58');

-- --------------------------------------------------------

--
-- 資料表結構 `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `conversation`
--

INSERT INTO `conversation` (`id`, `user_one`, `user_two`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 0, '2019-08-29 12:53:42', '2019-08-29 12:53:42'),
(2, 6, 2, 1, '2019-08-23 11:03:23', '2019-08-23 11:03:23'),
(7, 2, 14, 0, '2019-08-23 14:15:37', '2019-08-23 14:15:37'),
(8, 2, 13, 0, '2019-08-29 12:54:28', '2019-08-29 12:54:28');

-- --------------------------------------------------------

--
-- 資料表結構 `friendships`
--

CREATE TABLE `friendships` (
  `id` bigint(20) NOT NULL,
  `requester` bigint(20) NOT NULL,
  `user_requested` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `friendships`
--

INSERT INTO `friendships` (`id`, `requester`, `user_requested`, `status`, `updated_at`, `created_at`) VALUES
(2, 2, 4, 0, '2019-08-15 22:41:51', '2019-08-15 22:41:51'),
(3, 2, 5, 0, '2019-08-15 22:41:52', '2019-08-15 22:41:52'),
(5, 7, 3, 0, '2019-08-15 22:42:19', '2019-08-15 22:42:19'),
(6, 7, 4, 0, '2019-08-15 22:42:19', '2019-08-15 22:42:19'),
(7, 7, 5, 0, '2019-08-15 22:42:21', '2019-08-15 22:42:21'),
(8, 14, 2, 1, '2019-08-19 08:22:11', '2019-08-15 22:42:38'),
(9, 14, 4, 0, '2019-08-15 22:42:39', '2019-08-15 22:42:39'),
(11, 3, 16, 0, '2019-08-15 22:43:09', '2019-08-15 22:43:09'),
(12, 3, 15, 1, '2019-08-29 12:48:13', '2019-08-15 22:43:10'),
(13, 3, 6, 0, '2019-08-15 22:43:15', '2019-08-15 22:43:15'),
(14, 2, 6, 1, '2019-08-17 06:45:13', '2019-08-16 22:44:41'),
(17, 2, 3, 1, '2019-08-18 06:39:42', '2019-08-17 22:39:34'),
(20, 12, 3, 0, '2019-08-19 00:25:14', '2019-08-19 00:25:14'),
(22, 14, 3, 1, '2019-08-23 08:14:56', '2019-08-23 00:14:30'),
(24, 2, 12, 0, '2019-08-23 02:22:35', '2019-08-23 02:22:35'),
(25, 16, 2, 1, '2019-08-29 12:50:54', '2019-08-29 04:49:28'),
(26, 16, 7, 0, '2019-08-29 04:49:33', '2019-08-29 04:49:33'),
(27, 16, 10, 0, '2019-08-29 04:49:37', '2019-08-29 04:49:37'),
(28, 13, 2, 1, '2019-08-29 12:50:56', '2019-08-29 04:50:04'),
(29, 13, 3, 0, '2019-08-29 04:50:05', '2019-08-29 04:50:05'),
(30, 13, 12, 0, '2019-08-29 04:50:07', '2019-08-29 04:50:07'),
(31, 13, 14, 0, '2019-08-29 04:50:10', '2019-08-29 04:50:10'),
(32, 13, 15, 0, '2019-08-29 04:50:13', '2019-08-29 04:50:13'),
(33, 15, 2, 1, '2019-08-29 12:50:53', '2019-08-29 04:50:44'),
(34, 10, 2, 0, '2019-08-29 04:51:43', '2019-08-29 04:51:43'),
(35, 10, 3, 0, '2019-08-29 04:51:44', '2019-08-29 04:51:44'),
(36, 10, 14, 0, '2019-08-29 04:51:47', '2019-08-29 04:51:47'),
(37, 10, 15, 0, '2019-08-29 04:51:51', '2019-08-29 04:51:51');

-- --------------------------------------------------------

--
-- 資料表結構 `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(20) NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `skills`, `requirements`, `company_id`, `contact_email`, `created_at`, `updated_at`) VALUES
(4, 'Website Job', 'HTML,CSS,PHP', 'Good teamwork and communication skills.', 4, 'Jenny@gmail.com', '2019-08-26 13:13:28', '2019-08-26 13:13:28'),
(5, 'company job', 'PHP,MySql', 'check all into of job\r\nGood Coding Style, program modularization and functional architecture design ', 2, 'userman@gmail.com', '2019-08-26 13:12:55', '2019-08-26 13:12:55'),
(6, 'PHP Job', 'PHP,Laravel,Vuejs', 'It is very difficult job.\r\nWe uses L.N.M.P with Laravel framework architecture. ', 3, 'userwoman@gmail.com', '2019-08-26 13:13:14', '2019-08-26 13:13:14');

-- --------------------------------------------------------

--
-- 資料表結構 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 20, 2, '2019-08-27 08:45:33', '2019-08-27 08:45:33'),
(6, 18, 2, '2019-08-27 12:18:11', '2019-08-27 12:18:11'),
(7, 17, 3, '2019-08-27 12:26:54', '2019-08-27 12:26:54'),
(8, 20, 3, '2019-08-27 12:26:58', '2019-08-27 12:26:58'),
(9, 20, 10, '2019-08-27 12:27:24', '2019-08-27 12:27:24'),
(10, 17, 10, '2019-08-27 12:27:26', '2019-08-27 12:27:26'),
(11, 19, 10, '2019-08-27 12:27:29', '2019-08-27 12:27:29'),
(12, 20, 5, '2019-08-27 12:29:39', '2019-08-27 12:29:39'),
(13, 19, 5, '2019-08-27 12:29:41', '2019-08-27 12:29:41'),
(14, 18, 5, '2019-08-27 12:29:43', '2019-08-27 12:29:43'),
(15, 17, 5, '2019-08-27 12:29:45', '2019-08-27 12:29:45'),
(16, 20, 2, '2019-08-28 09:25:21', '2019-08-28 09:25:21'),
(17, 37, 2, '2019-08-30 07:13:19', '2019-08-30 07:13:19'),
(18, 37, 7, '2019-08-30 11:39:09', '2019-08-30 11:39:09'),
(19, 37, 4, '2019-08-30 11:58:11', '2019-08-30 11:58:11');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `msgs` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `conversation_id`, `msgs`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 'Hello , I am username.\r\nHow are you userwoman?', 1, '2019-08-22 13:43:22', '2019-08-22 13:43:22'),
(2, 2, 6, 2, 'hello username what up?', 1, '2019-08-21 12:41:24', '2019-08-21 12:41:24'),
(3, 6, 2, 2, 'I am fine, you said', 1, '2019-08-21 12:41:27', '2019-08-21 12:41:27'),
(4, 3, 2, 1, 'I am userwoman .\r\nI am fine', 1, '2019-08-22 13:43:22', '2019-08-22 13:43:22'),
(5, 2, 3, 1, 'What are you doing userwoman?', 1, '2019-08-22 13:43:22', '2019-08-22 13:43:22'),
(6, 2, 6, 2, 'I am also fine W.DJ.', 1, '2019-08-22 08:00:00', '0000-00-00 00:00:00'),
(7, 2, 3, 1, 'username insert demo to userwoman', 1, '2019-08-22 13:25:10', '2019-08-22 13:25:10'),
(9, 3, 2, 1, 'I am very  busy Today. Now I can talk to you.', 1, '2019-08-22 13:35:36', '2019-08-22 13:35:36'),
(10, 2, 3, 1, 'userman\'s message does not refesh!!!!', 1, '2019-08-22 13:44:34', '2019-08-22 13:44:34'),
(11, 2, 3, 1, 'userman\'s message does not refesh!!!!', 1, '2019-08-22 13:58:50', '2019-08-22 13:58:50'),
(13, 2, 6, 2, 'hihihi wdj', 0, '2019-08-23 13:55:50', '2019-08-23 13:55:50'),
(17, 2, 14, 7, 'Hi Bill', 0, '2019-08-23 14:15:37', '2019-08-23 14:15:37'),
(18, 2, 14, 7, 'Bill message demo.', 0, '2019-08-23 14:15:51', '2019-08-23 14:15:51'),
(19, 2, 13, 8, 'Hello Allan!!\nCan i help me?', 0, '2019-08-29 12:54:28', '2019-08-29 12:54:28'),
(20, 6, 2, 2, 'hello...', 1, '2019-08-30 07:35:54', '2019-08-30 07:35:54'),
(23, 6, 2, 2, 'Is anything wrong?', 1, '2019-08-30 07:44:27', '2019-08-30 07:44:27');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_06_084630_create_profile_table', 1),
(4, '2019_08_16_053932_create_notifcations_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `notifcations`
--

CREATE TABLE `notifcations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_logged` int(11) NOT NULL,
  `user_hero` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `notifcations`
--

INSERT INTO `notifcations` (`id`, `user_logged`, `user_hero`, `note`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 2, 'accept your friend request', 1, '2019-08-16 22:45:14', '2019-08-16 22:45:14'),
(5, 3, 2, 'accept your friend request', 0, '2019-08-17 22:39:42', '2019-08-17 22:39:42'),
(7, 2, 14, 'accept your friend request', 1, '2019-08-22 23:53:48', '2019-08-22 23:53:48'),
(8, 3, 14, 'accept your friend request', 1, '2019-08-23 00:14:56', '2019-08-23 00:14:56'),
(9, 15, 3, 'accept your friend request', 1, '2019-08-29 04:48:13', '2019-08-29 04:48:13'),
(10, 2, 15, 'accept your friend request', 1, '2019-08-29 04:50:53', '2019-08-29 04:50:53'),
(11, 2, 16, 'accept your friend request', 1, '2019-08-29 04:50:54', '2019-08-29 04:50:54'),
(12, 2, 13, 'accept your friend request', 1, '2019-08-29 04:50:56', '2019-08-29 04:50:56');

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(8, 'wwwen7931@gmail.com', '$2y$10$yw.4VmMW7Zu7CEAOKeYru22LLW7xeZXFrdH7ZSj8W33bJSOthbG', '2019-08-24 07:59:35');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(14, 3, 'Hello~~\nI am a userwoman.\nI post a new demon ,you can see', NULL, 0, '2019-08-20 12:46:47', '2019-08-20 12:46:47'),
(17, 2, 'I am very busy ,Today\nenjoy computer', NULL, 0, '2019-08-26 15:09:12', '2019-08-26 15:09:12'),
(18, 10, 'I was played basketball with friend Afternoon\nNow I am reading novel.\nToday is very happy.', NULL, 0, '2019-08-26 15:12:09', '2019-08-26 15:12:09'),
(19, 9, 'Today is a very good day. \nMy Mom made breakfast for me and it is delicious.', NULL, 0, '2019-08-26 15:13:39', '2019-08-26 15:13:39'),
(20, 15, 'Hello everyone~~\nToday ,the weather is so good.\nI go shopping Afteroon.', NULL, 0, '2019-08-27 08:03:14', '2019-08-27 08:03:14'),
(22, 2, 'I post demo does not refresh the page of null edit test', NULL, 0, '2019-08-31 16:38:03', '2019-08-31 16:38:03'),
(34, 16, NULL, 'lAsWes18nh.png', 0, '2019-08-29 13:06:46', '2019-08-29 13:06:46'),
(37, 15, 'this is demo Image demo', 'vBzlHdysvS.png', 0, '2019-08-31 11:21:06', '2019-08-31 11:21:06');

-- --------------------------------------------------------

--
-- 資料表結構 `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `city`, `country`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Taipei', 'Taiwan', 'I com from Taiwan.\r\nI\'m Taiwanese.', NULL, '2019-08-15 22:15:12', '2019-08-15 22:15:12'),
(2, 3, 'Tokyo', 'Japan', 'I have lived in Japan for 10 years\r\nI am a singer', NULL, '2019-08-15 22:17:16', '2019-08-15 22:17:16'),
(3, 4, 'Los Angeles', 'USA', 'II\'m American \r\nI\'m from USA', NULL, '2019-08-15 22:21:46', '2019-08-15 22:21:46'),
(4, 5, NULL, NULL, NULL, NULL, '2019-08-15 22:23:45', '2019-08-15 22:23:45'),
(5, 6, 'Puli,Nantou', 'Taiwan', 'I am an engineer.\r\nI  like playing basketball.', NULL, '2019-08-15 22:24:32', '2019-08-15 22:24:32'),
(6, 7, NULL, NULL, NULL, NULL, '2019-08-15 22:27:37', '2019-08-15 22:27:37'),
(7, 8, 'Sydney', 'Australia', 'Hello~~\r\nI am a webmaster', NULL, '2019-08-15 22:28:33', '2019-08-15 22:28:33'),
(8, 9, 'Bangkok', 'Thailand', 'haahaa', NULL, '2019-08-15 22:30:58', '2019-08-15 22:30:58'),
(9, 10, 'London', 'England', 'Hello~~', NULL, '2019-08-15 22:32:40', '2019-08-15 22:32:40'),
(10, 11, NULL, NULL, NULL, NULL, '2019-08-15 22:34:10', '2019-08-15 22:34:10'),
(11, 12, NULL, NULL, NULL, NULL, '2019-08-15 22:34:52', '2019-08-15 22:34:52'),
(12, 13, NULL, NULL, NULL, NULL, '2019-08-15 22:37:08', '2019-08-15 22:37:08'),
(13, 14, NULL, NULL, NULL, NULL, '2019-08-15 22:38:01', '2019-08-15 22:38:01'),
(14, 15, NULL, NULL, NULL, NULL, '2019-08-15 22:39:26', '2019-08-15 22:39:26'),
(15, 16, NULL, NULL, NULL, NULL, '2019-08-15 22:40:41', '2019-08-15 22:40:41'),
(16, 17, NULL, NULL, NULL, NULL, '2019-08-23 07:19:31', '2019-08-23 07:19:31');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `slug`, `phone`, `email`, `image`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'username', 'male', 'username', '(049)2989652', 'userman@gmail.com', 'boy.png', 'company', '$2y$10$VkXc6gci1PV3Ezvd44bM1u25nUiLlBP92QmcJZolX3N3N5m0OJHry', NULL, '2019-08-15 22:15:12', '2019-08-15 22:15:12'),
(3, 'userwoman', 'female', 'userwoman', '07-3632451', 'userwoman@gmail.com', 'girl1.png', NULL, '$2y$10$oPfWK7YyS9JwTHdbhb4vMe4eOm/didG9JtQuUQGcM1CM2bbPxzawe', NULL, '2019-08-15 22:17:16', '2019-08-15 22:17:16'),
(4, 'Jenny', 'female', 'jenny', '07-456987', 'Jenny@gmail.com', 'girl.png', NULL, '$2y$10$hgIRTseE8bMHDeohnMQI/ubvrZRAleC30Xkzfe5q2vWOGsDKGT7hu', NULL, '2019-08-15 22:21:46', '2019-08-15 22:21:46'),
(5, 'Andy', 'male', 'andy', '07-3638956', 'Andy@gmail.com', 'boy2.png', NULL, '$2y$10$3V/7dTLvpUHnAOGSGRCU.ud0yh.ynd9MHv2ye5fVGv5V5wxQ8BxMi', NULL, '2019-08-15 22:23:45', '2019-08-15 22:23:45'),
(6, 'WDJ', 'male', 'wdj', '07-3633343', 'WDJ@gmail.com', '2.png', NULL, '$2y$10$wZf.RqKmFVMnZ3nNQ08.TuFxVz8zQ9.gyr7td7ks/bmhj1F4R/P7O', NULL, '2019-08-15 22:24:32', '2019-08-15 22:24:32'),
(7, 'Sally', 'female', 'sally', '049-2988654', 'Sally@gmail.com', 'girl3.png', NULL, '$2y$10$VGM8hy3w71w4uhwEavXDguoTpzrdKWddhN4G7KuVmDmn9zRRaLzkG', NULL, '2019-08-15 22:27:36', '2019-08-15 22:27:36'),
(8, 'Root', 'male', 'root', '07-654321', 'root@gmail.com', 'boy3.png', NULL, '$2y$10$RdROokdrT7sFBvYBzP6qzuTSXoaFY6pocMhW8zbyDunGxQnX//mmu', NULL, '2019-08-15 22:28:33', '2019-08-15 22:28:33'),
(9, 'John', 'male', 'john', '02-654987', 'John@gmail.com', 'boy4.png', NULL, '$2y$10$xFa.7Lg42Nai2zobrMuHqegkNe0LKg5gJYSodL9.0Bl28yaaThOXq', NULL, '2019-08-15 22:30:58', '2019-08-15 22:30:58'),
(10, 'Bella', 'female', 'bella', '07-987321', 'Bella@gmail.com', 'girl4.png', NULL, '$2y$10$IjX2Is0VbevtT4R8RG9sQeRySG.FAi0TY/kCSyawFz6Fhq9Fo9P4G', NULL, '2019-08-15 22:32:39', '2019-08-15 22:32:39'),
(11, 'Linda', 'female', 'linda', '02-897652', 'Linda@gmail.com', 'girl5.png', NULL, '$2y$10$K.G2PuqA3mLUZJUlqqUmUeO5Rf3lz.8WPttvPWToMea92e.J6iMtW', NULL, '2019-08-15 22:34:10', '2019-08-15 22:34:10'),
(12, 'Sam', 'male', 'sam', '049-8596321', 'Sam@gmail.com', 'boy5.png', NULL, '$2y$10$7a51er9ipRKORdT6FngPq.HyME70CUcA8lhhIGCgguf5Uripf0wl.', NULL, '2019-08-15 22:34:52', '2019-08-15 22:34:52'),
(13, 'Allan', 'male', 'allan', '07-3658945', 'Allan@gmail.com', 'boy6.png', NULL, '$2y$10$r4YN.T/4To/iqQw9CIDxTOTVROLdma9BCa26aJQFnjTVWDxxYPJNW', NULL, '2019-08-15 22:37:08', '2019-08-15 22:37:08'),
(14, 'Bill', 'male', 'bill', '07-3698525', 'Bill@gmail.com', 'person.png', NULL, '$2y$10$EDM1kJe8hOId0l14/Yv6vOSH6rtbM0qC5LKeqkvEDH9YHTIshjDzK', NULL, '2019-08-15 22:38:01', '2019-08-15 22:38:01'),
(15, 'Dora', 'female', 'dora', '07-3625419', 'Dora@gmail.com', 'girl6.png', NULL, '$2y$10$zMTKK.pi5K1ZSTlAw.Hmeu5wYqMpzrxYqw2cL/MU52tRkgzgNdXHW', NULL, '2019-08-15 22:39:25', '2019-08-15 22:39:25'),
(16, 'Tina', 'female', 'tina', '049-2955648', 'Tina@gmail.com', 'girl7.png', NULL, '$2y$10$NIlbonGLmFghocGAQ.Fgie6cQv0rGTqXcMjvXzcy5wpLKKA0Hupc.', NULL, '2019-08-15 22:40:41', '2019-08-15 22:40:41'),
(17, 'testmail', 'male', 'testmail', '07-3625841', 'wwwen7931@gmail.com', 'envelope.png', NULL, '$2y$10$N2e2EcmaD8iCagsbNtyPCeu6Y/WvbmRIpvKpuFGBUHFnbq5TgmY6e', NULL, '2019-08-23 07:19:31', '2019-08-23 07:19:31');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `notifcations`
--
ALTER TABLE `notifcations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表 AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表 AUTO_INCREMENT `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `notifcations`
--
ALTER TABLE `notifcations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表 AUTO_INCREMENT `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
