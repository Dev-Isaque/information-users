<?php include 'src/classes/perfil.php' ?>

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

  <?php include 'includes/navbar.php' ?>

  <div class="container perfil-container">
    <div class="card perfil-card card-box">
      <div class="card-body">
        <div class="perfil-subtitle">
          <h3 class="card-title perfil-title">Perfil do Usuário</h3>
          <hr>
        </div>
        <div class="d-flex align-items-center perfil-info">
          <?php if (!empty($imagem_perfil)) : ?>
            <div class="rounded-circle overflow-hidden mr-3 img-profile">
              <img src="src/image/uploads/<?php echo $imagem_perfil; ?>" alt="Imagem de Perfil" class="img-fluid">
            </div>
          <?php endif; ?>
          <div class="mt-3 perfil-details user-info">
            <p><strong>Nome:</strong> <br> <span><?php echo $nome; ?></span></p>
            <p><strong>Idade:</strong> <br> <span><?php echo $idade; ?></span></p>
          </div>
        </div>

        <!-- Endereço -->
        <div class="perfil-section mb-3 mt-3">
          <div class="perfil-subtitle">
            <h4>Endereço</h4>
            <hr>
          </div>
          <div class="perfil-details user-info">
            <p><strong>Rua:</strong> <br> <span><?php echo $rua; ?></span></p>
            <p><strong>Bairro:</strong> <br> <span><?php echo $bairro; ?></span></p>
            <p><strong>Estado:</strong> <br> <span><?php echo $estado; ?></span></p>
          </div>
        </div>

        <!-- Biografia -->
        <div class="perfil-section mb-3">
          <div class="perfil-subtitle">
            <h4>Biografia</h4>
            <hr>
          </div>
          <div class="perfil-details user-info">
            <div class="perfil-bio-box">
              <p class="perfil-bio"><span><?php echo $biografia; ?></span></p>
            </div>
          </div>
        </div>

        <!-- Botão de edição -->
        <a href="includes/editar-perfil.php" class=" mt-4 custom-btn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Editar Perfil
        </a>

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