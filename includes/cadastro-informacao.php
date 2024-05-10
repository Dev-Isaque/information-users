<?php include 'header.php' ?>

<div class="gradient-container">
  <div class="form-box form-box-info">
    <h2>Cadastro de Informações</h2>
    <form id="informacoes-form" action="cadastro-informacao.php" method="post">
      <div class="user-box">
        <input type="text" class="form-control" id="nome" name="nome" required>
        <label for="nome">Nome</label>
      </div>
      <div class="user-box">
        <input type="number" class="form-control" id="idade" name="idade" required>
        <label for="idade">Idade</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="rua" name="rua" required>
        <label for="rua">Rua</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="bairro" name="bairro" required>
        <label for="bairro">Bairro</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="estado" name="estado" required>
        <label for="estado">Estado</label>
      </div>
      <div class="user-box">
        <textarea class="form-control" id="biografia" name="biografia" rows="4" required></textarea>
        <label for="biografia">Biografia</label>
      </div>
      <div class="form-group">
        <label for="imagem_perfil">Escolha uma Imagem de Perfil (JPG, JPEG, PNG): </label>
        <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil" accept=".jpg, .jpeg, .png" required>
      </div>

      <button type="submit" class="submit-btn custom-btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Cadastrar
      </button>
    </form>
  </div>
</div>

<?php include 'rodape.php' ?>