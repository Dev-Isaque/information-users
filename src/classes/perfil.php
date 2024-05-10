<?php
include_once 'conn.php';

// Consulta ao banco de dados para obter os dados do currículo
$sql = "SELECT imagem_perfil, nome, idade, rua, bairro, estado, biografia FROM informacoes_usuario WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagem_perfil = $row['imagem_perfil'];
        $nome = $row['nome'];
        $idade = $row['idade'];
        $rua = $row['rua'];
        $bairro = $row['bairro'];
        $estado = $row['estado'];
        $biografia = $row['biografia'];
    }
} else {
    echo "Nenhum currículo encontrado.";
    exit;
}
