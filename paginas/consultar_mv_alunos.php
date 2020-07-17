<?php
  $banco = new BancoDeDados;
  include_once("includes/funcoes.php");
  $lista = (isset($_GET['lista']))? $_GET['lista'] : 1;
  $banco->query("SELECT * FROM mv_aluno, alunos WHERE mv_aluno.matricula = alunos.id");
  $total = $banco->linhas();
  $registros = 10;
  $numPaginas = ceil($total/$registros);
  $inicio = ($registros*$lista)-$registros;
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-search"></li> Consultar Movimentações de Alunos</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
  <div class="row">
    <div class="col-md-2 mb-4">
      <form action="index.php?pg=13&action=listar-todos" method="post">
            <button name="btnrelatorio" class="btn btn-primary form-control"><li class="fa fa-list"></li> Listar Todos</button>
      </form>
    </div>

    <div class="col-md-2 mb-4">
      <form action="index.php?pg=13&action=listar-abertos" method="post">
            <button name="btnsomenteabertos" class="btn btn-danger form-control"><li class="fa fa-exclamation-circle"></li> Atendimentos Abertos</button>
      </form>
    </div>

    <div class="col-md-2 mb-4">
      <form action="index.php?pg=13&action=listar-fechados" method="post">
            <button name="btnsomentefechados" class="btn btn-success form-control"><li class="fa fa-check-circle"></li> Atendimentos Fechados</button>
      </form>
    </div>
  </div>


<!-- DIV buscar alunos por nome -->
<form action="index.php?pg=13&action=busca-nome" method="post">
  <div class="row mb-3">

    <div class="col-md-10">
      <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome do aluno ou termo de busca"/>
      </div>
    </div>

      <div class="col-md-2">
        <button class="btn btn-primary form-control"><li class="fa fa-search"></li> Buscar</button>
      </div>
  </div>
</form>


  <!-- Tabela -->
  <table id="exemple" class="table">
    <thead class="cor-txt-padrao">
      <!--<th scope="col">#</th>-->
      <th scope="col">Aluno</th>
      <th scope="col">Data</th>
      <th scope="col">Movimentação</th>
      <th scope="col" class="text-center">Estado</th>
    </thead>
      <tbody>
        <tr>

          <?php

          if (!isset($_GET['action']))
          {
            $_GET['action'] = '';
          }

          $acao = $_GET["action"];

          if ($acao == 'listar-todos')
          {
            $banco->query("SELECT * FROM alunos, mv_aluno WHERE alunos.id = mv_aluno.matricula  ORDER BY mv_aluno.id limit $inicio, $registros");
          }

          if ($acao == 'listar-abertos')
          {
            $banco->query("SELECT * FROM alunos, mv_aluno WHERE alunos.id = mv_aluno.matricula AND estado = 0 ORDER BY mv_aluno.id");
          }

          if ($acao == 'listar-fechados')
          {
            $banco->query("SELECT * FROM alunos, mv_aluno WHERE alunos.id = mv_aluno.matricula AND estado = 1 ORDER BY mv_aluno.id");
          }

          if ($acao == 'busca-nome')
            {
              @$nome_aluno = $_POST["nome"];
              $banco->query("SELECT * FROM alunos, mv_aluno WHERE alunos.id = mv_aluno.matricula AND alunos.nome LIKE '%".$nome_aluno."%'");
              $msg = '';
            }

          if ($acao == '')
          {
            $banco->query("SELECT * FROM alunos, mv_aluno WHERE alunos.id = mv_aluno.matricula  ORDER BY mv_aluno.id LIMIT 10");
          }

              $total = $banco->linhas();

              if ($total != 0)
              {
                foreach ($banco->result() as $dados)
                {
                  $id_atendimento = $dados['id'];
            ?>
                  <!--<th scope="row"><?php /*echo $dados['id']; */?></th>-->
                  <td>
                    <a class="text-primary p-1" href="index.php?pg=5&aluno=<?php echo $dados['matricula']; ?>"><li class="fa fa-eye"></li></button></a>    
                    <?php echo $dados['nome']; ?>
                  </td>
                  <td><?php echo $dados['data']; ?></td>
                  <td><?php echo $dados['movimento']; ?></td>
                  <td class="text-center">
                  <?php 
                    $fechado = $dados['estado']; 
                    if ($fechado == 0){
                      echo "<a href='index.php?pg=14&atendimento=$id_atendimento'><li class='text-danger fa  fa-exclamation-circle'></li></a>";                
                    }else{
                      echo "<li class='text-success fa fa-check-circle'></li>";                   
                    }
                  ?>
                </td>
          </tr>
            <?php
                }
              }else
              {
                echo "Nada encontrado";
              }
          ?>
        <tr>
      </tbody>
    </table>

    <div class="mb-5 row" style="text-align: center;">
      <div class="col-md-12">
        <?php
          for($i = 1; $i < $numPaginas + 1; $i++)
          {
            echo "<a class='btn btn-info mb-1' href='index.php?pg=13&action=listar-todos&lista=$i'>".$i."</a> ";
          }
        ?>
      </div>
    </div>

    </div>
