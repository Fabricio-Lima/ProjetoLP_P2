<?php
include_once "../Controller/ProdutoController.php";
$pro = new ProdutoController();
$numProd = $pro->ContarRegistros();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css-site/pagina-admin.css" rel="stylesheet" type="text/css">


    
</head>
<body>
    
        <table class="table table-striped" id="tab-content">
            <thead class="thead-dark">
                <tr>
                    <td><button type="button" data-toggle="modal" data-target="#modalCadProduto" class="btn btn-success" id="btnCadProduto">Cadastrar Produto</button></td>
                    <td> <button class="btn btn-dark" style="cursor:default">
                    Produtos Cadastrados <span class="badge badge-light"><?php echo $numProd; ?></span>
                    <span class="sr-only">unread messages</span>
                    </button></td>
                </tr>
            
                <th>Produto</th>
                
                <th>Preço</th>
                <th colspan="4">Estoque</th>
            </thead>
            <tbody>
                <?php
                
                    $produtos = $pro->consultarProdutos();
                
                    foreach ($produtos as $value){
                ?>
                <tr>
                    
                    <td><?php echo $value->NOME_PRODUTO ?></td>
                    
                    <td><?php echo "R$". number_format($value->VALOR_UNITARIO,2,',', '.' ) ?></td>
                    <td><?php echo $value->ESTOQUE ?></td>
                    <td></td>
                    <td><a href='#'><button data-toggle="modal" data-target="#modalEditProduto" data-whatever="<?php echo $value->ID ?>" data-whatevernome="<?php echo $value->NOME_PRODUTO  ?>" data-whateverimagem="<?php echo $value->IMAGEM;  ?>" data-whateveridcategoria="<?php echo $value->ID_CATEGORIA; ?>" data-whatevervalorunitario="<?php echo $value->VALOR_UNITARIO; ?>" data-whateverestoque="<?php echo $value->ESTOQUE; ?>" class="btn btn-primary" id="btnEditCategoria">Editar</button></a></td>
                    <td><a href="../Controller/ProdutoController.php?id=<?php echo $value->ID ?>"><button class="btn btn-danger" id="btnApagarProduto" onclick="ConfirmDe()">Apagar</button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        
     <div class="modal fade" id="modalCadProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/Cad_ProdutoController.php" enctype="multipart/form-data">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="nomeProduto" class="col-form-label">Nome do Produto:</label>
                        <input type="text" id="InputnomeProduto" required class="form-control" name="nomeProduto" placeholder="Produto" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
                        
                    </div>
                    <div class="form-group">
                        <label for="">Escolher Imagem:</label>
                        <input type="file" required class="form-control" accept="image/png, image/jpeg, image/jpg" name="imagemProduto">
                    </div>
                    <div class="form-group">
                        <label for="valorProduto" class="col-form-label">Preço:</label>
                        <input type="number" step="any" required  id="InputValorUnitario" class="form-control" name="valorProduto" placeholder="Preço">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="estoqueProduto" class="col-form-label">Estoque:</label>
                                <input type="number" required class="form-control"  placeholder="Estoque" name="estoqueProduto" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="categoriaProduto" class="col-form-label">Categoria:</label>
                                <select required class="custom-select form-control" name="categoriaProduto">
                                    <option selected>Categoria do Produto</option>
                                       <?php 
                                        $produtos = new ProdutoController();

                                        $numProd = $produtos->selecionarCategoria();

                                        foreach($numProd as $value):
                                        ?>
                                        <option value="<?php echo $value->ID ?>"><?php echo $value->NOME_CATEGORIA ?></option>
                                       <?php 
                                       endforeach;
                                       ?>
                                </select>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" name="btnCadastrarNovoProduto">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- MODAL PARA EDITAR PRODUTOS-->

<div class="modal fade" id="modalEditProduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/Edit_ProdutoController.php" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="idProduto" id="idProduto" >
                    </div>

                    <div class="form-group">
                        <label for="nomeProduto" class="col-form-label">Nome do Produto:</label>
                        <input type="text" id="InputnomeProduto" required class="form-control" name="nomeProduto" placeholder="Produto" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
                        
                    </div>
                    <div class="form-group">
                        <label for="">Escolher Imagem:</label>
                        <input type="file" id="InputimagemProduto" required class="form-control" accept="image/png, image/jpeg, image/jpg" name="imagemProduto">
                    </div>
                    <div class="form-group">
                        <label for="valorProduto" class="col-form-label">Preço:</label>
                        <input type="number" id="InputvalorUnitario" step="any" required  class="form-control" name="valorProduto" placeholder="Preço">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="estoqueProduto" class="col-form-label">Estoque:</label>
                                <input type="number" id="InputestoqueProduto" required class="form-control"  placeholder="Estoque" name="estoqueProduto" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="categoriaProduto" class="col-form-label">Categoria:</label>
                                <select required class="custom-select form-control" name="categoriaProduto">
                                    <option selected>Categoria do Produto</option>
                                       <?php 
                                        $produtos = new ProdutoController();

                                        $numProd = $produtos->selecionarCategoria();

                                        foreach($numProd as $value):
                                        ?>
                                        <option value="<?php echo $value->ID ?>"><?php echo $value->NOME_CATEGORIA ?></option>
                                       <?php 
                                       endforeach;
                                       ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="btnEditarProduto">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<script>

    $('#modalCadProduto').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        var modal = $(this);

    });

    $('#modalEditProduto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)


        var recipientid = button.data('whatever');
        var recipientNome = button.data('whatevernome');
        var recipientImagem = button.data('whateverimagem');
        var recipientidCategoria = button.data('whateveridcategoria');
        var recipientValorUnitario = button.data('whatevervalorunitario');
        var recipientEstoque = button.data('whateverestoque');

        var modal = $(this)

        modal.find('#idProduto').val(recipientid);
        modal.find('#InputnomeProduto').val(recipientNome);
        //modal.find('#InputimagemProduto').val(recipientImagem);
        modal.find('#InputidCategoria').val(recipientidCategoria);
        modal.find('#InputvalorUnitario').val(recipientValorUnitario);
        modal.find('#InputestoqueProduto').val(recipientEstoque);

    });


    function ConfirmDe(){
        var c = confirm('Deseja realmente Excluir?');

        if (c == true){
            window.location = '';
        }else {
            
        }
    }

</script>
  