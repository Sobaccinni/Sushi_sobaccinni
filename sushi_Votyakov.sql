-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Окт 28 2024 г., 09:54
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sushi_Votyakov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `weight`, `price`, `img`) VALUES
(1, 'Классика', 'Набор, в который входят классические роли с натуральными ингредиентами. Идеальный выбор для тех, кто хочет насладиться традиционными вкусами японской кухни.', 800, 1500, 'img/1.svg'),
(2, 'Фиеста', 'Набор, в который входят классические роли с натуральными ингредиентами. Идеальный выбор для тех, кто хочет насладиться традиционными вкусами японской кухни.', 600, 1444, 'img/2.svg'),
(3, 'Мега ролл', 'Большой сытный ролл, наполненный множеством свежих ингредиентов. Отличный выбор для дружеской встречи или семейного ужина.', 750, 1800, 'img/3.svg'),
(4, 'Филадельфия микс', 'Набор, в который входят популярные роллы с кремом из сыра Филадельфия и свежими овощами. Прекрасное сочетание нежного вкуса и насыщенного аромата.', 900, 2200, 'img/4.svg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
