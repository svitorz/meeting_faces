<?php 

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$id_descricao = filter_input(INPUT_POST, 'id_descricao', FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE COMENTARIOS SET SITUACAO = 'REPROVADO' WHERE id_descricao = ?";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_comentario]);
} catch (Exception $e) {
    echo $error = $e->getMessage();
    $_SESSION['sucesso'] = false;
}

if($result == true){
    $_SESSION['sucesso'] = true;

}else{
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $error;
}

redireciona();