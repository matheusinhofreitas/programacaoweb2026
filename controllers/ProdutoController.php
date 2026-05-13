<?php

require_once __DIR__ . '/../models/Produto.php';

/**
 * Classe ProdutoController — Controller de Produtos
 *
 * ════════════════════════════════════════════════════════
 *  TAREFA — AULA 2
 *  Implemente os métodos seguindo o mesmo padrão do
 *  AuthController.php visto em aula.
 * ════════════════════════════════════════════════════════
 *
 * Rotas a implementar no index.php:
 *   ?action=produtos          → index()
 *   ?action=novoProduto       → criar()
 *   ?action=salvarProduto     → salvar()
 *   ?action=editarProduto     → editar()
 *   ?action=atualizarProduto  → atualizar()
 *   ?action=deletarProduto    → deletar()
 */
class ProdutoController {

    private Produto $model;

    public function __construct() {
        $this->model = new Produto();
    }

    // ── Verificação de sessão (obrigatório em todos os métodos) ───────────────
    private function verificarSessao(): void {
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    private function flash(string $mensagem, string $tipo): void {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo']     = $tipo;
    }

    private function redirecionar(string $action): void {
        header("Location: index.php?action={$action}");
        exit;
    }

    // ══════════════════════════════════════════════════════════════════════════
    // IMPLEMENTE OS MÉTODOS ABAIXO
    // ══════════════════════════════════════════════════════════════════════════

    // READ — Listar produtos
    public function index(): void {
        $this->verificarSessao();
        // TODO: buscar produtos e carregar a view
    }

    // CREATE — Exibir formulário
    public function criar(): void {
        $this->verificarSessao();
        // TODO: carregar views/produto/form.php
    }

    // CREATE — Salvar
    public function salvar(): void {
        $this->verificarSessao();
        // TODO: receber POST, chamar $this->model->salvar(), redirecionar
    }

    // UPDATE — Exibir formulário preenchido
    public function editar(): void {
        $this->verificarSessao();
        // TODO: buscar produto por ID, carregar views/produto/form.php
    }

    // UPDATE — Gravar alterações
    public function atualizar(): void {
        $this->verificarSessao();
        // TODO: receber POST, chamar $this->model->atualizar(), redirecionar
    }

    // DELETE — Remover
    public function deletar(): void {
        $this->verificarSessao();
        // TODO: chamar $this->model->deletar(), redirecionar
    }
}
