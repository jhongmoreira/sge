<?php
  $banco = new BancoDeDados;
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
      <button type="submit" class="btn btn-secondary form-control"><li class="fa fa-list"></li> Listar todos</button>
    </div>

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
  <table class="table">
    <thead class="cor-txt-padrao">
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Celular</th>
      <th scope="col">Whatsapp</th>
      <th scope="col" style="text-align: center;">Opções</th>
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
            $banco->query("SELECT id, nome, celular, whatsapp FROM alunos");
            $msg = "Exibindo <b>todos</b> os alunos ativos/inativos";
          }

          if ($acao == 'busca-nome')
            {
              @$nome_aluno = $_POST["nome"];
              $banco->query("SELECT id, nome, celular, whatsapp FROM alunos WHERE nome LIKE '%".$nome_aluno."%'");
              $msg = '';
            }

          if ($acao == '')
          {
            $banco->query("SELECT id, nome, celular, whatsapp FROM alunos WHERE ativo = 1 LIMIT 10");
            $msg = "Exibindo no máximo <b>10 regitros</b> e somente alunos <b>Ativos</b>";
          }

            /*if (!isset($_GET['listar-todos']))
            {
              $banco->query("SELECT id, nome, celular, whatsapp FROM alunos WHERE ativo = 1 LIMIT 10");
              $msg = "Exibindo no máximo <b>10 regitros</b> e somente alunos <b>Ativos</b>";
            }else
            {
              if (isset($_GET['busca-nome']))
              {
                $nome_aluno = $_GET["nome"];
                $banco->query("SELECT id, nome, celular, whatsapp FROM alunos WHERE nome = '$nome_aluno'");

              //$banco->query("SELECT id, nome, celular, whatsapp FROM alunos");
              //$msg = "Exibindo <b>todos</b> os alunos ativos/inativos";

              }
            }*/

              $total = $banco->linhas();

              if ($total != 0)
              {
                foreach ($banco->result() as $dados)
                {
            ?>
                  <th scope="row"><?php echo $dados['id']; ?></th>
                  <td><?php echo $dados['nome']; ?></td>
                  <td><?php echo $dados['celular']; ?></td>
                  <td><?php echo $dados['whatsapp']; ?></td>
                  <td style="text-align: center;"><a href="#"><li class="fa fa-edit"></li></a>  <a href="#"><li class="fa fa-trash-alt"></li></a></td>
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

    <div class="row" style="text-align: right;">
      <div class="col-md-12">
        <?php echo $banco->linhas()." registros encontrados";?>
      </div>
    </div>

    <div class="row" style="text-align: right;">
      <div class="col-md-12">
        <?php echo $msg;?>
      </div>
    </div>

    </div>
