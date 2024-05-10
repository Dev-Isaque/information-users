<?php

include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifique se todos os campos necessários foram enviados
    if (!isset($_POST['nome']) || !isset($_POST['idade']) || !isset($_POST['rua']) || !isset($_POST['bairro']) || !isset($_POST['estado']) || !isset($_POST['biografia']) || !isset($_FILES['imagem_perfil'])) {
        echo "Campos então faltando ou Null";
        exit;
    }
    session_start();
    if (!isset($_SESSION['id'])) {
        echo "error";
        exit;
    }
    $usuario_id = $_SESSION['id'];

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $estado = $_POST["estado"];
    $biografia = $_POST["biografia"];

    // Verifique se não houve erro ao fazer o upload da imagem
    if ($_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
        // Obtenha informações sobre o arquivo de imagem
        $nome_temporario = $_FILES['imagem_perfil']['tmp_name'];
        $extensao = pathinfo($_FILES['imagem_perfil']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo

        // Gere um nome único para o arquivo
        $numero_unico = uniqid(); // Gera um identificador único baseado no tempo atual em formato hexadecimal
        $nome_arquivo_final = "img-userId-$usuario_id.$extensao"; // Novo nome do arquivo

        $diretorio_destino = '../image/uploads/'; // Substitua pelo caminho do seu diretório de upload

        // Mova o arquivo para o diretório de destino
        if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo_final)) {
            // Consulta SQL para inserir os dados na tabela de informações do usuário
            $sql = "INSERT INTO informacoes_usuario (usuario_id, nome, idade, rua, bairro, estado, biografia, imagem_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("isssssss", $usuario_id, $nome, $idade, $rua, $bairro, $estado, $biografia, $nome_arquivo_final);
                if ($stmt->execute()) {
                    echo "success";
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
    } else {
        echo "error";
    }
} else {
    echo "error: METHOD 'POST' não localizado";
}
