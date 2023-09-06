<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die(); 
}

$nome = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_origem = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$data = str_replace("/", "-", $data_nasc);

require 'conexao/conexao.php';

$sql = "UPDATE moradores SET nome = ?, cidade_atual = ?, cidade_natal = ?, data_nasc = ?, nome_familiar_proximo = ?, grau_parentesco = ? WHERE id_morador = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $cidade_atual, $cidade_origem, $data_nasc, $nome_familiar, $grau_parentesco, $id_morador]);

$count = $stmt->rowCount();

if($result == true &&  $count >= 1 ){
    $_SESSION['sucesso'] = true;
    redireciona('listagem-pessoas.php');
    exit();
} else {
    $_SESSION['erro'] = true;
    redireciona('listagem-pessoas.php');
    exit();
}