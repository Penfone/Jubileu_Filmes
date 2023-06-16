<?php
    require_once("_sessao.php");
    require_once("_conexao/conexao.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        excluirFavorito($id, $conexao);
    } else {
        echo "ID não especificado.";
    }

    function excluirFavorito($id, $conexao) {
        $sql = "DELETE FROM favoritos WHERE idF = :id";
        $comandoSQL = $conexao->prepare($sql);
        $comandoSQL->bindValue(':id', $id, PDO::PARAM_INT);

        try {
            $comandoSQL->execute();

            if ($comandoSQL->rowCount() == 1) {
                header("Location: ./_favoritos.php");
                exit();
            } else {
                echo "Erro na exclusão.";
                echo("<pre>");
                $comandoSQL->debugDumpParams();
                echo("</pre>");
            }
        } catch (PDOException $erro) {
            echo("Código do Erro.: " . $erro->getCode());
            echo("Descrição......: " . $erro->getMessage());
        }
    }
?>
