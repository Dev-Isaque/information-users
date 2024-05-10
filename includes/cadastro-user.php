<?php include 'header.php' ?>

<div class="gradient-container">
  <div class="form-box mb-5">
    <h2>Cadastro</h2>
    <form id="cadastro-form" action="cadastro.php" method="post">
      <div class="user-box">
        <input type="text" id="nome" name="nome" required>
        <label for="nome">Nome</label>
      </div>
      <div class="user-box">
        <input type="email" id="email" name="email" required>
        <label for="email">Email</label>
      </div>
      <div class="user-box">
        <input type="password" class="form-control" id="password" name="password" required>
        <label for="password">Senha</label>
        <div class="password-toggle togglePassword">
          <i class="fas fa-eye toggle-icon"></i>
        </div>
      </div>
      <button type="submit" id="submitBtn" class="submit-btn custom-btn mt-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Cadastrar
      </button>
    </form>

    <p class="white-text mt-4"> Já possui uma conta? <a href="login.php"> Login </a>.</p>
  </div>
</div>


<?php include 'rodape.php' ?>