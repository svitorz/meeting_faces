<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

if($email && $senha){
    $sql = "SELECT email,senha,id_usuario,nome,id_permissao FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if(password_verify($senha, $row['senha'])){
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['usuario'] = true;
        $_SESSION['admin'] = false;
        $_SESSION['cadastrador'] = false;
        if($row['id_permissao']==3){
            $_SESSION['admin'] = true;
            $_SESSION['cadastrador'] = false;
            $_SESSION['usuario'] = false;
        }else if($row['id_permissao'] == 2){
            $_SESSION['cadastrador'] = true;
            $_SESSION['admin'] = false;
            $_SESSION['usuario'] = false;
        }
        header('location: index.php');
        exit();
    }//fecha if
}
