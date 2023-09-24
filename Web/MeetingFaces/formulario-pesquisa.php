<?php
session_start();

require 'logica.php';

$titulo_pagina = "Pesquisa de pessoas com dados específicas";

include 'header.php';
?>
<div class="container-fluid px-5 py-3">
  <div class="container">
    <form action="listagem-pessoas-encontradas.php" method="post">
      <div class="row">
        <div class="form-outline col mb-4">
          <label class="form-label" for="primeiro_nome">Nome</label>
          <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" placeholder="Ex: José " />
        </div>
        <div class="form-outline col mb-4">
          <label class="form-label" for="segundo_nome">Sobrenome</label>
          <input type="text" id="segundo_nome" name="segundo_nome" class="form-control" placeholder="Ex:  Silva" />
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-6">
          <div class="form-outline">
            <label class="form-label" for="cidade_origem">Cidade de origem</label>
            <input type="text" id="cidade_origem" name="cidade_origem" class="form-control"
              placeholder="Ex: São Paulo" />
          </div>
        </div>
        <div class="col-6">
          <div class="form-outline">
            <label class="form-label" for="cidade_atual">Cidade atual</label>
            <input type="text" id="cidade_atual" name="cidade_atual" class="form-control"
              placeholder="Ex:: Rio de Janeiro" />
          </div>
        </div>
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="data_nasc">Data de nascimento</label>
        <!-- <input type="text" id="data_nasc" name="data_nasc" class="form-control" /> -->
        <input type="text" class="form-control" id="data_nasc" name="data_nasc" placeholder="Ex.: dd/mm/aaaa"
          data-mask="00/00/0000" maxlength="10" autocomplete="off" />
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="nome_familiar">Nome de um familiar próximo</label>
        <input type="text" id="nome_familiar" name="nome_familiar" class="form-control" placeholder="Ex: Maria Silva" />
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="grau_parentesco">Grau de parentesco</label>
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
      <button type="submit" class="btn btn-primary btn-block mb-4">PESQUISAR</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>