/*
Modelo de base de dados para o Dream Archive (CRUD de sonhos)
Disciplina: Linguagem de Programação para Web - Prof. Daniel Di Domenico
*/

CREATE DATABASE IF NOT EXISTS dream_archive
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE dream_archive;

/* TABELA categorias (dados fixos) */
CREATE TABLE categorias (
  id int AUTO_INCREMENT NOT NULL,
  nome varchar(50) NOT NULL,
  CONSTRAINT pk_categorias PRIMARY KEY (id)
);

/* INSERTs categorias */
INSERT INTO categorias (nome) VALUES ('Aventura');
INSERT INTO categorias (nome) VALUES ('Pesadelo');
INSERT INTO categorias (nome) VALUES ('Fantasia');
INSERT INTO categorias (nome) VALUES ('Cotidiano');
INSERT INTO categorias (nome) VALUES ('Surreal');
INSERT INTO categorias (nome) VALUES ('Sonho Lúcido');


/* TABELA humores (dados fixos) */
CREATE TABLE humores (
  id int AUTO_INCREMENT NOT NULL,
  nome varchar(50) NOT NULL,
  CONSTRAINT pk_humores PRIMARY KEY (id)
);

/* INSERTs humores */
INSERT INTO humores (nome) VALUES ('Feliz');
INSERT INTO humores (nome) VALUES ('Tranquilo');
INSERT INTO humores (nome) VALUES ('Confuso');
INSERT INTO humores (nome) VALUES ('Ansioso');
INSERT INTO humores (nome) VALUES ('Assustado');
INSERT INTO humores (nome) VALUES ('Melancólico');
INSERT INTO humores (nome) VALUES ('Eufórico');


/* TABELA sonhos (entidade principal do CRUD) */
CREATE TABLE sonhos (
  id int AUTO_INCREMENT NOT NULL,
  titulo varchar(100) NOT NULL,
  data_sonho date NOT NULL,
  intensidade int NOT NULL,
  descricao text NOT NULL,
  interpretacao text NOT NULL,
  categoria_id int NOT NULL,
  humor_id int NOT NULL,
  CONSTRAINT pk_sonhos PRIMARY KEY (id)
);

/* Relacionamentos reais via FOREIGN KEY */
ALTER TABLE sonhos ADD CONSTRAINT fk_sonhos_categoria
    FOREIGN KEY (categoria_id) REFERENCES categorias (id);

ALTER TABLE sonhos ADD CONSTRAINT fk_sonhos_humor
    FOREIGN KEY (humor_id) REFERENCES humores (id);
