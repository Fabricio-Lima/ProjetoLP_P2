<?php
include_once "../Model/Login.php";

session_start();

var_dump($_POST);

if(isset($_POST['emailLogin']) && isset($_POST['senhaLogin'])){

    $login = new Login();

    $login->email = $_POST['emailLogin'];
    $login->senha = $_POST['senhaLogin'];

    $dadosLogin = $login->EntrarConta();

    if(password_verify($login->senha, $dadosLogin['SENHA'])){
        $_SESSION['login'] = true;
        $_SESSION['idUsuario'] = $dadosLogin['ID'];
        $_SESSION['nomeUsuario'] = $dadosLogin['NOME'];
        $_SESSION['acesso'] = $dadosLogin['TIPO_USUARIO'];

       echo "<script>window.location = '../index.php'</script>";
    
    }else{
        session_destroy();

        $_SESSION['login'] = false;
        var_dump($_SESSION);
        echo "Email ou Senha Inválidos!";
       // echo "<script>window.location = '../View/testeLogin.php'</script>";
    }

}