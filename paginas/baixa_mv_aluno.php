<?php
  include_once("includes/funcoes.php");
  $banco = new BancoDeDados;
  $alunoId = $_GET['aluno'];
  $banco->query("SELECT * FROM mv_aluno, alunos WHERE mv_aluno.matricula = alunos.id AND alunos.id = ".$alunoId);
  foreach ($banco->result() as $dados) {}
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-user-minus"></li> Dar baixa no atendimento n° <?php echo $dados['id']; ?> do aluno <?php echo $dados['nome']; ?> ?</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form method="post" onsubmit="btnEnvia.disabled=true; btnCancela.disabled=true;">

  <div class="row">
    <div class="col-md-2 mb-4">
      <button type="submit" name="btnEnvia" class="btn btn-info form-control"><li class="fa fa-thumbs-up"></li> Sim</button>
    </div>

    <div class="col-md-2 mb-4">
      <a href="index.php"><button type="button" name="btnCancela" class="btn btn-danger form-control"><li class="fa fa-thumbs-down"></li> Cancelar</button></a>
    </div>
  </div>

</form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST')
  {
    $banco->query("UPDATE mv_alunos SET estado = 1 WHERE id = ".$dados['id']);

    $total = $banco->linhas();

    if ($total != 0)
    {
      echo "<div class='alert alert-info'>O atendimento teve sua baixa realizada</i></div>";
      echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
    }else

    {
      echo "<div class='alert alert-danger'>Um erro ocorreu na tentativa de lidar com o registro. Entre em contato com o Webmaster.</div>";
    }

  }
