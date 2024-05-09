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
<body class="background-gradient white-text">

  <header>
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand mx-2" href="#"> Perfil </a>
        <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto align-items-center">
            <!-- Botão de Logout -->
            <li class="nav-item">
              <a class="nav-link" href="src/classes/logout-user.php" id="logout"><i class="fas fa-sign-out-alt logout-icon"></i> Logout</a>
            </li>
          </ul>
        </div>
      </nav>
  </header>

  <div class="container mt-5 perfil-container">
      <div class="card perfil-card card-box">
          <div class="card-body">
              <h3 class="card-title perfil-title"> Perfil do Usuário </h3>
              <div class="d-flex align-items-center perfil-info">
                  <?php if(!empty($imagem_perfil)): ?>
                      <div class="rounded-circle overflow-hidden mr-3 img-profile">
                          <img src="src/image/uploads/<?php echo $imagem_perfil; ?>" alt="Imagem de Perfil" class="img-fluid">
                      </div>
                  <?php endif; ?>
                  <div class="perfil-details user-info">
                      <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                      <p><strong>Idade:</strong> <?php echo $idade; ?></p>
                  </div>
              </div>
              <p><strong>Rua:</strong> <?php echo $rua; ?></p>
              <p><strong>Bairro:</strong> <?php echo $bairro; ?></p>
              <p><strong>Estado:</strong> <?php echo $estado; ?></p>
              <p class="perfil-bio"><strong>Biografia:</strong> <?php echo $biografia; ?></p>
              
              <!-- Botão de edição -->
              <a href="includes/editar-perfil.php" class="btn btn-primary">Editar Perfil</a>
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


