<?php
include_once "../Model/Usuario.php";

$usu = new Usuario();

$usu->nome = $_POST['nome'];
$usu->sobrenome = $_POST['sobrenome'];
$usu->cpf = $_POST['cpf'];
$usu->email = $_POST['email'];
$usu->senha = $_POST['senha'];

if (!empty($usu->nome) || empty($usu->sobrenome) || empty($usu->cpf) || empty($usu->email) || empty($usu->senha)) {

    if (!$email = filter_input(INPUT_POST, $usu->email, FILTER_VALIDATE_EMAIL) === false) {

        if ($usu->ValidaCPF($usu->cpf)) {

            $usu->senha = $usu->CriptografarSenha($usu->senha);


            if ($usu->verificarEmailExistente($usu->email)) {

                $usu->Cadastrar();
            }
            else{
                echo "<script>alert('O email digitado já está em uso!');
                window.location = '../View/CadastrarUsuario.php';
              
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

