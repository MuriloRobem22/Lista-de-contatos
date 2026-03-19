<?php


if (array_key_exists('email', $_POST) &&  $_POST['email'] != '') {

   $email = $_POST['email'];
   $senha = $_POST['password'];
   
   $stmt = mysqli_prepare($conexao, 'SELECT id, senha FROM usuarios WHERE email = ?');
   mysqli_stmt_bind_param($stmt, "s", $email);
   mysqli_stmt_execute($stmt);
   $resultado = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultado)) {
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario_id'] = $row['id'];
            header("Location: temp.php");
            exit;
        } else {
            
            echo "<script>alert('Senha incorreta')</script>";
        }
    } else {
        echo "<script>alert('Usuario não encontrado')</script>";
    }
}
?>