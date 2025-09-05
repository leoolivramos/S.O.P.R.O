<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

$anomalias = listar_anomalias();
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
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
