-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2023 г., 04:26
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pochtamp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userone` int(11) NOT NULL,
  `usertwo` int(11) NOT NULL,
  `messages_json` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `userone`, `usertwo`, `messages_json`) VALUES
(1, 12, 13, '[{\"id\":\"12\",\"text\":\"234567890-\"},{\"id\":\"12\",\"text\":\"234567890-\"},{\"id\":\"12\",\"text\":\"234567890-\"},{\"id\":\"12\",\"text\":\"234567890-\"},{\"id\":\"12\",\"text\":\"123\"},{\"id\":\"12\",\"text\":\"ebal\"},{\"id\":\"12\",\"text\":\"suska\"},{\"id\":\"12\",\"text\":\"Сука ты санная, я найду тебя, твоих родителей, родителей твоих родителей, переверну там всё верх дном!\"},{\"id\":\"13\",\"text\":\"Я тебя тварь ненавижу!!\"},{\"id\":\"12\",\"text\":\"будь ты сука проклят\"},{\"id\":\"12\",\"text\":\"1\"},{\"id\":\"12\",\"text\":\"2\"},{\"id\":\"12\",\"text\":\"3\"},{\"id\":\"12\",\"text\":\"1\"},{\"id\":\"12\",\"text\":\"1\"},{\"id\":\"12\",\"text\":\"refreerferferferf\"},{\"id\":\"12\",\"text\":\"ergerg<br />ergerg<br />hyt htyhty\"},{\"id\":\"12\",\"text\":\"gergerg<br />erg<br />er<br />ge<br />rg<br />erg<br />er<br />g<br />er<br />gerg\"}]'),
(2, 12, 14, '[{\"id\":\"12\",\"text\":\"Test message\"}]'),
(5, 15, 12, '[{\"id\":\"15\",\"text\":\"123\"},{\"id\":\"15\",\"text\":\"ПЕРЕРИСКА УРА!!<br />\"}]'),
(6, 20, 20, '[{\"id\":\"20\",\"text\":\"\"},{\"id\":\"20\",\"text\":\"fwefwefwef\"}]'),
(7, 30, 31, '[{\"id\":\"30\",\"text\":\"Привет,как дела?<br />\"},{\"id\":\"31\",\"text\":\"Да, нормально, спасибо\"},{\"id\":\"31\",\"text\":\"Привет, поздравляю с достижениями!<br />\"},{\"id\":\"30\",\"text\":\"Спасибо!\"},{\"id\":\"30\",\"text\":\"dsd\"},{\"id\":\"30\",\"text\":\"hi\"},{\"id\":\"30\",\"text\":\"hu\"},{\"id\":\"30\",\"text\":\"dsds\"},{\"id\":\"30\",\"text\":\"tttt\"},{\"id\":\"30\",\"text\":\"Привет, я снова здесь!\"}]');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `images_json` text NOT NULL,
  `groupid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `fromuser` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `message`, `images_json`, `groupid`, `userid`, `fromuser`, `date`) VALUES
(2, 'rgtersgegrtggertgrtgrtgtrgrt', '[]', NULL, 17, 17, '2020-10-13 07:58:49'),
(3, 'reoeop[rkgoperkpogkeropkgpekrpogkporekpog', '[\"https://miro.medium.com/max/1200/1*mk1-6aYaf_Bes1E3Imhc0A.jpeg\",\"data:image/png;base64,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\"]', NULL, 17, 17, '2020-10-13 08:02:50'),
(4, 'gergergergegregerger', '[]', NULL, 20, 20, '2020-10-13 09:37:39'),
(6, 'кажется в прошлом году я упал с балкона ', '[]', NULL, 27, 27, '2023-11-14 00:10:18'),
(7, 'ffsfssssssssssssssssssfsfsfsfs', '[]', NULL, 23, 23, '2023-11-14 12:34:02'),
(8, 'кажется,  я самый крутой чел', '[]', NULL, 30, 30, '2023-11-14 14:07:21'),
(9, 'пеку пироги уже 16 лет', '[]', NULL, 31, 31, '2023-11-14 14:08:21'),
(11, 'Кажется, я сегодня приодалел новую планку!', '[]', NULL, 30, 30, '2023-11-14 14:38:14'),
(13, 'yes babeaaaaaaaaaaaaaaaaa', '[]', NULL, 30, 30, '2023-11-14 15:48:58'),
(15, 'Вот это приколдес конечно мяу ;3', '[]', NULL, 30, 31, '2023-11-14 16:11:50'),
(17, 'Вот это зачёт!)', '[]', NULL, 31, 30, '2023-11-15 02:12:18'),
(27, 'Я зарегался в почтампе!', '[\"https://sun1-20.userapi.com/s/v1/ig2/MRs7xfDBVxYnRgnPEv--Tb0pZOztwyA7_cN30k_Hkdi_Y3NvYQ3mp3cRTZM2k4zAFiAssvTwbLddlSV0Qr5Jt_ro.jpg?size=400x400&quality=95&crop=193,0,465,465&ava=1\"]', NULL, 36, 36, '2023-11-16 21:37:05'),
(28, 'Давно не заходил в почтамп', '[]', NULL, 31, 30, '2023-11-16 21:40:04'),
(29, 'вот это машина ', '[]', NULL, 30, 30, '2023-11-16 21:48:31');

-- --------------------------------------------------------

--
-- Структура таблицы `pushes`
--

CREATE TABLE `pushes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `fromuser` int(11) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pushes`
--

INSERT INTO `pushes` (`id`, `userid`, `fromuser`, `type`) VALUES
(3, 13, 15, 'tofriend'),
(4, 14, 15, 'tofriend'),
(5, 22, 24, 'tofriend'),
(14, 20, 30, 'tofriend');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `info_json` text,
  `posts_json` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `date`, `info_json`, `posts_json`) VALUES
(30, 'Dmitry', 'Dmitry', '$2y$10$t7Oc7AenCdDIdD9P/oRxZen61Nip2mLPT5xRZhDoKA7sQ2WDfXOyu', '2023-11-14 12:48:34', '{\"location\":\"Россия\",\"born\":\"Санкт-Петербург\",\"job\":\"ООО Балтика\",\"study\":\"ГБОУ СОШ №583\",\"type\":\"Не женат\",\"hobby\":\"Хоккей\",\"email\":\"\",\"background\":\"img/background.jpg\",\"avatar\":\"https://pic.rutubelist.ru/video/46/b2/46b25de0bf3d3fa60a22037e55071354.jpg\",\"friends\":[31]}', '[8,10,11,12,13,14,15,16,18,19,20,21,22,23,24,25,26,27,29]'),
(31, 'Svetlana', 'Svetlana', '$2y$10$4n30myElQ3GXVzJCJtWg4eVOa9qqz3Rb9Uzs7QXJFReGdovIOhmrC', '2023-11-14 12:53:10', '{\"location\":\"\",\"born\":\"\",\"job\":\"\",\"study\":\"\",\"type\":\"\",\"hobby\":\"\",\"email\":\"\",\"background\":\"https://ferma-biz.ru/wp-content/uploads/2022/08/1920x1200-px-cute-himalayan-kitten-1641129.jpg\",\"avatar\":\"https://zamanilka.ru/wp-content/uploads/2022/07/kotik-ava-060722-1.jpg\",\"friends\":[30]}', '[9,17,28]'),
(36, 'Anton', 'Anton', '$2y$10$7A8ZwZNu4x2sN3fi4qLkl.slihlPq9fVK5ZMsoDqIt2U6O1dcSvP.', '2023-11-16 21:35:46', '{\"location\":\"Россия\",\"born\":\"Москва\",\"job\":\"Юмор\",\"study\":\"ГБОУ СОШ №1246\",\"type\":\"Не женат\",\"hobby\":\"Футбол\",\"email\":\"\",\"background\":\"http://images-s.kinorium.com/movie/promo/1625682/w1500_51718083.jpg\",\"avatar\":\"https://sun1-20.userapi.com/s/v1/ig2/MRs7xfDBVxYnRgnPEv--Tb0pZOztwyA7_cN30k_Hkdi_Y3NvYQ3mp3cRTZM2k4zAFiAssvTwbLddlSV0Qr5Jt_ro.jpg?size=400x400&quality=95&crop=193,0,465,465&ava=1\",\"friends\":[]}', '[27]');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pushes`
--
ALTER TABLE `pushes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `pushes`
--
ALTER TABLE `pushes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
