<?php
    require_once("_sessao.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(!empty($_FILES['foto']['name'])){
            //diretorio que sava as fotos do usuario
            $dir_fotos ="../fotos/";

            //tira espaços
            $nome_original = str_replace(" ","_",basename($_FILES['foto']['name']));

            //criando um token pra ser adcionado ao nome do arq
            $token = md5(uniqid(rand(),true));

            $nome_final = $dir_fotos.$token.$nome_original;

            $flag = true;

            if (!getimagesize($_FILES['foto']['tmp_name']) > 2000000){
                $flag = false;
            }

            $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

            if( ($extensao != "jpg") && ($extensao != "gif") &&
                ($extensao != "bpm") && ($extensao != "jpeg") &&
                ($extensao != "png") && ($extensao != "webp")){
                    $flag = false;
                }

            if($flag){
                $foto = $token.$nome_original;
            }

        }else{
            $foto = filter_input(INPUT_POST,"fotobd", FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $id= filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST,"senha1",FILTER_SANITIZE_SPECIAL_CHARS);
        if($senha!="********"){
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        }
        $fotobd = filter_input(INPUT_POST,"fotobd", FILTER_SANITIZE_SPECIAL_CHARS);


        require_once("./_conexao/conexao.php");

        if($senha != "********"){

        $sql = "UPDATE `user` SET 
                    `nome` = :nome,
                    `email` = :email,
                    `senha` = :senha1,
                    `foto` = :foto
                WHERE `id` = :id";

        $comandoSQL = $conexao->prepare($sql);

            $comandoSQL->bindParam(':id', $id, PDO::PARAM_STR);
            $comandoSQL->bindParam(':nome', $nome, PDO::PARAM_STR);
            $comandoSQL->bindParam(':email', $email, PDO::PARAM_STR);
            $comandoSQL->bindParam(':senha1', $senha, PDO::PARAM_STR); 
            $comandoSQL->bindParam(':foto', $foto, PDO::PARAM_STR);         
        }else{

            $sql = "UPDATE `user` SET 
                    `nome` = :nome,
                    `email` = :email,
                    `foto` = :foto
                WHERE `id` = :id";

        $comandoSQL = $conexao->prepare($sql);

            $comandoSQL->bindParam(':id', $id, PDO::PARAM_STR);
            $comandoSQL->bindParam(':nome', $nome, PDO::PARAM_STR);
            $comandoSQL->bindParam(':email', $email, PDO::PARAM_STR);
            $comandoSQL->bindParam(':foto', $foto, PDO::PARAM_STR); 

        }


        $comandoSQL->execute();

        if($comandoSQL->rowCount() == 1){

            if(isset($flag)){
                move_uploaded_file($_FILES["foto"]["tmp_name"], $nome_final);

                unlink($dir_fotos.$fotobd);
            }

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