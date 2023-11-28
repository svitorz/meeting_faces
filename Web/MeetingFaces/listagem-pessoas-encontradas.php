<?php 
session_start();

require 'logica.php';

$nome = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_natal = filter_input(INPUT_POST, 'cidade_origem', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_atual = filter_input(INPUT_POST, 'cidade_atual', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_familiar = filter_input(INPUT_POST, 'nome_familiar', FILTER_SANITIZE_SPECIAL_CHARS);
$grau_parentesco = filter_input(INPUT_POST, 'grau_parentesco', FILTER_SANITIZE_SPECIAL_CHARS);
//Recebe a variavel via post e filtra para que não haja caracteres especiais
$data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
//transforma em string a data atual do sistema
strval($ano_atual = date('d/m/Y'));
//faz a comparação do string, se a inserida for maior que a data atual, a data inserida se torna nula. 
if(strcmp($data_nasc,$ano_atual)>=0){
    $data_nasc = null;
}
    
require 'conexao/conexao.php';

$where = null;

if(isset($nome)&&!empty($nome)){
    if(!empty($where)){
        $where .= " AND nome LIKE '%$nome%' ";
    }else{
        $where = "WHERE nome LIKE '%$nome%' ";
    }
}

if(isset($cidade_natal)&&!empty($cidade_natal)){
    if(!empty($where)){
        $where .= " AND cidade_natal LIKE '%$cidade_natal%' ";
    }else{
        $where = "WHERE cidade_natal LIKE '%$cidade_natal%' ";
    }
}


if(isset($nome_familiar)&&!empty($nome_familiar)){
    if(!empty($where)){
        $where .= " AND nome_familiar_proximo LIKE '%$nome_familiar%' ";
    }else{
        $where = "WHERE nome_familiar_proximo LIKE '%$nome_familiar%' ";
    }
}


if(isset($grau_parentesco)&&!empty($grau_parentesco)){
    if(!empty($where)){
        $where .= " AND grau_parentesco LIKE '%$grau_parentesco%' ";
    }else{
        $where = "WHERE grau_parentesco LIKE '%$grau_parentesco%' ";
    }
}


if(isset($cidade_natal)&&!empty($cidade_natal)){
    if(!empty($where)){
        $where .= " AND cidade_natal LIKE '%$cidade_natal%' ";
    }else{
        $where = "WHERE cidade_natal LIKE '%$cidade_natal%' ";
    }
}


if(isset($data)&&!empty($data)){
    if(!empty($where)){
        $where .= " AND data_nasc LIKE '%$data%' ";
    }else{
        $where = "WHERE data_nasc LIKE '%$data%' ";
    }
}

$sql = "SELECT * FROM MORADORES $where";

$stmt = $conn->query($sql);
$stmt->execute();

$titulo_pagina = "Pessoas encontradas em nosso banco de dados";
require 'header.php';

while($row = $stmt->fetch()){
    ?>
<div class="card text-capitalize py-4 my-3 m-5" style="width: 20rem;">
        <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/18765757-icone-de-perfil-de-usuario-em-estilo-simples-ilustracao-em-avatar-membro-no-fundo-isolado-conceito-de-negocio-de-sinal-de-permissao-humana-vetor.jpg" class="card-img-top" alt="..."/>
    <div class="card-body text-center">
        <h5 class="card-title"><?= $row['primeiro_nome']; ?></h5>
        <?php if (isset($row['$cidade_atual'])){
            ?>
            <p class="card-text">Encontra-se na cidade <?= $row['cidade_atual']; ?>.</p>
        <?php
        }
        ?>
                <p class="card-text">Está localizado na cidade de <span class="text-capitalize"> <?=$row['cidade_atual']; ?> </span> </p>
                <form action="info.php" method="post">
                    <input type="hidden" name="id_morador" value="<?=$row['id_morador'];?>"/>
                    <button type="submit" class="btn btn-primary mx-3 mb-2">Informações</button>
                </form>
                <form action="formulario-comentario.php" method="post">
                    <button type="submit" class="btn btn-success">Enviar comentário</button>
                    <input type="hidden" name="id_morador" value="<?= $id_morador; ?>">
                </form>
                <?php 
                if(isAdmin()){
                    ?>
                        <form action="formulario-editar-morador.php" method="post">
                            <input type="hidden" name="id_morador" value="<?= $id_morador; ?>">
                            <button type="submit" class="btn btn-warning me-2">Editar</button>
                        </form>
                        <form action="excluir-morador.php" method="post">
                            <input type="hidden" name="id_morador" value="<?= $id_morador; ?>">
                            <button type="submit" class="btn btn-danger me-2">Excluir</button>
                        </form>
                <?php
                }
                ?>
    </div>
</div>
<?php 
}
require 'footer.php';
?>