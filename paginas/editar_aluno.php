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
    <h5><li class="fa fa-user-plus"></li> Editar Aluno <?php echo $dados['nome']; ?></h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form method="post" onsubmit="btnEnvia.disabled=true">

  <div class="row">
    <div class="col-md-2 mb-4">
      <button type="submit" name="btnEnvia" class="btn btn-info form-control"><li class="fa fa-plus"></li> Salvar</button>
    </div>

    <div class="col-md-2 mb-8">
      <!-- Coluna ajuste -->
    </div>
  </div>

  <!-- Linha 1 -->
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label for="idMatricula">Matricula:</label>
          <input value="<?php echo $dados['matricula']; ?>" class="form-control" type="text" name="matricula" id="idMatricula" required="" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="idNome">Nome:</label>
          <input value="<?php echo $dados['nome']; ?>" class="form-control" type="text" name="nome" id="idNome" required=""/>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="idCurso">Curso:</label>
          <input value="<?php echo $dados['curso']; ?>" class="form-control" type="text" name="curso" id="idCurso" required=""/>
      </div>
    </div>
  </div>

  <!-- Linha 2 -->
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="idEmail">E-mail:</label>
          <input value="<?php echo $dados['email']; ?>" class="form-control" type="email" name="email" id="idEmail"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idTelefone">Telefone:</label>
          <input value="<?php echo $dados['telefone']; ?>" class="form-control" type="text" name="telefone" id="idTelefone" minlength="10" maxlength="10" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idCelular">Celular:</label>
          <input value="<?php echo $dados['celular']; ?>" class="form-control" type="text" name="celular" id="idCelular" required="" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idWhatsapp">Whatsapp:</label>
          <input value="<?php echo $dados['whatsapp']; ?>" class="form-control" type="text" name="whatsapp" id="idWhatsapp" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="ativo">Ativo:</label>
            <?php
                if ($dados["ativo"] == 1){
                    $vlr = 1;
                }else{
                    $vlr = 0;
                }
            ?>
                <select name="ativo" id="ativoId" class="form-control">
                    <option value="1" <?php verSelecao(1,$vlr);?> >Sim</option>
                    <option value="0" <?php verSelecao(0,$vlr);?>>Não</option>
                </select>
      </div>
    </div>

  </div>

  <hr/>

  <!-- Linha 3 -->
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="idObs">Observações:</label>
        <textarea id="idObs" name="obs" class="form-control" rows="4"><?php echo $dados['obs']; ?></textarea>
      </div>
    </div>
  </div>

</form>

<div class="row">
  <div class="col-md-12">
    <?php

      if ($_SERVER["REQUEST_METHOD"] == 'POST')
      {
        $matricula = addslashes($_POST["matricula"]);
        $nome = addslashes($_POST["nome"]);
        $curso = addslashes($_POST["curso"]);
        $email = addslashes($_POST["email"]);
        $telefone = addslashes($_POST["telefone"]);
        $celular = addslashes($_POST["celular"]);
        $whatsapp = addslashes($_POST["whatsapp"]);
        $ativo = addslashes($_POST["ativo"]);
        $obs = addslashes($_POST["obs"]);

        $banco->query("UPDATE alunos SET matricula ='$matricula', nome = '$nome', curso = '$curso', email = '$email', telefone = '$telefone', celular = '$celular', whatsapp = '$whatsapp', obs = '$obs', ativo = '$ativo' WHERE id = '$alunoId';");

        $total = $banco->linhas();

        if ($total != 0)
        {
          echo "<div class='alert alert-info'>Registro alterado com sucesso</div>";
          echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=1'/>";
        }else
        {
          echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
        }
      }
    ?>
  </div>
</div>
