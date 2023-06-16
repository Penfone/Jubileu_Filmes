<?php
require_once("_sessao.php");

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
     $usuario = $_SESSION['id'];
     $filme = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);

     try {
         
         require_once("./_conexao/conexao.php");

         $comandoSQL = $conexao->prepare("            
             INSERT INTO `favoritos` (
                 `id_user`,
                 `id_filme`)
             VALUES (
                 :usuario,
                 :filme
             )
         ");

         $comandoSQL->execute(array(
             ':usuario'     => $usuario,
             ':filme'     => $filme
         ));

         if($comandoSQL->rowcount() > 0){

             header("Location:./_favoritos.php");
             exit();
         }else{
             echo("Erro no registro.");
         }

         $conexao = null; // fechando a conexao com o banco
         
     } catch (PDOException $erro) {
         $comandoSQL->debugDumpParams();
         print_r($comandoSQL->errorInfo());
         echo ("Entre em contato com o Administrador.");
     }

 }else{
     echo("Entre em contado com Administrador!");
 }