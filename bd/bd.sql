CREATE DATABASE IF NOT EXISTS basesegura
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE basesegura;

DROP TABLE IF EXISTS t_persona;
CREATE TABLE IF NOT EXISTS t_persona(
	id int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) DEFAULT NULL,
	paterno varchar(45) DEFAULT NULL,
	materno varchar(45) DEFAULT NULL,
	telefono varchar(45) DEFAULT NULL,
	PRIMARY KEY (id) 
) ENGINE« InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
