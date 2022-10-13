<?php
class Produto extends Conexao {
    private $idProduto;
    private $nomeProduto;
    private $imagem;
    private $idCategoria;
    private $estoque;
    private $valorUnitario;


    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        return $this->$atributo = $valor;
    }

    function cadastrar(){
        $conn = $this->Conectar();

        $stmt = $conn->prepare("INSERT INTO PRODUTOS (NOME_PRODUTO, IMAGEM, ID_CATEGORIA, ESTOQUE, VALOR_UNITARIO)
        VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("sbiid",$this->nomeProduto,$this->imagem,$this->idCategoria,$this->estoque,$this->valorUnitario);

        if ($stmt->execute()){
            echo "<script> alert('Produto Cadastrado!'); </script>";
        }else{
            echo "<script> alert('Erro ao cadastrar!'); </script>";
        }
        $stmt->close();
        $conn->close();
    }

    function consultar(){
        $conn = $this->Conectar();

        $stmt = $conn->prepare("SELECT ID, NOME_PRODUTO AS [PRODUTO], IMAGEM, NOME_CATEGORIA.CATEGORIA AS [CATEGORIA],ESTOQUE, VALOR_UNITARIO
        FROM PRODUTOS INNER JOIN CATEGORIA ON PRODUTO.ID_CATEGORIA = CATEGORIA.ID");

        if ($stmt->execute()){
            $stmt->bind_result($this->idProduto, $this->nomeProduto, $this->imagem, $this->idCategoria, $this->estoque, $this->valorUnitario);
            echo "
            <table>
            <thead>
            <tr>
            <th>ID</th>
            <th>PRODUTO</th>
            <th>IMAGEM</th>
            <th>CATEGORIA</th>
            <th>ESTOQUE</th>
            <th>VALOR UNITÁRIO</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($stmt->fetch()){
            ?>
            <tr>
            <td><?php echo $this->idProduto ?></td>
            <td><?php echo $this->nomeProduto ?></td>
            <td><?php echo $this->imagem ?></td>
            <td><?php echo $this->idCategoria ?></td>
            <td><?php echo $this->estoque ?></td>
            <td><?php echo $this->valorUnitario ?></td>
            <td><a href='../View/AlterarProduto.php?id=<?php echo $this->idProduto ?>' class='btn-floating orange'><i class='material-icons'>edit</i> </a></td>
            <td><a href='' class='btn-floating red'><i class='material-icons'>delete</i> </a></td>
            </tr>
            <?php
            }
            $stmt->close();
            $conn->close();
            ?>
            </tbody>
            </table>
            ";
        }


    }

    function alterar(){
        $conn = $this->Conectar();
    }

    function preencherProdutoPorId(){
        $conn = $this->Conectar();

        if(isset($_POST['id'])):
            $idSelecionado = $_POST['id'];

            $stmt = $conn->prepare("SELECT NOME_PRODUTO, IMAGEM, ID_CATEGORIA, ESTOQUE, VALOR_UNITARIO FROM PRODUTOS WHERE ID = ?");
            $stmt->bind_param("i", $id);
            $resultado = $stmt->execute();

            $dados = mysqli_fetch_array($resultado);

        endif;





    }

}
