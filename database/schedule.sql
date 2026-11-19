-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2023 г., 20:37
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schedule`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinet`
--

CREATE TABLE `cabinet` (
  `id_cabinet` int NOT NULL,
  `name_cabinet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cabinet`
--

INSERT INTO `cabinet` (`id_cabinet`, `name_cabinet`) VALUES
(1, '1-101'),
(2, '2-102'),
(3, '3-103'),
(5, '4-115');

-- --------------------------------------------------------

--
-- Структура таблицы `day_week`
--

CREATE TABLE `day_week` (
  `id_day` int NOT NULL,
  `name_day` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `day_week`
--

INSERT INTO `day_week` (`id_day`, `name_day`) VALUES
(1, 'Понедельник'),
(2, 'Вторник'),
(3, 'Среда'),
(4, 'Четверг'),
(5, 'Пятница'),
(6, 'Суббота');

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id_form` int NOT NULL,
  `name_form` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id_form`, `name_form`) VALUES
(1, 'Лекция'),
(2, 'Практика'),
(3, 'Мероприятие');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id_group` int NOT NULL,
  `id_speciality` int NOT NULL,
  `name_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id_group`, `id_speciality`, `name_group`) VALUES
(1, 3, 'Д21-191-1'),
(2, 1, 'Д21-191-2'),
(3, 3, 'Д20-124-1'),
(5, 3, 'Д20-124-2'),
(6, 5, 'Д19-187-1');

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id_item` int NOT NULL,
  `name_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id_item`, `name_item`) VALUES
(1, 'Математика'),
(2, 'Русский язык'),
(3, 'ВипКС'),
(74, 'Финансы'),
(75, 'Черчение'),
(76, 'История'),
(77, 'C++'),
(78, 'Макроэкономика'),
(79, 'Эскиз');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int NOT NULL,
  `id_day` int NOT NULL,
  `id_lesson` int NOT NULL,
  `id_cabinet` int DEFAULT NULL,
  `id_group` int NOT NULL,
  `id_form` int NOT NULL,
  `id_item` int DEFAULT NULL,
  `id_teacher` int NOT NULL,
  `name_meeting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `id_day`, `id_lesson`, `id_cabinet`, `id_group`, `id_form`, `id_item`, `id_teacher`, `name_meeting`) VALUES
(57, 1, 1, 1, 1, 1, 77, 3, NULL),
(58, 1, 3, 2, 1, 2, 3, 8, NULL),
(59, 1, 4, 3, 1, 1, 2, 9, NULL),
(60, 2, 3, 2, 1, 2, 77, 3, NULL),
(61, 2, 4, 5, 1, 2, 1, 7, NULL),
(62, 3, 5, 2, 1, 1, 77, 3, NULL),
(63, 3, 6, 3, 1, 1, 2, 9, NULL),
(64, 3, 4, 3, 1, 2, 2, 9, NULL),
(65, 3, 3, 1, 1, 1, 77, 3, NULL),
(66, 4, 2, 2, 1, 2, 3, 8, NULL),
(67, 5, 3, 1, 1, 1, 77, 3, NULL),
(68, 1, 7, 5, 2, 2, 77, 3, NULL),
(69, 1, 6, 3, 2, 1, 3, 8, NULL),
(70, 2, 5, 2, 2, 1, 2, 9, NULL),
(71, 2, 4, 3, 2, 2, 3, 8, NULL),
(72, 2, 6, 5, 2, 1, 1, 7, NULL),
(73, 3, 5, 1, 2, 1, 76, 8, NULL),
(74, 3, 4, 2, 2, 1, 3, 8, NULL),
(75, 4, 3, 2, 2, 2, 77, 3, NULL),
(76, 4, 4, 1, 2, 1, 76, 8, NULL),
(77, 6, 3, 1, 2, 3, NULL, 3, 'История Университета'),
(78, 6, 3, 1, 1, 3, NULL, 3, 'История Университета'),
(81, 3, 7, 2, 3, 1, 79, 9, NULL),
(82, 1, 4, 3, 3, 2, 75, 8, NULL),
(83, 2, 5, 3, 3, 1, 79, 7, NULL),
(84, 4, 5, 1, 3, 1, 76, 8, NULL),
(85, 5, 4, 3, 3, 2, 79, 7, NULL),
(86, 1, 3, 1, 3, 1, 1, 3, NULL),
(87, 2, 6, 1, 3, 1, 75, 9, NULL),
(88, 3, 6, 1, 3, 1, 76, 8, NULL),
(89, 4, 6, 1, 3, 1, 1, 3, NULL),
(90, 4, 3, 1, 3, 1, 3, 8, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE `speciality` (
  `id_speciality` int NOT NULL,
  `name_speciality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`id_speciality`, `name_speciality`) VALUES
(1, 'Программирование'),
(3, 'Дизайн'),
(5, 'Экономика');

-- --------------------------------------------------------

--
-- Структура таблицы `time_lesson`
--

CREATE TABLE `time_lesson` (
  `id_lesson` int NOT NULL,
  `start_time_lesson` time NOT NULL,
  `end_time_lesson` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `time_lesson`
--

INSERT INTO `time_lesson` (`id_lesson`, `start_time_lesson`, `end_time_lesson`) VALUES
(1, '08:30:00', '10:00:00'),
(2, '10:10:00', '11:40:00'),
(3, '12:20:00', '13:50:00'),
(4, '14:00:00', '15:30:00'),
(5, '15:40:00', '17:10:00'),
(6, '17:20:00', '18:50:00'),
(7, '19:00:00', '20:30:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `id_role` int NOT NULL DEFAULT '1',
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `last_name`, `name`, `patronymic`, `email`, `login`, `password`) VALUES
(3, 1, 'Калашников', 'Григорий', 'Никитевич', 'testTeacher@mail.ru', 'kalashnikov', '$2y$10$/9BjD8AIhz5wuhYdDJ7KkedlNuvfX12TElZFTJli74rTjQGRBWHg.'),
(5, 3, 'Админ', 'Админ', 'Админ', 'admin@mail.ru', 'log_admin', '$2y$10$/yIDFWIMe0DhjJ48oKWvquHxIoTTuIuV.32EA75CztgNtY.NYDivW'),
(6, 2, 'Методист', 'Методист', 'Методист', 'methodist@mail.ru', 'log_methodist', '$2y$10$b8iqvWlXW1AHgoZl4ByQXeIPrlYr3ccXBXSmj8lrn3Tt0nV2/Fipm'),
(7, 1, 'Тарасов', 'Валерий', 'Игнатьевич', 'tarasov@mail.ru', 'tarasov', '$2y$10$4jMdo18dQ/NKy6zjLNsce.lsUq1.zR/.JYR.1hvVdPYoazRyiuCXC'),
(8, 1, 'Лосева', 'Мария', 'Арсентьевна', 'loseva@mail.ru', 'loseva', '$2y$10$WzrbKWgN8T1mFdP172LvjeAtNmwDMkdLbzQxUuKnynQ.1Dz0/ETlC'),
(9, 1, 'Анисимова', 'София', 'Евгеньевна', 'anisimova@mail.ru', 'anisimova', '$2y$10$uBhKNg3Y2yZjC1NNrhipqOv9rvO8nzd7vZDtwwRCGSn01mAQTB2Ca');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int NOT NULL,
  `name_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id_role`, `name_role`) VALUES
(1, 'Преподаватель'),
(2, 'Методист'),
(3, 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cabinet`
--
ALTER TABLE `cabinet`
  ADD PRIMARY KEY (`id_cabinet`);

--
-- Индексы таблицы `day_week`
--
ALTER TABLE `day_week`
  ADD PRIMARY KEY (`id_day`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `id_speciality` (`id_speciality`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_day` (`id_day`),
  ADD KEY `id_lesson` (`id_lesson`),
  ADD KEY `id_cabinet` (`id_cabinet`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_item` (`id_item`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_form` (`id_form`);

--
-- Индексы таблицы `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id_speciality`);

--
-- Индексы таблицы `time_lesson`
--
ALTER TABLE `time_lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cabinet`
--
ALTER TABLE `cabinet`
  MODIFY `id_cabinet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `day_week`
--
ALTER TABLE `day_week`
  MODIFY `id_day` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id_speciality` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `time_lesson`
--
ALTER TABLE `time_lesson`
  MODIFY `id_lesson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `speciality` (`id_speciality`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_lesson`) REFERENCES `time_lesson` (`id_lesson`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`id_day`) REFERENCES `day_week` (`id_day`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`id_cabinet`) REFERENCES `cabinet` (`id_cabinet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`id_teacher`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `schedule_ibfk_7` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
