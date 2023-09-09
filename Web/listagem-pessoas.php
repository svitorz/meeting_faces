<?php
session_start();
require 'logica.php';


$titulo_pagina = "Listagem de todos os moradores cadastrados no sistema";
require_once 'header.php';

require 'conexao/conexao.php';

$sql = "SELECT id_morador,primeiro_nome,cidade_atual FROM moradores ORDER BY primeiro_nome";
$stmt = $conn->query($sql);

if(isset($_SESSION['sucesso']) && $_SESSION['sucesso']){
?>
    <div class="alert alert-success alert-dismissible fade show fixed-bottom" role="alert">
      <strong>Formulário enviado com sucesso!</strong> Os dados foram registrados com sucesso!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['sucesso']);
    }

if(isset($_SESSION['erro']) && $_SESSION['erro']){
?>
    <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
      <strong>Formulário não enviado!</strong> Erro ao gravar dados!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION['erro']);
    }
    ?>
    
<div class="row p-5">
    <?php 
    while($row = $stmt->fetch()){
        ?>
    <div class="col-3 text-center">
        <div class="card" style="width: 20rem;">
            <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg"
                class="card-img-top" alt="..." />
            <div class="card-body">
                <h5 class="card-title"> <?= $row['primeiro_nome']; ?> </h5>
                <p class="card-text">Está localizado na cidade de <?=$row['cidade_atual']; ?></p>
                <a href="info.php?id_morador=<?=$row['id_morador'];?>" class="btn btn-primary mx-3 mb-2">Informações</a>
                <a href="formulario-feedback.php?id_morador=<?=$row['id_morador']?>" class="btn btn-info mx-4 mb-2">Enviar feedback</a>
                <?php 
                if(isAdmin()){
                    ?>
                <a href="formulario-editar-morador.php?id_morador=<?=$row['id_morador'];?>" class="btn btn-warning mx-2 mb-2">Editar registro</a>
                <a href="excluir-morador.php?id_morador=<?=$row['id_morador'];?>" class="btn btn-danger mx-2 mb-2" onclick="if(!confirm('Deseja excluir?')) return false;">Excluir registro</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php
require_once 'footer.php';
?>