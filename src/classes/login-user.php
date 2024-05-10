<?php

include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos necessários foram enviados
    if (!isset($_POST['email']) || !isset($_POST['senha'])) {
        echo "error";
        exit;
    }

    $email = $_POST["email"];
    $senha = $_POST["senha"];

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

            $user_id = $user['id'];
            $sql_info = "SELECT * FROM informacoes_usuario WHERE usuario_id = ?";
            $stmt_info = $conn->prepare($sql_info);
            $stmt_info->bind_param("i", $user_id);
            $stmt_info->execute();
            $result_info = $stmt_info->get_result();

            if ($result_info->num_rows == 0) {
                echo "no_info";
            } else {
                echo "success";
            }

            $stmt_info->close();
        } else {
            echo "error";
        }
        $stmt->close();
    } else {
        echo "error";
    }
} else {
    echo "error";
}
