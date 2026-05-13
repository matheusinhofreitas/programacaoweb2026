<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Sistema de Estoque</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-login">

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-header">
            <span class="login-icon">📦</span>
            <h1>Sistema de Estoque</h1>
            <p>Faça login para continuar</p>
        </div>

        <?php if ($erro): ?>
            <div class="alert alert-erro">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=autenticar" method="POST">

            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="admin@sistema.com"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn-full">
                Entrar no sistema
            </button>

        </form>

        <p class="login-hint">
            Acesso padrão: <strong>admin@sistema.com</strong> / <strong>admin123</strong>
        </p>

    </div>

</div>

</body>
</html>
