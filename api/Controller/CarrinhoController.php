<?php
include_once "../Model/Carrinho.php";

session_start();




class CarrinhoController{

    function MostrarCarrinho($idUser){
        
        $cart = new Carrinho();

        $dadosCarrinho = $cart->MostrarCarrinho($idUser);

        return $dadosCarrinho;
    
    }

}