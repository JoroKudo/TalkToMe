CREATE SCHEMA IF NOT EXISTS mvcdemo DEFAULT CHARACTER SET utf8 ;

use mvcdemo;

CREATE TABLE  user (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE  chat (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  author	VARCHAR(64)  NOT NULL,
  message     VARCHAR(128) NOT NULL,
  PRIMARY KEY  (id)
);

INSERT INTO chat (message, author) VALUES ('Ssamyyuel','gggg');
