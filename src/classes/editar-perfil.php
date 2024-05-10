<?php

include_once "conn.php";

// Inicie a sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifique se todos os campos necessários foram enviados
    if (!isset($_POST['nome']) || !isset($_POST['idade']) || !isset($_POST['rua']) || !isset($_POST['bairro']) || !isset($_POST['estado']) || !isset($_POST['biografia'])) {
        echo "Campos faltando ou nulos";
        exit;
    }
    if (!isset($_SESSION['id'])) {
        echo "Usuário não autenticado";
        exit;
    }

    // Obtém o ID do usuário da sessão
    $usuario_id = $_SESSION['id'];

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $estado = $_POST["estado"];
    $biografia = $_POST["biografia"];

    // Verifica se um arquivo foi enviado
    if (!empty($_FILES['imagem_perfil']['name'])) {
        if ($_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
            $nome_temporario = $_FILES['imagem_perfil']['tmp_name'];
            $extensao = pathinfo($_FILES['imagem_perfil']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo

            // Gere um nome único para o arquivo
            $numero_unico = uniqid();
            $nome_arquivo_final = "img-userId-$usuario_id.$extensao";

            $diretorio_destino = '../image/uploads/';

            // Excluir a imagem antiga
            $sql_imagem_antiga = "SELECT imagem_perfil FROM informacoes_usuario WHERE usuario_id=?";
            $stmt_imagem_antiga = $conn->prepare($sql_imagem_antiga);
            if ($stmt_imagem_antiga) {
                $stmt_imagem_antiga->bind_param("i", $usuario_id);
                $stmt_imagem_antiga->execute();
                $stmt_imagem_antiga->bind_result($imagem_antiga);
                $stmt_imagem_antiga->fetch();
                $stmt_imagem_antiga->close();

                // Se houver uma imagem antiga, exclua-a
                if ($imagem_antiga) {
                    $caminho_imagem_antiga = $diretorio_destino . $imagem_antiga;
                    if (file_exists($caminho_imagem_antiga)) {
                        unlink($caminho_imagem_antiga);
                    }
                }
            }

            if (move_uploaded_file($nome_temporario, $diretorio_destino . $nome_arquivo_final)) {
                // Consulta SQL para atualizar os dados na tabela de informações do usuário
                $sql = "UPDATE informacoes_usuario SET nome=?, idade=?, rua=?, bairro=?, estado=?, biografia=?, imagem_perfil=? WHERE usuario_id=?";

                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("sssssssi", $nome, $idade, $rua, $bairro, $estado, $biografia, $nome_arquivo_final, $usuario_id);
                    if ($stmt->execute()) {
                        echo "success";
                    } else {
                        echo "Erro ao atualizar o perfil";
                    }
                    $stmt->close();
                } else {
                    echo "Erro ao preparar a declaração SQL";
                }
            } else {
                echo "Erro ao mover o arquivo para o diretório de destino";
            }
        } else {
            echo "Erro no upload da imagem";
        }
    } else {
        // Se nenhum arquivo foi enviado, atualize os outros campos do perfil do usuário
        $sql = "UPDATE informacoes_usuario SET nome=?, idade=?, rua=?, bairro=?, estado=?, biografia=? WHERE usuario_id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssssi", $nome, $idade, $rua, $bairro, $estado, $biografia, $usuario_id);
            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "Erro ao atualizar o perfil";
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração SQL";
        }
    }
} else {
    echo "Método de requisição inválido";
}
