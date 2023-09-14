/*
CREATE TABLE permissao(
	id_permissao SERIAL PRIMARY KEY,
	descricao varchar(20)
);
INSERT INTO permissao(descricao) VALUES ('Nenhuma'),('Parcial'),('Total');
*/

CREATE TABLE usuario(
	id_usuario SERIAL PRIMARY KEY,
	nome varchar(50),
	telefone varchar(15),
	data_nasc date,
	email varchar(90),
	senha varchar(255) /* ,
	 id_permissao int not null,  
	CONSTRAINT fk_usuario_permissao FOREIGN KEY (id_permissao)
	REFERENCES permissao(id_permissao) */
	CONSTRAINT uniquekey_usuario_email UNIQUE (email)
);

CREATE TABLE ADMINISTRADOR(
	ID_ADMINISTRADOR SERIAL PRIMARY KEY,
	PRIMEIRO_NOME VARCHAR(20),
	SEGUNDO_NOME VARCHAR(20),
	EMAIL VARCHAR(100),
	SENHA VARCHAR(255),
	CONSTRAINT UNIQUEKEY_ADM_EMAIL UNIQUE (EMAIL)
);

CREATE TABLE moradores(
	id_morador SERIAL PRIMARY KEY,
	nome varchar(90),
	cidade_atual varchar(30),
	cidade_natal varchar(30),
	data_nasc varchar(10),
	nome_familiar_proximo varchar(50),
	grau_parentesco varchar(40),
	ID_ADM int not null,
	CONSTRAINT fk_ADM_morador FOREIGN KEY (ID_ADM)
	REFERENCES ADMINISTRADOR(ID_ADM)
);

CREATE TABLE DESCRICAO(
	ID_DESCRICAO SERIAL PRIMARY KEY,
	ID_USUARIO int not null,
	ID_MORADOR int not null,
	DESCRICAO varchar(255),
	SITUCAO varchar(20),
	/* id_permissao int not null, */
		CONSTRAINT fk_usuario_descricao FOREIGN KEY (id_usuario)
	REFERENCES usuario(id_usuario),
	
		CONSTRAINT fk_descricao_morador FOREIGN KEY (id_morador)
	REFERENCES moradores(id_morador)/*,
	 
		CONSTRAINT fk_descricao_permissao FOREIGN KEY (id_permissao)
	REFERENCES permissao(id_permissao) */
);

/*
Nas novas mudanças do projeto, a tabela de permissões nao existe mais, como um facilitador, será criada uma unica tabela para um representante da
intituição/org. Nesse contexto, os usuarios e os "Administradores" ficam separados em diferentes tabelas, tornando inútil qualquer tipo de permissão.
*/