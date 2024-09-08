<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial PHP</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <!--
    Este tutorial de PHP foi desenvolvido por Bruno Bellinaso Brasil com o objetivo de ajudar os colegas a entender melhor o desenvolvimento backend com PHP. O conteúdo aqui presente busca explicar de forma clara e direta os principais conceitos e trechos de código abordados em aula, facilitando o aprendizado e o entendimento das ferramentas e funcionalidades utilizadas no desenvolvimento web.

    A seguir, trabalharemos com um exemplo prático de um sistema de login e registro de usuários, utilizando sessões e cookies para gerenciar o estado de autenticação dos usuários. O tutorial vai guiar você passo a passo pela lógica necessária para criar um sistema seguro e funcional, abordando a implementação das principais funções de login, registro e armazenamento de dados.

    A ideia é proporcionar um guia prático que desmistifique o uso do PHP, fornecendo exemplos e explicações detalhadas para cada parte do código. Espero que este material seja útil para complementar os estudos e ajudar no domínio dessa poderosa linguagem de programação backend.
    -->

    <?php
        // O session_start() deve ser usado em todas as páginas que forem utilizar alguma sessão.
        // O @, como na linha seguinte, indica que o PHP ira ignorar qualquer erro proveniente da linha onde foi inserido.
        @session_start();


        // A seguinte linha de código nem sempre será utilizado, neste tutorial vou utilizar para simular um banco de dados com usuários e senhas, afim de poder registrar novas inserções.
        // O comando require_once executa o código do arquivo que lhe foi apontado, toda vez que o site é carregado.
        // Neste caso, o código do arquivo é executado e "cria" um banco de dados caso não exista.
        // Que tal entrar no código para entender melhor este "banco simulado"?
        require_once './src/controller/sessionStartController.php';


        // A seguir utilizamos uma condição para verificar se a sessão de login já existe.
        // A função isset() como propriamente o nome diz "está (is) definido (set)" verifica se o parâmetro indicado está definido.
        // Utilizamos como parâmetro para isso, a sessão login.
        if(isset($_SESSION['login'])) {
            // Caso as sessão login exista, será carregado para o usuário um botão de logout
            echo '
                <a href="./src/controller/logoutController.php">Logout</a>
                ';
        }
        else {
            // Caso contrário, se a sessão login não existir, serão carregados botões de login/registro
            echo '
                <a href="login.php">Entrar</a>
                <a href="register.php">Registrar</a>
                ';
        }
        // Note que no href do botão de logout, ancoramos uma controller, ao invés de uma página da view. Isso se dá pelo fato de que para destruir a sessão do usuário, precisamos apenas de um pequeno código, e não uma página inteira.
        // Para mais detalhes do logout, entre no código.
    ?>
    <!-- Na linha seguinte, fora da tag PHP, colocamos uma página que só pode ser acessada se existir um login, tente apertar o botão. -->
    <!-- Você deve ter percebido que é redirecionado para a página de login, isso é uma medida de segurança que devemos tomar para páginas ou funcionalidades que só podem ser acessadas após o login, como por exemplo os curtir um vídeo no youtube, que você não pode sem ter entrado na sua conta antes. -->
    <!-- No código da página, você pode obter mais detalhes sobre. -->
    <a href="secrets.php">TOP SECRETS</a>




    
    <footer>
        <?php
            echo '<table>';
            echo '<tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Telefone</th>
                </tr>';

            foreach($_SESSION['users'] as $key => $value) {
                echo '<tr>';
                echo '<th>'.$key.'</th>';
                echo '<td>'.$value['name'].'</td>';
                echo '<td>'.$value['username'].'</td>';
                echo '<td>'.$value['email'].'</td>';
                echo '<td>'.$value['password'].'</td>';
                echo '<td>'.$value['telefone'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
    </footer>
</body>
</html>