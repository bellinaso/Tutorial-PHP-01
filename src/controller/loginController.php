<?php
    @session_start();

    // Como o login é realizado por meio de um formulário de método POST, utilizaremos a seguinte condição para verifiar se há uma "mensagem" do usuário.
    if($_POST) {

        // Devemos guardas as informações que o usuário entrou afim de compará-las com informações do nosso banco.
        $login = $_POST['login'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']); // Verifica se o checkbox foi marcado


        // Abaxo, como aprendemos até o momento da aula do dia 26/08, guardamos o nosso "banco" em uma variável para que possamos, por meio de um foreach, comparar os dados.
        $users = $_SESSION['users'];

        // $users é apenas a nossa array criada no arquivo sessionStartController.php.
        // $id é o index que os nossos dados estão na array $users
        // $user, por fim, é o resultado da nossa "busca". $user é também uma array, mas que dessa vez possui indexes escritos, indicando cada informação individual.

        // De forma mais simples:
        // $users são todos usuários.
        // $id (ou $key) é o índice associativo do todo para o usuário.
        // $user, por fim novamente, é outro array associativo, que seria como uma linha do nosso banco de dados.
        foreach($users as $id => $user) {
            // Na condição abaixo, verificamos se $login (username/email) é igual ao username e a senha é igual a password
            // ou
            // verificamos se $login é igual ao email e a senha, novamente, igual a password
            if($login == $user['username'] && $password == $user['password']
            || $login == $user['email'] && $password == $user['password']) {

                // Caso alguma condição seja verdadeira, salvamos o email e a senha do usuário em uma sessão chamada login, afim de permitir que o usuário possa entrar, por exemplo, na página Top Secrets.
                $_SESSION['login'] = array($user['email'], $user['password']);

                // Se o usuário marcou "Lembrar-me", cria um cookie para o login.
                if ($remember) {
                    setcookie('login_cookie', $user['username'], time() + (86400 * 30), "/"); // Expira em 30 dias
                }
                // Se não marcou, garante que o cookie será removido (caso já exista).
                else {
                    setcookie('login_cookie', '', time() - 3600, "/");
                }

                break;
            }
        }
        // Caso a requisção seja inválida, retornaremos um erro 400 para o usuário.
        header('location:\login.php?cod=400');
    }
?>