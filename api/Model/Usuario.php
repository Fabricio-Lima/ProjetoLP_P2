<?php

class Usuario
{
   private $id;
   private $nome;
   private $sobrenome;
   private $cpf;
   private $email;
   private $senha;
   private $acesso;
   private $conn;

   private $erro = [];

   public function __construct()
   {
       include_once "Conexao.php";
       $classeCon = new Conexao();
       $this->conn = $classeCon->Conectar();
   }

   public function __get($atributo)
   {
       return $this->$atributo;
   }

   public function __set($atributo, $valor)
   {
       return $this->$atributo = $valor;
   }

    function ValidaCPF($cpf){

        $digitoA = 0;
        $digitoB = 0;

        $cpf = preg_replace('/[^0-9]/','',$cpf);

        for ($i = 0, $x =10; $i <= 8; $i++,$x--){
            $digitoA += $cpf[$i] * $x;
        }

       for ($i = 0, $x = 11; $i <= 9; $i++,$x--){

           if(str_repeat($i, 11) == $cpf){

               return false;
           }

         $digitoB += $cpf[$i] * $x;
       }

        $somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
        $somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);



        if ($somaA != $cpf[9] || $somaB != $cpf[10]){
            return false;
        }else{
            return true;
        }
    }

    function CriptografarSenha($senha){

        $options = ['cost' => 10];

        if($senha = password_hash($senha, PASSWORD_DEFAULT, $options)):
            return $senha;
        endif;

    }


         function verificarCampos(){
            if(empty($this->nome) || empty($this->sobrenome) || empty($this->cpf) || empty($this->email) || empty($this->senha)){
                
                return true;
            }else{
            return false;
            }
        }


        function verificarEmailExistente($email){

            $stmt = $this->conn->prepare("SELECT * FROM USUARIO WHERE EMAIL = '?'");

            $valores = array($email);

            $stmt->execute($valores);

            $linhas = $stmt->fetch();

            var_dump($linhas);

            if (count($linhas) != 0){
                return true;
            }else{
                return false;
            }

        }



      function Cadastrar()
        {
            $stmt = $this->conn->prepare("INSERT INTO USUARIO (NOME, SOBRENOME, CPF, EMAIL, SENHA, TIPO_USUARIO) VALUES (?,?,?,?,?,?)");

            $valores = array($this->nome, $this->sobrenome, $this->cpf, $this->email, $this->senha, $this->acesso);

            if ($stmt->execute($valores)) {
                echo "<script>alert('Cadastro Efetuado com Sucesso!');</script>";
                echo "<script>window.location='../index.php';</script>";
            } else {
                echo "<script>alert('Erro ao Cadastrar!');</script>";
            }


        }

        function Consultar(){

            $stmt = $this->conn->prepare("SELECT * FROM USUARIO ORDER BY ID");

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        function Alterar($nome, $sobrenome, $cpf, $email, $senha, $acesso, $id){

            $stmt = $this->conn->prepare("UPDATE USUARIO SET NOME = ?, SOBRENOME = ?, CPF = ?, EMAIL = ?, SENHA = ? , TIPO_USUARIO = ? WHERE ID = ?");
    
            $valores = array($nome, $sobrenome, $cpf, $email, $senha, $acesso, $id);

            if ($stmt->execute($valores)){
             
             }else{
              
             }
     
         }

        function Excluir($idSelecionado){

        $stmt = $this->conn->prepare("DELETE FROM USUARIO WHERE ID = ?");
    
        $valores = array($idSelecionado);
    
        $stmt->execute($valores);
    
        }
        function ContarRegistros(){

        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM USUARIO");
    
        $stmt->execute();
    
        $res = $stmt->fetchColumn();
    
        return $res;
    
        }
        function PreencherPorId($id){
            
        $stmt = $this->conn->prepare("SELECT NOME, SOBRENOME, CPF, EMAIL, SENHA, TIPO_ACESSO FROM USUARIO WHERE ID = ?");
    
        $valores = array($id);
    
        $stmt->execute($valores);
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        }



}
/*
require_once 'Projeto_Ecommerce/Conexao.php';

$nomeRecebido = $_POST['nome'];
$sobreRecebido = $_POST['sobrenome'];
$cpfRecebido = $_POST['cpf'];
$emailRecebido = $_POST['email'];
$senhaRecebida = $_POST['senha'];


$stmt = $conn->prepare("INSERT INTO USUARIO (NOME, SOBRENOME, CPF, EMAIL, SENHA) VALUES (?,?,?,?,?)");


$stmt->bind_param("sssss", $nomeRecebido,$sobreRecebido,$cpfRecebido,$emailRecebido,md($senhaRecebida));
*/

