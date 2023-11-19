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
$sql = "SELECT TO_CHAR(morador.data_nasc, 'dd/mm/yyyy') AS data_nasc, TO_CHAR(morador.data_nasc, 'YYYY') as ano_nasc, morador.id_morador, morador.primeiro_nome,morador.segundo_nome,morador.cidade_atual, morador.cidade_natal, morador.nome_familiar_proximo, grau_parentesco ,ADMINISTRADOR.PRIMEIRO_NOME AS PRIMEIRO_NOME_ADMINISTRADOR,
ADMINISTRADOR.ID_ADMINISTRADOR FROM MORADOR INNER JOIN ADMINISTRADOR 
        ON MORADOR.ID_ADMINISTRADOR=ADMINISTRADOR.ID_ADMINISTRADOR
            WHERE MORADOR.ID_MORADOR = ?;";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_morador]);
} catch (Exception $e) {
    //throw $th;
    echo $e->getMessage();
}
$row = $stmt->fetch();

$titulo_pagina = "Perfil de <span class='text-capitalize'>".$row['primeiro_nome']."</span>"; 

require 'header.php'; 
?>
<section class="p-5" style="background-color: #eee;">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-capitalize mb-4">
                <div class="card-body text-center">
                <!--
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;"> 
                -->
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
            <!-- <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0"> -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" <?php if(isAdmin()) { echo "style='width: 50%;'"; }else{ echo "style='width: 50%;'"; } ?> >Descrição</th>
                          <th scope="col" style="width: 25%;">Usuário</th>
                        <?php
                        if(isAdmin()){ 
                        ?>
                          <th scope="col" style="width: 25%;">ID:</th>
                        <?php
                        }
                        ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $selectdescricao = "SELECT DESCRICAO.*, USUARIO.PRIMEIRO_NOME AS PRIMEIRO_NOME_USUARIO FROM DESCRICAO INNER JOIN USUARIO ON DESCRICAO.ID_USUARIO=USUARIO.ID_USUARIO WHERE DESCRICAO.ID_MORADOR = ?;"; 
                      try {
                        //code...
                        $stmt = $conn->prepare($selectdescricao);
                        $stmt->execute([$id_morador]);
                      } catch (Exception $e) {
                        //throw $th;
                        echo $e->getMessage();
                      }
                        while($rowDescricao = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <tr>
                        <td> 
                            <?= $rowDescricao['comentario']; ?>
                        </td>
                        <td class="text-capitalize"> 
                            <?= $rowDescricao['primeiro_nome_usuario']; ?>
                        </td>
                        <?php
                        if(isAdmin()){
                            ?>
                        <td>
                             <?= $rowDescricao['id_usuario']; ?>
                        </td>
                        </tr>
                        <?php
                           }   
                        }
                        ?>
                        </tbody>
                    </table>
                <!-- </div>
            </div> -->
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
                    if(isset($row['data_nasc']) && $row['data_nasc']){
                        $date = date("Y");
                        $idade = $date - $row['ano_nasc'];
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Data de nascimento e idade</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['data_nasc']; ?> , <?= $idade; ?> anos.
                            </p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                     if(isAdmin()){
                        ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Cadastrado por</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted text-capitalize mb-0">
                                <?= $row['primeiro_nome_administrador']; ?> ,  id: <?= $row['id_administrador']; ?>
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