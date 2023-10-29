<?php
session_start();
require 'logica.php';

//Necessário saber se o usuário já está autenticado, pois se estiver, 
//não é permitido entrar no formulário de cadastro de usuários
if(autenticado()){
  redireciona('index.php');
  exit();
}

$titulo_pagina = "Insira seus dados para cadastro";
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
            <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" placeholder="Ex: José" required />
        </div>
        <div class="form-outline col mb-4">
            <label class="form-label" for="segundo_nome">Sobrenome</label>
            <input type="text" id="segundo_nome" name="segundo_nome" class="form-control" placeholder="Ex: Silva" required />
        </div>
    </div>
      <div class="form-outline mb-4">
          <label class="form-label" for="email_usuario">Endereço de email</label>
        <input type="email" id="email_usuario" name="email_usuario" class="form-control" placeholder="joao@gmail.com" required/>
      </div>
    <div class="row">  
      <div class="form-outline col mb-4">
          <label class="form-label" for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" maxlength="15" onkeyup="handlePhone(event)" placeholder="(17)99999-9999" required />
      </div>
      <div class="form-outline col mb-4">
          <label class="form-label" for="data_nasc">Data de nascimento</label>
          <input type="text" class="form-control" id="data_nasc" name="data_nasc" placeholder="Ex.: dd/mm/aaaa"  required  /> 
      </div>
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
      <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </form>
</div>
<div class="fixed-bottom">
<?php include 'footer.php'; ?>
</div>