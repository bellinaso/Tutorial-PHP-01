<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        @session_start();
        if(isset($_SESSION['login'])) {
            // Da mesma forma que na página loginController, caso a sessão login exista, iremos redirecionar o usuário para a index (Ele não deve conseguir entrar na página de cadastro se já houver um login).
            header('location:\index.php');
        }


        if(isset($_REQUEST)) {
            // Como definimos na registerController, se houver conflio deverá ser mostrado para o usuário uma mensagem de erro. Neste caso, que as informações não estão disponíveis para uso.
            if(@$_REQUEST['cod'] == 409) {
                echo '<p>O email ou username inserido não está disponível para uso.</p>';
            }
            // Caso o email e o username estejam disponíveis, se as senhas não coincidem o usuário pode ter causado algum erro e isso deve ser mostrado para o mesmo.
            else if(@$_REQUEST['cod'] == 401) {
                echo '<p>As senhas não coincidem ou não foram inseridas corretamente!</p>';
            }
        }
    ?>
    <a href="/index.php">Voltar</a>
    <!-- Como na página de login, criamos apenas um formulário padrão para registro do usuário. -->
    <!-- Por que não entender melhor como o usuário será registrado dando uma olhada no arquivo? -->
    <form action="/src/controller/registerController.php" method="post">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="Digite aqui...">

        <label for="username">Nome de usuário</label>
        <input type="text" name="username" id="username" placeholder="Digite aqui...">
        
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite aqui...">
        
        <label for="password_confirm">Confirmar Senha</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Digite aqui...">
        
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite aqui...">
        
        <label for="phone">Telefone</label>
        <input type="tel" name="phone" id="phone" placeholder="Digite aqui...">

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