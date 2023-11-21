<?php
session_start();
require 'logica.php';


$titulo_pagina = "Listagem de todos os MORADOR cadastrados no sistema";
require_once 'header.php';

require 'conexao/conexao.php';

$sql = "SELECT id_morador,primeiro_nome,cidade_atual FROM MORADOR ORDER BY primeiro_nome";
$stmt = $conn->query($sql);
?>
<div class="row p-5">
    <?php 
    while($row = $stmt->fetch()){
        ?>
    <div class="col-3 text-center ">
        <div class="card" style="width: 20rem;">
            <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg"
                class="card-img-top" alt="..." />
            <div class="card-body">
                <h5 class="card-title text-capitalize"> <?= $row['primeiro_nome']; ?> </h5>
                <p class="card-text">Está localizado na cidade de <span class="text-capitalize"> <?=$row['cidade_atual']; ?> </span> </p>
                <a href="info.php?id_morador=<?=$row['id_morador'];?>" class="btn btn-primary mx-3 mb-2">Informações</a>
                <a href="formulario-descricao.php?id_morador=<?=$row['id_morador']?>" class="btn btn-info mx-4 mb-2">Enviar descrição</a>
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
if(isset($_SESSION['sucesso'])){
    if($_SESSION['sucesso'] == true){
        ?>
        <div class="alert alert-success">
            <h4>Operação realizada com sucesso!</h4>
        </div>
<?php 
unset($_SESSION['sucesso']);
}else{
    unset($_SESSION['sucesso']);
    $error = $_SESSION['erro'];
    ?>
    <div class="alert alert-danger">
        <h4>Erro ao realizar operação!</h4>
        <p> <?= $error ?> </p>
    </div>
<?php
unset($_SESSION['erro']);
}
}
?>
<?php
require_once 'footer.php';
?>