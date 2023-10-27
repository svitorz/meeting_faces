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
$cidade_origem = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$id_administrador = filter_input(INPUT_POST, 'id_administrador', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$data = str_replace("/", "-", $data_nasc);
//transforma em string a data atual do sistema
strval($ano_atual = date('d/m/Y'));
//faz a comparação do string, se a inserida for maior que a data atual, a data inserida se torna nula. 
if(strcmp($data_nasc,$ano_atual)>=0){
    $data_nasc = null;
}
strtoupper($sql = "INSERT INTO MORADOR(primeiro_nome,segundo_nome, cidade_atual, cidade_natal,data_nasc, nome_familiar_proximo, grau_parentesco,id_administrador) VALUES (:primeiro_nome, :segundo_nome, :cidade_atual, :cidade_origem, :data, :nome_familiar, :grau_parentesco, :ID_ADMINISTRADOR)");

$stmt = $conn->prepare($sql);

$result = $stmt->execute([
    ':primeiro_nome' => $primeiro_nome,
    ':segundo_nome' => $segundo_nome,
    ':cidade_atual' => $cidade_atual,
    ':cidade_origem' => $cidade_origem,
    ':data' => $data,
    ':nome_familiar' => $nome_familiar,
    ':grau_parentesco' => $grau_parentesco,
    ':ID_ADMINISTRADOR' => $id_administrador
]);
if($result){
    $_SESSION['sucesso'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}
