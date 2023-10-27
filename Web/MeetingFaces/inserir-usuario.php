<?php 
session_start();

require 'logica.php';

require 'conexao/conexao.php';

$primeiro_nome = filter_input(INPUT_POST, 'primeiro_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$segundo_nome = filter_input(INPUT_POST, 'segundo_nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email_usuario', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
//transforma em string a data atual do sistema
strval($ano_atual = date('d/m/Y'));
//faz a comparação do string, se a inserida for maior que a data atual, a data inserida se torna nula. 
if(strcmp($data_nasc,$ano_atual)>=0){
    $data_nasc = null;
}

$select = "SELECT EMAIL FROM ADMINISTRADOR WHERE EMAIL ilike ?;"; 
try {
    $stmt = $conn->prepare($select);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if($count >= 1){
        $_SESSION['erro'] = "O Email já está sendo utilizado como administrador.";
        redireciona('formulario-cadastro-usuario.php');
        exit();
    }else{
        $insert = "INSERT INTO USUARIO(PRIMEIRO_NOME, SEGUNDO_NOME, EMAIL, TELEFONE, SENHA, DATA_NASC) VALUES (?,?,?,?,crypt(?, gen_salt('bf',8)),?);";
        $stmt = $conn->prepare($insert);
        $result = $stmt->execute([$primeiro_nome, $segundo_nome, $email, $telefone, $senha, $data_nasc]);
    }
} catch (Exception $e) {
    $_SESSION['result'] = false;
    $erro = $e->getMessage();
}

if($result == true){
    redireciona('formulario-login.php');
    $_SESSION['succeso'] = true;
    die();
}else{
    if(stripos($erro,'duplicate key') != false){
        $erro = "O erro <b>\"$email\"</b> já está registrado. <br><br> $erro";
    }
    $_SESSION['erro'] = $erro;
    $_SESSION['result'] = false;
    redireciona('formulario-cadastro-usuario.php');
}
?>