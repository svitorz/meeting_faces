<?php
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$id_morador = filter_input(INPUT_GET, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM moradores WHERE id_morador = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id_morador]);
if($result){
    $_SESSION['sucesso'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}else {
    $_SESSION['erro'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}