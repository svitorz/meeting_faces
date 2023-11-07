<?php
session_start();
require 'logica.php';
//Se o usuário já está autenticado, não pode fazer login novamente
if(autenticado()){
  redireciona('inicio.php');
  exit();
}
$titulo_pagina = "Faça login";
require "header.php"; 
?>
<div class="container-fluid my-5 py-5">
    <div class="justify-content-center align-items-center pb-5">
        <div class="container py-5 my-5">
            <form action="login.php" method="post">
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="jose@gmail.com" class="form-control" required />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="senha">Senha</label>
                  <input type="password" id="senha" name="senha"  class="form-control" placeholder="************" required />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
            </form>
        </div>
    </div>
</div>
<?php 
if(isset($_SESSION['result_login'])){
    if($_SESSION['result_login']){
      
      
    }else{
      $erro = $_SESSION['erro'];
      unset($_SESSION['erro']);
      ?>
      <div class="alert alert-warning">
        <h4>Falha ao realizar autenticação!</h4>
        <p>
          <?php echo $erro; ?>
        </p>
      </div>
      <?php
    }
    unset($_SESSION['result_login']);
  }
?>
</div>
</div>
<div class="fixed-bottom">
    <?php include 'footer.php'; ?>
</div>