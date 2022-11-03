<?php
include_once "../Controller/CarrinhoController.php";
$cart = new CarrinhoController();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - <?php echo $_SESSION['nomeUsuario'] ?></title>
    <link href="./css-site/header.css" rel="stylesheet" type="text/css">
    <link href="./css-site/footer.css" rel="stylesheet" type="text/css">
    
    
</head>
<body>

    <header>
        <?php
            include_once "header.php";
        ?>
    </header>

    <table class="table table-striped">
        <thead>
            <th>Produto</th>
            <th>Valor do produto</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
        <?php
            if(isset($_SESSION['login']) && $_SESSION['login'] === true){

                $dadosCarrinho = $cart->MostrarCarrinho($_SESSION['idUsuario']);

            }
            else{
                echo "  <script>
                        alert('Para acessar o carrinho, é necessário entrar em sua conta!');
                        window.location = '../index.php';
                        </script>";
            }

            foreach($dadosCarrinho as $valor):

        ?>
            <tr>
                <td><?php echo $valor->NOME_PRODUTO ?></td>
                <td><?php echo $valor->VALOR_PRODUTO ?></td>
                <td><?php echo $valor->QUANTIDADE ?></td>
                <td><?php echo $valor->SUBTOTAL ?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>
</body>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</html>