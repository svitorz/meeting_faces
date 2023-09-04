<?php 
session_start();
require 'logica.php';
if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}
$aprovacao = $_GET['aprovacao'];
$id_feedback = $_GET['id_feedback'];

require 'conexao/conexao.php';
if($aprovacao == 1){
$sql = "UPDATE feedback SET aprovacao = :aprovacao WHERE id_feedback = :id_feedback";
$stmt = $conn->prepare($sql);
//usando bind param
$stmt->bindParam(':aprovacao', $aprovacao);
$stmt->bindParam(':id_feedback', $id_feedback);
$stmt->execute();
    if($count = $stmt->rowCount() > 0){
        $_SESSION['aprovacao'] = true;
        redireciona('listagem-feedback.php');
        die();
    }else{
        $_SESSION['aprovacao'] = false;
        redireciona('listagem-feedback.php');
        die();
    }
} else if($aprovacao == 2){
$sql = "INSERT INTO feedback_negado (id_feedback, feedback_texto, id_morador, id_usuario, aprovacao)
        SELECT (id_feedback, feedback_texto, id_morador, id_usuario, aprovacao) 
        FROM feedback 
        WHERE aprovacao = 2";
$stmt = $conn->prepare($sql);
$stmt->execute();
redireciona('listagem-feedback.php');
die();
}
?>