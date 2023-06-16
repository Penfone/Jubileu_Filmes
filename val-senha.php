<?php
    // valida se os dados vieram pelo método POST
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        require_once("./app/_conexao/conexao.php");

        $usuario = filter_input(INPUT_POST,"usuario", FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST,"senha", FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            $comandoSQL = "SELECT * FROM user WHERE email = :usuario";

            $comandoSQL = $conexao->prepare($comandoSQL);

            $comandoSQL->bindParam(":usuario",$usuario);

            $comandoSQL->execute();

            if($comandoSQL->rowCount() > 0){
                
                $linha = $comandoSQL->fetch();

                if(password_verify($senha, $linha["senha"])){

                    session_start();
                    $_SESSION["nome"] = $linha["nome"];
                    $_SESSION["adm"] = $linha["adm"]; // 0 usuário 1 administrador
                    $_SESSION["foto"] = $linha["foto"];
                    $_SESSION["id"] = $linha["id"];

                    header("Location:./index.php");
                    exit();
                }else{
                    header("Location:./app/log-user.php?status=erroSenha");
                    exit();
                }
                 
            }else{
                header("location:./app/log-user.php?status=erroUsuario");
                exit();
            }            

        } catch (PDOException $erro) {
            echo "Erro..: ".$erro->getMessage();
        }
    }
    else{
        //echo("Entre em contato com o Administrador.");
        header("location:./app/log-user.php");
        exit();
    }