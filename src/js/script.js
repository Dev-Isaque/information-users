/** PAGINA VIEW/CADASTRO.PHP **/

$('#login-form').submit(function(event) {
    event.preventDefault();

    var email = $('#email-login').val();
    var senha = $('#password-login').val();

    $.ajax({
        type: 'POST',
        url: '../src/classes/login-user.php',
        data: {
            email: email,
            senha: senha
        },
        success: function(response) {
            if (response === 'success') {
                // Redirecionar para a página principal após o login
                window.location.href = '../index.php';
            } else if (response === 'no_info') {
                // Redirecionar para a página de cadastro de informações
                window.location.href = 'cadastro-informacao.php';
            } else {
                // Exibir mensagem de erro
                $('#error-msg').text('Nome de usuário ou senha incorretos.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#error-msg').text('Ocorreu um erro durante o login. Por favor, tente novamente.');
        }
    });
});

$('#cadastro-form').submit(function(event) {
    event.preventDefault();

    var nome = $('#nome').val();
    var email = $('#email').val();
    var password = $('#password').val();

    if (nome && email && password) {
        $.ajax({
            type: 'POST',
            url: '../src/classes/cadastro-user.php',
            data: {
                nome: nome,
                email: email,
                password: password
            },
            success: function(response) {
                alert(response);
                window.location.href = 'login.php'; // Redireciona para a página de login após o cadastro bem-sucedido
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    } else {
        if (!nome) {
            $('#nome').addClass('is-invalid');
        }
        if (!email) {
            $('#email').addClass('is-invalid');
        }
        if (!password) {
            $('#password').addClass('is-invalid');
        }
    }
});

$('#informacoes-form').submit(function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    
    $.ajax({
        type: 'POST',
        url: '../src/classes/cadastro-informacao.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response === 'success') {
                window.location.href = '../index.php';
            } else {
                $('#error-msg').text('Erro ao cadastrar informações do usuário.');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#error-msg').text('Ocorreu um erro durante o cadastro. Por favor, tente novamente.');
        }
    });
});

$('#togglePassword').click(function() {
    // Seleciona o campo de senha
    var password = $('#password');
    // Alterna o tipo de atributo do campo de senha entre 'password' e 'text'
    var type = password.attr('type') === 'password' ? 'text' : 'password';
    password.attr('type', type);

    // Seleciona o ícone de olho dentro do elemento clicado
    $('.toggle-icon').toggleClass('fa-eye-slash fa-eye');
});