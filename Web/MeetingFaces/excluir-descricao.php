<?php 

require 'logica.php';

if(!autenticado()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$id_descricao = filter_input(INPUT_GET, 'id_descricao', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM DESCRICAO WHERE ID_DESCRICAO = ?";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_descricao]);
} catch (Exception $e) {
    $error = $e->getMessage();
    $_SESSION['sucesso'] = false;
}

if($result == true){
    $_SESSION['sucesso'] = true;

}else{
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $error;
}
redireciona();