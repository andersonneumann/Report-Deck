<?php
// Escrever comandos aqui
?>

<!DOCTYPE html>
<html lang="en">
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
                  <h2>Cadastre-se</h2>
               </div>
            </div>
            <div class="row block-6 itemsincenter justify-content-center">
               <div class="col-md-6 pr-md-5 itemsincenter ">
                  <form name="cadastro" action="#">
                     <!--Inserir ação aqui-->
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Seu Usuário">
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" placeholder="Seu Email">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="RG">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="CPF">
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control" name="senha1" placeholder="Senha">
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control" name="senha2" placeholder="Confirme a Senha">
                     </div>
                     <div class="form-group">
                        <center><input id="signup" type="submit" value="Cadastrar" class="btn btn-primary py-3 px-5"></center>
                     </div>
                     <div class="caution">
                        <h3></h3>
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
      <script>
         function validaSenha(e){
            
            senha1 = document.cadastro.senha1.value
            senha2 = document.cadastro.senha2.value
            console.log(senha2);

            if (senha1 != senha2){
               var titulo = document.querySelector(".caution");
               titulo.textContent = "As senhas não são iguais!";
               e.preventDefault();
            }
         }

         document.getElementById("signup").addEventListener("click",validaSenha);
      </script>
   </body>
</html>