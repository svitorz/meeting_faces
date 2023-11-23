<?php 
session_start();

require 'logica.php';
if(!autenticado()){
    redireciona('formulario-login.php');
    die();
}
require 'conexao/conexao.php';

$comentario = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_SPECIAL_CHARS);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$situacao = "Em análise"; 

$insert = "INSERT INTO comentarios(ID_USUARIO, ID_MORADOR, COMENTARIO, SITUACAO) VALUES (?,?,?,?)";

try{
    $stmt = $conn->prepare($insert);
    $result = $stmt->execute([$id_usuario,$id_morador,$comentario,$situacao]);
} catch(Exception $e){
    $_SESSION['sucesso'] = false;
    $error = $e->getMessage();
}


if($result==true){
    $_SESSION['sucesso'] = true; 
}else {
    $_SESSION['erro'] = $error;
    $_SESSION['sucesso'] = false;
}

redireciona('inicio.php');