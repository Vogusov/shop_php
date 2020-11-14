-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2020 г., 18:27
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
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `session_id` varchar(45) NOT NULL,
  `date_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `session_id`, `date_time`) VALUES
(49, 2, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:42:57'),
(50, 3, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:43:16'),
(51, 16, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:43:18'),
(52, 18, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:43:19'),
(53, 36, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:43:21'),
(54, 38, 2, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 14:43:25'),
(55, 1, 3, 'buvflb6v7l47kn5r8lbt5002n6c5jk7i', '2020-11-14 15:26:12');

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
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `session_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `img_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `img_name`) VALUES
(1, 'PS4', '20000.00', 'playstation4', 'product_101.jpg'),
(2, 'Макбук', '10000.00', 'яблоки яблоки\r\n', 'product_102.jpg'),
(3, 'Бамбук', '100500.00', 'Бамбук обыкновенный', 'product_103.jpg'),
(16, 'Бамбук', '666.00', 'Бамбук обыкновенный1', 'a4techmouse.jpg'),
(18, '0', '0.00', '555', 'product_104.jpg'),
(36, 'nnn', '777.00', 'ddd', 'product_108.jpg'),
(38, 'фигня', '22999.00', 'Суперфигня!', 'product_107.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `reg_date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `reg_date`) VALUES
(1, 'admin', 'c93cd45e0a5dd92cd06d2431c0242975', 0, NULL),
(2, 'Антон', '5a01d433a4366207d641e58ba4395b71', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_goods` (`product_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_goods` FOREIGN KEY (`product_id`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
