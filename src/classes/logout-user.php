<?php
// Inicia a sessão
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona o usuário de volta para a página de login
header("Location: ../../includes/login.php");
exit;
