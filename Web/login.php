<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($email)&&isset($senha)){
    $selectUser = "SELECT nome,email,senha,id_usuario FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($selectUser);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if($row){
        if(password_verify($senha, $row['senha'])){
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id_usuario'];
            $_SESSION['permissao'] = $row['ID_PERMISSAO'];
            $_SESSION['usuario'] = true;
            redireciona();
        }else{
            $_SESSION['erro'] = true;
            redirecionaLogin();
        }
    }else{
        $selectAdmin = "SELECT nome,email,senha,id,ID_PERMISSAO FROM administrador WHERE email = ?";
        $stmt = $conn->prepare($selectAdmin);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if($row){
            if(password_verify($senha, $row['senha'])){
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['permissao'] = $row['ID_PERMISSAO'];
                $_SESSION['admin'] = true;
                redireciona();
            }else{
                $_SESSION['erro'] = true;
                redirecionaLogin();
            }
        }
    }
}
?>