<?php require_once __DIR__ . '/../layout/header.php'; ?>

<!--
════════════════════════════════════════════════════════
  TAREFA — AULA 2
  Implemente o formulário de produto aqui.
  Este arquivo deve funcionar para CRIAR e EDITAR.

  Variáveis disponíveis:
    $produto   → array com dados do produto (edição)
                 ou null (criação)
    $editando  → true (editar) | false (criar)
════════════════════════════════════════════════════════
-->

<section class="page-header">
    <h1><?= $editando ? 'Editar Produto' : 'Novo Produto' ?></h1>
    <a href="index.php?action=produtos" class="btn btn-secondary">← Voltar</a>
</section>

<!-- Adicione aqui o formulário -->

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
