<?php
    @session_start();

    // A seguir iremos simular o nosso banco de dados.
    // Para isso, precisamos, primeiramente, verificar se já não há uma sessão da qual estamos tentando criar.
    if (!isset($_SESSION['users'])) {

        // Caso a sessão users não exista, será criada no seguinte trecho de código.
        $_SESSION['users'] = array(
            // Esta sessão será composta por uma array associativa, onde a $key será a mesma coisa que o id do usuário, enquanto o $value será outra array associativa, onde finalmente o $key será a "coluna" do nosso banco e o $value a linha com os valores.
            1 => array(
                'name' => 'Fulano da Silva',
                'username' => 'fulanods',
                'password' => 'senha123',
                'email' => 'fulano@gmail.com',
                'telefone' => '+55 11 91234-5678'
            ),
            2 => array(
                'name' => 'Ciclano Souza',
                'username' => 'ciclanos',
                'password' => '1234abcd',
                'email' => 'ciclaninho002@hotmail.com',
                'telefone' => '+55 21 98765-4321'
            ),
            3 => array(
                'name' => 'Beltrano Mendes',
                'username' => 'beltranom',
                'password' => 'segredinho',
                'email' => 'beltrano@boezio.com',
                'telefone' => '+55 31 99876-5432'
            ),
            4 => array(
                'name' => 'Moicano Pereira',
                'username' => 'moicanop',
                'password' => 'm0ican0#',
                'email' => 'moicano@gmail.com',
                'telefone' => '+55 41 93456-7890'
            )
        );
    }
?>
