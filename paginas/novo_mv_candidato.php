<?php
  $banco = new BancoDeDados;
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-user-plus"></li> Cadastrar Movimento para Aluno</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form action="index.php?pg=11&action=salvar-registro" method="post" onsubmit="btnEnvia.disabled=true">

  <div class="row">
    <div class="col-md-2 mb-4">
      <button type="submit" name="btnEnvia" class="btn btn-info form-control"><li class="fa fa-plus"></li> Cadastrar</button>
    </div>

    <div class="col-md-2 mb-8">
      <!-- Coluna ajuste -->
    </div>
  </div>

  <!-- Linha 1 -->
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <label for="idMatricula">Candidato:</label>
        <select class="form-control" required="" name="candidato">
          <option></option>
          <?php
            $banco->query("SELECT id, nome FROM candidatos");

              foreach ($banco->result() as $dados)
              {
                echo "<option value=".$dados['id'].">".$dados['nome']."</option>";
              }
            ?>
          </select>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idData">Data:</label>
          <input class="form-control" type="date" name="data" id="idData" required=""/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idHora">Hora:</label>
          <input class="form-control" type="time" name="hora" id="idHora" required=""/>
      </div>
    </div>

  </div>

  <hr/>

  <!-- Linha 3 -->
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="idMvAlu">Movimento:</label>
        <textarea id="idMvAlu" name="mv_cand" class="form-control" rows="4" required=""></textarea>
      </div>
    </div>
  </div>
</form>

<div class="row">
  <div class="col-md-12">
    <?php

      if ($_SERVER["REQUEST_METHOD"] == 'POST')
      {
        $id_cand = addslashes($_POST["candidato"]);
        $data = addslashes($_POST["data"]);
        $hora = addslashes($_POST["hora"]);
        $movimento = addslashes($_POST["mv_cand"]);

        $banco->query("INSERT INTO mv_estoque VALUES('', '$id_cand', '$data', '$hora', '$movimento')");

        $total = $banco->linhas();

        if ($total != 0)
        {
          echo "<div class='alert alert-info'>Registro inserido com sucesso</div>";
          echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
        }else
        {
          echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
        }
      }
    ?>
  </div>
</div>
