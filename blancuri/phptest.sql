-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 27 2019 г., 09:53
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
  `model` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  `number` int(100) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `blancuri`
--

INSERT INTO `blancuri` (`id`, `day`, `model`, `section_id`, `number`, `tip_id`, `name`, `file_id`) VALUES
(12, '2019-04-13', 'Arhitect', 2, 500, 1, 'Nicolae', 0),
(13, '2019-05-21', 'IMMULITE', 2, 500, 1, 'Nicolae', 0);

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
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `formular`
--

INSERT INTO `formular` (`id`, `cabinet`, `section_id`, `executor`, `nume_dispozitiv`, `anul_producerii_dispozitiv`, `model_dispozitiv`, `nr_serie_dispozitiv`, `producator_dispozitiv`, `numar_inventar`, `denumire_piesa`, `model_piesa`, `producator_piesa`, `anul_producerii_piesa`, `nr_serie_dispozitiv_piesa`, `part_number`, `denumire_piesa_instal`, `model_piesa_instal`, `producator_piesa_instal`, `anul_producerii_piesa_instal`, `nr_serie_dispozitiv_instal`, `altele`, `data_instalarii`, `garantie`, `net`, `comentarii`, `beneficiar`, `furnizor`, `name`) VALUES
(4, '817', 8, '', '', '0000-00-00', '', 'tghkjh', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', 0, '', '', '', '', 'Nicolae'),
(5, '817', 0, 'Violinca', '', '0000-00-00', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', 0, '', '', '', '', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `formular_2`
--

CREATE TABLE `formular_2` (
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
  `desc_defect` varchar(100) NOT NULL,
  `cauza_defect` varchar(100) NOT NULL,
  `actiuni` varchar(100) NOT NULL,
  `data_instalarii` date NOT NULL,
  `ore` int(50) NOT NULL,
  `chek` varchar(50) NOT NULL,
  `materiale` varchar(100) NOT NULL,
  `comentarii` varchar(100) NOT NULL,
  `beneficiar` varchar(100) NOT NULL,
  `inginer1` varchar(100) NOT NULL,
  `inginer2` varchar(100) NOT NULL,
  `inginer3` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `formular_2`
--

INSERT INTO `formular_2` (`id`, `cabinet`, `section_id`, `executor`, `nume_dispozitiv`, `anul_producerii_dispozitiv`, `model_dispozitiv`, `nr_serie_dispozitiv`, `producator_dispozitiv`, `numar_inventar`, `desc_defect`, `cauza_defect`, `actiuni`, `data_instalarii`, `ore`, `chek`, `materiale`, `comentarii`, `beneficiar`, `inginer1`, `inginer2`, `inginer3`, `name`) VALUES
(2, '546498', 7, 'execut', 'dedis', '2019-05-17', 'model', 'seri12', 'producator', 'inventar numer', 'descr', '', 'actiuni sdgaufvbvdagvafda\r\nafghagf\r\nadfgadfhgf\r\nsfgjs\r\ngjgh\r\njghjghjghjg\r\n', '2019-05-09', 213, 'Nefunctional', 'mater', 'coment2', 'benef', 'Inginer1', 'Inginer2', 'Inginer3', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `cabinet` varchar(255) NOT NULL,
  `numepc` varchar(50) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `mac` varchar(30) NOT NULL,
  `net` varchar(50) NOT NULL,
  `coment` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ip`
--

INSERT INTO `ip` (`id`, `section_id`, `cabinet`, `numepc`, `ip`, `mac`, `net`, `coment`, `name`) VALUES
(11, 4, '214', 'dfgbf', '192.168.55.34', '34647577', 'Nu', 'Comentariu comentator', 'Nicolae');

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
(2, 'LCD Laboratorul de Diagnostic Clinic'),
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
-- Структура таблицы `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `uploads`
--

INSERT INTO `uploads` (`id`, `file`, `data_upload`, `formular_id`) VALUES
(4, 'report_15.05.2019.pdf', '2019-05-21 08:38:20', 4),
(6, '91528-laura-postu.pdf', '2019-05-21 10:04:58', 4),
(12, 'printvsa.pdf', '2019-05-23 08:44:58', 5),
(13, 'contract.pdf', '2019-05-23 09:56:07', 2);

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
(9, 'Nicolae', 'nicu@crdm.md', 'admin', '098f6bcd4621d373cade4e832627b4f6'),
(11, 'Test', 'test@test.com', 'user', '098f6bcd4621d373cade4e832627b4f6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blancuri`
--
ALTER TABLE `blancuri`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `formular`
--
ALTER TABLE `formular`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `formular_2`
--
ALTER TABLE `formular_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ip`
--
ALTER TABLE `ip`
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
-- Индексы таблицы `uploads`
--
ALTER TABLE `uploads`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `formular`
--
ALTER TABLE `formular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `formular_2`
--
ALTER TABLE `formular_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `sectie`
--
ALTER TABLE `sectie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tipul`
--
ALTER TABLE `tipul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
