		CREATE TABLE titulos (
		Nome VARCHAR(100),
		id_tit INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT
		);

		CREATE TABLE premios (
		Nome VARCHAR(100),
		id_pre INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT
		);

		CREATE TABLE jogos (
		Online VARCHAR(100),
		id_jgs INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT
		);

		CREATE TABLE redes_sociais (
		Online VARCHAR(100),
		id_rs INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT
		);

		CREATE TABLE influenciadores (
		Nome VARCHAR(100),
		id_influ INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		id_org INTEGER
		);

		CREATE TABLE organizacao (
		Nome VARCHAR(100),
		id_org INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
		Criacao DATE,
		Ft VARCHAR(100)
		);

		CREATE TABLE rs_org (
		id_org INTEGER,
		id_rs INTEGER,
		Rds VARCHAR(100),
		FOREIGN KEY(id_org) REFERENCES organizacao (id_org),
		FOREIGN KEY(id_rs) REFERENCES redes_sociais (id_rs)
		);

		CREATE TABLE org_jgs (
		id_org INTEGER,
		id_jgs INTEGER,
		FOREIGN KEY(id_org) REFERENCES organizacao (id_org),
		FOREIGN KEY(id_jgs) REFERENCES jogos (id_jgs)
		);

		CREATE TABLE org_tit (
		id_org INTEGER,
		id_tit INTEGER,
		FOREIGN KEY(id_org) REFERENCES organizacao (id_org),
		FOREIGN KEY(id_tit) REFERENCES titulos (id_tit)
		);

		CREATE TABLE org_pre (
		id_org INTEGER,
		id_pre INTEGER,
		FOREIGN KEY(id_org) REFERENCES organizacao (id_org),
		FOREIGN KEY(id_pre) REFERENCES premios (id_pre)
		);

		ALTER TABLE influenciadores ADD FOREIGN KEY(id_org) REFERENCES organizacao (id_org);

		INSERT INTO organizacao(Nome, id_org, Criacao, Ft) VALUES('LOUD', 1, '2019-02-28', 'LOUD.png'),
		('Pain', 2, '2010-09-20', 'Pain.png'), ('Fluxo', 3, '2021-01-18', 'Fluxo.png'), 
		('Netshoes-Miners', 4, '2021-06-07', 'Netshoes-Miners.png');

		INSERT INTO titulos(Nome, id_tit) VALUES('NFA', 1), ('Copa América', 2), ('LBFF', 3);

		INSERT INTO premios(Nome, id_pre) VALUES('Maior ORG', 1), ('Mais influente', 2), 
		('Melhor ORG', 3);

		INSERT INTO jogos(Online, id_jgs) VALUES('Free Fire', 1), ('LOL', 2), ('CS', 3), 
		('Valorant', 4), ('Fortnite', 5),('GTA-RP', 6);

		INSERT INTO redes_sociais(Online, id_rs) VALUES('Instagram', 1), ('Twitter', 2), 
		('TikTok', 3), ('Discord', 4), ('Youtube', 5);

		INSERT INTO influenciadores(Nome, id_influ, id_org) VALUES('Coringa', 1, 1), ('Gorila', 2, 3), ('Jukes', 3, 2),
		('Babi', 4, 1), ('Alemaze', 5, 3), ('Kami', 6, 2);

		INSERT INTO rs_org(id_org, id_rs, Rds) VALUES(1, 1, 'https://www.instagram.com/loudgg/'), 
		(1, 2, 'https://twitter.com/LOUDgg'), (1, 3, 'https://www.tiktok.com/@loudgg?lang=pt-BR'), 
		(1, 4, 'https://www.discord.gg/loud'), (1, 5, 'https://www.youtube.com/c/LOUDgg'), 
		(2, 1, 'https://www.instagram.com/paingamingbr/'), (2, 2, 'https://twitter.com/paingamingbr/'), 
		(2, 3, 'https://www.tiktok.com/@pain.gaming?lang=pt-BR'), (2, 5, 'https://www.youtube.com/c/paingamingbr'), 
		(3, 1, 'https://www.instagram.com/fluxogg/'), (3, 2,'https://twitter.com/fluxogg/'), 
		(3 , 3, 'https://www.tiktok.com/@fluxogg?lang=pt-BR'), (3 , 5, 'https://www.youtube.com/c/fluxo'), 
		(4, 1, 'https://www.instagram.com/minersgg/'), (4, 2, 'https://twitter.com/minersgg/'), 
		(4, 3, 'https://www.tiktok.com/@minersgg?lang=pt-BR');

		INSERT INTO org_jgs(id_org, id_jgs) VALUES(1, 1), (1, 2), (1, 4), (2, 1), (2, 2), 
		(2, 3), (3, 1);

		INSERT INTO org_tit(id_org, id_tit) VALUES(1, 1), (1, 2), (1, 3), (2, 1), (3, 3);

		INSERT INTO org_pre(id_org, id_pre) VALUES(1, 1), (1, 2), (1, 3);
