<?php

require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["password"];

    $sql_verifica_email = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_verifica_email = $conn->prepare($sql_verifica_email);
    $stmt_verifica_email->bind_param("s", $email);
    $stmt_verifica_email->execute();
    $resultado = $stmt_verifica_email->get_result();

    if ($resultado->num_rows > 0) {
        echo "E-mail já cadastrado. Por favor, escolha outro e-mail.";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sss", $nome, $email, $senha_hash);
            if ($stmt->execute()) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a consulta: " . $conn->error;
        }
    }

    $stmt_verifica_email->close();
} else {
    echo "Esta página espera receber dados via método POST.";
}
