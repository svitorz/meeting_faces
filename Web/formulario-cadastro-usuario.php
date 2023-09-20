<?php
session_start();
require 'logica.php';

if(autenticado()){
  redireciona('index.php');
  exit();
}
$titulo_pagina = "Insira seus dados para cadastro";
include 'header.php';
?>
<script>
    const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
      if (!value) return ""
      value = value.replace(/\D/g,'')
      value = value.replace(/(\d{2})(\d)/,"($1) $2")
      value = value.replace(/(\d)(\d{4})$/,"$1-$2")
      return value
    }
    function verifica_senhas() {
        var senha = document.getElementById("senha");
        var confsenha = document.getElementById("confsenha");

        if (senha.value && confsenha.value) {
            if (senha.value != confsenha.value) {
                senha.classList.add("is-invalid");
                confsenha.classList.add("is-invalid");
                confsenha.value = null;
            } else {
                senha.classList.remove("is-invalid");
                confsenha.classList.remove("is-invalid");
            }
        }
    }
</script>
<div class="container-fluid px-5 py-3">
    <form action="inserir-usuario.php" method="post">
    <div class="row">
        <div class="form-outline col mb-4">
            <label class="form-label" for="primeiro_nome">Nome</label>
            <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" placeholder="Ex: José" />
        </div>
        <div class="form-outline col mb-4">
            <label class="form-label" for="segundo_nome">Sobrenome</label>
            <input type="text" id="segundo_nome" name="segundo_nome" class="form-control" placeholder="Ex: Silva" />
        </div>
      </div>
      <div class="form-outline mb-4">
          <label class="form-label" for="email_usuario">Endereço de email</label>
        <input type="email" id="email_usuario" name="email_usuario" class="form-control" placeholder="joao@gmail.com" required/>
      </div>
      <div class="form-outline mb-4">
          <label class="form-label" for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" maxlength="15" onkeyup="handlePhone(event)" placeholder="(17)99999-9999" required />
      </div>
      <div class="form-outline mb-4">
          <label class="form-label" for="data_nasc">Data de nascimento</label>
          <!-- <input type="text" id="data_nasc" name="data_nasc" class="form-control" required /> -->
          <input type="text" class="form-control" id="data_nasc" name="data_nasc" placeholder="Ex.: dd/mm/aaaa" data-mask="00/00/0000" maxlength="10" autocomplete="off"/> 
      </div>
      <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required/>
            </div>
            <div class="mb-3">
                <label for="confsenha" class="form-label">Confirmação senha</label>
                <input type="password" class="form-control" id="confsenha" name="confsenha" required aria-describedby="confsenha confsenhaFeedback" onblur="verifica_senhas();"/>
                <div id="confsenhaFeedback" class="invalid-feedback">
                    As senhas informadas não estão iguais.
                </div>
            </div>
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="check" />
        <label class="form-check-label" for="form6Example8"> Ao criar sua conta você concorda com os <a href=""> termos e condições</a>. </label>
      </div>
      <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </form>
</div>
<?php include 'footer.php'; ?>