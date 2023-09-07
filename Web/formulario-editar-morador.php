<?php
session_start();

require 'logica.php';
if(!isAdmin()){
    redireciona();
    die(); 
}
$id_morador = filter_input(INPUT_GET, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

$sql = "SELECT * FROM moradores WHERE id_morador = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_morador]);
$row = $stmt->fetch();

include 'header.php'; 
?>
<div class="container-fluid px-5 py-3">
    <form action="editar-morador.php" method="post">
      <input type="hidden" name="id_morador" value="<?=$id_morador;?>">
        <div class="form-outline mb-4">
            <label class="form-label" for="nome_completo">Nome</label>
            <input type="text" id="nome_completo" name="nome_completo" class="form-control" value="<?= $row['nome']?>" />
        </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
              <label class="form-label" for="cidade_origem">Cidade de origem</label>
              <input type="text" id="cidade_origem" name="cidade_origem" class="form-control" value="<?= $row['cidade_natal']?>" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
              <label class="form-label" for="cidade_atual">Cidade atual</label>
              <input type="text" id="cidade_atual" name="cidade_atual" class="form-control" value="<?= $row['cidade_atual']?>"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-outline mb-4">
            <label for="data_nasc" class="form-label">Data de nascimento</label>
            <input type="date" name="data_nasc" id="data_nasc" value="<?=$row['data_nasc'];?>" class="form-control">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
            <div class="form-outline mb-4">
                <label class="form-label" for="nome_familiar">Nome de um familiar próximo</label>
                <input type="text" id="nome_familiar" name="nome_familiar" class="form-control" value="<?= $row['nome_familiar_proximo']?>"/>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline mb-4">
                <label class="form-label" for="grau_parentesco">Grau de parentesco do familiar</label>
              <select class="form-select" name="grau_parentesco" id="grau_parentesco" value="<?=$row['grau_parentesco']?>">
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
      <button type="submit" class="btn btn-primary btn-block mb-4">Editar</button>
    </form>
</div>
<?php include 'footer.php'; ?>