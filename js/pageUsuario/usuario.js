$(document).ready(function(){

  loadPage();

});

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

  var itens = [["Mapa de Ocorrências", "Nova Ocorrência"], ["Visualizar Ocorrências", "<br>Meu Perfil"], ["Configurações", "Sair"]];
  var imagens = [["mapaBranco.png", "novaOcorrenciaBranco.png"],["visualizarBranco.png", "perfilBranco.png"],["configBranco.png", "sairBranco.png"]]
  var action = [["exibirMapaDeOcorrencias()","criarNovaOcorrencia()"],["visualizarOcorrencias()","exibirPerfil()"],["exibirConfigs()","sair()"]]

  var val = "";
  val+= '<br><h3 class="text-center textoTemaEscuro">Bem Vindo<br>'+ nomeUsuario +'!</h3>'
  val += '<ul class="nav justify-content-center">'
  for (var i = 0; i<3; i++){
    val += '<a onclick="' + action[i][0] + '"><li class="nav-item"><div class="navegacao"><img src="../images/navBar/' + imagens[i][0] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][0] + '</h6></div></li></a>'
    val += '<a onclick="' + action[i][1] + '"><div class="navegacao"><img src="../images/navBar/' + imagens[i][1] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h6 class="descricaoNavBar textoTemaEscuro">' + itens[i][1] + '</h6></div></a>'
  }
  val += '</ul>'
  $(".appendContentClick").append(val);
}

function exibirMapaDeOcorrencias(){
  $(".appendContentClick").html("");
  val = getCookie('ocorrencias');
  alert("Exibindo mapa de Ocorrências");
}

function criarNovaOcorrencia(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/pageAddOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function visualizarOcorrencias(){
  $(".appendContentClick").html("");
  var val = '<iframe src="client/vizualizaOcorrencia.php" width="100%" height="100%" frameBorder="0" title="Iframe Example"></iframe>';
  $(".appendContentClick").append(val);
}

function exibirPerfil(){
  $(".appendContentClick").html("");
  alert("Exibindo perfil");
}

function exibirConfigs(){
  $(".appendContentClick").html("");
  alert("Exibindo configs");
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
