-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 18 2019 г., 16:57
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `andysafin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `english_word`
--

CREATE TABLE `english_word` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `english_word`
--

INSERT INTO `english_word` (`id`, `name`, `name_id`) VALUES
(1, 'House', 1),
(2, 'Nature', 2),
(3, 'Sport', 3),
(4, 'random', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `english_word_translation`
--

CREATE TABLE `english_word_translation` (
  `id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `english_word_translation`
--

INSERT INTO `english_word_translation` (`id`, `name`) VALUES
(1, 'Дом'),
(2, 'Природа'),
(3, 'Спорт'),
(4, 'случайный');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `english_word`
--
ALTER TABLE `english_word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_id` (`name_id`);

--
-- Индексы таблицы `english_word_translation`
--
ALTER TABLE `english_word_translation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `english_word`
--
ALTER TABLE `english_word`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `english_word_translation`
--
ALTER TABLE `english_word_translation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `english_word`
--
ALTER TABLE `english_word`
  ADD CONSTRAINT `english_word_ibfk_1` FOREIGN KEY (`name_id`) REFERENCES `english_word_translation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
