-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-12-2014 a las 19:40:08
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `noxen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pass_hash` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `username`, `pass_hash`) VALUES
(1, 'admin', '$2y$10$.tM1Ko1wnw80JULkezoV3uwguV..TIric50tZvoiCcbMtcZP7gvru');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id`, `plan`) VALUES
(1, 'Standard'),
(2, 'Premium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(75) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `header`, `text`, `date`) VALUES
(17, 'We''re Online!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et imperdiet nisl. Vivamus egestas risus sed interdum tempor. Aenean tortor purus, pharetra a libero vel, laoreet congue sem. Etiam at lectus felis. Aenean non vehicula nisl. Morbi sapien augue, accumsan a risus nec, faucibus mollis tellus. Quisque posuere suscipit urna, sit amet ultrices nulla fermentum nec. Vivamus et arcu porttitor, luctus ipsum eu, faucibus dolor. Sed eget est accumsan, pharetra nibh sed, tincidunt arcu. Morbi sit amet tempor risus. Phasellus pretium magna quis sem tempor vestibulum. Quisque scelerisque orci nunc, at accumsan ex gravida vel. Nunc vehicula placerat nisl ac tempus. Fusce bibendum dui feugiat quam auctor eleifend. Integer dignissim nibh lectus, et ornare nulla mattis eu. Morbi faucibus scelerisque nunc, eu porttitor erat dapibus eu.</p>\r\n\r\n<p>Nullam faucibus eros non dui ornare, vitae ornare purus euismod. Sed rutrum orci nibh, vitae consectetur mi tempus quis. Suspendisse nulla felis, commodo id posuere a, ullamcorper at mi. Nulla facilisi. Maecenas nec leo id nunc convallis imperdiet. Integer facilisis leo non odio volutpat cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n\r\n<p>Maecenas molestie eu mi id dignissim. Fusce faucibus magna at lorem auctor imperdiet. Fusce congue metus fermentum turpis volutpat, ac interdum justo porttitor. Ut id finibus sapien. Cras quam lectus, vehicula nec porttitor nec, dictum sed metus. Pellentesque mauris mauris, viverra vitae imperdiet quis, vehicula in eros. Proin sit amet risus nibh. Vestibulum suscipit et enim et cursus. Fusce vulputate dignissim nisi sed condimentum. Ut hendrerit vel erat et pulvinar. Donec sit amet finibus augue, mattis tempus lacus.</p>\r\n\r\n<p>Suspendisse ac lorem at tortor vestibulum fringilla at vel diam. Maecenas dolor eros, suscipit in enim sed, posuere consequat ex. Fusce condimentum libero felis, ac convallis turpis faucibus at. Aliquam a metus sed lectus sagittis interdum at semper quam. Curabitur tempus ex purus, vitae egestas nisi venenatis sit amet. Praesent hendrerit dolor ac dapibus placerat. Maecenas ullamcorper erat dolor, eget lobortis diam tristique vel. Proin pretium ac arcu quis posuere. Pellentesque luctus ullamcorper orci, sit amet convallis enim euismod eget. Praesent sed nulla urna. Sed eu libero interdum, consequat libero quis, mollis ex.</p>\r\n\r\n<p>Integer id iaculis metus, sit amet tristique orci. Duis dapibus dolor sed sapien mollis, id lobortis mauris placerat. Phasellus lacus purus, fringilla at iaculis sed, mollis et nisi. Integer molestie facilisis orci, eu faucibus lacus gravida nec. Vivamus tristique auctor metus nec ultricies. Donec molestie venenatis lobortis. Vestibulum eu justo mi.</p>\r\n', 'December 23, 2014'),
(24, 'a  asd a s d', '<p>aa as &nbsp;asda a da asd asd asd ad &nbsp;asd a asdasd asd asas a asd d asada as a sd a a sdd a asda a aa sda as a asd &nbsp;a asda a a aasda asd</p>\r\n', 'December 24, 2014'),
(25, 'Testing MORE', '<p>To test this app more, i need to constantly update my results and my codes to ensure I dont make any mistake, so in fact the service may be a bit bad during this week, thanks&nbsp;</p>\r\n', 'December 24, 2014'),
(26, 'Reality Is Here', '<p>Reality is <strong>HERE&nbsp;</strong>and we&#39;re so <em>ITALICS&nbsp;</em>and <s>FOCKED,&nbsp;</s>&nbsp;BECAUSE I AM <strong>SO</strong> COOL!!</p>\r\n', 'December 24, 2014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_user_plan` int(11) NOT NULL,
  `allow_login` int(11) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `hide_all_posts` int(11) NOT NULL,
  `all_posts_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `default_user_plan`, `allow_login`, `maintenance`, `hide_all_posts`, `all_posts_message`) VALUES
(1, 1, 1, 0, 0, '<p><strong>ALERT:&nbsp;</strong>New products will arrive next week, please keep an eye to our website</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subs`
--

CREATE TABLE IF NOT EXISTS `subs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(75) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `subs`
--

INSERT INTO `subs` (`id`, `email`, `date`) VALUES
(1, 'ConsoleTVs@gmail.com', '14-12-2014'),
(2, 'Username2@gmail.com', '15-12-2014'),
(3, 'Username3@gmail.com', '18-12-2014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `pass_hash` varchar(75) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass_hash`, `type`) VALUES
(2, 'Username2', 'Username2@gmail.com', '$2a$10$yi12dzAPw6bjD6QHSQCzGemyViObuTxSYhf4vFIVm.gfFEAZ.iJZe', 1),
(3, 'Username3', 'Username3@gmail.com', '$2a$10$yi12dzAPw6bjD6QHSQCzGemyViObuTxSYhf4vFIVm.gfFEAZ.iJZe', 1),
(5, 'ConsoleTVs', 'ConsoleTVs@gmail.com', '$2a$10$yi12dzAPw6bjD6QHSQCzGemyViObuTxSYhf4vFIVm.gfFEAZ.iJZe', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
