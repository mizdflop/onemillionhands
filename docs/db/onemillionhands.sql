-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.0.493.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 16.10.2013 16:24:18
-- Версия сервера: 5.6.12-log
-- Версия клиента: 4.1

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
-- Описание для таблицы analyses
--
DROP TABLE IF EXISTS analyses;
CREATE TABLE analyses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  analysis_type_id INT(11) NOT NULL,
  hand_number VARCHAR(255) NOT NULL,
  skill_luck_events TINYINT(1) NOT NULL DEFAULT 0,
  `desc` TEXT DEFAULT NULL,
  type VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы analyses_players
--
DROP TABLE IF EXISTS analyses_players;
CREATE TABLE analyses_players (
  id INT(11) NOT NULL AUTO_INCREMENT,
  analysis_id INT(11) NOT NULL,
  player_id INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы analyses_trends
--
DROP TABLE IF EXISTS analyses_trends;
CREATE TABLE analyses_trends (
  id INT(11) NOT NULL AUTO_INCREMENT,
  analysis_id INT(11) NOT NULL,
  trend_id INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы analysis_types
--
DROP TABLE IF EXISTS analysis_types;
CREATE TABLE analysis_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы answers
--
DROP TABLE IF EXISTS answers;
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
DROP TABLE IF EXISTS players;
CREATE TABLE players (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы questions
--
DROP TABLE IF EXISTS questions;
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
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы sig_data
--
DROP TABLE IF EXISTS sig_data;
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
-- Описание для таблицы trends
--
DROP TABLE IF EXISTS trends;
CREATE TABLE trends (
  id INT(11) NOT NULL AUTO_INCREMENT,
  player_id INT(11) NOT NULL,
  publish TINYINT(1) NOT NULL DEFAULT 0,
  published DATETIME DEFAULT NULL,
  title VARCHAR(255) NOT NULL,
  `desc` TEXT DEFAULT NULL,
  start_hand_range INT(11) NOT NULL,
  end_hand_range INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы analyses
--
INSERT INTO analyses VALUES
(1, 3, '120', 1, 'desc', '');

-- 
-- Вывод данных для таблицы analyses_players
--
INSERT INTO analyses_players VALUES
(4, 1, 2),
(5, 1, 1);

-- 
-- Вывод данных для таблицы analyses_trends
--
INSERT INTO analyses_trends VALUES
(1, 1, 1);

-- 
-- Вывод данных для таблицы analysis_types
--
INSERT INTO analysis_types VALUES
(1, 'Skill Analysis'),
(2, 'Luck Analysis'),
(3, 'Range Analysis'),
(4, 'Best Action');

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
INSERT INTO players VALUES
(1, 'Player 1'),
(2, 'Player 2'),
(3, 'Player 3');

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
-- Вывод данных для таблицы trends
--
INSERT INTO trends VALUES
(1, 1, 1, '2013-10-16 12:22:37', 'Trend Title', 'desc', 1, 40);

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;