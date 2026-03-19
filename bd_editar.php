<?php

include 'bd_contato.php';

// Pega o ID da URL
$id = intval($_GET['id']);

// Busca os dados do contato
$sql = "SELECT * FROM lista_contato WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$contato = mysqli_fetch_assoc($result);

// Se o formulário foi enviado
if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
    $nome     = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email    = $_POST['email'];

    $sql = "UPDATE lista_contato SET nome = ?, telefone = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome, $telefone, $email, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Contato atualizado com sucesso!')</script>";
        // Redireciona de volta para a lista
        header("Location: temp.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Contatos</title>
        <link href="main.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <main>
            <h1>Editar Contato</h1>
            <form class="form_editar" method="post">

                <div>
                    <label>Nome: <input class="" type="text" name="nome" value="<?php echo $contato['nome']; ?>"></label><br>
                    <label>Telefone: <input class="" type="text" name="telefone" value="<?php echo $contato['telefone']; ?>"></label><br>
                    <label>Email: <input class="" type="email" name="email" value="<?php echo $contato['email']; ?>"></label><br>
                </div>

                <input class="btn_salvar" type="submit" value="Salvar Alterações">

            </form>
        </main>
    </body>
</html>



