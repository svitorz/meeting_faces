<?php
session_start();

require 'logica.php';

//Necessária a implementação de uma medida de segurança que impessa os deletes pela url


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
    header('Location: listagem-usuario.php');
    exit();
}else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = true;
    header('Location: listagem-usuario.php');
    exit();
}