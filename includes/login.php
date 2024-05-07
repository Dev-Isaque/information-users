<?php include 'header.php'?>

<div class="login-box">
  <h2>Login</h2>
  <form id="login-form" action="login.php" method="post">
    <div class="user-box">
      <input type="email" name="email-login" required>
      <label>Email</label>
    </div>
    <div class="user-box">
        <input type="password" class="form-control" id="password-login" name="assword-login" required>
        <label for="assword-login">Senha</label>
        <div class="password-toggle" id="togglePassword">
            <i class="fas fa-eye toggle-icon"></i>
        </div>
    </div>
    <button type="submit" class="submit-btn">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Acessar
    </button>
  </form>
  <p id="error-msg" class="error-msg"></p>
  <p class="white-text">Não tem uma conta? <a href="cadastro-user.php">Crie uma agora</a>.</p>
</div>


<?php include 'rodape.php'?>