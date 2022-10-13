<?php
include_once "../Model/Categoria.php";

$cat = new Categoria();

//CADASTRAR NOVA CATEGORIA
if(isset($_POST['btnCadastrarNovaCategoria'])){

    $cat->nomeCategoria = $_POST['nomeCategoria'];

    $cat->Cadastrar();

}

