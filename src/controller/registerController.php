<?php
    @session_start();

    if($_POST) {
        
        $users = $_SESSION['users'];
        
        // Da mesma forma que fizemos na página loginController, devemos armazenar as entradas do usuário em variáveis para que possamos tratá-las mais facilmente.


        // Decidi isolar esta variável das outras para explicá-la.
        // No final do código, quando formos salvar os dados do novo usuário, precisaremos, neste caso, indicar a posição que ele será salvo. Pos isso irei salvar o novo id do usuário.
        // Em um banco de dados real, isso nunca será necessário, tendo em vista que o id sempre será auto_increment.
        // Utilizei neste trecho de código a função array_key_last() que, como o próprio nome indica, retorna a última key de uma array.
        // Além disso, somei +1, pois caso contrário iríamos sobrescrever os dados do último usuário.
        $user_id = array_key_last($users) + 1;
        
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];


        foreach($users as $id => $user) {
            // Como o email e o username são formas de login, precisamos confirmar se estão disponíveis.
            if($email == $user['email'] ||
                $username == $user['username']) {
                // Dessa forma, se já houver um usuário com o email ou username inserido, o usuário será redirecionado novamente para a página de cadastro, juntamente a um código que indica erro de conflito.
                header('location:\register.php?cod=409');
                // (O código poderia ser qualquer coisa, como por exemplo "conflito", mas preferi utilizar um código http, que na verdade é apenas um número)
            }
        }
        // É importante também checarmos se o usuário sabe mesmo a senha que ele inseriu e se elas existem.
        // A função empty() verifica se uma variável está vazia.
        // O ! na frente da função verifica "se não". (se não estiver vazia e...)
        if(!empty($password) &&
            !empty($password_confirm) && 
            $password == $password_confirm) {

            // Se chegamos até aqui (email e username disponíveis e senhas coincidem) quer dizer que podemos cadastrar o nosso novo usuário.
            if(!empty($name) &&
            !empty($username) &&
            !empty($email) &&
            !empty($phone)) {
                // Veja que para acessarmos a sessão, desta vez, utilizamos o $_SESSION[] ao invés da variável $users que definimos anteriormente. Isso se dá porque se modificarmos a váriavel $users, estaremos literalmente modificando apenas ela, e não a nossa sessão.
                // Ela é apenas uma cópia da $_SESSION, e não um "ponteiro".
                // Por isso precisamos acessá-la da maneira abaixo.
                $_SESSION['users'][$user_id] = array(

                    'name' => $name,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'telefone' => $phone
                );
                $_SESSION['login'] = array($user['email'], $user['password']);
                header('location:\index.php');
            }
            // Lembrando que a ordem das condições não importa. Poderíamos verificar o !empty() lá no início do código, mas eu preferi manter no final
        }
        else {
            header('location:\register.php?cod=401');
        }
    }
?>