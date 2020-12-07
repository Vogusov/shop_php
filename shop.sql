-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2020 г., 20:24
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
(135, 1, 1, 'rc7cq3maqtqpud9v2d3bks3sqsvf98e4', '2020-11-26 15:20:51'),
(136, 2, 3, '81gavfqglbo69qrfqa98r38k8pgtrvb3', '2020-11-26 15:22:42'),
(137, 16, 1, '81gavfqglbo69qrfqa98r38k8pgtrvb3', '2020-11-26 15:22:36'),
(186, 1, 2, 'ore2scgn04tp2u095ogupq7632pkffbl', '2020-12-07 15:12:23'),
(187, 2, 2, 'ore2scgn04tp2u095ogupq7632pkffbl', '2020-12-07 15:12:44'),
(194, 38, 1, 'ldeooh3stck5hgat3g7r17g1p20r331a', '2020-12-07 15:46:32');

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
  `phone` varchar(45) NOT NULL,
  `date_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `session_id`, `name`, `phone`, `date_created`) VALUES
(2, 'pnaaa366rahnj7300h9ap4b6qgnvj22j', 'test', 'test', '2020-12-03 22:35:16'),
(3, 'pnaaa366rahnj7300h9ap4b6qgnvj22j', 'test', 'test', '2020-12-03 22:35:42'),
(18, 'ldeooh3stck5hgat3g7r17g1p20r331a', 'King', '*777*', '2020-12-07 15:17:28');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `img_name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `description`, `img_name`) VALUES
(1, 'PS4', 20000, 'playstation4', 'product_101.jpg'),
(2, 'Макбук', 10000, 'яблоки яблоки\r\n', 'product_102.jpg'),
(3, 'Бамбук', 100500, 'Бамбук обыкновенный', 'product_103.jpg'),
(16, 'Бамбук1', 666, 'Бамбук обыкновенный1', 'a4techmouse.jpg'),
(18, '0', 0, '555', 'product_104.jpg'),
(36, 'nnn', 777, 'ddd', 'product_108.jpg'),
(38, 'фигня', 22999, 'Суперфигня!', 'product_107.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_info` varchar(5000) DEFAULT NULL,
  `date_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `add_info`, `date_time`) VALUES
(104, 17, '', '2020-12-07 15:00:04'),
(105, 17, 'qwe', '2020-12-07 15:00:31'),
(106, 18, 'im the king', '2020-12-07 15:17:28'),
(107, 18, 'АауАа', '2020-12-07 15:45:32');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`, `date_time`) VALUES
(104, 1, 1, '2020-12-07 15:00:04'),
(105, 3, 1, '2020-12-07 15:00:31'),
(106, 1, 2, '2020-12-07 15:17:28'),
(106, 38, 3, '2020-12-07 15:17:28'),
(107, 3, 3, '2020-12-07 15:45:32');

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
  ADD KEY `fk_cart_goods` (`product_id`),
  ADD KEY `session_id_indx` (`session_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customers_cart_idx` (`session_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk-order-products_products` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `fk-order-products_products` FOREIGN KEY (`product_id`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order-products_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
