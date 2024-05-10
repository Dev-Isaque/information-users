<?php include 'header.php' ?>

<div class="gradient-container">
  <div class="form-box">
    <h2>Definir Nova Senha</h2>
    <form id="nova-senha-form" method="post">
      <div class="user-box">
        <input type="password" class="form-control" id="nova-senha" name="nova-senha" required>
        <label for="nova-senha">Nova Senha</label>
        <div class="password-toggle togglePasswordNovaSenha">
          <i class="fas fa-eye toggle-icon"></i>
        </div>
      </div>
      <div class="user-box">
        <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha" required>
        <label>Confirmar Nova Senha</label>
        <div class="password-toggle togglePasswordConfirmarSenha">
          <i class="fas fa-eye toggle-icon"></i>
        </div>
      </div>
      <button type="submit" class="custom-btn submit-btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Definir Senha
      </button>
    </form>
    <p id="error-msg" class="error-msg white-text"></p>
    <p class="white-text mt-4">Lembrou da senha? <a href="login.php">Faça login aqui</a>.</p>
  </div>
</div>

<?php include 'rodape.php' ?>
