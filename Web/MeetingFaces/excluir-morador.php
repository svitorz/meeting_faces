<?php
session_start();

require 'logica.php';
//verifica se é admin
if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$id_morador = filter_input(INPUT_GET, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

$sqlDesc = "DELETE FROM DESCRICAO WHERE id_morador = ?";
$stmt = $conn->prepare($sqlDesc);
$result = $stmt->execute([$id_morador]);
$sql = "DELETE FROM MORADOR WHERE id_morador = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_morador]);
if($result){
    $_SESSION['sucesso'] = true;
    //Visualmente, parece código inútil, mas em certos momentos da aplicação, as duas mensagens eram
    //exibidas, por isso a necessidade de duas variáveis setadas com boolean. 
    $_SESSION['erro'] = false;
    header('Location: listagem-pessoas.php');
    exit();
}else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}