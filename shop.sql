-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2020 г., 22:00
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_product`, `quantity`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 16, 1),
(4, 3, 1),
(5, 3, 1),
(6, 38, 1),
(7, 38, 1),
(8, 3, 1),
(9, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `comment`, `date`, `email`) VALUES
(23, NULL, 'Антон', 'Первый комментарий!', '17.Sep.2020', '88889997888'),
(24, NULL, 'Kung Fury', 'Commentariy', '18.Sep.2020', '999'),
(25, NULL, '111', '111', '18.Sep.2020', '111'),
(26, NULL, 'Zed', 'zed is dead', '28.September.2020 00:59:20', 'zed@zed.dead'),
(27, NULL, 'Антон', 'Testing new model', '30.September.2020 00:38:22', 'my@email.com'),
(28, NULL, 'Anton', 'one more test', '30.September.2020 00:39:01', 'my@email.com');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `img_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `img_name`) VALUES
(1, 'PS4', 20000, 'playstation4', 'product_101.jpg'),
(2, 'Макбук', 10000, 'яблоки яблоки\r\n', 'product_102.jpg'),
(3, 'Бамбук', 100500, 'Бамбук обыкновенный', 'product_103.jpg'),
(16, 'Бамбук', 666, 'Бамбук обыкновенный1', 'a4techmouse.jpg'),
(18, '0', 0, '555', 'product_104.jpg'),
(36, 'nnn', 777, 'ddd', 'product_108.jpg'),
(38, 'фигня', 22999, 'Суперфигня!', 'product_107.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `reg_date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `reg_date`) VALUES
(1, 'admin', 'admin', 0, NULL),
(2, 'Антон', '1234', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
