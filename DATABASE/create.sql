CREATE DATABASE pb_4 CHARACTER SET UTF8 COLLATE utf8_unicode_ci;

CREATE TABLE question (
	id			BIGINT NOT NULL AUTO_INCREMENT,
	name		VARCHAR(255) NOT NULL,
	author
	created
	last_edited
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE answer (
	id			BIGINT NOT NULL AUTO_INCREMENT,
	name		VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE poll (
	id			BIGINT NOT NULL AUTO_INCREMENT,
	qid		BIGINT NOT NULL,
	aid 		BIGINT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (qid) REFERENCES question (id),
	FOREIGN KEY (aid) REFERENCES answer (id),
) ENGINE=InnoDB;
	
CREATE TABLE group (
	id			BIGINT NOT NULL AUTO_INCREMENT,
	name		VARCHAR(255) NOT NULL,
	author
	created
	last_edited
	PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE user (
	id				BIGINT NOT NULL AUTO_INCREMENT,
	username	VARCHAR(255) NOT NULL,
	email			VARCHAR(255) NOT NULL,
	password	
	salt
	created
	last_login
) ENGINE=InnoDB;


CREATE TABLE category(
) ENGINE=InnoDB;

CREATE TABLE category_question (
) ENGINE=InnoDB;

CREATE TABLE category_group (
) ENGINE=InnoDB;

CREATE TABLE category_answer (
) ENGINE=InnoDB;

CREATE TABLE  (
) ENGINE=InnoDB;

CREATE TABLE  (
) ENGINE=InnoDB;

CREATE TABLE  (
) ENGINE=InnoDB;

CREATE TABLE  (
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `answers` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `author` bigint(20) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `lasteditedby` bigint(20) NOT NULL,
  `wikilink` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `profil_image` bigint(20) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rated` int(11) DEFAULT '0',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `answer` (`answer`),
  KEY `author` (`author`),
  KEY `profil_image` (`profil_image`),
  KEY `lasteditedby` (`lasteditedby`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=187 ;