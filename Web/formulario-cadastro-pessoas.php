<?php
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}


include 'header.php';
?>
<h1 class="text-center py-5">Insira os dados para cadastro: </h1>
<!--  -->
<?php 
if(isset($_SESSION['usuario_existe']) && $_SESSION['usuario_existe']){
  ?>
  <div class="alert alert-warning" role="alert">
    <h4>O email informado já existe.</h4>
    <p>Verifique se você já possui uma conta ou se o email informado está correto.</p>
  </div>
  <?php
}
unset($_SESSION['usuario_existe']);
?>

<div class="container-fluid px-5 py-3">
    <form action="inserir-usuario.php" method="post">
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="nome_usuario">Nome</label>
        <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" placeholder="João Silva" required/>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
          <label class="form-label" for="email_usuario">Endereço de email</label>
        <input type="email" id="email_usuario" name="email_usuario" class="form-control" placeholder="joao@gmail.com" required/>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
          <label class="form-label" for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" maxlength="15" onkeyup="handlePhone(event)" placeholder="(17)99999-9999" required />
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