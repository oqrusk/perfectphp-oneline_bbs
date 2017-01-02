
create table user(
  id INTEGER AUTO_INCREMENT,
  user_name VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  created_at DATETIME,
  PRIMARY KEY (id),
  UNIQUE KEY user_name_index(user_name)
) ENGINE = INNODB;

create table following(
  user_id INTEGER,
  following_id INTEGER,
  PRIMARY KEY (user_id, following_id)
) ENGINE = INNODB;

create table status(
  id INTEGER AUTO_INCREMENT,
  user_id INTEGER NOT NULL,
  body VARCHAR(255),
  created_at DATETIME,
  PRIMARY KEY (id),
  INDEX user_id_index(user_id)
) ENGINE = INNODB;

ALTER TABLE following ADD FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE following ADD FOREIGN KEY (following_id) REFERENCES user(id);
ALTER TABLE status ADD FOREIGN KEY (user_id) REFERENCES user(id);




-- 01 create db
-- DROP DATABASE IF EXISTS `oneline_bbs`;
-- CREATE DATABASE `oneline_bbs` DEFAULT CHARACTER SET utf8;

-- 02 create table

/*
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(40),
  `comment` VARCHAR(200),
  `created_at` DATETIME,
  PRIMARY KEY (id)
) ENGINE = INNODB;
*/

