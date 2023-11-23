<?php 
session_start();

require 'logica.php';
//Verifica se é administrador, caso não, o usuário é redirecionado para a página inicial
if(!isAdmin()){
    redireciona();
    die(); 
}
//Filtro das variáveis vindo via post
$primeiro_nome = filter_input(INPUT_POST, 'primeiro_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$segundo_nome = filter_input(INPUT_POST, 'segundo_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_origem = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);
$data = str_replace("/", "-", $data_nasc);

//conexão com o banco
require 'conexao/conexao.php';

$sql = "UPDATE MORADORES SET primeiro_nome = ?, segundo_nome = ?, cidade_atual = ?, cidade_natal = ?, data_nasc = ?, nome_familiar_proximo = ?, grau_parentesco = ? WHERE id_morador = ?";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$primeiro_nome, $segundo_nome, $cidade_atual, $cidade_origem, $data_nasc, $nome_familiar, $grau_parentesco, $id_morador]);
} catch (Exception $e) {
    $_SESSION['sucesso'] = false;
    $error = $e->getMessage();
}



//Execução do comando e variavel que conta o numero de linhas alteradas
$count = $stmt->rowCount();
//caso o resultado da query seja verdadeiro e o numero de linhas afetadas
//seja maior ou igual a 1, é entendivel que a alteração foi feita com sucesso
//senao, a mensagem de erro é tida como verdaeira.
if($result == true &&  $count >= 1){
    $_SESSION['sucesso'] = true;

} else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $error;
}
redireciona('listagem-pessoas.php');