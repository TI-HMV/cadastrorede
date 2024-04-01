<?php

include 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome']) && isset($_GET['senha']) && isset($_GET['matricula'])) {
    $nome = ucwords(strtolower($_GET["nome"]));
    $senha = $_GET["senha"];
    $matricula = $_GET["matricula"];

    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Verificar se já existe um usuário com a mesma matrícula
    $checkUserSql = "SELECT COUNT(*) as count FROM wifi WHERE Matricula = ? AND Senha IS NULL";
    $checkUserStmt = $conn->prepare($checkUserSql);
    $checkUserStmt->bind_param("s", $matricula);
    $checkUserStmt->execute();
    $checkUserResult = $checkUserStmt->get_result();
    $checkUserData = $checkUserResult->fetch_assoc();

    if ($checkUserData['count'] > 0) {
        // Usuário já existe, então atualiza
        $updateSql = "UPDATE wifi SET Senha = ?, Nome = ? WHERE Matricula = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("sss", $senhaHash, $nome, $matricula);

        if ($updateStmt->execute()) {
            // Redirecionar para a página de usuários após a atualização
            header("Location: index.php?mensagem=Usuário atualizado com sucesso!");
            exit();
        } else {
            // Erro ao atualizar, definir mensagem de erro como "1"
            session_start();
            $_SESSION['erro'] = "1";
            header("Location: index.php");
            exit();
        }
    } else {
        // Usuário não existe, define mensagem de erro como "1"
        session_start();
        $_SESSION['erro'] = "1";
        header("Location: index.php?error=Matricula não encontrada ou já existe um usuario cadastrado com essa matricula, entre em contato com a chefia imediata para enviar a matricula para o setor da");
        exit();
    }
}

$conn->close();

?>