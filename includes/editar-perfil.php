<?php include 'header.php' ?>
<?php include '../src/classes/perfil.php'?>

<div class="background-gradient"></div>

<div class="gradient-container">
  <div class="form-box form-box-info">
    <h2>Editar Perfil</h2>
    <form id="editar-perfil-form" action="editar-perfil.php" method="post">
      <div class="user-box">
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
        <label for="nome">Nome</label>
      </div>
      <div class="user-box">
        <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $idade; ?>" required>
        <label for="idade">Idade</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $rua; ?>" required>
        <label for="rua">Rua</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $bairro; ?>" required>
        <label for="bairro">Bairro</label>
      </div>
      <div class="user-box">
        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado; ?>" required>
        <label for="estado">Estado</label>
      </div>
      <div class="user-box">
        <textarea class="form-control" id="biografia" name="biografia" rows="4" required><?php echo $biografia; ?></textarea>
        <label for="biografia">Biografia</label>
      </div>
      <div class="form-group">
        <label for="imagem_perfil">Escolha uma Imagem de Perfil (JPG, JPEG, PNG): </label>
        <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil" accept=".jpg, .jpeg, .png" required>
      </div>

      <button type="submit" class="submit-btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Atualizar
      </button>
    </form>
  </div>
</div>

<?php include 'rodape.php' ?>
