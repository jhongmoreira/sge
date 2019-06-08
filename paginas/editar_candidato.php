<?php
  $banco = new BancoDeDados;
  $id_cand = @$_GET["candidato"];
  $banco->query("SELECT * FROM candidatos WHERE id = ".$id_cand);
  include_once("includes/funcoes.php");
  foreach ($banco->result() as $dados) {};
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-users"></li> Editar <?php echo $dados["nome"]; ?></h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form action="index.php?pg=12&action=salvar-registro&candidato=<?php echo $id_cand; ?>" method="post" onsubmit="btnEnvia.disabled=true">

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
    <div class="col-md-2">
      <div class="form-group">
        <label for="idCpf">CPF:</label>
        <?php echo $dados["cpf"]; ?>
          <input value='<?php echo $dados["cpf"]; ?>' class="form-control" type="text" name="cpf" id="idCpf" required="" pattern="[0-9]+$" minlength="11" maxlength="11"/>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="idNome">Nome:</label>
          <input value='<?php echo $dados["nome"]; ?>' class="form-control" type="text" name="nome" id="idNome" required=""/>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="idCurso">Curso:</label>
          <input value='<?php echo $dados["curso"]; ?>' class="form-control" type="text" name="curso" id="idCurso" required=""/>
      </div>
    </div>
  </div>

  <!-- Linha 2 -->
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="idEmail">E-mail:</label>
          <input value='<?php echo $dados["email"]; ?>' class="form-control" type="email" name="email" id="idEmail"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idTelefone">Telefone:</label>
          <input value='<?php echo $dados["telefone"]; ?>' class="form-control" type="text" name="telefone" id="idTelefone" minlength="10" maxlength="10" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idCelular">Celular:</label>
          <input value='<?php echo $dados["celular"]; ?>' class="form-control" type="text" name="celular" id="idCelular" required="" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idWhatsapp">Whatsapp:</label>
          <input value='<?php echo $dados["whatsapp"]; ?>' class="form-control" type="text" name="whatsapp" id="idWhatsapp" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <?php
      switch ($dados["ativo"]) {
        case 1:
          $vlr = 1;
          break;

        case 0:
          $vlr = 0;
          break;

        default:
            $vlr = '';
            break;
      }
    ?>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idAtivo">Ativo:</label>
          <select id="idAtivo" name="ativo" class="form-control" required="">
            <option value="1" <?php verSelecao("1", $vlr); ?> >Sim</option>
            <option value="0" <?php verSelecao("0", $vlr); ?> >Não</option>
          </select>
      </div>
    </div>

  </div>

  <!-- Linha 3 -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="idCidade">Cidade:</label>
          <input value='<?php echo $dados["cidade"]; ?>' class="form-control" type="text" name="cidade" id="idCidade" required=""/>
      </div>
    </div>

    <?php
        //VERIFICA QUAL ESTADO ESTA MARCADO NO DB
        switch($dados["uf"]){
            case "AC":
                $vlr = "AC";
                break;

            case "AL":
                $vlr = "AL";
                break;

            case "AP":
                $vlr = "AP";
                break;

            case "AM":
                $vlr = "AM";
                break;

            case "BA":
                $vlr = "BA";
                break;

            case "CE":
                $vlr = "CE";
                break;

            case "DF":
                $vlr = "DF";
                break;

            case "ES":
                $vlr = "ES";
                break;

            case "ET":
                $vlr = "ET";
                break;

            case "GO":
                $vlr = "GO";
                break;

            case "MA":
                $vlr = "MA";
                break;

            case "MT":
                $vlr = "MT";
                break;

            case "MS":
                $vlr = "MS";
                break;

            case "MG":
                $vlr = "MG";
                break;

            case "PA":
                $vlr = "PA";
                break;

            case "PB":
                $vlr = "PB";
                break;

            case "PR":
                $vlr = "PR";
                break;

            case "PE":
                $vlr = "PE";
                break;

            case "PI":
                $vlr = "PI";
                break;

            case "RJ":
                $vlr = "RJ";
                break;

            case "RN":
                $vlr = "RN";
                break;

            case "RS":
                $vlr = "RS";
                break;

            case "RO":
                $vlr = "RO";
                break;

            case "RR":
                $vlr = "RR";
                break;

            case "SC":
                $vlr = "SC";
                break;

            case "SP":
                $vlr = "SP";
                break;

            case "SE":
                $vlr = "SE";
                break;

            case "TO":
                $vlr = "TO";
                break;

            default:
                $vlr = '';
                break;
        }
    ?>


    <div class="col-md-2">
      <div class="form-group">
        <label for="idUf">UF/Estado:</label>
        <select name="uf" id="ufId" class="form-control" required="">
          <option></option>
          <option value="AC" <?php verSelecao("AC", $vlr); ?> >Acre</option>
          <option value="AL" <?php verSelecao("AL", $vlr); ?> >Alagoas</option>
          <option value="AP" <?php verSelecao("AP", $vlr); ?> >Amapá</option>
          <option value="AM" <?php verSelecao("AM", $vlr); ?> >Amazonas</option>
          <option value="BA" <?php verSelecao("BA", $vlr); ?> >Bahia</option>
          <option value="CE" <?php verSelecao("CE", $vlr); ?> >Ceará</option>
          <option value="DF" <?php verSelecao("DF", $vlr); ?> >Distrito Federal</option>
          <option value="ES" <?php verSelecao("ES", $vlr); ?> >Espírito Santo</option>
          <option value="ET" style="background-color: lightgrey;" <?php verSelecao("ET", $vlr); ?> >Estrangeiro</option>
          <option value="GO" <?php verSelecao("GO", $vlr); ?> >Goiás</option>
          <option value="MA" <?php verSelecao("MA", $vlr); ?> >Maranhão</option>
          <option value="MT" <?php verSelecao("MT", $vlr); ?> >Mato Grosso</option>
          <option value="MS" <?php verSelecao("MS", $vlr); ?> >Mato Grosso do Sul</option>
          <option value="MG" <?php verSelecao("MG", $vlr); ?> >Minas Gerais</option>
          <option value="PA" <?php verSelecao("PA", $vlr); ?> >Pará</option>
          <option value="PB" <?php verSelecao("PB", $vlr); ?> >Paraíba</option>
          <option value="PR" <?php verSelecao("PR", $vlr); ?> >Paraná</option>
          <option value="PE" <?php verSelecao("PE", $vlr); ?> >Pernambuco</option>
          <option value="PI" <?php verSelecao("PI", $vlr); ?> >Piauí</option>
          <option value="RJ" <?php verSelecao("RJ", $vlr); ?> >Rio de Janeiro</option>
          <option value="RN" <?php verSelecao("RN", $vlr); ?> >Rio Grande do Norte</option>
          <option value="RS" <?php verSelecao("RS", $vlr); ?> >Rio Grande do Sul</option>
          <option value="RO" <?php verSelecao("RO", $vlr); ?> >Rondônia</option>
          <option value="RR" <?php verSelecao("RR", $vlr); ?> >Roraima</option>
          <option value="SC" <?php verSelecao("SC", $vlr); ?> >Santa Catarina</option>
          <option value="SP" <?php verSelecao("SP", $vlr); ?> >São Paulo</option>
          <option value="SE" <?php verSelecao("SE", $vlr); ?> >Sergipe</option>
          <option value="TO" <?php verSelecao("TO", $vlr); ?> >Tocantins</option>
        </select>
      </div>
    </div>

    <?php
      switch ($dados["grau"]) {
        case 'BOM':
          $vlr = 'BOM';
          break;

        case 'REG':
          $vlr = 'REG';
          break;

        case 'INV':
          $vlr = 'INV';
          break;

        default:
            $vlr = '';
            break;
      }
    ?>

    <div class="col-md-4">
      <div class="form-group">
        <label for="idGrau">Grau:</label>
          <select name="grau" id="idGrau" class="form-control" required="">
              <option></option>
              <option value="BOM" <?php verSelecao("BOM", $vlr); ?> >Bom</option>
              <option value="REG" <?php verSelecao("REG", $vlr); ?> >Regular</option>
              <option value="INV" <?php verSelecao("INV", $vlr); ?> >Inviável</option>
            </select>
      </div>
    </div>
  </div>

  <hr/>

  <!-- Linha 4 -->
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="idObs">Observações:</label>
        <textarea id="idObs" name="obs" class="form-control" rows="4"><?php echo $dados["obs"]; ?></textarea>
      </div>
    </div>
  </div>

</form>

<div class="row">
  <div class="col-md-12">
    <?php

      if ($_SERVER["REQUEST_METHOD"] == 'POST')
      {
        $cpf = addslashes($_POST["cpf"]);
        $nome = addslashes($_POST["nome"]);
        $curso = addslashes($_POST["curso"]);
        $email = addslashes($_POST["email"]);
        $telefone = addslashes($_POST["telefone"]);
        $celular = addslashes($_POST["celular"]);
        $whatsapp = addslashes($_POST["whatsapp"]);
        $ativo = addslashes($_POST["ativo"]);
        $obs = addslashes($_POST["obs"]);
        $grau = addslashes($_POST["grau"]);
        $cidade = addslashes($_POST["cidade"]);
        $uf = addslashes($_POST["uf"]);

        $banco->query("UPDATE candidatos SET cpf='$cpf', nome='$nome', curso='$curso', email='$email', telefone='$telefone', celular='$celular', whatsapp='$whatsapp', ativo='$ativo', obs='$obs', grau='$grau', cidade='$cidade', uf='$uf' WHERE id = ".$id_cand);

        $total = $banco->linhas();

        if ($total != 0)
        {
          echo "<div class='alert alert-info'>Registro editado com sucesso</div>";
          echo "<meta http-equiv='refresh' content='1;URL=index.php?pg=7'/>";
        }else
        {
          echo "<div class='alert alert-danger'>Impossível inserir dados.</div>";
        }
      }
    ?>
  </div>
</div>
