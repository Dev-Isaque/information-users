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
        processData: false, // Não processar os dados (deixe isso como false quando enviar FormData)
        contentType: false, // Não definir o tipo de conteúdo (será definido automaticamente)
        success: function(response) {
            if (response === 'success') {
                // Redirecionar para a página de perfil ou página interna após o cadastro
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



document.getElementById('togglePassword').addEventListener('click', function() {
    var passwordInput = document.getElementById('password');
    var passwordIcon = document.getElementById('togglePassword').querySelector('i');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
    }
});