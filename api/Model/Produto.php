<?php
class Produto
{
   private $idProduto;
   private $nomeProduto;
   private $idCategoria;
   private $estoque;
   private $valor;
   private $img;
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

        function Cadastrar()
        {
            $stmt = $this->conn->prepare("INSERT INTO PRODUTOS (NOME_PRODUTO, IMAGEM, ID_CATEGORIA, ESTOQUE, VALOR_UNITARIO) VALUES (?,?,?,?,?)");

            $valores = array($this->nomeProduto, $this->img, $this->idCategoria, $this->estoque, $this->valor);

            if ($stmt->execute($valores)) {
                echo "<script>alert('Cadastro Efetuado com Sucesso!');</script>";
               
            } else {
                echo "<script>alert('Erro ao Cadastrar!');</script>";
            }


        }

        function Consultar(){

            $stmt = $this->conn->prepare("SELECT * FROM PRODUTOS ");

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        function Alterar($nomeProduto, $img, $idCategoria, $estoque, $valor,$idProduto){

            $stmt = $this->conn->prepare("UPDATE PRODUTOS SET NOME_PRODUTO = ?, IMAGEM = ?, ID_CATEGORIA = ?, ESTOQUE = ?, VALOR_UNITARIO = ? WHERE ID = ?");
    
            $valores = array($nomeProduto, $img, $idCategoria, $estoque, $valor, $idProduto);

            if ($stmt->execute($valores)){
                echo "
                <script>
                window.location = '../View/PaginaAdmin.php';
                 alert('Produto alterado com sucesso!');
                </script>
                ";
             }else{
                 echo "
                <script>
                window.location = '../View/PaginaAdmin.php';
                 alert('Erro ao alterar, tente novamente!');
                </script>
                ";
             }
     
         }

        
         function Excluir($idSelecionado){

        $stmt = $this->conn->prepare("DELETE FROM PRODUTOS WHERE ID = ?");
    
        $valor = array($idSelecionado);
    
        $stmt->execute($valor);
    
        }

        function ContarRegistros(){

        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM PRODUTOS");
    
        $stmt->execute();
    
        $res = $stmt->fetchColumn();
    
        return $res;
    
        }

        function PreencherPorId($id){
            
        $stmt = $this->conn->prepare("SELECT NOME_PRODUTO, IMAGEM, ID_CATEGORIA, ESTOQUE, VALOR_UNITARIO FROM PRODUTOS WHERE ID = ?");
    
        $valores = array($id);
    
        $stmt->execute($valores);
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        function SelecionarCategoria(){

            $stmt = $this->conn->prepare("SELECT * FROM CATEGORIA ORDER BY ID");

            $stmt->execute();

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

