-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 04 2018 г., 06:53
-- Версия сервера: 5.5.59-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `admin_user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `session` varchar(11) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`admin_user`, `password`, `session`) VALUES
('admin@example.com', '123456', '916a3087aa'),
('lakiwolf.90@mail.ru', '123456', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
