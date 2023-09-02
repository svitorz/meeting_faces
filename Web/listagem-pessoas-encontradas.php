<?php 
require 'logica.php';

require 'header.php';
$nome = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_origem = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);

?>
<h1 class="text-center my-4">Dados encontrados:</h1>
<div class="card py-4 my-3 m-5" style="width: 20rem;">
        <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg" class="card-img-top" alt="..."/>
    <div class="card-body">
        <h5 class="card-title">José Silva</h5>
        <p class="card-text">Encontra-se na cidade São Paulo.</p>
        <a href="#" class="btn btn-primary my-1">Informações</a>
        <a href="#" class="btn btn-success">Adicionar feedback</a>
    </div>
</div>

<?php 
require 'footer.php';
?>