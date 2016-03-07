CREATE DATABASE pdo;

CREATE TABLE alunos(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    nota INT
);

INSERT INTO alunos(nome,nota)VALUES('Thiago Tobias','10');
INSERT INTO alunos(nome,nota)VALUES('Ronald Santos','9');
INSERT INTO alunos(nome,nota)VALUES('Guilherme Silva','8');
INSERT INTO alunos(nome,nota)VALUES('William Brandino','7');
INSERT INTO alunos(nome,nota)VALUES('William Brito','6');
INSERT INTO alunos(nome,nota)VALUES('Anderson Luciano','5');
INSERT INTO alunos(nome,nota)VALUES('Guillherme Monteiro','4');
INSERT INTO alunos(nome,nota)VALUES('Paulo Lima','10');
INSERT INTO alunos(nome,nota)VALUES('Danilo Henrique','9');
INSERT INTO alunos(nome,nota)VALUES('Rafael de Abreu Litterio','8');
INSERT INTO alunos(nome,nota)VALUES('João Junior','7');
INSERT INTO alunos(nome,nota)VALUES('Gustavo Sandrin Xavier','6');
INSERT INTO alunos(nome,nota)VALUES('Breno Sabella','5');
INSERT INTO alunos(nome,nota)VALUES('Dirce Maria','4');
INSERT INTO alunos(nome,nota)VALUES('Lucas Timtim','10');
INSERT INTO alunos(nome,nota)VALUES('João Pedro','9');
INSERT INTO alunos(nome,nota)VALUES('Maicon Paraná','8');
INSERT INTO alunos(nome,nota)VALUES('Flávio Zequin','7');
INSERT INTO alunos(nome,nota)VALUES('Guilherme Churros','6');
INSERT INTO alunos(nome,nota)VALUES('Rafael Pudim','5');



# CREATE TABLE clientes(
#     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
#     nome VARCHAR(255),
#     email VARCHAR(255)
# );
# INSERT INTO clientes(nome,email)VALUES('Rafael Pudim','pudim@pudim.com.br');
# INSERT INTO clientes(nome,email)VALUES('Thiago Tobias','thiagotobias@thiago.com.br');