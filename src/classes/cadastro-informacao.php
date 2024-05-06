<?php
include_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verifique se todos os campos necessários foram enviados
    if (!isset($_POST['nome']) || !isset($_POST['idade']) || !isset($_POST['rua']) || !isset($_POST['bairro']) || !isset($_POST['estado']) || !isset($_POST['biografia']) || !isset($_FILES['imagem_perfil'])) {
        echo "error";
        exit;
    }

    // Verifique se o ID do usuário está definido na sessão
    session_start();
    if (!isset($_SESSION['id'])) {
        echo "error";
        exit;
    }
    $usuario_id = $_SESSION['id'];

    // Prepara os dados recebidos do formulário
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
        $nome_arquivo = basename($_FILES['imagem_perfil']['name']);
        $diretorio_destino = '../image/uploads/'; // Substitua pelo caminho do seu diretório de upload

        // Mova o arquivo para o diretório de destino
        if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo)) {
            // Consulta SQL para inserir os dados na tabela de informações do usuário
            $sql = "INSERT INTO informacoes_usuario (usuario_id, nome, idade, rua, bairro, estado, biografia, imagem_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("isssssss", $usuario_id, $nome, $idade, $rua, $bairro, $estado, $biografia, $nome_arquivo);
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
    // Se a requisição não foi feita via método POST, exibe uma mensagem de erro
    echo "error: METHOD 'POST' não localizado";
}
