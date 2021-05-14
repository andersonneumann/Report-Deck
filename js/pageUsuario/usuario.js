$(document).ready(function(){

  loadPage();

});

function loadPage(){
  exibirMenuDeOpcoes();
}

function exibirMenuDeOpcoes(){

  var nomeUsuario = "[User]";

  var itens = [["Mapa de Ocorrências", "Nova Ocorrência"], ["Visualizar Ocorrências", "Meu Perfil"], ["Configurações", "Sair"]];
  var imagens = [["mapaBranco.png", "novaOcorrenciaBranco.png"],["visualizarBranco.png", "perfilBranco.png"],["configBranco.png", "sairBranco.png"]]
  var val = "";
  val+= '<br><h1 class="text-center textoTemaEscuro">Bem Vindo '+ nomeUsuario +'!</h1>'
  val += '<ul class="nav justify-content-center">'
  for (var i = 0; i<3; i++){
    val += '<li class="nav-item"><div class="navegacao"><img src="../images/navBar/' + imagens[i][0] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h2 class="descricaoNavBar textoTemaEscuro">' + itens[i][0] + '</h2></div></li>'
    val += '<div class="navegacao"><img src="../images/navBar/' + imagens[i][1] + '" class="rounded mx-auto d-block imgNavBar">'
    val += '<h2 class="descricaoNavBar textoTemaEscuro">' + itens[i][1] + '</h2></div>'
  }
  val += '</ul>'
  $(".appendContentClick").append(val);
}
