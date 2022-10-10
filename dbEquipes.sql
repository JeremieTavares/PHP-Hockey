CREATE DATABASE IF NOT EXISTS dbEquipes
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

USE dbEquipes;

CREATE TABLE adversaires (
	code CHAR(3) PRIMARY KEY,
	nom TEXT NOT NULL
) ENGINE=INNODB;

CREATE TABLE parties (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	date DATE NOT NULL,
	adversaire CHAR(3),
	pointage_local INT DEFAULT 0,
	pointage_adversaire INT DEFAULT 0,
	
	CONSTRAINT fk_adversaire FOREIGN KEY (adversaire) REFERENCES adversaires(code)
) ENGINE=INNODB;

INSERT INTO adversaires (code, nom)
VALUES ('CAM', 'Cruz Azul Mexico'),
	   ('FCC', 'Football Club Cincinnati'),
	   ('FFC', 'Forge Football Club'),
	   ('NSC', 'Nashville Soccer Club'),
	   ('NYF', 'New York Football Club'),
	   ('OSC', 'Orlando Soccer Club'),
	   ('RSL', 'Real Salt Lake'),
	   ('VWF', 'Vancouver Whitecaps Football');
				 	
INSERT INTO parties (date, adversaire, pointage_local, pointage_adversaire)
VALUES ('2022-02-27', 'OSC', 0, 2),
	   ('2022-03-09', 'CAM', 0, 1),
	   ('2022-03-12', 'NYF', 1, 4),
	   ('2022-03-16', 'CAM', 1, 1),
	   ('2022-04-02', 'FCC', 4, 3),
	   ('2022-04-09', 'NYF', 2, 1),
	   ('2022-04-16', 'VWF', 2, 1),
	   ('2022-05-07', 'OSC', 4, 1),
	   ('2022-05-18', 'NSC', 1, 2),
	   ('2021-05-22', 'RSL', 1, 2),
	   ('2022-05-25', 'FFC', 3, 0),
	   ('2021-05-28', 'FCC', 4, 3);