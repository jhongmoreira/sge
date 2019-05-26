<?php
  include_once("includes/funcoes.php");
  $banco = new BancoDeDados;
  $alunoId = $_GET['aluno'];
  $banco->query("SELECT * FROM alunos where id = ".$alunoId);
  foreach ($banco->result() as $dados) {}
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-eye"></li> <b>Detalhes: </b> <?php echo $dados['nome']; ?></h5>
    <hr/>
  </div>
</div>

<!-- Linha 1 -->
<div class="row mb-2">
  <div class="col-md-2 mb-2">
      <label class="label-detalhes mb-0" for="matricula">Matricula:</label>
        <div id="matricula"><?php echo $dados["matricula"]; ?></div>
  </div>

  <div class="col-md-3 mb-2">
      <label class="label-detalhes mb-0" for="nome">Nome:</label>
        <div id="nome"><?php echo $dados["nome"]; ?> </div>
  </div>

  <div class="col-md-3 mb-2">
      <label class="label-detalhes mb-0" for="curso">Curso:</label>
        <div id="curso"><?php echo $dados["curso"]; ?></div>
  </div>

  <div class="col-md-4 mb-2">
      <label class="label-detalhes mb-0" for="email">E-mail:</label>
        <div id="email"><?php echo $dados["email"]; ?></div>
  </div>

</div>

<!-- Linha 2 -->
<div class="row mb-2">
  <div class="col-md-2 mb-2">
      <label class="label-detalhes mb-0" for="telefone">Telefone:</label>
        <div id="telefone"><?php echo @formatar('(%s%s) %s%s%s%s-%s%s%s%s', $dados["telefone"]); ?></div>
  </div>

  <div class="col-md-3 mb-2">
      <label class="label-detalhes mb-0" for="celular">Celular:</label>
        <div id="celular"><?php echo @formatar('(%s%s) %s%s%s%s%s-%s%s%s%s', $dados["celular"]); ?> </div>
  </div>

  <div class="col-md-3 mb-2">
      <label class="label-detalhes mb-0" for="whatsapp">Whastapp:</label>
        <div id="whatsapp"><?php echo @formatar('(%s%s) %s%s%s%s%s-%s%s%s%s', $dados["whatsapp"]); ?>

          <?php
            if ($dados["whatsapp"] != 0)
            {
          ?>
              <a alt="Abrir em Whatsapp Web" target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo $dados['whatsapp']; ?>"><li class="fa fa-external-link-alt"></li>
              </a>
          <?php
        }else {
          echo "<i>Não inserido</i>";
        }
          ?>

        </div>
  </div>

  <div class="col-md-4 mb-2">
      <label class="label-detalhes mb-0" for="ativo">Ativo:</label>
        <div id="ativo">

          <?php
            if ($dados["ativo"] == 1 )
            {
              echo "Sim";
            }else {
              echo "Não";
            }
          ?>

        </div>
  </div>
</div>

<hr/>

<div class="row">
  <div class="col-md-12">
    <label class="label-detalhes mb-0" for="obs">Observações:</label>
      <div id="obs">

        <?php
          if ($dados["obs"] == '')
          {
            echo "<i>Nenhuma observação inserida para este aluno.</i>";
          }else

          {
            echo $dados["obs"];
          }
        ?>

      </div>
  </div>
</div>
