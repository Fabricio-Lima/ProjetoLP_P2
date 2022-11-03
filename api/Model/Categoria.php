<?php

class Categoria {


    private $idCategoria;
    private $nomeCategoria;
    private $conn;


    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function __construct()
    {
        include_once "Conexao.php";

        $classeCon = new Conexao();

        $this->conn = $classeCon->Conectar();
    }

    function Cadastrar(){

        $stmt = $this->conn->prepare("INSERT INTO CATEGORIA (NOME_CATEGORIA) VALUES (?)");

        $valores = array($this->nomeCategoria);

        if ($stmt->execute($valores)){
            echo "<script>
                 window.location = '../View/PaginaAdmin.php';
                alert('Cadastro efetuado com Sucesso!');
                </script>";
        }else{
            echo "<script>
                 window.location = '../View/PaginaAdmin.php';
                alert('Erro ao Cadastrar, Tente Novamente!');
                </script>";
        }


    }
    function Consultar(){
        $stmt = $this->conn->prepare("SELECT ID, NOME_CATEGORIA FROM CATEGORIA ORDER BY ID");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function Alterar($nome, $id){

        $stmt = $this->conn->prepare("UPDATE CATEGORIA SET NOME_CATEGORIA = ? WHERE ID = ?");

        $valores = array($nome, $id);

        if ($stmt->execute($valores)){
           echo "
           <script>
           window.location = '../View/PaginaAdmin.php';
            alert('Categoria alterada com Sucesso!');
           </script>
           ";
        }else{
            echo "
           <script>
           window.location = '../View/PaginaAdmin.php';
            alert('Erro ao alterar, Tente Novamente!');
           </script>
           ";
        }

    }

    function Excluir($idSelecionada){

        $stmt = $this->conn->prepare("DELETE FROM CATEGORIA WHERE ID = ?");

        $valores = array($idSelecionada);

        $stmt->execute($valores);



    }

    function ContarRegistros(){

        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM CATEGORIA");

        $stmt->execute();

        $res = $stmt->fetchColumn();

       return $res;

    }

    function PreencherPorId($id){
        $stmt = $this->conn->prepare("SELECT NOME_CATEGORIA FROM CATEGORIA WHERE ID = ?");

        $valores = array($id);

        $stmt->execute($valores);

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
}


