-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 04 2019 г., 21:12
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.0

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
  `model` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `number` int(100) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `blancuri`
--

INSERT INTO `blancuri` (`id`, `day`, `model`, `section_id`, `number`, `tip_id`, `name`) VALUES
(1, '2019-04-02', 'Arhitect', 1, 500, 1, 'niculita nicolae'),
(2, '2019-04-10', 'hemoleucograma', 5, 100, 1, 'niculita nicolae'),
(3, '2019-04-12', 'immulite', 5, 600, 3, 'niculita nicolae'),
(18, '2019-04-11', 'wzdgvbmz', 10, 500, 2, 'nicolae'),
(19, '2019-04-09', 'Arhitect', 11, 500, 2, 'valea');

-- --------------------------------------------------------

--
-- Структура таблицы `sectie`
--

CREATE TABLE `sectie` (
  `id` int(11) NOT NULL,
  `section` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `sectie`
--

INSERT INTO `sectie` (`id`, `section`) VALUES
(1, 'LCD Laboratorul de Diagnostic Clinic'),
(2, 'USG Secţia Ultrasonografie Generală'),
(3, 'RTC Secţia Radiologie si tomografie computerizată'),
(4, 'DF Secţia Diagnostic Funcțional'),
(5, 'ESVM Secţia Ecocardiografie și Studiul Vaselor Magistrale'),
(6, 'LMN Laboratorul Medicină Nucleară'),
(7, 'IRM Imagistică prin rezonanță magnetică'),
(8, 'SMEI Monitorizare, Evaluare și Integrare'),
(9, 'Tehnologii Informaționale'),
(10, 'Resurse Umane'),
(11, 'Administraţia'),
(12, 'Consultaivă'),
(13, 'Endoscopie');

-- --------------------------------------------------------

--
-- Структура таблицы `tipul`
--

CREATE TABLE `tipul` (
  `id` int(11) NOT NULL,
  `format` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tipul`
--

INSERT INTO `tipul` (`id`, `format`) VALUES
(1, 'A4'),
(2, 'A5'),
(3, 'A3'),
(4, 'Plicuri CD'),
(5, 'Plicuri C5'),
(6, 'Plicuri C6'),
(7, 'Plicuri DL');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'nicolae', 'nicu@crdm.md', 'admin', '098f6bcd4621d373cade4e832627b4f6'),
(6, 'valea', 'valentina.mihalco@gmail.com', 'user', 'c1eb7df636e486e7cd59c14b884d9881');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blancuri`
--
ALTER TABLE `blancuri`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sectie`
--
ALTER TABLE `sectie`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tipul`
--
ALTER TABLE `tipul`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blancuri`
--
ALTER TABLE `blancuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `sectie`
--
ALTER TABLE `sectie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `tipul`
--
ALTER TABLE `tipul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
