<?php 
require 'logica.php';

require 'conexao/conexao.php';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);


if(isset($email)&&isset($senha)){
$sql = "SELECT nome,senha,id_usuario FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$rowUsuario = $stmt->fetch();
    if(password_verify($senha, $rowUsuario['senha'])){
      //Deu certo
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $rowUsuario['nome'];
        $_SESSION['id'] = $rowUsuario['id_usuario'];
        redireciona();
    }
}else if(isset($email)&&isset($senha)){
$sqladm = "SELECT nome,senha,ID_ADM FROM adminstrador WHERE email = ?";
$stmt = $conn->prepare($sqladm);
$stmt->execute([$email]);
$rowAdm = $stmt->fetch();
    if((password_verify($senha, $rowAdm['senha']))){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $rowUsuario['nome'];
        $_SESSION['id'] = $rowUsuario['ID_ADM'];
        redireciona();
    }
}else {
    // Deu errado
    $_SESSION['erro'] = true;
    redirecionaLogin();
 }
?>