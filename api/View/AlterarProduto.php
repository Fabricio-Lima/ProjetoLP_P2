<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="../Controller/recebeAlterarProduto.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nomeProduto" placeholder="nome" ><br/><br/>
    <input type="file" name="imagem" placeholder=""><br/><br/>
    <select name="categoria" >
        <option value=""></option>
        <option value="">Teste</option>
    </select><br/><br/>
    <input type="number" name="estoque" placeholder="Estoque"/><br/><br/>
    <input type="number" step="any" name="valorUnitario" placeholder="Valor"/><br/><br/>
    <input type="submit" value="Alterar">
</form>
</body>
</html>