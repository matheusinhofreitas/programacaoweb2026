<?php

require_once __DIR__ . '/../config/Database.php';

class Usuario {

    // ── Atributos privados (Encapsulamento) ──────────────────────────────────
    private int    $id;
    private string $nome;
    private string $email;
    private string $senha;
    private PDO    $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // ── Getters ───────────────────────────────────────────────────────────────
    public function getId(): int      { return $this->id; }
    public function getNome(): string  { return $this->nome; }
    public function getEmail(): string { return $this->email; }

    // ── Setters com validação ─────────────────────────────────────────────────
    public function setNome(string $nome): void {
        if (empty(trim($nome))) {
            throw new InvalidArgumentException('Nome não pode ser vazio.');
        }
        $this->nome = trim($nome);
    }

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('E-mail inválido.');
        }
        $this->email = $email;
    }

    public function setSenha(string $senha): void {
        if (strlen($senha) < 6) {
            throw new InvalidArgumentException('A senha deve ter no mínimo 6 caracteres.');
        }
        // O hash já é gerado aqui no setter — o Controller não precisa saber como
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    // ── Métodos CRUD ──────────────────────────────────────────────────────────

    public function buscarPorEmail(string $email): ?array {

        $stmt = $this->conn->prepare(
            'SELECT * FROM usuarios WHERE email = :email LIMIT 1'
        );
        $stmt->execute([':email' => $email]);
        $resultado = $stmt->fetch();
        return $resultado ?: null;
    }

    public function buscarPorId(int $id): ?array {
        $stmt = $this->conn->prepare(
            'SELECT id, nome, email, criado_em FROM usuarios WHERE id = :id LIMIT 1'
        );
        $stmt->execute([':id' => $id]);
        $resultado = $stmt->fetch();
        return $resultado ?: null;
    }

    public function salvar(): bool {
        $sql  = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nome'  => $this->nome,
            ':email' => $this->email,
            ':senha' => $this->senha,
        ]);
    }
}