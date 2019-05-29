<?php
  session_name("LgSge");
  session_start();

  include_once("classes/database.php");
  include_once("includes/logar.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistema de Gerenciamento Escolar</title>
  <meta name="author" content="Jhonathan Gleidsom Moreira / arte.jhonathan@gmail.com"/>
  <!-- Links CSS próprio -->
  <link href="css/principal.css" rel="stylesheet" type="text/css"/>
  <!-- Links CSS Boostrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>

<!-- Corpo do site -->
<body class="p-3 pr-4 login-fundo" >
  <form method="post">
    <div class="row">
      <div class="col-md-6"></div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="idUsuario" class="mb-0"> Usuário:</label>
          <input type="text" name="usuarioNome" id="idUsuario" class="form-control" required=""/>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="idSenha" class="mb-0"> Senha:</label>
          <input type="password" name="usuarioSenha" id="idSenha" class="form-control" required=""/>
        </div>
      </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="idbtn" class="mb-0"></label>
            <button type="submit" class="btn btn-info form-control" name="btnEnvia" value="1">Logar</button>
          </div>
        </div>

      </div>
  </form>
</body>
</html>
