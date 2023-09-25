<?php
session_start();

//Página necessária para acessar mais informações dos moradores de rua, como dados e descrições

require 'logica.php';
//Caso não esteja autenticado, redireciona para o formulário de login
if (!autenticado()) {
    $_SESSION['restrito'] = true;
    redireciona('formulario-login.php');
    die();
}

$id_morador = filter_input(INPUT_GET, 'id_morador',FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

//SELECT com inner join que pega todos os dados do morador, 
//os dados de quem cadastrou com o id administrador,
// a descricao caso o morador tenha alguma aprovada e o id e o nome do usuario que enviou a descricao
    $sql = "SELECT MORADOR.*,
                ADMINISTRADOR.PRIMEIRO_NOME AS NOME_ADMINISTRADOR,
                    ADMINISTRADOR.ID_ADMINISTRADOR,
                        DESCRICAO.COMENTARIO,
                            DESCRICAO.SITUACAO,
                            USUARIO.PRIMEIRO_NOME AS PRIMEIRO_NOME_USUARIO,
                                USUARIO.SEGUNDO_NOME AS SEGUNDO_NOME_USUARIO,
                                    USUARIO.ID_USUARIO
                                        FROM MORADOR INNER JOIN ADMINISTRADOR 
                                            ON MORADOR.ID_ADMINISTRADOR=ADMINISTRADOR.ID_ADMINISTRADOR 
                                                LEFT JOIN DESCRICAO 
                                                    ON MORADOR.ID_MORADOR=DESCRICAO.ID_MORADOR 
                                                        LEFT JOIN USUARIO 
                                                            ON DESCRICAO.ID_USUARIO=USUARIO.ID_USUARIO
                                                                WHERE MORADOR.ID_MORADOR = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_morador]);
$row = $stmt->fetch();
$titulo_pagina = "Perfil de <span class='text-capitalize'>".$row['primeiro_nome']."</span>"; 
require 'header.php'; 
    ?>
<section class="p-5" style="background-color: #eee;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-capitalize mb-4">
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
                        //Caso o usuário seja administrador, são exibidas as opçoes de 
                        //editar e excluir morador
                        ?>
                        <a href="formulario-editar-morador.php?id_morador=<?=$id_morador;?>" class="btn btn-warning me-2">Editar</a>
                        <a href="excluir-morador.php?id_morador=<?=$id_morador;?>" class="btn btn-danger">Excluir</a>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="card text-capitalize mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <?php  
                        while($rowDescricao = $stmt->fetch()){
                            if(isset($rowDescricao['comentario']) && $rowDescricao['comentario'] && $rowDescricao['situacao']=='APROVADO'){ 
                                //
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <p class="mb-0"> <?= $rowDescricao['comentario']; ?> </p>
                                <p> 
                                    Feito por:
                                    <?= $rowDescricao['primeiro_nome_usuario']; ?> 
                                    <?= $rowDescricao['segundo_nome_usuario']; ?> 
                                </p>
                                <?php 
                                if(isAdmin()){
                                    //Caso o usuario seja admin, é mostrado o ID no banco de quem enviu o comentário
                                    ?>
                                <p>
                                    Id:<?= $rowDescricao['id_usuario']; ?>
                                </p>
                                <?php
                                }
                            }
                                ?>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card text-capitalize mb-4">
                <div class="card-body">
                    <?php
                    //Os issets são necessários pois nem todos os moradores possuem todas as informações    
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
                                    { echo $row['segundo_nome'] ; }
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
                                <?= $row['nome_administrador']; ?>, id: <?= $row['id_administrador']; ?>
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