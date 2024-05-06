<?php include 'header.php'?>

<div class="container mt-5">
        <h1 class="mb-4">Cadastro de Informações</h1>
        <form id="informacoes-form" action="cadastro-informacao.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" required>
            </div>
            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
            <div class="form-group">
                <label for="biografia">Biografia:</label>
                <textarea class="form-control" id="biografia" name="biografia" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagem_perfil">Imagem de Perfil:</label>
                <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

<?php include 'rodape.php'?>