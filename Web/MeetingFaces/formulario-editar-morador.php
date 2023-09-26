<?php
session_start();

require 'logica.php';
if (!isAdmin()) {
  redireciona();
  die();
}
$id_morador = filter_input(INPUT_GET, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

$sql = "SELECT * FROM MORADOR WHERE id_morador = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_morador]);
$row = $stmt->fetch();
$titulo_pagina = "Insira as novas informações do morador";
include 'header.php';
?>
<!-- Link JQUERY via CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#data_nasc").mask("00/00/0000")
    })
</script>
<div class="container-fluid px-5 py-3">
  <div class="container">
    <form action="editar-morador.php" method="post">
      <input type="hidden" name="id_morador" value="<?= $id_morador; ?>" />
      <div class="row">
        <div class="form-outline col mb-4">
          <label class="form-label" for="primeiro_nome">Nome</label>
          <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control"
            value="<?= $row['primeiro_nome'] ?>" />
        </div>
        <div class="form-outline col mb-4">
          <label class="form-label" for="segundo_nome">Sobrenome</label>
          <input type="text" id="segundo_nome" name="segundo_nome" class="form-control"
            value="<?= $row['segundo_nome'] ?>" />
        </div>
      </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="cidade_origem">Cidade de origem</label>
            <input type="text" id="cidade_origem" name="cidade_origem" class="form-control"
              value="<?= $row['cidade_natal'] ?>" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="cidade_atual">Cidade atual</label>
            <input type="text" id="cidade_atual" name="cidade_atual" class="form-control"
              value="<?= $row['cidade_atual'] ?>" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-outline mb-4">
            <label for="data_nasc" class="form-label">Data de nascimento</label>
            <input type="date" name="data_nasc" id="data_nasc" value="<?= $row['data_nasc']; ?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-outline mb-4">
            <label class="form-label" for="nome_familiar">Nome de um familiar próximo</label>
            <input type="text" id="nome_familiar" name="nome_familiar" class="form-control"
              value="<?= $row['nome_familiar_proximo'] ?>" />
          </div>
        </div>
        <div class="col-6">
          <div class="form-outline mb-4">
            <label class="form-label" for="grau_parentesco">Grau de parentesco do familiar</label>
            <select class="form-select" name="grau_parentesco" id="grau_parentesco">
              <option value="">Selecionar</option>
              <option value="pai">Pai</option>
              <option value="mae">Mãe</option>
              <option value="irmão">Irmão(ã)</option>
              <option value="filho">Filho(a)</option>
              <option value="sobrinho">Sobrinho(a)</option>
              <option value="tio">Tio(a)</option>
              <option value="primo">Primo(a)</option>
              <option value="geno_nora">Genro ou nora</option>
              <option value="neto">Neto(a)</option>
              <option value="outros">Outros</option>
            </select>
          </div>
        </div>
      </div>
  </div>
  <button type="submit" class="btn btn-primary btn-block mb-4">Editar</button>
  </form>
</div>
</div>
<?php include 'footer.php'; ?>