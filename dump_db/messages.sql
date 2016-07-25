-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 10:01 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messages`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `published_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_user_to`, `id_sender`, `message`, `is_new`, `deleted`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Тестовое сообщение от клиента новое', 1, 1, '2016-07-16 18:05:24', NULL, '2016-07-25 04:01:07'),
(2, 4, 2, 'Тестовое сообщение от админа клиенту прочитаное', 0, 1, '2016-07-15 18:15:24', NULL, '2016-07-25 04:01:07'),
(3, 2, 4, 'У меня есть вопрос к админу! Прочитаное сообщение.', 0, 1, '2016-07-15 18:08:44', NULL, '2016-07-25 04:01:07'),
(4, 4, 2, 'Не прочитаное сообщение от админа клиенту.', 1, 1, '2016-07-17 08:10:51', NULL, '2016-07-25 04:01:07'),
(42, 2, 4, 'torba', 1, 1, '2016-07-22 02:57:18', '2016-07-21 20:57:18', '2016-07-25 04:01:07'),
(43, 2, 5, 'Hello admin!', 1, 0, '2016-07-22 02:58:40', '2016-07-21 20:58:40', '2016-07-21 20:58:40'),
(44, 2, 4, 'yo', 1, 1, '2016-07-22 11:52:05', '2016-07-22 05:52:05', '2016-07-25 04:01:07'),
(45, 2, 5, 'Ask new question', 1, 0, '2016-07-22 21:01:29', NULL, NULL),
(46, 4, 2, 'yo?', 1, 1, '2016-07-25 08:38:35', '2016-07-25 02:38:35', '2016-07-25 04:01:07'),
(47, 4, 2, 'aaand?', 1, 1, '2016-07-25 08:40:59', '2016-07-25 02:40:59', '2016-07-25 04:01:07'),
(48, 4, 2, 'relax', 1, 1, '2016-07-25 08:42:20', '2016-07-25 02:42:20', '2016-07-25 04:01:07'),
(49, 5, 2, 'what do u want?', 1, 0, '2016-07-25 08:42:36', '2016-07-25 02:42:36', '2016-07-25 02:42:36'),
(50, 4, 2, 'and u?', 1, 1, '2016-07-25 08:42:55', '2016-07-25 02:42:55', '2016-07-25 04:01:07'),
(51, 5, 2, 'i want it', 1, 0, '2016-07-25 08:43:08', '2016-07-25 02:43:08', '2016-07-25 02:43:08'),
(52, 4, 2, 'im fine', 1, 1, '2016-07-25 08:49:10', '2016-07-25 02:49:10', '2016-07-25 04:01:07'),
(53, 5, 2, 'and u j?', 1, 0, '2016-07-25 08:49:24', '2016-07-25 02:49:24', '2016-07-25 02:49:24'),
(54, 4, 2, 'relax', 1, 1, '2016-07-25 08:49:31', '2016-07-25 02:49:31', '2016-07-25 04:01:07'),
(55, 5, 2, 'coool)', 1, 0, '2016-07-25 08:49:37', '2016-07-25 02:49:37', '2016-07-25 02:49:37'),
(56, 4, 2, '777', 1, 1, '2016-07-25 08:49:51', '2016-07-25 02:49:51', '2016-07-25 04:01:07'),
(57, 5, 2, 'what?', 1, 0, '2016-07-25 08:50:02', '2016-07-25 02:50:02', '2016-07-25 02:50:02'),
(58, 4, 2, 'norm', 1, 1, '2016-07-25 08:50:09', '2016-07-25 02:50:09', '2016-07-25 04:01:07'),
(59, 2, 5, 'rrr', 1, 0, '2016-07-25 09:06:54', '2016-07-25 03:06:54', '2016-07-25 03:06:54'),
(60, 2, 5, '!', 1, 0, '2016-07-25 09:12:44', '2016-07-25 03:12:44', '2016-07-25 03:12:44'),
(61, 5, 2, 'sgsgd', 1, 0, '2016-07-25 09:26:37', '2016-07-25 03:26:37', '2016-07-25 03:26:37'),
(62, 5, 2, '11', 1, 0, '2016-07-25 09:32:19', '2016-07-25 03:32:19', '2016-07-25 03:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_15_175754_create_roles_table', 1),
('2016_07_19_180307_create_users_table', 1),
('2016_07_25_275837_create_messages_table', 1),
('2016_07_20_180307_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `name`, `lastname`, `email`, `password`, `active`, `deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Volodymyr', '', 'maslechkin.v@gmail.com', '$2y$10$SKu3az.HKV8gPq06343upuASnkPbt2HqKaj45SAfxAW6VuLeHJHee', 0, 0, 'Gkwu9pjprgewWi4MeNvhj5YJI7dCN9lZOSnbKnnoVX396yuxD7BU3TcqegdR', '2016-07-16 18:10:16', '2016-07-22 15:01:53'),
(5, 2, 'Tatiana 2', '', 'briryl.2@gmail.com', '$2y$10$xJZIuIwBNsUV2N/skjPF8e9qRGtCZcCR6ed1FO6CNI/q14C1CtEx.', 0, 0, '2qFgaIhFlaj9sCQSdUppligcl8NDonRfatRoOjsN5xfxmTTsXtoT1QqMRtwO', '2016-07-21 20:58:24', '2016-07-25 02:21:59'),
(4, 2, 'Tetiana', '', 'briryl.y@gmail.com', '$2y$10$mmWxAaA15s9XEW.iscuKZe3SIeV6vwuiN43yMCv6bhGwfMiKnYzz.', 0, 1, '6xouuIhzw3xQSjORCXXaFGAXnqUOAa9NGoveBEKjbkuPE86YV0OC4hcv58X8', '2016-07-16 18:31:47', '2016-07-25 02:22:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
