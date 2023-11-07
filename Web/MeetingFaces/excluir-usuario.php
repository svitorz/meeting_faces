<?php
session_start();

require 'logica.php';

//verifica se é admin
//Ainda não foi implementada a opção do usuário excluir, nem editar a própria conta,
//devido a segurança na alteração de senha, então por hora, somente administradores podem excluir usuários

if(!isAdmin()){
    redireciona();
    die();
}

$id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);

require 'conexao/conexao.php';


$sql = "DELETE FROM DESCRICAO WHERE ID_USUARIO = ?"; 

$sql = "DELETE FROM usuario WHERE id_usuario = ?";


try {
    //code...
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id_usuario]);
} catch (Exception $e) {
    //throw $th;
    $error = $e->getMessage();
    $_SESSION['sucesso'] = false;
}


if($result === true){
    $_SESSION['sucesso'] = true;
}else {
    if(stripos($error, "fk_usuario_descricao")){
        $error = "Não é possível excluir este usuário pois há descrições feitas por ele. <br /> Entre em seu perfil e exclua suas descrições antes de excluir sua conta!";
    }
    $_SESSION['sucesso'] = false;
    $_SESSION['erro'] = $error;
}
redireciona('listagem-usuario.php');