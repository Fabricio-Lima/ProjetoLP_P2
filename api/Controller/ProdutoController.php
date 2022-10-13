<?php
include_once "../Model/Produto.php";


class ProdutoController{

function consultarProdutos(){

    $produto = new Produto();

    $produtos = $produto->Consultar();

    return $produtos;
}

function ContarRegistros(){

    $produto = new Produto();

    $numProdutos = $produto->ContarRegistros();

    return $numProdutos;
}

function selecionarCategoria(){
    $produto = new Produto();

    $cateProd = $produto->SelecionarCategoria();

    return $cateProd;
}


}
if (isset($_GET['id'])){
$idDelete = $_GET['id'];
$pro = new Produto();

$pro->Excluir($idDelete);

echo "
<script>
window.location = '../View/PaginaAdmin.php';
alert('Produto Exclúido com Sucesso!');
</script>
";
}