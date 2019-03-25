--
-- База данных: `crdm`
--
--
-- Структура таблицы `blancuri`
--

CREATE TABLE `blancuri` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `model` varchar(100) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `section` varchar(100) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL,
  `number` int(100) NOT NULL,
  `tip` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `blancuri`
--

INSERT INTO `blancuri` (`id`, `day`, `model`, `section`, `number`, `tip`, `name`) VALUES
(1, '2019-03-25', 'Arhitect', 'LCD Laboratorul de Diagnostic Clinic', 500, 'A4', 'niculita nicolae'),
(2, '2019-03-25', 'Plicuri', 'IRM Imagistica prin rezonanta magnetica', 500, 'Plic_CD', 'niculita nicolae'),
(3, '2019-03-01', 'Tichete Pentru casa ', 'SMEI Monitorizare, Evaluare si Integrare', 100, 'A4', 'niculita nicolae'),
(4, '2019-03-08', 'hemoleucograma', 'Administratia', 1000, 'Plic_C5', 'niculita nicolae'),
(5, '2019-03-09', 'hemoleucograma', 'ESVM Sectia Ecocardiografie si Studiul Vaselor Magistrale', 500, 'A3', 'niculita nicolae'),
(6, '2019-03-16', 'immulite', 'LMN Laboratorul Medicina Nucleara', 600, 'A5', 'niculita nicolae'),
(7, '2019-03-22', 'immulite', 'LMN Laboratorul Medicina Nucleara', 100, 'Plic_C5', 'niculita nicolae'),
(8, '2019-03-22', 'hemoleucograma', 'Resurse Umane', 600, 'Plic_C5', 'niculita nicolae'),
(9, '2019-03-15', 'hemoleucograma', 'DF Sectia Diagnostic Functional', 34, 'A3', 'niculita nicolae'),
(10, '2019-03-29', 'hemoleucograma 123', 'DF Sectia Diagnostic Functional', 100, 'Plic_DL', 'niculita nicolae'),
(11, '2019-03-01', 'hemoleucograma', 'USG Sectia Ultrasonografie Generala', 100, 'A4', 'niculita nicolae'),
(12, '2019-03-02', 'hemoleucograma', 'USG Sectia Ultrasonografie Generala', 500, 'A4', 'niculita nicolae'),
(13, '2019-03-15', 'Arhitect', 'LCD Laboratorul de Diagnostic Clinic', 500, 'A4', 'niculita nicolae'),
(15, '2019-03-14', 'immulite', 'Endoscopie', 100, 'Plic_CD', 'niculita nicolae');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'erast@crdm.md', 'erast123', 'stinca', 'erast\r\n'),
(2, 'nicu@crdm.md', 'test', 'niculita', 'nicolae');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;
