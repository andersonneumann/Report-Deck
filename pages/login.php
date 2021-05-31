<?php
session_start();
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
      <section class="ftco-section contact-section ftco-degree-bg ">
         <br>
         <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
               <div class="col-md-7 text-center heading-section ftco-animate">
                  <h2>Login</h2>
               </div>
            </div>
            <div class="row block-6 itemsincenter justify-content-center">
               <div class="col-md-6 pr-md-5 itemsincenter ">
                   <?php
                    if (isset($_SESSION['not_find'])):
                   ?>
                   <b>Usuário ou senha incorretos</b>
                   <?php
                    unset($_SESSION['not_find']);
                    endif;
                   ?>
                   <form action="log_in.php" method="POST">
                     <!--Inserir ação aqui-->
                     <div class="form-group">
                         <input type="text" id="user" name="user" class="form-control" placeholder="E-mail">
                     </div>
                     <div class="form-group">
                        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Senha">
                     </div>
                     <div class="form-group">
                        <center><input type="submit" value="Entrar" class="btn btn-primary py-3 px-5"></center>
                     </div>
                  </form>
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