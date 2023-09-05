<?php
session_start();
require 'logica.php';
if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

require 'conexao/conexao.php';

$sql = "SELECT id_usuario,nome FROM usuario ORDER BY nome";

$stmt = $conn->query($sql);

require_once 'header.php';
?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome </th>
          <?php
          if(isAdmin()){
          ?> 
          <th scope="col" style="width:20%;"></th><th scope="col" style="width:20%;"></th>
          <?php 
          }
          ?>
        </tr>
    </thead>
    <tbody>
      <?php 
      while($row = $stmt->fetch()){
      ?>
        <tr>
          <th scope="row"> <?= $row["id_usuario"]?> </th>
          <td><?= $row["nome"]?></td>
          <td>  
            <?php 
            if(isAdmin()){
            ?>
            <a href="excluir-usuario.php?id=<?=$row['id_usuario'];?>" onclick="if(!confirm('Deseja excluir?')) return false;" class=" btn btn-sm btn-danger">
              <span data-feather="trash-2"></span>
                Excluir 
            </a>
          </td>
        </tr>
        <?php
        }
        }
        ?>
    </tbody>
</table>
<?php
require_once 'footer.php';
?>