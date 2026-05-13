<?php

require_once __DIR__ . '/../models/Usuario.php';

/**
 * Classe AuthController — Controller de Autenticação
 *
 * Responsável por gerenciar o fluxo de login, logout
 * e proteção das páginas internas.
 *
 * Conceitos OOP aplicados:
 *   - Responsabilidade única: só cuida de autenticação
 *   - Encapsulamento: métodos auxiliares são privados
 */
class AuthController {

    private Usuario $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    // ── Exibir tela de login ──────────────────────────────────────────────────

    public function login(): void {
        // Se já está logado, vai direto para home
        if (isset($_SESSION['usuario'])) {
            $this->redirecionar('home');
            return;
        }

        $erro = $_SESSION['erro'] ?? null;
        unset($_SESSION['erro']);

        require_once __DIR__ . '/../views/auth/login.php';
    }

    // ── Processar autenticação (POST) ─────────────────────────────────────────

    public function autenticar(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirecionar('login');
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha']        ?? '';

        // Busca o usuário pelo e-mail no banco
        $usuario = $this->model->buscarPorEmail($email);

        // Verifica se existe e se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = [
                'id'   => $usuario['id'],
                'nome' => $usuario['nome'],
            ];
            $this->redirecionar('home');
        } else {
            $_SESSION['erro'] = 'E-mail ou senha inválidos.';
            $this->redirecionar('login');
        }
    }

    // ── Tela inicial (dashboard) ──────────────────────────────────────────────

    public function home(): void {
        $this->verificarSessao();
        $usuario = $_SESSION['usuario'];
        require_once __DIR__ . '/../views/auth/home.php';
    }

    // ── Logout ────────────────────────────────────────────────────────────────

    public function logout(): void {
        session_destroy();
        $this->redirecionar('login');
    }

    // ── Métodos privados ──────────────────────────────────────────────────────

    /**
     * Verifica se há sessão ativa.
     * Se não houver, redireciona para o login.
     */
    private function verificarSessao(): void {
        if (!isset($_SESSION['usuario'])) {
            $this->redirecionar('login');
        }
    }

    private function redirecionar(string $action): void {
        header("Location: index.php?action={$action}");
        exit;
    }
}
