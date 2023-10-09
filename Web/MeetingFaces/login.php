<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
try{
    $sql = "SELECT * FROM USUARIO WHERE EMAIL ilike ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    var_dump($row);
    if($row && password_verify($senha, $row['senha'])){
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['primeiro_nome'] = $row['primeiro_nome'];
        $_SESSION['segundo_nome'] = $row['segundo_nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['data_nasc'] = $row['data_nasc'];
        $_SESSION['USUARIO'] = TRUE;
        $_SESSION['ADM'] = FALSE;
        redireciona('inicio.php');
    }else{
        $sql = "SELECT * FROM administrador WHERE email ilike ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        var_dump($row);
            if($row && password_verify($senha, $row['senha'])){
                $_SESSION['id_administrador'] = $row['id_administrador'];
                $_SESSION['primeiro_nome'] = $row['primeiro_nome'];
                $_SESSION['segundo_nome'] = $row['segundo_nome'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['ADM'] = TRUE;
                $_SESSION['USUARIO'] = FALSE;
                redireciona('inicio.php');
        }
    }
} catch(Exception $e){
    $_SESSION['erro'] = true;
    exit();
}
?>