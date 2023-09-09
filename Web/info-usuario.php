<?php
session_start();

require 'logica.php';

if (!isAdmin()) {
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

$id_usuario = filter_input(INPUT_GET, 'id_usuario',FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

$sql = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_usuario]);
$row = $stmt->fetch();

$titulo_pagina = "Perfil de ".$row['primeiro_nome']; 
require 'header.php';
?>
<section class="p-5" style="background-color: #eee;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">
                        <?= $row['primeiro_nome']; ?>
                    </h5>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
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
                    <?php
                    if(isset($row['primeiro_nome']) && $row['primeiro_nome']){
                        ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nome:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted text-capitalize mb-0">
                                    <?php
                                    print_r($row['primeiro_nome']);
                                    echo "<span class='px-1' />";
                                    if(isset($row['segundo_nome']) && $row['segundo_nome'])
                                    { print_r($row['segundo_nome']); }
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php 
                    if(isset($row['telefone']) && $row['telefone']){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Telefone:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['telefone']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    if(isset($row['email']) && $row['email']){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <?= $row['email']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    if(isset($row['data_nasc']) && $row['data_nasc']){
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Data de nascimento</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['data_nasc']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                        ?>
                    <hr />
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
<?php require 'footer.php'; ?>