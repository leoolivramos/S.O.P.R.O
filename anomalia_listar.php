<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
$pagina = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$limite = 10;

$offset = ($pagina - 1) * $limite;

$total = contar_anomalias($pesquisa);

$anomalias = listar_anomalias($pagina);

$total_paginas = ceil($total / $limite);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Anomalias</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/menu.php'; ?>
    <main>
        <h2>Anomalias Contidas</h2>
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="mensagem"><?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
        <?php endif; ?>
        <table class="tabela-anomalias">
            <thead>
                <tr>
                    <th>Designação</th>
                    <th>Apelido</th>
                    <th>Classe de Risco</th>
                    <th>Sítio</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anomalias as $anomalia): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($anomalia['designacao']); ?></td>
                        <td><?php echo htmlspecialchars($anomalia['apelido']); ?></td>
                        <td><?php echo htmlspecialchars($anomalia['classe_risco']); ?></td>
                        <td><?php echo htmlspecialchars($anomalia['nome_sitio']); ?></td>
                        <td>
                            <a class="btn" href="anomalia_visualizar.php?id=<?php echo $anomalia['id']; ?>">Visualizar</a>
                            <a class="btn" href="anomalia_editar.php?id=<?php echo $anomalia['id']; ?>">Editar</a>
                            <a class="btn" href="anomalia_excluir.php?id=<?php echo $anomalia['id']; ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginacao">
            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <a href="?pagina=<?php echo $i; ?>&pesquisa=<?php echo urlencode($pesquisa); ?>"
               class="<?php echo $i == $pagina ? 'ativo' : ''; ?>">
               <?php echo $i; ?>
            </a>
            <?php endfor; ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
