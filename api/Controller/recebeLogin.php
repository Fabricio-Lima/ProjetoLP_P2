<?php

include "../Model/ClasseEntrarConta.php";

if (isset($_POST['btnEntrar'])){

    $Entrar = new EntrarConta();

    $Entrar->emailLogin = $_POST['emailLogin'];
    $Entrar->senhaLogin = $_POST['senhaLogin'];

    if(empty($Entrar->emailLogin) || empty($Entrar->senhaLogin)){
        echo "Preencha os Campos!";
        echo "<br/>$Entrar->emailLogin --- $Entrar->senhaLogin";
    }else{
        $Entrar->Entrar();
    }


}