<?php

include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos necessários foram enviados
    if (!isset($_POST['email']) || !isset($_POST['senha'])) {
        echo "error";
        exit;
    }

    // Prepara os dados recebidos do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar se o usuário existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verifica se o usuário existe e se a senha está correta
        if ($user && password_verify($senha, $user['senha'])) {
            // Login bem-sucedido
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            
            // Verificar se o usuário possui informações na tabela informacoes_usuario
            $user_id = $user['id'];
            $sql_info = "SELECT * FROM informacoes_usuario WHERE usuario_id = ?";
            $stmt_info = $conn->prepare($sql_info);
            $stmt_info->bind_param("i", $user_id);
            $stmt_info->execute();
            $result_info = $stmt_info->get_result();
            
            // Verificar se há resultados
            if ($result_info->num_rows == 0) {
                // Não há informações para o usuário, redirecionar para a página de cadastro de informações
                echo "no_info";
            } else {
                // O usuário possui informações, redirecionar para a página principal ou outra página de destino
                echo "success";
            }

            $stmt_info->close();
        } else {
            // E-mail ou senha incorretos
            echo "error";
        }
        $stmt->close();
    } else {
        // Erro ao preparar a consulta
        echo "error";
    }
} else {
    // Se a requisição não for feita via método POST, exibe uma mensagem de erro
    echo "error";
}