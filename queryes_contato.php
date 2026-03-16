<?php

//Criação de contato    
if (array_key_exists('nome', $_POST) &&  $_POST['nome'] != '') {

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "INSERT INTO lista_contato(nome, telefone, email) VALUES('$nome', '$telefone', '$email')";

if (mysqli_query($conexao, $sql)) {
    header("Location: temp.php");
    echo "<script>alert('Contato excluído com sucesso!');</script>";
} else {
    echo "erro: ".mysqli_error($conexao);
}
}


//Remoção de contato
if (array_key_exists('excluir', $_GET) &&  $_GET['excluir'] != ''){

$id = $_GET['excluir'];

$sql = "DELETE FROM lista_contato WHERE id = '$id'";

if (mysqli_query($conexao, $sql)) {
    header("Location: temp.php");
    echo "registro apagado!";
} else {
    echo "erro: ".mysqli_error($conexao);
}

}


    //Procura contato
    $procura = "";
    if (array_key_exists('procura', $_GET) &&  $_GET['procura'] != '') {
        $procura = $_GET['procura'];
        
        $sql = "SELECT * FROM lista_contato
        WHERE nome LIKE '%$procura%'
        OR telefone LIKE '%$procura%'
        OR email LIKE '%$procura%'";

        $resultado = mysqli_query($conexao, $sql);
    } else {
        $resultado = mysqli_query($conexao, "SELECT * FROM lista_contato");
    }

?>