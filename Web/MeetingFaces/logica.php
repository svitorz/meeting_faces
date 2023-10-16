<?php
function autenticado(){
    if(isset($_SESSION['email'])){
        return true;
    }else {
        return false;
    }
}

function nome_usuario(){
    $nome_completo = $_SESSION['primeiro_nome'] ." " . $_SESSION['segundo_nome'];
    return $nome_completo = ucfirst(strtolower($nome_completo));
}

function email_usuario(){
    return $_SESSION['email'];
}

function id_usuario(){
    if(isset($_SESSION['ADM']) && $_SESSION['ADM']){
        return $_SESSION['id_administrador'];
    }
    return $_SESSION['id_usuario'];
}
function telefone_usuario(){
    return $_SESSION['telefone'];
}
function data_nasc(){
    return $data = str_replace("/", "-", $_SESSION['data_nasc']);
}

function redireciona($pagina = null){
    if(empty($pagina)){
        $pagina = 'inicio.php';
    }
    header('Location:' . $pagina);
}

function isAdmin(){
    if(isset($_SESSION['ADM']) && $_SESSION['ADM']){
        return true;
    }
    return false;
}
