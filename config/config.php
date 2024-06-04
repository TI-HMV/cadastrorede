<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "tihmvtri";
$dbname = "wifi";

// Implementado para tratar de erro de conexão quando mode está configurado para MYSQLI_REPORT_STRICT
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (\Throwable $th) {
    die ("Falha na conexão com o banco de dados: " . $th->getMessage());
}
// Conectar ao banco de dados usando utf8mb4

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Configurar a codificação para utf8mb4
$conn->set_charset("utf8mb4");
?>