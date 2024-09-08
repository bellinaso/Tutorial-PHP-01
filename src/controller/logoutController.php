<!-- A logoutController muito provavelmente vai se manter neste padrão na maioria dos códigos. -->
<?php
    @session_start();

    // Na linha abaixo, a função remove todas as variáveis de sessão que existem.
    unset($_SESSION['login']);

    // IMPORTANTE: Neste caso, não usamos session_destroy() pois esta função destrói todas as sessões e nós só queremos destruir a sessão de login.
    // session_destroy();

    // Por fim, o usuário é redirecionado novamente para a página inicial.
    header('location:\index.php');
?>