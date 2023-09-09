<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if(password_verify($senha, $row['senha'])){
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nome'] = $row['primeiro_nome'];
        $_SESSION['sobrenome'] = $row['segundo_nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['data_nasc'] = $row['data_nasc'];
        $_SESSION['permissao'] = $row['id_permissao'];
        redireciona();
    }else{
    $_SESSION['nao_autenticado'] = true;
    redireciona('formulario-login.php');
    exit();
    }
?>