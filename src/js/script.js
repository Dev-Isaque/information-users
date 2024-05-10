/** PAGINA VIEW/CADASTRO.PHP **/

$("#login-form").submit(function (event) {
  event.preventDefault();

  var email = $("#email-login").val();
  var senha = $("#password-login").val();

  $.ajax({
    type: "POST",
    url: "../src/classes/login-user.php",
    data: {
      email: email,
      senha: senha,
    },
    success: function (response) {
      if (response === "success") {
        window.location.href = "../index.php";
      } else if (response === "no_info") {
        window.location.href = "cadastro-informacao.php";
      } else {
        $("#error-msg").text("Nome de usuário ou senha incorretos.");
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
      $("#error-msg").text(
        "Ocorreu um erro durante o login. Por favor, tente novamente."
      );
    },
  });
});

$("#cadastro-form").submit(function (event) {
  event.preventDefault();

  var nome = $("#nome").val();
  var email = $("#email").val();
  var password = $("#password").val();

  if (nome && email && password) {
    $.ajax({
      type: "POST",
      url: "../src/classes/cadastro-user.php",
      data: {
        nome: nome,
        email: email,
        password: password,
      },
      success: function (response) {
        // Limpa os campos após o envio bem-sucedido
        $("#nome").val("");
        $("#email").val("");
        $("#password").val("");
        alert(response);
        window.location.href = "login.php";
      },
      error: function (xhr, status, error) {
        if (xhr.status === 400) {
          alert(xhr.responseText);
        } else {
          console.error(xhr.responseText); 
        }
      },
    });
  } else {
    if (!nome) {
      $("#nome").addClass("is-invalid");
    }
    if (!email) {
      $("#email").addClass("is-invalid");
    }
    if (!password) {
      $("#password").addClass("is-invalid");
    }
  }
});

$('#recuperar-senha-form').submit(function(event) {
  event.preventDefault();
  var email = $('#email-recuperar').val();

  $.ajax({
      type: 'POST',
      url: "../src/classes/recuperar-senha.php",
      data: { email: email },
      success: function(response) {
          if (response === 'exists') {
              window.location.href = 'nova-senha.php?email=' + email;
          } else {
              alert('O email não foi encontrado.');
          }
      },
      error: function() {
          alert('Erro ao processar a solicitação.');
      }
  });
});

$("#nova-senha-form").submit(function(event) {
  event.preventDefault();
  var novaSenha = $("#nova-senha").val();
  var confirmarSenha = $("#confirmar-senha").val();

  if (novaSenha !== confirmarSenha) {
    alert("As senhas não correspondem.");
    return;
  }

  // Obtém o e-mail da URL
  var urlParams = new URLSearchParams(window.location.search);
  var email = urlParams.get('email');

  $.ajax({
    type: "POST",
    url: "../src/classes/nova-senha.php",
    data: { email: email, novaSenha: novaSenha },
    success: function(response) {
      $("#nova-senha").val("");
      $("#confirmar-senha").val("");
      alert(response);
      window.location.href = "login.php";
    },
    error: function() {
      alert("Erro ao enviar a nova senha.");
    }
  });
});

$("#informacoes-form").submit(function (event) {
  event.preventDefault();

  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "../src/classes/cadastro-informacao.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response === "success") {
        window.location.href = "../index.php";
      } else {
        $("#error-msg").text("Erro ao cadastrar informações do usuário.");
      }
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
      $("#error-msg").text(
        "Ocorreu um erro durante o cadastro. Por favor, tente novamente."
      );
    },
  });
});

$("#editar-perfil-form").submit(function (event) {
  // Previne o comportamento padrão do formulário
  event.preventDefault();

  // Exibe um prompt de confirmação
  var confirmacao = confirm("Deseja mesmo atualizar o cadastro?");

  // Se o usuário confirmar, prossegue com o envio do formulário
  if (confirmacao) {
    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "../src/classes/editar-perfil.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.trim() === "success") {
          // Verifica se a resposta é 'success'
          window.location.href = "../index.php";
        } else {
          alert("Erro ao atualizar o perfil.");
        }
      },
      error: function () {
        alert("Erro ao enviar dados.");
      },
    });
  }
});

// Função para deixar a senha visivel ou invisivel
$(".togglePassword").click(function () {
  var password = $("#password");
  var password_login = $("#password-login");

  if (password.length > 0) {
    var type = password.attr("type") === "password" ? "text" : "password";
    password.attr("type", type);
  } else if (password_login.length > 0) {
    var type = password_login.attr("type") === "password" ? "text" : "password";
    password_login.attr("type", type);
  } else {
    return;
  }

  // Altera apenas o ícone quando clicado
  $(".toggle-icon").toggleClass("fa-eye-slash fa-eye");

  // Mantém a cor selecionada para o ícone
  var iconColor = $(".toggle-icon").css("color");
  $(".toggle-icon").css("color", iconColor);
});

$(".togglePasswordNovaSenha").click(function () {
  var nova_senha = $("#nova-senha");
  var type = nova_senha.attr("type") === "password" ? "text" : "password";
  nova_senha.attr("type", type);

  $(this).find(".toggle-icon").toggleClass("fa-eye-slash fa-eye");

  var iconColor = $(this).find(".toggle-icon").css("color");
  $(this).find(".toggle-icon").css("color", iconColor);
});

$(".togglePasswordConfirmarSenha").click(function () {
  var confirmar_senha = $("#confirmar-senha");
  var type = confirmar_senha.attr("type") === "password" ? "text" : "password";
  confirmar_senha.attr("type", type);

  $(this).find(".toggle-icon").toggleClass("fa-eye-slash fa-eye");

  var iconColor = $(this).find(".toggle-icon").css("color");
  $(this).find(".toggle-icon").css("color", iconColor);
});

// Função para alterar a cor do ícone quando algo é digitado no input
$("#password, #password-login, #nova-senha, #confirmar-senha").on("input", function () {
  var password = $("#password");
  var password_login = $("#password-login");
  var nova_senha = $("#nova-senha");
  var confirmar_senha = $("#confirmar-senha");

  if (password.val() !== "" || password_login.val() !== "" || nova_senha.val() !== "" || confirmar_senha.val() !== "") {
    $(".toggle-icon").css("color", "black");
  } else {
    $(".toggle-icon").css("color", "transparent");
  }
});

// Função para trocar icon menu Hamburguer
$(".navbar-toggler").click(function () {
  $(".navbar-collapse").toggleClass("show");
});

// Função para abrir o input para selecionar uma imagem
function previewImage(input) {
  var preview = document.getElementById("preview");
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };
    reader.readAsDataURL(input.files[0]);
  }
}
