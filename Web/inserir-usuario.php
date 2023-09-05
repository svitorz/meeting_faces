<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email_usuario', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$permissao = 2;

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

$sql = "SELECT id_usuario FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$count = $stmt->rowCount();
if ($count >= 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: formulario-cadastro-usuario.php');
    exit();
}
$insert = "INSERT INTO usuario(nome, email, telefone,data_nasc, senha, ID_PERMISSAO) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$nome, $email, $telefone,$data_nasc, $senha_hash,$permissao]);
if($result==true){
    $_SESSION['sucesso'] = true;
    header('Location: formulario-login.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: formulario-cadastro-usuario.php');
    exit();
}
?>