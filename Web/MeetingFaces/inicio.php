<?php 
session_start();

require 'logica.php';

$titulo_pagina = null;

require_once 'header.php';

if(isset($_SESSION['sucesso'])){
    if($_SESSION['sucesso']){
        ?>
        <div class="alert alert-success">
            <h4>Operação realizada com sucesso!</h4>

        </div>
        <?php
        unset($_SESSION['sucesso']);
    }else {
        $erro = $_SESSION['erro'];
        unset($_SESSION['erro']);
        ?>
        <div class="alert alert-danger">
            <h4>
                Erro ao realizar operação! Tente novamente.
            </h4>
            <p>
                <?= $erro; ?>
            </p>
        </div>
        <?php
        unset($_SESSION['sucesso']);
    }
}
if(isset($_SESSION['sucesso'])){
    if($_SESSION['sucesso'] == true){
        ?>
        <div class="alert alert-success">
            <h4>Comentário enviada com sucesso!</h4>
            <p>Aguarde a aprovação por nossos administradores.</p>
        </div>
<?php
unset($_SESSION['sucesso']);
    }else{
        unset($_SESSION['sucesso']);
        $erro = $_SESSION['erro'];
        ?>
        <div class="alert alert-danger">
            <h4>Erro ao enviar Comentário!</h4>
            <p> <?= $erro ?> </p>
        </div>
        <?php
        unset($_SESSION['erro']);
    }
}
?>
<section id="header" class="container-fluid py-5" style="height: 100vh;">
    <header class="py-5 my-5">
        <div class="container py-5">
            <div class="text-center text-light py-5 my-5">
            <h2 class="fs-1">
                Meeting Faces
            </h2>
                <a href="#banner" class="btn btn-outline-light mt-2 p-3 px-4 btn-lg border">
                    Saiba mais
                </a>
            </div>
        </div>
    </header>
</section> <!-- fecha header section  -->
<section id="banner" class="text-black">
    <div class="container-fluid py-5">
        <div class="text-center">
            <h3>
                A população em situação de rua supera 281,4 mil pessoas no Brasil.
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
                            Discriminação e Estigma
                        </h3> 
                        <p>
                            A estigmatização social é um grande desafio enfrentado por aqueles que vivem nas ruas. Muitas vezes são vítimas de discriminação, preconceito e até mesmo violência por parte da sociedade em geral. Isso torna ainda mais difícil para eles saírem da situação de rua e reintegrarem-se à sociedade.
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
                            Vulnerabilidade a Crimes e Abusos
                        </h3> 
                        <p>
                            A vida nas ruas torna as pessoas mais vulneráveis a crimes, incluindo agressões físicas, assaltos e exploração sexual. A falta de segurança pessoal é uma preocupação constante para aqueles que vivem nas ruas.
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
                            Falta de Acesso a Serviços Básicos
                        </h3> 
                        <p>
                            A população de rua muitas vezes não tem acesso a serviços básicos, como alimentação regular, água potável, saneamento, educação e emprego. Essa falta de acesso dificulta a possibilidade de retomar suas vidas e sair da situação de rua.
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
               Arquitetura hostil: o que é e por que é um problema 
            </h3>
        </div>
    </div>
</section> <!-- Fecha seção -->
<section id="text-image" class="text-white py-5 p-5" style="height: 85vh; text-align:justify;">
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-4">
            <h4>Arquitetura hostil</h4>
            <p>
                A arquitetura hostil, também conhecida como "arquitetura defensiva" ou "arquitetura anti-pessoas", é um fenômeno urbano controverso que envolve o planejamento e o design de espaços públicos e edifícios de maneira a desencorajar ou impossibilitar o uso por certos grupos de pessoas, muitas vezes, aqueles em situação de rua ou em busca de abrigo temporário. Essas medidas incluem a instalação de bancos desconfortáveis, piso anti-dormência, e até mesmo espinhos em locais estratégicos. Embora seja defendida como uma abordagem para a segurança e ordenamento urbano, a arquitetura hostil também gera críticas por agravar a segregação social e prejudicar o senso de pertencimento e humanidade nas cidades. Este texto explorará mais a fundo essa prática controversa e suas implicações na vida urbana.
            </p>
            <!-- <footer>
                <a href="#" class="button scrolly">Recomendação de leitura</a>
            </footer> -->
            </div>
            <div class="col-8">
                <img src="https://projetobatente.com.br/wp-content/uploads/2018/01/arquitetura-hostil-headshot.jpg"
                alt="Arquitetura hostil" class="img-thumbnail" />
            </div>
        </div>
    </div>
</section> <!-- Fecha seção -->
<!-- <section id="banner3">
    <div class="container-fluid text-black text-center py-5">
        <h4></h4>
        <p></p>
    </div>
</section> -->
<section id="last">
<div class="py-5 text-white">
      <div class="container">
        <div class="row">
          <div class="col-4 col-12-narrow">
            <p>
                É crucial que a sociedade brasileira reconheça a população em situação de rua como cidadãos vulneráveis que merecem apoio e dignidade. É necessário um esforço conjunto para fornecer moradia adequada, serviços de saúde mental, acesso à educação e oportunidades de emprego para ajudar essas pessoas a se reintegrarem na sociedade. Além disso, é importante combater o estigma e a discriminação que perpetuam o ciclo de exclusão social.
            </p>
            <p>
                A questão da população em situação de rua não é apenas um desafio social, mas também um teste para a humanidade e a compaixão de uma sociedade. Resolver essa questão requer ação imediata e uma abordagem holística que considere as múltiplas dimensões desse problema.   
            </p>
          </div>
          <div class="col-4 col-12-narrow">
            <p>
                A população em situação de rua no Brasil é um tema complexo e desafiador que requer atenção urgente. De acordo com dados do Instituto de Pesquisa Econômica Aplicada (IPEA), estimativas apontam que cerca de 222 mil pessoas vivem nas ruas das cidades brasileiras, mas esse número pode ser ainda maior devido à dificuldade em quantificar de maneira precisa essa população.
            </p>
            <p>
                Uma mudança fundamental na abordagem à população em situação de rua no Brasil está em andamento, com um foco crescente na humanização das políticas públicas e dos serviços prestados. Em vez de medidas repressivas ou discriminatórias, as autoridades e organizações estão buscando soluções que respeitem a dignidade e os direitos humanos dessas pessoas. Isso inclui a criação de abrigos mais acolhedores, o fornecimento de assistência médica e psicológica, bem como programas de capacitação para ajudar aqueles que desejam sair da rua a reconstruírem suas vidas. Essa abordagem centrada nas pessoas é um passo importante na direção certa.
            </p>
          </div>
          <div class="col-4 col-12-narrow">
            <p>
                Além do papel do governo, a sociedade civil desempenha um papel crucial na assistência à população em situação de rua. Organizações não governamentais, grupos de voluntários e indivíduos engajados estão trabalhando incansavelmente para fornecer comida, roupas, cuidados médicos e apoio emocional a essas pessoas vulneráveis. O trabalho desses heróis anônimos é essencial para preencher as lacunas deixadas pelas políticas públicas e demonstra a solidariedade presente na sociedade brasileira.    
            </p>
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
          Acesse nosso repositório no <a href="https://github.com/svitorz/meeting_faces" class="link-dark">Github</a> 
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