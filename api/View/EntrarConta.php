<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />

    <link href="../TCC/css/header.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../TCC/css/login.css">
    <link rel="stylesheet" href="../TCC/css/header.css">
    <link rel="stylesheet" href="../TCC/css/footer.css">

    <title>Entrar</title>

  </head>
<body>

    <main class="main-login">

    <div class="content-forms">
      <div class="text">
        Acessar Conta</div>
        <form action="../Controller/LoginController.php" class="login-forms" method="POST">
        <div class="field">
          <input type="email" name="emailLogin" required placeholder="Email">
          <span class="fas fa-user"></span>
         
        </div>
        <div class="field">
          <input type="password" name="senhaLogin" required placeholder="Senha">
          <span class="fas fa-lock"></span>
        </div>
        <div class="forgot-pass">
          <a href="">Esqueceu sua senha?</a></div>
          <button class="button-forms" name="btnEntrarconta">Entrar</button>
        <div class="sign-up">
          Não possui uma conta?
          <a href="../TCC/cadastro.html">Cadastre-se aqui</a>
        </div>

</form>
</div>

</main>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="../TCC/js/header.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</html>
