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
                window.location.href = '../index.php';
            } else if (response === 'no_info') {
                window.location.href = 'cadastro-informacao.php';
            } else {
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
                // Limpa os campos após o envio bem-sucedido
                $('#nome').val('');
                $('#email').val('');
                $('#password').val('');
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

// Função para deixar a senha visivel ou invisivel
$('#togglePassword').click(function() {
    var password = $('#password');
    var password_login = $('#password-login');

    if(password.length > 0) {
        var type = password.attr('type') === 'password' ? 'text' : 'password';
        password.attr('type', type);
    } else if(password_login.length > 0) {
        var type = password_login.attr('type') === 'password' ? 'text' : 'password';
        password_login.attr('type', type);
    } else {
        return;
    }

    // Altera apenas o ícone quando clicado
    $('.toggle-icon').toggleClass('fa-eye-slash fa-eye');

    // Mantém a cor selecionada para o ícone
    var iconColor = $('.toggle-icon').css('color');
    $('.toggle-icon').css('color', iconColor);
});

// Função para alterar a cor do ícone quando algo é digitado no input
$('#password, #password-login').on('input', function() {
    var password = $('#password');
    var password_login = $('#password-login');

    if(password.length > 0 && password.val() !== '') {
        $('.toggle-icon').css('color', 'black');
    } else if(password_login.length > 0 && password_login.val() !== '') {
        $('.toggle-icon').css('color', 'black');
    }
});


// Função para trocar icon menu Hamburguer

$('.navbar-toggler').click(function() {
    $('.navbar-collapse').toggleClass('show');
});

