-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2022 г., 18:31
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `USER_ID` int NOT NULL,
  `LOGIN` varchar(100) NOT NULL,
  `COOKIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '''''',
  `PASSWORD` varchar(100) NOT NULL,
  `ROLE` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`USER_ID`, `LOGIN`, `COOKIE`, `PASSWORD`, `ROLE`) VALUES
(3, 'jorj', '17f04b3b9a13fa2775f854f16320a772', '56fc8c7ec5a21f61b73164ecadb5fd41', 1),
(4, 'ivan', 'f7cb4f117b9f8a389f05b978add09eb2', '56fc8c7ec5a21f61b73164ecadb5fd41', 1),
(5, 'jorjpoo', '64d7313090f64cffd976f37568109372', '56fc8c7ec5a21f61b73164ecadb5fd41', 1),
(6, 'admin', '\'\'', 'df58f4b2aa230db9c5c2b514fcaabaa1', 2),
(7, 'vkuser', '\'\'', '0dcb8048199e317326e5ced416dac630', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
