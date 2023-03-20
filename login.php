<!-- 
    AVISO:
    DESENVOLVIMENTO POR RAFAEL DE ANDRADE 
    SISTEMA DE LOGIN EM PHP COM VISUAL MINIMALISTA
    PROIBIDA CÓPIA PARA FINS NÃO EDUCACIONAIS
    COPIAR SOFTWARE DE TERCEIROS SIGNIFICA PLÁGIO
-->

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome_completo = $_POST['nome'];

    // DADOS DO SERVIDOR
    $ServidorDB = "localhost";
    $UsuarioDB = "root";
    $SenhaDB = "";
    $NomeDB = "db_login";
    $TabelaDB = "usuarios";
    $conn = new mysqli($ServidorDB, $UsuarioDB, $SenhaDB, $NomeDB);

    // EM CASO DE ERROS
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // VALIDAÇÃO DO USUÁRIO (SE EXISTE NO DB)
    $sql = "SELECT * FROM $TabelaDB WHERE usuario='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nome'] = $nome_completo;
        header("Location: index.php");
    } else {
        echo "Usuário ou senha inválidos";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="src/css/login.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"/>
  <link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon" />
  
</head>
<body>
  <section class="row mx-0 min-vh-100">
    <div class="col-md-6 col-lg-8 d-none d-md-block position-relative"
      style="background: url(src/img/img-fundo.jpg) no-repeat center/cover;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"
        class="position-absolute top-0 end-0 h-100">
      </svg>
    </div>
    <div class="colunaLogin col-md-6 col-lg-4 d-flex align-items-center px-md-4 px-lg-4">
      <div class="w-100">
        <div class="logotipoIcone">
        <img src="src/img/img-icone-folha.png"/>
        <h4 class="tituloPrincipal mb-4">Entre para continuar</h4>
        </div>
        <div class="border-bottom border-2 border-white mb-4" style="width:13rem;"></div>
        <form id="formLogin" action="login.php" method="post">
          <div class="mb-3">
            <label for="usuario" class="form-label mb-1">Usuário ou email</label>
            <input type="text" name="usuario" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label mb-1">Senha</label>
            <input type="password" name="senha" class="form-control" required>
          </div>
          <div class="d-flex justify-content-between mb-3 small">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="lembrar">
              <label class="form-check-label" for="lembrar">Lembrar de mim</label>
            </div>

            <a href="" class="text-decoration-none txtEsqueceSenha">Esqueceu a senha?</a>
          </div>
          <button id="btLogin" type="submit" class="btn btn-dark w-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              style="width:1.2rem; height:1.2rem">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Entrar
          </button>
        </form>
      </div>
      <div class="versaoSistema"><p><b>Versão de desenvolvimento</b><br>Copyright © 2023</p></div>
    </div>
  </section>
</body>
</html>