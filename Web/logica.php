<?php

function autenticado(){
    if(isset($_SESSION['email'])){
        return true;
    }else {
        return false;
    }
}

function nome_usuario(){
    return $_SESSION['nome'];
}

function email_usuario(){
    return $_SESSION['email'];
}

function id_usuario(){
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
