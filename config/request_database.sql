



DROP SCHEMA IF EXISTS `camagru_ifranc-r`;

CREATE SCHEMA IF NOT EXISTS `camagru_ifranc-r`;

CREATE TABLE IF NOT EXISTS `camagru_ifranc-r.users` (
	id_user int unsigned NOT NULL AUTO_INCREMENT,
	first_name varchar(60) NOT NULL,
	last_name varchar(60) NOT NULL,
	email varchar(60) NOT NULL,
	login varchar(60) NOT NULL,
	password varchar(64) NOT NULL,
	date_creation DATE DEFAULT CURDATE(),
	date_modif DATE DEFAULT NULL,
	admin bit(1) DEFAULT 0,
	PRIMARY KEY (`id_user`)
	);

CREATE TABLE IF NOT EXISTS `camagru_ifranc-r.selfies` (
	id_selfie int unsigned NOT NULL AUTO_INCREMENT,
	id_user int unsigned NOT NULL;
	first_name varchar(60) NOT NULL,
	last_name varchar(60) NOT NULL,
	email varchar(60) NOT NULL,
	login varchar(60) NOT NULL,
	password varchar(64) NOT NULL,
	admin bit(1) DEFAULT 0,
	PRIMARY KEY (`id_selfie`),
	FOREIGN KEY(`id_user`) REFERENCES `camagru_ifranc-r.users(id_user)`
	);

CREATE TABLE users (
	id int unsigned NOT NULL AUTO_INCREMENT,
	first_name varchar(60) NOT NULL,
	last_name varchar(60) NOT NULL,
	email varchar(60) NOT NULL,
	login varchar(60) NOT NULL,
	password varchar(64) NOT NULL,
	admin bit(1) DEFAULT 0,
	PRIMARY KEY (`id`)
	);
