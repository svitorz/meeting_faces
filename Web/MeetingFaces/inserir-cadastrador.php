<?php
session_start();

require 'logica.php';

if(!isAdmin()){
  redireciona();
  die();
}


require 'conexao/conexao.php';

$primeiro_nome = filter_input(INPUT_POST, 'primeiro_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$segundo_nome = filter_input(INPUT_POST, 'segundo_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email_usuario', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

strtoupper($sql = "SELECT ID_ADMINISTRADOR FROM ADMINISTRADOR WHERE email = ?");
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$count = $stmt->rowCount();
if ($count >= 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: formulario-cadastro-usuario.php');
    exit();
}
$insert = "INSERT INTO ADMINISTRADOR(primeiro_nome,segundo_nome, email, senha) VALUES (?,?,?,?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$primeiro_nome, $segundo_nome, $email, $senha_hash]);
if($result!=true){
        $_SESSION['erro'] = true;
    redireciona('formulario-login.php');
    exit();
}
$_SESSION['sucesso'] = true;
    redireciona();
    exit();
?>