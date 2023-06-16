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
             
      </nav>

      <!-- Fim menu -->


      <div>
        <br>
        <h1>Cadastro de usuário</h1>
        <br>
      </div>

      <div class="container">
        <form action="./cad-userbd.php" method="POST" enctype="multipart/form-data">
            
            <div>
              <input type="file" name="foto" id="foto" onchange="preview();">
              <label for="foto"><img id="imagem" src="../imagens/user.png" style="max-width:100px; max-height:100px;"></label>
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
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
              <br>
            </div>

            <div>
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              <br>
            </div>

            <div>
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha1" name="senha1" placeholder="Senha" required>
              <p class="mens_erro" >Senhas diferentes</p>
              <br>
            </div>

            <div>
              <label for="senha">Confirme sua senha</label>
              <input type="password" class="form-control" id="senha2" name="senha1" placeholder="Confirme sua senha" required>
            </div>
            <br><br>

            <div class="buttons">
              <button class="btn btn-success" type="submit" id="submit">Cadastrar</button>
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