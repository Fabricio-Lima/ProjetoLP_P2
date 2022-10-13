<?php
class Login{

    private $con;
    private $nome;
    private $email;
    private $senha;
    private $acesso;

    function __get($atributo)
    {
        return $this->$atributo;
    }
    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    function __construct()
    {
        include_once "Conexao.php";

        $classeCon = new Conexao();

        $this->con = $classeCon->Conectar();
    }

    function EntrarConta(){

        $stmt = $this->con->prepare("SELECT * FROM USUARIO WHERE EMAIL = ?");

        $valor = array($this->email);

        $stmt->execute($valor);

        if($stmt->rowCount() == 1){
            return $dados = $stmt->fetch();
        }else{
            echo "<script>alert('Este email não existe, crie um aconta!');</script>";
        }

    }

}