CREATE DATABASE estoque;
use estoque;

CREATE TABLE produtos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco FLOAT(10, 2) NOT NULL,
    quantidade INT NOT NULL
);
