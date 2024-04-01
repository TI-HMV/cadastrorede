<?php
include "../config/config.php";

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    
    // Consulta para deletar a matrícula do banco de dados
    $sql = "DELETE FROM wifi WHERE matricula = ?";
    
    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);
    
    // Vincular os parâmetros
    $stmt->bind_param("i", $matricula);
    
    // Executar a declaração
    if ($stmt->execute()) {
        // Redirecionar de volta para a página principal com mensagem de sucesso
        header("Location: home.php?mensagem=Matrícula excluída com sucesso.");
        exit();
    } else {
        // Redirecionar de volta para a página principal com mensagem de erro
        header("Location: home.php?error=Erro ao excluir matrícula.");
        exit();
    }
} else {
    // Redirecionar de volta para a página principal se a matrícula não estiver definida na URL
    header("Location: home.php");
    exit();
}
?>