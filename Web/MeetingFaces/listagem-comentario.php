<?php 
session_start();

require 'logica.php';

if(!isAdmin()){
    redireciona();
    die();
}

require 'conexao/conexao.php';



$sql = "SELECT COMENTARIOS.*, USUARIOS.PRIMEIRO_NOME AS NOME_USUARIO, MORADORES.PRIMEIRO_NOME AS NOME_MORADOR 
         FROM COMENTARIOS INNER JOIN USUARIOS
           ON COMENTARIOS.ID_USUARIO = USUARIOS.ID_USUARIO 
             INNER JOIN MORADORES
               ON COMENTARIOS.ID_MORADOR = MORADORES.ID_MORADOR 
                 WHERE COMENTARIOS.SITUACAO = 'Em análise';";
$stmt = $conn->query($sql);
$stmt->execute();
$count = $stmt->rowCount();
                 
$titulo_pagina = "Comentários para aprovação";
require 'header.php';
?>
<h2 class="text-center">Olá <?= nome_usuario() ?>, você tem <?= $count ?> comentários para aprovação.</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Comentário </th> 
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
          <td><?= $row["comentario"]?></td>
          <td> <a href="info-usuario.php?id_usuario=<?= $row["id_usuario"]?>" class="link-dark"><?= $row["nome_usuario"]?>, ID: <?=$row['id_usuario']?> </a> </td>
          <td> <a href="info.php?id_morador=<?= $row["id_morador"]?>"><?= $row["nome_morador"]?>, ID: <?= $row["id_morador"]?> </a></td>
          <td>  
            <div class="input-group">
              <form action="aprovar-comentario.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id_descricao'];?>" />
                <input type="hidden" name="comentario" value="<?=$row['comentario'];?>" />
                <input type="hidden" name="aprovacao" value="2" />
                <button type="submit" class="btn btn-sm btn-danger mx-2">Excluir</button>
              </form>
              <form action="aprovar-comentario.php" method="post">
                <input type="hidden" name="id" value="<?=$row['id_descricao'];?>" />
                <input type="hidden" name="comentario" value="<?=$row['comentario'];?>" />
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
<?php 
if(isset($_SESSION['result'])){
  if($_SESSION['result'] == true){
    ?>
    <div class="alert alert-success">
      <h4>Comentário aprovado com sucesso!</h4>
    </div>
    <?php 
  }
}