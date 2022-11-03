<?php

class Carrinho{

private $idCarrinho;
private $idUsuario;
private $idProduto;
private $nomeProduto;
private $valorProduto;
private $quantidade;
private $subtotal;
private $conn;

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

   function AdicionarAoCarrinho(){

        $stmt = $this->conn->prepare("INSERT INTO CARRINHO (ID_USUARIO, ID_PRODUTO, NOME_PRODUTO, VALOR_PRODUTO, QUANTIDADE
        ,SUBTOTAL) VALUES (?,?,?,?,?,?)");

        $valores = array($this->idUsuario,$this->idProduto,$this->nomeProduto,$this->valorProduto,$this->quantidade,$this->subtotal);

        try
        {
            $stmt->execute($valores);
        }
        catch(PDOException $erro)
        {
            echo $erro->getMessage();
        }

   }

   function VerificaProdutoExistente($idUsuarioCarinho, $idProduto){

        $stmt = $this->conn->prepare("SELECT * FROM CARRINHO WHERE ID_USUARIO = ? AND ID_PRODUTO = ?");

        $valores = array($idUsuarioCarinho, $idProduto);

        $stmt->execute($valores);

        $resultado = $stmt->fetch();

        if(count($resultado) != 0){
            return false;
        }else{
            return true;
        }

    }

    function RemoverDoCarrinho($idUsuarioCarinho, $idProduto){

        $stmt = $this->conn->prepare("DELETE FROM CARRINHO WHERE ID_USUARIO = ? AND ID_PRODUTO = ?");

        $valores = array($idUsuarioCarinho, $idProduto);

        try
        {
            $stmt->execute($valores);
        }
        catch(PDOException $erro)
        {
            echo $erro->getMessage();
        }

    }

    function MostrarCarrinho($idUsuarioCarinho){

        $stmt = $this->conn->prepare("SELECT * FROM CARRINHO WHERE ID_USUARIO = ?");

        $valor = array($idUsuarioCarinho);

        $stmt->execute($valor);

        return $carrinho = $stmt->fetchAll(PDO::FETCH_OBJ);

    }


}




