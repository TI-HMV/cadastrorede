# Documentação dos Arquivos PHP de Login e Cadastro

## Introdução

Este conjunto de arquivos PHP foi desenvolvido para fornecer uma interface de login e cadastro para um sistema web, com integração a um banco de dados MySQL para armazenar informações de usuários.

## Funcionalidades Principais

1. **Login de Usuário**: Permite que usuários existentes acessem o sistema fornecendo sua matrícula e senha.
   
2. **Cadastro de Usuário**: Permite que novos usuários se registrem no sistema fornecendo sua matrícula, senha, nome completo e aceitando os termos de uso do WiFi.

## Requisitos

- Um servidor web local configurado com suporte a PHP.
- Acesso à internet para baixar os arquivos de estilo Bootstrap e a biblioteca jQuery, que são necessários para a interface.
- Um servidor MySQL configurado e acessível para armazenar os dados dos usuários.

## Utilização

1. **Configuração do Ambiente**: Certifique-se de ter um ambiente de desenvolvimento PHP configurado corretamente em sua máquina.

2. **Configuração do Banco de Dados**: Configure um banco de dados MySQL e importe o esquema fornecido no arquivo `database.sql`.

3. **Baixar Dependências**: Certifique-se de ter acesso à internet para baixar os arquivos de estilo Bootstrap e a biblioteca jQuery. Você pode acessar os links fornecidos no cabeçalho do arquivo HTML para garantir a disponibilidade desses recursos.

4. **Configuração de Conexão com o Banco de Dados**: No arquivo `config/config.php`, atualize as configurações de conexão com o banco de dados MySQL de acordo com as credenciais do seu ambiente.

5. **Executar o Servidor Local**: Inicie o servidor web local em sua máquina.

6. **Acesso à Página**: Abra o arquivo `index.php` no navegador da web digitando o caminho para o arquivo no servidor local.

7. **Interagir com os Formulários**: Teste as funcionalidades dos formulários de login e cadastro, fornecendo as informações necessárias e observando as mensagens de sucesso ou erro exibidas.

## Estrutura do Banco de Dados

O banco de dados MySQL utilizado neste projeto possui as seguintes tabelas:

### Tabela `wifi`

Esta tabela armazena os dados dos usuários cadastrados no sistema.

| Campo     | Tipo       | Descrição                                   |
| --------- | ---------- | ------------------------------------------- |
| `Matricula` | VARCHAR(20) | Chave primária. Matrícula do usuário.    |
| `Senha`     | VARCHAR(250)| Senha do usuário (hash).                  |
| `Nome`      | VARCHAR(450)| Nome completo do usuário.                 |

## Explicação das Funções nos Arquivos

### `index.php`

Este arquivo é a página inicial do sistema. Ele contém a interface de login e cadastro, bem como a lógica para exibir mensagens de sucesso ou erro após o envio dos formulários.

#### Funções JavaScript:

1. **`abrirModal()`**: Esta função é chamada quando o formulário de cadastro é submetido. Ela abre um modal que exibe os termos de uso do WiFi e solicita o consentimento do usuário para o tratamento de seus dados pessoais. Além disso, verifica se o usuário já está no final do conteúdo do modal e habilita o botão "Aceitar" apenas se estiver no final.

2. **`aceitarTermos()`**: Esta função é chamada quando o usuário aceita os termos de uso do WiFi no modal. Ela obtém os valores dos campos do formulário de cadastro (nome, matrícula e senha), constrói uma URL com esses valores e redireciona o usuário para o arquivo `Cuser.php` com os parâmetros necessários na URL.

### `Clogin.php`

Este arquivo é responsável pelo processo de autenticação de usuários. Quando um usuário envia o formulário de login, este arquivo verifica as credenciais fornecidas (matrícula e senha) em relação aos dados armazenados no banco de dados. Se as credenciais forem válidas, o usuário é redirecionado para a página inicial do sistema. Caso contrário, uma mensagem de erro é exibida na página de login.

### `Cuser.php`

Este arquivo é responsável pelo processo de cadastro de novos usuários. Quando um usuário envia o formulário de cadastro, este arquivo verifica se a matrícula fornecida já existe no banco de dados. Se a matrícula não existir, os dados do novo usuário (matrícula, senha e nome completo) são inseridos no banco de dados. Se a matrícula já existir, os dados do usuário são atualizados no banco de dados. Após o cadastro ou atualização bem-sucedidos, o usuário é redirecionado de volta para a página inicial do sistema com uma mensagem de sucesso.

## Personalização

Estes arquivos PHP podem ser personalizados de acordo com as necessidades do seu projeto. Você pode modificar o código para adicionar validações adicionais, integração com um banco de dados específico, entre outras funcionalidades.

## Contribuição

Contribuições são bem-vindas! Se você encontrar algum problema, tiver sugestões de melhorias ou quiser adicionar novos recursos, sinta-se à vontade para criar um problema ou enviar uma solicitação de recebimento (PR) neste repositório.

## Autor

Este arquivo foi desenvolvido por [Seu Nome]. Você pode entrar em contato comigo em [seuemail@example.com] para mais informações ou suporte.

## Licença

Este projeto está licenciado sob a [Licença XYZ]. Consulte o arquivo LICENSE para obter mais informações.
