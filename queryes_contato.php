<?php

//Criação de contato    
if (array_key_exists('nome', $_POST) &&  $_POST['nome'] != '') {

$usuario_id = $_SESSION['usuario_id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$stmt = mysqli_prepare($conexao, "INSERT INTO lista_contato(nome, telefone, email, usuario_id) VALUES(?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sssi", $nome, $telefone, $email, $usuario_id);

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

    $usuario_id = $_SESSION['usuario_id'];
    $id = $_GET['excluir'];

    // Preparar a query com placeholder
    $stmt = mysqli_prepare($conexao, "DELETE FROM lista_contato WHERE id = ? AND usuario_id = ?");

    // Associar o parâmetro (i = inteiro)
    mysqli_stmt_bind_param($stmt, "ii", $id, $usuario_id);

    // Executar
    if (mysqli_stmt_execute($stmt)) {
        header("Location: temp.php");
        echo "<script>alert('Registro apagado!')</script>";
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    // Fechar o statement
    mysqli_stmt_close($stmt);
}


    //Procura e lista contato
    $procura = "";
  
    if (array_key_exists('procura', $_GET) &&  $_GET['procura'] != '') {
        $procura = "%" . $_GET['procura'] . "%";

        $usuario_id = $_SESSION['usuario_id'];
        
        $stmt = mysqli_prepare($conexao, "SELECT * FROM lista_contato
        WHERE (nome LIKE ?
        OR telefone LIKE ?
        OR email LIKE ?) AND usuario_id = ?");

        mysqli_stmt_bind_param($stmt, "sssi", $procura, $procura, $procura, $usuario_id);

        mysqli_stmt_execute($stmt);
        
        $resultado = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

    } else {

        $usuario_id = $_SESSION['usuario_id'];

        $stmt = mysqli_prepare($conexao, "SELECT * FROM lista_contato WHERE usuario_id = ?");

        mysqli_stmt_bind_param($stmt, "i", $usuario_id);

        mysqli_stmt_execute($stmt);
        
        $resultado = mysqli_stmt_get_result($stmt);
        

        mysqli_stmt_close($stmt);

    }

?>