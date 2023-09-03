<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

require 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4 border-end">
            <div class="py-5">
                <ul>
                    <li class="nav-link mb-5">
                        <a class="nav-link" href="#">
                            <span class="btn btn-dark">
                                Listagem de moradores de rua cadastrados
                            </span>
                        </a>
                    </li>
                    <li class="nav-link mb-5">
                        <a class="nav-link" href="#">
                            <span class="btn btn-dark">
                                Listagem de usuários cadastrados
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-8">
            <div class="py-5">
                <h1 class="text-center">Tela operacional</h1>
            </div>
            <p class="text-center">
            Olá <span class="text-capitalize"><?= nome_usuario(); ?></span>, seja bem vindo!    
            Você está registrado como administrador
        </p>
        </div>
    </div>
</div>