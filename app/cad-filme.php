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
                <!-- <a class="dropdown-item" href="./cad-filme.php">Cadastrar Filmes</a> -->
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

        <div>
            <br>
            <h1>Cadastro de filmes</h1>
            <br>
        </div>

        <!-- Fim menu -->

        <div class="container">
            <form action="./cad-filmebd.php"  method="POST" enctype="multipart/form-data">
            
            <div class="divisor">

                <div class="auxDivisor">

                    <div class="container coluna-1 col-md-3">

                    <form>           
                        <input type="file" id="foto" name="foto" onchange="preview();">     
                        <label for="foto"><img id="imagem" src="noImg.jpg" style="max-width:220px; max-height:330px"></label>
                    </form>

                    <!-- <img id="imagem-preview" src="../imagens/noImg.jpg"> -->

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
                    </script>

                    
                    </div>
                    
                    <div class="container coluna-2">
                            <div>
                            <label for="titulo">Nome</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do filme" required>
                            <br>
                            </div>

                            <div>
                            <label for="diretor">Diretor</label>
                            <input type="text" class="form-control" id="diretor" name="diretor" placeholder="Nome do diretor" required>
                            <br>
                            </div>

                            <div class="container">

                                <div class="divisor">

                                    <div class="auxDivisor">

                                        <div class="coluna">
                                            <label for="nota">Imdb</label>
                                            <input type="number" class="form-control" step="0.1" min="0" max="10" id="nota" name="nota" placeholder="de 0 a 10" required> 
                                        </div>

                                        <!-- <div class="coluna"><p></p></div> -->

                                        <div class="coluna">
                                        <label class="tc" for="ano">Ano de lançamento</label>
                                        <input type="year" class="form-control date" id="ano" name="ano" placeholder="Ano" required>
                                        <br>
                                        </div>
                                        
                                        <div class="coluna">
                                        <label for="classInd">Classificação indicativa</label>
                                                <select name="fe" id="fe">
                                                    <option value="1" selected>Livre</option>
                                                    <option value="2">10</option>
                                                    <option value="3">12</option>
                                                    <option value="4">14</option>
                                                    <option value="5">16</option>
                                                    <option value="6">18</option>
                                                </select>

                                        </div>

                                        <div class="coluna">
                                        <label class="tc" for="duracao">Duração</label>
                                        <input type="time" class="form-control time" id="duracao" name="duracao" placeholder="Duração" required>
                                        </div>
                                    
                                    </div>

                                </div>

                            </div>

                            <div class="container">    
                                <div class="auxDivisor">

                                        <div class="coluna">
                                            <label class="tc" for="gen1">Gênero 1</label>
                                            <select class="larg" name="gen1" id="cat">
                                            <option value="0" selected></option>
                                                <option value="1" >Ação</option>
                                                <option value="2">Animação</option>
                                                <option value="3">Aventura</option>
                                                <option value="4">Comédia</option>
                                                <option value="7">Drama</option>
                                                <option value="8">Família</option>
                                                <option value="9">Fantasia</option>
                                                <option value="10">Ficção científica</option>
                                                <option value="11">Guerra</option>
                                                <option value="12">Mistério</option>
                                                <option value="13">Policial</option>
                                                <option value="14">Romance</option>
                                                <option value="15">Suspense</option>
                                                <option value="16">Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" for="gen2">Gênero 2</label>
                                            <select class="larg" name="gen2" id="cat">
                                            <option value="0" selected></option>
                                            <option value="1" >Ação</option>
                                                <option value="2">Animação</option>
                                                <option value="3">Aventura</option>
                                                <option value="4">Comédia</option>
                                                <option value="7">Drama</option>
                                                <option value="8">Família</option>
                                                <option value="9">Fantasia</option>
                                                <option value="10">Ficção científica</option>
                                                <option value="11">Guerra</option>
                                                <option value="12">Mistério</option>
                                                <option value="13">Policial</option>
                                                <option value="14">Romance</option>
                                                <option value="15">Suspense</option>
                                                <option value="16">Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" or="gen3">Gênero 3</label>
                                            <select class="larg" name="gen3" id="cat">
                                            <option value="0" selected></option>
                                            <option value="1" >Ação</option>
                                                <option value="2">Animação</option>
                                                <option value="3">Aventura</option>
                                                <option value="4">Comédia</option>
                                                <option value="7">Drama</option>
                                                <option value="8">Família</option>
                                                <option value="9">Fantasia</option>
                                                <option value="10">Ficção científica</option>
                                                <option value="11">Guerra</option>
                                                <option value="12">Mistério</option>
                                                <option value="13">Policial</option>
                                                <option value="14">Romance</option>
                                                <option value="15">Suspense</option>
                                                <option value="16">Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" for="gen4">Gênero 4</label>
                                            <select class="larg" name="gen4" id="cat">
                                            <option value="0" selected></option>
                                                <option value="1" >Ação</option>
                                                <option value="2">Animação</option>
                                                <option value="3">Aventura</option>
                                                <option value="4">Comédia</option>
                                                <option value="7">Drama</option>
                                                <option value="8">Família</option>
                                                <option value="9">Fantasia</option>
                                                <option value="10">Ficção científica</option>
                                                <option value="11">Guerra</option>
                                                <option value="12">Mistério</option>
                                                <option value="13">Policial</option>
                                                <option value="14">Romance</option>
                                                <option value="15">Suspense</option>
                                                <option value="16">Terror</option>
                                            </select>
                                        </div>

                            </div>

                            <br><br>    

                            <div class="container">
                            <label for="sinopse">Sinopse</label>
                            <textarea class="form-control" id="sinopse" name="sinopse" placeholder="Sinopse" rows="5" cols="100" maxlength="1500" required></textarea>
                            </div>
                            
                            <br><br>

                            <div class="buttons">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                        <input class="btn btn-secondary" type="reset" value="Voltar" onclick="javascript:history.go(-1)">
                        </div>

                    </div>
                </div>
            </div>            

            </form>
            
        </div>



    </body>