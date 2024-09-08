<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        @session_start();
        if(isset($_SESSION['login'])) {
            // Caso a sessão login exista neste caso, apenas por "segurança", iremos redirecionar o usuário para a index (Ele não deve conseguir entrar na página de login se já houver um login).
            header('location:\index.php');
        }

        if(isset($_REQUEST)) {
            // Como definimos na loginController, se os dados forem inválidos deverá ser mostrado para o usuário uma mensagem de erro. Neste caso, informamos que o login está incorreto.
            if(@$_REQUEST['cod'] == 400) {
                echo '<p>Usuário ou senha inválidos.</p>';
            }
        }

        $login_value = '';
        // Verifica se há um cookie de login salvo
        if (isset($_COOKIE['login_cookie'])) {
            $login_value = $_COOKIE['login_cookie'];
        }
    ?>
    <a href="/index.php">Voltar</a>
    <!-- Abaixo criamos apenas um formulário padrão para login do usuário. -->
    <!-- Observação importante: o action do formulário noralmente direciona o usuário para uma loginController. Porque não vamos dar uma olhada? -->
    <form action="/src/controller/loginController.php" method="post">

        <label for="login">Nome de usuário ou E-mail</label>
        <input type="text" name="login" id="login" placeholder="Digite aqui..." value="<?php echo htmlspecialchars($login_value); ?>">
        
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite aqui...">

        <label for="remember">
            <input type="checkbox" name="remember" id="remember">
            Lembrar-me
        </label>

        <button type="submit">Enviar</button>
    </form>





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