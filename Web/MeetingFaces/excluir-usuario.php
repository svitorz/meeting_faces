<?php
session_start();

require 'logica.php';
//verifica se é admin
//Ainda não foi implementada a opção do usuário excluir, nem editar a própria conta,
//devido a segurança na alteração de senha, então por hora, somente administradores podem excluir usuários

if(!isAdmin()){
    redireciona();
    die();
}

$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';


$sql = "DELETE FROM usuario WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_usuario]);
if($result){
    $_SESSION['sucesso'] = true;
    $_SESSION['erro'] = false;
    redireciona();
    exit();
}else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = true;
    redireciona();
    exit();
}