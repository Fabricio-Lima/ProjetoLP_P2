<?php
include_once "../Model/Usuario.php";

if(isset($_POST['btnAlterarUsuario'])){

    $usu = new Usuario();


    $usu->id = $_POST['idUsuario'];
    $usu->nomeUsuario = $_POST['nomeUsuario'];
    $usu->sobrenomeUsuario = $_POST['sobrenomeUsuario'];
    $usu->cpfUsuario = $_POST['cpfUsuario'];
    $usu->emailUsuario = $_POST['emailUsuario'];
    $usu->senhaUsuario = password_hash($_POST['senhaUsuario'], PASSWORD_DEFAULT);
    $usu->acessoUsuario = $_POST['acessoUsuario'];




    $usu->Alterar($usu->nomeUsuario, $usu->sobrenomeUsuario, $usu->cpfUsuario, $usu->emailUsuario, $usu->senhaUsuario, $usu->acessoUsuario, $usu->id);


}
