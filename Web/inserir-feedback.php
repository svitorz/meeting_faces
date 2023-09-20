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
$situacao = "Em análise"; 


strtoupper($insert = "INSERT INTO DESCRICAO(ID_USUARIO, ID_MORADOR, COMENTARIO, SITUACAO) VALUES (?,?,?,?)");
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$id_usuario,$id_morador,$feedback,$situacao]);
if($result==true){
    $_SESSION['sucesso'] = true;
    header('Location: index.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: formulario-feedback.php');
    exit();
}