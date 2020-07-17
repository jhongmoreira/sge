<?php
  class Pagina
  {
      private $pagina;

      public function __construct()
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
            include "./paginas/editar_aluno.php";
            break;

          case 4:
            include "./paginas/apagar_aluno.php";
            break;

          case 5:
            include "./paginas/detalhes_aluno.php";
            break;

          case 6:
            include "./paginas/cadastrar_candidato.php";
            break;

          case 7:
            include "./paginas/consultar_candidato.php";
            break;

          case 8:
            include "./paginas/detalhes_candidato.php";
            break;

          case 9:
            include "./paginas/apagar_candidato.php";
            break;

          case 10:
            include "./paginas/novo_mv_aluno.php";
            break;

          case 11:
            include "./paginas/novo_mv_candidato.php";
            break;

          case 12:
            include "./paginas/editar_candidato.php";
            break;

          case 13:
            include "./paginas/consultar_mv_alunos.php";
            break;

          case 14:
            include "./paginas/baixa_mv_aluno.php";
            break;
        }

      }
  }
?>
