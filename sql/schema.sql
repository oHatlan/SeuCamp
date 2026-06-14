CREATE DATABASE IF NOT EXISTS seucamp;
USE seucamp;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS torneios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jogo INT NOT NULL,
    id_usuario INT NOT NULL,
    nome VARCHAR(120) NOT NULL,
    descricao TEXT NOT NULL,
    premiacao VARCHAR(120) DEFAULT '',
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

INSERT IGNORE INTO usuarios (id, nome, email, senha) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$wvuEdbOf0yrRDB.Gq48uKeKha9rhDhUwSXEeHrXmuyc64Zxo3JNFu');
