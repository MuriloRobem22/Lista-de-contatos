<?php 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_contato.php");
    exit;
}
?>