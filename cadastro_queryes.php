<?php


if (array_key_exists('nome', $_POST) &&  $_POST['nome'] != '') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha =  password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conexao, 'INSERT INTO usuarios(nome, email, senha) values (?, ?, ?)');

    mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

    
    if(mysqli_stmt_execute($stmt)){
        header("Location: login_contato.php");
    }
    else {
    echo "erro: ".mysqli_error($conexao);
    }






}







?>