// Autor: Leonardo de Oliveira Ramos
// Desenvolvido em 09/2025
// Avaliação prática da disciplina de Tópicos Especiais em Desenvolvimento de Sistemas I
<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>S.O.P.R.O - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/menu.php'; ?>
    <main>
        <h2>Destaques das Anomalias Contidas</h2>
        <section class="destaques">
            <?php
            $anomalias = listar_anomalias();
            shuffle($anomalias);
            foreach (array_slice($anomalias, 0, 5) as $anomalia): ?>
                <div class="card-anomalia">
                    <div class="imagem" style="background-image: url('uploads/<?php echo htmlspecialchars($anomalia['arquivo_imagem']); ?>'); filter: grayscale(100%);"></div>
                    <div class="titulo"><?php echo htmlspecialchars($anomalia['designacao']); ?> - <?php echo htmlspecialchars($anomalia['apelido']); ?></div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
