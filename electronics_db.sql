-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2019 г., 18:08
-- Версия сервера: 5.5.58
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `electronics_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Ноутбуки', 1, 1),
(2, 'Мониторы', 2, 1),
(3, 'Клавиатуры', 3, 1),
(4, 'Мыши ', 4, 1),
(5, 'Колонки', 5, 1),
(8, 'Устройства БП', 8, 1),
(7, 'Блоки питания', 7, 1),
(6, ' Корпуса', 6, 1),
(9, 'Аксессуары', 9, 1),
(17, 'proba', 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `id_product` int(11) NOT NULL,
  `param_1` varchar(255) NOT NULL,
  `param_2` varchar(255) NOT NULL,
  `param_3` varchar(255) NOT NULL,
  `param_4` varchar(255) NOT NULL,
  `param_5` varchar(255) NOT NULL,
  `value_1` varchar(255) NOT NULL,
  `value_2` varchar(255) NOT NULL,
  `value_3` varchar(255) NOT NULL,
  `value_4` varchar(255) NOT NULL,
  `value_5` varchar(255) NOT NULL,
  `param_6` varchar(255) NOT NULL,
  `param_7` varchar(255) NOT NULL,
  `param_8` varchar(255) NOT NULL,
  `param_9` varchar(255) NOT NULL,
  `param_10` varchar(255) NOT NULL,
  `value_6` varchar(255) NOT NULL,
  `value_7` varchar(255) NOT NULL,
  `value_8` varchar(255) NOT NULL,
  `value_9` varchar(255) NOT NULL,
  `value_10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`id_product`, `param_1`, `param_2`, `param_3`, `param_4`, `param_5`, `value_1`, `value_2`, `value_3`, `value_4`, `value_5`, `param_6`, `param_7`, `param_8`, `param_9`, `param_10`, `value_6`, `value_7`, `value_8`, `value_9`, `value_10`) VALUES
(1, 'Бренд', 'Тип', 'Соотношение сторон', 'Видеокарта', 'Расширение дисплея', 'GPD', 'Ноутбук', '16 : 10', 'Intel(R) HD', '1900 x 1200', 'Толщина', 'Вес', 'Тип диска', 'Емкость диска', 'Операционная система', '(10 - 18)мм ', '0,48 кг', ' EMMC', '128 Гб', 'Windows 10'),
(2, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', '', '', '2', '2', '', '', ''),
(3, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '', '', '3', '3', '3', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'value_1', 'value_1', 'value_1', 'value_1', 'value_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'value_1', 'value_1', 'value_1', 'value_1', 'value_1'),
(13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'parameter_1', 'parameter_2', 'parameter_3', 'parameter_4', 'parameter_5', 'value_1', 'value_1', 'value_3', 'value_4', 'value_5', 'OS', 'parameter_7', 'parameter_8', '', '', 'windows 7', 'value_7', 'parameter_8', '', ''),
(21, 'parameter_1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `details_content`
--

CREATE TABLE `details_content` (
  `content_id` int(11) NOT NULL,
  `main_des` text CHARACTER SET utf8 NOT NULL,
  `des_1` text CHARACTER SET utf8 NOT NULL,
  `img_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `des_2` text CHARACTER SET utf8 NOT NULL,
  `img_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `des_3` text CHARACTER SET utf8 NOT NULL,
  `img_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `des_4` text CHARACTER SET utf8 NOT NULL,
  `img_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `des_5` text CHARACTER SET utf8 NOT NULL,
  `img_5` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `details_content`
--

INSERT INTO `details_content` (`content_id`, `main_des`, `des_1`, `img_1`, `des_2`, `img_2`, `des_3`, `img_3`, `des_4`, `img_4`, `des_5`, `img_5`) VALUES
(1, 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', '/upload/images/products/1_description_1.jpg', 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', '/upload/images/products/1_description_2.jpg', 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', ' /upload/images/products/1_description_3.jpg', 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', '/upload/images/products/1_description_4.jpg', 'Lorem ipsum dolor sit amet. Odit aut rerum necessitatibus saepe eveniet. Molestias excepturi sint, obcaecati cupiditate non numquam eius modi. Exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Dicta sunt, explicabo magni dolores eos, qui in ea commodi autem. Non provident, similique sunt in culpa, qui in culpa. Aliquid ex ea commodi autem vel illum, qui neque porro. Quisquam est, qui blanditiis praesentium. Dolor sit, amet, consectetur, adipisci velit, sed ut.', '/upload/images/products/1_description_5.jpg'),
(2, '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '', '', '', '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', '', '', '', '', ''),
(9, '', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', '', '', '', ''),
(13, '', '', '', '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', '/upload/images/products/17_description_1.jpg', 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', '/upload/images/products/17_description_2.jpg', 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', '/upload/images/products/17_description_3.jpg', 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', '/upload/images/products/17_description_4.jpg', 'Lorem ipsum dolor sit amet. Natus error sit voluptatem sequi. Eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui voluptatem. Ea voluptate velit esse, quam nihil impedit, quo voluptas. Vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Ipsa, quae ab illo inventore veritatis et quasi. Cum soluta nobis est et dolore magnam aliquam. Sint et iusto odio dignissimos ducimus. Optio, cumque nihil impedit.', '/upload/images/products/17_description_5.jpg'),
(21, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `code_prev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `code` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_1` text CHARACTER SET utf8 NOT NULL,
  `description_2` text CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `imgbig_1` varchar(255) NOT NULL,
  `imgbig_2` varchar(255) NOT NULL,
  `imgbig_3` varchar(255) NOT NULL,
  `imgbig_4` varchar(255) NOT NULL,
  `imgbig_5` varchar(255) NOT NULL,
  `imgmin_1` varchar(255) NOT NULL,
  `imgmin_2` varchar(255) NOT NULL,
  `imgmin_3` varchar(255) NOT NULL,
  `imgmin_4` varchar(255) NOT NULL,
  `imgmin_5` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `category_name`, `code_prev`, `code`, `availability`, `brand`, `description_1`, `description_2`, `price`, `is_new`, `is_recommended`, `status`, `imgbig_1`, `imgbig_2`, `imgbig_3`, `imgbig_4`, `imgbig_5`, `imgmin_1`, `imgmin_2`, `imgmin_3`, `imgmin_4`, `imgmin_5`) VALUES
(1, 'Новый оригинальный GPD Pocket2 Мини ноутбук UMPC Windows 10 Процессор m3-8100y 8 Гб', 1, 'Ноутбуки', 'LP_', 1, 1, 'GPD', 'Lorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid.', 'Lorem ipsum dolor sit amet.', 125.33, 0, 0, 1, '/upload/images/products/1_imgbig_1.jpg', '/upload/images/products/1_imgbig_2.jpg', '/upload/images/products/1_imgbig_3.jpg', '/upload/images/products/1_imgbig_4.jpg', '/upload/images/products/1_imgbig_5.jpg', '/upload/images/products/1_imgmin_1.jpg', '/upload/images/products/1_imgmin_2.jpg', '/upload/images/products/1_imgmin_3.jpg', '/upload/images/products/1_imgmin_4.jpg', '/upload/images/products/1_imgmin_5.jpg'),
(2, 'Новый оригинальный GPD Pocket2 Мини ноутбук UMPC Windows 10 Процессор m3-8100y 8 ГБ', 1, 'Ноутбуки', 'LP_', 2, 1, 'GPD', 'Lorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid.', 'Lorem ipsum dolor sit amet.', 123, 0, 0, 1, '/template/img/computers/laptop/exemple_1/lp1.png', '/template/img/computers/laptop/exemple_1/lp2.png', '/template/img/computers/laptop/exemple_1/lp3.png', '/template/img/computers/laptop/exemple_1/lp4.png', '/template/img/computers/laptop/exemple_1/lp5.png', '/template/img/computers/laptop/exemple_1/min-lp1.png', '/template/img/computers/laptop/exemple_1/min-lp2.png', '/template/img/computers/laptop/exemple_1/min-lp3.png', '/template/img/computers/laptop/exemple_1/min-lp4.png', ''),
(3, 'Новый оригинальный GPD Pocket2 Мини ноутбук UMPC Windows 10 Процессор m3-8100y 8 ГБ', 1, 'Ноутбуки', 'LP_', 3, 1, 'GPD', 'Краткое описание единици товара и его характеристики', 'Дополнительная информация.', 123.6, 0, 0, 1, '/template/img/computers/laptop/exemple_1/lp1.png', '/template/img/computers/laptop/exemple_1/lp2.png', '/template/img/computers/laptop/exemple_1/lp3.png', '/template/img/computers/laptop/exemple_1/lp4.png', '', '/template/img/computers/laptop/exemple_1/min-lp1.png', '/template/img/computers/laptop/exemple_1/min-lp2.png', '/template/img/computers/laptop/exemple_1/min-lp3.png', '/template/img/computers/laptop/exemple_1/min-lp4.png', '/template/img/computers/laptop/exemple_1/min-lp5.png'),
(5, 'Монитор ACER', 2, 'Мониторы', 'MON_', 5, 1, 'ACER', 'Lorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid', 'НОВИНКА', 92.34, 0, 0, 1, '\\template\\img\\computers\\monitors\\acer_HA240YBID\\acer_um_qw0ee_1.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\acer_um_qw0ee_2.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\acer_um_qw0ee_3.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\acer_um_qw0ee_4.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\acer_um_qw0ee_5.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\min-acer_um_qw0ee_1.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\min-acer_um_qw0ee_2.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\min-acer_um_qw0ee_3.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\min-acer_um_qw0ee_4.jpg', '\\template\\img\\computers\\monitors\\acer_HA240YBID\\min-acer_um_qw0ee_5.jpg'),
(6, 'Беспроводная игровая клавиатура и мышь UKC HK-8100\r\n', 3, 'Клавиатуры', 'KEY_', 6, 1, 'UKC ', 'НОВИНКА', 'Lorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid', 50.5, 0, 0, 1, '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692309392.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692309842.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692310466.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692312158.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692312776.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692309692.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692310340.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692310778.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692312338.jpg', '\\template\\img\\computers\\keyboards\\UKC HK-8100\\70929368_images_10692312998.jpg'),
(7, 'Клавиатура HX-KB5ME2-RU', 3, 'Клавиатуры', 'KEY_', 7, 1, 'HX-KB5ME2-RU', 'НОВИНКА', 'Lorem ipsum dolor sit amet.', 62.3, 0, 0, 1, '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289690949.jpg', '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289691567.jpg', '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289692173.jpg', '', '', '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289691309.jpg', '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289691855.jpg', '\\template\\img\\computers\\keyboards\\HX-KB5ME2-RU\\hyperx_hx_kb5me2_ru_images_10289692605.jpg', '', ''),
(8, 'Компьютерная мышь Logitech M170', 4, 'Мыши', 'CM_', 8, 1, 'Logitech', 'Компьютерная мышь', 'Logitech M170\r\nLorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid.', 25.5, 0, 0, 1, '\\template\\img\\computers\\mouses\\Logitech M170\\big_0.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\big_1.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\big_2.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\big_3.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\big_4.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\min_0.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\min_1.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\min_2.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\min_3.jpg', '\\template\\img\\computers\\mouses\\Logitech M170\\min_4.jpg'),
(9, 'Компьютерная мышь Rapoo 3910р', 4, 'Мыши', 'CM_', 9, 1, 'Rapoo', 'Rapoo 3910р', 'Logitech M170 Lorem ipsum dolor sit amet. Excepturi sint, obcaecati cupiditate non numquam eius modi tempora incidunt, ut aliquid.', 30, 0, 0, 1, '\\template\\img\\computers\\mouses\\rapoo\\big_1.jpg', '\\template\\img\\computers\\mouses\\rapoo\\big_2.jpg', '\\template\\img\\computers\\mouses\\rapoo\\big_3.jpg', '', '', '\\template\\img\\computers\\mouses\\rapoo\\min_1.jpg', '\\template\\img\\computers\\mouses\\rapoo\\min_2.jpg', '\\template\\img\\computers\\mouses\\rapoo\\min_3.jpg', '', ''),
(10, 'АКУСТИЧЕСКАЯ СИСТЕМА LOGITECH S-120 BLACK (980-000010)', 5, 'Акустика', 'S0_', 10, 1, 'LOGITECH', 'Logitech S-120 (980-000010) -это компактная акустическая система формата 2.0. Отлично подходит для использования с ПК и ноутбуками. Наслаждайтесь богатым, полным звуком, конструкцией с красивыми контурами и удобными элементами управления. ', 'Модель имеет улучшенные акустические характеристики и общую мощность 2,3 Вт', 42.35, 0, 0, 1, '\\template\\img\\computers\\acoustics\\980-000010\\big_1.jpg', '', '', '', '', '\\template\\img\\computers\\acoustics\\980-000010\\min_1.jpg', '', '', '', ''),
(11, 'АКУСТИЧЕСКАЯ СИСТЕМА LOGITECH S-120 BLACK (980-000010)', 5, 'Акустика', 'S0_', 11, 1, 'LOGITECH', 'Logitech S-120 (980-000010) -это компактная акустическая система формата 2.0. Отлично подходит для использования с ПК и ноутбуками. Наслаждайтесь богатым, полным звуком, конструкцией с красивыми контурами и удобными элементами управления. ', 'Модель имеет улучшенные акустические характеристики и общую мощность 2,3 Вт', 45.3, 0, 0, 1, '\\template\\img\\computers\\acoustics\\980-000010\\big_1.jpg', '', '', '', '', '\\template\\img\\computers\\acoustics\\980-000010\\min_1.jpg', '', '', '', ''),
(12, 'КОРПУС CHIEFTEC LIBRA (LT-01B-450S8)', 6, 'Корпуса', 'S0_', 12, 1, 'CHIEFTEC', 'Корпус CHIEFTEC Libra (LT-01B-450S8)   - корпус формата Mini Tower, созданный в современном эргономичном стиле и позволяющий использовать в системе материнские платы формата microATX. С корпусом LG-01B Вы сможете использовать все преимущества HD Audio и USB 3.0. ', 'Компактный корпус для мощного железа\r\nКорпус поддерживает стандартные блоки питания и длинные видеоркарты что делает его удачным выбором для малогабаритной игровой и мультимедийной системы.', 92.3, 0, 0, 1, '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_1.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_2.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_3.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_4.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_5.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_1.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_2.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_3.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_4.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_5.jpg'),
(13, 'КОРПУС CHIEFTEC LIBRA (LT-01B-450S8)', 6, 'Корпуса', 'S0_', 13, 1, 'CHIEFTEC', 'Корпус CHIEFTEC Libra (LT-01B-450S8)   - корпус формата Mini Tower, созданный в современном эргономичном стиле и позволяющий использовать в системе материнские платы формата microATX. С корпусом LG-01B Вы сможете использовать все преимущества HD Audio и USB 3.0. ', 'Компактный корпус для мощного железа\r\nКорпус поддерживает стандартные блоки питания и длинные видеоркарты что делает его удачным выбором для малогабаритной игровой и мультимедийной системы.', 98.6, 0, 0, 1, '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_1.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_2.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_3.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_4.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\big_5.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_1.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_2.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_3.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_4.jpg', '\\template\\img\\computers\\corps\\LT-01B-450S8\\min_5.jpg'),
(14, 'БЛОК ПИТАНИЯ CHIEFTEC 700W (GPS-700A8)', 7, 'Блоки питания', 'S0_', 14, 1, 'CHIEFTEC', 'Блок CHIEFTEC 700W (GPS-700A8) оснащен кулером, который благодаря увеличенному размеру и меньшей частоте вращения, еффективно охлаждает БП и при этом остается малошумным.', '', 62.3, 0, 0, 1, '\\template\\img\\computers\\powerblock\\GPS-700A8\\big_1.jpg', '', '', '', '', '\\template\\img\\computers\\powerblock\\GPS-700A8\\min_1.jpg', '', '', '', ''),
(15, 'БЛОК ПИТАНИЯ CHIEFTEC 700W (GPS-700A8)', 7, 'Блоки питания', 's0_', 15, 1, 'CHIEFTEC', 'Блок CHIEFTEC 700W (GPS-700A8) оснащен кулером, который благодаря увеличенному размеру и меньшей частоте вращения, еффективно охлаждает БП и при этом остается малошумным.', '', 53.9, 0, 0, 1, '\\template\\img\\computers\\powerblock\\GPS-700A8\\big_1.jpg', '', '', '', '', '\\template\\img\\computers\\powerblock\\GPS-700A8\\min_1.jpg', '', '', '', ''),
(16, 'ИСТОЧНИК БЕСПЕРЕБОЙНОГО ПИТАНИЯ APC SMART-UPS C 1500VA LCD 230V (SMC1500I)', 8, 'UPS', 'S0_', 16, 1, 'APC', 'Источники бесперебойного питания APC Smart-UPS защищает от некачественного питания, от перепадов во время напряжения и застоев, когда оборудование не может работать из-за высоких нагрузок.', '', 60.3, 0, 0, 1, '\\template\\img\\computers\\UPS\\SMC1500I\\big_1.jpg', '\\template\\img\\computers\\UPS\\SMC1500I\\big_2.jpg', '', '', '', '\\template\\img\\computers\\UPS\\SMC1500I\\min_1.jpg', '\\template\\img\\computers\\UPS\\SMC1500I\\min_2.jpg', '', '', ''),
(17, 'proba_proba', 1, 'laptops', 'S0_', 17, 1, 'hp', 'описание №1', 'Разрешить предзагрузку страниц для повышения скорости работы браузера и поиска\r\nИспользовать файлы cookie, чтобы запомнить ваши предпочтения, даже если вы не открываете эти страницы', 36.9, 1, 1, 1, '/upload/images/products/17_imgbig_1.jpg', '/upload/images/products/17_imgbig_2.jpg', '/upload/images/products/17_imgbig_3.jpg', '/upload/images/products/17_imgbig_4.jpg', '/upload/images/products/17_imgbig_5.jpg', '/upload/images/products/17_imgmin_1.jpg', '/upload/images/products/17_imgmin_2.jpg', '/upload/images/products/17_imgmin_3.jpg', '/upload/images/products/17_imgmin_4.jpg', '/upload/images/products/17_imgmin_5.jpg'),
(21, 'aaabbbccc', 1, 'laptops', 's0_', 19, 1, 'FFFFFFFF', 'Разрешить предзагрузку страниц для повышения скорости работы браузера и поиска Использовать файлы cookie, чтобы запомнить ваши предпочтения, даже если вы не открываете эти страницы', 'Разрешить предзагрузку страниц для повышения скорости работы браузера и поиска\r\nИспользовать файлы cookie, чтобы запомнить ваши предпочтения, даже если вы не открываете эти страницы', 25.25, 1, 1, 1, '/upload/images/products/21_product/21_imgbig_1.jpg', '', '', '', '', '/upload/images/products/21_product/21_imgmin_1.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(1, 'Ihor', '+380671502706', 'Thanks!', 0, '2019-04-13 20:42:37', '{\"12\":1}', 4),
(5, 'Марина', '+38050 555 66 55', 'Пробный заказ!', 1, '2019-04-13 21:13:44', '{\"12\":2,\"2012\":1}', 1),
(6, 'Марина', '0671502706', 'Проба с мобильного. ', 1, '2019-04-13 21:43:32', '{\"10\":1,\"16\":1,\"2008\":1}', 0),
(7, 'Галина Миколаївна', '3806722222222', 'ппппп', 5, '2019-04-14 07:35:44', '{\"10\":1,\"11\":1,\"2006\":1}', 2),
(8, 'Игорь', '  kusatel@gmail.com', ' Спасибо. ', 0, '2019-04-16 08:09:48', '{\"2002\":2,\"2004\":2}', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `s1_category`
--

CREATE TABLE `s1_category` (
  `s1_id` int(11) NOT NULL,
  `s1_name` varchar(255) NOT NULL,
  `s1_sort_order` int(11) NOT NULL,
  `s1_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `s1_category`
--

INSERT INTO `s1_category` (`s1_id`, `s1_name`, `s1_sort_order`, `s1_status`) VALUES
(1, 'Материнские платы', 1, 1),
(2, 'Оперативная память', 2, 1),
(3, 'Винчестеры', 3, 1),
(4, 'Процессоры', 4, 1),
(5, 'Видеокарты', 5, 1),
(6, 'Звуковые карты', 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `s1_details`
--

CREATE TABLE `s1_details` (
  `s1_id_product` int(11) NOT NULL,
  `s1_title` varchar(255) NOT NULL,
  `s1_param_1` varchar(255) NOT NULL,
  `s1_param_2` varchar(255) NOT NULL,
  `s1_param_3` varchar(255) NOT NULL,
  `s1_param_4` varchar(255) NOT NULL,
  `s1_param_5` varchar(255) NOT NULL,
  `s1_value_1` varchar(255) NOT NULL,
  `s1_value_2` varchar(255) NOT NULL,
  `s1_value_3` varchar(255) NOT NULL,
  `s1_value_4` varchar(255) NOT NULL,
  `s1_value_5` varchar(255) NOT NULL,
  `s1_param_6` varchar(255) NOT NULL,
  `s1_param_7` varchar(255) NOT NULL,
  `s1_param_8` varchar(255) NOT NULL,
  `s1_param_9` varchar(255) NOT NULL,
  `s1_param_10` varchar(255) NOT NULL,
  `s1_value_6` varchar(255) NOT NULL,
  `s1_value_7` varchar(255) NOT NULL,
  `s1_value_8` varchar(255) NOT NULL,
  `s1_value_9` varchar(255) NOT NULL,
  `s1_value_10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `s1_details`
--

INSERT INTO `s1_details` (`s1_id_product`, `s1_title`, `s1_param_1`, `s1_param_2`, `s1_param_3`, `s1_param_4`, `s1_param_5`, `s1_value_1`, `s1_value_2`, `s1_value_3`, `s1_value_4`, `s1_value_5`, `s1_param_6`, `s1_param_7`, `s1_param_8`, `s1_param_9`, `s1_param_10`, `s1_value_6`, `s1_value_7`, `s1_value_8`, `s1_value_9`, `s1_value_10`) VALUES
(2000, 'МАТЕРИНСКАЯ ПЛАТА', 'Parameter_1', 'Parameter_2', 'Parameter_3', 'Parameter_4', 'Parameter_5', 'value_1', 'value_2', 'value_3', 'value_4', 'value_5', 'Parameter_6', 'Parameter_7', 'Parameter_8', 'Parameter_9', 'Parameter_10', 'value_6', 'value_7', 'value_8', 'value_9', 'value_10'),
(2001, '', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'value_1', 'value_1', 'value_1', 'value_1', 'value_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'parameter_1', 'value_1', 'value_1', 'value_1', 'value_1', 'value_1'),
(2002, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2003, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2004, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2005, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2006, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2007, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2008, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2009, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2010, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2011, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2012, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2013, '', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_value_', 's1_value_', 's1_value_', 's1_value_', 's1_value_', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_parameter_', 's1_value_', 's1_value_', 's1_value_', 's1_value_', 's1_value_'),
(2014, '', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_value_1', 's1_value_1', 's1_value_1', 's1_value_1', 's1_value_1', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_parameter_1', 's1_value_1', 's1_value_1', 's1_value_1', 's1_value_1', 's1_value_1'),
(2015, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `s1_details_content`
--

CREATE TABLE `s1_details_content` (
  `s1_content_id` int(11) NOT NULL,
  `s1_main_des` text NOT NULL,
  `s1_des_1` text NOT NULL,
  `s1_img_1` varchar(255) NOT NULL,
  `s1_des_2` text NOT NULL,
  `s1_img_2` varchar(255) NOT NULL,
  `s1_des_3` text NOT NULL,
  `s1_img_3` varchar(255) NOT NULL,
  `s1_des_4` text NOT NULL,
  `s1_img_4` varchar(255) NOT NULL,
  `s1_des_5` text NOT NULL,
  `s1_img_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `s1_details_content`
--

INSERT INTO `s1_details_content` (`s1_content_id`, `s1_main_des`, `s1_des_1`, `s1_img_1`, `s1_des_2`, `s1_img_2`, `s1_des_3`, `s1_img_3`, `s1_des_4`, `s1_img_4`, `s1_des_5`, `s1_img_5`) VALUES
(2000, 'Виртуальная реальность ждёт!\r\nПриготовьтесь к путешествию в безграничный мир виртуальной реальности!', 'А перед этим убедитесь, что у вас установлены все необходимые устройства, программы и драйверы. Все компоненты вашего ПК подключаются к материнской плате, а с комплектом ASRock VR Ready вы получите именно то, о чём мечтаете! ', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_1.jpg', 'Высочайшее качество изделия', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_2.jpg', ' Надёжные компоненты и молниеносная скорость работы обеспечат глубокое погружение в мир ВР. Мы гарантируем, что с нашими материнскими платами у вас не будет никаких технических проблем с виртуальной реальностью!', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_3.jpg', 'Intel® LAN\r\nСетевой модуль Intel® LAN обеспечивает лучшую пропускную способность, низкую загрузку CPU, повышенную стабильность и выводит работу в Сети на качественно новый уровень!', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_4.jpg', 'Creative Sound Blaster™ Cinema 3\r\nSound Blaster™ Cinema 3 - это новейшее программное обеспечение на базе SBX Pro Studio для получения самых современных звуковых эффектов. В игре или при просмотре фильма технология Reality 3D подарит вам звук формата 5.1 / 7.1 и создаст дополнительный звуковой слой даже при использовании обычных наушников или колонок.\r\n', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_5.jpg'),
(2001, 'Lorem ipsum dolor sit amet. Aspernatur aut rerum hic tenetur. Ullam corporis suscipit laboriosam, nisi ut enim. Modi tempora incidunt, ut et quasi architecto beatae. Quidem rerum necessitatibus saepe eveniet, ut enim. Vel illum, qui architecto beatae vitae dicta sunt. Quos dolores eos, qui ratione. Sapiente delectus, ut aut fugit, sed quia dolor repellendus eligendi optio cumque. Quia dolor repellendus dignissimos ducimus.', 'Lorem ipsum dolor sit amet. Aspernatur aut rerum hic tenetur. Ullam corporis suscipit laboriosam, nisi ut enim. Modi tempora incidunt, ut et quasi architecto beatae. Quidem rerum necessitatibus saepe eveniet, ut enim. Vel illum, qui architecto beatae vitae dicta sunt. Quos dolores eos, qui ratione. Sapiente delectus, ut aut fugit, sed quia dolor repellendus eligendi optio cumque. Quia dolor repellendus dignissimos ducimus.', '/upload/images/products/2016_description_1.jpg', '', '', '', '', '', '', '', ''),
(2002, '', '', '', '', '', '', '', '', '', '', ''),
(2003, '', '', '', '', '', '', '', '', '', '', ''),
(2004, '', '', '', '', '', '', '', '', '', '', ''),
(2005, '', '', '', '', '', '', '', '', '', '', ''),
(2006, '', '', '', '', '', '', '', '', '', '', ''),
(2007, '', '', '', '', '', '', '', '', '', '', ''),
(2008, '', '', '', '', '', '', '', '', '', '', ''),
(2009, '', '', '', '', '', '', '', '', '', '', ''),
(2010, '', '', '', '', '', '', '', '', '', '', ''),
(2011, '', '', '', '', '', '', '', '', '', '', ''),
(2012, '', '', '', '', '', '', '', '', '', '', ''),
(2013, 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', 'Nobis est et expedita distinctio obcaecati cupiditate non recusandae debitis. Voluptates repudiandae sint et aut officiis debitis aut perferendis doloribus. Quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est. Quasi architecto beatae vitae dicta sunt, explicabo asperiores', '/upload/images/products/2013_description_1.jpg', 'Nobis est et expedita distinctio obcaecati cupiditate non recusandae debitis. Voluptates repudiandae sint et aut officiis debitis aut perferendis doloribus. Quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est. Quasi architecto beatae vitae dicta sunt, explicabo asperiores', '/upload/images/products/2013_description_2.jpg', 'Nobis est et expedita distinctio obcaecati cupiditate non recusandae debitis. Voluptates repudiandae sint et aut officiis debitis aut perferendis doloribus. Quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est. Quasi architecto beatae vitae dicta sunt, explicabo asperiores', '/upload/images/products/2013_description_3.jpg', '', '', '', ''),
(2014, 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', '/upload/images/products/2014_description_1.jpg', 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', '/upload/images/products/2014_description_2.jpg', 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', '/upload/images/products/2014_description_3.jpg', 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', '/upload/images/products/2014_description_4.jpg', 'Lorem ipsum dolor sit amet. Sunt in culpa, qui blanditiis praesentium voluptatum deleniti atque corrupti. Nihil impedit, quo minus. Sint et expedita distinctio debitis. Ea commodi autem vel eum fugiat, quo minus. Magnam aliquam quaerat voluptatem sequi nesciunt, neque porro quisquam. Iure reprehenderit, qui dolorem ipsum, quia non numquam eius. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium, totam rem aperiam eaque. Consequatur aut reiciendis voluptatibus maiores alias consequatur aut odit.', '/upload/images/products/2014_description_5.jpg'),
(2015, 'Самым известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в книгопечатании еще в XVI веке. Своим появлением Lorem ipsum обязан древнеримскому философу Цицерону, ведь именно из его трактата «О пределах добра и зла» средневековый книгопечатник вырвал отдельные фразы и слова, получив текст-«рыбу», широко используемый и по сей день. Конечно, возникают некоторые вопросы, связанные с использованием Lorem ipsum на сайтах и проектах, ориентированных на кириллический контент – написание символов на латыни и на кириллице значительно различается.', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой', '/upload/images/products/2015_product/2015_description_1.jpg', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой', '/upload/images/products/2015_product/2015_description_2.jpg', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой', '/upload/images/products/2015_product/2015_description_3.jpg', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой', '', 'И даже с языками, использующими латинский алфавит, могут возникнуть небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой', '');

-- --------------------------------------------------------

--
-- Структура таблицы `s1_product`
--

CREATE TABLE `s1_product` (
  `s1_id` int(11) NOT NULL,
  `s1_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_category_id` int(11) NOT NULL,
  `s1_category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_code_prev` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_code` int(11) NOT NULL,
  `s1_availability` int(11) NOT NULL,
  `s1_brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_description_1` text CHARACTER SET utf8 NOT NULL,
  `s1_description_2` text CHARACTER SET utf8 NOT NULL,
  `s1_price` float NOT NULL,
  `s1_is_new` int(11) NOT NULL,
  `s1_is_recommended` int(11) NOT NULL,
  `s1_status` int(11) NOT NULL,
  `s1_imgbig_1` varchar(255) CHARACTER SET utf32 NOT NULL,
  `s1_imgbig_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgbig_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgbig_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgbig_5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgmin_1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgmin_2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgmin_3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgmin_4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s1_imgmin_5` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `s1_product`
--

INSERT INTO `s1_product` (`s1_id`, `s1_name`, `s1_category_id`, `s1_category_name`, `s1_code_prev`, `s1_code`, `s1_availability`, `s1_brand`, `s1_description_1`, `s1_description_2`, `s1_price`, `s1_is_new`, `s1_is_recommended`, `s1_status`, `s1_imgbig_1`, `s1_imgbig_2`, `s1_imgbig_3`, `s1_imgbig_4`, `s1_imgbig_5`, `s1_imgmin_1`, `s1_imgmin_2`, `s1_imgmin_3`, `s1_imgmin_4`, `s1_imgmin_5`) VALUES
(2000, 'МАТЕРИНСКАЯ ПЛАТА ASROCK FATAL1TY H270 PERFORMANCE', 1, 'Материнские платы', 'S1_', 1, 1, 'ASROCK', ' Все компоненты вашего ПК подключаются к материнской плате, а с комплектом ASRock VR Ready вы получите именно то, о чём мечтаете! ', 'Надёжные компоненты и молниеносная скорость работы обеспечат глубокое погружение в мир ВР', 90.5, 0, 0, 1, '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_1.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_2.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_3.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_4.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\big_5.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\min_1.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\min_2.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\min_3.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\min_4.jpg', '\\template\\img\\section1\\motherboard\\ASROCK FATAL1TY H270\\min_5.jpg'),
(2001, 'МАТЕРИНСКАЯ ПЛАТА GIGABYTE B450 AORUS M', 1, 'Материнские платы', 'S1_', 2, 1, 'AORUS', 'Материнские платы Aorus могут похвастать самой передовой на сегодня системой LED-подсветки. Благодаря фирменному приложению RGB Fusion App с удобным и интуитивно понятным пользовательским интерфейсом, вы сможете придать системе Gigabyte свой неповторимый облик. ', 'Функционал приложения позволяет настроить яркость и мерцание светодиодов для отображения режимов изменения температуры или нагрузки ПК.', 125, 0, 0, 1, '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\big_1.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\big_2.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\big_3.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\big_4.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\big_5.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\min_1.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\min_2.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\min_3.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\min_4.jpg', '\\template\\img\\section1\\motherboard\\GIGABYTE_B450_AORUS_M\\min_5.jpg'),
(2002, 'МОДУЛЬ ПАМЯТИ ДЛЯ КОМПЬЮТЕРА DDR3 8GB 1333 MHZ ELITE PLUS TEAM (TPD38G1333HC901)', 2, 'RAM', 'S1_', 3, 1, 'ELITE_PLUS_TEAM ', 'Модуль памяти DDR-3 8GB 1333 MHz Elite Plus Team (TPD38G1333HC901) имеет параметр CL9, что обозначает величину латентности, равную 9. CAS-латентность - первый и самый важный параметр в таймингах, обозначает число тактов, необходимых для выдачи данных на шину.', 'DDR3 SDRAM - это третье поколение синхронной динамической памяти с произвольным доступом и удвоенной скоростью передачи данных. ', 100, 0, 0, 1, '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_3.jpg', '', '', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_3.jpg', '', ''),
(2003, 'МОДУЛЬ ПАМЯТИ ДЛЯ КОМПЬЮТЕРА DDR3 8GB 1333 MHZ ELITE PLUS TEAM (TPD38G1333HC901)', 2, 'RAM', 's1_', 4, 1, 'ELITE_PLUS_TEAM ', 'Модуль памяти DDR-3 8GB 1333 MHz Elite Plus Team (TPD38G1333HC901) имеет параметр CL9, что обозначает величину латентности, равную 9. CAS-латентность - первый и самый важный параметр в таймингах, обозначает число тактов, необходимых для выдачи данных на шину.', 'DDR3 SDRAM - это третье поколение синхронной динамической памяти с произвольным доступом и удвоенной скоростью передачи данных.', 80, 0, 0, 1, '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_3.jpg', '', '', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_3.jpg', '', ''),
(2004, 'МОДУЛЬ ПАМЯТИ ДЛЯ КОМПЬЮТЕРА DDR3 8GB 1333 MHZ ELITE PLUS TEAM (TPD38G1333HC901)', 2, 'RAM', 'S1_', 5, 1, 'ELITE_PLUS_TEAM ', 'Модуль памяти DDR-3 8GB 1333 MHz Elite Plus Team (TPD38G1333HC901) имеет параметр CL9, что обозначает величину латентности, равную 9. CAS-латентность - первый и самый важный параметр в таймингах, обозначает число тактов, необходимых для выдачи данных на шину.', 'DDR3 SDRAM - это третье поколение синхронной динамической памяти с произвольным доступом и удвоенной скоростью передачи данных. ', 100, 0, 0, 1, '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\big_3.jpg', '', '', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_1.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_2.jpg', '\\template\\img\\section1\\RAM\\ELITE_PLUS_TEAM_1\\min_3.jpg', '', ''),
(2005, 'ЖЕСТКИЙ ДИСК ДЛЯ НОУТБУКА 2.5\" 1TB SEAGATE (ST1000LX015)', 3, 'HDD', 'S1_', 6, 1, 'SEAGATE', 'В гибридных накопителях от Seagate серии FireCuda сочетаются емкие жесткие диски и новые твердотельные технологии, обеспечивающие скорость в 5 раз выше обычной. ', 'Невероятная производительность\r\nДиск FireCuda сочетает производительность твердотельных накопителей с емкостью жестких дисков. Это идеальный накопитель для геймеров, творческих работников и любителей модернизировать свои ПК.\r\n', 69, 0, 0, 1, '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_4.jpg', '', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_4.jpg', ''),
(2006, 'ЖЕСТКИЙ ДИСК ДЛЯ НОУТБУКА 2.5\" 1TB SEAGATE (ST1000LX015)', 3, 'HDD', 'S1_', 7, 1, 'SEAGATE', 'В гибридных накопителях от Seagate серии FireCuda сочетаются емкие жесткие диски и новые твердотельные технологии, обеспечивающие скорость в 5 раз выше обычной. ', 'Невероятная производительность\r\nДиск FireCuda сочетает производительность твердотельных накопителей с емкостью жестких дисков. Это идеальный накопитель для геймеров, творческих работников и любителей модернизировать свои ПК.\r\n', 70, 0, 0, 1, '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_4.jpg', '', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_4.jpg', ''),
(2007, 'ЖЕСТКИЙ ДИСК ДЛЯ НОУТБУКА 2.5\" 1TB SEAGATE (ST1000LX015)', 3, 'HDD', 'S1_', 8, 1, 'SEAGATE', 'В гибридных накопителях от Seagate серии FireCuda сочетаются емкие жесткие диски и новые твердотельные технологии, обеспечивающие скорость в 5 раз выше обычной. ', 'Невероятная производительность\r\nДиск FireCuda сочетает производительность твердотельных накопителей с емкостью жестких дисков. Это идеальный накопитель для геймеров, творческих работников и любителей модернизировать свои ПК.\r\n', 70, 0, 0, 1, '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\big_4.jpg', '', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_1.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_2.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_3.jpg', '\\template\\img\\section1\\HDD\\1TB_SEAGATE_ST1000LX015\\min_4.jpg', ''),
(2008, 'ПРОЦЕССОР INTEL CORE™ I7 8700 (BX80684I78700)', 4, 'RAM', 'S1_', 9, 1, 'INTEL_CORE', 'Новый процессор Intel Core i7-8700K 8-го поколения, с кодовым названием микроархитектуры Coffee Lake. Предназначен для настольной платформы Intel LGA 1151. Принадлежит к семейству высокопроизводительных процессоров Core i7.', 'ntel Core i7-8700K производится по стандарту 14-нм техпроцесса, имеет 6 ядер, которые работают в 12 потоков со штатной тактовой частотой 3.7 ГГц, 4.7 ГГц в режиме Turbo Boost. Объем кэш-памяти 3 уровня равен 12 МБ. Имеет 2-х канальный контроллер памяти DDR4.', 425, 0, 0, 1, '\\template\\img\\section1\\GPU\\BX80684I78700\\big_1.jpg', '', '', '', '', '\\template\\img\\section1\\GPU\\BX80684I78700\\min_1.jpg', '', '', '', ''),
(2009, 'ПРОЦЕССОР INTEL CORE™ I7 8700 (BX80684I78700)', 4, 'RAM', 'S1_', 10, 1, 'INTEL_CORE', 'Новый процессор Intel Core i7-8700K 8-го поколения, с кодовым названием микроархитектуры Coffee Lake. Предназначен для настольной платформы Intel LGA 1151. Принадлежит к семейству высокопроизводительных процессоров Core i7.', 'ntel Core i7-8700K производится по стандарту 14-нм техпроцесса, имеет 6 ядер, которые работают в 12 потоков со штатной тактовой частотой 3.7 ГГц, 4.7 ГГц в режиме Turbo Boost. Объем кэш-памяти 3 уровня равен 12 МБ. Имеет 2-х канальный контроллер памяти DDR4.', 425, 0, 0, 1, '\\template\\img\\section1\\GPU\\BX80684I78700\\big_1.jpg', '', '', '', '', '\\template\\img\\section1\\GPU\\BX80684I78700\\min_1.jpg', '', '', '', ''),
(2010, 'ВИДЕОКАРТА GEFORCE GT710 1024MB ASUS (710-1-SL)', 5, 'VIDEO CARD', 'S1_', 11, 1, 'GEFORCE', 'Видеокарта GeForce GT710 1024Mb ASUS (710-1-SL) \r\n\r\nЕсли вы ищите разумное решение для создания домашней компьютерной станции, то вам обязательно понравится видеокарта ASUS GeForce GT 710. Устройство построено на основе популярного графического ядра nVidia GeForce GT 710, который работает с частотой 954 МГц, поэтому данные обрабатываются с высокой скоростью, что важно при обработке потокового видео. ', 'Производительность и быстродействие обеспечиваются видеопамятью DDR3 объемом 1 Гб и частотой 1800 МГц, при этом видеокарта поддерживает воспроизведение с максимальным разрешением в 2560×1600.', 41.5, 0, 0, 1, '\\template\\img\\section1\\videocard\\710-1-SL\\big_1.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_2.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_3.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_4.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_5.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_1.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_2.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_3.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_4.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_5.jpg'),
(2011, 'ВИДЕОКАРТА GEFORCE GT710 1024MB ASUS (710-1-SL)', 5, 'VIDEO CARD', 'S1_', 12, 1, 'GEFORCE', 'Если вы ищите разумное решение для создания домашней компьютерной станции, то вам обязательно понравится видеокарта ASUS GeForce GT 710. Устройство построено на основе популярного графического ядра nVidia GeForce GT 710, который работает с частотой 954 МГц, поэтому данные обрабатываются с высокой скоростью, что важно при обработке потокового видео. ', 'Производительность и быстродействие обеспечиваются видеопамятью DDR3 объемом 1 Гб и частотой 1800 МГц, при этом видеокарта поддерживает воспроизведение с максимальным разрешением в 2560×1600.', 41.36, 0, 0, 1, '\\template\\img\\section1\\videocard\\710-1-SL\\big_1.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_2.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_3.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_4.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\big_5.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_1.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_2.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_3.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_4.jpg', '\\template\\img\\section1\\videocard\\710-1-SL\\min_5.jpg'),
(2012, 'ЗВУКОВАЯ ПЛАТА ASUS XONAR ESSENCE STX II (90YA00MN-M0UA00)', 6, 'Sound board', 'S1_', 13, 1, 'ASUS', 'Украшение звуковой платы ASUS Xonar Essence STX II (90YA00MN-M0UA00) – изображение тигра, которое увидели археологи на одном из музыкальных инструментов, извлеченных ими при раскопках древних руин в Китае.', 'Уровень искажений этого усилителя составляет менее 0.001% при подключении наушников с импедансом до 600 Ом. Многослойная конструкция печатной платы позволяет отделить аудиосигналы от источников шумов.', 358, 0, 0, 1, '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_1.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_2.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_3.jpg', '', '', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_1.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_2.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_3.jpg', '', ''),
(2013, 'ЗВУКОВАЯ ПЛАТА ASUS XONAR ESSENCE STX II (90YA00MN-M0UA00)', 6, 'Sound board', 'S1_', 14, 1, 'ASUS', 'Украшение звуковой платы ASUS Xonar Essence STX II (90YA00MN-M0UA00) – изображение тигра, которое увидели археологи на одном из музыкальных инструментов, извлеченных ими при раскопках древних руин в Китае.', 'Украшение звуковой платы ASUS Xonar Essence STX II (90YA00MN-M0UA00) – изображение тигра, которое увидели археологи на одном из музыкальных инструментов, извлеченных ими при раскопках древних руин в Китае.', 365.8, 0, 0, 1, '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_1.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_2.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\big_3.jpg', '', '', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_1.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_2.jpg', '\\template\\img\\section1\\soundboard\\90YA00MN-M0UA00\\MIN_3.jpg', '', ''),
(2014, 'Новый товар', 1, 'материнские платы', 's1_', 15, 1, 'вввввв', 'gjkjjhhhg', 'краткое описание', 1025, 1, 1, 1, '/upload/images/products/2014_imgbig_1.jpg', '', '', '', '', '/upload/images/products/2014_imgmin_1.jpg', '', '', '', ''),
(2015, 'PRODUCT_2015', 1, 'SOUNDBOARDS', 'S1_', 16, 1, 'ASUS', 'Самым известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в книгопечатании еще в XVI веке.', 'Самым известным «рыбным» текстом является знаменитый Lorem ipsum. Считается, что впервые его применили в книгопечатании еще в XVI веке.', 125.25, 1, 1, 1, '/upload/images/products/2015_product/2015_imgbig_1.jpg', '/upload/images/products/2015_product/2015_imgbig_2.jpg', '/upload/images/products/2015_product/2015_imgbig_3.jpg', '', '', '/upload/images/products/2015_product/2015_imgmin_1.jpg', '/upload/images/products/2015_product/2015_imgmin_2.jpg', '/upload/images/products/2015_product/2015_imgmin_3.jpg', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf32 NOT NULL,
  `region` varchar(255) CHARACTER SET utf32 NOT NULL,
  `area` varchar(255) CHARACTER SET utf8 NOT NULL,
  `town` varchar(255) CHARACTER SET utf32 NOT NULL,
  `delivery` varchar(255) CHARACTER SET utf32 NOT NULL,
  `post_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_adress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `password`, `phone`, `region`, `area`, `town`, `delivery`, `post_number`, `post_adress`, `role`) VALUES
(1, 'Марина', 'Мороз', 'marina@gmail.com', 'marina123', '067 000 00 00', 'Винницкая', 'Калиновка', 'Калиновка', 'Новая почта', '2', 'Незалежності 54', ''),
(2, 'Марина', '', 'marina_moroz19@icloud.com', 'ptitsa1995', '', '', '', '', '', '', '', ''),
(3, 'Игорь', 'Мороз', 'kusatel@gmail.com', 'marina123', '+380671502706', 'Винницкая', '', '', 'Новая Почта', '', '', 'admin'),
(4, 'Александр', '', 'sacha@gmail.com', '123456789', '', '', '', '', '', '', '', ''),
(5, 'Галина Миколаївна', '', 'morgalinakosh@gmail.com', 'марина123', '', '', '', '', '', '', '', ''),
(6, 'Brova', '', 'brova@gmail.com', '123456789', '', '', '', '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `details_content`
--
ALTER TABLE `details_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s1_category`
--
ALTER TABLE `s1_category`
  ADD PRIMARY KEY (`s1_id`);

--
-- Индексы таблицы `s1_details`
--
ALTER TABLE `s1_details`
  ADD PRIMARY KEY (`s1_id_product`);

--
-- Индексы таблицы `s1_details_content`
--
ALTER TABLE `s1_details_content`
  ADD PRIMARY KEY (`s1_content_id`);

--
-- Индексы таблицы `s1_product`
--
ALTER TABLE `s1_product`
  ADD PRIMARY KEY (`s1_id`),
  ADD KEY `s1_code` (`s1_code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `details_content`
--
ALTER TABLE `details_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `s1_category`
--
ALTER TABLE `s1_category`
  MODIFY `s1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `s1_details`
--
ALTER TABLE `s1_details`
  MODIFY `s1_id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;

--
-- AUTO_INCREMENT для таблицы `s1_details_content`
--
ALTER TABLE `s1_details_content`
  MODIFY `s1_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;

--
-- AUTO_INCREMENT для таблицы `s1_product`
--
ALTER TABLE `s1_product`
  MODIFY `s1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
