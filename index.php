<?php
    include_once 'src/classes/conn.php';
    session_start();

    // Verifica se o usuário não está autenticado
    if (!isset($_SESSION['id'])) {
        header("Location: includes/login.php"); 
        exit; 
    }

    // Consulta ao banco de dados para obter os dados do currículo
    $sql = "SELECT imagem_perfil, nome, idade, rua, bairro, estado, biografia FROM informacoes_usuario WHERE usuario_id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Loop através dos resultados e exibir os dados
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
        echo "Nenhum currículo encontrado."; // Mensagem caso não haja currículo associado ao usuário
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>

    <div class="container mt-5 curriculum-container">
        <div class="card curriculum-card">
            <div class="card-body">
                <h3 class="card-title curriculum-title">Curriculum Vitae</h3>
                <div class="d-flex align-items-center curriculum-info">
                    <?php if(!empty($imagem_perfil)): ?>
                        <div class="rounded-circle overflow-hidden mr-3">
                            <img src="src/image/uploads/<?php echo $imagem_perfil; ?>" alt="Imagem de Perfil" class="img-fluid">
                        </div>
                    <?php endif; ?>
                    <div class="curriculum-details">
                        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                        <p><strong>Idade:</strong> <?php echo $idade; ?></p>
                    </div>
                </div>
                <p><strong>Rua:</strong> <?php echo $rua; ?></p>
                <p><strong>Bairro:</strong> <?php echo $bairro; ?></p>
                <p><strong>Estado:</strong> <?php echo $estado; ?></p>
                <p class="curriculum-bio"><strong>Biografia:</strong> <?php echo $biografia; ?></p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="src/js/script.js"></script>
</body>
</html>