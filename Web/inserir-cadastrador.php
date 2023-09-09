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
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$permissao = 2;
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
//transforma em string a data atual do sistema
strval($ano_atual = date('d/m/Y'));
//faz a comparação do string, se a inserida for maior que a data atual, a data inserida se torna nula. 
if(strcmp($data_nasc,$ano_atual)>=0){
    $data_nasc = null;
}

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
$insert = "INSERT INTO usuario(primeiro_nome,segundo_nome, email, telefone,data_nasc, senha, ID_PERMISSAO) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($insert);
$result = $stmt->execute([$primeiro_nome, $segundo_nome, $email, $telefone,$data_nasc, $senha_hash,$permissao]);
if($result!==true){
        $_SESSION['erro'] = true;
    redireciona('formulario-login.php');
    exit();
}
$_SESSION['sucesso'] = true;
    redireciona();
    exit();
?>