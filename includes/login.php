<?php include 'header.php'?>

<div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="login.php" method="post">
            <input type="email" class="form-control" id="email-login" name="email-login" placeholder="Email" required>
            <div class="invalid-feedback">Por favor, preencha um email válido.</div>
            
            <div class="form-group position-relative">
            <div class="input-group">
                <input type="password" class="form-control" id="password-login" name="password-login" placeholder="Password" required>
                <div class="input-group-prepend">
                    <span class="input-group-text password-icon" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <button type="submit">Login</button>
        </form>
        <p id="error-msg" class="error-msg"></p>
        <p>Não tem uma conta? <a href="cadastro-user.php">Crie uma agora</a>.</p>
</div>

<?php include 'rodape.php'?>