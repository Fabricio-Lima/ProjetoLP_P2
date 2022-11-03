<?php
include_once "../Model/Produto.php";

//EDITAR PRODUTO
if(isset($_POST['btnEditarProduto'])){

    $pro = new Produto();

    $pro->idProduto = $_POST['idProduto'];
    $pro->nomeProduto = $_POST['nomeProduto'];
    $pro->idCategoria = $_POST['categoriaProduto'];
    $pro->estoque = $_POST['estoqueProduto'];
    $pro->valor = $_POST['valorProduto'];
    $pro->img = $_FILES['imagemProduto'];

   
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
    var_dump($pro->img);
     
    $pro->Alterar($pro->nomeProduto, $pro->img, $pro->idCategoria, $pro->estoque, $pro->valor, $pro->idProduto);

}