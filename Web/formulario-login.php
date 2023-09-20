<?php
session_start();
require 'logica.php';
if(autenticado()){
  redireciona('inicio.php');
  exit();
}
$titulo_pagina = "Faça login";
require "header.php"; 
?>
<div class="container-fluid my-5 py-5">
    <div class="justify-content-center align-items-center">
        <div class="container px-5 me-5 mb-5">
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
<?php include 'footer.php'; ?>