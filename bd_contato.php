<?php

// conexão com banco de dados
$bdServidor = '127.0.0.1';
$bdUsuario = 'sistema_contato';
$bdSenha = 'Lilo220503$.';
$bdBanco = 'contatos';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);


if (mysqli_connect_errno()) {
    echo 'Problemas para conectar ao banco. Erro: ';
    echo mysqli_connect_error();
    die();

}

?>


