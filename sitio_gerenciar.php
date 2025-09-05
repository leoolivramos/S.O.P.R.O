<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['novo'])) {
        if (inserir_sitio($_POST['nome'], $_POST['descricao'])) {
            $_SESSION['mensagem'] = "Sítio cadastrado!";
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar sítio.";
        }
    } elseif (isset($_POST['editar'])) {
        if (editar_sitio($_POST['id'], $_POST['nome'], $_POST['descricao'])) {
            $_SESSION['mensagem'] = "Sítio editado!";
        } else {
            $_SESSION['mensagem'] = "Erro ao editar sítio.";
        }
    } elseif (isset($_POST['excluir'])) {
        if (excluir_sitio($_POST['id'])) {
            $_SESSION['mensagem'] = "Sítio excluído!";
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir sítio.";
        }
    }
    header('Location: sitio_gerenciar.php');
    exit;
}

$sitios = listar_sitios();
$editando = false;
if (isset($_GET['editar'])) {
    $editando = buscar_sitio($_GET['editar']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Sítios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/menu.php'; ?>
    <main>
        <h2>Gerenciar Sítios de Contenção</h2>
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="mensagem"><?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
        <?php endif; ?>

        <form class="formulario" method="post">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?php echo $editando['id']; ?>">
                <label for="nome">Nome do Sítio</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($editando['nome']); ?>" required>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" required><?php echo htmlspecialchars($editando['descricao']); ?></textarea>
                <br><br>
                <button class="btn" type="submit" name="editar">Salvar Alterações</button>
            <?php else: ?>
                <label for="nome">Nome do Sítio</label>
                <input type="text" name="nome" required>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" required></textarea>
                <br><br>
                <button class="btn" type="submit" name="novo">Cadastrar Sítio</button>
            <?php endif; ?>
        </form>

        <h3>Sítios Cadastrados</h3>
        <table class="tabela-anomalias">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sitios as $sitio): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sitio['nome']); ?></td>
                        <td><?php echo htmlspecialchars($sitio['descricao']); ?></td>
                        <td>
                            <a class="btn" href="sitio_gerenciar.php?editar=<?php echo $sitio['id']; ?>">Editar</a>
                            <form style="display:inline;" method="post" onsubmit="return confirm('Confirma a exclusão?');">
                                <input type="hidden" name="id" value="<?php echo $sitio['id']; ?>">
                                <button class="btn" type="submit" name="excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
