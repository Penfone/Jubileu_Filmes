<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){

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
            $foto = "../imagens/user.png";
        }

        $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST,"senha1",FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            require_once("./_conexao/conexao.php");

            $comandoSQL = $conexao->prepare("            
                INSERT INTO `user` (
                    `nome`,
                    `email`,
                    `senha`,
                    `foto`)
                VALUES (
                    :nome,
                    :email,
                    :senha1,
                    :foto
                )
            ");

            $comandoSQL->execute(array(
                ':nome'     => $nome,
                ':email'    => $email,
                ':senha1'    => password_hash ($senha, PASSWORD_DEFAULT),
                ':foto' => $foto
            ));

            if($comandoSQL->rowcount() > 0){

                if(isset($flag)){
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $nome_final);
                }
                header("Location:./log-user.php");
                exit();
            }else{
                echo("Erro no registro");
            }

            $conexao = null; // fechando a conexao com o banco

            header("Location:./log-user.php");
            exit();


        } catch (PDOException $erro) {
            echo ("Entre em contato com o Administrador.");
        }

    }else{
        echo("Entre em contado com Administrador!");
    }