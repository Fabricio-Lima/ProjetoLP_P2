<?php
include_once "../Model/Produto.php";

$pro = new Produto();


//CADASTRAR NOVO PRODUTO
if(isset($_POST['btnCadastrarNovoProduto'])){

    var_dump($_POST);
    //var_dump($_FILES);

    $pro->nomeProduto = $_POST['nomeProduto'];
    $pro->idCategoria = $_POST['categoriaProduto'];
    $pro->estoque = $_POST['estoqueProduto'];
    $pro->valor = $_POST['valorProduto'];
    $pro->img = $_FILES['imagemProduto'];

    var_dump($pro->img);
    echo $pro->img['name'];

    $formatosPermitidos = array("png", "jpg", "jpeg");
    $pasta = "../BD_ImgProdutos/";
    $extensao = pathinfo($pro->img['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)):
        move_uploaded_file($pro->img['tmp_name'], $pasta.$pro->img['name']);
        $caminhoImg = $pasta.$pro->img['name'];
        $pro->img = $caminhoImg;
    else:
        echo "<script>alert('Formato não permitido');</script>";
    endif;   

   $pro->cadastrar();

}
/*<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">-->
    <input type="file" name="arquivo" accept="">-->
    <input type="submit" value="Enviar" name="EnviarImg">-->
    </form>-->

    <?php
       
        $formatosPermitidos = array("png", "jpeg", "jpg");


        if(isset($_POST['EnviarImg'])){
            var_dump($_FILES['arquivo']);

            $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

            if(in_array($extensao, $formatosPermitidos)):
            echo "Existe";
            else:
                echo "Não Existe";
            endif;

            move_uploaded_file($_FILES['arquivo']['tmp_name'], "img/".$_FILES['arquivo']['name']);
            
            $caminho = "img/". $_FILES['arquivo']['name'];

            echo "<br/>" .$caminho;

        }
        */
    ?>