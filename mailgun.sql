-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2018 г., 14:20
-- Версия сервера: 5.7.13-log
-- Версия PHP: 7.0.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mailgun`
--
CREATE DATABASE IF NOT EXISTS `mailgun` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mailgun`;

-- --------------------------------------------------------

--
-- Структура таблицы `bunches`
--

CREATE TABLE IF NOT EXISTS `bunches` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bunches`
--

INSERT INTO `bunches` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1ddsds', NULL, 1, '2017-10-19 05:09:54', '2017-10-19 05:10:04', '2017-10-19 05:10:04'),
(2, '2ddfc222', 'cdddc', 1, '2017-10-19 05:10:12', '2017-10-19 05:13:26', '2017-10-19 05:13:26'),
(3, 'the teachers emails', NULL, 1, '2017-10-19 05:13:36', '2018-06-24 07:10:05', NULL),
(4, 'test emails', NULL, 1, '2017-10-22 18:01:56', '2018-06-24 07:09:02', NULL),
(5, 'bunch2-1', 'bunch_description2-1', 2, '2017-10-31 09:10:32', '2017-10-31 09:10:32', NULL),
(6, '2018 students emails', NULL, 1, '2017-11-03 08:49:53', '2018-06-24 07:07:46', NULL),
(7, '2017 students emails', NULL, 1, '2017-11-03 09:05:14', '2018-06-24 07:07:26', NULL),
(8, 'real emails', 'my real google.com emails', 1, '2017-11-12 05:54:26', '2018-06-24 07:06:31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `bunch_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `description`, `template_id`, `bunch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a new X course start', 'a new X course start', 5, 7, 1, '2017-10-23 06:06:33', '2018-06-24 07:12:19', NULL),
(2, '1-3 erregreg', 'ergregr', 8, 7, 1, '2017-11-03 09:16:58', '2017-11-28 18:49:47', '2017-11-28 18:49:47'),
(3, 'first test', 'A first test mailing to the real emails', 9, 8, 1, '2017-11-12 05:56:58', '2018-06-24 07:15:09', NULL),
(4, 'Added a new seminar', NULL, 8, 6, 1, '2018-06-24 07:19:22', '2018-06-24 07:19:22', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_10_12_231431_create_campaigns_table', 1),
(12, '2017_10_12_232713_create_subscribers_table', 1),
(13, '2017_10_12_232811_create_templates_table', 1),
(14, '2017_10_12_233030_create_bunches_table', 1),
(15, '2017_10_14_183032_create_subscriber_bunches_table', 1),
(16, '8017_10_14_184043_create_relations_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `firstname`, `lastname`, `email`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '2-1gbgfbgfbgf', '2sfdsfds', '2-23@dfd.ss', 1, '2017-11-01 12:47:11', '2017-11-01 12:47:11', NULL),
(15, '1-7-1', 'dfff', 'fff@ff.ff', 1, '2017-11-03 09:24:37', '2017-11-03 09:24:37', NULL),
(16, 'snmartusenko1', NULL, 'snmartusenko+1@gmail.com', 1, '2017-11-12 05:55:33', '2017-11-12 05:55:33', NULL),
(17, 'snmartusenko2', NULL, 'snmartusenko+2@gmail.com', 1, '2017-11-12 05:55:52', '2017-11-12 05:56:04', NULL),
(18, 'snmartusenko3', NULL, 'snmartusenko+3@gmail.com', 1, '2017-11-12 05:56:20', '2017-11-12 05:56:20', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subscriber_bunches`
--

CREATE TABLE IF NOT EXISTS `subscriber_bunches` (
  `id` int(10) unsigned NOT NULL,
  `subscriber_id` int(10) unsigned NOT NULL,
  `bunch_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscriber_bunches`
--

INSERT INTO `subscriber_bunches` (`id`, `subscriber_id`, `bunch_id`) VALUES
(1, 14, 4),
(2, 15, 7),
(3, 16, 8),
(4, 17, 8),
(5, 18, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `templates`
--

INSERT INTO `templates` (`id`, `name`, `content`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ddffd', 'fgfdgdfg', 1, '2017-10-16 11:02:03', '2017-10-17 04:39:01', '2017-10-17 04:39:01'),
(2, 'cdcsdc', 'sdcdsc', 1, '2017-10-17 04:39:52', '2017-10-17 05:09:24', '2017-10-17 05:09:24'),
(3, 'dsdsdf', 'dsdsfdfd', 1, '2017-10-17 05:09:54', '2017-10-17 05:10:10', '2017-10-17 05:10:10'),
(4, 'Happy New Year!!!', '<p><img alt="" src="http://www.danaoshotel.gr/wp-content/uploads/2017/01/happy-new-year-2017-balls.jpg" style="height:378px; width:640px" /></p>', 1, '2017-10-17 05:10:32', '2018-06-24 06:37:35', NULL),
(5, 'Looking for the talented students', '<p><img alt="" src="http://cdn.cs50.net/2014/fall/lectures/7/w/src7w/logo.gif" style="height:110px; width:503px" /></p>\r\n\r\n<p>Attention!</p>\r\n\r\n<p>We are looking for the talented students for our new secret course :)</p>', 1, '2017-10-19 04:38:52', '2018-06-24 06:51:00', NULL),
(6, 'template2-1', 'content2-1', 2, '2017-10-31 09:10:01', '2017-10-31 09:10:01', NULL),
(7, '1-4 gggrtgtrgtr', '<p>hhthythhynyn<s>nyynyny<em>ynyttnty45435435</em></s></p>', 1, '2017-11-03 08:35:20', '2017-11-03 08:40:32', '2017-11-03 08:40:32'),
(8, 'The changes of seminars schedule', '<p>Hello!<br />\r\nWe have some changes in the seminars schedule.<br />\r\nPlease see on your campus sites.</p>', 1, '2017-11-03 09:04:29', '2018-06-24 06:57:31', NULL),
(9, 'Hello! This is CS50 :)', '<h2 style="font-style:italic"><img alt="" src="https://edx.prometheus.org.ua/c4x/Prometheus/CS50/asset/edx2.jpeg" /></h2>\r\n\r\n<h2 style="font-style:italic"><em>Good day!</em><br />\r\nYou have received this letter because subscribed to our newsletter :)</h2>', 1, '2017-11-20 21:47:56', '2018-06-24 06:45:01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Serg', 'snmartusenko@gmail.com', '$2y$10$VjWkDk9H/YlwFE43ydpcxuO37CtTo8y5BNu7fqS0znKP167fEss1O', 'MH8PtSO5YXWSZxyrH3NzHY5yaQFuTXDDX8AzgacvDOkKiS5hZboAZLpA8jPr', '2017-10-14 16:23:45', '2017-10-14 16:23:45', NULL),
(2, 'Serg2', 'snmartusenko+2@gmail.com', '$2y$10$A6Qb3WpA//HTWs9HLw.YYuUDzC6PYjO.0mK6r.TgO46s5N4Cr.DDm', 'nXVAJhyUHauUtVLgQBQ5c8LHnxrLgly66LkHoilMGqmhiQYkDxp8WfKgIjyj', '2017-10-31 09:04:52', '2017-10-31 09:04:52', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bunches`
--
ALTER TABLE `bunches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bunches_name_unique` (`name`),
  ADD KEY `bunches_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaigns_name_unique` (`name`),
  ADD KEY `campaigns_user_id_foreign` (`user_id`),
  ADD KEY `campaigns_template_id_foreign` (`template_id`),
  ADD KEY `campaigns_bunch_id_foreign` (`bunch_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `subscriber_bunches`
--
ALTER TABLE `subscriber_bunches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriber_bunches_bunch_id_foreign` (`bunch_id`),
  ADD KEY `subscriber_bunches_subscriber_id_foreign` (`subscriber_id`);

--
-- Индексы таблицы `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `templates_name_unique` (`name`),
  ADD KEY `templates_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bunches`
--
ALTER TABLE `bunches`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `subscriber_bunches`
--
ALTER TABLE `subscriber_bunches`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bunches`
--
ALTER TABLE `bunches`
  ADD CONSTRAINT `bunches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_bunch_id_foreign` FOREIGN KEY (`bunch_id`) REFERENCES `bunches` (`id`),
  ADD CONSTRAINT `campaigns_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  ADD CONSTRAINT `campaigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `subscriber_bunches`
--
ALTER TABLE `subscriber_bunches`
  ADD CONSTRAINT `subscriber_bunches_bunch_id_foreign` FOREIGN KEY (`bunch_id`) REFERENCES `bunches` (`id`),
  ADD CONSTRAINT `subscriber_bunches_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`);

--
-- Ограничения внешнего ключа таблицы `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
