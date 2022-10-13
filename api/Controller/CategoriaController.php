<?php
include_once "../Model/Categoria.php";



class CategoriaController{

    function consultarCategorias(){

        $categoria = new Categoria();

        $categorias = $categoria->Consultar();

        return $categorias;
    }
    
    function ContarRegistros(){

        $categoria = new Categoria();

        $numCategorias = $categoria->ContarRegistros();

        return $numCategorias;
    }


}
if (isset($_GET['id'])){
    $idDelete = $_GET['id'];
    $cat = new Categoria();

    $cat->Excluir($idDelete);

    echo "
    <script>
    window.location = '../View/PaginaAdmin.php';
    alert('Categoria Excluida com Sucesso!');
    </script>
    ";
}