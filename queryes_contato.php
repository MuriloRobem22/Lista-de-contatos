<?php

//Criação de contato    
if (array_key_exists('nome', $_POST) &&  $_POST['nome'] != '') {

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$stmt = mysqli_prepare($conexao, "INSERT INTO lista_contato(nome, telefone, email) VALUES(?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sss", $nome, $telefone, $email);

if (mysqli_stmt_execute($stmt)) {
    header("Location: temp.php");
    echo "<script>alert('Contato excluído com sucesso!');</script>";
} else {
    echo "erro: ".mysqli_error($conexao);
}

mysqli_stmt_close($stmt);


}


//Remoção de contato
if (array_key_exists('excluir', $_GET) && $_GET['excluir'] != '') {

    $id = $_GET['excluir'];

    // Preparar a query com placeholder
    $stmt = mysqli_prepare($conexao, "DELETE FROM lista_contato WHERE id = ?");

    // Associar o parâmetro (i = inteiro)
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Executar
    if (mysqli_stmt_execute($stmt)) {
        header("Location: temp.php");
        echo "Registro apagado!";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    // Fechar o statement
    mysqli_stmt_close($stmt);
}


    //Procura contato
    $procura = "";
    if (array_key_exists('procura', $_GET) &&  $_GET['procura'] != '') {
        $procura = "%" . $_GET['procura'] . "%";
        
        $stmt = mysqli_prepare($conexao, "SELECT * FROM lista_contato
        WHERE nome LIKE ?
        OR telefone LIKE ?
        OR email LIKE ?");

        mysqli_stmt_bind_param($stmt, "sss", $procura, $procura, $procura);

        mysqli_stmt_execute($stmt);
        
        $resultado = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

    } else {
        $resultado = mysqli_query($conexao, "SELECT * FROM lista_contato");
    }

?>