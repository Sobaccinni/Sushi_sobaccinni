-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2025 г., 10:21
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sushi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_id`) VALUES
(1, 'Наборы'),
(2, 'Роллы'),
(3, 'Суши'),
(4, 'Сашими'),
(5, 'Салаты'),
(6, 'Напитки'),
(7, 'Десерты'),
(8, 'Дополнительно');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `price` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `weight`, `price`, `img`, `category_id`) VALUES
(5, '123', '123', 123, 1, 'uploads/image.jpg', 1),
(6, '123', '123', 123, 123, 'uploads/slide2.jpg', 2),
(7, '123', '123', 123, 123, 'uploads/slide3.jpg', 7),
(8, 'Сет Филадельфия', 'Набор с лососем и сливочным сыром', 1000, 1299, 'uploads/image.jpg', 1),
(9, 'Сет Калифорния', 'Ассорти роллов с крабом и авокадо', 900, 1199, 'uploads/image.jpg', 1),
(10, 'Сет Дракон', 'Набор роллов с угрем и соусом унаги', 950, 1399, 'uploads/image.jpg', 1),
(11, 'Сет Вегетарианский', 'Роллы с овощами и тофу', 850, 999, 'uploads/image.jpg', 1),
(12, 'Филадельфия', 'Ролл с лососем и сливочным сыром', 250, 499, 'uploads/image.jpg', 2),
(13, 'Калифорния', 'Ролл с крабом, огурцом и авокадо', 240, 459, 'uploads/image.jpg', 2),
(14, 'Спайси Тунец', 'Острый ролл с тунцом и соусом', 230, 479, 'uploads/image.jpg', 2),
(15, 'Ролл Дракон', 'Ролл с угрем и унаги соусом', 260, 529, 'uploads/image.jpg', 2),
(16, 'Суши Лосось', 'Кусочек риса с ломтиком лосося', 50, 159, 'uploads/image.jpg', 3),
(17, 'Суши Тунец', 'Кусочек риса с ломтиком тунца', 50, 169, 'uploads/image.jpg', 3),
(18, 'Суши Угорь', 'Кусочек риса с угрем и унаги соусом', 55, 189, 'uploads/image.jpg', 3),
(19, 'Суши Креветка', 'Кусочек риса с тигровой креветкой', 45, 179, 'uploads/image.jpg', 3),
(20, 'Сашими Лосось', 'Тонко нарезанные ломтики лосося', 120, 499, 'uploads/image.jpg', 4),
(21, 'Сашими Тунец', 'Тонко нарезанные ломтики тунца', 110, 529, 'uploads/image.jpg', 4),
(22, 'Сашими Угорь', 'Ломтики угря с соусом унаги', 115, 559, 'uploads/image.jpg', 4),
(23, 'Сашими Ассорти', 'Ассорти из лосося, тунца и угря', 140, 699, 'uploads/image.jpg', 4),
(24, 'Чука', 'Морской салат с ореховым соусом', 150, 349, 'uploads/image.jpg', 5),
(25, 'Кани', 'Салат с крабом и огурцом', 170, 379, 'uploads/image.jpg', 5),
(26, 'Овощной', 'Салат из свежих овощей', 200, 299, 'uploads/image.jpg', 5),
(27, 'Тофу Салат', 'Салат с тофу и кунжутной заправкой', 180, 319, 'uploads/image.jpg', 5),
(28, 'Зелёный чай', 'Чашка ароматного зелёного чая', 250, 149, 'uploads/image.jpg', 6),
(29, 'Кола', 'Газированный напиток 0.5 л', 500, 199, 'uploads/image.jpg', 6),
(30, 'Апельсиновый сок', 'Свежевыжатый апельсиновый сок', 300, 249, 'uploads/image.jpg', 6),
(31, 'Минеральная вода', 'Бутылка негазированной воды 0.5 л', 500, 129, 'uploads/image.jpg', 6),
(32, 'Моти Клубничный', 'Японский десерт с клубничной начинкой', 120, 249, 'uploads/image.jpg', 7),
(33, 'Моти Шоколадный', 'Японский десерт с шоколадной начинкой', 120, 249, 'uploads/image.jpg', 7),
(34, 'Тирамису', 'Классический итальянский десерт', 150, 329, 'uploads/image.jpg', 7),
(35, 'Сырный торт', 'Десерт на основе сыра маскарпоне', 170, 359, 'uploads/image.jpg', 7),
(36, 'Имбирь', 'Маринованный имбирь', 50, 49, 'uploads/image.jpg', 8),
(37, 'Васаби', 'Острая японская приправа', 30, 39, 'uploads/image.jpg', 8),
(38, 'Соевый соус', 'Соус для роллов и суши', 100, 59, 'uploads/image.jpg', 8),
(39, 'Палочки', 'Пара деревянных палочек', 20, 19, 'uploads/image.jpg', 8),
(40, 'misha', 'Прекрасное дополнение к вашему заказу', 100, 1069, 'uploads/изображение_2025-03-19_144329339.png', 8),
(41, '124124234', 'Прекрасное дополнение к вашему заказу', 122, 33333333, 'uploads/logotip.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Пользователь'),
(2, 'Админ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role_id`) VALUES
(6, 'Alex', '123@123.123', '123', 1),
(7, 'admin', 'admin@admin.com', 'admin11', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
