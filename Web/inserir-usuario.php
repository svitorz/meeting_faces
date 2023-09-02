<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

require 'header.php';

$nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email_usuario', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

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
$insert = "INSERT INTO usuario(nome, email, telefone, senha) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$nome, $email, $telefone, $senha_hash]);
if($result==true){
    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Cadastro realizado com sucesso!</h4>
        <p>Seu cadastro foi realizado com sucesso. Você já pode fazer login.</p>
        <hr>
        <p class="mb-0">Clique <a href="formulario-login.php">aqui</a> para fazer login.</p>
    </div>
    <?php
}else{
    ?>
    <div class="alert-danger alert" role="alert">
        <h4>Houve um erro ao registrar os dados.</h4>
        <p>Tente novamente.</p>
        <p><?= $errorArray[2]; ?></p>
    </div>
    <?php
}
require 'footer.php';
?>