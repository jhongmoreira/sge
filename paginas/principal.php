<?php
  $banco = new BancoDeDados;
 ?>
<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-home"></li> Página Inicial</h5>
    <hr/>
  </div>
</div>

<!-- Linha de resumos -->
<?php
  $banco->query("SELECT * FROM alunos where ativo = 1");
  $total = $banco->linhas();
?>
<div class="row">
  <!-- Número de alunos ativos -->
  <div class="col-md-4">
    <div class="jumbotron cxs-resumo div-tema-padrao">
      <h5><li class="fa fa-user"></li> Alunos matriculados</h5>
      <span><?php echo $total; ?> alunos cadastrados</span>
      <div class="row mt-2">
        <div class="col-md-7"></div>
        <div class="col-md-5">
          <a href="index.php?pg=1"><button class="form-control btn btn-detalhes-matriculados"><li class="fa fa-plus"></li> Detalhes</button></button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Número de estoque ativo -->
  <?php
    $banco->query("SELECT * FROM candidatos where ativo = 1");
    $total = $banco->linhas();
  ?>
  <div class="col-md-4">
    <div class="jumbotron cxs-resumo div-tema-estoque-ativo">
      <h5><li class="fa fa-id-card"></li> Candidatos Ativos</h5>
      <span><?php echo $total; ?> candidatos atualizados</span>
      <div class="row mt-2">
        <div class="col-md-7"></div>
        <div class="col-md-5">
            <a href="index.php?pg=7"><button class="form-control btn btn-detalhes-matriculados"><li class="fa fa-plus"></li> Detalhes</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Número de alunos ativos -->
  <?php
    $banco->query("SELECT * FROM mv_aluno");
    $total = $banco->linhas();
  ?>
  <div class="col-md-4">
    <div class="jumbotron cxs-resumo div-tema-padrao">
      <h5><li class="fa fa-user"></li> Alunos matriculados</h5>
      <span><?php echo $total; ?> movimentações de alunos</span>
      <div class="row mt-2">
        <div class="col-md-7"></div>
        <div class="col-md-5">
          <a href="index.php?pg=1"><button class="form-control btn btn-detalhes-matriculados"><li class="fa fa-plus"></li> Detalhes</button></button></a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3"></div>
</div>