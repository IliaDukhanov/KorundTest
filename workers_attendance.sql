-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 29 2020 г., 22:52
-- Версия сервера: 5.7.15
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `workers_attendance`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lateness`
--

CREATE TABLE `lateness` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `offset` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `login`, `name`, `last_name`, `offset`) VALUES
(1, 'qwe', 'qwe', 'qwe', '0'),
(2, 'ewq', 'ewq', 'ewq', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `workday`
--

CREATE TABLE `workday` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_stop` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `workday_pause`
--

CREATE TABLE `workday_pause` (
  `id` int(11) NOT NULL,
  `workday_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_stop` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lateness`
--
ALTER TABLE `lateness`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `workday`
--
ALTER TABLE `workday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Индексы таблицы `workday_pause`
--
ALTER TABLE `workday_pause`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workday_id` (`workday_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lateness`
--
ALTER TABLE `lateness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `workday`
--
ALTER TABLE `workday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `workday_pause`
--
ALTER TABLE `workday_pause`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lateness`
--
ALTER TABLE `lateness`
  ADD CONSTRAINT `lateness_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Ограничения внешнего ключа таблицы `workday`
--
ALTER TABLE `workday`
  ADD CONSTRAINT `workday_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Ограничения внешнего ключа таблицы `workday_pause`
--
ALTER TABLE `workday_pause`
  ADD CONSTRAINT `workday_pause_ibfk_1` FOREIGN KEY (`workday_id`) REFERENCES `workday` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
