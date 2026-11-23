CREATE DATABASE IF NOT EXISTS fresh_tart_db DEFAULT CHARACTER SET utf8mb4;
USE fresh_tart_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha) VALUES
('Admin', 'admin@freshtart.com', '$2y$10$LEXF.kgV3YIWbSjyeG4Ze.ZfbNCYzN9C2xmGCS/XYDykQAuoJoVfG');

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(80) NOT NULL,
    descricao TEXT
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao TEXT,
    categoria_id INT NULL,
    imagem VARCHAR(255) NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);
