CREATE TABLE permissao(
	id_permissao SERIAL PRIMARY KEY,
	descricao varchar(20)
);

INSERT INTO permissao(descricao) VALUES ('Nenhuma'),('Parcial'),('Total');

CREATE TABLE usuario(
	id_usuario SERIAL PRIMARY KEY,
	nome varchar(50),
	telefone varchar(15),
	data_nasc date,
	email varchar(90),
	senha varchar(255),
	id_permissao int not null,
	CONSTRAINT fk_usuario_permissao FOREIGN KEY (id_permissao)
	REFERENCES permissao(id_permissao)
);
ALTER TABLE usuario ADD CONSTRAINT uniquekey_usuario_email UNIQUE (email);


select * from usuario;

CREATE TABLE moradores(
	id_morador SERIAL PRIMARY KEY,
	nome varchar(90),
	cidade_atual varchar(30),
	cidade_natal varchar(30),
	data_nasc varchar(10),
	nome_familiar_proximo varchar(50),
	grau_parentesco varchar(40),
	id_usuario int not null,
	CONSTRAINT fk_usuario_morador FOREIGN KEY (id_usuario)
	REFERENCES usuario(id_usuario)
);

CREATE TABLE descricao(
	id_descricao SERIAL PRIMARY KEY,
	id_usuario int not null,
	id_morador int not null,
	descricao varchar(255),
	id_permissao int not null,
		CONSTRAINT fk_usuario_descricao FOREIGN KEY (id_usuario)
	REFERENCES usuario(id_usuario),
	
		CONSTRAINT fk_descricao_morador FOREIGN KEY (id_morador)
	REFERENCES moradores(id_morador),
	
		CONSTRAINT fk_descricao_permissao FOREIGN KEY (id_permissao)
	REFERENCES permissao(id_permissao)
);

select * from descricao;
select * from moradores;
SELECT * FROM permissao;
SELECT * FROM usuario;
