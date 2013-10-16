-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.0.493.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 16.10.2013 14:35:59
-- Версия сервера: 5.6.12-log
-- Версия клиента: 4.1

--
-- Описание для базы данных onemillionhands
--
DROP DATABASE IF EXISTS onemillionhands;
CREATE DATABASE onemillionhands
	CHARACTER SET utf8
	COLLATE utf8_general_ci;

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE onemillionhands;

--
-- Описание для таблицы answers
--
CREATE TABLE answers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question_id INT(11) NOT NULL,
  answer VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 13
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы players
--
CREATE TABLE players (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы questions
--
CREATE TABLE questions (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question VARCHAR(255) NOT NULL,
  published TINYINT(1) NOT NULL DEFAULT 0,
  opened DATETIME DEFAULT NULL,
  closed DATETIME DEFAULT NULL,
  state ENUM('Open','Closed') DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы sig_data
--
CREATE TABLE sig_data (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question_id INT(11) NOT NULL,
  percentage INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 13
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы answers
--
INSERT INTO answers VALUES
(9, 2, '15'),
(10, 2, '25'),
(11, 2, '45'),
(12, 2, '68');

-- 
-- Вывод данных для таблицы players
--

-- Таблица onemillionhands.players не содержит данных

-- 
-- Вывод данных для таблицы questions
--
INSERT INTO questions VALUES
(2, 'How often is JC Tran bluffing?', 1, '2013-10-16 10:17:48', NULL, 'Open');

-- 
-- Вывод данных для таблицы sig_data
--
INSERT INTO sig_data VALUES
(9, 2, 15),
(10, 2, 25),
(11, 2, 40),
(12, 2, 70);

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;