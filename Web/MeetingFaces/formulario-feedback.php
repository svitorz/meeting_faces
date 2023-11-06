<?php 
session_start();

require 'logica.php';

//Permite que apenas usuários autenticados acessem o formulário de feedback
if(!autenticado()){
    $_SESSION['restrito'] = true;
    redireciona('formulario-login.php');
    die();
}

$id_morador = filter_input(INPUT_GET, 'id_morador', FILTER_SANITIZE_NUMBER_INT);

$titulo_pagina = "Faça seu Feedback";
require 'header.php';


if(isAdmin()){
?>
<div class="alert alert-danger m-4">
    <h4>Você não pode realizar está operação!</h4>
    <p>
        Está ação resultaria em um erro, para enviar um feedback, você deve iniciar a sessão como um usuário comum. 
    </p>
</div>
<?php 
}
?>
<div class="row justify-content-center align-items-center">
    <div class="col-6">
        <form method="post" action="inserir-feedback.php">
            <div class="form-floating">
                <input type="hidden" name="id_usuario" value="<?=id_usuario();?>"/>
                <input type="hidden" name="id_morador" value="<?=$id_morador;?>"/>
                    <textarea class="form-control" name="feedback" id="feedback"  <?php if(isAdmin()){ echo "disabled"; }else { echo " "; }?> required></textarea>
                <label for="feedback">Feedback</label>
                    <button type="submit" class="btn btn-success my-3" <?php if(isAdmin()){ echo "disabled"; }else { echo " "; }?> >Enviar</button>
            </div>
        </form>
    </div>
</div>
<div class="fixed-bottom">
    <?php require 'footer.php'; ?>
</div>