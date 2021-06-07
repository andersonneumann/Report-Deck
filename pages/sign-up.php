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
                   <form name="cadastro" action="caccout.php" method="POST">
                     <!--Inserir ação aqui-->
                     <h4>Nome</h4>
                     <div class="form-group">
                        <input id="usr" name="usr" type="text" class="form-control" required>
                     </div>
                     <h4>E-Mail</h4>
                     <div class="form-group">
                        <input id="email" name="email" type="email" class="form-control" required>
                     </div>
                     <h4>RG</h4>
                     <div class="form-group">
                        <input id="rg" name="rg" type="text" class="form-control" required>
                     </div>
                     <h4>CPF</h4>
                     <div class="form-group">
                        <input id="cpf" name="cpf" type="text" class="form-control" required>
                     </div>
                     <h4>Gênero</h4>
                     <div class="form-group">
                        <select id="genero" class="form-control" name="genero">
                              <option value="" disabled selected>Selecione o Gênero</option>
                           <optgroup label="Cisgênero">
                              <option value="Masculino">Masculino</option>
                              <option value="Feminino">Feminino</option>
                           </optgroup>
                           <optgroup label="Transsexual">
                              <option value="Homem Trans">Homem Trans</option>
                              <option value="Mulher Trans">Mulher Trans</option>
                           </optgroup>
                           <optgroup label="Outros">
                              <option value="Não-Binário">Não-Binário</option>
                           </optgroup>
                        </select>
                     </div>
                     <h4>Data de Nascimento</h4>
                     <div class="form-group">
                        <input id="nasc" name="nasc" type="date" class="form-control" required>
                     </div>
                     <h4>Telefone</h4>
                     <div class="form-group">
                        <input id="fone" name="fone" type="text" class="form-control" required>
                     </div>
                     <h4>Senha</h4>
                     <div class="form-group">
                        <input id="senha1" name="senha1" type="password" class="form-control" name="senha1" required>
                     </div>
                     <h4>Confirmar Senha</h4>
                     <div class="form-group">
                        <input id="senha2" name="senha2" type="password" class="form-control" name="senha2" required>
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
