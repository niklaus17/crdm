-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 05 2019 г., 14:39
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
  `blanc_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `number` int(100) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `formular`
--

CREATE TABLE `formular` (
  `id` int(11) NOT NULL,
  `cabinet` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `executor` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `data1` date NOT NULL,
  `nume_dispozitiv` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii_dispozitiv` date NOT NULL,
  `model_dispozitiv` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_dispozitiv` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `producator_dispozitiv` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `numar_inventar` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `denumire_piesa` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_piesa` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `producator_piesa` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii_piesa` date NOT NULL,
  `nr_serie_dispozitiv_piesa` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `part_number` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `denumire_piesa_instal` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_piesa_instal` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `producator_piesa_instal` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii_piesa_instal` date NOT NULL,
  `nr_serie_dispozitiv_instal` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `altele` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `data_instalarii` date NOT NULL,
  `garantie` int(50) NOT NULL,
  `net` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `comentarii` text COLLATE utf8_romanian_ci NOT NULL,
  `beneficiar` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `furnizor` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `furnizor1` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `furnizor2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `formular`
--

INSERT INTO `formular` (`id`, `cabinet`, `section_id`, `executor`, `data1`, `nume_dispozitiv`, `anul_producerii_dispozitiv`, `model_dispozitiv`, `nr_serie_dispozitiv`, `producator_dispozitiv`, `numar_inventar`, `denumire_piesa`, `model_piesa`, `producator_piesa`, `anul_producerii_piesa`, `nr_serie_dispozitiv_piesa`, `part_number`, `denumire_piesa_instal`, `model_piesa_instal`, `producator_piesa_instal`, `anul_producerii_piesa_instal`, `nr_serie_dispozitiv_instal`, `altele`, `data_instalarii`, `garantie`, `net`, `comentarii`, `beneficiar`, `furnizor`, `furnizor1`, `furnizor2`, `name`) VALUES
(1, '5', 3, 'Nicolae', '2019-12-12', 'Logitech', '2019-09-13', 'Q7', '547446', 'GBG', '232312', 'monitor', 'led', 'unknow', '2019-09-13', '3463563', '3453543', 'dfghddd', 'dfgsda', 'sdgsd', '2019-09-13', '43463434', 'dfgdg', '2019-09-13', 546, 'Nu', 'dfhzfghfhzfhg', 'fghfgh', 'fghfghfg', 'hghfg', 'hfghfgh', 'Nicolae'),
(3, 'ftuysf', 4, 'tuytyuty', '2019-11-07', 'utrusy', '2019-11-05', 'sugfu', 'yuyttutyutyu', 'gyutyu', 'ufgufgugfusd', 'tsyuttyutgj', 'htgjghjgdhj', 'ghjdghjdgh', '2019-11-05', 'sfugugu', 'gughjdghjt', 'ufghjugf', 'hjtjghj', 'dghjdgdghjdg', '2019-11-05', 'hjdghjdghj', 'dghjdghj', '2019-11-05', 567, 'Da', 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'tjygtj', 'ghjgdhj', '', '', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `formular_2`
--

CREATE TABLE `formular_2` (
  `id` int(11) NOT NULL,
  `cabinet2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `executor2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `data2` date NOT NULL,
  `nume_dispozitiv2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii_dispozitiv2` date NOT NULL,
  `model_dispozitiv2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_dispozitiv2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `producator_dispozitiv2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `numar_inventar2` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `desc_defect` text COLLATE utf8_romanian_ci NOT NULL,
  `cauza_defect` text COLLATE utf8_romanian_ci NOT NULL,
  `actiuni` text COLLATE utf8_romanian_ci NOT NULL,
  `data_instalarii2` date NOT NULL,
  `ore` int(50) NOT NULL,
  `chek` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `materiale` text COLLATE utf8_romanian_ci NOT NULL,
  `comentarii2` text COLLATE utf8_romanian_ci NOT NULL,
  `beneficiar2` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer1` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer2` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer3` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `formular_2`
--

INSERT INTO `formular_2` (`id`, `cabinet2`, `section_id`, `executor2`, `data2`, `nume_dispozitiv2`, `anul_producerii_dispozitiv2`, `model_dispozitiv2`, `nr_serie_dispozitiv2`, `producator_dispozitiv2`, `numar_inventar2`, `desc_defect`, `cauza_defect`, `actiuni`, `data_instalarii2`, `ore`, `chek`, `materiale`, `comentarii2`, `beneficiar2`, `inginer1`, `inginer2`, `inginer3`, `name`) VALUES
(1, '3245', 2, 'FGHVGVB', '2019-11-05', 'RTHFGH', '2019-11-05', 'GFHJGFHJDGH', 'FGJGHJDG', 'GHJDGHJDGH', 'GFJGHJGD', 'DFTGHJFGJGHJ', 'JGHJ DGHJD JDY', 'GFHJ GHJDGHJ', '2019-11-05', 45, 'Functional', 'DFGJSGJ', 'JGFNM,,', 'SGYSFGH', 'FSGHFG', 'FGH', '', 'Nicolae'),
(2, 'ghdfhaf', 2, 'fdghdf', '2019-02-07', 'dfghfgnhg', '2019-11-06', 'fghghfg', 'cghnfcgf', 'fghfghfg', 'fghfgh', 'cfghgfhfh', 'ghfghfh', 'fghghfgsh', '2019-11-08', 456, 'Functional', 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'ghjghj', 'ghjgh', 'jgh', '', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `formular_3`
--

CREATE TABLE `formular_3` (
  `id` int(11) NOT NULL,
  `cabinet3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `executor3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `data3` date NOT NULL,
  `nume_dispozitiv3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii_dispozitiv3` date NOT NULL,
  `model_dispozitiv3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_dispozitiv3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `producator_dispozitiv3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `numar_inventar3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_1_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_2_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_3_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `model_4_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_1_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_2_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_3_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `nr_serie_4_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `chek1_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `respons` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `chek2_3` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `luni3` int(50) NOT NULL,
  `comentarii3` varchar(5000) COLLATE utf8_romanian_ci NOT NULL,
  `beneficiar3` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer1_3` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer2_3` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer3_3` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `formular_3`
--

INSERT INTO `formular_3` (`id`, `cabinet3`, `section_id`, `executor3`, `data3`, `nume_dispozitiv3`, `anul_producerii_dispozitiv3`, `model_dispozitiv3`, `nr_serie_dispozitiv3`, `producator_dispozitiv3`, `numar_inventar3`, `model_1_3`, `model_2_3`, `model_3_3`, `model_4_3`, `nr_serie_1_3`, `nr_serie_2_3`, `nr_serie_3_3`, `nr_serie_4_3`, `chek1_3`, `respons`, `chek2_3`, `luni3`, `comentarii3`, `beneficiar3`, `inginer1_3`, `inginer2_3`, `inginer3_3`, `name`) VALUES
(1, '215', 1, 'Nicolae', '2019-07-23', 'LOGIQ E9 ', '2019-11-22', '5205000-6 ', '107867US4', 'GE HEALTCARE', '1381092', '', '', '', '', '', '', '', '', 'Da', 'Axenciuc Anatolie', 'Da', 3, 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'Puskina Ecaterina', 'Axenciuc Anatolie', 'Niculita Nicolae ', '', 'Nicolae'),
(2, 'djkdghdjk', 6, 'gdhjgd', '2019-11-01', 'rghfgh', '2019-11-05', 'fghfgh', 'fghfsgh', 'fghfsgh', 'fsghfghsfgh', 'sf', 'fghsf', 'ghsfghfsgh', 'fghsfghsf', 'ghsfghsf', 'ghfsghfgh', 'sfghsfghsf', 'ghsfghsfghfshgsfgh', 'Nu', 'hdfhh', 'Nu', 456, 'hdfghfghfghf', 'ghfghgfhfg', 'fhfg', 'hfghfg', 'hfghfg', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `formular_4`
--

CREATE TABLE `formular_4` (
  `id` int(11) NOT NULL,
  `data4` date NOT NULL,
  `chek1_4` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `institutia` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `locatia` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `numar_inventar4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_non` date NOT NULL,
  `producator` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `anul_producerii` date NOT NULL,
  `nume_dispozitiv4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `numar_serie` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `numar_inventar2_4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `uzura` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_exploatare` date NOT NULL,
  `termen` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `pret` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `valoarea` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `descrierea` varchar(5000) COLLATE utf8_romanian_ci NOT NULL,
  `cauza` varchar(5000) COLLATE utf8_romanian_ci NOT NULL,
  `nota` varchar(5000) COLLATE utf8_romanian_ci NOT NULL,
  `beneficiar4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `contabil` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `it` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer1_4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer2_4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `inginer3_4` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `formular_4`
--

INSERT INTO `formular_4` (`id`, `data4`, `chek1_4`, `institutia`, `locatia`, `numar_inventar4`, `data_non`, `producator`, `anul_producerii`, `nume_dispozitiv4`, `model`, `numar_serie`, `numar_inventar2_4`, `uzura`, `data_exploatare`, `termen`, `pret`, `valoarea`, `descrierea`, `cauza`, `nota`, `beneficiar4`, `contabil`, `it`, `inginer1_4`, `inginer2_4`, `inginer3_4`, `name`) VALUES
(1, '2019-11-05', 'defectare', 'IMSP CRDM', 'Cab 231', '137143', '2019-09-30', 'GE Healtcare', '2019-09-30', 'Sistem de mamografie digit.cu detec.cu ecran plat p-u screen Sistem de mamografie ', 'SENOGRAPHE', '671392BU9', '1371435', '30', '2019-09-30', '', '', '', 'Cauza neutralizarii:\r\nSistem de mamografie digit.cu detec.cu ecran plat p-u sc Sistem de mamografie digit.cu detec.cu\r\necran plat p-u scSistem de mamografie digit.cu detec.cu ecran plat p-u sc', 'Sistem de mamografie digit.cu detec.cu ecran plat p-u sc Sistem de mamografie digit.cu detec.cu ecran plat p-u scSistem de mamografie digit.cu detec.cu ecran plat p-u sc', 'Sistem de mamografie digit.cu detec.cu ecran plat p-u sc Sistem de mamografie digit.cu detec.cu ecran plat\r\np-u scSistem de mamografie digit.cu detec.cu ecran plat\r\np-u sc', '', '', '', '', '', '', 'Nicolae'),
(2, '2019-07-07', 'conservare', 'DFgbh', 'fgfg', 'fgbbf', '2019-11-05', 'bbgzdbdf', '2019-11-05', 'dfgdg', 'dfgdfg', 'dgfdfgdf', 'gdgdfg', 'd', '2019-11-05', 'gdfgdfgd', 'dfgdgd', 'fgdf', 'Sau decuplat sondele pentru a fi transportat afară. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'Sau decuplat sondele pentru a fi transportat afara. Au fost decuplate capacele decorative pentru\r\na fi suflat praful de pe placi, Sau verificat toate conectiunile. Dupa mentenanta aparatul a fost\r\ntransportat in cabinet. Au fost conectat sondele la locuri', 'dfgdgf', 'dfgdfgdf', 'gdfgdfg', 'dfgdffgdf', 'gdfg', 'gdfgdfgd', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `cabinet` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `numepc` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `mac` varchar(30) COLLATE utf8_romanian_ci NOT NULL,
  `net` varchar(50) COLLATE utf8_romanian_ci NOT NULL,
  `coment` varchar(255) COLLATE utf8_romanian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `ip`
--

INSERT INTO `ip` (`id`, `section_id`, `cabinet`, `numepc`, `ip`, `mac`, `net`, `coment`, `name`) VALUES
(10, 2, '5', 'CRDMET2SITNN', '192.168.1.195', '90-B1-1C-77-AF-7E', 'Nu', 'tyuv', 'Nicolae'),
(9, 7, '803', 'CRDMET2SITNN', '192.168.1.195', '90-B1-1C-77-AF-7E', 'Da', 'fgjgh', 'Nicolae');

-- --------------------------------------------------------

--
-- Структура таблицы `model_blanc`
--

CREATE TABLE `model_blanc` (
  `id` int(11) NOT NULL,
  `blanc` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `model_blanc`
--

INSERT INTO `model_blanc` (`id`, `blanc`, `section_id`) VALUES
(1, 'wrtyret12', 2),
(2, 'fgjvj2', 4),
(3, 'io0[2', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `sectie`
--

CREATE TABLE `sectie` (
  `id` int(11) NOT NULL,
  `section` varchar(100) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `sectie`
--

INSERT INTO `sectie` (`id`, `section`) VALUES
(1, 'USG Secţia Ultrasonografie Generală'),
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
  `format` varchar(50) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

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
  `file` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `uploads2`
--

CREATE TABLE `uploads2` (
  `id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `uploads3`
--

CREATE TABLE `uploads3` (
  `id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `uploads4`
--

CREATE TABLE `uploads4` (
  `id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formular_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_romanian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_romanian_ci DEFAULT NULL,
  `user_type` varchar(20) COLLATE utf8_romanian_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_romanian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Nicolae', 'nicu@crdm.md', 'admin', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'Test', 'test@test.com', 'user', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Структура таблицы `violin`
--

CREATE TABLE `violin` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `casa` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `problema` varchar(5000) COLLATE utf8_romanian_ci NOT NULL,
  `solutia` varchar(5000) COLLATE utf8_romanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `violin_file`
--

CREATE TABLE `violin_file` (
  `id` int(11) NOT NULL,
  `file` varchar(100) COLLATE utf8_romanian_ci NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `violin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

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
-- Индексы таблицы `formular_3`
--
ALTER TABLE `formular_3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `formular_4`
--
ALTER TABLE `formular_4`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_blanc`
--
ALTER TABLE `model_blanc`
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
-- Индексы таблицы `uploads2`
--
ALTER TABLE `uploads2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uploads3`
--
ALTER TABLE `uploads3`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uploads4`
--
ALTER TABLE `uploads4`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `violin`
--
ALTER TABLE `violin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `violin_file`
--
ALTER TABLE `violin_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blancuri`
--
ALTER TABLE `blancuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `formular`
--
ALTER TABLE `formular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `formular_2`
--
ALTER TABLE `formular_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `formular_3`
--
ALTER TABLE `formular_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `formular_4`
--
ALTER TABLE `formular_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `model_blanc`
--
ALTER TABLE `model_blanc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `uploads2`
--
ALTER TABLE `uploads2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `uploads3`
--
ALTER TABLE `uploads3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `uploads4`
--
ALTER TABLE `uploads4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `violin`
--
ALTER TABLE `violin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `violin_file`
--
ALTER TABLE `violin_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
