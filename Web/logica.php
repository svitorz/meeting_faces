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

function redireciona($pagina = null){
    if(empty($pagina)){
        $pagina = 'inicio.php';
    }
    header('Location:' . $pagina);
}

function redirecionaLogin($pagina = null){
    if(empty($pagina)){
        $pagina = 'formulario-login.php';
    }
    header('Location:' . $pagina);
}

function isAdmin(){
    if(isset($_SESSION['admin'])){
        return true;
    }else{
        return false;
    }
}