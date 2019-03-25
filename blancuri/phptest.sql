-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2019 г., 10:52
-- Версия сервера: 10.1.38-MariaDB
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
-- База данных: `crdm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blancuri`
--

CREATE TABLE `blancuri` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `model` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `number` int(11) NOT NULL,
  `tip` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `blancuri`
--

INSERT INTO `blancuri` (`id`, `day`, `model`, `section`, `number`, `tip`, `name`) VALUES
(19, '2019-03-20', 'Plicuri', 'RTC', 500, 'Plicuri', 'niculita nicolae'),
(20, '2019-03-20', 'Arhitect', 'LCD', 500, 'A4', 'niculita nicolae'),
(21, '2019-03-20', 'Tichete Pentru casa ', 'DF', 500, 'A4', 'niculita nicolae'),
(22, '2019-03-20', 'Arhitect', 'RTC', 500, 'A4', 'niculita nicolae');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blancuri`
--
ALTER TABLE `blancuri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blancuri`
--
ALTER TABLE `blancuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
