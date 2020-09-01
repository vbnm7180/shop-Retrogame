-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 30 2020 г., 19:48
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `retrogame2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `section_id`, `category_name`) VALUES
(1, 1, 'SEGA SATURN'),
(2, 1, 'SEGA MEGA DRIVE'),
(3, 1, 'SEGA DREAMCAST'),
(4, 1, 'NINTENDO NES'),
(5, 1, 'NINTENDO SNES'),
(6, 1, 'NINTENDO 64'),
(7, 2, 'Игры для Sega Saturn'),
(8, 2, 'Игры для Sega Mega Drive'),
(9, 2, 'Игры для Sega Dreamcast'),
(10, 2, 'Игры для Nintendo NES'),
(11, 2, 'Игры для Nintendo SNES'),
(12, 2, 'Игры для Nintendo 64');

-- --------------------------------------------------------

--
-- Структура таблицы `consoles_products`
--

CREATE TABLE `consoles_products` (
  `product_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `condition_rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `bundle` text NOT NULL,
  `region` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `consoles_products`
--

INSERT INTO `consoles_products` (`product_id`, `section_id`, `category_id`, `image`, `name`, `condition_rating`, `description`, `bundle`, `region`, `price`) VALUES
(1, 1, 1, 'sega_saturn.png', 'SEGA SATURN', 4, 'Консоль поставляется без коробки имеются небольшие царапины', 'Консоль, 2 геймпада, \r\nблок питания', 'PAL-Европа', 9990),
(2, 1, 1, 'sega_saturn.png', 'SEGA SATURN (BOX)', 5, 'Новая консоль в заводской коробке без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'PAL-Европа', 19990),
(3, 1, 2, 'sega_mega_drive.png', 'SEGA MEGA DRIVE', 5, 'Консоль поставляется без коробки без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'NTSC-Америка', 2000),
(4, 1, 2, 'sega_mega_drive.png', 'SEGA MEGA DRIVE (BOX)', 5, 'Новая консоль в заводской коробке без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'PAL-Европа', 2590),
(5, 1, 3, 'sega_dreamcast.png', 'SEGA DREAMCAST', 5, 'Консоль поставляется без коробки без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'NTSC-Америка', 6990),
(6, 1, 3, 'sega_dreamcast.png', 'SEGA DREAMCAST (BOX)', 5, 'Новая консоль в заводской коробке без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'PAL-Европа', 14990),
(7, 1, 4, 'nintendo_nes.png', 'NINTENDO NES', 4, 'Консоль поставляется без коробки без повреждений, но с небольшими царапинами на корпусе', 'Консоль, 1 геймпад, \r\nблок питания', 'NTSC-Америка', 5990),
(8, 1, 4, 'nintendo_nes.png', 'NINTENDO NES (BOX)', 5, 'Новая консоль c коробкой без повреждений и царапин', 'Консоль, 1 геймпад, \r\nблок питания, документация', 'PAL-Европа', 9990),
(9, 1, 5, 'nintendo_snes.png', 'NINTENDO SNES', 3, 'Консоль поставляется без коробки, корпус имеет пожелтение и царапины', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'NTSC-Америка', 4990),
(10, 1, 5, 'nintendo_snes.png', 'NINTENDO SNES (BOX)', 5, 'Новая консоль c коробкой без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'PAL-Европа', 12990),
(11, 1, 6, 'nintendo_64.png', 'NINTENDO 64', 5, 'Консоль поставляется без коробки без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'NTSC-Америка', 8990),
(12, 1, 6, 'nintendo_64.png', 'NINTENDO 64 (BOX)', 5, 'Новая консоль c коробкой без повреждений и царапин', 'Консоль, 2 геймпада, \r\nблок питания, документация', 'PAL-Европа', 14990);

-- --------------------------------------------------------

--
-- Структура таблицы `games_products`
--

CREATE TABLE `games_products` (
  `product_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `games_products`
--

INSERT INTO `games_products` (`product_id`, `section_id`, `category_id`, `image`, `name`, `price`) VALUES
(1, 2, 7, '7_burning_rangers.png', 'Burning Rangers', 299),
(2, 2, 7, '7_clockwork_knight.png', 'Clockwork Knight', 299),
(3, 2, 8, '7_fighters_megamix.png', 'Fighters Megamix', 299),
(4, 2, 7, '7_guardian_heroes.png', 'Guardian Heroes', 299),
(5, 2, 7, '7_house_of_the_dead.png', 'House of the dead', 299),
(6, 2, 7, '7_mr_bones.png', 'Mr Bones', 299),
(7, 2, 7, '7_nights_into_dreams.png', 'Nights into Dreams', 299),
(8, 2, 7, '7_shining_the_holy_ark.png', 'Shining the Holy Ark', 299),
(9, 2, 7, '7_sonic_jam.png', 'Sonic Jam', 299),
(10, 2, 7, '7_sonic_r.png', 'Sonic R', 299),
(11, 2, 7, '7_story_of_thor_2.png', 'Story of Thor 2', 299),
(12, 2, 7, '7_vurtia_fighter_2.png', 'Vurtia Fighter 2', 299),
(13, 2, 8, '8_altered_beast.png', 'Altered Beast', 299),
(14, 2, 8, '8_asterix_and_the_g_r.png', 'Asterix', 299),
(15, 2, 8, '8_clockwork_knight.png', 'Clockwork Knight', 299),
(16, 2, 8, '8_comix_zone.png', 'Comix Zone', 299),
(17, 2, 8, '8_dune_2.png', 'Dune 2', 299),
(18, 2, 8, '8_earthworm_jim.png', 'Earthworm Jim', 299),
(19, 2, 8, '8_phantasy_star_4.png', 'Phantasy Star 4', 299),
(20, 2, 8, '8_rock_n_roll_racing.png', 'Rockn Roll Racing', 299),
(21, 2, 8, '8_shining_force_2.png', 'Shining Force 2', 299),
(22, 2, 8, '8_spider-man_venom.png', 'Spider-Man Venom', 299),
(23, 2, 8, '8_tiny_toon.png', 'Tiny Toon Adventures', 299),
(24, 2, 8, '8_um_mortal_kombat_3.png', 'Mortal Kombat 3', 299),
(25, 2, 9, '9_alone_in_the_dark.png', 'Alone in the Dark', 299),
(26, 2, 9, '9_dead_or_alive_2.png', 'Dead or Alive 2', 299),
(27, 2, 9, '9_grandia_2.png', 'Grandia 2', 299),
(28, 2, 9, '9_jet_set_radio.png', 'Jet Set Radio', 299),
(29, 2, 9, '9_quake_3_arena.png', 'Quake 3 Arena', 299),
(30, 2, 9, '9_resident_evil_2.png', 'Resident Evil 2', 299),
(31, 2, 9, '9_resident_evil_veronika.png', 'Resident Evil Veronika', 299),
(32, 2, 9, '9_shenmue.png', 'Shenmue', 299),
(33, 2, 9, '9_skies_of_arcadia.png', 'Skies of Arcadia', 299),
(34, 2, 9, '9_sonic_adventure_2.png', 'Sonic Adventure 2', 299),
(35, 2, 9, '9_soulcalibr.png', 'Soul Calibur', 299),
(36, 2, 9, '9_unreal_tournament.png', 'Unreal Tournament', 299),
(37, 2, 10, '10_baloon_fight.png', 'Baloon Fight', 299),
(38, 2, 10, '10_battletoads.png', 'Battletoads', 299),
(39, 2, 10, '10_donkey_kong_jr.png', 'Donkey Kong Jr', 299),
(40, 2, 10, '10_dr_mario.png', 'Dr Mario', 299),
(41, 2, 10, '10_excitebike.png', 'Excitebike', 299),
(42, 2, 10, '10_ice_climber.png', 'Ice Climber', 299),
(43, 2, 10, '10_kirbys_adventure.png', 'Kirby Adventure', 299),
(44, 2, 10, '10_mega_man_2.png', 'Mega Man 2', 299),
(45, 2, 10, '10_ninja_gaiden.png', 'Ninja Gaiden', 299),
(46, 2, 10, '10_super_mario_3.png', 'Super Mario Bros 3', 299),
(47, 2, 10, '10_tetris.png', 'Tetris', 299),
(48, 2, 10, '10_the_legend_of_zelda.png', 'The Legend of Zelda', 299),
(49, 2, 11, '11_battletoads_dd.png', 'Battletoads Double Dragon', 299),
(50, 2, 11, '11_chrono_trigger.png', 'Chrono Trigger', 299),
(51, 2, 11, '11_donkey_kong_country.png', 'Donkey Kong Country 2', 299),
(52, 2, 11, '11_f_zero.png', 'F-Zero', 299),
(53, 2, 11, '11_kirby_super_star.png', 'Kirby Super Star', 299),
(54, 2, 11, '11_star_fox.png', 'Star Fox', 299),
(55, 2, 11, '11_street_fighter_2.png', 'Street Fighter 2', 299),
(56, 2, 11, '11_super_bomberman.png', 'Super Bomberman', 299),
(57, 2, 11, '11_super_mario_world.png', 'Super Mario World', 299),
(58, 2, 11, '11_super_mario_world_2.png', 'Super Mario World 2', 299),
(59, 2, 11, '11_super_metroid.png', 'Super Metroid', 299),
(60, 2, 11, '11_the_legend_of_zelda.png', 'The Legend of Zelda SNES', 299),
(61, 2, 12, '12_animal_crossing.png', 'Animal Crossing', 299),
(62, 2, 12, '12_banjo_tooje.png', 'Banjo Tooje', 299),
(63, 2, 12, '12_conkers_bad_fur_day.png', 'Conkers Bad Fur Day', 299),
(64, 2, 12, '12_diddy_kong_racing.png', 'Diddy Kong Racing', 299),
(65, 2, 12, '12_donkey_kong_64.png', 'Donkey Kong 64', 299),
(66, 2, 12, '12_golden_eye_007.png', 'Golden Eye 007', 299),
(67, 2, 12, '12_mario_cart_64.png', 'Mario Cart 64', 299),
(68, 2, 12, '12_mortal_kombat_trilogy.png', 'Mortal Kombat Trilogy', 299),
(69, 2, 12, '12_pokemon_snap.png', 'Pokemon Snap', 299),
(70, 2, 12, '12_pokemon_stadium_2.png', 'Pokemon Stadium 2', 299),
(71, 2, 12, '12_star_fox_64.png', 'Star Fox 64', 299),
(72, 2, 12, '12_super_mario_64.png', 'Super Mario 64', 299);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` int(7) UNSIGNED ZEROFILL NOT NULL,
  `products` varchar(200) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_street` text NOT NULL,
  `customer_postcode` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `products`, `customer_name`, `customer_email`, `customer_phone`, `customer_city`, `customer_street`, `customer_postcode`, `total_price`, `order_date`) VALUES
(1, 0000001, '0', '', '', '', '', '', 0, 0, '0000-00-00'),
(2, 0000002, '0', '', '', '', '', '', 0, 598, '2020-08-29'),
(3, 0000002, '0', '', '', '', '', '', 0, 598, '2020-08-29'),
(4, 0000003, '0', 'Иванов Иван', 'v@m.ru', '8978', 'Ижевск', 'Барышникова', 5678, 598, '2020-08-29'),
(5, 0000003, '0', 'Иванов Иван', 'v@m.ru', '8978', 'Ижевск', 'Барышникова', 5678, 598, '2020-08-29'),
(6, 0000004, '2', 'Иванов Иван', 'v@m.ru', '+79127417640', 'Иж', '', 323, 598, '2020-08-29'),
(7, 0000004, '10', 'Иванов Иван', 'v@m.ru', '+79127417640', 'Иж', '', 323, 598, '2020-08-29'),
(8, 0000005, '1-10, 2-12, 2-11', 'Иванов Иван Иванович', 'v@m.ru', '89127564321', 'Барышникова, д.35, кв.7', 'Бар', 426078, 13588, '2020-08-29'),
(9, 0000006, '1-1, 2-7, 2-10, 2-9', 'Иванов Иван Иванович', '1@m.ru', '89127564321', 'Ижевск', 'Барышникова, д.35, кв.7', 426078, 10887, '2020-08-29'),
(11, 0000007, '1-3, 2-53', 'Иванов Иван Иванович', '1@m.ru', '89127564321', 'Ижевск', 'Барышникова, д.35, кв.7', 426078, 2299, '2020-08-29');

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`) VALUES
(1, 'Игровые консоли'),
(2, 'Игры');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `postcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `name`, `phone`, `city`, `street`, `postcode`) VALUES
(5, '1@m.ru', '$2y$10$5QylABQ7N.fRNaIjqLR6puoyEHZsI0Fo4FxSCn/.EIhR/m64bM6BK', 'Иванов Иван Иванович', '89127564321', 'Ижевск', 'Барышникова, д.35, кв.7', '426078'),
(7, '1111@mail.ru', '$2y$10$iloeLByZbigOcoruv1IsN.vOTn1F.kIkSvlbHbtyfueuYbVVUnnlS', 'sda', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `consoles_products`
--
ALTER TABLE `consoles_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `games_products`
--
ALTER TABLE `games_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `consoles_products`
--
ALTER TABLE `consoles_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `games_products`
--
ALTER TABLE `games_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
