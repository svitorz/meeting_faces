<?php
session_start();
require 'logica.php';
include 'header.php'; 
?>
<div class="container-fluid px-5 py-3">
    <h4 class="text-center py-5">Insira os dados para cadastro:</h4>
    <form action="inserir-morador.php" method="post">
        <div class="form-outline mb-4">
            <label class="form-label" for="nome_completo">Nome</label>
            <input type="text" id="nome_completo" name="nome_completo" class="form-control" placeholder="Ex: José Silva" />
        </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
              <label class="form-label" for="cidade_origem">Cidade de origem</label>
              <input type="text" id="cidade_origem" name="cidade_origem" class="form-control" placeholder="Ex: São Paulo" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
              <label class="form-label" for="cidade_atual">Cidade atual</label>
            <input type="text" id="cidade_atual" name="cidade_atual" class="form-control" placeholder="Ex:: Rio de Janeiro"/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <div class="form-outline mb-4">
                <label class="form-label" for="nome_familiar">Nome de um familiar próximo</label>
                <input type="text" id="nome_familiar" name="nome_familiar" class="form-control" placeholder="Ex: Maria Silva"/>
            </div>
        </div>
        <div class="col">
            <div class="form-outline mb-4">
                <label class="form-label" for="grau_parentesco">Grau de parentesco do familiar</label>
              <select class="form-select" name="grau_parentesco" id="grau_parentesco">
                  <option value="pai" selected>Pai</option>
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
      <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </form>
</div>
<?php include 'footer.php'; ?>