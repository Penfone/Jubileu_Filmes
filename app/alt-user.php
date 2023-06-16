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
    <meta charset="UTF-8">
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
                  <a class="dropdown-item" href="./menu_filme.php">Menu de Filmes</a>
                  <a class="dropdown-item" href="./menu_users.php">Menu de Usuário</a>
                  <a class="dropdown-item" href="./_logout.php">Sair</a>
                </div>
              </li>

              <li>
              <img src="../fotos/<?=$_SESSION['foto'];?>" alt="" style="width: 40px; height:40px; border-radius:50px; border: 0.5px solid black">
              </li>
            </ul>  

      </nav>

      <!-- Fim menu -->


      <div>
        <br>
        <h1>Atualização de usuário</h1>
        <br>
      </div>

      <div class="container">

      <?php
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            require_once("./_view-user.php");
        ?>

        <form action="./alt-userbd.php" method="POST" enctype="multipart/form-data">
            
        <input type="hidden" name="id" value="<?=$id;?>">
        <input type="hidden" name="fotobd" value="<?=$resultado['foto'];?>">

        <div>
              <input type="file" name="foto" id="foto" onchange="preview();">
              <?php
                        $imagem = $resultado['foto'];
                        if(strlen($imagem) > 0){
                    ?>

                        <label for="foto"><img src="../fotos/<?=$resultado['foto'];?>" id="imagem" alt="" style="max-width:100px; max-height:100px;"></label>

                    <?php
                        }else{
                    ?>
                        <label for="foto"><img src="../imagens/user.png" id="imagem" alt="" style="max-width:100px; max-height:100px;"></label>
                    <?php
                        }
                    ?>
              <br>

              <script>
                function preview(){
                  let file_foto = document.querySelector('#foto').files[0];
                  let img_imagem = document.querySelector('#imagem');

                  
                  // faz a leitura da imagem
                  let visualizacao = new FileReader();
                  
                  if(file_foto){
                      // esse comando dispara o evento load da 
                      // imagem quando ela for lida completamente            
                      visualizacao.readAsDataURL(file_foto);
                  }else{                
                      img_imagem.src = "";
                  }

                  // evento de load quando disparada carrega a imagem da variável visualizacao
                  visualizacao.onloadend = function(){
                      img_imagem.src = visualizacao.result;
                  }
              }
              // FIM FOTO -------------------


          </script>

            </div>


            <div>
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?=$resultado['nome'];?>" required>
              <br>
            </div>

            <div>
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?=$resultado['email'];?>" required>
              <br>
            </div>

            <div>
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha1" name="senha1" value="********" required>
              <p class="mens_erro" >Senhas diferentes</p>
              <br>
            </div>

            <div>
              <label for="senha">Confirme sua senha</label>
              <input type="password" class="form-control" id="senha2" name="senha2" value="********" required>
            </div>
            <br><br>

            <div class="buttons">
              <button class="btn btn-success" type="submit" id="submit">Alterar</button>
              <input class="btn btn-secondary" type="reset" value="Voltar" onclick="javascript:history.go(-1)">
             </div>


        </form>       

      </div>

      <script>

    let senha1 = document.querySelector('#senha1');
    let senha2 = document.querySelector('#senha2');
    let submit = document.querySelector('#submit');
    let mens_erro = document.querySelector('.mens_erro');

    function verifica(){

        if(senha1.value == senha2.value){
            mens_erro.style.display = 'none';
            submit.disable = false;
        }else{
            mens_erro.style.display = 'block';
            submit.disable = true;
        }

    }

    senha1.addEventListener('input', function(){
        verifica();
    });

    senha2.addEventListener('input', function(){
        verifica();
    });

    </script>

</body>
</html>
