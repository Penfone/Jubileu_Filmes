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
        $fotobd = filter_input(INPUT_POST,"fotobd", FILTER_SANITIZE_SPECIAL_CHARS);


        require_once("./_conexao/conexao.php");

        $sql = "UPDATE `filmes` SET 
                    `titulo` = :titulo,
                    `diretor` = :diretor,
                    `nota` = :nota,
                    `ano` = :ano,
                    `fe` = :fe,
                    `duracao` = :duracao,
                    `gen1` = :gen1,
                    `gen2` = :gen2,
                    `gen3` = :gen3,
                    `gen4` = :gen4,
                    `sinopse` = :sinopse,
                    `img` = :foto
                WHERE `id` = :id";

        $comandoSQL = $conexao->prepare($sql);

            $comandoSQL->bindParam(':id', $id, PDO::PARAM_STR);
            $comandoSQL->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $comandoSQL->bindParam(':diretor', $diretor, PDO::PARAM_STR);
            $comandoSQL->bindParam(':nota', $nota_str, PDO::PARAM_STR);
            $comandoSQL->bindParam(':ano', $ano, PDO::PARAM_STR);
            $comandoSQL->bindParam(':fe', $fe, PDO::PARAM_STR);
            $comandoSQL->bindParam(':duracao', $duracao, PDO::PARAM_STR);
            $comandoSQL->bindParam(':gen1', $gen1, PDO::PARAM_STR);
            $comandoSQL->bindParam(':gen2', $gen2, PDO::PARAM_STR);
            $comandoSQL->bindParam(':gen3', $gen3, PDO::PARAM_STR);
            $comandoSQL->bindParam(':gen4', $gen4, PDO::PARAM_STR);
            $comandoSQL->bindParam(':sinopse', $sinopse, PDO::PARAM_STR);
            $comandoSQL->bindParam(':foto', $foto, PDO::PARAM_STR);

            


        $comandoSQL->execute();

        if($comandoSQL->rowCount() == 1){

            if(isset($flag)){
                move_uploaded_file($_FILES["foto"]["tmp_name"], $nome_final);

                unlink($dir_fotos.$fotobd);
            }

            header("Location:./menu_filme.php");
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