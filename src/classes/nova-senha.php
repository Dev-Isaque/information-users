<?php

require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados necessários foram recebidos
    if (isset($_POST["email"]) && isset($_POST["novaSenha"])) {
        $email = $_POST["email"];
        $novaSenha = $_POST["novaSenha"];

        // Criptografa a nova senha
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Consulta para atualizar a senha do usuário
        $sql = "UPDATE usuarios SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($stmt) {
            $stmt->bind_param("ss", $senhaHash, $email);
            if ($stmt->execute()) {
                echo "Senha atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar a senha: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conn->error;
        }
    } else {
        echo "Dados incompletos. Por favor, forneça o e-mail e a nova senha.";
    }
} else {
    echo "Invalid request";
}
