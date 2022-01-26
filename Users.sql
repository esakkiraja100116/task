-- Adminer 4.8.1 MySQL 5.5.5-10.6.5-MariaDB-1:10.6.5+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin2_bin NOT NULL,
  `username` varchar(30) COLLATE latin2_bin NOT NULL,
  `mail` varchar(50) COLLATE latin2_bin NOT NULL,
  `phone` varchar(15) COLLATE latin2_bin NOT NULL,
  `password` varchar(50) COLLATE latin2_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1 means active user and 0 means blocked user',
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

INSERT INTO `Users` (`id`, `name`, `username`, `mail`, `phone`, `password`, `status`, `date_time`) VALUES
(32,	'kannan',	'kannan',	'kannan@gmail.com',	'9965783732',	'f59888b408ba3ce0f02d135e75173174',	1,	'2022-01-26 22:36:16'),
(33,	'meerunn',	'meerun1',	'meerun1@gmail.com',	'9965783711',	'f59888b408ba3ce0f02d135e75173174',	1,	'2022-01-26 22:37:57');

-- 2022-01-26 22:51:20
