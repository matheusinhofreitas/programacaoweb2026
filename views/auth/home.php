<?php require_once __DIR__ . '/../layout/header.php'; ?>

<section class="page-header">
    <div>
        <h1>Dashboard</h1>
        <p class="page-sub">Bem-vindo, <strong><?= htmlspecialchars($usuario['nome']) ?></strong>!</p>
    </div>
</section>

<div class="dashboard-grid">

    <a href="index.php?action=produtos" class="dash-card">
        <span class="dash-icon">📦</span>
        <h3>Produtos</h3>
        <p>Gerenciar estoque de produtos</p>
        <span class="dash-tag">CRUD completo</span>
    </a>

    <div class="dash-card dash-card--disabled">
        <span class="dash-icon">👥</span>
        <h3>Clientes</h3>
        <p>Cadastro e histórico de clientes</p>
        <span class="dash-tag dash-tag--soon">Em breve — Aula 3</span>
    </div>

    <div class="dash-card dash-card--disabled">
        <span class="dash-icon">🛒</span>
        <h3>Vendas</h3>
        <p>Registro e controle de vendas</p>
        <span class="dash-tag dash-tag--soon">Em breve — Aula 5</span>
    </div>

    <div class="dash-card dash-card--disabled">
        <span class="dash-icon">📊</span>
        <h3>Relatórios</h3>
        <p>Visão geral do negócio</p>
        <span class="dash-tag dash-tag--soon">Em breve — Aula 7</span>
    </div>

</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
