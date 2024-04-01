<?php

if (isset($_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
    unset($_SESSION['mensagem']);
} elseif (isset($_GET['error'])) {
    $erro = $_GET['error'];
    unset($_SESSION['error']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wifi</title>
    <!-- Inclua os arquivos do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            color: #6a6f8c;
            background: linear-gradient(135deg, #4a90e2, #6ce268);
            font: 600 16px/18px 'Open Sans', sans-serif;
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: table
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .login-wrap {
            width: 100%;
            margin: auto;
            max-width: 525px;
            min-height: 670px;
            position: relative;
            background: linear-gradient(5deg, #4a90e2, #6ce268);
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
        }

        .login-html {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background: rgba(40, 57, 101, .9);
        }

        .login-html .sign-in-htm,
        .login-html .sign-up-htm {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear;
        }

        .login-html .sign-in,
        .login-html .sign-up,
        .login-form .group .check {
            display: none;
        }

        .login-html .tab,
        .login-form .group .label,
        .login-form .group .button {
            text-transform: uppercase;
        }

        .login-html .tab {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
        }

        .login-html .sign-in:checked+.tab,
        .login-html .sign-up:checked+.tab {
            color: #fff;
            border-color: #1161ee;
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            -webkit-text-security: circle;
        }

        .login-form .group .label {
            color: #aaa;
            font-size: 12px;
        }

        .login-form .group .button {
            background: #1161ee;
        }

        .login-form .group label .icon {
            width: 15px;
            height: 15px;
            border-radius: 2px;
            position: relative;
            display: inline-block;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group label .icon:before,
        .login-form .group label .icon:after {
            content: '';
            width: 10px;
            height: 2px;
            background: #fff;
            position: absolute;
            transition: all .2s ease-in-out 0s;
        }

        .login-form .group label .icon:before {
            left: 3px;
            width: 5px;
            bottom: 6px;
            transform: scale(0) rotate(0);
        }

        .login-form .group label .icon:after {
            top: 6px;
            right: 0;
            transform: scale(0) rotate(0);
        }

        .login-form .group .check:checked+label {
            color: #fff;
        }

        .login-form .group .check:checked+label .icon {
            background: #1161ee;
        }

        .login-form .group .check:checked+label .icon:before {
            transform: scale(1) rotate(45deg);
        }

        .login-form .group .check:checked+label .icon:after {
            transform: scale(1) rotate(-45deg);
        }

        .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
            transform: rotate(0);
        }

        .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
            transform: rotate(0);
        }

        .hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, .2);
        }

        .foot-lnk {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
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
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Cadastrar</label>
            <div class="login-form">
                <form class="sign-in-htm" action="Clogin.php" method="post">
                    <div class="group">
                        <label for="login" class="label">Matrícula</label>
                        <input id="login" name="login" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Senha</label>
                        <input id="pass" name="senha" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Entrar" required>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a>&copy; TIHMV</a>
                    </div>
                </form>
                <form class="sign-up-htm" action="Cuser.php" method="post" onsubmit="return abrirModal();">
                    <div class="group">
                        <label for="matricula" class="label">Matrícula</label>
                        <input id="matricula" name="matricula" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <label for="senha" class="label">Senha</label>
                        <input id="senha" name="senha" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <label for="senha_repetida" class="label">Repita a senha</label>
                        <input id="senha_repetida" name="senha_repetida" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <label for="nome" class="label">Nome completo</label>
                        <input id="nome" name="nome" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Cadastrar" required>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a>&copy; TIHMV</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Política de Uso do WiFi e Consentimento para Tratamento de Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="termsBody">
                    <h4>Termos de Uso do WiFi e Consentimento para Tratamento de Dados</h4>
                    <p>Ao conectar-se à rede WiFi do Hospital Mestre Vitalino, você concorda com os seguintes termos de uso e políticas de privacidade:</p>
                    <h5>Coleta e Tratamento de Dados Pessoais:</h5>
                    <p>Para utilizar nossa rede WiFi, precisamos coletar e processar alguns dados pessoais, incluindo nome, dispositivo conectado e atividades de navegação. Essas informações serão tratadas de acordo com as disposições da Lei Geral de Proteção de Dados (LGPD) e utilizadas apenas para fins internos da empresa, incluindo a melhoria da qualidade da rede e a segurança da informação.</p>
                    <h5>Finalidade do Tratamento:</h5>
                    <p>Os dados coletados serão utilizados exclusivamente para garantir a operação adequada da rede WiFi, prevenir atividades fraudulentas, monitorar o desempenho da rede e garantir a segurança cibernética da empresa. Não serão compartilhados com terceiros sem o seu consentimento expresso, exceto quando exigido por lei.</p>
                    <h5>Consentimento do Titular:</h5>
                    <p>Ao aceitar estes termos de uso, você consente explicitamente com o tratamento de seus dados pessoais de acordo com as condições estabelecidas nesta política.</p>
                    <h5>Direitos do Titular dos Dados:</h5>
                    <p>Você tem o direito de acessar, corrigir, atualizar ou solicitar a exclusão de seus dados pessoais a qualquer momento, entrando em contato com setor da TI.</p>
                    <h5>Segurança da Informação:</h5>
                    <p>Comprometemo-nos a adotar medidas técnicas e organizacionais adequadas para proteger seus dados contra acesso não autorizado, uso indevido ou divulgação.</p>
                    <h5>Importância da Confidencialidade e Não Compartilhamento:</h5>
                    <p>É fundamental que você mantenha a confidencialidade de suas credenciais de acesso à rede WiFi e não as compartilhe com terceiros. O compartilhamento de suas informações de login pode resultar em acesso não autorizado à rede, comprometendo a segurança de seus dados e dos dados da empresa.</p>
                    <h5>Sobrecarga de Rede:</h5>
                    <p>O compartilhamento indevido de suas credenciais de acesso à rede WiFi pode resultar em sobrecarga de rede e instabilidade no serviço. Isso pode afetar negativamente todos os usuários conectados à rede, causando lentidão na conexão e interrupções no serviço. Portanto, é importante não compartilhar suas credenciais com terceiros.</p>
                    <p>Ao clicar em "Aceitar", você reconhece que leu e compreendeu esta política de uso do WiFi e concorda com o tratamento de seus dados pessoais conforme descrito acima.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="acceptButton" disabled onclick="aceitarTermos()">Aceitar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    // Função para abrir o modal e verificar a posição do scroll
    function abrirModal() {
        // Abre o modal
        $('#termsModal').modal('show');

        // Verifica se o usuário já está no final do conteúdo do modal ao abri-lo
        var $modalBody = $('#termsModal .modal-body');
        var $acceptButton = $('#acceptButton');

        if ($modalBody.scrollTop() + $modalBody.innerHeight() >= $modalBody[0].scrollHeight) {
            // Habilita o botão "Aceitar" se o usuário estiver no final do conteúdo
            $acceptButton.prop('disabled', false);
        } else {
            // Desabilita o botão "Aceitar" se o usuário não estiver no final do conteúdo
            $acceptButton.prop('disabled', true);
        }

        return false;
    }

    // Função para aceitar os termos e redirecionar para cuser.php
    function aceitarTermos() {
        // Obter os valores dos campos
        var nome = document.getElementById('nome').value;
        var matricula = document.getElementById('matricula').value;
        var senha = document.getElementById('senha').value;

        // Construir a URL com os valores
        var url = "cuser.php?nome=" + encodeURIComponent(nome) + "&matricula=" + encodeURIComponent(matricula) + "&senha=" + encodeURIComponent(senha);

        // Redirecionar para a URL com os valores
        window.location.href = url;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>