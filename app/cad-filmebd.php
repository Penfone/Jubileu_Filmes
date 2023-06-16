<?php
   // require_once("_sessao.php");
/*
    echo("<pre>");

        print_r($_POST);
        print_r($_SERVER["REQUEST_METHOD"]);

    echo("</pre>");
*/

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
            $foto = "../imagens/noImg.jpg";
        }

        $titulo = filter_input(INPUT_POST,"titulo",FILTER_SANITIZE_SPECIAL_CHARS);
        $diretor = filter_input(INPUT_POST,"diretor",FILTER_SANITIZE_SPECIAL_CHARS);
        $nota = filter_input(INPUT_POST,"nota",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $nota_str = sprintf("%.2f", $nota);
        $ano = filter_input(INPUT_POST,"ano",FILTER_SANITIZE_NUMBER_INT);
        $fe = filter_input(INPUT_POST,"fe",FILTER_SANITIZE_SPECIAL_CHARS);
        $duracao = filter_input(INPUT_POST,"duracao",FILTER_SANITIZE_SPECIAL_CHARS);
        $gen1 = filter_input(INPUT_POST,"gen1",FILTER_SANITIZE_SPECIAL_CHARS);
        $gen2 = filter_input(INPUT_POST,"gen2",FILTER_SANITIZE_SPECIAL_CHARS);
        $gen3 = filter_input(INPUT_POST,"gen3",FILTER_SANITIZE_SPECIAL_CHARS);
        $gen4 = filter_input(INPUT_POST,"gen4",FILTER_SANITIZE_SPECIAL_CHARS);
        $sinopse = filter_input(INPUT_POST,"sinopse",FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            
            require_once("./_conexao/conexao.php");

            $comandoSQL = $conexao->prepare("            
                INSERT INTO `filmes` (
                    `titulo`,
                    `diretor`,
                    `nota`,
                    `ano`,
                    `fe`,
                    `duracao`,
                    `gen1`,
                    `gen2`,
                    `gen3`,
                    `gen4`,
                    `sinopse`,
                    `img`)
                VALUES (
                    :titulo,
                    :diretor,
                    :nota,
                    :ano,
                    :fe,
                    :duracao,
                    :gen1,
                    :gen2,
                    :gen3,
                    :gen4,
                    :sinopse,
                    :foto
                )
            ");

            $comandoSQL->execute(array(
                ':titulo'     => $titulo,
                ':diretor'     => $diretor,
                ':nota' => $nota,
                ':ano'    => $ano,
                ':fe'     => $fe,
                ':duracao'    => $duracao,
                ':gen1' => $gen1,
                ':gen2'    => $gen2,
                ':gen3'     => $gen3,
                ':gen4'    => $gen4,
                ':sinopse'   => $sinopse,
                ':foto' => $foto
            ));

            if($comandoSQL->rowcount() > 0){

                if(isset($flag)){
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $nome_final);
                }

                header("Location:./menu_filme.php");
                exit();
            }else{
                echo("Erro no registro.");
            }

            $conexao = null; // fechando a conexao com o banco
            
        } catch (PDOException $erro) {
            echo ("Entre em contato com o Administrador.");
        }

    }else{
        echo("Entre em contado com Administrador!");
    }