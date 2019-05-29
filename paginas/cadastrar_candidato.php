<?php
  $banco = new BancoDeDados;
?>

<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-users"></li> Cadastrar Candidato</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<form action="index.php?pg=6&action=salvar-registro" method="post" onsubmit="btnEnvia.disabled=true">

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
          <input class="form-control" type="text" name="cpf" id="idCpf" required="" pattern="[0-9]+$" minlength="11" maxlength="11"/>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="idNome">Nome:</label>
          <input class="form-control" type="text" name="nome" id="idNome" required=""/>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="idCurso">Curso:</label>
          <input class="form-control" type="text" name="curso" id="idCurso" required=""/>
      </div>
    </div>
  </div>

  <!-- Linha 2 -->
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="idEmail">E-mail:</label>
          <input class="form-control" type="email" name="email" id="idEmail"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idTelefone">Telefone:</label>
          <input class="form-control" type="text" name="telefone" id="idTelefone" minlength="10" maxlength="10" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idCelular">Celular:</label>
          <input class="form-control" type="text" name="celular" id="idCelular" required="" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idWhatsapp">Whatsapp:</label>
          <input class="form-control" type="text" name="whatsapp" id="idWhatsapp" minlength="11" maxlength="11" pattern="[0-9]+$"/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idAtivo">Ativo:</label>
          <select id="idAtivo" name="ativo" class="form-control" required="">
            <option value="1">Sim</option>
            <option value="0">Não</option>
          </select>
      </div>
    </div>

  </div>

  <!-- Linha 3 -->
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="idCidade">Cidade:</label>
          <input class="form-control" type="text" name="cidade" id="idCidade" required=""/>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="idUf">UF/Estado:</label>
        <select name="uf" id="ufId" class="form-control" required="">
            <option></option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="ET" style="background-color: lightgrey;">Estrangeiro</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="idGrau">Grau:</label>
          <select name="grau" id="idGrau" class="form-control" required="">
              <option></option>
              <option value="BOM">Bom</option>
              <option value="BOM">Regular</option>
              <option value="BOM">Péssimo</option>
              <option value="BOM">Inviável</option>
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
        <textarea id="idObs" name="obs" class="form-control" rows="4"></textarea>
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

        $banco->query("INSERT INTO candidatos VALUES('', '$nome', '$cpf', '$curso', '$cidade', '$uf', '$email', '$telefone', '$celular', '$whatsapp', '$grau', '$ativo', '$obs')");

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
