<?php 

//require 'logica.php';

//require 'conexao/conexao.php';

//$nome = "user";
$email = "user@gmail.com";
$telefone = "123";
$senha = "123";
$permissao = 2;

$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

//$insert = "INSERT INTO administrador(nome, email, telefone, senha, ID_PERMISSAO) VALUES (?, ?, ?, ?,?)";
//$stmt = $conn->prepare($insert);
//$result = $stmt->execute([$nome, $email, $telefone, $senha_hash,$permissao]);