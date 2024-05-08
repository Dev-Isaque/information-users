<?php include 'src/classes/perfil.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto align-items-center">
          <!-- Modo de Escolha -->
          <li class="nav-item">
            <i class="far fa-sun sun-moon-icon"></i>
          </li>
          <li class="nav-item">
            <label class="toggle-switch">
              <input type="checkbox" id="toggle-mode">
              <span class="slider round"></span>
            </label>
          </li>
          <li class="nav-item">
            <i class="far fa-moon sun-moon-icon"></i>
          </li>
          <!-- Botão de Logout -->
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-sign-out-alt logout-icon"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


    <div class="container mt-5 curriculum-container">
        <div class="card curriculum-card">
            <div class="card-body">
                <h3 class="card-title curriculum-title"> Perfil do Usuário </h3>
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


