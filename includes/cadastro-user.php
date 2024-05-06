<?php include 'header.php'?>

<div class="container">
    <h2 class="mt-5">Cadastro</h2>
    <form id="cadastro-form" action="cadastro.php" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
            <div class="invalid-feedback">Por favor, preencha seu nome.</div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback">Por favor, preencha um email válido.</div>
        </div>

        <div class="form-group position-relative">
            <label for="password">Senha:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="input-group-prepend">
                    <span class="input-group-text password-icon" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            <div class="invalid-feedback">Por favor, preencha sua senha.</div>
        </div>
        
        <button type="submit" class="btn btn-primary" id="submitBtn">Cadastrar</button>
    </form>
</div>


<?php include 'rodape.php'?>