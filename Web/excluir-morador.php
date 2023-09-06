<?php
session_start();

require 'logica.php';

//Necessária a implementação de uma medida de segurança que impessa os deletes pela url


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
    $_SESSION['erro'] = false;
    header('Location: listagem-pessoas.php');
    exit();
}else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}