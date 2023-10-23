<?php
session_start();
require 'logica.php';

if (!autenticado()) {
    header('location: formulario-login.php');
    exit();
}
$id_usuario = id_usuario();

require 'conexao/conexao.php';
$titulo_pagina = "Seu perfil";
require 'header.php';
?>
<div class="py-5">
<section class="p-5" style="background-color: #eee;">
    <div class="row py-5">
        <div class="col-lg-4">
            <div class="card text-capitalize mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">
                        <span class="text-capitalize">
                            <?= nome_usuario(); ?>
                        </span>
                    </h5>
                    <!-- <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary">Follow</button>
                        <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                    </div> -->
                </div>
            </div>
            <div class="card text-capitalize mb-4 mb-lg-0" style="display:none;">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <!-- <i class="fas fa-globe fa-lg text-warning"></i> -->
                            <p class="mb-0"></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <!-- <i class="fab fa-github fa-lg" style="color: #333333;"></i> -->
                            <p class="mb-0"></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <!-- <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i> -->
                            <p class="mb-0"></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <!-- <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i> -->
                            <p class="mb-0"></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <!-- <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i> -->
                            <p class="mb-0"></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nome</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= nome_usuario(); ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <?= email_usuario(); ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</div>
</div>
</div>
</section>
</div>