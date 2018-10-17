-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 02:54 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vue`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Vegetables', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Drinks', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mango', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Grapes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Oranges', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Strawberry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Guava', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Banana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Apple', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Cherry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 'Spinach', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'Broccoli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'Lettuce', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 'Leek', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 'Cabbage', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 'Coffe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 3, 'Iced Tea', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, 'Juice', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 3, 'Cocktail', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, 'Wine', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 3, 'Milkshake', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
