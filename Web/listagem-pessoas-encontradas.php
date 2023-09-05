<?php 
session_start();

require 'logica.php';

$nome = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_natal = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
$data = str_replace("/", "-", $data_nasc);


require 'header.php';
require 'conexao/conexao.php';
try{
    if(isset($nome)&&!empty($nome)){
        $sql = "SELECT id_morador,nome,cidade_atual FROM moradores WHERE nome = '%$nome%' ORDER BY nome";
    } 
    $stmt = $conn->query($sql);
    $stmt->execute();
} catch (Exception $ex) {
    echo "<div class='alert alert-danger' role='alert'>
            Nenhum morador encontrado!
         </div>"
    . $ex->getMessage();
}
while($row = $stmt->fetch()){
    ?>
<div class="card py-4 my-3 m-5" style="width: 20rem;">
        <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg" class="card-img-top" alt="..."/>
    <div class="card-body">
        <h5 class="card-title"><?= $row['nome']; ?></h5>
        <?php if (isset($row['$cidade_atual'])){
            ?>
            <p class="card-text">Encontra-se na cidade <?= $row['cidade_atual']; ?>.</p>
        <?php
        }
        ?>
        <a href="info.php?id=<?=$row['id_morador'];?>" class="btn btn-primary my-1">Informações</a>
        <a href="formulario-feedback.php" class="btn btn-success">Adicionar feedback</a>
        <?php
        if(isAdmin()){
                    ?>
                <a href="editar-morador.php" class="btn btn-warning mx-2 mb-2">Editar registro</a>
                <a href="excluir-morador.php" class="btn btn-danger mx-2 mb-2" onclick="if(!confirm('Deseja excluir?')) return false;">Excluir registro</a>
                <?php
                }
                ?>
    </div>
</div>
<?php 
}
require 'footer.php';
?>