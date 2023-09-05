<?php 
session_start();

require 'logica.php';

if(!autenticado()){
    $_SESSION['restrito'] = true;
    redireciona('formulario-login.php');
    die();
}

$id_morador = $_GET['id_morador'];

require 'header.php';
?>
<div class="row justify-content-center align-items-center">
    <div class="col-6">
        <form method="post" action="inserir-feedback.php">
            <div class="form-floating">
                <input type="hidden" name="id_usuario" value="<?=id_usuario();?>"/>
                <input type="hidden" name="id_morador" value="<?=$id_morador;?>"/>
                    <textarea class="form-control" name="feedback" id="feedback"  placeholder="" required></textarea>
                <label for="feedback">Feedback</label>
                    <button type="submit" class="btn btn-success my-3">Enviar</button>
            </div>
        </form>
    </div>
</div>