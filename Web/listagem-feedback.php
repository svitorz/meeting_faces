<?php 
session_start();
require 'logica.php';

if(!isAdmin()){
    $_SESSION['restrito'] = true;
    redireciona();
    die();
}

require 'conexao/conexao.php';

$sql = "SELECT feedback.id_feedback, feedback.feedback_texto, morador.nome, usuario.email
        FROM feedback inner join morador 
        on feedback.id_morador=morador.ID_MORADOR 
        inner join usuario 
        ON feedback.id_usuario=usuario.ID_USUARIO 
        where feedback.aprovacao=2";

$stmt = $conn->query($sql);
require 'header.php';
while($row = $stmt->fetch()){
    ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 10%;">id</th>
      <th scope="col" style="width: 20%;">Email do usuário</th>
      <th scope="col" style="width: 20%;">Nome do morador</th>
      <th scope="col" style="width: 40%;">Texto</th>
      <th scope="col" style="width: 10%;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?=$row['id_feedback']?></th>
      <td><?=  $row['email']; ?></td>
      <td><?=  $row['nome']; ?></td>
      <td><?=  $row['feedback_texto']; ?></td>
      <td><a href="aprovar-feedback.php?id_feedback=<?=$row['id_feedback']?>&aprovacao=1" class="btn btn-primary">Aprovar</a></td>
      <td><a href="aprovar-feedback.php?id_feedback=<?=$row['id_feedback']?>&aprovacao=2" class="btn btn-danger">Rejeitar</a></td>
  </tbody>
</table>
<?php
}
if(isset($_SESSION['aprovacao'])){
  if($_SESSION['aprovacao']){ 
    ?>
<div class="alert alert-success alert-dismissible fade show fixed-bottom" id="alert-float" role="alert">
  <strong>Feedback aprovado com sucesso!</strong> Os dados foram registrados!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
    unset($_SESSION['aprovacao']);
  } else {
  ?>
  <div class="alert alert-warning alert-dismissible fade show fixed-bottom" role="alert">
  <strong>Erro ao aprovar feedback!</strong> Os dados não foram registrados!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    unset($_SESSION['aprovacao']);
  }
}
require 'footer.php';
?>