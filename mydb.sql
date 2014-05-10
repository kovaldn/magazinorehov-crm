-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 10 2014 г., 15:51
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assortment`
--

CREATE TABLE IF NOT EXISTS `assortment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_alias` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price_original` decimal(10,2) NOT NULL,
  `price_sale` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_UNIQUE` (`id`),
  UNIQUE KEY `alias_UNIQUE` (`product_alias`),
  UNIQUE KEY `product_name_UNIQUE` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `assortment`
--

INSERT INTO `assortment` (`id`, `product_alias`, `product_name`, `price_original`, `price_sale`, `profit`) VALUES
(1, 'pekan', 'пекан', '1000.00', '1500.00', '500.00'),
(2, 'keshu', 'кешью', '300.00', '600.00', '300.00'),
(3, 'greckiy', 'грецкий', '400.00', '500.00', '100.00');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `other` text,
  `manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_id_UNIQUE` (`id`),
  KEY `manager_id_to_managers_idx` (`manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `fio`, `phone`, `email`, `address`, `other`, `manager_id`) VALUES
(1, 'Марина', 987654321, 'kovaldn@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `managers_id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `managers`
--

INSERT INTO `managers` (`id`, `fio`) VALUES
(1, 'Дмитрий'),
(2, 'Николай'),
(3, 'Андрей');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_close` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id_UNIQUE` (`id`),
  KEY `customer_id_to_customers_idx` (`customer_id`),
  KEY `status_id_to_statuses_idx` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_detail_id`, `date_create`, `date_close`, `status_id`) VALUES
(1, 1, 1, NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_details_id_UNIQUE` (`id`),
  KEY `product_it_toassortiment_idx` (`product_id`),
  KEY `order_id_to_orders_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_amount`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 1, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'ожидает отгрузки'),
(2, 'отгружено');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `manager_id_to_managers` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_to_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_id_to_statuses` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `order_id_to_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_it_toassortiment` FOREIGN KEY (`product_id`) REFERENCES `assortment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
