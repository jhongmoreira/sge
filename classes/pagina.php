<?php
  class Pagina
  {
      private $pagina;

      function __construct()
      {
        if (!isset($_GET["pg"]))
        {
          $_GET["pg"] = 0;
        }

        $this->pagina = $_GET["pg"];


        if (!isset($this->pagina))
        {
          $this->pagina = 0;
        }

        switch ($this->pagina)
        {
          case 0:
            include "./paginas/principal.php";
            break;


          case 1:
            include "./paginas/consultar_aluno.php";
            break;

          case 2:
            include "./paginas/cadastrar_aluno.php";
            break;

          case 3:
            include "./paginas/cadastrar_candidato.php";
            break;
        }

      }
  }
?>
