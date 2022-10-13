<?php
class Conexao{


    function Conectar(){
        try {

            $con = new pdo("mysql:host=localhost:3308;dbname=BDECOMMERCE","root", "");

            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $con;


        }catch (PDOException $erro){
            return $erro->getMessage();
        }

    }

}




