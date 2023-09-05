<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';

$sql = "select descricao.*,CONCAT(usuario.nome) AS nome_usuario,usuario.id_usuario, CONCAT(moradores.nome) AS nome_morador,moradores.id_morador
            from descricao inner join moradores 
                on descricao.id_morador = moradores.id_morador
                    inner join usuario
                        on moradores.id_usuario=usuario.id_usuario
                            WHERE descricao.id_permissao = 1";
$stmt = $conn->query($sql);
$stmt->execute();
$row = $stmt->fetch();

require 'header.php';
?>
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
          <td><?= $row["nome_usuario"]?>, ID: <?=$row['id_usuario']?></td>
          <td><?= $row["nome_morador"]?>, ID: <?= $row["id_morador"]?></td>
          <td>  
            <a href="aprovar-feedback.php?id=<?=$row['id_descricao'];?>&aprovacao=2" onclick="if(!confirm('Deseja excluir?')) return false;" class=" btn btn-sm btn-danger">
              <span data-feather="trash-2"></span>
                Excluir 
            </a>
            <a href="aprovar-feedback.php?id=<?=$row['id_descricao'];?>&aprovacao=3" class=" btn btn-sm btn-success">
              <span data-feather="trash-2"></span>
                Aprovar 
            </a>
          </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>