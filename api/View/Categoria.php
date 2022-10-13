<?php
   include_once "../Controller/CategoriaController.php";
   $cate = new CategoriaController();
   $numCate = $cate->ContarRegistros();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css-site/pagina-admin.css" rel="stylesheet" type="text/css">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categoria</title>
    <script>

    </script>
</head>

<body>
<table class="table table-striped" id="tab-content">
    <thead class="thead-dark" style="font-weight: bold">
    <tr style="border: none"><td>
            <button class="btn btn-success" id="btnCadCategoria">Cadastrar Categoria</button>
        </td>
        <td> <button class="btn btn-dark" style="cursor:default">
                Categorias Cadastradas <span class="badge badge-light"><?php echo $numCate ?></span>
                <span class="sr-only">unread messages</span>
            </button></td>
    </tr>
    <th>#</th>
    <th colspan="3">Categoria</th>
    </thead>
    <tbody>
    <?php
 

    $categorias = $cate->consultarCategorias();
    foreach ($categorias as $value){?>

    <tr>
        <td><?php echo $value->ID  ?></td>
        <td><?php echo $value->NOME_CATEGORIA ?></td>
        <td><a href='#'><button  data-toggle="modal" data-target="#modalEdit" data-whatevernome="<?php echo $value->NOME_CATEGORIA ?>" data-whatever="<?php echo $value->ID  ?>" class="btn btn-primary" id="btnEditCategoria">Editar</button></a></td>
        <td><a href=''><button class="btn btn-danger" onclick="ConfirmFun()">Apagar</button></a></td>
    </tr>
     <?php } ?>
    </tbody>
</table>

<!-- MODAL PARA CADASTRAR UMA NOVA CATEGORIA -->
<div class="modal fade" id="modalCad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/CadCategoriaController.php">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="nomeCategoria" class="col-form-label">Categoria:</label>
                        <input type="text" class="form-control" name="nomeCategoria" placeholder="Nome da Categoria">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" name="btnCadastrarNovaCategoria">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA EDITAR UMA CATEGORIA -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/Edit_CategoriaController.php">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="EditId" id="InputidCategoria" >
                    </div>

                    <div class="form-group">
                        <label for="nomeCategoria" class="col-form-label">Categoria:</label>
                        <input type="text" class="form-control" name="EditNome" id="InputnomeCategoria">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="btnEditarCategoria">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        $('#btnCadCategoria').click(function () {
            $('#modalCad').modal('show');
        });
    });


    $('#modalEdit').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget)


        var recipientid = button.data('whatever')
        var recipientNome = button.data('whatevernome');

        var modal = $(this)

        modal.find('#InputidCategoria').val(recipientid);
        modal.find('#InputnomeCategoria').val(recipientNome);
    });

    function ConfirmFun(){
        var c = confirm('Deseja realmente Excluir?');

        if (c == true){
            window.location = '../Controller/CategoriaController.php?id=<?php echo $value->ID ?>';
        }else {
            
        }
    }

</script>

</body>
</html>