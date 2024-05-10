<?php

// Conexão com o banco de dados
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Consulta para verificar se o email existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }

    $stmt->close();
} else {
    echo 'Invalid request';
}
