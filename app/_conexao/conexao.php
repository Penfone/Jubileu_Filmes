<?php
    $dns = "mysql:host=localhost;dbname=jubileu";
    $user = "root";
    $pass = "";

    try{
        
        $conexao = new PDO($dns, $user, $pass);

    }catch(PDOException $erro){
        
        // echo("Código de Erro = ".$erro->getCode()."<br>");
        // echo("Descrição do Erro = ".$erro->getMessage());
        
        
        echo("Entre em contato com o Administrador.");

    }