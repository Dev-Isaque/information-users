<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo de imagem foi enviado corretamente
    if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
        // Define o diretório onde a imagem será armazenada
        $diretorio = '../image/uploads/';

        // Obtém o nome do arquivo e move-o para o diretório especificado
        $nome_arquivo = $_FILES['imagem_perfil']['name'];
        move_uploaded_file($_FILES['imagem_perfil']['tmp_name'], $diretorio . $nome_arquivo);

        // Atualiza as informações do perfil no banco de dados
        // Substitua estas linhas pelas consultas reais ao banco de dados
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $biografia = $_POST['biografia'];

        // Exemplo de consulta SQL para atualizar o perfil no banco de dados
        $sql = "UPDATE perfil SET nome = '$nome', idade = '$idade', rua = '$rua', bairro = '$bairro', estado = '$estado', biografia = '$biografia', imagem_perfil = '$nome_arquivo' WHERE id = 1";

        if ($resultado) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o perfil no banco de dados.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao fazer upload da imagem.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
}
