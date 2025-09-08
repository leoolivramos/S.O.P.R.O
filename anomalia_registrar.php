<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $designacao = $_POST['designacao'];
    $apelido = $_POST['apelido'];
    $classe_risco = $_POST['classe_risco'];
    $descricao = $_POST['descricao'];
    $procedimentos = $_POST['procedimentos_contencao'];
    $id_sitio = $_POST['id_sitio'];
    $arquivo_imagem = '';

    if (isset($_FILES['arquivo_imagem']) && $_FILES['arquivo_imagem']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['arquivo_imagem']['name'], PATHINFO_EXTENSION);
        $arquivo_imagem = uniqid('anomalia_', true) . '.' . $ext;
        $upload_path = __DIR__ . '/uploads/' . $arquivo_imagem;
        if (!move_uploaded_file($_FILES['arquivo_imagem']['tmp_name'], $upload_path)) {
            $erro = "Falha ao mover o arquivo enviado. Verifique as permissões da pasta uploads.";
        }
    }

    if (!$erro && inserir_anomalia($designacao, $apelido, $classe_risco, $descricao, $procedimentos, $arquivo_imagem, $id_sitio)) {
        $_SESSION['mensagem'] = "Anomalia registrada com sucesso!";
        header('Location: anomalia_listar.php');
        exit;
    } elseif (!$erro) {
        $erro = "Erro ao registrar anomalia.";
    }
}

$sitios = listar_sitios();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nova Anomalia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/menu.php'; ?>
    <main>
        <h2>Registrar Nova Anomalia</h2>
        <?php if (isset($erro)): ?>
            <div class="mensagem"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form class="formulario" method="post" enctype="multipart/form-data">
            <label for="designacao">
            Designação (ex: EA-074-BR)
            </label>
            <input type="text" name="designacao" required>

            <label for="apelido">Apelido</label>
            <input type="text" name="apelido" required>

            <label for="classe_risco">Classe de Risco</label>
            <select name="classe_risco" required>
                <option value="">Selecione...</option>
                <option value="Safe">Seguro</option>
                <option value="Euclid">Euclídeo</option>
                <option value="Keter">Keter</option>
                <option value="Thaumiel">Thaumiel</option>
                <option value="Neutralized">Neutro</option>
                <option value="Apollyon">Apollyon</option>
            </select>

            <label for="descricao">Descrição</label>
            <textarea name="descricao" required></textarea>

            <label for="procedimentos_contencao">Procedimentos de Contenção</label>
            <textarea name="procedimentos_contencao" required></textarea>

            <label for="arquivo_imagem">Imagem da Anomalia</label>
            <input type="file" name="arquivo_imagem" accept="image/*" required>

            <label for="id_sitio">Sítio de Contenção</label>
            <select name="id_sitio" required>
                <option value="">Selecione...</option>
                <?php foreach ($sitios as $sitio): ?>
                    <option value="<?php echo $sitio['id']; ?>"><?php echo htmlspecialchars($sitio['nome']); ?></option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <button class="btn" type="submit">Registrar</button>
        </form>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
