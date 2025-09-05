<?php
require_once 'includes/config.php';
require_once 'includes/funcoes.php';

if (!isset($_GET['id'])) {
    header('Location: anomalia_listar.php');
    exit;
}
$id = $_GET['id'];
if (excluir_anomalia($id)) {
    $_SESSION['mensagem'] = "Anomalia excluída com sucesso!";
} else {
    $_SESSION['mensagem'] = "Erro ao excluir anomalia.";
}
header('Location: anomalia_listar.php');
exit;
?>
