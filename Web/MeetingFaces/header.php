<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Meeting Faces</title>
    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/style.css"> 
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Meeting Faces</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="formulario-pesquisa.php">Pesquisa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listagem-pessoas.php">Pessoas cadastradas</a>
        </li>
      </ul>
      <?php if(!autenticado()){ ?>
        <!-- caso a sessão nao tenha sido iniciada, são exibidos os botoes de login e registro-->
      <div class="d-flex">
          <a href="formulario-cadastro-usuario.php" class="btn-dark btn me-2">Cadastrar-se</a>
          <a href="formulario-login.php" class="btn-outline-dark btn me-2">Entrar</a>
      </div>
      <?php } else { ?>
        <!-- caso a sessão tenha sido iniciada, é exibido o botão de perfil e sair -->
      <div class="d-flex">
         <form action="info-usuario.php" method="post">
           <input type="hidden" name="id_usuario" value="<?= id_usuario(); ?>">
           <button type="submit" class="text-capitalize mx-2 btn btn-dark">
             <i class="fa-solid fa-user"></i>
             <?= nome_usuario(); ?>
             </button>
          </form>
          </a>
          <a href="logout.php" class="btn-dark btn me-2">Sair</a>
      </div>
      <?php }
      //Caso o usuário seja administrador, é exibido o botão da tela operacional,
      //onde pode realizar alterações de cadastro e aprovação de comentários
      if(isAdmin()){
        ?>
        <div class="d-flex">
          <a href="tela-operacional.php" class="btn-light btn me-2">Tela operacional</a>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</nav>
<?php 
  if($titulo_pagina!=null){ 
    //Caso a variável $titulo_pagina tenha sido definida, é exibido o título da página
    //Necessário pois a pagina de inicio não possui titulo, então a variável é nula
    echo "<h1 class='text-center py-3'>".$titulo_pagina."</h1>";
    } else {
    ?>
    <?php  
    }
?>