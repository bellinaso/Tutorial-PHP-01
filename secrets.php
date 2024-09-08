<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página secreta</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        // Utilizaremos o require_once nesta página para garantir que o usuário possui uma sessão. Caso não, será redirecionado para a página de login.
        require_once './src/controller/authenticationController.php';
    ?>
    <a href="http://bit.ly/4e9SPi2">Não clique!</a>
</body>
</html>