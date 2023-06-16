<?php
    // require_once("_sessao.php");
    
    require_once("./_conexao/conexao.php");

    try{
        // comando SQL para buscar todos os registros da tabela
        $sql = "SELECT * FROM favoritos, filmes WHERE id_user = :id and filmes.id = favoritos.id_filme";
        // prepara a consulta
        $consulta = $conexao->prepare($sql);
        // vincula o valor do ID à consulta
        $consulta->bindValue(':id', $_SESSION['id']);
        // executa a consulta
        $consulta->execute();
        // obtém os dados retornados
        $dados = $consulta->fetchAll();
        // calcula o total de registros lidos da tabela
        $totalRegistros = $consulta->rowCount();

    }catch(PDOException $erro){
        echo("Código do Erro.: ".$erro->getCode());
        echo("Descrição......: ".$erro->getMessage());
    }
