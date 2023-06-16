<?php
include "_conexao/conexao.php";

function buscar() {
    global $conexao;

    $query = "SELECT * from filmes where titulo = :busca";
    $comandoSQL = $conexao->query($query);

}

function lancamentos() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where nota >= '8'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function acao() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '1' OR gen2 = '1' OR gen3 = '1' OR gen4 = '1'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function animacao() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '2' OR gen2 = '2' OR gen3 = '2' OR gen4 = '2'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function aventura() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '3' OR gen2 = '3' OR gen3 = '3' OR gen4 = '3'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function comedia() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '4' OR gen2 = '4' OR gen3 = '4' OR gen4 = '4'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function drama() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '7' OR gen2 = '7' OR gen3 = '7' OR gen4 = '7'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}
function familia() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '8' OR gen2 = '8' OR gen3 = '8' OR gen4 = '8'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function fantasia() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '9' OR gen2 = '9' OR gen3 = '9' OR gen4 = '9'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function ficcao() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '10' OR gen2 = '10' OR gen3 = '10' OR gen4 = '10'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function guerra() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '11' OR gen2 = '11' OR gen3 = '11' OR gen4 = '11'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function misterio() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '12' OR gen2 = '12' OR gen3 = '12' OR gen4 = '12'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function policial() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '13' OR gen2 = '13' OR gen3 = '13' OR gen4 = '13'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function romance() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '14' OR gen2 = '14' OR gen3 = '14' OR gen4 = '14'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function suspense() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '15' OR gen2 = '15' OR gen3 = '15' OR gen4 = '15'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

function terror() {
    global $conexao; // Acesso à conexão PDO

    // Substitua 'seu_tabela' pelo nome da tabela no seu banco de dados
    $query = "SELECT id, titulo, img FROM filmes where gen1 = '16' OR gen2 = '16' OR gen3 = '16' OR gen4 = '16'";
    $comandoSQL = $conexao->query($query);

    $filmes = $comandoSQL->fetchAll(PDO::FETCH_ASSOC);
    return $filmes;
}

?>
