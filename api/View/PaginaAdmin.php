<!DOCTYPE html>
<html lang="en">
<head>
<link href="css-site/footer.css" rel="stylesheet" type="text/css"/>
<link href="css-site/header.css" rel="stylesheet" type="text/css"/>
<link href="css-site/pagina-admin.css" rel="stylesheet" type="text/css"/>


    <meta charset="UTF-8">
    <title>Admin</title>
</head>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<body>
<header>
      <?php
       include_once "header.php";
      ?>
</header>
<main>

<nav style="background-color: white; margin: auto; width:800;">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="idProduto" data-toggle="tab" href="#nav-produto" role="tab" aria-controls="nav-home" aria-selected="true">Produtos</a>
        <a class="nav-item nav-link" id="idCategoria" data-toggle="tab" href="#nav-categoria" role="tab" aria-controls="nav-profile" aria-selected="false">Categorias</a>
        <a class="nav-item nav-link" id="idUsuario" data-toggle="tab" href="#nav-usuario" role="tab" aria-controls="nav-contact" aria-selected="false">Usuários</a>
    </div>
</nav>

<div class="tab-content" id="tab-content"></div>
</main>
<footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>
<script>
   $(document).ready(function () {
      $('#idProduto').click(function () {
         $('#tab-content').load('Produto.php');
      });
      $('#idCategoria').click(function () {
         $('#tab-content').load('Categoria.php');
      });
      $('#idUsuario').click(function () {
         $('#tab-content').load('Usuario.php');
      });
   });
</script>
</body>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript" src="js-site/header.js"><script>

</html>