<?php
include_once "../Controller/UsuarioController.php";
$usu = new UsuarioController();
$numUsu = $usu->ContarRegistros();




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css-site/pagina-admin.css" rel="stylesheet" type="text/css">

    <title>Usuários</title>
</head>
<body>
    <table class="table table-striped" id="tab-content">
        <thead class="thead-dark" style="font-weight: bold;">
                <tr>
                    <td><button class="btn btn-success" id="btnCadUsuario" onclick="AbrirModal()">Cadastrar Usuário</button></td>
                    <td>
                        <button class="btn btn-dark" style="cursor: default;">Usuários Cadastrados
                            <span class="badge badge-light"><?php echo $numUsu ?></span>
                            <span class="sr-only">unread messages</span>
                        </button>
                    </td>
                </tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th colspan="3">Acesso</th>
        </thead>
        <tbody>
            <?php
                $usuarios = $usu->consultarUsuarios();

                foreach($usuarios as $value):
                    
                    if($value->TIPO_USUARIO === "2"):
                        $value->TIPO_USUARIO = "Usuário";
                    elseif ($value->TIPO_USUARIO === "1"):
                        $value->TIPO_USUARIO = "Administrador";
                    endif;

            ?>
            <tr>
                <td><?php echo $value->NOME.' '.$value->SOBRENOME ?></td>
                <td><?php echo $value->CPF ?></td>
                <td><?php echo $value->EMAIL ?></td>
                <td><?php echo $value->TIPO_USUARIO ?></td>
                <td><button onclick=" editar(); " data-toggle="modal" data-target="#modalEditUsu" data-whateverid="<?php echo $value->ID ?>" data-whatevernome="<?php echo $value->NOME ?>" data-whateversobre="<?php echo $value->SOBRENOME  ?>" data-whatevercpf="<?php echo $value->CPF ?>" data-whateveremail="<?php echo $value->EMAIL ?>" data-whateversenha="<?php echo $value->SENHA ?>" data-whateveracesso="<?php echo $value->TIPO_USUARIO ?>" class="btn btn-primary" id="btnEditUsuario">Editar</button></td>
                <td><a href="../Controller/UsuarioController.php?id=<?php echo $value->ID ?>"><button class="btn btn-danger" id="btnApagarUsuario" onclick="ConfirmDelete()">Apagar</button></a></td>
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
   
</body>
</html>

 <!-- MODAL PARA CADASTRAR UM NOVO USUÁRIO -->
 <div class="modal fade" id="modalCadUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/UsuarioController.php">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="nomeUsuario" class="col-form-label">Nome:</label>
                        <input type="text" required class="form-control" name="nomeUsuario" placeholder="Nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome" class="col-form-label">Sobrenome:</label>
                        <input type="text" required class="form-control" name="sobrenomeUsuario" placeholder="Sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="cpfUsuario" class="col-form-label">Cpf:</label>
                        <input type="text" required  id="cpf" class="form-control" name="cpfUsuario" pattern="[0-9]+$" placeholder="Cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
                    </div>
                    <div class="form-group">
                        <label for="emailUsuario" class="col-form-label">Email:</label>
                        <input type="email" required class="form-control" name="emailUsuario" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="senhaUsuario" class="col-form-label">Senha:</label>
                                <input type="password" required class="form-control" autocomplete="on" placeholder="Senha" name="senhaUsuario">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="acessoUsuario" class="col-form-label">Acesso:</label>
                                <select required class="custom-select form-control" name="acessoUsuario">
                                    <option selected>Nível de Acesso</option>
                                    <option value="2">Usuário</option>
                                    <option value="1">Administrador</option>   
                                </select>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" name="btnCadastrarNovoUsuario">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL PARA ALTERAR UM USUÁRIO -->
<div class="modal fade" id="modalEditUsu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../Controller/Edit_UsuarioController.php">
            <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="idUsuario" id="idUsuario">
                        <label for="nomeUsuario" class="col-form-label" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">Nome:</label>
                        <input type="text" id="nomeUsuario"  class="form-control" name="nomeUsuario" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome" class="col-form-label">Sobrenome:</label>
                        <input type="text" id="sobreUsuario"  class="form-control" name="sobrenomeUsuario" placeholder="Sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="cpfUsuario" class="col-form-label">Cpf:</label>
                        <input type="text" id="cpfUsuario" class="form-control" name="cpfUsuario" placeholder="Cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
                    </div>
                    <div class="form-group">
                        <label for="emailUsuario" class="col-form-label">Email:</label>
                        <input type="email" id="emailUsuario" class="form-control" name="emailUsuario" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="senhaUsuario" class="col-form-label">Senha:</label>
                                <input type="password" id="senhaUsuario" current="current-password" autocomplete="on" class="form-control" name="senhaUsuario">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label  for="acessoUsuario" class="col-form-label">Acesso:</label>
                                <select class="custom-select" name="acessoUsuario" id="acessoUsuario">
                                    <option selected>Nível de Acesso</option>
                                    <option value="2">Usuário</option>
                                    <option value="1">Administrador</option>   
                                </select>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" name="btnAlterarUsuario">Alterar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="usuario.js"></script>
<script >

    $(document).ready(function(){
       $('#btnCadUsuario').click(function () {
          $('#modalCadUsu').modal('show');
       });
    });

    function editar()
    {

        $('#modalEditUsu').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)


        var recipientid = button.data('whateverid')
        var recipientNome = button.data('whatevernome');
        var recipientSobrenome= button.data('whateversobre');
        var recipientCpf = button.data('whatevercpf');
        var recipientEmail = button.data('whateveremail');
        var recipientSenha = button.data('whateversenha');
        

        var modal = $(this)

        modal.find('#idUsuario').val(recipientid);
        modal.find('#nomeUsuario').val(recipientNome);
        modal.find('#sobreUsuario').val(recipientSobrenome);
        modal.find('#cpfUsuario').val(recipientCpf);
        modal.find('#emailUsuario').val(recipientEmail);
        modal.find('#senhaUsuario').val(recipientSenha);
      
    });
    }

    function ConfirmDelete(){
        var c = confirm('Deseja realmente Excluir?');

        if (c == true){
            window.location = '../Controller/UsuarioController.php?id=<?php echo $value->ID ?>';
        }else {
            
        }
    }

</script>