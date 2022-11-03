<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] != true){
    //echo "<script>window.location = '../View/EntrarConta.php'</script>";
}else{
var_dump($_SESSION);

echo "Olá, " . $_SESSION['nomeUsuario'];
}
