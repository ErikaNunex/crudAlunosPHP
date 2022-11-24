--Criando banco--
CREATE DATABASE db_escola;

--Acessando o banco--
USE db_escola;

--Criando tabela de aluno--
CREATE TABLE tb_alunos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    status TINYINT NOT NULL,
    genero VARCHAR(20) NOT NULL,
    dataNascimento DATETIME NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);

INSERT INTO tb_alunos (nome, matricula, email, status, genero, dataNascimento,cpf)
VALUES
('Maria', '1234', 'maria@email.com',true,'feminino','2001-09-12','12345026789'),
('Lucas', '1235', 'lucas@email.com',true,'masculino','2000-04-01','12344026729'),
('Julio', '1236', 'julio@email.com',true,'masculino','1999-01-05','12341026429')
;

SELECT * FROM tb_alunos;

--Criando tabela de professor--
CREATE TABLE tb_professores(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(100) NOT NULL, 
    status TINYINT NOT NULL,
    formacao VARCHAR(100),
    genero VARCHAR(20) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);

INSERT INTO tb_professores (nome, endereco, status,formacao, genero, cpf)
VALUES
('Maria','Rua rua, 123, Bairro, Cidade',true,'formaçao??','feminino','12345022719'),
('Lucas','Rua rua, 123, Bairro, Cidade',true,'formaçao??','masculino','12344016719'),
('Julio','Rua rua, 123, Bairro, Cidade',true,'formaçao??','masculino','12341066459')
;

SELECT * FROM tb_professores;