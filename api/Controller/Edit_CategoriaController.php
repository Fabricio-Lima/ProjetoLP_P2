<?php
include_once "../Model/Categoria.php";

//EDITAR CATEGORIA
if(isset($_POST['btnEditarCategoria'])){

    $cat = new Categoria();

    var_dump($_POST['btnEditarCategoria']);

    $cat->idCategoria = $_POST['EditId'];
    $cat->nomeCategoria = $_POST['EditNome'];

    $cat->Alterar($cat->nomeCategoria, $cat->idCategoria);


}
