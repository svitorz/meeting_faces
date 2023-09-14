<?php
session_start();

require 'logica.php';

if (!autenticado()) {
    $_SESSION['restrito'] = true;
    redireciona('formulario-login.php');
    die();
}

$id_morador = filter_input(INPUT_GET, 'id_morador',FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

//CONCAT(myguests.firstname,' ',myguests.lastname) AS name, myguests.email, messages.message 
$sql = "select moradores.*,CONCAT(usuario.primeiro_nome) AS primeiro_nome_usuario,usuario.id_usuario,descricao.descricao AS feedback_texto, descricao.id_permissao AS id_feedback
            from usuario inner join moradores 
                on usuario.id_usuario = moradores.id_usuario 
                    left join descricao
                        on moradores.id_morador=descricao.id_morador
                            where moradores.id_morador=?
                            and descricao.id_permissao=3";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_morador]);
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
                    <p class="text-muted text-capitalize mb-1">Está em
                        <?= $row['cidade_atual']; ?>
                    </p>
                    <div class="d-flex justify-content-center mb-2">
                    <a href="formulario-feedback.php?id_morador=<?=$id_morador;?>" class="btn btn-success me-2">Enviar feedback</a>
                    <?php if(isAdmin()){
                        ?>
                        <a href="formulario-editar-morador.php?id_morador=<?=$id_morador;?>" class="btn btn-warning me-2">Editar</a>
                        <a href="excluir-morador.php?id_morador=<?=$id_morador;?>" class="btn btn-danger">Excluir</a>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <?php 
                        while($rowFeedback = $stmt->fetch()){ 
                        if(isset($rowFeedback['feedback_texto']) && $rowFeedback['feedback_texto']){
                            if($rowFeedback['id_feedback']==3){
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <p class="mb-0"> <?= $rowFeedback['feedback_texto'] ?> </p>
                        </li>
                        <?php
                                }
                            }
                        }
                        ?>
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
                    if(isset($row['cidade_atual']) && $row['cidade_atual']){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Cidade atual:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['cidade_atual']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    if(isset($row['cidade_natal']) && $row['cidade_natal']){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Cidade natal</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['cidade_natal']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    if(isset($row['nome_familiar_proximo']) && $row['nome_familiar_proximo']){
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nome de um familiar próximo</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['nome_familiar_proximo']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    if(isset($row['grau_parentesco']) && $row['grau_parentesco']){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Grau de parentesco</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['grau_parentesco']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <?php if(isAdmin()){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Cadastrado por</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize text-capitalize mb-0">
                                <?= $row['primeiro_nome_usuario']; ?>, id: <?= $row['id_usuario']; ?>
                            </p>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php require 'footer.php'; ?>