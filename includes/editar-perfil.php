<?php include 'header.php' ?>
<?php include '../src/classes/perfil.php' ?>
<?php include 'navbar.php' ?>

<div class="gradient-container">
  <div class="form-edit form-box">
    <h2>Editar Perfil</h2>
    <form id="editar-perfil-form" action="editar-perfil.php" method="post" enctype="multipart/form-data">
      <div class="form-group mb-5">
        <label for="imagem_perfil">
          <div class="rounded-circle overflow-hidden mr-3" style="position: relative; width: 150px; height: 150px;">
            <img id="preview" src="../src/image/uploads/<?php echo $imagem_perfil; ?>" alt="Imagem de Perfil" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
            <div id="alterar-overlay">
              <p>Alterar</p>
            </div>
          </div>
        </label><br>
        <label id="imagem_label" for="imagem_perfil">Escolha uma Imagem de Perfil (JPG, JPEG, PNG): </label>
        <!-- Input de arquivo escondido para selecionar a imagem -->
        <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil" accept=".jpg, .jpeg, .png" onchange="previewImage(this);" style="display: none;">
      </div>

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

      <button type="submit" class="submit-btn custom-btn mt-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Atualizar
      </button>
    </form>
  </div>
</div>

<script>
  function previewImage(input) {
    var preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?php include 'rodape.php' ?>