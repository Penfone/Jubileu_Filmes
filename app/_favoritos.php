<?php
    require_once("./_sessao.php");
    if($_SESSION['adm'] != 2){     
        if(!(isset($_SESSION['id']))){
        header("../index.php");
        exit();
        }
    }else{
        header("../index.php");
        exit(); 
    }

?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="ISO-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="imagem/svg" href="../imagens/2.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styleOthers.css">
        <title>Jubileu Filmes</title>
        
    </head>
    <body>

    
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light" id="home">
            <a class="navbar-brand" href="../index.php"><img class="logo" src="../imagens/logoRev3.png" alt=""> Jubileu Filmes </a>
                
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                <img class="logo" src="imagens/user.png" alt="">
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="app/log-user.php">Login</a>
                <a class="dropdown-item" href="app/cad-user.php">Cadastre-se</a>
                <a class="dropdown-item" href="./app/menu_filme.php">Contribua</a>
              </div>
              
            </li> -->

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                Catogorias
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#lancamentos">Melhores avaliados</a>
                <a class="dropdown-item" href="#acao">Ação</a>
                <a class="dropdown-item" href="#animacao">Animação</a>
                <a class="dropdown-item" href="#aventura">Aventura</a>
                <a class="dropdown-item" href="#comedia">Comédia</a>
                <a class="dropdown-item" href="#drama">Drama</a>
                <a class="dropdown-item" href="#familia">Família</a>
                <a class="dropdown-item" href="#fantasia">Fantasia</a>
                <a class="dropdown-item" href="#ficcao">Ficção científica</a>
                <a class="dropdown-item" href="#guerra">Guerra</a>
                <a class="dropdown-item" href="#misterio">Mistério</a>
                <a class="dropdown-item" href="#policial">Policial</a>
                <a class="dropdown-item" href="#romance">Romance</a>
                <a class="dropdown-item" href="#suspense">Suspense</a>
                <a class="dropdown-item" href="#terror">Terror</a>
              </div>
              
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#fim">Sobre nós</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

          </ul>
          
            <?php
              if ((isset($_SESSION['nome']))&&(($_SESSION['adm'])==0)) {
            ?>
              
            <ul class="navbar-nav ml-auto"> <!-- adiciona ml-auto para empurrar o dropdown para a direita -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                  <?php
                    echo $_SESSION["nome"];
                  ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <!-- adiciona dropdown-menu-right para alinhar o menu do dropdown à direita -->
                <a class="dropdown-item" href="./_favoritos.php">Favoritos</a>  
                <a class="dropdown-item" href="./_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="../fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.5px solid black">
                                
              </li>

              <?php
              }else if((isset($_SESSION['nome']))&&(($_SESSION['adm'])==1)) {
              ?>
                <ul class="navbar-nav ml-auto"> <!-- adiciona ml-auto para empurrar o dropdown para a direita -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                  <?php
                    echo $_SESSION["nome"];
                  ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> <!-- adiciona dropdown-menu-right para alinhar o menu do dropdown à direita -->
                  <a class="dropdown-item" href="./cad-filme.php">Cadastrar Filmes</a>
                  <a class="dropdown-item" href="./menu_filme.php">Menu de Filmes</a>
                  <a class="dropdown-item" href="./menu_users.php">Menu de Usuário</a>
                  <a class="dropdown-item" href="./_favoritos.php">Favoritos</a>  
                  <a class="dropdown-item" href="./_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="../fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.8px solid black">
              </li>
                </ul>
              <?php
              }else{

              ?>

            <ul class="navbar-nav ml-auto" style="margin-right:3.5rem;">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                <img class="logo" src="imagens/user.png" alt="">
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-right:3.5rem;">
                <a class="dropdown-item" href="./log-user.php">Login</a>
                <a class="dropdown-item" href="./cad-user.php">Cadastre-se</a>
              </div> 
            </li>
            </ul> 
            <?php
               }
            ?>


        </div>
      </nav>
        <!-- Fim menu -->

        <div>
            <br>
            <h1>Favoritos</h1>
            <br>
        </div>

        <div class="container">
    </div> 


    <div class="tab">
        <table>
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th width="200">FILME</th> 
                    <th width="30">VIZUALIZAR</th>
                    <th width="30">EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("./_favoritobd.php");
                    if($totalRegistros > 0){
                        foreach($dados as $linha){

                ?>
                <tr>

                    <td><?= $linha["idF"];?></td>
                    <td><?= $linha["titulo"];?></td>
                    <td align="center">
                        <a href="./view-filme.php?id=<?= $linha['id'];?>">
                            <img src="../imagens/zoio.png" alt="Atualizar" width="30">
                        </a>
                    </td>


                    <td align="center">
                        <a href="./_exc-favorito.php?id=<?= $linha['idF'];?>"">
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
                                <td colspan=6 style='color: black;'>
                                    <b>NÃO HÁ FILMES FAVORITOS</b>
                                </td>
                            </tr>
                        ");
                    }
                ?>
            </tbody>
        </table>
    </div>

    <br><br><br><br>

    </body>