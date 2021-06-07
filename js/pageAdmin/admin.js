$(document).ready(function(){

  loadPage();
  exibirTemaCorrespondente();

});

var temaUsuario = false;

// False = Claro
// True = Escuro

function loadPage(){
  $(".appendContentClick").html("");
  exibirMenuDeOpcoes();
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function exibirMenuDeOpcoes(){
  $(".appendContentClick").html("");
  var nomeUsuario = getCookie('user');

  var itens = ["Validar Ocorrências", "Perfil", "Sair"];
  var imagens = ["validarOcorrencia.png", "perfilBranco.png", "sairBranco.png"];
  var action = ['validarOcorrencia()' ,'exibirPerfil()', 'sair()'];

  var val = "";
  val+= '<br><br><h3 class="text-center textoTemaEscuro">Administrador</h3>';
  val +='<br><h3 class="text-center textoTemaEscuro">Bem Vindo<br>'+ nomeUsuario +'!</h3>';
  val += '<ul class="nav justify-content-center">';
  for (var i = 0; i<3; i++){
    val += '<a onclick="' + action[i] + '"><li class="nav-item"><div class="navegacao"><img src="../images/navBar/' + imagens[i] + '" class="rounded mx-auto d-block imgNavBar">';
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i] + '</h6></div></li></a>';
  }
  val += '</ul>';
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();
}

function exibirTemaCorrespondente(){

  if (temaUsuario == false){
    $('h1').css("color", "#333333");
    $('h2').css("color", "#333333");
    $('h3').css("color", "#333333");
    $('h4').css("color", "#333333");
    $('h5').css("color", "#333333");
    $('h6').css("color", "#333333");
    $('body').css("background-color", "#f0f0f0");
    $('.textoTemaEscuro').css("color", "#333333");
    $('.navegacao').css("border", "2px solid #333333");
    $('.navegacao').css("box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.navegacao').css("-webkit-box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.navegacao').css("-moz-box-shadow", "0px 1px 17px 3px rgba(199,199,199,0.9)");
    $('.styleForm').css("background-color", "#f0f0f0");
    $('.styleForm').css("border", "1px solid #333333");
    $('.styleForm').css("color", "#333333");
    $('.styleForm::placeholder').css("color", "#757575");

  }else{
    $('h1').css("color", "#E0E0E0");
    $('h2').css("color", "#E0E0E0");
    $('h3').css("color", "#E0E0E0");
    $('h4').css("color", "#E0E0E0");
    $('h5').css("color", "#E0E0E0");
    $('h6').css("color", "#E0E0E0");
    $('body').css("background-color", "#383838");
    $('.navegacao').css("border", "2px solid #E0E0E0");
    $('.textoTemaEscuro').css("color", "#E0E0E0");
    $('.imgNavBar').css("filter", "invert(1)");
    $('.navegacao').css("box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.navegacao').css("-webkit-box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.navegacao').css("-moz-box-shadow", "0px 1px 17px 3px rgba(61,61,61,0.9)");
    $('.styleForm').css("background-color", "#545454");
    $('.styleForm').css("border", "1px solid #E0E0E0");
    $('.styleForm').css("color", "#E3E3E3");
    $('.styleForm::placeholder').css("color", "#B5B5B5");
  }

}

function validarOcorrencia(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/pageVerificaOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
  exibirTemaCorrespondente();
}

function exibirPerfil(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/vizualizaOcorrenciasAdmin.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function sair(){
  window.location = 'index.php';
}

// Exibir preview da imagem na criação da ocorrência:
var loadFile = function(event) {
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};
