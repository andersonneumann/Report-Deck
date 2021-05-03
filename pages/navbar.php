<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
      <img src="../images/rdlogo.png" width="10%">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span>Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a id="homeP" href="index.php" class="nav-link">Início</a></li>
            <li class="nav-item"><a id="aboutP" href="index.php#about" class="nav-link">Sobre Nós</a></li>
            <li class="nav-item cta"><a id="buttonR" href="voltar.php" class="nav-link start"><span id="return">VOLTAR</span></a></li>
         </ul>
      </div>
   </div>   
</nav>
<script>
   console.log(window.location.pathname);
   if(window.location.pathname === "/"){
      document.getElementById("homeP").href="pages/index.php";
      document.getElementById("aboutP").href="pages/index.php#about";
      if(window.location.pathname === "/pages/index.php" || window.location.pathname === "/"){
         var botao = document.querySelector("#return");
         botao.innerHTML = "COMEÇAR!"
         document.getElementById("buttonR").href="pages/comecar.php"; 
      }else{
         botao.innerHTML = "VOLTAR"
         document.getElementById("buttonR").href="pages/voltar.php"; 
      }
   }else{
      document.getElementById("homeP").href="index.php";
      document.getElementById("aboutP").href="index.php#about";
      if(window.location.pathname === "/pages/index.php" || window.location.pathname === "/"){
         var botao = document.querySelector("#return");
         botao.innerHTML = "COMEÇAR!"
         document.getElementById("buttonR").href="comecar.php"; 
      }else{
         botao.innerHTML = "VOLTAR"
         document.getElementById("buttonR").href="voltar.php"; 
      }
   }
   </script>
