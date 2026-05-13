<?php

session_start();

// ── Autoload das classes ──────────────────────────────────────────────────────
spl_autoload_register(function (string $classe): void {
    $caminhos = [
        __DIR__ . '/config/'      . $classe . '.php',
        __DIR__ . '/models/'      . $classe . '.php',
        __DIR__ . '/controllers/' . $classe . '.php',
    ];
    foreach ($caminhos as $caminho) {
        if (file_exists($caminho)) {
            require_once $caminho;
            return;
        }
    }
});

// ── Roteamento (Front Controller) ─────────────────────────────────────────────
$action = $_GET['action'] ?? 'login';

// Rotas de autenticação
$rotasAuth = ['login', 'autenticar', 'home', 'logout'];

// Rotas de produtos (aluno implementa na Aula 2)
$rotasProduto = [
    'produtos', 'novoProduto', 'salvarProduto',
    'editarProduto', 'atualizarProduto', 'deletarProduto',
];

if (in_array($action, $rotasAuth, true)) {
    $controller = new AuthController();
    $controller->$action();

} elseif (in_array($action, $rotasProduto, true)) {
    // Mapeia a action para o método correto do ProdutoController
    $mapa = [
        'produtos'         => 'index',
        'novoProduto'      => 'criar',
        'salvarProduto'    => 'salvar',
        'editarProduto'    => 'editar',
        'atualizarProduto' => 'atualizar',
        'deletarProduto'   => 'deletar',
    ];
    $controller = new ProdutoController();
    $metodo     = $mapa[$action];
    $controller->$metodo();

} else {
    // Ação desconhecida → vai para login
    $controller = new AuthController();
    $controller->login();
}
