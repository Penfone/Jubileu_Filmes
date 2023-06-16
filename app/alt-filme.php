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

        <div>
            <br>
            <h1>Atualizar filme</h1>
            <br>
        </div>

        <!-- Fim menu -->

        <div class="container">

        <?php
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            require_once("./_view-filme.php");
        ?>

            <form action="./alt-filmebd.php"  method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?=$id;?>">
            <input type="hidden" name="fotobd" value="<?=$resultado['img'];?>">
            
            <div class="divisor">

                <div class="auxDivisor">

                    <div class="container coluna-1 col-md-3">

                    <form>
                        <!-- <label for="imagem">Selecione a capa do filme</label>
                        <input type="file" id="imagem" name="imagem"> -->
                        <input type="file" name="foto" id="foto" onchange="preview();">
                    <?php
                        $imagem = $resultado['img'];
                        if(strlen($imagem) > 0){
                    ?>

                        <label for="foto"><img src="../fotos/<?=$resultado['img'];?>" id="imagem" alt="" style="max-width:220px; max-height:330px"></label>

                    <?php
                        }else{
                    ?>
                        <label for="foto"><img src="../imagens/noImg.jpg" id="imagem" alt="" style="max-width:220px; max-height:330px"></label>
                    <?php
                        }
                    ?>
                    </form>

                    <img id="imagem-preview">

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
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$resultado['titulo'];?>" required>
                            <br>
                            </div>

                            <div>
                            <label for="diretor">Diretor</label>
                            <input type="text" class="form-control" id="diretor" name="diretor" placeholder="Nome do diretor"  value="<?=$resultado['diretor'];?>" required>
                            <br>
                            </div>

                            <div class="container">

                                <div class="divisor">

                                    <div class="auxDivisor">

                                        <div class="coluna">
                                            <label for="nota">Imdb</label>
                                            <input type="number" class="form-control" step="0.1" min="0" max="10" id="nota" name="nota" placeholder="de 0 a 10" value="<?=$resultado['nota'];?>" required> 
                                        </div>

                                        <!-- <div class="coluna"><p></p></div> -->

                                        <div class="coluna">
                                        <label class="tc" for="ano">Ano de lançamento</label>
                                        <input type="year" class="form-control date" id="ano" name="ano" placeholder="Ano" value="<?=$resultado['ano'];?>" required>
                                        <br>
                                        </div>
                                        
                                        <div class="coluna">
                                        <label for="classInd">Classificação indicativa</label>
                                                <select name="fe" id="fe">
                                                    <option value="1" <?=$ativo=$resultado["fe"]=="1"?" selected":"";?> >Livre</option>
                                                    <option value="2" <?=$ativo=$resultado["fe"]=="2"?" selected":"";?> >10</option>
                                                    <option value="3" <?=$ativo=$resultado["fe"]=="3"?" selected":"";?> >12</option>
                                                    <option value="4" <?=$ativo=$resultado["fe"]=="4"?" selected":"";?> >14</option>
                                                    <option value="5" <?=$ativo=$resultado["fe"]=="5"?" selected":"";?> >16</option>
                                                    <option value="6" <?=$ativo=$resultado["fe"]=="6"?" selected":"";?> >18</option>
                                                </select>

                                        </div>

                                        <div class="coluna">
                                        <label class="tc" for="duracao">Duração</label>
                                        <input type="time" class="form-control time" id="duracao" name="duracao" value="<?=$resultado['duracao'];?>" required>
                                        </div>
                                    
                                    </div>

                                </div>

                            </div>

                            <div class="container">    
                                <div class="auxDivisor">

                                        <div class="coluna">
                                            <label class="tc" for="gen1">Gênero 1</label>
                                            <select class="larg" name="gen1" id="cat">
                                            <option value="0" <?=$ativo=$resultado["gen1"]=="0"?" selected":"";?> ></option>
                                                <option value="1" <?=$ativo=$resultado["gen1"]=="1"?" selected":"";?> >Ação</option>
                                                <option value="2" <?=$ativo=$resultado["gen1"]=="2"?" selected":"";?> >Animação</option>
                                                <option value="3" <?=$ativo=$resultado["gen1"]=="3"?" selected":"";?> >Aventura</option>
                                                <option value="4" <?=$ativo=$resultado["gen1"]=="4"?" selected":"";?> >Comédia</option>
                                                <option value="7" <?=$ativo=$resultado["gen1"]=="7"?" selected":"";?> >Drama</option>
                                                <option value="8" <?=$ativo=$resultado["gen1"]=="8"?" selected":"";?> >Família</option>
                                                <option value="9" <?=$ativo=$resultado["gen1"]=="9"?" selected":"";?> >Fantasia</option>
                                                <option value="10" <?=$ativo=$resultado["gen1"]=="10"?" selected":"";?> >Ficção científica</option>
                                                <option value="11" <?=$ativo=$resultado["gen1"]=="11"?" selected":"";?> >Guerra</option>
                                                <option value="12" <?=$ativo=$resultado["gen1"]=="12"?" selected":"";?> >Mistério</option>
                                                <option value="13" <?=$ativo=$resultado["gen1"]=="13"?" selected":"";?> >Policial</option>
                                                <option value="14" <?=$ativo=$resultado["gen1"]=="14"?" selected":"";?> >Romance</option>
                                                <option value="15" <?=$ativo=$resultado["gen1"]=="15"?" selected":"";?> >Suspense</option>
                                                <option value="16" <?=$ativo=$resultado["gen1"]=="16"?" selected":"";?> >Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" for="gen2">Gênero 2</label>
                                            <select class="larg" name="gen2" id="cat">
                                            <option value="0" <?=$ativo=$resultado["gen2"]=="0"?" selected":"";?> ></option>
                                                <option value="1" <?=$ativo=$resultado["gen2"]=="1"?" selected":"";?> >Ação</option>
                                                <option value="2" <?=$ativo=$resultado["gen2"]=="2"?" selected":"";?> >Animação</option>
                                                <option value="3" <?=$ativo=$resultado["gen2"]=="3"?" selected":"";?> >Aventura</option>
                                                <option value="4" <?=$ativo=$resultado["gen2"]=="4"?" selected":"";?> >Comédia</option>
                                                <option value="7" <?=$ativo=$resultado["gen2"]=="7"?" selected":"";?> >Drama</option>
                                                <option value="8" <?=$ativo=$resultado["gen2"]=="8"?" selected":"";?> >Família</option>
                                                <option value="9" <?=$ativo=$resultado["gen2"]=="9"?" selected":"";?> >Fantasia</option>
                                                <option value="10" <?=$ativo=$resultado["gen2"]=="10"?" selected":"";?> >Ficção científica</option>
                                                <option value="11" <?=$ativo=$resultado["gen2"]=="11"?" selected":"";?> >Guerra</option>
                                                <option value="12" <?=$ativo=$resultado["gen2"]=="12"?" selected":"";?> >Mistério</option>
                                                <option value="13" <?=$ativo=$resultado["gen2"]=="13"?" selected":"";?> >Policial</option>
                                                <option value="14" <?=$ativo=$resultado["gen2"]=="14"?" selected":"";?> >Romance</option>
                                                <option value="15" <?=$ativo=$resultado["gen2"]=="15"?" selected":"";?> >Suspense</option>
                                                <option value="16" <?=$ativo=$resultado["gen2"]=="16"?" selected":"";?> >Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" or="gen3">Gênero 3</label>
                                            <select class="larg" name="gen3" id="cat">
                                            <option value="0" <?=$ativo=$resultado["gen3"]=="0"?" selected":"";?> ></option>
                                                <option value="1" <?=$ativo=$resultado["gen3"]=="1"?" selected":"";?> >Ação</option>
                                                <option value="2" <?=$ativo=$resultado["gen3"]=="2"?" selected":"";?> >Animação</option>
                                                <option value="3" <?=$ativo=$resultado["gen3"]=="3"?" selected":"";?> >Aventura</option>
                                                <option value="4" <?=$ativo=$resultado["gen3"]=="4"?" selected":"";?> >Comédia</option>
                                                <option value="7" <?=$ativo=$resultado["gen3"]=="7"?" selected":"";?> >Drama</option>
                                                <option value="8" <?=$ativo=$resultado["gen3"]=="8"?" selected":"";?> >Família</option>
                                                <option value="9" <?=$ativo=$resultado["gen3"]=="9"?" selected":"";?> >Fantasia</option>
                                                <option value="10" <?=$ativo=$resultado["gen3"]=="10"?" selected":"";?> >Ficção científica</option>
                                                <option value="11" <?=$ativo=$resultado["gen3"]=="11"?" selected":"";?> >Guerra</option>
                                                <option value="12" <?=$ativo=$resultado["gen3"]=="12"?" selected":"";?> >Mistério</option>
                                                <option value="13" <?=$ativo=$resultado["gen3"]=="13"?" selected":"";?> >Policial</option>
                                                <option value="14" <?=$ativo=$resultado["gen3"]=="14"?" selected":"";?> >Romance</option>
                                                <option value="15" <?=$ativo=$resultado["gen3"]=="15"?" selected":"";?> >Suspense</option>
                                                <option value="16" <?=$ativo=$resultado["gen3"]=="16"?" selected":"";?> >Terror</option>
                                            </select>
                                        </div>

                                        <div class="coluna">
                                            <label class="tc" for="gen4">Gênero 4</label>
                                            <select class="larg" name="gen4" id="cat">
                                            <option value="0" <?=$ativo=$resultado["gen4"]=="0"?" selected":"";?> ></option>
                                                <option value="1" <?=$ativo=$resultado["gen4"]=="1"?" selected":"";?> >Ação</option>
                                                <option value="2" <?=$ativo=$resultado["gen4"]=="2"?" selected":"";?> >Animação</option>
                                                <option value="3" <?=$ativo=$resultado["gen4"]=="3"?" selected":"";?> >Aventura</option>
                                                <option value="4" <?=$ativo=$resultado["gen4"]=="4"?" selected":"";?> >Comédia</option>
                                                <option value="7" <?=$ativo=$resultado["gen4"]=="7"?" selected":"";?> >Drama</option>
                                                <option value="8" <?=$ativo=$resultado["gen4"]=="8"?" selected":"";?> >Família</option>
                                                <option value="9" <?=$ativo=$resultado["gen4"]=="9"?" selected":"";?> >Fantasia</option>
                                                <option value="10" <?=$ativo=$resultado["gen4"]=="10"?" selected":"";?> >Ficção científica</option>
                                                <option value="11" <?=$ativo=$resultado["gen4"]=="11"?" selected":"";?> >Guerra</option>
                                                <option value="12" <?=$ativo=$resultado["gen4"]=="12"?" selected":"";?> >Mistério</option>
                                                <option value="13" <?=$ativo=$resultado["gen4"]=="13"?" selected":"";?> >Policial</option>
                                                <option value="14" <?=$ativo=$resultado["gen4"]=="14"?" selected":"";?> >Romance</option>
                                                <option value="15" <?=$ativo=$resultado["gen4"]=="15"?" selected":"";?> >Suspense</option>
                                                <option value="16" <?=$ativo=$resultado["gen4"]=="16"?" selected":"";?> >Terror</option>
                                            </select>
                                        </div>

                            </div>

                            <br><br>    

                            <div class="container">
                            <label for="sinopse">Sinopse</label>
                            <textarea class="form-control" id="sinopse" name="sinopse" placeholder="Sinopse" rows="5" cols="100" maxlength="1500" required><?=$resultado['sinopse'];?></textarea>
                            </div>
                            
                            <br><br>

                            <div class="buttons">
                        <button class="btn btn-success" type="submit">Alterar</button>
                        <input class="btn btn-secondary" type="reset" value="Voltar" onclick="javascript:history.go(-1)">
                        </div>

                    </div>
                </div>
            </div>            

            </form>
            
        </div>



    </body>