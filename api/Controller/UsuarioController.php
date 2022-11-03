<?php
include_once "../Model/Usuario.php";

class UsuarioController{

    function consultarUsuarios(){

        $usuario = new Usuario;

        $usuarios = $usuario->Consultar();

        return $usuarios;

    }

    function ContarRegistros(){

        $usuario = new Usuario();

        $usuarios = $usuario->ContarRegistros();

        return $usuarios;
    }

}

if(isset($_POST['btnCadastrarNovoUsuario'])){

    $usuario = new Usuario();

    $usuario->nome = $_POST['nomeUsuario'];
    $usuario->sobrenome = $_POST['sobrenomeUsuario'];
    $usuario->cpf = $_POST['cpfUsuario'];
    $usuario->email = $_POST['emailUsuario'];
    $usuario->senha = $_POST['senhaUsuario'];
    $usuario->acesso = $_POST['acessoUsuario'];



    if (!empty($usuario->nome) || empty($usuario->sobrenome) || empty($usuario->cpf) || empty($usuario->email) || empty($usuario->senha) || empty($usuario->acesso)) {

        if (!$email = filter_input(INPUT_POST, $usuario->email, FILTER_VALIDATE_EMAIL) === false) {

            if ($usuario->ValidaCPF($usuario->cpf)) {

                $usuario->senha = $usuario->CriptografarSenha($usuario->senha);


                if ($usuario->verificarEmailExistente($usuario->email)) {

                    $usuario->Cadastrar();
                }
                else{
                    echo "<script>alert('O email digitado já está cadastrado!');
                
              
                </script>";
                }

            }
            else {
                echo "<script>alert('CPF inválido!');</script>";
            }

        }
        else{
            echo "<script>alert('Email inválido!');</script>";
        }
    }
    else{
        echo "<script>alert('Preecha os Campos!');</script>";
    }

}

if (isset($_GET['id'])){
    $idDelete = $_GET['id'];
    $usu = new Usuario();

    $usu->Excluir($idDelete);

}