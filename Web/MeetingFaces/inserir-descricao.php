<?php 
session_start();

require 'logica.php';
if(!autenticado()){
    redireciona('formulario-login.php');
    die();
}
require 'conexao/conexao.php';

$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$situacao = "Em análise"; 

$insert = "INSERT INTO DESCRICAO(ID_USUARIO, ID_MORADOR, COMENTARIO, SITUACAO) VALUES (?,?,?,?)";

try{
    $stmt = $conn->prepare($insert);
    $result = $stmt->execute([$id_usuario,$id_morador,$descricao,$situacao]);
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

redireciona('formulario-descricao.php');