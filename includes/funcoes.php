<?php
require_once 'config.php';

function conectar() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
    }
    return $conn;
}

function listar_sitios($pagina = 1) {
    $conn = conectar();
    $offset = ($pagina - 1) * 10;
    $limit = 10;
    $sql = "SELECT * FROM sitios ORDER BY nome LIMIT ?, ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $offset, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $sitios = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $sitios[] = $row;
    }
    mysqli_close($conn);
    return $sitios;
}

function inserir_sitio($nome, $descricao) {
    $conn = conectar();
    $sql = "INSERT INTO sitios (nome, descricao) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nome, $descricao);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function editar_sitio($id, $nome, $descricao) {
    $conn = conectar();
    $sql = "UPDATE sitios SET nome=?, descricao=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $nome, $descricao, $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function excluir_sitio($id) {
    $conn = conectar();
    $sql = "DELETE FROM sitios WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function buscar_sitio($id) {
    $conn = conectar();
    $sql = "SELECT * FROM sitios WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $sitio = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $sitio;
}

function inserir_anomalia($designacao, $apelido, $classe_risco, $descricao, $procedimentos, $arquivo_imagem, $id_sitio) {
    $conn = conectar();
    $sql = "INSERT INTO anomalias (designacao, apelido, classe_risco, descricao, procedimentos_contencao, arquivo_imagem, id_sitio) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $designacao, $apelido, $classe_risco, $descricao, $procedimentos, $arquivo_imagem, $id_sitio);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function listar_anomalias($pagina = 1) {
    $conn = conectar();
    $offset = ($pagina - 1) * 10;
    $limit = 10;
    $sql = "SELECT a.*, s.nome AS nome_sitio FROM anomalias a JOIN sitios s ON a.id_sitio = s.id ORDER BY a.designacao LIMIT ?, ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $offset, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $anomalias = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $anomalias[] = $row;
    }
    mysqli_close($conn);
    return $anomalias;
}

function buscar_anomalia($id) {
    $conn = conectar();
    $sql = "SELECT a.*, s.nome AS nome_sitio FROM anomalias a JOIN sitios s ON a.id_sitio = s.id WHERE a.id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $anomalia = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $anomalia;
}

function editar_anomalia($id, $designacao, $apelido, $classe_risco, $descricao, $procedimentos, $arquivo_imagem, $id_sitio) {
    $conn = conectar();
    if ($arquivo_imagem) {
        $sql = "UPDATE anomalias SET designacao=?, apelido=?, classe_risco=?, descricao=?, procedimentos_contencao=?, arquivo_imagem=?, id_sitio=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssii", $designacao, $apelido, $classe_risco, $descricao, $procedimentos, $arquivo_imagem, $id_sitio, $id);
    } else {
        $sql = "UPDATE anomalias SET designacao=?, apelido=?, classe_risco=?, descricao=?, procedimentos_contencao=?, id_sitio=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssi", $designacao, $apelido, $classe_risco, $descricao, $procedimentos, $id_sitio, $id);
    }
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function excluir_anomalia($id) {
    $conn = conectar();
    $sql = "DELETE FROM anomalias WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $ok;
}

function contar_anomalias($pesquisa = '') {
    $conn = conectar();
    if ($pesquisa) {
        $sql = "SELECT COUNT(*) AS total FROM anomalias WHERE designacao LIKE ? OR apelido LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        $like = '%' . $pesquisa . '%';
        mysqli_stmt_bind_param($stmt, "ss", $like, $like);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
    } else {
        $sql = "SELECT COUNT(*) AS total FROM anomalias";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
    }
    mysqli_close($conn);
    return $total;
}
?>
