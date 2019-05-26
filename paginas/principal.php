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

  <div class="col-md-4"></div>

  <div class="col-md-4"></div>

  <!-- Implementar Depois
  -- Número de estoque ativo --
  <div class="col-md-4">
    <div class="jumbotron cxs-resumo div-tema-estoque-ativo">
      <h5><li class="fa fa-id-card"></li> Candidatos Ativos</h5>
      <span>8 candidatos atualizados</span>
      <div class="row mt-2">
        <div class="col-md-7"></div>
        <div class="col-md-5">
          <button class="form-control btn btn-detalhes-matriculados"><li class="fa fa-plus"></li> Detalhes</button>
        </div>
      </div>
    </div>
  </div>

  -- Número de estoque desatualizados --
  <div class="col-md-4">
    <div class="jumbotron cxs-resumo div-tema-estoque-desatualizado">
      <h5><li class="fa fa-thumbs-down"></li> Candidatos Desatualizados</h5>
      <span>3 candidatos desatualizados</span>
      <div class="row mt-2">
        <div class="col-md-7"></div>
        <div class="col-md-5">
          <button class="form-control btn btn-detalhes-matriculados"><li class="fa fa-plus"></li> Detalhes</button>
        </div>
      </div>
    </div>
  </div>

</div>

-- Linha outros detalhes --
<div class="row">
  -- Últimas movimentações realizadas --
  <div class="col-md-6">
    <div class="jumbotron cxs-resumo div-tema-padrao">
      <h5><li class="fa fa-clock"></li> Ultimas movimentações</h5>
      <ul class="fa-ul listas-sistemas-principal">
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:22 - Teste excluiu um registro de Clientes</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:20 - Administrador alterou as permissões de Administrador</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:16 - Administrador alterou configurações do sistema</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:15 - Administrador inseriou um novo registro em candidatos</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:11 - Administrador deletou o usuário Teste</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:10 - Administrador criou um novo usuário</li>
      </ul>
    </div>
  </div>

  -- Histórico de logins --
  <div class="col-md-6">
    <div class="jumbotron cxs-resumo div-tema-padrao">
      <h5><li class="fa fa-history"></li> Logins anteriores</h5>
      <ul class="fa-ul listas-sistemas-principal">
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:05 - Administrador iniciou sessão</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:05 - Teste iniciou sessão</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:00 - Teste encerrou sessão</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:00 - Teste iniciou sessão</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 19:00 - Administrador encerrou sessão</li>
        <li><span class="fa-li"><i class="fa fa-arrow-circle-right"></i></span>24/05/19 - 18:58 - Administrador iniciou sessão</li>
      </ul>
    </div>
  </div>
-->
