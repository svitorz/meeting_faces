<?php 
require 'logica.php';
require 'header.php';
?>
<div class="container-fluid my-5 py-5 pe-5">
    <h1 class="text-center my-2">Pessoas cadastradas no nosso banco de dados:</h1>
    <div class="row text-center">      
        <?php 
        for($i=0;$i<=20;$i++){
            ?>
        <div class="col-3">    
            <div class="card py-4 my-3" style="width: 18rem;">
                    <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg" class="card-img-top" alt="..."/>
                <div class="card-body">
                    <h5 class="card-title">José Silva</h5>
                    <p class="card-text">Encontra-se na cidade São Paulo.</p>
                    <a href="#" class="btn btn-primary my-1">Informações</a>
                    <a href="#" class="btn btn-success">Adicionar feedback</a>
                </div>
            </div>
        </div>
        <?php
        } 
        ?>
    </div>
</div>
<?php 
require 'footer.php';
?>