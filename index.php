<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        // Redireciona para a página de login
        header("Location: includes/login.php");
        exit; 
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações</title>

    <?php include 'includes/header.php'?>
</head>
<body>

    

    <!-- Conteúdo da página -->

</body>
</html>