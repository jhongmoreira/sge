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
            echo "Página Inicial";
            break;


          case 1:
            echo "Página de consulta";
            break;

          case 2:
            echo "Página de cadastro de Aluno";
            break;

          case 3:
            echo "Página de cadastro de Candidato";
            break;
        }

      }
  }
?>
