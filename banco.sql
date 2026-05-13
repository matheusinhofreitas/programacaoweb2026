-- ─────────────────────────────────────────────────────────────────────────────
-- SISTEMA DE ESTOQUE — Script do banco de dados
-- Aula 1: Login + estrutura base
-- ─────────────────────────────────────────────────────────────────────────────

CREATE DATABASE IF NOT EXISTS sistema_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE sistema_db;

-- ── Tabela de usuários (Aula 1 — Professor) ──────────────────────────────────
CREATE TABLE IF NOT EXISTS usuarios (
    id         INT          NOT NULL AUTO_INCREMENT,
    nome       VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL UNIQUE,
    senha      VARCHAR(255) NOT NULL,
    criado_em  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuário padrão: senha = admin123
INSERT INTO usuarios (nome, email, senha) VALUES (
    'Administrador',
    'admin@sistema.com',
    '$2y$10$qlKpzxvd3t9VMWucbMQT/u8y/cfk6j/Y4C34/GRp0JoPLFQndTYAe'
);



-- ── Tabela de produtos (Aula 2 — Aluno implementa) ───────────────────────────
CREATE TABLE IF NOT EXISTS produtos (
    id          INT           NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(100)  NOT NULL,
    descricao   TEXT,
    preco       DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    quantidade  INT           NOT NULL DEFAULT 0,
    criado_em   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Produtos de exemplo
INSERT INTO produtos (nome, descricao, preco, quantidade) VALUES
    ('Notebook Dell Inspiron', '15 polegadas, 16GB RAM, SSD 512GB', 3499.90, 10),
    ('Mouse Sem Fio Logitech',  'Receptor USB, 1000 DPI',            129.90,  35),
    ('Teclado Mecânico HyperX','Switch Red, ABNT2',                  349.00,  20);
