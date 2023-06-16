<?php
    require_once("./_sessao.php");

    if(!($_SESSION['adm'])==1){
    header("location:../index.php");
    exit();
    }

?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="ISO-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="imagem/svg" href="../imagens/logo2.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styleOthers.css">
        <title>Jubileu Filmes</title>
        
    </head>
    <body>

    <?php
                    function getGenre($genre) {
                        if ($genre == 1) {
                            return "Ação";
                        } else if ($genre == 2) {
                            return "Animação";
                        } else if ($genre == 3) {
                            return "Aventura";
                        } else if ($genre == 4) {
                            return "Comédia";
                        }else if ($genre == 5) {
                            return "Crime";
                        }else if ($genre == 6) {
                            return "Documentário";
                        }else if ($genre == 7) {
                            return "Drama";
                        }else if ($genre == 8) {
                            return "Família";
                        }else if ($genre == 9) {
                            return "Fantasia";
                        }else if ($genre == 10) {
                            return "Ficção Científica";
                        }else if ($genre == 11) {
                            return "Guerra";
                        }else if ($genre == 12) {
                            return "Mistério";
                        }else if ($genre == 13) {
                            return "Policial";
                        }else if ($genre == 14) {
                            return "Romance";
                        }else if ($genre == 15) {
                            return "Suspense";
                        }else if ($genre == 16) {
                            return "Terror";
                        }else {
                            return "---";
                        }
                    }

                    function getCat($cat) {
                        if ($cat == 1) {
                            return "Livre";
                        } else if ($cat == 2) {
                            return 10;
                        } else if ($cat == 3) {
                            return 12;
                        } else if ($cat == 4) {
                            return 14;
                        }else if ($cat== 5) {
                            return 16;
                        }else if ($cat == 6) {
                            return 18;
                        }
                    }

                    ?>

            
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light" id="home">
            <a class="navbar-brand" href="../index.php"><img class="logo" src="../imagens/logoRev3.png" alt=""> Jubileu Filmes </a>
                
            <ul class="navbar-nav ml-auto" style="margin-right:2rem;"> <!-- adiciona ml-auto para empurrar o dropdown para a direita -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                  <?php
                    echo $_SESSION["nome"];
                  ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <!-- adiciona dropdown-menu-right para alinhar o menu do dropdown à direita -->
                <a class="dropdown-item" href="./cad-filme.php">Cadastrar Filmes</a>
                  <!-- <a class="dropdown-item" href="./menu_filme.php">Menu de Filmes</a> -->
                  <a class="dropdown-item" href="./menu_users.php">Menu de Usuário</a>
                  <a class="dropdown-item" href="./_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="../fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.5px solid black">
              </li>
            </ul>  


        </nav>

        <div>
            <br>
            <h1>Menu Filmes</h1>
            <br>
        </div>

        <!-- Fim menu -->

        <div class="container">

                <!-- <label>Pesquise por Nome do Filme:</label> -->
                <input type="text" id="filtro" placeholder="Buscar..." style="width:100%; border: 3px solid black; border-radius:5%">
                <br><br><br>
        </div> 


    <div class="tab">
        <table id="tabela-filmes">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th width="40">TITULO</th>
                    <th width="50">DIRETOR</th>
                    <th width="40">NOTA</th>
                    <th width="40">ANO</th>
                    <th width="40">FAIXA ETÁRIA</th>
                    <th width="50">DURAÇÃO</th>
                    <th width="50">Gên. 1</th>
                    <th width="50">Gên. 2</th>
                    <th width="50">Gên. 3</th>
                    <th width="50">Gên. 4</th>
                    <th>SINOPSE</th>
                    <th width="50">ALT</th>
                    <th width="50">EXC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("./menu_filmebd.php");
                    if($totalRegistros > 0){
                        foreach($dados as $linha){

                ?>
                <tr class="filme">

                    <td><?= $linha["id"];?></td>
                    <td><?= $linha["titulo"];?></td>
                    <td><?= $linha["diretor"];?></td>
                    <td><?= $linha["nota"]."/10";?></td>
                    <td><?= $linha["ano"];?></td>
                    <td><?= getCat($linha["fe"]);?></td>
                    <td><?= $linha["duracao"];?></td>
                    <td><?= getGenre($linha["gen1"]);?></td>
                    <td><?= getGenre($linha["gen2"]);?></td>
                    <td><?= getGenre($linha["gen3"]);?></td>
                    <td><?= getGenre($linha["gen4"]);?></td>
                    <td class="sinopse">
            <textarea readonly rows="5" cols="50"><?= $linha["sinopse"];?></textarea>
        </td>
                    <td align="center">
                        <a href="./alt-filme.php?id=<?= $linha['id'];?>">
                            <img src="../imagens/folder.png" alt="Atualizar" width="30">
                        </a>
                    </td>


                    <td align="center">
                        <a href="./exc-filme.php?id=<?= $linha['id'];?>">
                            <img src="../imagens/delete.png" alt="Excluir" width="30">
                        </a>
                    </td>
                </tr>
                <?php
                        }
                    }
                    else{
                        echo("
                            <tr>
                                <td colspan=6>
                                    NÃO HÁ REGISTROS GRAVADOS.
                                </td>
                            </tr>
                        ");
                    }
                ?>
            </tbody>
        </table>
    </div>

    <br><br><br><br>

    <script>
            document.getElementById('filtro').addEventListener('input', function() {
            var filtro = this.value.toLowerCase();
            var filmes = document.querySelectorAll('#tabela-filmes tbody .filme');

            filmes.forEach(function(filme) {
            var nomeFilme = filme.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (nomeFilme.includes(filtro)) {
            filme.style.display = 'table-row';
            } else {
            filme.style.display = 'none';
            }
            });

            var tabela = document.getElementById('tabela-filmes');
            tabela.classList.add('show');
            });

    </script>

    </body>