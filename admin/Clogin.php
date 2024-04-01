<?php

include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['senha'])) {
    $matricula = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Buscar usuário pelo matrícula
    $sql = "SELECT Nome, Senha FROM wifi WHERE Matricula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matricula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Usuário encontrado
        $row = $result->fetch_assoc();
        $senhaHash = $row['Senha'];

        // Verificar se a senha fornecida corresponde ao hash
        if (password_verify($senha, $senhaHash)) {
            // Senha correta, iniciar sessão ou redirecionar para a página de sucesso
            session_start();
            $_SESSION['matricula'] = $matricula;
            header("Location: home.php");
            exit();
        } else {
            // Senha incorreta, redirecionar para a página de login com mensagem de erro
            header("Location: index.php?error=Senha incorreta");
            exit();
        }
    } else {
        // Usuário não encontrado, redirecionar para a página de login com mensagem de erro
        header("Location: index.php?error=Usuário não encontrado");
        exit();
    }
}

$conn->close();
?>
