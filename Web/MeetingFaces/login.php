<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);


//Verifica se existem administradores
$sql = "SELECT ID_ADMINISTRADOR AS ID, * FROM ADMINISTRADORES WHERE email ILIKE ?";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $_SESSION['tipo_user'] = 'admin';
} catch (Exception $e) {
    $result = false;
    $error = $e->getMessage();
}

$count = $stmt->rowCount();

if($count == 0){

    $sql = "SELECT ID_USUARIO AS ID,* FROM USUARIOS WHERE email ilike ?";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $_SESSION['tipo_user'] = 'user';
    } catch (Exception $e) {
        $result = false;
        $error = $e->getMessage();
    }
}



$row = $stmt->fetch();

if(password_verify($senha, $row['senha'])){
    $_SESSION['email'] = $row['email'];
    $_SESSION['primeiro_nome'] = $row['primeiro_nome'];
    $_SESSION['segundo_nome'] = $row['segundo_nome'];
    $_SESSION['telefone'] = $row['telefone'];
    $_SESSION['data_nasc'] = $row['data_nasc'];
    $_SESSION['id_usuario'] = $row['id'];
    $_SESSION['result_login'] = true;
}else {
    $_SESSION['erro'] = $error;
    $_SESSION['result_login'] = false;
    unset($_SESSION['email']);
    unset($_SESSION['primeiro_nome']);
    unset($_SESSION['segundo_nome']);
    unset($_SESSION['telefone']);
    unset($_SESSION['data_nasc']);
    unset($_SESSION['tipo_user']);
}
redireciona('formulario-login.php')
?>