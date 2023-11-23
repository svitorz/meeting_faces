<?php
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    exit();
}
require 'conexao/conexao.php';

$primeiro_nome = filter_input(INPUT_POST, 'primeiro_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$segundo_nome = filter_input(INPUT_POST, 'segundo_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_natal = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$id_administrador = filter_input(INPUT_POST, 'id_administrador', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "INSERT INTO 
MORADORES(primeiro_nome,segundo_nome, cidade_atual, cidade_natal,data_nasc, nome_familiar_proximo, grau_parentesco,id_administrador) 
VALUES (?,?,?,?,?,?,?,?)";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$primeiro_nome,$segundo_nome,$cidade_atual,$cidade_natal,$data_nasc,$nome_familiar,$grau_parentesco,$id_administrador]);
} catch (Exception $e) {
    $_SESSION['sucesso'] = false;
    $erro = $e->getMessage();
}

if($result){
    $_SESSION['sucesso'] = true;
}else{
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $erro;
}
redireciona('listagem-pessoas.php');
