<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

$aprovacao = filter_input(INPUT_GET, 'aprovacao', FILTER_SANITIZE_NUMBER_INT);
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';

if(isset($aprovacao)&&isset($id)){
    if($aprovacao==2){
        $sql = "UPDATE descricao SET id_permissao = 2 WHERE id_descricao = ?";
    }elseif($aprovacao==3){
        $sql = "UPDATE descricao SET id_permissao = 3 WHERE id_descricao = ?";
    }
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
    if($result==true){
        $_SESSION['sucesso'] = true;
        header('Location: listagem-feedback.php');
        exit();
    }   
}