<?php
  include_once("includes/funcoes.php");
  $banco = new BancoDeDados;
  $alunoId = $_GET['candidato'];
  $banco->query("SELECT * FROM candidatos where id = ".$alunoId);
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
      <label class="label-detalhes mb-0" for="cpf">CPF:</label>
        <div id="cpf"><?php echo $dados["cpf"]; ?></div>
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

  <div class="col-md-2 mb-2">
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

  <div class="col-md-2 mb-2">
      <label class="label-detalhes mb-0" for="grau">Grau:</label>
        <div id="grau">

          <?php
            switch ($dados["grau"]) {
              case 'BOM':
                echo "Bom";
                break;

              case 'REG':
                echo "Regular";
                break;

              case 'INV':
                echo "Inviável";
                break;

              default:
                echo "<i>Não informado</i>";
                break;
            }
          ?>

        </div>
  </div>
</div>

<!-- Linha 3 -->
<div class="row mb-2">
  <div class="col-md-2 mb-6">
      <label class="label-detalhes mb-0" for="cidade">Cidade:</label>
        <div id="cidade">
          <?php
            if ($dados["cidade"] == '')
            {
              echo "<i>Não informado</i>";
            }else
            {
              echo $dados["cidade"];
            }
          ?>
        </div>
  </div>

  <div class="col-md-3 mb-2">
      <label class="label-detalhes mb-0" for="uf">UF/Estado:</label>
        <div id="uf">
          <?php
            if ($dados["uf"] == '')
            {
              echo "<i>Não informado</i>";
            }else
            {
              echo $dados["uf"];
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

<!-- Tabela -->
<div class="row mt-5">
  <div class="col-md-12">
    <h5 class="cor-txt-padrao"><li class="fa fa-clock"></li> Ultimas movimentações</h5>
<table id="exemple" class="table">
  <thead class="cor-txt-padrao">
    <!--<th scope="col">#</th>-->
    <th scope="col">Data</th>
    <th scope="col">Hora</th>
    <th scope="col">Movimentação</th>
  </thead>
    <tbody>
      <tr>
      <?php
          $banco->query("SELECT * FROM mv_estoque WHERE id_cand = '$alunoId'");

          $total = $banco->linhas();

            if ($total != 0)
            {
              foreach ($banco->result() as $dados)
              {
          ?>
                <!--<th scope="row"><?php /*echo $dados['id']; */?></th>-->
                <td><?php echo $dados['data_mv']; ?></td>
                <td><?php echo $dados['hora_mv']; ?></td>
                <td><?php echo $dados['movimento']; ?></td>
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
</div>
</div>
