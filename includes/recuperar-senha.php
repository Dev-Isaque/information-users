<?php include 'header.php' ?>

<div class="gradient-container">
  <div class="form-box">
    <h2>Recuperação de Senha</h2>
    <form id="recuperar-senha-form" action="recuperar-senha.php" method="post">
      <div class="user-box">
        <input type="email" id="email-recuperar" name="email-recuperar" required>
        <label>Email</label>
      </div>
      <button type="submit" class="custom-btn submit-btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Recuperar Senha
      </button>
    </form>
    <p id="error-msg" class="error-msg white-text"></p>
    <p class="white-text mt-4">Lembrou sua senha? <a href="login.php">Faça login aqui</a>.</p>
  </div>
</div>

<?php include 'rodape.php' ?>
