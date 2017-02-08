-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2017 г., 14:32
-- Версия сервера: 5.6.29-log
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `antistress`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `sort_order`, `status`) VALUES
(1, 'игрушки антистресс', 1, 1, 1),
(2, 'подушки антистресс', 1, 2, 1),
(3, 'подголовники', 1, 3, 1),
(4, 'антистрессовые брелки', 1, 4, 1),
(5, 'сувениры', 1, 5, 1),
(6, 'для неё', 2, 6, 1),
(7, 'для него', 2, 7, 1),
(8, 'девочке', 2, 8, 1),
(9, 'мальчику', 2, 9, 1),
(10, 'коллеге', 2, 10, 1),
(11, 'паре', 2, 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `sale` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `for_person` int(11) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `Is_sale` int(11) NOT NULL DEFAULT '0',
  `is_hit` int(11) DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `date`, `category_id`, `subcategory_id`, `code`, `price`, `sale`, `availability`, `brand`, `image`, `description`, `for_person`, `is_new`, `Is_sale`, `is_hit`, `is_recommended`, `status`) VALUES
(1, 'Валик-арбуз', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '', '/template/images_for_toys/Валик-арбуз.jpg', 'Описание товара', 0, 1, 0, 0, 0, 1),
(2, 'Подушка-смайлик', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Подушка-смайлик.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(3, 'Енот Тимоха', '2017-01-01 03:01:10', 3, 8, 0, 200, 0, 1, '0', '/template/images_for_toys/Тимоха.jpg', 'Описание товара', 0, 0, 0, 1, 1, 1),
(4, 'Пингвин Ло-Ло', '2017-01-01 03:01:20', 1, 9, 0, 20.3, 0, 1, '', '/template/images_for_toys/Ло Ло.jpg', 'Описание товара', 0, 0, 0, 0, 1, 1),
(5, 'Злой Птиц', '2017-01-01 03:01:30', 2, 9, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Злая Птица.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(6, 'Оранжевый валик-кот', '2017-01-01 03:01:40', 3, 10, 0, 200, 0, 1, '0', '/template/images_for_toys/Оранжевый валик-кот.jpg', 'Описание товара', 0, 1, 0, 1, 1, 1),
(7, 'Валик-арбуз', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '', '/template/images_for_toys/Валик-арбуз.jpg', 'Описание товара', 0, 1, 0, 0, 0, 1),
(8, 'Подушка-смайлик', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Подушка-смайлик.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(9, 'Енот Тимоха', '2017-01-01 03:01:10', 3, 8, 0, 200, 0, 1, '0', '/template/images_for_toys/Тимоха.jpg', 'Описание товара', 0, 0, 0, 1, 1, 1),
(10, 'Пингвин Ло-Ло', '2017-01-01 03:01:20', 1, 9, 0, 20.3, 0, 1, '', '/template/images_for_toys/Ло Ло.jpg', 'Описание товара', 0, 0, 0, 0, 1, 1),
(11, 'Злой Птиц', '2017-01-01 03:01:30', 2, 9, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Злая Птица.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(12, 'Подушка-смайлик', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Подушка-смайлик.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(13, 'Злой Птиц', '2017-01-01 03:01:30', 2, 9, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Злая Птица.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1),
(14, 'Валик-арбуз', '2017-01-01 03:01:00', 2, 6, 0, 20.3, 0, 1, '', '/template/images_for_toys/Валик-арбуз.jpg', 'Описание товара', 0, 1, 0, 0, 0, 1),
(15, 'Злой Птиц', '2017-01-01 03:01:30', 2, 9, 0, 20.3, 0, 1, '0', '/template/images_for_toys/Злая Птица.jpg', 'Описание товара', 0, 0, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `products`, `date`, `status`) VALUES
(1, 'user1', '0295042300', 'хочу всё это', 1, '0', '2017-01-23 09:52:36', 0),
(2, 'user3', '+375295042300', '', 3, '0', '2017-01-23 09:57:26', 0),
(3, 'user3', '+375295042300', '12341234', 3, '{"15":1,"12":1}', '2017-01-23 10:15:40', 0),
(4, 'Гость', '+375295042300', 'хачу такое', 0, '{"37":1,"36":1,"35":1}', '2017-01-23 10:59:43', 0),
(5, 'Второй гость', '+375447783732', 'апрериапи', 0, '{"15":1,"12":1,"5":1,"2":3}', '2017-01-23 11:01:07', 1),
(6, 'Вася', '+375295042300', 'хачу такое', 0, '{"37":1,"36":1,"35":1,"32":1,"33":1}', '2017-01-25 22:07:02', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'для неё', 1, 1),
(2, 'для него', 2, 1),
(3, 'паре', 3, 1),
(4, 'коллеге', 4, 1),
(5, 'девочке', 5, 1),
(6, 'мальчику', 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'user1', 'user1@mail.ru', '123456'),
(2, 'user2', 'user2@mail.ru', '123456'),
(3, 'user3', 'user3@mail.ru', '111111'),
(4, 'user4', 'user4@mail.ru', '123456'),
(5, 'user5', 'user5@mail.ru', '123456'),
(6, 'Витёк', 'vitya@mail.ru', '123456');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `subcategory`
--
ALTER TABLE `subcategory`
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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
