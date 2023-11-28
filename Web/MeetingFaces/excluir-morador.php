<?php
session_start();

require 'logica.php';
//verifica se é admin
if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$id_morador = filter_input(INPUT_POST, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

$sqlDesc = "DELETE FROM COMENTARIOS WHERE id_morador = ?";

try {
    //code...
    $stmt = $conn->prepare($sqlDesc);
    $result = $stmt->execute([$id_morador]);
} catch (Exception $e) {
    $error = $e->getMessage();
    $_SESSION['sucesso'] = false;
}



$sql = "DELETE FROM MORADORES WHERE id_morador = ?";

try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_morador]);
} catch (Exception $e) {
    $error = $e->getMessage();
    $_SESSION['sucesso'] = false;
}



if($result){
    $_SESSION['sucesso'] = true;
    //Visualmente, parece código inútil, mas em certos momentos da aplicação, as duas mensagens eram
    //exibidas, por isso a necessidade de duas variáveis setadas com boolean. 
}else {
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $error;
}
redireciona('listagem-pessoas.php');