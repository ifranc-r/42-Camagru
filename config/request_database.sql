
DROP SCHEMA IF EXISTS camagru;

CREATE SCHEMA IF NOT EXISTS camagru;

CREATE TABLE IF NOT EXISTS camagru.users (
	id_user int unsigned NOT NULL AUTO_INCREMENT,
	-- first_name varchar(60) NOT NULL,
	-- last_name varchar(60) NOT NULL,
	-- email varchar(60) NOT NULL,
	login varchar(60) NOT NULL UNIQUE,
	password varchar(64) NOT NULL,
	-- date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
	-- date_modif DATETIME DEFAULT NULL,
	admin bit(1) DEFAULT 0,
	PRIMARY KEY (`id_user`)
	);

CREATE TABLE IF NOT EXISTS camagru.selfies (
	id_selfie int unsigned NOT NULL AUTO_INCREMENT,
	id_user int unsigned NOT NULL,
	picture int unsigned NOT NULL,
	-- date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
	-- date_modif DATETIME DEFAULT NULL,
	PRIMARY KEY (`id_selfie`),
	FOREIGN KEY(`id_user`) REFERENCES camagru.users(`id_user`)
	);

CREATE TABLE IF NOT EXISTS camagru.comments (
	id_comment int unsigned NOT NULL AUTO_INCREMENT,
	id_selfie int unsigned NOT NULL,
	id_user int unsigned NOT NULL,
	comment varchar(200) NOT NULL,
	-- date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
	-- date_modif DATETIME DEFAULT NULL,
	PRIMARY KEY (`id_comment`),
	FOREIGN KEY(`id_user`) REFERENCES camagru.users(`id_user`),
	FOREIGN KEY(`id_selfie`) REFERENCES camagru.selfies(`id_selfie`)
	);

CREATE TABLE IF NOT EXISTS camagru.likes (
	id_like int unsigned NOT NULL AUTO_INCREMENT,
	id_user int unsigned NOT NULL,
	id_selfie int unsigned NOT NULL,
	-- date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
	-- date_modif DATETIME DEFAULT NULL,
	PRIMARY KEY (`id_like`),
	FOREIGN KEY(`id_user`) REFERENCES camagru.users(`id_user`),
	FOREIGN KEY(`id_selfie`) REFERENCES camagru.selfies(`id_selfie`)
	);
