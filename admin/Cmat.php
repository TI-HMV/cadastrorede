<?php
session_start(); // Inicie a sessão se não estiver iniciada
include "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os dados foram enviados por POST

    // Verifique e insira as matrículas não nulas no banco de dados
    $stmt = $conn->prepare("INSERT INTO wifi (Matricula) VALUES (?)");

    // Atribuir cada matrícula a uma variável separada
    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : null;

    // Inserir as matrículas no banco de dados
    // Verifique se a matrícula é não nula antes de inseri-la
    if ($matricula) {
        $stmt->bind_param("s", $matricula);
        $stmt->execute();
    }
    // Feche a instrução preparada
    $stmt->close();

    // Feche a conexão com o banco de dados
    $conn->close();

    // Redirecione de volta para a página anterior com uma mensagem de sucesso
    header("Location: home.php?mensagem=Matr%C3%ADculas%20adicionadas%20com%20sucesso");
    exit();
} else {
    // Se alguém tentar acessar este script diretamente sem enviar os dados via POST, redirecione para a página anterior com uma mensagem de erro
    header("Location: home.php?error=Erro%20no%20envio%20de%20dados");
    exit();
}
?>
