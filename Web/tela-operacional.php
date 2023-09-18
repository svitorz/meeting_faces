<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}
$titulo_pagina = "";
require 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4 border-end">
            <div class="py-5">
                <ul>
                    <li class="nav-link mb-5">
                        <a class="nav-link" href="formulario-cadastro-moradores.php">
                            <span class="btn btn-dark">
                                Cadastrar novo morador de rua
                            </span>
                        </a>
                    </li>
                        <?php 
if(isAdmin()){
?>
                    <li class="nav-link mb-5">
                        <a class="nav-link" href="listagem-pessoas.php">
                            <span class="btn btn-dark">
                                Listagem de MORADOR de rua cadastrados
                            </span>
                        </a>
                    </li>
                    <!-- <li class="nav-link mb-5">
                        <a class="nav-link" href="listagem-usuario.php">
                            <span class="btn btn-dark">
                                Listagem de usuários cadastrados
                            </span>
                        </a>
                    </li> -->
                        <li class="nav-link mb-5">
                        <a class="nav-link" href="formulario-cadastro-cadastrador.php">
                            <span class="btn btn-dark">
                                Cadastrar novo cadastrador
                            </span>
                        </a>
                    </li>
                    </li>
                    <li class="nav-link mb-5">
                        <a class="nav-link" href="listagem-feedback.php">
                            <span class="btn btn-dark">
                                Aprovação de feedbacks
                            </span>
                        </a>
                    </li>
<?php
}                    
?>
                </ul>
            </div>
        </div>
        <div class="col-8">
            <div class="py-5">
                <h1 class="text-center">Tela operacional</h1>
            </div>
            <p class="text-center">
            Olá <span class="text-capitalize"> <?= nome_usuario(); ?></span>, seja bem vindo!    
            Você está registrado como <?php if(isAdmin()){echo 'administrador'; }else{ echo  'cadastrante';} ?>
        </p>
        <?php 
        if(isset($_SESSION['cadastrado']) && $_SESSION['cadastrado']){
            ?>
            <div class="alert alert-success">
                <h4>Cadastro realizado com sucesso!</h4>
                <p>Os dados foram gravados, verifique os as pessoas cadastradas <a href="listagem-pessoas.php"> aqui </a>.</p>
            </div>
        <?php
        unset($_SESSION['cadastrado']);
            }
        ?>
        </div>
    </div>
</div>