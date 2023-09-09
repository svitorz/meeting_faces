<?php 
session_start();

require 'logica.php';
$titulo_pagina = null;
require_once 'header.php';
if(isset($_SESSION['sucesso'])&&$_SESSION['sucesso']){
?>
<div class="alert alert-success alert-dismissible fade show fixed-bottom" role="alert">
  <strong>Formulário enviado com sucesso!</strong> Os dados foram registrados com sucesso!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['sucesso']);
}
?>
<section id="header" class="container-fluid py-5" style="height: 100vh;">
    <header class="py-5 my-5">
        <div class="container py-5">
            <div class="text-center text-light py-5 my-5">
            <h2 class="fs-1">
                Meeting Faces
            </h2>
                <a href="" class="btn btn-outline-light mt-2 p-3 px-4 btn-lg border">
                    Texto 
                </a>
            </div>
        </div>
    </header>
</section> <!-- fecha header section  -->
<section id="banner" class="text-black">
    <div class="container-fluid py-5">
        <div class="text-center">
            <h3>
                População em situação de rua supera 281,4 mil pessoas no Brasil.
            </h3>
            <p>
                A população em situação de rua no Brasil cresceu 38% entre 2019 e
                2022, quando atingiu 281.472 pessoas.
            </p>
        </div>
    </div>
</section> <!-- Fecha seção -->
<section id="icons" class="text-light text-center">
    <div class="container-fluid py-5">
        <div class="row">
            <section class="col-4"> <!-- ícone -->
                <div class="container">
                <span class="feature-icon">
                    <div class="icon ps-1">
                        <span class="fa-solid fa-champagne-glasses text-light"></span>
                    </div>
                </span>
                    <header>
                        <h3>
                            Alcoolismo
                        </h3> 
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita illum consequuntur atque optio nisi, numquam neque sunt aperiam veniam eum iusto, similique explicabo harum nostrum modi quibusdam vero eaque. Id.
                        </p>
                    </header>
                </div>
            </section>
            <section class="col-4"> <!-- ícone -->
                <div class="container">
                <span class="feature-icon">
                    <div class="icon">
                        <span class="fa-solid fa-champagne-glasses text-light"></span>
                    </div>
                </span>
                    <header>
                        <h3>
                            Alcoolismo
                        </h3> 
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita illum consequuntur atque optio nisi, numquam neque sunt aperiam veniam eum iusto, similique explicabo harum nostrum modi quibusdam vero eaque. Id.
                        </p>
                    </header>
                </div>
            </section>
            <section class="col-4"> <!-- ícone -->
                <div class="container">
                <span class="feature-icon ">
                    <div class="icon">
                        <span class="fa-solid fa-champagne-glasses text-light"></span>
                    </div>
                </span>
                    <header>
                        <h3>
                            Alcoolismo
                        </h3> 
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita illum consequuntur atque optio nisi, numquam neque sunt aperiam veniam eum iusto, similique explicabo harum nostrum modi quibusdam vero eaque. Id.
                        </p>
                    </header>
                </div>
            </section>
        </div>
    </div>
</section> <!-- Fecha seção -->
<section id="banner2" class="text-black">
    <div class="container-fluid py-5">
        <div class="text-center">
            <h3>
                Titulo 
            </h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio aspernatur amet, laudantium esse veritatis, neque, adipisci necessitatibus soluta dolore a officiis impedit doloribus! Reiciendis nostrum error tempore doloremque repellat optio.
            </p>
        </div>
    </div>
</section> <!-- Fecha seção -->
<section id="text-image" class="text-white py-5 p-5" style="height: 85vh; text-align:justify;">
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-4">
            <h4>Arquitetura hostil</h4>
            <p>
                A arquitetura hostil, como se convencionou chamar, é um
                conjunto de dispositivos construtivos que têm como objetivo
                impedir a permanência de pessoas, especialmente daquelas em
                situação de rua, em bancos de praças, espaços residuais em
                fachadas e demais áreas livres do espaço público.
            </p>
            <footer>
                <a href="#" class="button scrolly">Recomendação de leitura</a>
              </footer>
            </div>
            <div class="col-8">
                <img src="https://projetobatente.com.br/wp-content/uploads/2018/01/arquitetura-hostil-headshot.jpg"
                alt="Arquitetura hostil" class="img-thumbnail" />
            </div>
        </div>
    </div>
</section> <!-- Fecha seção -->
<section id="banner3">
    <div class="container-fluid text-black text-center py-5">
        <h4>Titulo</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem vel, doloremque dolor incidunt dolorum quibusdam porro, expedita rem sapiente ut vero laboriosam deleniti blanditiis quisquam eum explicabo perferendis beatae deserunt?</p>
    </div>
</section>
<section id="last">
<div class="py-5 text-white">
      <div class="container">
        <div class="row">
          <div class="col-4 col-12-narrow">
            <h3>Diam vivamus turpis lorem sodales lectus ornare</h3>
            <p>
              Gravida dis placerat lectus ante vel nunc euismod est turpis
              sodales. Diam tempor dui lacinia eget ornare varius gravida.
              Gravida dis placerat lectus ante vel nunc euismod est turpis
              sodales. Diam tempor dui lacinia accumsan vivamus augue cubilia
              vivamus nisi eu eget ornare varius gravida euismod. Gravida dis
              lorem ipsum dolor placerat magna tempus feugiat.
            </p>
            <p>
              Lectus ante vel nunc euismod est turpis sodales. Diam tempor dui
              lacinia accumsan vivamus augue cubilia vivamus nisi eu eget
              ornare varius gravida dolore euismod lorem ipsum dolor sit amet
              consequat. vivamus nisi eu eget ornare varius gravida dolore
              euismod lorem ipsum dolor sit amet consequat. vivamus nisi eu
              eget ornare et magna.
            </p>
          </div>
          <div class="col-4 col-12-narrow">
            <p>
              Gravida dis placerat lectus ante vel nunc euismod est turpis
              sodales. Diam tempor dui lacinia eget ornare varius gravida.
              Gravida dis placerat lectus ante vel nunc euismod est turpis
              sodales. Diam tempor dui lacinia accumsan vivamus augue cubilia
              vivamus nisi eu eget ornare varius gravida euismod. Gravida dis
              lorem ipsum dolor placerat magna tempus feugiat.
            </p>
            <p>
              Lectus ante vel nunc euismod est turpis sodales. Diam tempor dui
              lacinia accumsan vivamus augue cubilia vivamus nisi eu eget
              ornare varius gravida dolore euismod lorem ipsum dolor sit amet
              consequat eget ornare varius gravida euismod. Gravida dis lorem
              ipsum dolor placerat magna tempus feugiat magna tempus lorem.
            </p>
            <p>
              Lectus ante vel nunc euismod est turpis sodales. Diam tempor dui
              lacinia accumsan vivamus augue cubilia.
            </p>
          </div>
          <div class="col-4 col-12-narrow">
            <p>
              Placerat lectus ante vel nunc euismod est turpis sodales. Diam
              tempor dui lacinia eget ornare varius gravida. Gravida dis
              placerat lectus ante vel nunc euismod est turpis sodales. Diam
              tempor dui lacinia accumsan vivamus augue cubilia vivamus nisi
              eu eget ornare varius gravida euismod. Gravida dis lorem ipsum
              dolor placerat magna tempus feugiat. Lectus ante vel nunc
              euismod est turpis sodales. Diam tempor dui lacinia dolore.
            </p>
            <p>
              Accumsan vivamus augue cubilia vivamus nisi eu eget ornare
              varius gravida dolore euismod lorem ipsum dolor sit amet
              conseismod lorem ipsum dolor sit amet consequat lorem ipsum
              consequat feugiat sed tempus euismod feugiat veroeros.
            </p>
            <footer>
              <a href="#fourth" class="button scrolly">Ipsum ornare lorem dolor</a>
            </footer>
          </div>
        </div>
      </div>
    </div>
</section>
<footer class="bg-light text-center text-lg-start">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Colaborações</h5>
        <p>
          Projeto elaborado,documentado e realizado por alunos do segundo ano de informática do Instituto Federal de São Paulo - Campus Votuporanga.
          Acesse nosso repositório no <a href="github.com/svitorz/meeting_faces" class="link-dark">Github</a> 
        </p>
      </div>

      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Agradecimentos</h5>

        <p>
          Agradecimentos á todos os professores do curso técnico de informática por auxiliar na documentação e no desenvolvimento do projeto.
          Em especial ao tutor do projeto, o Dr. Pf. Cecílio Rodas.
        </p>
      </div>
    </div>
  </div>
<?php 
require_once 'footer.php';
?>