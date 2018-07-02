CREATE TABLE login(
	id_login INT(11) AUTO_INCREMENT,
	usuario_login VARCHAR(255) NOT NULL,
	email_login VARCHAR(255)   NULL,
	senha_login VARCHAR(255)   NOT NULL,
	PRIMARY KEY(id_login)
);

CREATE TABLE processos(
	id_processo INT(11) AUTO_INCREMENT,
	usuario_id INT(11) NOT NULL,
	exame_medico CHAR(1) NULL DEFAULT '0',
	teste_psicotecnico CHAR(1) NULL DEFAULT '0',
	provas_teoricas CHAR(1) NULL DEFAULT '0',
	aulas_praticas CHAR(1) NULL DEFAULT '0',
	prova_multipla_escolha CHAR(1) NULL DEFAULT '0',
	exame_pratico CHAR(1) NULL DEFAULT '0', 
	PRIMARY KEY(id_processo)
);

ALTER TABLE processos add constraint processos_FK foreign key (usuario_id) references usuarios (id);

ALTER TABLE processos ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);