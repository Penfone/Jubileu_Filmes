<?php
    // iniciando uma session
    session_start();
    // excluindo as variáveis de session
    session_unset();
    // destruir a session
    session_destroy();
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
             
      </nav>

      <!-- Fim menu -->

      <div>
        <br>
        <h1>Login de usuário</h1>
        <br>
      </div>

      <?php
        $status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_SPECIAL_CHARS);

        if(isset($status) && ($status=="erroSenha")){
            echo '<div class="alert erro"><b>Senha errada!</b></div>';
        }

        if(isset($status) && ($status=="erroUsuario")){
            echo '<div class="alert erro"><b>Usuário inexistente!</b></div>';
        }
    ?>

      <div class="container">
        <form action="../val-senha.php" method="POST" enctype="multipart/form-data">
            <div>
              <label for="usuario">Email</label>
              <input type="email" class="form-control" id="usuario" name="usuario" placeholder="Email" required>
              <br>
            </div>

            <div>
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required> 
            </div>
            <br><br>

            <div class="buttons">
              <button class="btn btn-success" type="submit">Logar</button>
              <input class="btn btn-secondary" type="reset" value="Voltar" onclick="javascript:history.go(-1)">
             </div>

                  
        <br>
        <div class="buttons"><a href="cad-user.php">Não tem login? Cadastre-se</a></div>

        </form>  

      </div>

    
</body>