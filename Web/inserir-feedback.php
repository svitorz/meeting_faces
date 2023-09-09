<?php 
session_start();

require 'logica.php';
if(!autenticado()){
    redireciona('formulario-login.php');
    die();
}
require 'conexao/conexao.php';

$feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_SPECIAL_CHARS);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$id_permissao = 1; 


$insert = "INSERT INTO descricao(id_usuario, id_morador, descricao, id_permissao) VALUES (?,?,?,?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$id_usuario,$id_morador,$feedback,$id_permissao]);
if($result==true){
    $_SESSION['sucesso'] = true;
    header('Location: inicio.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: formulario-feedback.php');
    exit();
}