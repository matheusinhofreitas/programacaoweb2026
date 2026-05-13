<?php

require_once __DIR__ . '/../config/Database.php';

/**
 * Classe Produto — Model
 *
 * ════════════════════════════════════════════════════════
 *  TAREFA — AULA 2
 *  Implemente os métodos CRUD seguindo o mesmo padrão
 *  da classe Usuario.php vista em aula.
 * ════════════════════════════════════════════════════════
 *
 * Dica: os métodos que você precisa implementar são:
 *   listarTodos()     → SELECT * FROM produtos
 *   buscarPorId($id)  → SELECT * WHERE id = :id
 *   salvar()          → INSERT INTO produtos ...
 *   atualizar($id)    → UPDATE produtos SET ...
 *   deletar($id)      → DELETE FROM produtos WHERE id = :id
 */
class Produto {

    // ── Atributos privados (Encapsulamento) ───────────────────────────────────
    private int    $id;
    private string $nome;
    private string $descricao;
    private float  $preco;
    private int    $quantidade;
    private PDO    $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // ── Getters ───────────────────────────────────────────────────────────────
    public function getId(): int        { return $this->id; }
    public function getNome(): string   { return $this->nome; }
    public function getPreco(): float   { return $this->preco; }

    // ── Setters com validação ─────────────────────────────────────────────────

    public function setNome(string $nome): void {
        if (empty(trim($nome))) {
            throw new InvalidArgumentException('Nome não pode ser vazio.');
        }
        $this->nome = trim($nome);
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = trim($descricao);
    }

    public function setPreco(float $preco): void {
        if ($preco < 0) {
            throw new InvalidArgumentException('Preço não pode ser negativo.');
        }
        $this->preco = $preco;
    }

    public function setQuantidade(int $quantidade): void {
        if ($quantidade < 0) {
            throw new InvalidArgumentException('Quantidade não pode ser negativa.');
        }
        $this->quantidade = $quantidade;
    }

    // ══════════════════════════════════════════════════════════════════════════
    // IMPLEMENTE OS MÉTODOS ABAIXO
    // ══════════════════════════════════════════════════════════════════════════

    // READ — Listar todos os produtos
    public function listarTodos(): array {
        // TODO: implemente aqui
        return [];
    }

    // READ — Buscar por ID
    public function buscarPorId(int $id): ?array {
        // TODO: implemente aqui
        return null;
    }

    // CREATE — Salvar novo produto
    public function salvar(): bool {
        // TODO: implemente aqui
        return false;
    }

    // UPDATE — Atualizar produto
    public function atualizar(int $id): bool {
        // TODO: implemente aqui
        return false;
    }

    // DELETE — Remover produto
    public function deletar(int $id): bool {
        // TODO: implemente aqui
        return false;
    }
}
