<?php
  $banco = new BancoDeDados;

  $lista = (isset($_GET['lista']))? $_GET['lista'] : 1;
  $banco->query("select * from candidatos");
  $total = $banco->linhas();
  $registros = 10;
  $numPaginas = ceil($total/$registros);
  $inicio = ($registros*$lista)-$registros;

?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-search"></li> Consultar Alunos</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form action="index.php?pg=1&action=listar-todos" method="post">
  <div class="row">
    <div class="col-md-2 mb-4">
      <button name="btnrelatorio" class="btn btn-warning form-control"><li class="fa fa-book"></li> Gerar Relatório</button>
    </div>
  </div>
</form>


<!-- DIV buscar alunos por nome -->
<form action="index.php?pg=1&action=busca-nome" method="post">
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
      <th scope="col">Nome</th>
      <th scope="col">Celular</th>
      <th scope="col">Whatsapp</th>
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
            $banco->query("SELECT id, nome, celular, whatsapp FROM candidatos  ORDER BY id limit $inicio, $registros");
          }

          if ($acao == 'busca-nome')
            {
              @$nome_aluno = $_POST["nome"];
              $banco->query("SELECT id, nome, celular, whatsapp FROM candidatos WHERE nome LIKE '%".$nome_aluno."%'");
              $msg = '';
            }

          if ($acao == '')
          {
            $banco->query("SELECT id, nome, celular, whatsapp FROM candidatos WHERE ativo = 1 ORDER BY id LIMIT 10");
          }

              $total = $banco->linhas();

              if ($total != 0)
              {
                foreach ($banco->result() as $dados)
                {
            ?>
                  <!--<th scope="row"><?php /*echo $dados['id']; */?></th>-->
                  <td><?php echo $dados['nome']; ?><br/>
                    <a class="cor-warning p-1" href="index.php?pg=3&candidato=<?php echo $dados['id']; ?>"><li class="fa fa-edit"></li></a></button>
                    <a class="cor-danger p-1" href="index.php?pg=9&candidato=<?php echo $dados['id']; ?>"><li class="fa fa-trash-alt"></li></button></a>
                    <a class="cor-info p-1" href="index.php?pg=8&candidato=<?php echo $dados['id']; ?>"><li class="fa fa-eye"></li></button></a>
                  </td>
                  <td><?php echo $dados['celular']; ?></td>
                  <td><?php echo $dados['whatsapp']; ?>  <a alt="Abrir em Whatsapp Web" target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo $dados['whatsapp']; ?>"><li class="fa fa-external-link-alt"></li></a></td>          </tr>
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
            echo "<a class='btn btn-info mb-1' href='index.php?pg=1&action=listar-todos&lista=$i'>".$i."</a> ";
          }
        ?>
      </div>
    </div>

    </div>
