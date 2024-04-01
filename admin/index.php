<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>

    <!-- Inclua os arquivos do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Estilos CSS incorporados -->
    <style>
        body {
            background-color: #f8f9fa;
            /* Cinza claro */
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            /* Cinza escuro */
            color: #fff;
            /* Branco */
            font-size: 24px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 16px;
        }

        input.form-control {
            border-radius: 20px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            /* Azul */
            border-color: #007bff;
            /* Azul */
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Azul mais escuro */
            border-color: #0056b3;
            /* Azul mais escuro */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tela de Login
                    </div>
                    <div class="card-body">
                        <?php
                        // Exibir mensagem de erro, se houver
                        if (isset($_GET['erro'])) {
                            $erro = $_GET['erro'];
                            echo '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
                        }
                        ?>
                        <form action="Clogin.php" method="post">
                            <div class="form-group">
                                <label for="username">Usuário:</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclua os scripts do Bootstrap no final do body para melhor desempenho -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>