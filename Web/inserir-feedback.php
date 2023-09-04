<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_SPECIAL_CHARS);
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$aprovacao = 2; 
$insert = "INSERT INTO feedback(feedback_texto, id_morador, id_usuario, aprovacao) VALUES (?,?,?,?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$feedback,$id_morador,$id_usuario,$aprovacao]);
if($result==true){
    $_SESSION['sucesso'] = true;
    header('Location: inicio.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: formulario-feedback.php');
    exit();
}