# Documentação dos Arquivos PHP de Login e Cadastro

## Introdução

Este conjunto de arquivos PHP foi desenvolvido para fornecer uma interface de login e cadastro para um sistema web, com integração a um banco de dados MySQL para armazenar informações de usuários.

### Usuário Padrão

1. **Login de Usuário**: Permite que usuários existentes acessem o sistema fornecendo sua matrícula e senha.
   
2. **Cadastro de Usuário**: Permite que novos usuários se registrem no sistema fornecendo sua matrícula, senha, nome completo e aceitando os termos de uso do WiFi.

### Admin

1. **Login de Administrador**: Permite que administradores acessem o painel administrativo do sistema fornecendo suas credenciais.
   
2. **Gerenciamento de Usuários**: Permite que os administradores visualizem, adicionem, atualizem e removam usuários do sistema.


## Requisitos

- Um servidor web local configurado com suporte a PHP.
- Acesso à internet para baixar os arquivos de estilo Bootstrap e a biblioteca jQuery, que são necessários para a interface.
- Um servidor MySQL configurado e acessível para armazenar os dados dos usuários.

## Utilização

1. **Configuração do Ambiente**: Certifique-se de ter um ambiente de desenvolvimento PHP configurado corretamente em sua máquina.

2. **Configuração do Banco de Dados**: Configure um banco de dados MySQL com o esquema na tabela fornecida.

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

Esta página é a tela de login do sistema.

#### Funcionalidades:

1. **Login de Usuário**: Permite que os usuários se autentiquem no sistema fornecendo sua matrícula e senha.

2. **Cadastro de Novo Usuário**: Permite que novos usuários se cadastrem no sistema fornecendo sua matrícula, senha e nome completo.

3. **Exibição de Mensagens**: Exibe mensagens de sucesso ou erro após ações como login ou cadastro.

#### Estilos CSS Incorporados:

1. Define o estilo visual da página, incluindo cores, fontes e layout.

2. Usa gradientes de cores para fundos e sombras para elementos como caixas de login.

#### Scripts JavaScript Incorporados:

1. `abrirModal()`: Abre um modal com a política de uso do WiFi e solicitação de consentimento para tratamento de dados.

2. `aceitarTermos()`: Aceita os termos da política de uso do WiFi e redireciona para o script `Cuser.php` para cadastro do novo usuário.

#### Modal de Política de Uso do WiFi:

1. Apresenta os termos de uso do WiFi e solicita consentimento para tratamento de dados pessoais.

2. Contém um botão "Aceitar" que fica habilitado somente quando o usuário rola até o final do conteúdo do modal.

#### Bibliotecas Externas:

1. jQuery (ajax.googleapis.com): Biblioteca JavaScript para manipulação do DOM e interações assíncronas.

2. Bootstrap (stackpath.bootstrapcdn.com): Framework CSS para estilização de elementos HTML e responsividade.

#### Observações:

- A página solicita matrícula e senha para o login.
  
- Para o cadastro de novo usuário, são solicitados nome completo, matrícula, senha e confirmação de senha.

- Os campos são marcados como obrigatórios (`required`) para garantir o preenchimento adequado.


### `Clogin.php`

Este arquivo é responsável pelo processo de autenticação de usuários. Quando um usuário envia o formulário de login, este arquivo verifica as credenciais fornecidas (matrícula e senha) em relação aos dados armazenados no banco de dados. Se as credenciais forem válidas, o usuário é autorizado a utilizar o WiFi. Caso contrário, uma mensagem de erro é exibida na página de login.

### `Cuser.php`

Este arquivo é responsável pelo processo de cadastro de novos usuários. Quando um usuário envia o formulário de cadastro, este arquivo verifica se a matrícula fornecida já existe no banco de dados. Se a matrícula já existir, os dados do usuário são atualizados no banco de dados. Após o cadastro ou atualização bem-sucedidos, o usuário é redirecionado de volta para a página inicial do sistema com uma mensagem de sucesso.

## Arquivos de Administração

### `admin/Clogin.php`

Este arquivo é responsável pelo processo de autenticação de administradores. Quando um administrador envia o formulário de login, este arquivo verifica as credenciais fornecidas em relação aos dados armazenados no banco de dados. Se as credenciais forem válidas, o administrador é autorizado a acessar o painel administrativo do sistema. Caso contrário, uma mensagem de erro é exibida na página de login.


### `admin/Cmat.php`

Este arquivo é responsável pela manipulação de materiais no sistema. Ele permite que os administradores visualizem, adicionem, atualizem e removam materiais do sistema.

### `admin/Cuser.php`

Este arquivo é responsável pelo processo de atualização de dados de usuários no sistema. Quando um administrador envia o formulário de atualização de usuário, este arquivo verifica se já existe um usuário com a mesma matrícula no banco de dados. Se o usuário já existir, os dados do usuário são atualizados com as novas informações fornecidas (nome e senha). Após a atualização bem-sucedida, o administrador é redirecionado de volta para a página de administração do sistema com uma mensagem de sucesso. Caso contrário, uma mensagem de erro é exibida na página.


### `admin/Duser.php`

Este arquivo é responsável pelo processo de exclusão de usuários do sistema. Quando um administrador acessa este arquivo com uma matrícula específica definida na URL, a matrícula correspondente é removida do banco de dados. Após a exclusão bem-sucedida, o administrador é redirecionado de volta para a página de administração do sistema com uma mensagem de sucesso. Se ocorrer algum erro durante o processo de exclusão, uma mensagem de erro é exibida na página.


### `admin/home.php`

Esta página é o painel de controle do administrador, onde é possível visualizar e gerenciar os usuários do sistema.

#### Funcionalidades Principais:

1. **Listagem de Usuários**: Exibe uma tabela com as matrículas e nomes dos usuários cadastrados no sistema.
   
2. **Adicionar Matrículas**: Permite ao administrador adicionar novas matrículas ao sistema.

3. **Editar Usuários**: Ao clicar no botão de edição ao lado de cada usuário, é possível editar suas informações.

4. **Excluir Usuários**: Ao clicar no botão de exclusão ao lado de cada usuário, é possível excluí-lo do sistema.

#### Estilos CSS Incorporados:

1. `body`: Define o fundo da página como cinza claro.
   
2. `.container`: Centraliza o conteúdo da página verticalmente.
   
3. `.card`: Adiciona uma sombra à caixa de controle de usuários.
   
4. `.card-header`: Define o estilo do cabeçalho da caixa de controle de usuários.

#### Scripts JavaScript do Bootstrap e jQuery:

1. `jquery-3.6.0.min.js`: Fornece funcionalidades básicas do jQuery para manipulação do DOM.
   
2. `bootstrap.bundle.min.js`: Fornece funcionalidades avançadas do Bootstrap, como modais e dropdowns.

#### Biblioteca DataTables:

1. `jquery.dataTables.min.js`: Fornece funcionalidades avançadas para a tabela de listagem de usuários, como ordenação e paginação.
   
2. `dataTables.bootstrap4.min.js`: Integração do DataTables com o Bootstrap 4 para estilos adequados.

#### Funções JavaScript Personalizadas:

1. **Verificar Senhas**: Ao enviar o formulário de edição de usuário, esta função verifica se as senhas fornecidas coincidem antes de enviar o formulário.

2. **Confirmar Exclusão**: Ao clicar no botão de exclusão ao lado de cada usuário, esta função exibe uma mensagem de confirmação antes de excluir o usuário.

3. **Preencher Modal de Edição**: Ao clicar no botão de edição ao lado de cada usuário, esta função preenche o modal de edição com as informações do usuário selecionado.

#### Modal de Edição:

1. Permite editar o nome, matrícula e senha do usuário selecionado.

2. Possui campos de senha e repetição de senha com validação para garantir que as senhas coincidam.

3. Botões para fechar o modal e salvar as alterações realizadas.



### `index.php`

Esta página é a tela de login do sistema, onde os usuários podem inserir suas credenciais para acessar o sistema.

#### Funcionalidades Principais:

1. **Formulário de Login**: Permite que os usuários insiram sua matrícula e senha para acessar o sistema.

2. **Exibição de Mensagens de Erro**: Exibe mensagens de erro caso ocorram problemas durante o processo de login.

#### Estilos CSS Incorporados:

1. `body`: Define o fundo da página como cinza claro.
   
2. `.container`: Centraliza o conteúdo da página verticalmente.
   
3. `.card`: Adiciona uma sombra à caixa do formulário de login.
   
4. `.card-header`: Define o estilo do cabeçalho da caixa do formulário.
   
5. `.form-group`: Define o espaçamento entre os campos do formulário.
   
6. `label`: Define o estilo das etiquetas dos campos do formulário.
   
7. `input.form-control`: Define o estilo dos campos de entrada do formulário.
   
8. `.btn-primary`: Define o estilo do botão de login.

#### Scripts JavaScript do Bootstrap:

1. `jquery-3.3.1.slim.min.js`: Fornece funcionalidades básicas do jQuery para manipulação do DOM.
   
2. `popper.min.js`: Biblioteca para manipulação de elementos popper.
   
3. `bootstrap.min.js`: Fornece funcionalidades avançadas do Bootstrap, como modais e dropdowns.


## Autor

Este projeto foi desenvolvido por Gabriel Monteiro da Equipe de TI do hospital metre vitalino.
