<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="imagem/svg" href="./imagens/logo2.ico" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./app/css/style.css">
    <title>Jubileu Filmes</title>
</head>
<body>
        
    <!-- Menu -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-dark" id="home">
      
        <a class="navbar-brand" href="https://www.youtube.com/watch?v=njkLJ50tFRk&ab_channel=Minecraftplay"><img class="logo" src="./imagens/logo2.png" alt=""> Jubileu Filmes </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
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
                <a class="dropdown-item" href="./app/_favoritos.php">Favoritos</a>  
                <a class="dropdown-item" href="./app/_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="./fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.5px solid black">
                                
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
                  <a class="dropdown-item" href="./app/cad-filme.php">Cadastrar Filmes</a>
                  <a class="dropdown-item" href="./app/menu_filme.php">Menu de Filmes</a>
                  <a class="dropdown-item" href="./app/menu_users.php">Menu de Usuário</a>
                  <a class="dropdown-item" href="./app/_favoritos.php">Favoritos</a>  
                  <a class="dropdown-item" href="./app/_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="./fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.8px solid black">
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
                <a class="dropdown-item" href="app/log-user.php">Login</a>
                <a class="dropdown-item" href="app/cad-user.php">Cadastre-se</a>
              </div> 
            </li>
            </ul> 
            <?php
               }
            ?>


        </div>
      </nav>

      <!-- Fim menu -->

      <!-- Carrossel -->

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imagens/banners/batman.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/banners/SMB.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/banners/Ko2.png" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/banners/Sharknado2.jpeg" alt="Forth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/banners/JWD.jpg" alt="Fifth slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imagens/banners/Harriet.jpeg" alt="Sixth slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- fim carrossel -->

      <?php
        include './app/_metodos.php';
      ?>

<script>
    function atualizarFilmes() {
        var filmes = document.getElementsByClassName("filme-container");
        for (var i = 0; i < filmes.length; i++) {
            filmes[i].classList.add("filme-hidden"); // Adiciona a classe "filme-hidden" para ocultar os filmes
        }

        setTimeout(function() {
            location.reload(); // Recarrega a página após 500ms para exibir os filmes atualizados
        }, 500);
    }

    // Função para atualizar os filmes a cada 10 segundos
    setInterval(function() {
        atualizarFilmes();
    }, 20000); // 10000 milissegundos = 10 segundos
</script>

      <!-- Lançamentos -->

    <div class="container text-light " id="lancamentos">
        <h2>Melhores avaliados</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = lancamentos();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    

    <!-- Ação -->

    <div class="container text-light" id="acao">
        <h2>Ação</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = acao();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Animação -->

    <div class="container text-light" id="animacao">
        <h2>Animação</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = animacao();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

<!-- Aventura -->

<div class="container text-light" id="aventura">
    <h2>Aventura</h2>
</div>

<div class="container">
    <div class="row">
        
    <?php
        $filmes = aventura();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>

<br><br>

<!-- Comédia -->

<div class="container text-light" id="comedia">
        <h2>Comédia</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = comedia();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Drama -->

    <div class="container text-light" id="drama">
        <h2>Drama</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = drama();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Familia -->

    <div class="container text-light" id="familia">
        <h2>Família</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = familia();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>
    
    <!-- Fantasia -->

    <div class="container text-light" id="fantasia">
        <h2>Fantasia</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = fantasia();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Ficção -->

    <div class="container text-light" id="ficcao">
        <h2>Ficção científica</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = ficcao();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Guerra -->

    <div class="container text-light" id="guerra">
        <h2>Guerra</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = guerra();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Mistério -->

    <div class="container text-light" id="misterio">
        <h2>Mistério</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = misterio();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Policial -->

    <div class="container text-light" id="policial">
        <h2>Polícial</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = policial();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Romance -->

    <div class="container text-light" id="romance">
        <h2>Romance</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = romance();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Suspensse -->

    <div class="container text-light" id="suspense">
        <h2>Suspense</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = suspense();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

    <!-- Terror -->

    <div class="container text-light" id="terror">
        <h2>Terror</h2>
    </div>

    <div class="container">
    <div class="row">
        
    <?php
        $filmes = terror();
        shuffle($filmes); // Embaralha a ordem dos filmes
        $contador = 0;
        foreach ($filmes as $filme) {
            if ($contador >= 4) {
                break;
            }
            $id = $filme['id'];
            $titulo = $filme['titulo'];
            $caminho_imagem = "./fotos/" . $filme['img'];
            ?>

        <div class="col-md-3 filme-container">
            <a href="./app/view-filme.php?id=<?= $filme['id'];?>"><button class="butao"><img src="<?php echo $caminho_imagem; ?>" class="img-fluid" alt="..."></button></a>
            <h5><?php echo $filme['titulo'] ?></h5>
        </div>
        <?php
            $contador++;
        }
        ?>
        
    </div>      
</div>


    <br><br>

      <!-- Footer -->

    <div class="linha"></div>
    <br>

    <button class="last"><a href="#home"><img class="logo"  src="imagens/logoRev2.png" alt=""></a></button>

    <footer id="fim">

    <div class="container-footer">

        <div class="coluna">
          <h6><b>Nossa missão</b></h6>
          <p>Nosso site visa promover entreterimento, por meio de filmes.</p>
      
        </div>

        <div class="coluna">
          <h6><b>Real objetivo</b></h6>
          <p>Nós visamos tirar uma nota decente na matéria "Programção em Scripts."</p>    
          
        </div>

        <div class="coluna">
          <h6><b>Vamos dominar o mundo?</b></h6>
          <p>Sim, em breve, mas antes temos outras prioridades.</p>
          
          
        </div>

        <div class="coluna">
          <h6><b>Entre em contato</b></h6>
          <p>Telefone: (18)99620-8725</p>
          <p>(Obs: Não me ligue!!!)</p>
          
        </div>
        <br>
      </div>
       
    </footer>


</body>
</html>