<?php

include_once "Conexao.php";





class EntrarConta extends Conexao {

    private $emailLogin;
    private $senhaLogin;

    function __get($atributo)
    {
        return $this->$atributo;
    }
    function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function Entrar(){


        $query = "SELECT * FROM USUARIO WHERE EMAIL = ? AND SENHA = ?";


        $stmt = $this->Conectar()->prepare($query);

        $stmt->bindParam('ss', $this->emailLogin, $this->senhaLogin);

        $options = ['cost' => 10];

        if($hash = password_hash($this->senhaLogin, PASSWORD_DEFAULT, $options));

        $this->senha = $this->VerificarSenha($hash);

        if ($stmt->execute()):
            header('location: index.php');
        else:
            echo "Erro";
        endif;


    }

    function VerificarSenha($hash){
        if (password_verify($this->senhaLogin,$hash)):
            endif;
    }



}