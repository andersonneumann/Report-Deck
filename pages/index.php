<?php
// Escrever comandos aqui
?>

<!DOCTYPE html>
<html lang="pt-br">
   <!-- head.php aqui -->
   <?php
         include_once("head.php");
   ?>
   <body>
      <!-- navbar.php aqui -->
      <?php
         include_once("navbar.php");
      ?>
      <div class="hero-wrap js-fullheight">
         <div class="overlay"></div>
         <div class="container-fluid px-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
               <img class="one-third  align-self-end order-md-last img-fluid" src="../images/undraw_pair_programming_njlp.svg" alt="">
               <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                  <div class="text mt-5">
                     <span class="subheading">CADASTRE-SE E FAÇA SUA DENUNCIA AGORA!</span>
                     <h1 class="mb-3"><span>Torne</span> <span>sua cidade,</span> <span>mais segura!</span></h1>
                     <p>Faça uma denúncia de um crime que ocorreu perto de você e torne sua cidade mais segura.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <section name="projeto" class="ftco-section services-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Sobre</h2>
            <p>A Report deck foi criada com o intuito de ser uma rede onde se pode registrar uma 
               denúncia sobre algum crime que tenha ocorrido nas redondezas com o objetivo de informar algum usuário 
               sobre se uma região é perigosa ou não!.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-4">Feedback de nossos usuários</h2>
            <p>O que usuários estão achando da experiência de poder usar o Report Deck...</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap p-4 text-center">
                  <div class="user-img mb-4" style="background-image: url(../images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">Finalmente consigo caminhar a noite e saber que estou seguro!</p>
                    <p class="name">Rogério Guedes</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 text-center">
                  <div class="user-img mb-4" style="background-image: url(../images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                     <p class="mb-4">Posso preparar minha viagem e escolher passeios seguros!</p>
                     <p class="name">Flávio Santos</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 text-center">
                  <div class="user-img mb-4" style="background-image: url(../images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                     <p class="mb-4">Agora fico bem mais seguro quando meu filho vai para a balada a noite!</p>
                    <p class="name">Rogério Guedes</p>
                   
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 text-center">
                  <div class="user-img mb-4" style="background-image: url(../images/person_4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                     <p class="mb-4">Consigo escolher um melhor caminho para ir ao trabalho sem medo!</p>
                     <p class="name">Rogério Guedes</p>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- footer.php aqui -->
      <?php
         include_once("footer.php");
      ?>
   </body>
</html>