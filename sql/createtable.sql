
-- 01 create db
-- DROP DATABASE IF EXISTS `oneline_bbs`;
-- CREATE DATABASE `oneline_bbs` DEFAULT CHARACTER SET utf8;

-- 02 create table

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40),
  `comment` VARCHAR(200),
  `created_at` DATETIME,
  PRIMARY KEY (id)
) ENGINE = INNODB;


