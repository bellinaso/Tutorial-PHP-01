<?php
    // Como foi dito anteriormente, sempre que utilizamos sessão em uma página, devemos iniciá-las.
    @session_start();

    // Se você testou o código, deve ter percebido que foi redirecionado para a página de login, isso se deve ao seguinte trecho de código, que se assemelha e segue o mesmo princípio do código na linha 26 da index.php
    if(!isset($_SESSION['login'])) {
        // A única diferença, é que neste caso, o código ao invés de "printar" na tela do usuário, ele redireciona para a login.
        header('location:\login.php');
    }
?>