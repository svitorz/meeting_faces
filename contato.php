<?php 
$titulo_pagina = "Dados da pessoa encontrada";
require 'header.php';
$primeiro_nome = "Example";
$sobrenome = "Name";
$familia_nome = "José";
$cidade_nome = "Votuporanga";
$estado_nome = "São Paulo";
$cep = "12300-000"; 
$telefone_inst = "(17)99999-9999";
$email_variable = "instituição@gmail.com";   
?>  
            <div class="m-5">
                <div class="m-5 fs-5 p-3">
                    <div class="border">
                    <form action="pesquisa.php" method="get">
                        <div class="input-group input-group-lg p-1">
                            <input disabled type="text" placeholder="Primeiro nome:" name="pnome" id="pnome" class="form-control" value="<?= $primeiro_nome; ?>" />
                        </div>
                        <div class="input-group input-group-lg p-1">
                            <input disabled type="text" placeholder="Nome Familiar:" name="nome_familiar" id="nome_familiar" class="form-control" value="<?= $familia_nome ?>"/>
                            <input disabled type="text" placeholder="Sobrenome:" name="sobrenome" id="sobrenome" class="form-control" value="<?= $sobrenome ?>"/>
                        </div>
                        <div class="input-group input-group-lg p-1">
                            <input disabled type="text" maxlength="9" class="form-control" placeholder="CEP" name="endereco_cep" id="endereco_cep" value="<?= $cep ?>" />
                            <input disabled type="text" placeholder="Cidade:" name="endereco_cidade" id="endereco_cidade" class="form-control" value="<?= $cidade_nome ?>" />
                            <input disabled type="text" placeholder="Estado:" name="endereco_estado" id="endereco_estado" class="form-control" value="<?= $estado_nome ?>" />
                        </div>
                        <div class="input-group input-group-lg p-3">
                            <label class="input-group-text">Opções de contato da instituição:</label>
                            <input disabled type="text" class="form-control" value="<?= $telefone_inst ?>" />
                            <input disabled type="text" class="form-control" value="<?= $email_variable ?>" />
                        </div>
                    </form>
                </div>
                </div>          
            </div>
        </div>
    </div>
</div>;
<?php 
require 'footer.php';
?>