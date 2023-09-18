<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$sql = "SELECT descricao.*,CONCAT(usuario.primeiro_nome) AS nome_usuario,CONCAT(MORADOR.primeiro_nome) AS nome_morador
            from descricao inner join MORADOR 
                on descricao.id_morador = MORADOR.id_morador
                    inner join usuario
                        on DESCRICAO.id_usuario=usuario.id_usuario
                            WHERE descricao.SITUACAO LIKE '%Em analise&'";
$stmt = $conn->query($sql);
$stmt->execute();
$count = $stmt->rowCount();
$titulo_pagina = "Feedbacks para aprovação";
require 'header.php';
?>
<h2 class="text-center">Olá <?= nome_usuario() ?>, você tem <?= $count ?> feedbacks para aprovação.</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Descrição </th> 
          <th scope="col">Feito por </th> 
          <th scope="col">Associado a </th> 
          <th scope="col" style="width:20%;"></th><th scope="col" style="width:20%;"></th>
        </tr>
    </thead>
    <tbody>
      <?php 
      while($row = $stmt->fetch()){
      ?>
        <tr>
          <th scope="row"> <?= $row["id_descricao"]?> </th>
          <td><?= $row["descricao"]?></td>
          <td> <a href="perfil-usuario.php?"></a> <?= $row["nome_usuario"]?>, ID: <?=$row['id_usuario']?></td>
          <td> <a href="info.php?id_morador=<?= $row["id_morador"]?>"><?= $row["nome_morador"]?>, ID: <?= $row["id_morador"]?> </a></td>
          <td>  
            <!-- <a href="aprovar-feedback.php?id=<?=$row['id_descricao'];?>&aprovacao=2" onclick="if(!confirm('Deseja excluir?')) return false;" class=" btn btn-sm btn-danger">
              <span data-feather="trash-2"></span>
                Excluir 
            </a>
            <a href="aprovar-feedback.php?id=<?=$row['id_descricao'];?>&aprovacao=3" class=" btn btn-sm btn-success">
              <span data-feather="trash-2"></span>
                Aprovar 
            </a> -->
            <div class="input-group">
              <form action="aprovar-feedback.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id_descricao'];?>" />
                <input type="hidden" name="descricao" value="<?=$row['descricao'];?>" />
                <input type="hidden" name="aprovacao" value="2" />
                <button type="submit" class="btn btn-sm btn-danger mx-2">Excluir</button>
              </form>
              <form action="aprovar-feedback.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id_descricao'];?>" />
                <input type="hidden" name="descricao" value="<?=$row['descricao'];?>" />
                <input type="hidden" name="aprovacao" value="3" />
                <button type="submit" class="btn btn-sm btn-success">Aprovar</button>
              </form>
            </div>
          </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>