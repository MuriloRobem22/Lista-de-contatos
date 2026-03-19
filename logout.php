<?php
session_start();
session_unset();        // limpa todas as variáveis da sessão
session_destroy();      // destrói a sessão

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redireciona para login
header("Location: login_contato.php");

exit;
?>
