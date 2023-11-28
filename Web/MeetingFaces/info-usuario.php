<?php
session_start();

require 'logica.php';
//Verifica se é admin
if (!autenticado()) {
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

//Página necessária caso o administrador queira saber de quem é o perfil que enviou

$id_usuario = filter_input(INPUT_POST, 'id_usuario',FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

$sql = "SELECT * FROM USUARIOS WHERE id_usuario = ?";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_usuario]);
} catch (Exception $e) {
    echo $e->getMessage();
}

$row = $stmt->fetch();

$titulo_pagina = "Perfil de ".$row['primeiro_nome']; 

require 'header.php';
?>
<section class="p-5" style="background-color: #eee;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-capitalize mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;" />
                    <h5 class="my-3">
                        <?= $row['primeiro_nome']; ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card text-capitalize mb-4">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nome:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-capitalize mb-0">
                                    <?php
                                     echo $row['primeiro_nome'] . " " . $row['segundo_nome']; 
                                    ?>
                                </p>
                            </div>
                        </div>
                    <hr />
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
                    <hr />
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
                    <hr />
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
                    <hr />
                </div>
            </div>
        </div>
    </div>
    </div>
    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 50%;">Comentário</th>
                          <th scope="col" style="width: 25%;">Pessoa em situação de rua</th>
                          <th scope="col" style="width: 25%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $selectcomentario = 
                      "SELECT comentarios.*, MORADORES.PRIMEIRO_NOME , MORADORES.SEGUNDO_NOME, MORADORES.ID_MORADOR
                        FROM comentarios INNER JOIN MORADORES ON MORADORES.ID_MORADOR=comentarios.ID_MORADOR
                            LEFT JOIN USUARIOS ON comentarios.ID_USUARIO=USUARIOS.ID_USUARIO
                                WHERE comentarios.ID_USUARIO = ?;"; 
                      try {
                        //code...
                        $stmt = $conn->prepare($selectcomentario);
                        $stmt->execute([$id_usuario]);
                      } catch (Exception $e) {
                        //throw $th;
                        echo $e->getMessage();
                      }
                        while($rowcomentario = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <tr>
                        <td> 
                            <?= $rowcomentario['comentario']; ?>
                        </td>
                        <td class="text-capitalize">
                            <a href="info.php?id_morador=<?= $rowcomentario['id_morador']; ?>">
                                <?= $rowcomentario['primeiro_nome'] . " " . " " . $rowcomentario['segundo_nome']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="excluir-comentario.php?id_comentario=<?= $rowcomentario['id_comentario']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                        </tr>
                        <?php
                        }   
                        ?>
                        </tbody>
                    </table>
</section>
<div class="fixed-bottom">
    <?php require 'footer.php'; ?>
</div>