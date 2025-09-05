<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

if (!isset($_GET['id'])) {
    header('Location: anomalia_listar.php');
    exit;
}
$anomalia = buscar_anomalia($_GET['id']);
if (!$anomalia) {
    $_SESSION['mensagem'] = "Anomalia não encontrada.";
    header('Location: anomalia_listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Anomalia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/menu.php'; ?>
    <main>
        <div class="dossie-confidencial">
            <div class="dossie-header">
                <span class="dossie-label">[ACESSO RESTRITO]</span>
                <h2><span class="dossie-animacao">Descriptografando Dossiê...</span></h2>
                <div class="linha-verde"></div>
            </div>
            <div class="dossie-body">
                <div class="dossie-imagem">
                    <img src="uploads/<?php echo htmlspecialchars($anomalia['arquivo_imagem']); ?>" alt="Imagem da Anomalia">
                </div>
                <div class="dossie-info">
                    <div class="dossie-codigo">CÓDIGO: <span><?php echo htmlspecialchars($anomalia['designacao']); ?></span></div>
                    <div class="dossie-apelido">APELIDO: <span><?php echo htmlspecialchars($anomalia['apelido']); ?></span></div>
                    <div class="dossie-risco">NÍVEL DE RISCO: <span><?php echo htmlspecialchars($anomalia['classe_risco']); ?></span></div>
                    <div class="dossie-sitio">SÍTIO DE CONTENÇÃO: <span><?php echo htmlspecialchars($anomalia['nome_sitio']); ?></span></div>
                    <div class="dossie-descricao">
                        <h3>DESCRIÇÃO</h3>
                        <p><?php echo nl2br(htmlspecialchars($anomalia['descricao'])); ?></p>
                    </div>
                    <div class="dossie-procedimentos">
                        <h3>PROCEDIMENTOS DE CONTENÇÃO</h3>
                        <p><?php echo nl2br(htmlspecialchars($anomalia['procedimentos_contencao'])); ?></p>
                    </div>
                </div>
            </div>
            <div class="dossie-footer">
                <a class="btn" href="anomalia_editar.php?id=<?php echo $anomalia['id']; ?>">Editar</a>
                <a class="btn" href="anomalia_excluir.php?id=<?php echo $anomalia['id']; ?>" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
            </div>
        </div>
        <script>
        // Efeito de "descriptografando"
        document.addEventListener('DOMContentLoaded', function() {
            const anim = document.querySelector('.dossie-animacao');
            setTimeout(() => {
                anim.textContent = 'Dossiê Sigiloso Aberto';
                anim.classList.add('ativo');
            }, 1800);
        });
        </script>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
