<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../CSS/CadastrarUsuario.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body class="center-form">
<div class="card">

    <form action="../Controller/UsuarioCadController.php" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" type="text" required pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" name="nome" placeholder="Nome">
                </div>
                <div class="col-md-7 form-group">
                    <label for="sobrenome">Sobrenome</label>
                    <input class="form-control" required type="text" name="sobrenome" placeholder="Sobrenome">
                </div>
            </div>
            <div class="row">
              <div class="col-md-5 form-group">
                  <label for="cpf">CPF</label>
                  <input type="text" class="form-control" required name="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');">
              </div>
                <div class="col-md-7 form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="Senha">Senha</label>
                    <input type="password" name="senha" required placeholder="Senha" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                <button type="submit" class="btn form-control" name="btnCadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
</div>


</body>
</html>
