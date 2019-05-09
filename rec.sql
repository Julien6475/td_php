-- se connecter au serveur Mysql avec le user root

mysql -u root -p

-- Creer une base de données

CREATE DATABASE td_php_db CHARACTER SET UTF8mb4 COLLATE utf8mb4_general_ci;

--Voir les bases

SHOW DATABASES;

-- Selectionner la base

USE td_php_db;

-- Creer une table

CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
login VARCHAR (255) NOT NULL,
email VARCHAR (255) NOT NULL,
password VARCHAR (255) NOT NULL,
nom VARCHAR (255) NOT NULL,
prenom VARCHAR (255) NOT NULL,
is_admin BOOLEAN DEFAULT 0,
created_at DATETIME NOT NULL,
CONSTRAINT pk_id PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Consulter le schéma

DESC users;

-- Supprimer une table

DROP TABLE users;