<?php
session_start();
require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

require 'conexao/conexao.php';

$sql = "SELECT id_usuario,nome,id_permissao FROM usuario ORDER BY nome";

$stmt = $conn->query($sql);

require_once 'header.php';
?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome </th>
          <th scope="col">Tipo de usuário:</th>
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
            <?php if($row['id_permissao']==3){
                    echo 'Administrador';
                  }elseif($row['id_permissao']==2){
                    echo 'Cadastrador';
                  }else{
                    echo 'Usuário';
                  }
            ?>
          </td>
          <td>  
            <?php 
            if(isAdmin()&&$row['id_permissao']!=3){
            ?>
            <a href="excluir-usuario.php?id_usuario=<?=$row['id_usuario'];?>" onclick="if(!confirm('Deseja excluir?')) return false;" class=" btn btn-sm btn-danger">
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