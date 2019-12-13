-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2019 г., 07:28
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tms3db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mess`
--

CREATE TABLE `mess` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `datetime_mess` datetime DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mess`
--

INSERT INTO `mess` (`id`, `from_id`, `to_id`, `datetime_mess`, `message`, `status`) VALUES
(1, 1, 2, '2019-12-03 21:57:35', 'Привет!', NULL),
(3, 1, 2, '2019-12-05 23:01:33', 'Тест', NULL),
(4, 1, 2, '2019-12-05 23:03:42', 'Проверка связи', NULL),
(5, 1, 2, '2019-12-05 23:04:07', 'Аунечки!', NULL),
(6, 1, 2, '2019-12-09 22:32:12', 'dsfdsfdsfdsfsdf', NULL),
(7, 2, 1, '2019-12-09 22:44:16', 'Ну привет', NULL),
(8, 1, 2, '2019-12-09 23:16:36', 'Как дела?', NULL),
(9, 2, 1, '2019-12-09 23:16:45', 'Нормуль', NULL),
(10, 1, 2, '2019-12-09 23:17:05', 'что делаешь?', NULL),
(11, 2, 1, '2019-12-09 23:17:15', 'бамбук куру', NULL),
(12, 1, 2, '2019-12-10 22:48:39', 'привет, медвед', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1575378959),
('m190726_125010_create_user_table', 1575378961),
('m191203_140334_create_mess_table', 1575382006);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `access_token`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mess`
--
ALTER TABLE `mess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
