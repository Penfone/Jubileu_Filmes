<?php
    require_once("_sessao.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id= filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);    


        require_once("./_conexao/conexao.php");

        $sql = "DELETE FROM `user`
                WHERE `id` = :id";

        $comandoSQL = $conexao->prepare($sql);

            $comandoSQL->bindParam(':id', $id, PDO::PARAM_STR);    

        $comandoSQL->execute();

        if($comandoSQL->rowCount() == 1){
            header("Location:./menu_users.php");
                exit();
        }else{
            echo "Erro na atualização.";

            echo("<pre>");
                $comandoSQL->debugDumpParams();
            echo("</pre>");
        }

    }else{
        echo("Entre em contado com Administrador!");
    }
        
    $conexao=null;