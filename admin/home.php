<?php
session_start();
include "../config/config.php";

if (!isset($_SESSION['nome'])) {
    // Usuário não está logado, redirecionar para a página de login
    header("Location: index.php");
    exit(); // Certifique-se de sair após redirecionar
}

if (isset($_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
    unset($_SESSION['mensagem']);
} elseif (isset($_GET['error'])) {
    $erro = $_GET['error'];
    unset($_SESSION['error']);
}

// Consulta ao banco de dados para obter matrícula e nome
$sql = "SELECT matricula, nome FROM wifi WHERE matricula != 0";
$result = $conn->query($sql);

// Array para armazenar os resultados da consulta
$matriculas = [];

// Verificar se há resultados da consulta
if ($result->num_rows > 0) {
    // Loop através dos resultados e armazenar em $matriculas
    while ($row = $result->fetch_assoc()) {
        $matriculas[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Matrículas</title>
    <!-- Inclua os arquivos do Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Inclua a biblioteca Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        .table-responsive {
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: auto;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .matricula-input {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .matricula-input label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .matricula-input input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .add-button {
            text-align: center;
        }

        .add-button button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .add-button button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Controle de usuários</h2>
                <form action="Cmat.php" method="POST" class="form-group">
                    <label for="q">Adicionar matriculas:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="matricula" name="matricula">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>
                <!-- Mensagem de atualização -->
                <?php if (isset($mensagem)) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $mensagem; ?>
                    </div>
                <?php elseif (isset($erro)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $erro; ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="matriculas-table" class="display table">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($matriculas as $matricula) : ?>
                                <tr>
                                    <td><?php echo $matricula['matricula']; ?></td>
                                    <td><?php echo $matricula['nome']; ?></td>
                                    <td><!-- Ícones de edição e exclusão -->
                                        <a href='#' class='btn btn-warning btn-sm edit-btn' data-toggle="modal" data-target="#editModal" data-matricula="<?php echo $matricula['matricula']; ?>" data-nome="<?php echo $matricula['nome']; ?>">
                                            <i class='fas fa-pencil-alt'></i>
                                        </a>
                                        <a href='Duser.php?matricula=<?php echo $matricula['matricula']; ?>' class='btn btn-danger btn-sm delete-btn' data-matricula='<?php echo $matricula['matricula']; ?>'>
                                            <i class='fas fa-times'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edição -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="Cuser.php" method="POST">
                    <div class="modal-body">
                        <!-- Campos de edição -->
                        <div class="form-group">
                            <label for="editNome">Nome:</label>
                            <input type="text" class="form-control" id="editNome" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="editMatricula">Matricula:</label>
                            <input type="text" class="form-control" id="editMatricula" name="matricula">
                        </div>
                        <div class="form-group">
                            <label for="editSenha">Senha:</label>
                            <input type="password" class="form-control" id="editSenha" name="senha">
                        </div>
                        <div class="form-group">
                            <label for="editSenha1">Repetir senha:</label>
                            <input type="password" class="form-control" id="editSenha1" name="senha_repetida">
                            <span id="senhaError" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Botões de ação -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 4 Integration -->
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Função para verificar se as senhas são iguais antes de enviar o formulário
            $('#editForm').submit(function(event) {
                var senha = $('#editSenha').val();
                var senhaRepetida = $('#editSenha1').val();
                if (senha !== senhaRepetida) {
                    // Senhas não são iguais, mostrar mensagem de erro e impedir o envio do formulário
                    $('#senhaError').text("As senhas não coincidem.");
                    event.preventDefault();
                }
            });
        });
        $(document).ready(function() {
            $('#matriculas-table').DataTable();
        });

        // Função para confirmar exclusão
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var matricula = $(this).data('matricula');
            if (confirm("Tem certeza que deseja excluir a matrícula " + matricula + "?")) {
                window.location.href = $(this).attr('href');
            }
        });

        // Preencher o modal com os dados do usuário selecionado
        $('.edit-btn').click(function() {
            var matricula = $(this).data('matricula');
            var nome = $(this).data('nome');
            $('#editMatricula').val(matricula);
            $('#editNome').val(nome);
        });
    </script>

</body>

</html>