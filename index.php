<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <title>Sistema de Gerenciamento Escolar</title>
    <meta name="author" content="Jhonathan Gleidsom Moreira / arte.jhonathan@gmail.com"/>
    <!-- Links CSS próprio -->
    <link href="css/principal.css" rel="stylesheet" type="text/css"/>
    <!-- Links CSS Boostrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- CSS Fontawesome -->
    <link href="bootstrap/fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css"/>
    <link href="bootstrap/fontawesome/js/regular.css" rel="stylesheet" type="text/css"/>
    <script src="bootstrap/fontawesome/js/solid.js"></script>
    <!-- Arquivos JS -->
    <script src="bootstrap/fontawesome/js/fontawesome.js"></script>
    <script src="bootstrap/fontawesome/js/regular.js"></script>
    <script src="bootstrap/fontawesome/js/solid.js"></script>

  </head>
  <!-- Corpo do site -->
  <body>

    <div class="container">

      <!-- Menu superior -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- logotipo -->
        <a class="navbar-brand" href="index.php"><b>SGE 2019</b></a>
        <!-- Menu móvel -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuSuperior" aria-controls="menuSuperior" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuSuperior">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?pg=0">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?pg=1">Consultas</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cadastrar
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?pg=2">Aluno</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?pg=3">Candidato</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Relatórios</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Includes vão aqui -->
      <?php
        include_once("classes/pagina.php");
        $pagina = new Pagina;
      ?>

    </div>

  </body>
  <!-- Arquivos jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  </html>
