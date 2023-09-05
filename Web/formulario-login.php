<?php
session_start();
require 'logica.php';
require "header.php"; 
?>
<div class="container-fluid my-5 py-5">
    <?php 
if(isset($_SESSION['erro']) && $_SESSION['erro']){
  ?>
  <div class="alert alert-warning" role="alert">
    <h4>Erro ao fazer login.</h4>
    <p>Verifique se os dados estão corretos ou se você está cadastrado.</p>
  </div>
  <?php
}
unset($_SESSION['erro']);
?>
<?php
if(isset($_SESSION['restrito']) && $_SESSION['restrito']){
  ?>
  <div class="alert alert-warning" role="alert">
    <h4>Erro ao acessar a página.</h4>
    <p>Você precisa estar logado para acessar esta página.</p>
  </div>
  <?php
unset($_SESSION['restrito']);
}
if(isset($_SESSION['sucesso']) && $_SESSION['sucesso']){
  ?>
  <div class="alert alert-success" role="alert">
    <h4>Usuário cadastrado com sucesso.</h4>
    <p>Faça login para acessar a página.</p>
  </div>
  <?php
  unset($_SESSION['sucesso']);
}
?>
    <div class="justify-content-center align-items-center">
        <div class="container px-5 me-5 mb-5">
            <form action="login.php" method="post">
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="jose@gmail.com" class="form-control" required />
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="senha">Senha</label>
                  <input type="password" id="senha" name="senha"  class="form-control" placeholder="************" required />
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>