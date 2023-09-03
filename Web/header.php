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
    <a class="navbar-brand" href="inicio.php">Meeting Faces</a>
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
      <div class="d-flex">
          <a href="formulario-cadastro-usuario.php" class="btn-dark btn me-2">Cadastrar-se</a>
          <a href="formulario-login.php" class="btn-outline-dark btn me-2">Entrar</a>
      </div>
      <?php } else { ?>
      <div class="d-flex">
          <span class="btn me-2"> 
          <i class="fa-solid fa-user"></i>
          <span class="text-capitalize"> <?= nome_usuario(); ?> </span>
          </span>
          <a href="logout.php" class="btn-dark btn me-2">Sair</a>
      </div>
      <?php }
      if($_SESSION['admin']){
        ?>
        <div class="d-flex">
          <a href="tela-operacional.php" class="btn-out-dark btn me-2">Tela operacional</a>
        </div>
        <?php
      }
      ?>

    </div>
  </div>
</nav>