<?php include 'header.php'?>

<div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="login.php" method="post">
            <input type="email" class="form-control" id="email-login" name="email-login" placeholder="Email" required>
            <div class="invalid-feedback">Por favor, preencha um email válido.</div>

            <input type="password" id="password-login" name="password-login" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p id="error-msg" class="error-msg"></p>
        <p>Não tem uma conta? <a href="cadastro-user.php">Crie uma agora</a>.</p>
</div>

<?php include 'rodape.php'?>