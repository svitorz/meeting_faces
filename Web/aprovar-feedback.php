<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

$aprovacao = filter_input(INPUT_POST, 'aprovacao', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);

require 'conexao/conexao.php';

if(isset($aprovacao)&&isset($id)){
    if($aprovacao==2){
        $sql = "UPDATE descricao SET SITUACAO = 'REPROVADO' WHERE id_descricao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }elseif($aprovacao==3){
        $sql = "UPDATE descricao SET SITUACAO = 'APROVADO' WHERE id_descricao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
    $result = $stmt->rowCount();
    if($result>0){
        $_SESSION['sucesso'] = true;
        header('Location: listagem-feedback.php');
        exit();
    }   
}