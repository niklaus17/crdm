-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2019 г., 14:46
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
-- Структура таблицы `formular`
--

CREATE TABLE `formular` (
  `id` int(11) NOT NULL,
  `cabinet` varchar(50) NOT NULL,
  `section_id` int(11) NOT NULL,
  `executor` varchar(50) NOT NULL,
  `nume_dispozitiv` varchar(50) NOT NULL,
  `anul_producerii_dispozitiv` date NOT NULL,
  `model_dispozitiv` varchar(50) NOT NULL,
  `nr_serie_dispozitiv` varchar(50) NOT NULL,
  `producator_dispozitiv` varchar(50) NOT NULL,
  `numar_inventar` varchar(50) NOT NULL,
  `denumire_piesa` varchar(50) NOT NULL,
  `model_piesa` varchar(50) NOT NULL,
  `producator_piesa` varchar(50) NOT NULL,
  `anul_producerii_piesa` date NOT NULL,
  `nr_serie_dispozitiv_piesa` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `denumire_piesa_instal` varchar(50) NOT NULL,
  `model_piesa_instal` varchar(50) NOT NULL,
  `producator_piesa_instal` varchar(50) NOT NULL,
  `anul_producerii_piesa_instal` date NOT NULL,
  `nr_serie_dispozitiv_instal` varchar(50) NOT NULL,
  `altele` varchar(50) NOT NULL,
  `data_instalarii` date NOT NULL,
  `garantie` int(50) NOT NULL,
  `net` varchar(50) NOT NULL,
  `comentarii` varchar(100) NOT NULL,
  `beneficiar` varchar(50) NOT NULL,
  `furnizor` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `formular`
--

INSERT INTO `formular` (`id`, `cabinet`, `section_id`, `executor`, `nume_dispozitiv`, `anul_producerii_dispozitiv`, `model_dispozitiv`, `nr_serie_dispozitiv`, `producator_dispozitiv`, `numar_inventar`, `denumire_piesa`, `model_piesa`, `producator_piesa`, `anul_producerii_piesa`, `nr_serie_dispozitiv_piesa`, `part_number`, `denumire_piesa_instal`, `model_piesa_instal`, `producator_piesa_instal`, `anul_producerii_piesa_instal`, `nr_serie_dispozitiv_instal`, `altele`, `data_instalarii`, `garantie`, `net`, `comentarii`, `beneficiar`, `furnizor`, `file`, `name`) VALUES
(15, '456', 4, 'bunerfgbdf', 'usi', '2019-05-15', 'Uzi321', 'FDXVX', 'imast', 'RYFGHMDGH', 'Hard Drive', 'SSDjrt', 'hrtsjs', '2019-05-30', '23566rhfzgn', 'bnvnng', 'sjth', 'jghERWEER', 'RETRRETR', '2019-05-10', 'TYRTYRT', 'TYRTYRT', '2019-05-17', 556, 'Da', 'er4q5yyw56yrhzfz rwtyj tj ', '56wthtgh', 'rthss', '', 'Nicolae');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `formular`
--
ALTER TABLE `formular`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `formular`
--
ALTER TABLE `formular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
