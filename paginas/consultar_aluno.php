<!-- Título -->
<div class="row p-2">
  <div class="col-md-12 cor-txt-padrao">
    <h5><li class="fa fa-search"></li> Consultar Alunos</h5>
    <hr/>
  </div>
</div>

<!-- DIV opções -->
<div class="row">
  <div class="col-md-2 mb-4">
    <button name="btnlista" id="btnListar" value="true" class="btn btn-secondary form-control"><li class="fa fa-list"></li> Listar todos</button>
  </div>

  <div class="col-md-2 mb-4">
    <button name="btnrelatorio" id="btnGeraRel" value="true" class="btn btn-warning form-control"><li class="fa fa-book"></li> Gerar Relatório</button>
  </div>
</div>


<!-- DIV buscar alunos por nome -->
<div class="row mb-3">

  <div class="col-md-10">
    <div class="form-group">
      <input type="text" class="form-control" name="nome" id="nomeAluno" placeholder="Nome do aluno ou termo de busca"/>
    </div>
  </div>

    <div class="col-md-2">
      <button name="btn1" id="btnEvniar" value="true" class="btn btn-primary form-control"><li class="fa fa-search"></li> Buscar</button>
    </div>
  </div>

  <!-- Tabela -->
  <table class="table">
    <thead class="cor-txt-padrao">
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Celular</th>
      <th scope="col">Whatsapp</th>
    </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Jhonathan Gleidsom Moreira</td>
          <td>(34)98844-6331</td>
          <td>(34)98844-6331</td>
        <tr>
          <!-- Linha 2 -->
        <tr>
          <th scope="row">1</th>
          <td>Jhonathan Gleidsom Moreira</td>
          <td>(34)98844-6331</td>
          <td>(34)98844-6331</td>
        <tr>
          <!-- Linha 3 -->
        <tr>
          <th scope="row">1</th>
          <td>Jhonathan Gleidsom Moreira</td>
          <td>(34)98844-6331</td>
          <td>(34)98844-6331</td>
        <tr>
      </tbody>
    </table>
