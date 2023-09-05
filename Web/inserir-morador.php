<?php
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$nome = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_origem = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$id_usuario = $_SESSION['id_usuario'];
$data = str_replace("/", "-", $data_nasc);

echo $data;

$sql = "INSERT INTO moradores(nome, cidade_atual, cidade_natal,data_nasc, nome_familiar_proximo, grau_parentesco,id_usuario) VALUES (:nome, :cidade_atual, :cidade_origem, :data, :nome_familiar, :grau_parentesco, :id_usuario)";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([
    ':nome' => $nome,
    ':cidade_atual' => $cidade_atual,
    ':cidade_origem' => $cidade_origem,
    ':data' => $data,
    ':nome_familiar' => $nome_familiar,
    ':grau_parentesco' => $grau_parentesco,
    ':id_usuario' => $id_usuario
]);
if($result){
    $_SESSION['sucesso'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}else {
    $_SESSION['erro'] = true;
    header('Location: listagem-pessoas.php');
    exit();
}
